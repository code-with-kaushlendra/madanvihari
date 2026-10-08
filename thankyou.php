<?php

include 'include/conn.php';


// ============================================================
// GET ORDER ID
// ============================================================

$order_id = isset($_GET['id'])
    ? (int)$_GET['id']
    : 0;

if ($order_id <= 0) {
    die("Invalid Order");
}


// ============================================================
// GET ORDER
// ============================================================

$sql = "
    SELECT *
    FROM orders
    WHERE id = '$order_id'
    LIMIT 1
";

$result = mysqli_query($con, $sql);

if (!$result) {
    die(
        "Database error: " .
        htmlspecialchars(mysqli_error($con))
    );
}

$order = mysqli_fetch_assoc($result);

if (!$order) {
    die("Invalid Order");
}


// ============================================================
// PAYMENT STATUS CHECK
// ============================================================

if (
    !isset($order['payment_status']) ||
    strtolower(trim($order['payment_status'])) !== 'paid'
) {
    die("Payment for this order has not been confirmed.");
}


// ============================================================
// GET ORDER ITEM
//
// IMPORTANT:
// We use order_items.order_id = orders.id
//
// NOT:
// order_items.id = products.id
// ============================================================

$item = null;

$itemQuery = mysqli_query(
    $con,
    "
    SELECT
        oi.id AS order_item_id,
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

    LIMIT 1
    "
);

if (!$itemQuery) {
    die(
        "Order item database error: " .
        htmlspecialchars(mysqli_error($con))
    );
}

$item = mysqli_fetch_assoc($itemQuery);

if (!$item) {
    die("No product found for this order.");
}


// ============================================================
// PRODUCT INFORMATION
// ============================================================

$product = [
    'id' => (int)($item['product_id'] ?? 0),

    'name' => !empty($item['product_name'])
        ? $item['product_name']
        : (
            !empty($item['product_db_name'])
                ? $item['product_db_name']
                : 'Your Order'
        ),

    'image' => $item['product_image'] ?? ''
];


// ============================================================
// QUANTITY
// ============================================================
//
// Quantity MUST come from order_items.quantity
//

$order_quantity = (int)($item['quantity'] ?? 0);


// ============================================================
// UNIT PRICE
// ============================================================

$unit_price = (float)($item['unit_price'] ?? 0);


// ============================================================
// ITEM TOTAL
// ============================================================

$item_total = (float)($item['total_price'] ?? 0);


// ============================================================
// PAYTM TRANSACTION ID
// ============================================================

$paytm_transaction_id = 'N/A';

if (!empty($order['paytm_txn_id'])) {

    $paytm_transaction_id =
        $order['paytm_txn_id'];

} elseif (!empty($order['payment_id'])) {

    /*
     * Fallback only if payment_id contains
     * the Paytm transaction ID.
     */

    $paytm_transaction_id =
        $order['payment_id'];
}


// ============================================================
// PRODUCT IMAGE PATH
// ============================================================

$product_image = '';

if (!empty($product['image'])) {

    $product_image =
        'admin/assets/images/products/' .
        $product['image'];
}

?>
<style>
    .checkout-container {
        max-width: 700px;
        margin: 60px auto;
        padding: 20px;
    }

    .checkout-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
        padding: 35px;
        border: 1px solid #eee;
    }

    .checkout-card h2 {
        font-size: 32px;
        margin-bottom: 25px;
        color: #a13c86;
        text-align: center;
    }

    .product-summary {
        background: #fff7f3;
        border: 1px solid #f2d7c8;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .product-summary h3 {
        margin-bottom: 20px;
        color: #444;
        font-size: 24px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 17px;
    }

    .summary-row.total {
        border-top: 1px solid #ddd;
        padding-top: 15px;
        margin-top: 15px;
        font-size: 22px;
        color: #c16d1d;
        font-weight: 700;
    }

    .checkout-form .form-group {
        margin-bottom: 18px;
    }

    .checkout-form input,
    .checkout-form textarea,
    .checkout-form select {

        width: 100%;
        padding: 14px 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        transition: .3s;
        box-sizing: border-box;
    }

    .checkout-form textarea {
        resize: vertical;
        min-height: 120px;
    }

    .checkout-form input:focus,
    .checkout-form textarea:focus,
    .checkout-form select:focus {

        outline: none;
        border-color: #cb4dc6;
        box-shadow: 0 0 10px rgba(203, 77, 198, .2);
    }

    .checkout-btn {

        width: 100%;
        border: none;
        border-radius: 8px;
        padding: 16px;
        font-size: 18px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        transition: .3s;
        background: linear-gradient(90deg, #cb2dd1, #8b6bd8);
    }

    .checkout-btn:hover {

        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .18);
    }
</style>

<!doctype html>
<html class="js" lang="en">
<?php include('include/head.php'); ?>


<body class="gradient animate--hover-3d-lift">
    <a class="skip-to-content-link button visually-hidden" href="#MainContent">
        Skip to content </a><!-- BEGIN sections: header-group -->
    <div
        id="shopify-section-sections--20655586246721__announcement-bar"
        class="shopify-section shopify-section-group-header-group announcement-bar-section">
        <link
            href="assets/css/component-slideshow244c.css"
            rel="stylesheet"
            type="text/css"
            media="all" />
        <link
            href="assets/css/component-sliderf699.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/component-list-socialf800.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <?php include('links/topheader.php'); ?>
    </div>
    <div
        id="shopify-section-sections--20655586246721__blocks_8Ht9HN"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__header"
        class="shopify-section shopify-section-group-header-group section-header">
        <link
            rel="stylesheet"
            href="assets/css/component-list-menu717c.css"
            media="print"
            onload="this.media = 'all'" />
        <link
            rel="stylesheet"
            href="assets/css/component-search2677.css"
            media="print"
            onload="this.media = 'all'" />
        <link
            rel="stylesheet"
            href="assets/css/component-menu-drawer97e4.css"
            media="print"
            onload="this.media = 'all'" />
        <link
            rel="stylesheet"
            href="assets/css/component-cart-notification585f.css"
            media="print"
            onload="this.media = 'all'" />
        <link
            rel="stylesheet"
            href="assets/css/component-priced9e8.css"
            media="print"
            onload="this.media = 'all'" />
        <link
            rel="stylesheet"
            href="assets/css/component-mega-menu3890.css"
            media="print"
            onload="this.media = 'all'" />
        <style>
            header-drawer {
                justify-self: start;
                margin-left: -1.2rem;
            }

            @media screen and (min-width: 990px) {
                header-drawer {
                    display: none;
                }
            }

            .menu-drawer-container {
                display: flex;
            }

            .list-menu {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .list-menu--inline {
                display: inline-flex;
                flex-wrap: wrap;
            }

            summary.list-menu__item {
                padding-right: 2.7rem;
            }

            .list-menu__item {
                display: flex;
                align-items: center;
                line-height: calc(1 + 0.3 / var(--font-body-scale));
                font-size: 16px;
            }

            .list-menu__item--link {
                text-decoration: none;
                padding-bottom: 1rem;
                padding-top: 1rem;
                line-height: calc(1 + 0.8 / var(--font-body-scale));
            }

            @media screen and (min-width: 750px) {
                .list-menu__item--link {
                    padding-bottom: 0.5rem;
                    padding-top: 0.5rem;
                }
            }
        </style>
        <style data-shopify>
            .header {
                padding: 0px 3rem 0px 3rem;
            }

            .section-header {
                position: sticky;
                /* This is for fixing a Safari z-index issue. PR #2147 */
                margin-bottom: 0px;
            }

            @media screen and (min-width: 750px) {
                .section-header {
                    margin-bottom: 0px;
                }
            }

            @media screen and (min-width: 990px) {
                .header {
                    padding-top: 0px;
                    padding-bottom: 0px;
                }
            }
        </style>
        <script src="assets/js/cart-notification58c3.js" defer="defer"></script>

        <sticky-header
            data-sticky-type="on-scroll-up"
            class="header-wrapper color-scheme-5 gradient">
            <?php include('include/header.php'); ?>

        </sticky-header>

        <cart-notification>
            <div class="cart-notification-wrapper page-width">
                <div
                    id="cart-notification"
                    class="cart-notification focus-inset color-scheme-5 gradient"
                    aria-modal="true"
                    aria-label="Item added to your cart"
                    role="dialog"
                    tabindex="-1">
                    <div class="cart-notification__header">
                        <h2 class="cart-notification__heading caption-large text-body">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                class="icon icon-checkmark"
                                viewBox="0 0 12 9">
                                <path
                                    fill="currentColor"
                                    fill-rule="evenodd"
                                    d="M11.35.643a.5.5 0 0 1 .006.707l-6.77 6.886a.5.5 0 0 1-.719-.006L.638 4.845a.5.5 0 1 1 .724-.69l2.872 3.011 6.41-6.517a.5.5 0 0 1 .707-.006z"
                                    clip-rule="evenodd" />
                            </svg>
                            Item added to your cart
                        </h2>
                        <button
                            type="button"
                            class="cart-notification__close modal__close-button link link--text focus-inset"
                            aria-label="Close">
                            <span class="svg-wrapper"><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    class="icon icon-close"
                                    viewBox="0 0 18 17">
                                    <path
                                        fill="currentColor"
                                        d="M.865 15.978a.5.5 0 0 0 .707.707l7.433-7.431 7.579 7.282a.501.501 0 0 0 .846-.37.5.5 0 0 0-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 1 0-.707-.708L8.991 7.853 1.413.573a.5.5 0 1 0-.693.72l7.563 7.268z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div
                        id="cart-notification-product"
                        class="cart-notification-product"></div>
                    <div class="cart-notification__links">
                        <a
                            href="cart.php"
                            id="cart-notification-button"
                            class="button button--secondary button--full-width">View cart</a>
                        <form
                            action="cart.php"
                            method="post"
                            id="cart-notification-form">
                            <button
                                class="button button--primary button--full-width"
                                name="checkout">
                                Check out
                            </button>
                        </form>
                        <button type="button" class="link button-label">
                            Continue shopping
                        </button>
                    </div>
                </div>
            </div>
        </cart-notification>
        <style data-shopify>
            .cart-notification {
                display: none;
            }
        </style>

        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Organization",
                "name": "My Store",

                "logo": "https:\/\/c1esm2-av.myshopify.com\/cdn\/shop\/files\/Madan_Bihari_graphic_logo_15f2c70d-f090-4dc8-bd4d-d8265e4181da.svg?v=1783409269\u0026width=500",

                "sameAs": [
                    "",
                    "cart.html\/\/www.facebook.com\/profile.php?id=61590971671129",
                    "",
                    "cart.html\/\/www.instagram.com\/madan_bihari_handicraft?utm_source=qr",
                    "",
                    "",
                    "",
                    "",
                    ""
                ],
                "url": "https:\/\/c1esm2-av.myshopify.com"
            }
        </script>
    </div>
    <div
        id="shopify-section-sections--20655586246721__blocks_D9A789"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__blocks_qNNJmA"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__blocks_QYhRKX"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__blocks_U47FDL"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__blocks_mtTyPT"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__1783582282c0a89740"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__17834971636385ef0d"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__blocks_QVD3Kt"
        class="shopify-section shopify-section-group-header-group"></div>
    <div
        id="shopify-section-sections--20655586246721__blocks_VUEKXk"
        class="shopify-section shopify-section-group-header-group"></div>
    <!-- END sections: header-group -->

    <main
    id="MainContent"
    class="content-for-layout focus-none"
    role="main"
    tabindex="-1"
    data-template="cart">

    <div
        id="shopify-section-template--20655585656897__cart-items"
        class="shopify-section">

        <!-- =========================================
             CART CSS
        ========================================== -->

        <link
            href="assets/css/component-cart690c.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/component-cart-itemsfc90.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/component-totalsa6a8.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/component-priced9e8.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/component-discounts4018.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/quantity-popover7f94.css"
            rel="stylesheet"
            type="text/css"
            media="all" />


        <style>

            /* =========================================
               THANK YOU PAGE
            ========================================== */

            .section-template--20655585656897__cart-items-padding {
                padding-top: 27px;
                padding-bottom: 27px;
            }

            @media screen and (min-width: 750px) {
                .section-template--20655585656897__cart-items-padding {
                    padding-top: 36px;
                    padding-bottom: 36px;
                }
            }


            .thankyou-wrap {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 50px 15px;
            }


            .thankyou-grid {
                max-width: 1000px;
                width: 100%;
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
            }


            @media (min-width: 900px) {

                .thankyou-grid {
                    grid-template-columns: 1fr 360px;
                    align-items: start;
                }

            }


            .card-plain {
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
                padding: 25px;
                border: 1px solid #f0e9f6;
            }


            /* =========================================
               SUCCESS HEADER
            ========================================== */

            .thankyou-hero {
                text-align: center;
                padding: 10px 6px 20px;
                margin-bottom: 10px;
            }


            .thankyou-hero h2 {
                color: #5b2d90;
                margin: 6px 0 10px;
                font-size: 30px;
                line-height: 1.3;
            }


            .thankyou-hero p {
                color: #444;
                margin: 0;
                line-height: 1.6;
            }


            /* =========================================
               PRODUCT
            ========================================== */

            .product-card {
                display: flex;
                gap: 18px;
                align-items: center;
                padding-top: 10px;
            }


            .product-card img {
                width: 140px;
                height: 140px;
                object-fit: cover;
                border-radius: 10px;
                border: 1px solid #eee;
                flex-shrink: 0;
            }


            .product-info {
                flex: 1;
            }


            .product-info h3 {
                margin: 0 0 10px 0;
                font-size: 20px;
                line-height: 1.4;
                color: #222;
            }


            .muted {
                color: #666;
            }


            .product-info p {
                margin: 7px 0;
            }


            /* =========================================
               ORDER SUMMARY
            ========================================== */

            .summary-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 15px;
                padding: 12px 0;
                border-top: 1px dashed #eee;
            }


            .summary-row strong {
                color: #333;
                text-align: right;
            }


            /* =========================================
               CUSTOMER DETAILS
            ========================================== */

            .order-details-title {
                margin-top: 0;
                margin-bottom: 20px;
                font-size: 21px;
                color: #333;
            }


            .info-list p {
                margin: 10px 0;
                line-height: 1.6;
                color: #444;
            }


            .info-list strong {
                color: #222;
            }


            .paytm-payment-id {
                word-break: break-all;
            }


            /* =========================================
               PAYMENT SUCCESS
            ========================================== */

            .payment-success {
                margin-top: 20px;
                padding: 14px 16px;
                border-radius: 8px;
                background: #eefaf2;
                border: 1px solid #c8e8d2;
                color: #26733e;
                font-size: 14px;
                line-height: 1.5;
            }


            /* =========================================
               MOBILE
            ========================================== */

            @media (max-width: 749px) {

                .thankyou-wrap {
                    padding: 30px 12px;
                }


                .card-plain {
                    padding: 18px;
                }


                .thankyou-hero h2 {
                    font-size: 25px;
                }


                .product-card {
                    align-items: flex-start;
                    gap: 14px;
                }


                .product-card img {
                    width: 100px;
                    height: 100px;
                }


                .product-info h3 {
                    font-size: 17px;
                }


                .summary-row {
                    font-size: 14px;
                }

            }


            @media (max-width: 480px) {

                .product-card {
                    flex-direction: column;
                }


                .product-card img {
                    width: 120px;
                    height: 120px;
                }


                .product-info {
                    width: 100%;
                }


                .thankyou-hero h2 {
                    font-size: 22px;
                }

            }
            
            
            /* =========================================
   DOWNLOAD INVOICE BUTTON
========================================= */

.download-invoice-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    margin-top: 22px;
    padding: 13px 22px;

    background: #7c2d12;
    color: #fff;

    border-radius: 8px;
    text-decoration: none;

    font-size: 15px;
    font-weight: 600;

    transition: all 0.3s ease;
}

.download-invoice-btn:hover {
    background: #5f210e;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

.download-invoice-btn svg {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
}

@media (max-width: 480px) {

    .download-invoice-btn {
        width: 100%;
        box-sizing: border-box;
        padding: 13px 18px;
    }

}

        </style>


        <!-- =========================================
             EXISTING CART JS
        ========================================== -->

        <script
            src="assets/js/cart0c64.js"
            defer="defer"></script>

        <script
            src="assets/js/quantity-popover5de7.js"
            defer="defer"></script>


        <!-- =========================================
             THANK YOU CONTENT
        ========================================== -->

        <div class="thankyou-wrap">

            <div class="thankyou-grid">


                <!-- =====================================
                     LEFT CARD
                ====================================== -->

                <div class="card-plain">

                    <div class="thankyou-hero">

                        <h2>
                            Thank you — your order is confirmed!
                        </h2>

                        <p>
                            Your payment has been successfully received.
                            Your order details are shown below.
                        </p>

                    </div>


                    <!-- =================================
                         PRODUCT
                    ================================== -->

                  <div class="product-card">

    <?php if (!empty($product_image)): ?>

        <img
            src="<?= htmlspecialchars($product_image); ?>"
            alt="<?= htmlspecialchars($product['name']); ?>"
            loading="lazy">

    <?php endif; ?>


    <div class="product-info">

        <h3>
            <?php
            echo htmlspecialchars(
                $product['name']
            );
            ?>
        </h3>


        <p class="muted">

            Price:
            ₹<?php
            echo number_format(
                $unit_price,
                2
            );
            ?>

        </p>


        <p class="muted">

            Quantity:
            <?php
            echo $order_quantity;
            ?>

        </p>


        <p class="muted">

            Total:

            <strong>
                ₹<?php
                echo number_format(
                    $item_total,
                    2
                );
                ?>
            </strong>

        </p>

    </div>

</div>

                    <!-- =================================
                         ORDER DATE
                    ================================== -->

                    <div style="margin-top:20px;">

                        <div class="summary-row">

                            <span class="muted">
                                Order Placed
                            </span>

                            <strong>

                                <?php

                                echo date(
                                    'd M Y H:i',
                                    strtotime(
                                        $order['created_at']
                                        ?? $order['date']
                                        ?? date('Y-m-d H:i')
                                    )
                                );

                                ?>

                            </strong>

                        </div>

                    </div>


                    <!-- =================================
                         PAYMENT SUCCESS MESSAGE
                    ================================== -->

                    <div class="payment-success">

                        <strong>
                            Payment Successful
                        </strong>

                        <br>

                        Your Paytm payment has been successfully
                        verified and your order is confirmed.

                    </div>
                    
                    <a
    href="invoice.php?id=<?= (int)$order['id']; ?>"
    class="download-invoice-btn"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Download Invoice">

    <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2">

        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 3v12m0 0l4-4m-4 4l-4-4M5 21h14" />

    </svg>

    Download Invoice

</a>
                    
                    

                </div>


                <!-- =====================================
                     RIGHT CARD
                ====================================== -->

                <div class="card-plain">

                    <h3 class="order-details-title">
                        Order & Customer Details
                    </h3>


                    <div class="info-list">


                        <!-- ORDER ID -->

                        <p>

                            <strong>
                                Order ID:
                            </strong>

                            <?php
                            echo htmlspecialchars(
                                $order['id']
                            );
                            ?>

                        </p>


                        <!-- PAYTM TRANSACTION ID -->

                        <p>

                            <strong>
                                Paytm Transaction ID:
                            </strong>

                            <span class="paytm-payment-id">

                                <?php

                                /*
                                 * Primary field:
                                 * paytm_txn_id
                                 *
                                 * Fallback:
                                 * payment_id
                                 *
                                 * No Razorpay field is used.
                                 */

                                if (!empty($order['paytm_txn_id'])) {

                                    echo htmlspecialchars(
                                        $order['paytm_txn_id']
                                    );

                                } elseif (!empty($order['payment_id'])) {

                                    echo htmlspecialchars(
                                        $order['payment_id']
                                    );

                                } else {

                                    echo 'N/A';

                                }

                                ?>

                            </span>

                        </p>


                        <!-- PAYMENT STATUS -->

                        <p>

                            <strong>
                                Payment Status:
                            </strong>

                            <span style="color:#26733e;font-weight:600;">

                                <?php
                                echo htmlspecialchars(
                                    $order['payment_status'] ?? 'Paid'
                                );
                                ?>

                            </span>

                        </p>


                        <!-- CUSTOMER NAME -->

                        <p>

                            <strong>
                                Name:
                            </strong>

                            <?php
                            echo htmlspecialchars(
                                $order['customer_name'] ?? ''
                            );
                            ?>

                        </p>


                        <!-- MOBILE -->

                        <p>

                            <strong>
                                Mobile:
                            </strong>

                            <?php
                            echo htmlspecialchars(
                                $order['mobile'] ?? ''
                            );
                            ?>

                        </p>


                        <!-- ADDRESS -->

                        <p>

                            <strong>
                                Address:
                            </strong>

                            <br>

                            <?php

                            echo nl2br(
                                htmlspecialchars(
                                    $order['address'] ?? ''
                                )
                            );

                            ?>

                        </p>


                        <!-- CITY -->

                        <?php if (!empty($order['city'])): ?>

                            <p>

                                <strong>
                                    City:
                                </strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['city']
                                );
                                ?>

                            </p>

                        <?php endif; ?>


                        <!-- STATE -->

                        <?php if (!empty($order['state'])): ?>

                            <p>

                                <strong>
                                    State:
                                </strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['state']
                                );
                                ?>

                            </p>

                        <?php endif; ?>


                        <!-- PINCODE -->

                        <?php if (!empty($order['pincode'])): ?>

                            <p>

                                <strong>
                                    Pincode:
                                </strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['pincode']
                                );
                                ?>

                            </p>

                        <?php endif; ?>


                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =============================================
         CART FOOTER
    ============================================== -->

    <div
        id="shopify-section-template--20655585656897__cart-footer"
        class="shopify-section cart__footer-wrapper">

        <link
            href="assets/css/component-cart690c.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/component-totalsa6a8.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/component-priced9e8.css"
            rel="stylesheet"
            type="text/css"
            media="all" />

        <link
            href="assets/css/component-discounts4018.css"
            rel="stylesheet"
            type="text/css"
            media="all" />


        <style>

            .section-template--20655585656897__cart-footer-padding {
                padding-top: 15px;
                padding-bottom: 30px;
            }


            @media screen and (min-width: 750px) {

                .section-template--20655585656897__cart-footer-padding {
                    padding-top: 20px;
                    padding-bottom: 40px;
                }

            }

        </style>


        <div
            class="gradient color-scheme-1 is-empty"
            id="main-cart-footer"
            data-id="template--20655585656897__cart-footer">

            <div class="page-width">

                <div
                    class="cart__footer isolate section-template--20655585656897__cart-footer-padding">

                    <div class="cart__blocks">

                        <div class="js-contents">

                            <div></div>

                            <div class="totals">

                                <h2 class="totals__total">
                                    Estimated total
                                </h2>

                                <p class="totals__total-value">
                                    Rs. 0.00 INR
                                </p>

                            </div>


                            <small class="tax-note caption-large rte">

                                Taxes included.
                                Discounts and shipping calculated
                                at checkout.

                            </small>

                        </div>


                        <div class="cart__ctas">

                            <button
                                type="submit"
                                id="checkout"
                                class="cart__checkout-button button"
                                name="checkout"
                                disabled
                                form="cart">

                                Check out

                            </button>

                        </div>


                        <div id="cart-errors"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

    <!-- BEGIN sections: footer-group -->
    <div
        id="shopify-section-sections--20655586279489__17830699969fd6d15e"
        class="shopify-section shopify-section-group-footer-group"></div>
    <div
        id="shopify-section-sections--20655586279489__17831623028ba192ca"
        class="shopify-section shopify-section-group-footer-group"></div>
    <div
        id="shopify-section-sections--20655586279489__blocks_zxxdaN"
        class="shopify-section shopify-section-group-footer-group"></div>
    <div
        id="shopify-section-sections--20655586279489__footer"
        class="shopify-section shopify-section-group-footer-group">
        <link
            href="assets/css/section-footerf845.css"
            rel="stylesheet"
            type="text/css"
            media="all" />
        <link
            href="assets/css/component-newsletter4c4a.css"
            rel="stylesheet"
            type="text/css"
            media="all" />
        <link
            href="assets/css/component-list-menu717c.css"
            rel="stylesheet"
            type="text/css"
            media="all" />
        <link
            href="assets/css/component-list-paymentc213.css"
            rel="stylesheet"
            type="text/css"
            media="all" />
        <link
            href="assets/css/component-list-socialf800.css"
            rel="stylesheet"
            type="text/css"
            media="all" />
        <style data-shopify>
            .footer {
                margin-top: 0px;
            }

            .section-sections--20655586279489__footer-padding {
                padding-top: 12px;
                padding-bottom: 0px;
            }

            @media screen and (min-width: 750px) {
                .footer {
                    margin-top: 0px;
                }

                .section-sections--20655586279489__footer-padding {
                    padding-top: 16px;
                    padding-bottom: 0px;
                }
            }
        </style>
        <?php include('include/footer.php'); ?>


        <style>
            #shopify-section-sections--20655586279489__footer .footer__content-bottom {

                padding-bottom: 5px;
            }
        </style>
    </div>
    <!-- END sections: footer-group -->

    <ul hidden>
        <li id="a11y-refresh-page-message">
            Choosing a selection results in a full page refresh.
        </li>
        <li id="a11y-new-window-message">Opens in a new window.</li>
    </ul>


</body>

</html>