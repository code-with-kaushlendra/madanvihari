<?php

require('../include/top.inc.php');

isAdmin();


/*
|--------------------------------------------------------------------------
| GET ORDER ID
|--------------------------------------------------------------------------
*/

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die("Invalid Order ID");
}


/*
|--------------------------------------------------------------------------
| GET MAIN ORDER
|--------------------------------------------------------------------------
|
| orders contains customer/payment/order information.
|
*/

$sql = "
    SELECT *
    FROM orders
    WHERE id='$id'
    LIMIT 1
";

$res = mysqli_query($con, $sql);

if (!$res) {
    die("Order query failed: " . mysqli_error($con));
}

$order = mysqli_fetch_assoc($res);

if (!$order) {
    die("Order not found");
}


/*
|--------------------------------------------------------------------------
| GET ORDER ITEMS
|--------------------------------------------------------------------------
|
| New orders can contain multiple products.
|
*/

$items = array();

$itemsQuery = mysqli_query(
    $con,
    "
    SELECT
        product_id,
        product_name,
        quantity,
        unit_price,
        shipping_charge,
        total_price

    FROM order_items

    WHERE order_id='$id'

    ORDER BY id ASC
    "
);

if ($itemsQuery) {

    while ($item = mysqli_fetch_assoc($itemsQuery)) {

        $items[] = $item;
    }
}


/*
|--------------------------------------------------------------------------
| CHECK WHETHER THIS IS A NEW MULTI-PRODUCT ORDER
|--------------------------------------------------------------------------
*/

$isMultiProductOrder = !empty($items);


/*
|--------------------------------------------------------------------------
| OLD SINGLE PRODUCT FALLBACK
|--------------------------------------------------------------------------
|
| If there are no order_items, use orders.product_id.
|
*/

$oldProduct = null;

if (!$isMultiProductOrder && !empty($order['product_id'])) {

    $productId = (int)$order['product_id'];

    $productQuery = mysqli_query(
        $con,
        "
        SELECT
            id,
            name,
            image,
            price,
            sale_price,
            shipping_charge

        FROM products

        WHERE id='$productId'

        LIMIT 1
        "
    );

    if ($productQuery) {

        $oldProduct = mysqli_fetch_assoc($productQuery);
    }
}


include("../include/head.inc.php");

?>

<div class="container-fluid">

    <div class="card">

        <div class="card-header">

            <h3>
                Order Details
            </h3>

        </div>


        <div class="card-body">

            <table class="table table-bordered">


                <!-- =====================================================
                     ORDER ID
                ====================================================== -->

                <tr>

                    <th>
                        Order ID
                    </th>

                    <td>

                        <?php
                        echo (int)$order['id'];
                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     CUSTOMER
                ====================================================== -->

                <tr>

                    <th>
                        Customer
                    </th>

                    <td>

                        <?php

                        echo htmlspecialchars(
                            $order['customer_name'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     EMAIL
                ====================================================== -->

                <tr>

                    <th>
                        Email
                    </th>

                    <td>

                        <?php

                        echo htmlspecialchars(
                            $order['customer_email'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     MOBILE
                ====================================================== -->

                <tr>

                    <th>
                        Mobile
                    </th>

                    <td>

                        <?php

                        echo htmlspecialchars(
                            $order['mobile'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     ADDRESS
                ====================================================== -->

                <tr>

                    <th>
                        Address
                    </th>

                    <td>

                        <?php

                        echo nl2br(
                            htmlspecialchars(
                                $order['address'] ?? '',
                                ENT_QUOTES,
                                'UTF-8'
                            )
                        );

                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     CITY
                ====================================================== -->

                <tr>

                    <th>
                        City
                    </th>

                    <td>

                        <?php

                        echo htmlspecialchars(
                            $order['city'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     STATE
                ====================================================== -->

                <tr>

                    <th>
                        State
                    </th>

                    <td>

                        <?php

                        echo htmlspecialchars(
                            $order['state'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     PIN CODE
                ====================================================== -->

                <tr>

                    <th>
                        PIN Code
                    </th>

                    <td>

                        <?php

                        echo htmlspecialchars(
                            $order['pin_code'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     PRODUCT
                ====================================================== -->

                <tr>

                    <th>
                        Product
                    </th>

                    <td>

                        <?php if ($isMultiProductOrder): ?>


                            <?php foreach ($items as $item): ?>

                                <div style="
                                    padding:8px 0;
                                    border-bottom:1px solid #eee;
                                ">

                                    <?php

                                    echo htmlspecialchars(
                                        $item['product_name'] ?? 'Product',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                    ?>

                                </div>

                            <?php endforeach; ?>


                        <?php elseif ($oldProduct): ?>


                            <?php

                            echo htmlspecialchars(
                                $oldProduct['name'],
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>


                        <?php else: ?>


                            <span class="text-muted">
                                No product
                            </span>


                        <?php endif; ?>

                    </td>

                </tr>


                <!-- =====================================================
                     QUANTITY
                ====================================================== -->

                <tr>

                    <th>
                        Quantity
                    </th>

                    <td>

                        <?php if ($isMultiProductOrder): ?>


                            <?php foreach ($items as $item): ?>

                                <div style="
                                    padding:8px 0;
                                    border-bottom:1px solid #eee;
                                ">

                                    <?php

                                    echo (int)(
                                        $item['quantity'] ?? 0
                                    );

                                    ?>

                                </div>

                            <?php endforeach; ?>


                        <?php else: ?>


                            <?php

                            echo (int)(
                                $order['quantity'] ?? 0
                            );

                            ?>


                        <?php endif; ?>

                    </td>

                </tr>


                <!-- =====================================================
                     UNIT PRICE
                ====================================================== -->

                <?php if ($isMultiProductOrder): ?>

                    <tr>

                        <th>
                            Unit Price
                        </th>

                        <td>

                            <?php foreach ($items as $item): ?>

                                <div style="
                                    padding:8px 0;
                                    border-bottom:1px solid #eee;
                                ">

                                    ₹<?php

                                    echo number_format(
                                        (float)(
                                            $item['unit_price'] ?? 0
                                        ),
                                        2
                                    );

                                    ?>

                                </div>

                            <?php endforeach; ?>

                        </td>

                    </tr>

                <?php endif; ?>


                <!-- =====================================================
                     SHIPPING
                ====================================================== -->

                <?php if ($isMultiProductOrder): ?>

                    <tr>

                        <th>
                            Shipping
                        </th>

                        <td>

                            <?php foreach ($items as $item): ?>

                                <div style="
                                    padding:8px 0;
                                    border-bottom:1px solid #eee;
                                ">

                                    ₹<?php

                                    echo number_format(
                                        (float)(
                                            $item['shipping_charge'] ?? 0
                                        ),
                                        2
                                    );

                                    ?>

                                </div>

                            <?php endforeach; ?>

                        </td>

                    </tr>

                <?php endif; ?>


                <!-- =====================================================
                     ITEM TOTAL
                ====================================================== -->

                <?php if ($isMultiProductOrder): ?>

                    <tr>

                        <th>
                            Item Total
                        </th>

                        <td>

                            <?php foreach ($items as $item): ?>

                                <div style="
                                    padding:8px 0;
                                    border-bottom:1px solid #eee;
                                ">

                                    ₹<?php

                                    echo number_format(
                                        (float)(
                                            $item['total_price'] ?? 0
                                        ),
                                        2
                                    );

                                    ?>

                                </div>

                            <?php endforeach; ?>

                        </td>

                    </tr>

                <?php endif; ?>


                <!-- =====================================================
                     FINAL ORDER AMOUNT
                ====================================================== -->

                <tr>

                    <th>
                        Amount
                    </th>

                    <td>

                        <strong>

                            ₹<?php

                            echo number_format(
                                (float)(
                                    $order['amount'] ?? 0
                                ),
                                2
                            );

                            ?>

                        </strong>

                    </td>

                </tr>


                <!-- =====================================================
                     PAYMENT METHOD
                ====================================================== -->

                <tr>

                    <th>
                        Payment Method
                    </th>

                    <td>

                        <?php

                        echo htmlspecialchars(
                            $order['payment_method'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        ?>

                    </td>

                </tr>


                <!-- =====================================================
                     PAYMENT STATUS
                ====================================================== -->

                <tr>

                    <th>
                        Payment Status
                    </th>

                    <td>

                        <?php

                        $paymentStatus =
                            $order['payment_status'] ?? '';

                        ?>

                        <?php if (
                            strtolower($paymentStatus) === 'paid'
                        ): ?>

                            <span class="badge bg-success">
                                Paid
                            </span>

                        <?php elseif (
                            strtolower($paymentStatus) === 'pending'
                        ): ?>

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        <?php elseif (
                            strtolower($paymentStatus) === 'failed'
                        ): ?>

                            <span class="badge bg-danger">
                                Failed
                            </span>

                        <?php else: ?>

                            <span class="badge bg-secondary">

                                <?php

                                echo htmlspecialchars(
                                    $paymentStatus,
                                    ENT_QUOTES,
                                    'UTF-8'
                                );

                                ?>

                            </span>

                        <?php endif; ?>

                    </td>

                </tr>


                <!-- =====================================================
                     PAYMENT ID
                ====================================================== -->

                <!--<tr>-->

                <!--    <th>-->
                <!--        Payment ID-->
                <!--    </th>-->

                <!--    <td>-->

                <!--        < ?php-->

                <!--        echo htmlspecialchars(-->
                <!--            $order['payment_id'] ?? '',-->
                <!--            ENT_QUOTES,-->
                <!--            'UTF-8'-->
                <!--        );-->

                <!--        ?>-->

                <!--    </td>-->

                <!--</tr>-->


                <!-- =====================================================
                     INVOICE NUMBER
                ====================================================== -->

                <?php if (!empty($order['invoice_number'])): ?>

                    <tr>

                        <th>
                            Invoice Number
                        </th>

                        <td>

                            <?php

                            echo htmlspecialchars(
                                $order['invoice_number'],
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </td>

                    </tr>

                <?php endif; ?>


                <!-- =====================================================
                     INVOICE SENT
                ====================================================== -->

                <?php if (!empty($order['invoice_sent_at'])): ?>

                    <tr>

                        <th>
                            Invoice Sent At
                        </th>

                        <td>

                            <?php

                            echo date(
                                'd M Y h:i A',
                                strtotime(
                                    $order['invoice_sent_at']
                                )
                            );

                            ?>

                        </td>

                    </tr>

                <?php endif; ?>


                <!-- =====================================================
                     ORDER DATE
                ====================================================== -->

                <tr>

                    <th>
                        Order Date
                    </th>

                    <td>

                        <?php

                        echo date(
                            'd M Y h:i A',
                            strtotime(
                                $order['created_at']
                            )
                        );

                        ?>

                    </td>

                </tr>


            </table>


            <a
                href="manage_order.php"
                class="btn btn-primary"
            >
                Back
            </a>


        </div>

    </div>

</div>