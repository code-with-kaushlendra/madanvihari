<?php

/**
 * ============================================================
 * PAYTM PAYMENT INITIATION
 * ============================================================
 *
 * File:
 * public_html/payment-init.php
 *
 * Flow:
 *
 * 1. Get local order
 * 2. Get order items
 * 3. Create Paytm Order ID if missing
 * 4. Create Paytm Initiate Transaction request
 * 5. Generate checksum
 * 6. Call Paytm Initiate Transaction API
 * 7. Receive TXN_TOKEN
 * 8. Save TXN_TOKEN in database
 * 9. Open Paytm JS Checkout
 *
 * IMPORTANT:
 * Merchant Key is never printed.
 *
 * ============================================================
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');


// ============================================================
// 1. LOAD FILES
// ============================================================

include 'include/conn.php';
include 'include/config.php';
require_once 'include/PaytmChecksum.php';


// ============================================================
// 2. CHECK REQUIRED CONFIGURATION
// ============================================================

$required_constants = [

    'PAYTM_MERCHANT_ID',
    'PAYTM_MERCHANT_KEY',
    'PAYTM_WEBSITE',
    'PAYTM_INITIATE_URL',
    'PAYTM_CALLBACK_URL'

];

foreach ($required_constants as $constant) {

    if (!defined($constant)) {

        die(
            "Paytm configuration missing: " .
            htmlspecialchars(
                $constant,
                ENT_QUOTES,
                'UTF-8'
            )
        );

    }

}


// ============================================================
// 3. GET LOCAL DATABASE ORDER ID
// ============================================================

$order_id = isset($_GET['order_id'])
    ? (int) $_GET['order_id']
    : 0;


if ($order_id <= 0) {

    die("Invalid order ID.");

}


// ============================================================
// 4. FETCH ORDER
// ============================================================

$order_id_db =
    mysqli_real_escape_string(
        $con,
        (string) $order_id
    );


$order_query = mysqli_query(
    $con,
    "
    SELECT *
    FROM orders
    WHERE id = '$order_id_db'
    LIMIT 1
    "
);


if (!$order_query) {

    die(
        "Order database error: " .
        htmlspecialchars(
            mysqli_error($con),
            ENT_QUOTES,
            'UTF-8'
        )
    );

}


$order = mysqli_fetch_assoc(
    $order_query
);


if (!$order) {

    die("Order not found.");

}


// ============================================================
// 5. FETCH ORDER ITEMS
// ============================================================

$order_items_query = mysqli_query(
    $con,
    "
    SELECT
        id,
        product_id,
        product_name,
        quantity,
        unit_price,
        shipping_charge,
        total_price
    FROM order_items
    WHERE order_id = '$order_id_db'
    ORDER BY id ASC
    "
);


if (!$order_items_query) {

    die(
        "Unable to fetch order items: " .
        htmlspecialchars(
            mysqli_error($con),
            ENT_QUOTES,
            'UTF-8'
        )
    );

}


if (mysqli_num_rows($order_items_query) <= 0) {

    die(
        "No products found for this order."
    );

}


// ============================================================
// 6. CUSTOMER INFORMATION
// ============================================================

$customer_name =
    trim(
        $order['customer_name'] ?? ''
    );


$mobile =
    trim(
        $order['mobile'] ?? ''
    );


$address =
    trim(
        $order['address'] ?? ''
    );


// ============================================================
// 7. VALIDATE MOBILE
// ============================================================

if ($mobile === '') {

    die(
        "Customer mobile number is missing."
    );

}


// Keep only digits for Paytm mobile field.
$mobile_for_paytm =
    preg_replace(
        '/\D+/',
        '',
        $mobile
    );


if (
    $mobile_for_paytm === '' ||
    strlen($mobile_for_paytm) < 10
) {

    die(
        "Invalid customer mobile number."
    );

}


// ============================================================
// 8. GET ORDER AMOUNT
// ============================================================

$amount =
    (float) (
        $order['amount'] ?? 0
    );


if ($amount <= 0) {

    die(
        "Invalid order amount."
    );

}


$amount_formatted =
    number_format(
        $amount,
        2,
        '.',
        ''
    );


// ============================================================
// 9. GET / CREATE MERCHANT ORDER ID
// ============================================================

$merchant_order_id =
    trim(
        $order['order_id'] ?? ''
    );


// Create Paytm Order ID if missing.
if ($merchant_order_id === '') {

    $merchant_order_id =
        'MBH_' .
        date('YmdHis') .
        '_' .
        $order_id;


    $merchant_order_id_db =
        mysqli_real_escape_string(
            $con,
            $merchant_order_id
        );


    $update_order_id =
        mysqli_query(
            $con,
            "
            UPDATE orders
            SET order_id = '$merchant_order_id_db'
            WHERE id = '$order_id_db'
            LIMIT 1
            "
        );


    if (!$update_order_id) {

        die(
            "Unable to save merchant order ID: " .
            htmlspecialchars(
                mysqli_error($con),
                ENT_QUOTES,
                'UTF-8'
            )
        );

    }

}


// ============================================================
// 10. SANITIZE / VALIDATE PAYTM ORDER ID
// ============================================================

if (
    strlen($merchant_order_id) > 50
) {

    die(
        "Paytm order ID is too long."
    );

}


// ============================================================
// 11. CREATE PAYTM REQUEST BODY
// ============================================================

$body = [

    "requestType" => "Payment",

    "mid" =>
        PAYTM_MERCHANT_ID,

    "websiteName" =>
        PAYTM_WEBSITE,

    "orderId" =>
        $merchant_order_id,

    "callbackUrl" =>
        PAYTM_CALLBACK_URL,

    "txnAmount" => [

        "value" =>
            $amount_formatted,

        "currency" =>
            "INR"

    ],

    "userInfo" => [

        "custId" =>
            "CUST" . $order_id,

        "mobile" =>
            $mobile_for_paytm

    ]

];


// ============================================================
// 12. CREATE BODY JSON
// ============================================================

$body_json =
    json_encode(
        $body,
        JSON_UNESCAPED_SLASHES
    );


if ($body_json === false) {

    die(
        "Unable to create Paytm request JSON: " .
        json_last_error_msg()
    );

}


// ============================================================
// 13. GENERATE CHECKSUM
// ============================================================

try {

    $signature =
        PaytmChecksum::generateSignature(
            $body_json,
            PAYTM_MERCHANT_KEY
        );

} catch (Throwable $e) {

    die(
        "Paytm checksum error: " .
        htmlspecialchars(
            $e->getMessage(),
            ENT_QUOTES,
            'UTF-8'
        )
    );

}


// ============================================================
// 14. CREATE FINAL PAYTM REQUEST
// ============================================================

$paytm_request = [

    "head" => [

        "signature" =>
            $signature

    ],

    "body" =>
        $body

];


$paytm_request_json =
    json_encode(
        $paytm_request,
        JSON_UNESCAPED_SLASHES
    );


if ($paytm_request_json === false) {

    die(
        "Unable to create final Paytm request JSON."
    );

}


// ============================================================
// 15. PAYTM INITIATE TRANSACTION URL
// ============================================================

$paytm_url =
    PAYTM_INITIATE_URL .
    '?mid=' .
    urlencode(
        PAYTM_MERCHANT_ID
    ) .
    '&orderId=' .
    urlencode(
        $merchant_order_id
    );


// ============================================================
// 16. CALL PAYTM
// ============================================================

$ch =
    curl_init(
        $paytm_url
    );


curl_setopt_array(
    $ch,
    [

        CURLOPT_POST =>
            true,

        CURLOPT_POSTFIELDS =>
            $paytm_request_json,

        CURLOPT_RETURNTRANSFER =>
            true,

        CURLOPT_HTTPHEADER => [

            'Content-Type: application/json',

            'Accept: application/json',

            'Content-Length: ' .
                strlen(
                    $paytm_request_json
                )

        ],

        CURLOPT_TIMEOUT =>
            60,

        CURLOPT_CONNECTTIMEOUT =>
            15,

        CURLOPT_SSL_VERIFYPEER =>
            true,

        CURLOPT_SSL_VERIFYHOST =>
            2

    ]
);


$response =
    curl_exec($ch);


// ============================================================
// 17. CHECK CURL ERROR
// ============================================================

if ($response === false) {

    $curl_error =
        curl_error($ch);

    $curl_errno =
        curl_errno($ch);

    curl_close($ch);

    die(
        "Paytm cURL Error (" .
        $curl_errno .
        "): " .
        htmlspecialchars(
            $curl_error,
            ENT_QUOTES,
            'UTF-8'
        )
    );

}


// ============================================================
// 18. GET HTTP STATUS
// ============================================================

$http_code =
    curl_getinfo(
        $ch,
        CURLINFO_HTTP_CODE
    );


curl_close($ch);


// ============================================================
// 19. DECODE PAYTM RESPONSE
// ============================================================

$response_data =
    json_decode(
        $response,
        true
    );


if (!is_array($response_data)) {

    echo '<h3>Invalid Paytm Response</h3>';

    echo '<pre>';

    echo htmlspecialchars(
        $response,
        ENT_QUOTES,
        'UTF-8'
    );

    echo '</pre>';

    exit;

}


// ============================================================
// 20. GET RESULT INFORMATION
// ============================================================

$result_info =
    $response_data['body']['resultInfo']
    ?? [];


$result_status =
    $result_info['resultStatus']
    ?? '';


$result_code =
    $result_info['resultCode']
    ?? '';


$result_message =
    $result_info['resultMsg']
    ?? '';


// ============================================================
// 21. GET TRANSACTION TOKEN
// ============================================================

$txnToken =
    $response_data['body']['txnToken']
    ?? '';


// ============================================================
// 22. IF TOKEN NOT RECEIVED
// ============================================================

if ($txnToken === '') {

    echo '<!DOCTYPE html>';

    echo '<html>';

    echo '<head>';

    echo '<meta charset="UTF-8">';

    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';

    echo '<title>Paytm Payment Error</title>';

    echo '</head>';

    echo '<body style="font-family:Arial,sans-serif;background:#f7f7f7;padding:30px;">';

    echo '<div style="max-width:800px;margin:30px auto;background:white;padding:30px;border-radius:10px;">';

    echo '<h2 style="color:#d00;">Unable to initiate Paytm payment</h2>';

    echo '<p><strong>HTTP Code:</strong> ' .
        htmlspecialchars(
            (string) $http_code,
            ENT_QUOTES,
            'UTF-8'
        ) .
        '</p>';

    echo '<p><strong>Result Status:</strong> ' .
        htmlspecialchars(
            $result_status,
            ENT_QUOTES,
            'UTF-8'
        ) .
        '</p>';

    echo '<p><strong>Result Code:</strong> ' .
        htmlspecialchars(
            $result_code,
            ENT_QUOTES,
            'UTF-8'
        ) .
        '</p>';

    echo '<p><strong>Result Message:</strong> ' .
        htmlspecialchars(
            $result_message,
            ENT_QUOTES,
            'UTF-8'
        ) .
        '</p>';

    echo '<hr>';

    echo '<h3>Paytm Response</h3>';

    echo '<pre style="background:#f1f1f1;padding:15px;overflow:auto;">';

    echo htmlspecialchars(
        print_r(
            $response_data,
            true
        ),
        ENT_QUOTES,
        'UTF-8'
    );

    echo '</pre>';

    echo '</div>';

    echo '</body>';

    echo '</html>';

    exit;

}


// ============================================================
// 23. SAVE TXN TOKEN
// ============================================================

$txn_token_db =
    mysqli_real_escape_string(
        $con,
        $txnToken
    );


$update_token =
    mysqli_query(
        $con,
        "
        UPDATE orders
        SET paytm_txn_token = '$txn_token_db'
        WHERE id = '$order_id_db'
        LIMIT 1
        "
    );


if (!$update_token) {

    die(
        "Unable to save Paytm transaction token: " .
        htmlspecialchars(
            mysqli_error($con),
            ENT_QUOTES,
            'UTF-8'
        )
    );

}


// ============================================================
// 24. DETERMINE CHECKOUT JS URL
// ============================================================

/*
 * Paytm's current JS Checkout documentation uses:
 *
 * Staging:
 * https://securegw-stage.paytm.in
 *
 * Production:
 * https://securegw.paytm.in
 *
 * And the script path is:
 *
 * /merchantpgpui/checkoutjs/merchants/{MID}.js
 */

if (
    defined('PAYTM_ENVIRONMENT') &&
    PAYTM_ENVIRONMENT === 'production'
) {

    $checkout_host =
        'https://securegw.paytm.in';

} else {

    $checkout_host =
        'https://securegw-stage.paytm.in';

}


$checkout_js_url =
    $checkout_host .
    '/merchantpgpui/checkoutjs/merchants/' .
    urlencode(
        PAYTM_MERCHANT_ID
    ) .
    '.js';


// ============================================================
// 25. OUTPUT CHECKOUT PAGE
// ============================================================

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>
        Redirecting to Payment...
    </title>

    <meta
        name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"
    >

    <!--
        Paytm JS Checkout
    -->


</head>


<body>

<div
    id="payment-loading"
    style="
        max-width:500px;
        margin:100px auto;
        text-align:center;
        font-family:Arial,sans-serif;
        padding:30px;
    "
>

    <h2>
        Redirecting to Payment...
    </h2>

    <p>
        Please wait while we open the secure Paytm payment page.
    </p>

</div>


<script>

function onScriptLoad() {

    console.log("1. Paytm JS file loaded");

    console.log(
        "Paytm object:",
        window.Paytm
    );

    console.log(
        "CheckoutJS object:",
        window.Paytm ? window.Paytm.CheckoutJS : null
    );


    if (
        !window.Paytm ||
        !window.Paytm.CheckoutJS
    ) {

        showPaymentError(
            "Paytm CheckoutJS object was not loaded."
        );

        return;
    }


    console.log(
        "2. CheckoutJS found"
    );


    var config = {

        root: "",

        flow: "DEFAULT",

        data: {

            orderId:
                <?= json_encode($merchant_order_id); ?>,

            token:
                <?= json_encode($txnToken); ?>,

            tokenType:
                "TXN_TOKEN",

            amount:
                <?= json_encode($amount_formatted); ?>

        },

       handler: {

    notifyMerchant: function(eventName, data) {

        console.log(
            "Paytm Event:",
            eventName
        );

        console.log(
            "Paytm Data:",
            data
        );

        // User cancelled / closed Paytm payment
        if (eventName === "APP_CLOSED") {

            console.log(
                "Paytm payment window closed by user."
            );

            window.location.replace(
                "checkout.php?payment=cancelled&order_id=<?= (int)$order_id; ?>"
            );
        }

    },

    transactionStatus: function(data) {

        console.log(
            "Paytm Transaction Status:",
            data
        );

    }

}

    };


    console.log(
        "3. Paytm config:",
        config
    );


    window.Paytm.CheckoutJS.onLoad(

        function() {

            console.log(
                "4. CheckoutJS onLoad completed"
            );


            window.Paytm.CheckoutJS.init(config)

                .then(

                    function() {

                        console.log(
                            "5. CheckoutJS init SUCCESS"
                        );

                        console.log(
                            "6. Opening Paytm payment page..."
                        );


                        window.Paytm.CheckoutJS.invoke();


                    }

                )

                .catch(

                    function(error) {

                        console.error(
                            "5. CheckoutJS init FAILED:",
                            error
                        );

                        showPaymentError(
                            "Paytm Checkout initialization failed. Check browser console."
                        );

                    }

                );

        }

    );

}


function paytmScriptError() {

    console.error(
        "Paytm CheckoutJS script failed to load."
    );

    showPaymentError(
        "Unable to load Paytm CheckoutJS."
    );

}


function showPaymentError(message) {

    document.getElementById(
        "payment-loading"
    ).innerHTML =

        "<h3 style='color:#d00'>" +
        message +
        "</h3>" +

        "<p>Please open browser console using F12 and check the error.</p>";

}

</script>



<script
    type="application/javascript"
    src="<?= htmlspecialchars($checkout_js_url, ENT_QUOTES, 'UTF-8'); ?>"
    crossorigin="anonymous"
    onload="onScriptLoad();"
    onerror="paytmScriptError();">
</script>


</body>

</html>
