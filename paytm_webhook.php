<?php

/**
 * Paytm Payment Notification Webhook
 *
 * File:
 * public_html/paytm_webhook.php
 */

include 'include/conn.php';
include 'include/config.php';
require_once 'include/PaytmChecksum.php';


// ==================================================
// 1. ONLY ACCEPT POST REQUEST
// ==================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    http_response_code(405);

    echo "Method Not Allowed";

    exit;
}


// ==================================================
// 2. GET PAYTM POST DATA
// ==================================================

$paytm_data = $_POST;


// ==================================================
// 3. BASIC CHECK
// ==================================================

if (empty($paytm_data)) {

    http_response_code(400);

    echo "Empty notification";

    exit;
}


// ==================================================
// 4. GET CHECKSUM
// ==================================================

$paytm_checksum =
    $paytm_data['CHECKSUMHASH']
    ?? '';


// ==================================================
// 5. CHECK CHECKSUM EXISTS
// ==================================================

if ($paytm_checksum === '') {

    http_response_code(400);

    echo "Missing checksum";

    exit;
}


// ==================================================
// 6. REMOVE CHECKSUM BEFORE VERIFICATION
// ==================================================

$paytm_params = $paytm_data;

unset(
    $paytm_params['CHECKSUMHASH']
);


// ==================================================
// 7. VERIFY PAYTM CHECKSUM
// ==================================================

try {

    $is_valid_checksum =
        PaytmChecksum::verifySignature(
            $paytm_params,
            PAYTM_MERCHANT_KEY,
            $paytm_checksum
        );

} catch (Exception $e) {

    http_response_code(400);

    echo "Checksum verification error";

    exit;
}


// ==================================================
// 8. REJECT INVALID NOTIFICATION
// ==================================================

if (!$is_valid_checksum) {

    http_response_code(400);

    echo "Invalid checksum";

    exit;
}


// ==================================================
// 9. GET IMPORTANT PAYTM VALUES
// ==================================================

$merchant_order_id =
    trim(
        $paytm_data['ORDERID']
        ?? ''
    );

$status =
    trim(
        $paytm_data['STATUS']
        ?? ''
    );

$paytm_txn_id =
    trim(
        $paytm_data['TXNID']
        ?? ''
    );

$paytm_amount =
    trim(
        $paytm_data['TXNAMOUNT']
        ?? ''
    );

$response_code =
    trim(
        $paytm_data['RESPCODE']
        ?? ''
    );

$response_message =
    trim(
        $paytm_data['RESPMSG']
        ?? ''
    );


// ==================================================
// 10. VALIDATE ORDER ID
// ==================================================

if ($merchant_order_id === '') {

    http_response_code(400);

    echo "Missing ORDERID";

    exit;
}


// ==================================================
// 11. FIND YOUR LOCAL ORDER
// ==================================================

$merchant_order_id_db =
    mysqli_real_escape_string(
        $con,
        $merchant_order_id
    );


$order_query = mysqli_query(
    $con,
    "
    SELECT *
    FROM orders
    WHERE order_id = '$merchant_order_id_db'
    LIMIT 1
    "
);


if (!$order_query) {

    http_response_code(500);

    echo "Database error";

    exit;
}


$order = mysqli_fetch_assoc(
    $order_query
);


if (!$order) {

    http_response_code(404);

    echo "Order not found";

    exit;
}


// ==================================================
// 12. GET LOCAL ORDER ID + AMOUNT
// ==================================================

$local_order_id =
    (int) $order['id'];


$local_amount =
    number_format(
        (float) ($order['amount'] ?? 0),
        2,
        '.',
        ''
    );


$paytm_amount_formatted =
    number_format(
        (float) $paytm_amount,
        2,
        '.',
        ''
    );


// ==================================================
// 13. ALWAYS VERIFY AMOUNT
// ==================================================

if (
    $local_amount !==
    $paytm_amount_formatted
) {

    http_response_code(400);

    echo "Amount mismatch";

    exit;
}


// ==================================================
// 14. SUCCESS PAYMENT
// ==================================================

if ($status === 'TXN_SUCCESS') {


    // ------------------------------------------------
    // UPDATE ORDER
    // ------------------------------------------------

    $txn_id_db =
        mysqli_real_escape_string(
            $con,
            $paytm_txn_id
        );


    $response_code_db =
        mysqli_real_escape_string(
            $con,
            $response_code
        );


    $response_message_db =
        mysqli_real_escape_string(
            $con,
            $response_message
        );


    /*
     * IMPORTANT:
     *
     * Change these column names if your
     * orders table uses different names.
     *
     * Example columns:
     *
     * payment_status
     * paytm_txn_id
     * paytm_response_code
     * paytm_response_message
     */


    $update = mysqli_query(
        $con,
        "
        UPDATE orders

        SET
            payment_status = 'PAID',
            paytm_txn_id = '$txn_id_db',
            paytm_response_code = '$response_code_db',
            paytm_response_message = '$response_message_db'

        WHERE id = '$local_order_id'

        LIMIT 1
        "
    );


    if (!$update) {

        http_response_code(500);

        echo "Unable to update order";

        exit;
    }


    // ------------------------------------------------
    // SUCCESS RESPONSE TO PAYTM
    // ------------------------------------------------

    http_response_code(200);

    echo "OK";

    exit;
}


// ==================================================
// 15. FAILED PAYMENT
// ==================================================

if ($status === 'TXN_FAILURE') {


    $response_code_db =
        mysqli_real_escape_string(
            $con,
            $response_code
        );


    $response_message_db =
        mysqli_real_escape_string(
            $con,
            $response_message
        );


    mysqli_query(
        $con,
        "
        UPDATE orders

        SET
            payment_status = 'FAILED',
            paytm_response_code = '$response_code_db',
            paytm_response_message = '$response_message_db'

        WHERE id = '$local_order_id'

        LIMIT 1
        "
    );


    http_response_code(200);

    echo "OK";

    exit;
}


// ==================================================
// 16. PENDING PAYMENT
// ==================================================

if ($status === 'PENDING') {


    mysqli_query(
        $con,
        "
        UPDATE orders

        SET
            payment_status = 'PENDING'

        WHERE id = '$local_order_id'

        LIMIT 1
        "
    );


    http_response_code(200);

    echo "OK";

    exit;
}


// ==================================================
// 17. UNKNOWN STATUS
// ==================================================

http_response_code(200);

echo "OK";

exit;
