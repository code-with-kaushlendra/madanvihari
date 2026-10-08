<?php

/**
 * ============================================================
 * PAYTM PAYMENT VERIFICATION
 * ============================================================
 *
 * File:
 * public_html/verify_payment.php
 *
 * Paytm sends payment response to this URL.
 *
 * Important Paytm fields:
 *
 * ORDERID
 * TXNID
 * TXNAMOUNT
 * STATUS
 * RESPCODE
 * RESPMSG
 * CHECKSUMHASH
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
// 2. CHECK REQUEST
// ============================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: checkout.php");
    exit();

}


// ============================================================
// 3. GET PAYTM RESPONSE
// ============================================================

$paytm_response = $_POST;


// ============================================================
// 4. CHECK REQUIRED PAYTM FIELDS
// ============================================================

$merchant_order_id =
    trim(
        $paytm_response['ORDERID'] ?? ''
    );

$status =
    trim(
        $paytm_response['STATUS'] ?? ''
    );

$txn_id =
    trim(
        $paytm_response['TXNID'] ?? ''
    );

$txn_amount =
    trim(
        $paytm_response['TXNAMOUNT'] ?? ''
    );

$response_code =
    trim(
        $paytm_response['RESPCODE'] ?? ''
    );

$response_message =
    trim(
        $paytm_response['RESPMSG'] ?? ''
    );

$checksum =
    trim(
        $paytm_response['CHECKSUMHASH'] ?? ''
    );


// ============================================================
// 5. BASIC VALIDATION
// ============================================================

if ($merchant_order_id === '') {

    die(
        "Paytm verification failed: ORDERID missing."
    );

}

if ($checksum === '') {

    die(
        "Paytm verification failed: CHECKSUMHASH missing."
    );

}


// ============================================================
// 6. VERIFY PAYTM CHECKSUM
// ============================================================

try {

    $is_valid_checksum =
        PaytmChecksum::verifySignature(
            $paytm_response,
            PAYTM_MERCHANT_KEY,
            $checksum
        );

} catch (Throwable $e) {

    die(
        "Paytm checksum verification error: " .
        htmlspecialchars(
            $e->getMessage(),
            ENT_QUOTES,
            'UTF-8'
        )
    );

}


if (!$is_valid_checksum) {

    die(
        "Paytm verification failed: Invalid checksum."
    );

}


// ============================================================
// 7. FIND LOCAL ORDER
// ============================================================

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

    die(
        "Database error while finding order: " .
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

    die(
        "Order not found for Paytm ORDERID: " .
        htmlspecialchars(
            $merchant_order_id,
            ENT_QUOTES,
            'UTF-8'
        )
    );

}


// ============================================================
// 8. GET LOCAL ORDER ID
// ============================================================

$local_order_id =
    (int) $order['id'];


// ============================================================
// 9. VERIFY AMOUNT
// ============================================================

$database_amount =
    number_format(
        (float) ($order['amount'] ?? 0),
        2,
        '.',
        ''
    );

$paytm_amount =
    number_format(
        (float) $txn_amount,
        2,
        '.',
        ''
    );


if ($database_amount !== $paytm_amount) {

    // Do not mark order as paid if amount differs.

    mysqli_query(
        $con,
        "
        UPDATE orders
        SET payment_status = 'Failed'
        WHERE id = '$local_order_id'
        LIMIT 1
        "
    );

    die(
        "Payment amount mismatch. " .
        "Order amount: " .
        htmlspecialchars(
            $database_amount,
            ENT_QUOTES,
            'UTF-8'
        ) .
        " | Paytm amount: " .
        htmlspecialchars(
            $paytm_amount,
            ENT_QUOTES,
            'UTF-8'
        )
    );

}


// ============================================================
// 10. PAYMENT SUCCESS
// ============================================================

if ($status === 'TXN_SUCCESS') {

    $txn_id_db =
        mysqli_real_escape_string(
            $con,
            $txn_id
        );

    /*
     * We update payment_status to Paid.
     *
     * If your orders table already has a Paytm
     * transaction ID column, you can also save
     * $txn_id_db there.
     */

    $update_query = mysqli_query(
        $con,
        "
        UPDATE orders
        SET payment_status = 'Paid'
        WHERE id = '$local_order_id'
        LIMIT 1
        "
    );


    if (!$update_query) {

        die(
            "Unable to update payment status: " .
            htmlspecialchars(
                mysqli_error($con),
                ENT_QUOTES,
                'UTF-8'
            )
        );

    }


    // ========================================================
    // PAYMENT SUCCESS
    // ========================================================

    header(
        "Location: thankyou.php?id=" .
        $local_order_id
    );

    exit();

}


// ============================================================
// 11. PAYMENT PENDING
// ============================================================

if ($status === 'PENDING') {

    mysqli_query(
        $con,
        "
        UPDATE orders
        SET payment_status = 'Pending'
        WHERE id = '$local_order_id'
        LIMIT 1
        "
    );

    /*
     * Do not show thank-you page for pending payment.
     */

    header(
        "Location: checkout.php?payment=pending"
    );

    exit();

}


// ============================================================
// 12. PAYMENT FAILED
// ============================================================

mysqli_query(
    $con,
    "
    UPDATE orders
    SET payment_status = 'Failed'
    WHERE id = '$local_order_id'
    LIMIT 1
    "
);


// ============================================================
// 13. REDIRECT BACK TO CHECKOUT
// ============================================================

header(
    "Location: checkout.php?payment=failed"
);

exit();

?>