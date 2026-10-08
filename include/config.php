<?php

define('PAYTM_ENVIRONMENT', 'production');

define('PAYTM_MERCHANT_ID', 'MadanB98335819401448');

// IMPORTANT: Put your ACTUAL production Merchant Key here
define('PAYTM_MERCHANT_KEY', 'iiN@qBj@7F6usTJZ');

define('PAYTM_WEBSITE', 'DEFAULT');
define('PAYTM_CHANNEL_ID', 'WEB');
define('PAYTM_INDUSTRY_TYPE_ID', 'Retail');


if (PAYTM_ENVIRONMENT === 'production') {

    define(
        'PAYTM_INITIATE_URL',
        'https://secure.paytmpayments.com/theia/api/v1/initiateTransaction'
    );

    define(
        'PAYTM_CHECKOUT_JS_URL',
        'https://secure.paytmpayments.com/merchantpgpui/checkoutjs/merchants/'
    );

} else {

    define(
        'PAYTM_INITIATE_URL',
        'https://securestage.paytmpayments.com/theia/api/v1/initiateTransaction'
    );

    define(
        'PAYTM_CHECKOUT_JS_URL',
        'https://securestage.paytmpayments.com/merchantpgpui/checkoutjs/merchants/'
    );
}


$keyId = PAYTM_MERCHANT_ID;
$keySecret = PAYTM_MERCHANT_KEY;


function get_paytm_callback_url()
{
    if (
        isset($_SERVER['HTTP_HOST']) &&
        (
            $_SERVER['HTTP_HOST'] === 'localhost' ||
            strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false
        )
    ) {
        return 'http://' .
            $_SERVER['HTTP_HOST'] .
            '/madanbihari/verify_payment.php';
    }

    return 'https://www.madanbiharihandicraft.com/verify_payment.php';
}


define(
    'PAYTM_CALLBACK_URL',
    get_paytm_callback_url()
);

?>