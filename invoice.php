<!--< ?php-->
<!--include 'include/conn.php';-->
<!--include 'include/invoice_helper.php';-->

<!--$order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;-->
<!--ensure_order_checkout_columns($con);-->
<!--$order = invoice_order_data($con, $order_id);-->

<!--if (!$order || strtolower((string)$order['payment_status']) !== 'paid') {-->
<!--    http_response_code(404);-->
<!--    exit('Invoice not available.');-->
<!--}-->

<!--$order['invoice_number'] = invoice_number($con, $order);-->
<!--echo invoice_html($order);-->
<!--?>-->



<?php

include 'include/conn.php';
include 'include/invoice_helper.php';


/*
|--------------------------------------------------------------------------
| GET ORDER ID
|--------------------------------------------------------------------------
*/

$order_id = isset($_GET['id'])
    ? (int)$_GET['id']
    : 0;


if ($order_id <= 0) {

    http_response_code(404);

    exit('Invalid order.');
}


/*
|--------------------------------------------------------------------------
| ENSURE INVOICE COLUMNS
|--------------------------------------------------------------------------
*/

ensure_order_checkout_columns($con);


/*
|--------------------------------------------------------------------------
| SEND INVOICE EMAIL
|--------------------------------------------------------------------------
|
| This works for:
|
| - Single product order
| - Multiple product cart order
|
|--------------------------------------------------------------------------
*/

create_and_email_invoice(
    $con,
    $order_id
);


/*
|--------------------------------------------------------------------------
| GET ORDER FOR DISPLAY
|--------------------------------------------------------------------------
*/

$order =
    invoice_order_data(
        $con,
        $order_id
    );


if (
    !$order ||
    strtolower(
        (string)(
            $order['payment_status']
            ?? ''
        )
    ) !== 'paid'
) {

    http_response_code(404);

    exit('Invoice not available.');
}


/*
|--------------------------------------------------------------------------
| INVOICE NUMBER
|--------------------------------------------------------------------------
*/

$order['invoice_number'] =
    invoice_number(
        $con,
        $order
    );


/*
|--------------------------------------------------------------------------
| DISPLAY INVOICE
|--------------------------------------------------------------------------
*/

echo invoice_html($order);

?>