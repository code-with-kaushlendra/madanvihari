<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once dirname(__DIR__) . '/vendor/autoload.php';


/*
|--------------------------------------------------------------------------
| ENSURE INVOICE COLUMNS
|--------------------------------------------------------------------------
*/

function ensure_order_checkout_columns($con)
{
    static $checked = false;

    if ($checked) {
        return;
    }

    $columns = array(

        'customer_email' =>
            "ALTER TABLE orders
             ADD COLUMN customer_email VARCHAR(190) NULL
             AFTER mobile",

        'invoice_number' =>
            "ALTER TABLE orders
             ADD COLUMN invoice_number VARCHAR(40) NULL
             AFTER payment_id",

        'invoice_sent_at' =>
            "ALTER TABLE orders
             ADD COLUMN invoice_sent_at DATETIME NULL
             AFTER invoice_number"
    );

    foreach ($columns as $column => $alterSql) {

        $columnEscaped = mysqli_real_escape_string(
            $con,
            $column
        );

        $columnResult = mysqli_query(
            $con,
            "SHOW COLUMNS FROM orders
             LIKE '$columnEscaped'"
        );

        if ($columnResult && mysqli_num_rows($columnResult) === 0) {

            if (!mysqli_query($con, $alterSql)) {

                error_log(
                    "Invoice column creation failed for {$column}: "
                    . mysqli_error($con)
                );
            }
        }
    }

    $checked = true;
}


/*
|--------------------------------------------------------------------------
| GET ORDER + ITEMS
|--------------------------------------------------------------------------
|
| Supports:
|
| 1. Multi-product order_items
| 2. Old/single-product orders table
|
|--------------------------------------------------------------------------
*/

function invoice_order_data($con, $order_id)
{
    $order_id = (int)$order_id;

    if ($order_id <= 0) {
        return null;
    }


    /*
    |--------------------------------------------------------------------------
    | GET MAIN ORDER
    |--------------------------------------------------------------------------
    */

    $orderResult = mysqli_query(
        $con,
        "
        SELECT *
        FROM orders
        WHERE id = '$order_id'
        LIMIT 1
        "
    );

    if (!$orderResult) {

        error_log(
            'Invoice order query failed: '
            . mysqli_error($con)
        );

        return null;
    }


    $order = mysqli_fetch_assoc($orderResult);

    if (!$order) {
        return null;
    }


    /*
    |--------------------------------------------------------------------------
    | GET MULTIPLE PRODUCTS FROM order_items
    |--------------------------------------------------------------------------
    */

    $items = array();

    $itemsResult = mysqli_query(
        $con,
        "
        SELECT
            oi.id,
            oi.order_id,
            oi.product_id,
            oi.product_name,
            oi.quantity,
            oi.unit_price,
            oi.shipping_charge,
            oi.total_price,
            p.name AS product_db_name,
            p.image AS product_image

        FROM order_items AS oi

        LEFT JOIN products AS p
            ON p.id = oi.product_id

        WHERE oi.order_id = '$order_id'

        ORDER BY oi.id ASC
        "
    );


    /*
    |--------------------------------------------------------------------------
    | IF order_items EXISTS
    |--------------------------------------------------------------------------
    */

    if ($itemsResult) {

        while ($item = mysqli_fetch_assoc($itemsResult)) {

            $items[] = $item;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | FALLBACK FOR SINGLE PRODUCT ORDER
    |--------------------------------------------------------------------------
    |
    | If no order_items records exist, use:
    |
    | orders.product_id
    | orders.quantity
    |
    |--------------------------------------------------------------------------
    */

    if (count($items) === 0 && !empty($order['product_id'])) {

        $productId = (int)$order['product_id'];

        $productResult = mysqli_query(
            $con,
            "
            SELECT
                id,
                name,
                price,
                sale_price,
                shipping_charge,
                image

            FROM products

            WHERE id = '$productId'

            LIMIT 1
            "
        );


        if ($productResult) {

            $product = mysqli_fetch_assoc($productResult);

            if ($product) {

                $quantity = max(
                    1,
                    (int)($order['quantity'] ?? 1)
                );


                /*
                |--------------------------------------------------------------------------
                | Determine product price
                |--------------------------------------------------------------------------
                */

                $unitPrice = 0;

                if (
                    isset($product['sale_price']) &&
                    $product['sale_price'] !== '' &&
                    (float)$product['sale_price'] > 0
                ) {

                    $unitPrice =
                        (float)$product['sale_price'];

                } else {

                    $unitPrice =
                        (float)$product['price'];
                }


                /*
                |--------------------------------------------------------------------------
                | Shipping
                |--------------------------------------------------------------------------
                */

                $shippingCharge =
                    isset($product['shipping_charge'])
                    ? (float)$product['shipping_charge']
                    : 0;


                /*
                |--------------------------------------------------------------------------
                | Create same structure as order_items
                |--------------------------------------------------------------------------
                */

                $items[] = array(

                    'id' =>
                        null,

                    'order_id' =>
                        $order_id,

                    'product_id' =>
                        $productId,

                    'product_name' =>
                        $product['name'],

                    'quantity' =>
                        $quantity,

                    'unit_price' =>
                        $unitPrice,

                    'shipping_charge' =>
                        $shippingCharge,

                    'total_price' =>
                        $unitPrice * $quantity,

                    'product_db_name' =>
                        $product['name'],

                    'product_image' =>
                        $product['image'] ?? ''
                );
            }
        }
    }


    /*
    |--------------------------------------------------------------------------
    | ATTACH ITEMS TO ORDER
    |--------------------------------------------------------------------------
    */

    $order['items'] = $items;


    return $order;
}


/*
|--------------------------------------------------------------------------
| GENERATE INVOICE NUMBER
|--------------------------------------------------------------------------
*/

function invoice_number($con, $order)
{
    if (!empty($order['invoice_number'])) {

        return $order['invoice_number'];
    }


    $number =
        'MBH-' .
        date('Y') .
        '-' .
        str_pad(
            (string)$order['id'],
            6,
            '0',
            STR_PAD_LEFT
        );


    $escapedNumber =
        mysqli_real_escape_string(
            $con,
            $number
        );


    mysqli_query(
        $con,
        "
        UPDATE orders

        SET invoice_number = '$escapedNumber'

        WHERE id = '" . (int)$order['id'] . "'

        AND (
            invoice_number IS NULL
            OR invoice_number = ''
        )
        "
    );


    return $number;
}


/*
|--------------------------------------------------------------------------
| GENERATE INVOICE HTML
|--------------------------------------------------------------------------
*/

function invoice_html($order)
{
    $escape = function ($value) {

        return htmlspecialchars(
            (string)$value,
            ENT_QUOTES,
            'UTF-8'
        );
    };


    /*
    |--------------------------------------------------------------------------
    | ORDER DATE
    |--------------------------------------------------------------------------
    */

    $orderDate = !empty($order['created_at'])
        ? date(
            'd M Y',
            strtotime($order['created_at'])
        )
        : date('d M Y');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER DATA
    |--------------------------------------------------------------------------
    */

    $address =
        nl2br(
            $escape(
                $order['address'] ?? ''
            )
        );


    $customerEmail =
        $escape(
            $order['customer_email'] ?? ''
        );


    /*
    |--------------------------------------------------------------------------
    | TRANSACTION ID
    |--------------------------------------------------------------------------
    */

    $transactionId =
        $order['paytm_txn_id']
        ?? $order['payment_id']
        ?? 'N/A';


    /*
    |--------------------------------------------------------------------------
    | ITEMS
    |--------------------------------------------------------------------------
    */

    $itemsHtml = '';

    if (
        isset($order['items']) &&
        is_array($order['items']) &&
        count($order['items']) > 0
    ) {

        foreach ($order['items'] as $item) {

            $productName =
                !empty($item['product_name'])
                ? $item['product_name']
                : (
                    $item['product_db_name']
                    ?? 'Handicraft item'
                );


            $quantity =
                max(
                    1,
                    (int)($item['quantity'] ?? 1)
                );


            $unitPrice =
                (float)(
                    $item['unit_price'] ?? 0
                );


            $shipping =
                (float)(
                    $item['shipping_charge'] ?? 0
                );


            /*
            |--------------------------------------------------------------------------
            | Product subtotal
            |--------------------------------------------------------------------------
            */

            $productSubtotal =
                $unitPrice * $quantity;


            /*
            |--------------------------------------------------------------------------
            | Line total
            |--------------------------------------------------------------------------
            */

            $lineTotal =
                $productSubtotal + $shipping;


            $itemsHtml .= '

                <tr>

                    <td>
                        ' . $escape($productName) . '

                        ' .
                        (
                            $shipping > 0
                            ?
                            '<br>
                             <small class="shipping">
                             Shipping: INR '
                             . number_format(
                                 $shipping,
                                 2
                             )
                             . '
                             </small>'
                            :
                            ''
                        )
                        . '

                    </td>

                    <td>
                        ' . $quantity . '
                    </td>

                    <td>
                        INR '
                        . number_format(
                            $unitPrice,
                            2
                        )
                        . '
                    </td>

                    <td>
                        INR '
                        . number_format(
                            $lineTotal,
                            2
                        )
                        . '
                    </td>

                </tr>

            ';
        }

    } else {

        /*
        |--------------------------------------------------------------------------
        | VERY OLD ORDER FALLBACK
        |--------------------------------------------------------------------------
        */

        $itemsHtml = '

            <tr>

                <td>
                    Handicraft item
                </td>

                <td>
                    ' .
                    (int)(
                        $order['quantity'] ?? 1
                    )
                    . '
                </td>

                <td>
                    INR '
                    . number_format(
                        (float)(
                            $order['amount'] ?? 0
                        ),
                        2
                    )
                    . '
                </td>

                <td>
                    INR '
                    . number_format(
                        (float)(
                            $order['amount'] ?? 0
                        ),
                        2
                    )
                    . '
                </td>

            </tr>

        ';
    }


    /*
    |--------------------------------------------------------------------------
    | TOTAL
    |--------------------------------------------------------------------------
    |
    | Use orders.amount as the final paid amount because this is
    | the actual order total stored in your orders table.
    |
    |--------------------------------------------------------------------------
    */

    $grandTotal =
        (float)(
            $order['amount'] ?? 0
        );


    /*
    |--------------------------------------------------------------------------
    | RETURN COMPLETE HTML
    |--------------------------------------------------------------------------
    */

    return '

<!doctype html>

<html>

<head>

<meta charset="UTF-8">

<title>
Invoice ' .
$escape(
    $order['invoice_number'] ?? ''
)
. '
</title>


<style>

body {

    font-family: Arial, sans-serif;

    color: #222;

    max-width: 850px;

    margin: 30px auto;

    padding: 20px;

    background: #fff;

}

h1 {

    color: #7c2d12;

    margin-bottom: 4px;

}

.muted {

    color: #666;

}

.header {

    display: flex;

    justify-content: space-between;

    align-items: flex-start;

    margin-bottom: 30px;

}

.company {

    font-size: 14px;

    line-height: 1.6;

}

.invoice-box {

    border: 1px solid #ddd;

    padding: 20px;

    border-radius: 6px;

}

.row {

    display: flex;

    justify-content: space-between;

    padding: 10px 0;

    border-bottom: 1px solid #eee;

}

.customer {

    margin-top: 25px;

    line-height: 1.7;

}

table {

    width: 100%;

    border-collapse: collapse;

    margin-top: 28px;

}

th,
td {

    text-align: left;

    padding: 12px;

    border-bottom: 1px solid #ddd;

}

th {

    background: #f7f7f7;

}

th:last-child,
td:last-child {

    text-align: right;

}

.shipping {

    color: #777;

}

.total {

    font-size: 20px;

    font-weight: 700;

    border-top: 2px solid #222;

    border-bottom: 0;

    margin-top: 10px;

}

.footer {

    margin-top: 35px;

    color: #666;

    font-size: 13px;

}

@media print {

    body {

        margin: 0;

        max-width: none;

    }

}

</style>

</head>


<body>


<div class="header">

    <div>

        <h1>
            Madan Bihari Handicraft
        </h1>

        <p class="muted">
            Payment Invoice
        </p>

    </div>


    <div class="company">

        <strong>
            Invoice No:
        </strong>

        ' .
        $escape(
            $order['invoice_number'] ?? ''
        )
        . '

        <br>

        <strong>
            Date:
        </strong>

        ' .
        $escape($orderDate)
        . '

    </div>

</div>


<div class="invoice-box">


    <div class="customer">

        <strong>
            Bill To
        </strong>

        <br>

        ' .
        $escape(
            $order['customer_name'] ?? ''
        )
        . '

        <br>

        ' .
        $customerEmail
        . '

        <br>

        ' .
        $escape(
            $order['mobile'] ?? ''
        )
        . '

        <br>

        ' .
        $address
        . '

    </div>


    <table>

        <thead>

            <tr>

                <th>
                    Item
                </th>

                <th>
                    Qty
                </th>

                <th>
                    Unit Price
                </th>

                <th>
                    Total
                </th>

            </tr>

        </thead>


        <tbody>

            ' .
            $itemsHtml
            . '

        </tbody>

    </table>


    <div class="row total">

        <span>
            Total Paid
        </span>

        <span>

            INR '
            . number_format(
                $grandTotal,
                2
            )
            . '

        </span>

    </div>


    <p class="muted">

        Payment Method:
        ' .
        $escape(
            $order['payment_method']
            ?? 'Paytm'
        )
        . '

        <br>

        Transaction ID:
        ' .
        $escape(
            $transactionId
        )
        . '

    </p>


</div>


<div class="footer">

    Thank you for shopping with
    Madan Bihari Handicraft.

    <br>

    This is a computer-generated invoice.

</div>


</body>

</html>

';
}


/*
|--------------------------------------------------------------------------
| CREATE + EMAIL INVOICE
|--------------------------------------------------------------------------
*/

function create_and_email_invoice($con, $order_id)
{
    ensure_order_checkout_columns($con);


    /*
    |--------------------------------------------------------------------------
    | GET ORDER
    |--------------------------------------------------------------------------
    */

    $order =
        invoice_order_data(
            $con,
            $order_id
        );


    if (!$order) {

        error_log(
            'Invoice error: Order not found. ID = '
            . (int)$order_id
        );

        return false;
    }


    /*
    |--------------------------------------------------------------------------
    | PAYMENT MUST BE PAID
    |--------------------------------------------------------------------------
    */

    if (
        strtolower(
            trim(
                (string)(
                    $order['payment_status']
                    ?? ''
                )
            )
        ) !== 'paid'
    ) {

        error_log(
            'Invoice not sent. Order '
            . (int)$order_id
            . ' payment status is '
            . ($order['payment_status'] ?? 'EMPTY')
        );

        return false;
    }


    /*
    |--------------------------------------------------------------------------
    | GENERATE INVOICE NUMBER
    |--------------------------------------------------------------------------
    */

    $order['invoice_number'] =
        invoice_number(
            $con,
            $order
        );


    /*
    |--------------------------------------------------------------------------
    | DON'T SEND TWICE
    |--------------------------------------------------------------------------
    */

    if (!empty($order['invoice_sent_at'])) {

        return $order;
    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER EMAIL
    |--------------------------------------------------------------------------
    */

    $customerEmail =
        trim(
            (string)(
                $order['customer_email']
                ?? ''
            )
        );


    if (
        empty($customerEmail) ||
        !filter_var(
            $customerEmail,
            FILTER_VALIDATE_EMAIL
        )
    ) {

        error_log(
            'Invoice email skipped. Invalid customer email for order '
            . (int)$order_id
            . ': '
            . $customerEmail
        );

        return false;
    }


    /*
    |--------------------------------------------------------------------------
    | PHPMailer
    |--------------------------------------------------------------------------
    */

    $mailer = new PHPMailer(true);


    try {

        /*
        |--------------------------------------------------------------------------
        | SMTP
        |--------------------------------------------------------------------------
        */

        $mailer->isSMTP();

        $mailer->Host =
            SMTP_HOST;

        $mailer->SMTPAuth =
            true;

        $mailer->Username =
            SMTP_USERNAME;

        $mailer->Password =
            SMTP_PASSWORD;

        $mailer->SMTPSecure =
            PHPMailer::ENCRYPTION_STARTTLS;

        $mailer->Port =
            SMTP_PORT;


        /*
        |--------------------------------------------------------------------------
        | EMAIL SETTINGS
        |--------------------------------------------------------------------------
        */

        $mailer->CharSet =
            'UTF-8';


        $mailer->setFrom(
            SMTP_USERNAME,
            'Madan Bihari Handicraft'
        );


        $mailer->addAddress(
            $customerEmail,
            $order['customer_name'] ?? ''
        );


        $mailer->isHTML(true);


        $mailer->Subject =
            'Invoice '
            . $order['invoice_number']
            . ' - Madan Bihari Handicraft';


        /*
        |--------------------------------------------------------------------------
        | HTML INVOICE
        |--------------------------------------------------------------------------
        */

        $mailer->Body =
            invoice_html(
                $order
            );


        /*
        |--------------------------------------------------------------------------
        | PLAIN TEXT VERSION
        |--------------------------------------------------------------------------
        */

        $mailer->AltBody =
            'Thank you for your order from Madan Bihari Handicraft.'
            . "\n\n"
            . 'Invoice Number: '
            . $order['invoice_number']
            . "\n"
            . 'Order ID: '
            . (int)$order_id
            . "\n"
            . 'Total Paid: INR '
            . number_format(
                (float)(
                    $order['amount'] ?? 0
                ),
                2
            );


        /*
        |--------------------------------------------------------------------------
        | SEND
        |--------------------------------------------------------------------------
        */

        $mailer->send();


        /*
        |--------------------------------------------------------------------------
        | MARK INVOICE AS SENT
        |--------------------------------------------------------------------------
        */

        $updateResult = mysqli_query(
            $con,
            "
            UPDATE orders

            SET invoice_sent_at = NOW()

            WHERE id = '" .
            (int)$order_id .
            "'
            "
        );


        if (!$updateResult) {

            error_log(
                'Invoice sent but invoice_sent_at update failed for order '
                . (int)$order_id
                . ': '
                . mysqli_error($con)
            );
        }


        return $order;


    } catch (Exception $exception) {

        error_log(
            'Invoice email failed for order '
            . (int)$order_id
            . ': '
            . $exception->getMessage()
        );

        return false;
    }
}