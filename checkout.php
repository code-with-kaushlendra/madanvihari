<?php

session_start();

include('include/conn.php');

$cart = [];

$checkout_type = '';


// ============================================================
// 1. CART CHECKOUT
// ============================================================

if (
    isset($_POST['cart_data']) &&
    trim($_POST['cart_data']) !== ''
) {

    $checkout_type = 'cart';

    $cartData = $_POST['cart_data'];


    $decodedCart = json_decode(
        $cartData,
        true
    );


    if (
        !is_array($decodedCart) ||
        empty($decodedCart)
    ) {

        die('Invalid or empty cart.');

    }


    /*
    |--------------------------------------------------------------------------
    | Fetch every product again from database
    |--------------------------------------------------------------------------
    |
    | Never trust price/shipping from localStorage.
    |
    */

    foreach ($decodedCart as $cartItem) {

        $product_id =
            isset($cartItem['id'])
                ? (int)$cartItem['id']
                : 0;


        $quantity =
            isset($cartItem['quantity'])
                ? max(
                    1,
                    (int)$cartItem['quantity']
                )
                : 1;


        if ($product_id <= 0) {
            continue;
        }


        // ----------------------------------------------------
        // Fetch product
        // ----------------------------------------------------

        $product_id_db =
            mysqli_real_escape_string(
                $con,
                (string)$product_id
            );


        $productRes = mysqli_query(
            $con,
            "SELECT *
             FROM products
             WHERE id = '$product_id_db'
             LIMIT 1"
        );


        if (!$productRes) {

            die(
                'Database error: ' .
                mysqli_error($con)
            );

        }


        $product =
            mysqli_fetch_assoc(
                $productRes
            );


        if (!$product) {
            continue;
        }


        // ----------------------------------------------------
        // Prices
        // ----------------------------------------------------

        $regular_price =
            (float)(
                $product['price'] ?? 0
            );


        $sale_price =
            (float)(
                $product['sale_price'] ?? 0
            );


        $shipping_charge =
            (float)(
                $product['shipping_charge'] ?? 0
            );


        // ----------------------------------------------------
        // Actual selling price
        // ----------------------------------------------------

        if ($sale_price > 0) {

            $unit_price = $sale_price;

        } else {

            $unit_price = $regular_price;

        }


        if ($unit_price <= 0) {
            continue;
        }


        // ----------------------------------------------------
        // Product total
        // ----------------------------------------------------

        $product_total =
            $unit_price * $quantity;


        // ----------------------------------------------------
        // Add to checkout cart
        // ----------------------------------------------------

        $cart[] = [

            'id' =>
                (int)$product['id'],

            'name' =>
                $product['name'],

            'image' =>
                $product['image'],

            'price' =>
                $unit_price,

            'regular_price' =>
                $regular_price,

            'sale_price' =>
                $sale_price,

            'shipping_charge' =>
                $shipping_charge,

            'quantity' =>
                $quantity,

            'product_total' =>
                $product_total

        ];

    }


    if (empty($cart)) {

        die(
            'No valid products found in cart.'
        );

    }


// ============================================================
// 2. BUY NOW
// ============================================================

} elseif (
    isset($_POST['product_id']) &&
    (int)$_POST['product_id'] > 0
) {

    $checkout_type = 'single';


    $product_id =
        (int)$_POST['product_id'];


    $qty =
        isset($_POST['quantity'])
            ? max(
                1,
                (int)$_POST['quantity']
            )
            : 1;


    // --------------------------------------------------------
    // Fetch product
    // --------------------------------------------------------

    $product_id_db =
        mysqli_real_escape_string(
            $con,
            (string)$product_id
        );


    $productRes = mysqli_query(
        $con,
        "SELECT *
         FROM products
         WHERE id = '$product_id_db'
         LIMIT 1"
    );


    if (!$productRes) {

        die(
            'Database error: ' .
            mysqli_error($con)
        );

    }


    $product =
        mysqli_fetch_assoc(
            $productRes
        );


    if (!$product) {

        die(
            'Product not found.'
        );

    }


    // --------------------------------------------------------
    // Prices
    // --------------------------------------------------------

    $regular_price =
        (float)(
            $product['price'] ?? 0
        );


    $sale_price =
        (float)(
            $product['sale_price'] ?? 0
        );


    $shipping_charge =
        (float)(
            $product['shipping_charge'] ?? 0
        );


    // --------------------------------------------------------
    // Actual price
    // --------------------------------------------------------

    if ($sale_price > 0) {

        $unit_price = $sale_price;

    } else {

        $unit_price = $regular_price;

    }


    if ($unit_price <= 0) {

        die(
            'Invalid product price.'
        );

    }


    // --------------------------------------------------------
    // Product total
    // --------------------------------------------------------

    $product_total =
        $unit_price * $qty;


    // --------------------------------------------------------
    // Create same cart structure
    // --------------------------------------------------------

    $cart[] = [

        'id' =>
            (int)$product['id'],

        'name' =>
            $product['name'],

        'image' =>
            $product['image'],

        'price' =>
            $unit_price,

        'regular_price' =>
            $regular_price,

        'sale_price' =>
            $sale_price,

        'shipping_charge' =>
            $shipping_charge,

        'quantity' =>
            $qty,

        'product_total' =>
            $product_total

    ];


// ============================================================
// 3. REFRESH CHECKOUT
// ============================================================

} elseif (
    isset($_SESSION['checkout_cart']) &&
    is_array($_SESSION['checkout_cart']) &&
    !empty($_SESSION['checkout_cart'])
) {

    /*
    |--------------------------------------------------------------------------
    | If user refreshes checkout page,
    | use the existing checkout session.
    |--------------------------------------------------------------------------
    */

    $cart =
        $_SESSION['checkout_cart'];


    $checkout_type =
        $_SESSION['checkout_type']
        ?? 'single';


// ============================================================
// 4. NOTHING PROVIDED
// ============================================================

} else {

    die(
        'No product or cart found. Please return to the shop.'
    );

}


// ============================================================
// 5. SAVE FINAL CHECKOUT CART IN SESSION
// ============================================================

$_SESSION['checkout_cart'] =
    $cart;


$_SESSION['checkout_type'] =
    $checkout_type;


// ============================================================
// 6. CALCULATE TOTALS
// ============================================================

$subtotal = 0;

$shipping_total = 0;


foreach ($cart as $item) {

    /*
    |--------------------------------------------------------------------------
    | Product subtotal
    |--------------------------------------------------------------------------
    */

    $subtotal +=
        (float)$item['price']
        *
        (int)$item['quantity'];


    /*
    |--------------------------------------------------------------------------
    | Shipping
    |--------------------------------------------------------------------------
    |
    | Shipping is charged once per product line.
    |
    */

    $shipping_total +=
        (float)$item['shipping_charge'];

}


// ============================================================
// 7. GRAND TOTAL
// ============================================================

$grand_total =
    $subtotal +
    $shipping_total;


// ============================================================
// 8. FORMATTED VALUES
// ============================================================

$subtotal_formatted =
    number_format(
        $subtotal,
        2,
        '.',
        ''
    );


$shipping_formatted =
    number_format(
        $shipping_total,
        2,
        '.',
        ''
    );


$grand_total_formatted =
    number_format(
        $grand_total,
        2,
        '.',
        ''
    );

?>


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
            
            
            /* Product image in checkout */
.product-summary-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.checkout-product-image {
    width: 175px;
    height: 171px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #eee;
    background: #fff;
    flex-shrink: 0;
}

.product-summary-header h3 {
    margin: 0;
    color: #444;
    font-size: 24px;
    line-height: 1.3;
}

/* Mobile */
@media screen and (max-width: 600px) {

    .product-summary-header {
        gap: 12px;
    }

    .checkout-product-image {
        width: 65px;
        height: 65px;
    }

    .product-summary-header h3 {
        font-size: 19px;
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
                            action="https://c1esm2-av.myshopify.com/cart"
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
            <style data-shopify>
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
            </style>
            <script src="assets/js/cart0c64.js" defer="defer"></script>
            <script src="assets/js/quantity-popover5de7.js" defer="defer"></script>




            <div class="checkout-container">

                <div class="checkout-card">

                    <h2>Checkout</h2>

                    <div class="product-summary">

    <h3 class="checkout-summary-title">
        Order Summary
    </h3>

    <?php foreach ($cart as $item): ?>

        <div class="checkout-product-item">

            <!-- Product Header -->
            <div class="product-summary-header">

                <?php if (!empty($item['image'])): ?>

                    <img
                        src="<?php echo htmlspecialchars(
                            'admin/assets/images/products/' . $item['image']
                        ); ?>"
                        alt="<?php echo htmlspecialchars($item['name']); ?>"
                        class="checkout-product-image"
                    >

                <?php endif; ?>

                <h3>
                    <?php echo htmlspecialchars($item['name']); ?>
                </h3>

            </div>


            <!-- Price -->
            <div class="summary-row">

                <span>Price</span>

                <strong>
                    ₹<?php echo number_format($item['price'], 2); ?>
                </strong>

            </div>


            <!-- Quantity -->
            <div class="summary-row">

                <span>Quantity</span>

                <strong>
                    <?php echo (int)$item['quantity']; ?>
                </strong>

            </div>


            <!-- Shipping -->
            <div class="summary-row">

                <span>Shipping Charges</span>

                <strong>
                    ₹<?php echo number_format(
                        $item['shipping_charge'],
                        2
                    ); ?>
                </strong>

            </div>


            <!-- Product Total -->
            <div class="summary-row total">

                <span>Product Total</span>

                <strong>
                    ₹<?php echo number_format(
                        $item['product_total'] +
                        $item['shipping_charge'],
                        2
                    ); ?>
                </strong>

            </div>

        </div>

        <hr class="checkout-product-divider">

    <?php endforeach; ?>


    <!-- Overall Order Total -->

    <div class="order-total-summary">

        <div class="summary-row">

            <span>Subtotal</span>

            <strong>
                ₹<?php echo number_format(
                    $subtotal,
                    2
                ); ?>
            </strong>

        </div>


        <div class="summary-row">

            <span>Shipping Charges</span>

            <strong>
                ₹<?php echo number_format(
                    $shipping_total,
                    2
                ); ?>
            </strong>

        </div>


        <div class="summary-row total">

            <span>Grand Total</span>

            <strong>
                ₹<?php echo number_format(
                    $grand_total,
                    2
                ); ?>
            </strong>

        </div>

    </div>

</div>

                    <form action="place_order.php" method="POST" class="checkout-form">

                        <!--<input type="hidden" name="product_id" value="< ?php echo $product_id; ?>">-->
                        <!--<input type="hidden" name="quantity" value="< ?php echo $qty; ?>">-->
                        
                        
                         <input
                             type="hidden"
                              name="cart"
                              value="<?php echo htmlspecialchars($cartData, ENT_QUOTES, 'UTF-8'); ?>"
                        >
 

                        <div class="form-group">
                            <label for="customer-name">Full Name</label>
                            <input id="customer-name" type="text" name="customer_name" placeholder="Full Name" autocomplete="name" required>
                        </div>

                        <div class="form-group">
                            <label for="customer-email">Email Address</label>
                            <input id="customer-email" type="email" name="customer_email" placeholder="you@example.com" autocomplete="email" required>
                        </div>

                        <div class="form-group">
                            <label for="customer-mobile">Mobile Number</label>
                            <input id="customer-mobile" type="tel" name="mobile" placeholder="10-digit mobile number" autocomplete="tel" pattern="[0-9 +()-]{10,}" required>
                        </div>

                        <div class="form-group">
                            <label for="customer-address">Complete Delivery Address</label>
                            <textarea id="customer-address" name="address" placeholder="House / Flat, Street, Area" autocomplete="street-address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="customer-city">City</label>
                            <input id="customer-city" type="text" name="city" placeholder="City" autocomplete="address-level2" required>
                        </div>

                        <div class="form-group">
                            <label for="customer-state">State</label>
                            <input id="customer-state" type="text" name="state" placeholder="State" autocomplete="address-level1" required>
                        </div>

                        <div class="form-group">
                            <label for="customer-pincode">PIN Code</label>
                            <input id="customer-pincode" type="text" name="pincode" placeholder="6-digit PIN code" autocomplete="postal-code" pattern="[0-9]{6}" required>
                        </div>

                        <div class="form-group">
                            <select name="payment_method">
                                <option value="Paytm">Paytm Payment Gateway (UPI, Cards, NetBanking, Wallet)</option>
                            </select>
                        </div>

                        <button type="submit" class="checkout-btn">
                            Place Order
                        </button>

                    </form>

                </div>

            </div>

        </div>
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
            <style data-shopify>
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
                                    <h2 class="totals__total">Estimated total</h2>
                                    <p class="totals__total-value">Rs. 0.00 INR</p>
                                </div>

                                <small class="tax-note caption-large rte">Taxes included. Discounts and shipping calculated at
                                    checkout.
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