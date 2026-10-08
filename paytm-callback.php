<?php

include 'include/conn.php';
include 'include/paytm_config.php';
require_once 'PaytmChecksum.php';


// ------------------------------------
// GET ORDER ID
// ------------------------------------

$order_id = trim($_GET['order_id'] ?? '');


// Paytm may also send ORDERID through POST
if ($order_id === '') {

    $order_id = trim($_POST['ORDERID'] ?? '');

}


if ($order_id === '') {

    die("Invalid order ID.");

}


// ------------------------------------
// FETCH ORDER
// ------------------------------------

$order_id_db = mysqli_real_escape_string(
    $con,
    $order_id
);

$order_query = mysqli_query(
    $con,
    "
    SELECT *
    FROM orders
    WHERE order_id='$order_id_db'
    LIMIT 1
    "
);


if (!$order_query) {

    die(
        "Database error: "
        . mysqli_error($con)
    );

}


$order = mysqli_fetch_assoc($order_query);


if (!$order) {

    die("Order not found.");

}


// ------------------------------------
// PAYTM STATUS REQUEST
// ------------------------------------

$status_body = [

    "mid" => PAYTM_MERCHANT_ID,

    "orderId" => $order_id

];


$status_body_json = json_encode(
    $status_body
);


try {

    $status_signature =
        PaytmChecksum::generateSignature(
            $status_body_json,
            PAYTM_MERCHANT_KEY
        );

} catch (Exception $e) {

    die(
        "Checksum Error: "
        . $e->getMessage()
    );

}


// ------------------------------------
// STATUS REQUEST
// ------------------------------------

$status_request = [

    "head" => [

        "signature" => $status_signature

    ],

    "body" => $status_body

];


$status_request_json = json_encode(
    $status_request
);


// ------------------------------------
// PAYTM STATUS API
// ------------------------------------

$status_url =
    "https://securegw.paytm.in/merchant-status/api/v1/getPaymentStatus";


// ------------------------------------
// CURL
// ------------------------------------

$ch = curl_init();

curl_setopt(
    $ch,
    CURLOPT_URL,
    $status_url
);

curl_setopt(
    $ch,
    CURLOPT_POST,
    true
);

curl_setopt(
    $ch,
    CURLOPT_POSTFIELDS,
    $status_request_json
);

curl_setopt(
    $ch,
    CURLOPT_RETURNTRANSFER,
    true
);

curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($status_request_json)
    ]
);

curl_setopt(
    $ch,
    CURLOPT_TIMEOUT,
    60
);

curl_setopt(
    $ch,
    CURLOPT_SSL_VERIFYPEER,
    true
);


$response = curl_exec($ch);


if ($response === false) {

    $error = curl_error($ch);

    curl_close($ch);

    die(
        "Payment status error: "
        . $error
    );

}


curl_close($ch);


// ------------------------------------
// DECODE RESPONSE
// ------------------------------------

$response_data = json_decode(
    $response,
    true
);


if (!is_array($response_data)) {

    die("Invalid Paytm status response.");

}


// ------------------------------------
// GET PAYMENT BODY
// ------------------------------------

$payment_body =
    $response_data['body'] ?? [];


// ------------------------------------
// PAYMENT DETAILS
// ------------------------------------

$result_status =
    $payment_body['resultInfo']['resultStatus']
    ?? '';

$result_code =
    $payment_body['resultInfo']['resultCode']
    ?? '';

$result_message =
    $payment_body['resultInfo']['resultMsg']
    ?? '';

$paytm_payment_id =
    $payment_body['txnId']
    ?? '';

$transaction_amount =
    $payment_body['txnAmount']
    ?? '';


// ------------------------------------
// VERIFY ORDER AMOUNT
// ------------------------------------

$order_amount =
    number_format(
        (float)$order['amount'],
        2,
        '.',
        ''
    );

$paytm_amount =
    number_format(
        (float)$transaction_amount,
        2,
        '.',
        ''
    );


// ------------------------------------
// UPDATE PAYMENT
// ------------------------------------

if (
    $result_status === 'TXN_SUCCESS'
    &&
    $order_amount === $paytm_amount
) {

    $payment_id_db =
        mysqli_real_escape_string(
            $con,
            $paytm_payment_id
        );


    mysqli_query(
        $con,
        "
        UPDATE orders
        SET
            payment_status='Paid',
            payment_id='$payment_id_db',
            razorpay_payment_id=NULL
        WHERE order_id='$order_id_db'
        "
    );


    ?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Payment Successful</title>

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

    </head>

    <body>

        <div style="
            max-width:600px;
            margin:80px auto;
            text-align:center;
            font-family:Arial,sans-serif;
            padding:30px;
        ">

            <h1 style="color:green;">
                Payment Successful
            </h1>

            <p>
                Thank you for your order.
            </p>

            <p>
                Order ID:
                <strong>
                    <?php echo htmlspecialchars($order_id); ?>
                </strong>
            </p>

            <p>
                Payment ID:
                <strong>
                    <?php
                    echo htmlspecialchars(
                        $paytm_payment_id
                    );
                    ?>
                </strong>
            </p>

            <a
                href="index.php"
                style="
                    display:inline-block;
                    margin-top:20px;
                    padding:12px 25px;
                    background:#000;
                    color:#fff;
                    text-decoration:none;
                "
            >
                Continue Shopping
            </a>

        </div>

    </body>

    </html>

    <?php

    exit;

}


// ------------------------------------
// PAYMENT FAILED / PENDING
// ------------------------------------

$new_status = 'Failed';

if ($result_status === 'PENDING') {

    $new_status = 'Pending';

}


// ------------------------------------
// UPDATE PAYMENT STATUS
// ------------------------------------

mysqli_query(
    $con,
    "
    UPDATE orders
    SET
        payment_status='$new_status'
    WHERE order_id='$order_id_db'
    "
);


// ------------------------------------
// SHOW PAYMENT RESULT
// ------------------------------------

?>

<!DOCTYPE html>

<html>

<head>

    <title>Payment Status</title>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

</head>

<body>

<div style="
    max-width:600px;
    margin:80px auto;
    text-align:center;
    font-family:Arial,sans-serif;
    padding:30px;
">

    <h1>
        Payment <?php echo htmlspecialchars($new_status); ?>
    </h1>

    <p>
        Order ID:
        <strong>
            <?php echo htmlspecialchars($order_id); ?>
        </strong>
    </p>

    <p>
        <?php
        echo htmlspecialchars($result_message);
        ?>
    </p>

    <a
        href="index.php"
        style="
            display:inline-block;
            margin-top:20px;
            padding:12px 25px;
            background:#000;
            color:#fff;
            text-decoration:none;
        "
    >
        Back to Website
    </a>

</div>

</body>

</html>