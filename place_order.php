<?php

session_start();

include 'include/conn.php';
include 'include/invoice_helper.php';


/* =========================================================
   ONLY POST REQUEST ALLOWED
========================================================= */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: index.php");
    exit();

}


/* =========================================================
   GET CUSTOMER DETAILS
========================================================= */

$name = trim($_POST['customer_name'] ?? '');

$email = trim($_POST['customer_email'] ?? '');

$mobile = trim($_POST['mobile'] ?? '');

$address = trim($_POST['address'] ?? '');

$city = trim($_POST['city'] ?? '');

$state = trim($_POST['state'] ?? '');

$pincode = trim($_POST['pincode'] ?? '');

$payment = trim(
    $_POST['payment_method'] ?? 'Paytm'
);


/* =========================================================
   GET CHECKOUT CART
========================================================= */

$cart = [];


/*
|--------------------------------------------------------------------------
| PRIMARY METHOD
|--------------------------------------------------------------------------
| checkout.php stores BOTH:
|
| 1. Cart checkout
| 2. Buy Now checkout
|
| inside this session.
*/

if (
    isset($_SESSION['checkout_cart']) &&
    is_array($_SESSION['checkout_cart']) &&
    !empty($_SESSION['checkout_cart'])
) {

    $cart = $_SESSION['checkout_cart'];

}


/*
|--------------------------------------------------------------------------
| BACKWARD COMPATIBILITY
|--------------------------------------------------------------------------
| If an older checkout page still sends cart through POST,
| support that too.
*/

elseif (
    isset($_POST['cart']) &&
    trim($_POST['cart']) !== ''
) {

    $decodedCart = json_decode(
        $_POST['cart'],
        true
    );

    if (
        is_array($decodedCart) &&
        !empty($decodedCart)
    ) {

        $cart = $decodedCart;

    }

}


/* =========================================================
   VALIDATE CART
========================================================= */

if (
    !is_array($cart) ||
    empty($cart)
) {

    die(
        "Your cart is empty. " .
        "<a href='index.php'>Return to Home</a>"
    );

}


/* =========================================================
   VALIDATE CUSTOMER DETAILS
========================================================= */

if (

    empty($name) ||

    !filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    ) ||

    !preg_match(
        '/^[0-9 +()-]{10,20}$/',
        $mobile
    ) ||

    empty($address) ||

    empty($city) ||

    empty($state) ||

    !preg_match(
        '/^[0-9]{6}$/',
        $pincode
    )

) {

    die(
        "Please fill all required fields correctly. " .
        "<a href='javascript:history.back()'>Go Back</a>"
    );

}


/* =========================================================
   ENSURE ORDER COLUMNS
========================================================= */

ensure_order_checkout_columns($con);


/* =========================================================
   ESCAPE CUSTOMER DATA
========================================================= */

$name = mysqli_real_escape_string(
    $con,
    $name
);

$email = mysqli_real_escape_string(
    $con,
    $email
);

$mobile = mysqli_real_escape_string(
    $con,
    $mobile
);

$address = mysqli_real_escape_string(
    $con,
    $address
);

$city = mysqli_real_escape_string(
    $con,
    $city
);

$state = mysqli_real_escape_string(
    $con,
    $state
);

$pincode = mysqli_real_escape_string(
    $con,
    $pincode
);

$payment = mysqli_real_escape_string(
    $con,
    $payment
);


/* =========================================================
   DELIVERY ADDRESS
========================================================= */

$delivery_address =
    $address .
    "\n" .
    $city .
    ', ' .
    $state .
    ' - ' .
    $pincode;


$delivery_address = mysqli_real_escape_string(
    $con,
    $delivery_address
);


/* =========================================================
   START TRANSACTION
========================================================= */

mysqli_begin_transaction($con);


try {


    /* =====================================================
       PRODUCT TOTAL
    ====================================================== */

    $subtotal = 0;

    $totalShipping = 0;

    $orderItems = [];


    /* =====================================================
       LOOP THROUGH CART
    ====================================================== */

    foreach ($cart as $cartItem) {


        /*
        |--------------------------------------------------------------------------
        | Product ID
        |--------------------------------------------------------------------------
        */

        $product_id = isset($cartItem['id'])
            ? (int)$cartItem['id']
            : 0;


        /*
        |--------------------------------------------------------------------------
        | Quantity
        |--------------------------------------------------------------------------
        */

        $quantity = isset($cartItem['quantity'])
            ? max(
                1,
                (int)$cartItem['quantity']
            )
            : 1;


        if ($product_id <= 0) {
            continue;
        }


        /* =================================================
           FETCH PRODUCT FROM DATABASE
        ================================================== */

        $product_id_safe = (int)$product_id;


        $productQuery = mysqli_query(
            $con,
            "
            SELECT
                id,
                name,
                sale_price,
                price,
                shipping_charge,
                status
            FROM products
            WHERE id = $product_id_safe
            LIMIT 1
            "
        );


        if (!$productQuery) {

            throw new Exception(
                "Unable to fetch product."
            );

        }


        $product = mysqli_fetch_assoc(
            $productQuery
        );


        /* =================================================
           PRODUCT NOT FOUND
        ================================================== */

        if (!$product) {

            throw new Exception(
                "Product ID $product_id does not exist."
            );

        }


        /* =================================================
           CHECK PRODUCT STATUS
        ================================================== */

        if (
            isset($product['status']) &&
            (int)$product['status'] !== 1
        ) {

            throw new Exception(
                "Product \"" .
                $product['name'] .
                "\" is currently unavailable."
            );

        }


        /* =================================================
           GET PRICE FROM DATABASE
        ================================================== */

        $unit_price = (float)$product['sale_price'];


        /*
        |--------------------------------------------------------------------------
        | If sale price is zero, use regular price
        |--------------------------------------------------------------------------
        */

        if ($unit_price <= 0) {

            $unit_price =
                (float)$product['price'];

        }


        /* =================================================
           SHIPPING
        ================================================== */

        $shipping_charge =
            (float)$product['shipping_charge'];


        /*
        |--------------------------------------------------------------------------
        | Product total
        |--------------------------------------------------------------------------
        */

        $productTotal =
            ($unit_price * $quantity);


        /*
        |--------------------------------------------------------------------------
        | Shipping
        |--------------------------------------------------------------------------
        |
        | This assumes shipping_charge is charged
        | once per cart item/product.
        |
        */

        $productGrandTotal =
            $productTotal +
            $shipping_charge;


        /* =================================================
           ADD TO TOTALS
        ================================================== */

        $subtotal += $productTotal;

        $totalShipping += $shipping_charge;


        /* =================================================
           SAVE ITEM FOR INSERT
        ================================================== */

        $orderItems[] = [

            'product_id' =>
                $product_id,

            'product_name' =>
                $product['name'],

            'quantity' =>
                $quantity,

            'unit_price' =>
                $unit_price,

            'shipping_charge' =>
                $shipping_charge,

            'total_price' =>
                $productGrandTotal

        ];

    }


    /* =====================================================
       CHECK ITEMS
    ====================================================== */

    if (empty($orderItems)) {

        throw new Exception(
            "No valid products were found in your cart."
        );

    }


    /* =====================================================
       FINAL ORDER AMOUNT
    ====================================================== */

    $amount =
        $subtotal +
        $totalShipping;


    $payment_status = 'Pending';


    /* =====================================================
       INSERT MAIN ORDER
    ====================================================== */

    /*
    |--------------------------------------------------------------------------
    | product_id is kept NULL because this is now a
    | multi-product order.
    |--------------------------------------------------------------------------
    */

    $insertSql = "

        INSERT INTO orders
        (
            product_id,
            customer_name,
            customer_email,
            mobile,
            city,
            state,
            pin_code,
            address,
            quantity,
            amount,
            payment_method,
            payment_status
        )

        VALUES
        (
            NULL,
            '$name',
            '$email',
            '$mobile',
            '$city',
            '$state',
            '$pincode',
            '$delivery_address',
            0,
            '$amount',
            '$payment',
            '$payment_status'
        )

    ";


    if (!mysqli_query($con, $insertSql)) {

        throw new Exception(
            "Error creating order: " .
            mysqli_error($con)
        );

    }


    /* =====================================================
       GET ORDER ID
    ====================================================== */

    $order_id = mysqli_insert_id(
        $con
    );


    /* =====================================================
       INSERT ALL ORDER ITEMS
    ====================================================== */

    foreach ($orderItems as $item) {


        $item_product_id =
            (int)$item['product_id'];


        $item_product_name =
            mysqli_real_escape_string(
                $con,
                $item['product_name']
            );


        $item_quantity =
            (int)$item['quantity'];


        $item_unit_price =
            (float)$item['unit_price'];


        $item_shipping =
            (float)$item['shipping_charge'];


        $item_total =
            (float)$item['total_price'];


        $itemSql = "

            INSERT INTO order_items
            (
                order_id,
                product_id,
                product_name,
                quantity,
                unit_price,
                shipping_charge,
                total_price
            )

            VALUES
            (
                '$order_id',
                '$item_product_id',
                '$item_product_name',
                '$item_quantity',
                '$item_unit_price',
                '$item_shipping',
                '$item_total'
            )

        ";


        if (!mysqli_query(
            $con,
            $itemSql
        )) {

            throw new Exception(
                "Error saving order item: " .
                mysqli_error($con)
            );

        }

    }


    /* =====================================================
       PAYTM ORDER REFERENCE
    ====================================================== */

    $paytm_order_id =
        "MBH_ORD_" .
        $order_id .
        "_" .
        time();


    $paytm_order_id_db =
        mysqli_real_escape_string(
            $con,
            $paytm_order_id
        );


    /* =====================================================
       UPDATE ORDER REFERENCE
    ====================================================== */

    $updateSql = "

        UPDATE orders

        SET order_id =
            '$paytm_order_id_db'

        WHERE id =
            '$order_id'

    ";


    if (!mysqli_query(
        $con,
        $updateSql
    )) {

        throw new Exception(
            "Unable to update order ID: " .
            mysqli_error($con)
        );

    }


    /* =====================================================
       COMMIT EVERYTHING
    ====================================================== */

    mysqli_commit($con);


    /* =====================================================
       GO TO PAYMENT
    ===================================================== */

    header(
        "Location: payment-init.php?order_id=" .
        $order_id
    );

    exit();


} catch (Exception $e) {


    /* =====================================================
       ROLLBACK
    ====================================================== */

    mysqli_rollback($con);


    die(
        "Order could not be created: " .
        htmlspecialchars(
            $e->getMessage(),
            ENT_QUOTES,
            'UTF-8'
        ) .
        "<br><br>" .
        "<a href='javascript:history.back()'>Go Back</a>"
    );

}

?>