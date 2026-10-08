<?php

require('../include/top.inc.php');

isAdmin();


/* =========================================================
   DELETE ORDER
========================================================= */

if (
    isset($_GET['type']) &&
    $_GET['type'] != ''
) {

    $type = get_safe_value(
        $con,
        $_GET['type']
    );


    if ($type == 'delete') {

        $id = get_safe_value(
            $con,
            $_GET['id']
        );


        /* -------------------------------------------------
           Delete order items first
        ------------------------------------------------- */

        mysqli_query(
            $con,
            "DELETE FROM order_items WHERE order_id='$id'"
        );


        /* -------------------------------------------------
           Delete main order
        ------------------------------------------------- */

        mysqli_query(
            $con,
            "DELETE FROM orders WHERE id='$id'"
        );

    }

}


/* =========================================================
   GET ORDERS
========================================================= */

$sql = "

SELECT
    orders.*

FROM orders

ORDER BY orders.id DESC

";


$res = mysqli_query(
    $con,
    $sql
);

?>

<?php include("../include/head.inc.php"); ?>


<div class="page-breadcrumb">

    <div class="row">

        <div class="col-12 d-flex no-block align-items-center">

            <h4 class="page-title">
                Manage Orders
            </h4>

        </div>

    </div>

</div>



<div class="container-fluid">

    <div class="card">

        <div class="card-header">

            <strong>
                Order List
            </strong>

        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Order ID
                            </th>

                            <th>
                                Customer
                            </th>

                            <th>
                                Mobile
                            </th>

                            <th>
                                Address
                            </th>

                            <th>
                                Product
                            </th>

                            <th>
                                Qty
                            </th>

                            <th>
                                Amount
                            </th>

                            <th>
                                Payment Method
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php

                    while (
                        $row = mysqli_fetch_assoc($res)
                    ) {


                        /* =================================================
                           GET ORDER ITEMS
                        ================================================== */

                        $order_id = (int)$row['id'];


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

                            WHERE order_id='$order_id'

                            ORDER BY id ASC
                            "
                        );


                        $items = [];


                        if ($itemsQuery) {

                            while (
                                $item = mysqli_fetch_assoc(
                                    $itemsQuery
                                )
                            ) {

                                $items[] = $item;

                            }

                        }


                        /* =================================================
                           DETERMINE OLD / NEW ORDER
                        ================================================== */

                        $isNewMultiProductOrder =
                            !empty($items);


                    ?>


                    <tr>


                        <!-- ============================================
                             ID
                        ============================================= -->

                        <td>

                            <?php
                            echo (int)$row['id'];
                            ?>

                        </td>


                        <!-- ============================================
                             ORDER ID
                        ============================================= -->

                        <td>

                            <?php

                            echo htmlspecialchars(
                                $row['order_id'] ?? '',
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </td>


                        <!-- ============================================
                             CUSTOMER
                        ============================================= -->

                        <td>

                            <?php

                            echo htmlspecialchars(
                                $row['customer_name'] ?? '',
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </td>


                        <!-- ============================================
                             MOBILE
                        ============================================= -->

                        <td>

                            <?php

                            echo htmlspecialchars(
                                $row['mobile'] ?? '',
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </td>


                        <!-- ============================================
                             ADDRESS
                        ============================================= -->

                        <td>

                            <?php

                            echo nl2br(
                                htmlspecialchars(
                                    $row['address'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                )
                            );

                            ?>

                        </td>


                        <!-- ============================================
                             PRODUCT
                        ============================================= -->

                        <td>

                            <?php if ($isNewMultiProductOrder): ?>


                                <?php foreach ($items as $item): ?>

                                    <div
                                        style="
                                            margin-bottom:8px;
                                            padding-bottom:8px;
                                            border-bottom:1px solid #eee;
                                        "
                                    >

                                        <strong>

                                            <?php

                                            echo htmlspecialchars(
                                                $item['product_name'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            );

                                            ?>

                                        </strong>

                                    </div>

                                <?php endforeach; ?>


                            <?php else: ?>


                                <?php

                                /*
                                 * OLD ORDER
                                 *
                                 * Fetch product from
                                 * orders.product_id
                                 */

                                $oldProductName = '';


                                if (
                                    !empty(
                                        $row['product_id']
                                    )
                                ) {

                                    $oldProductId =
                                        (int)$row['product_id'];


                                    $oldProductQuery =
                                        mysqli_query(
                                            $con,
                                            "
                                            SELECT name
                                            FROM products
                                            WHERE id='$oldProductId'
                                            LIMIT 1
                                            "
                                        );


                                    if (
                                        $oldProductQuery &&
                                        mysqli_num_rows(
                                            $oldProductQuery
                                        ) > 0
                                    ) {

                                        $oldProduct =
                                            mysqli_fetch_assoc(
                                                $oldProductQuery
                                            );

                                        $oldProductName =
                                            $oldProduct['name'];

                                    }

                                }


                                if (
                                    $oldProductName != ''
                                ) {

                                    echo htmlspecialchars(
                                        $oldProductName,
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                } else {

                                    echo '<span class="text-muted">';
                                    echo 'No product';
                                    echo '</span>';

                                }

                                ?>


                            <?php endif; ?>

                        </td>


                        <!-- ============================================
                             QUANTITY
                        ============================================= -->

                        <td>

                            <?php if ($isNewMultiProductOrder): ?>


                                <?php foreach ($items as $item): ?>

                                    <div
                                        style="
                                            margin-bottom:8px;
                                            padding-bottom:8px;
                                            border-bottom:1px solid #eee;
                                        "
                                    >

                                        <?php

                                        echo (int)$item['quantity'];

                                        ?>

                                    </div>

                                <?php endforeach; ?>


                            <?php else: ?>


                                <?php

                                /*
                                 * OLD SINGLE PRODUCT ORDER
                                 */

                                echo (int)(
                                    $row['quantity'] ?? 0
                                );

                                ?>


                            <?php endif; ?>

                        </td>


                        <!-- ============================================
                             AMOUNT
                        ============================================= -->

                        <td>

                            ₹<?php

                            echo number_format(
                                (float)$row['amount'],
                                2
                            );

                            ?>

                        </td>


                        <!-- ============================================
                             PAYMENT METHOD
                        ============================================= -->

                        <td>

                            <?php

                            echo htmlspecialchars(
                                $row['payment_method'] ?? '',
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </td>


                        <!-- ============================================
                             PAYMENT STATUS
                        ============================================= -->

                        <td>

                            <?php

                            $paymentStatus =
                                $row['payment_status'] ?? '';

                            ?>


                            <?php if (
                                strtolower(
                                    $paymentStatus
                                ) === 'paid'
                            ): ?>

                                <span class="badge bg-success">

                                    Paid

                                </span>


                            <?php elseif (
                                strtolower(
                                    $paymentStatus
                                ) === 'pending'
                            ): ?>

                                <span class="badge bg-warning text-dark">

                                    Pending

                                </span>


                            <?php elseif (
                                strtolower(
                                    $paymentStatus
                                ) === 'failed'
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


                        <!-- ============================================
                             DATE
                        ============================================= -->

                        <td>

                            <?php

                            echo date(
                                'd M Y h:i A',
                                strtotime(
                                    $row['created_at']
                                )
                            );

                            ?>

                        </td>


                        <!-- ============================================
                             ACTION
                        ============================================= -->

                        <td>

                            <a
                                class="btn btn-info btn-sm"
                                href="order_details.php?id=<?php echo (int)$row['id']; ?>"
                            >
                                View
                            </a>


                            <a
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this order?')"
                                href="?type=delete&id=<?php echo (int)$row['id']; ?>"
                            >
                                Delete
                            </a>

                        </td>


                    </tr>


                    <?php

                    }

                    ?>


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>