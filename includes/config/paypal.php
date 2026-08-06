<?php

/**
 *  If you make this application for live payments then update following variable values:
 *  Change MODE from sandbox to live
 *  Update PayPal Client ID and Secret to match with your live paypal app details
 *  Change Base URL to https://api.paypal.com/v1/
 *  finally make sure that APP URL matcher to your application url
 */

define('MODE', getenv('PAYPAL_MODE') ?: 'sandbox');
define('CURRENCY', getenv('PAYPAL_CURRENCY') ?: 'USD');
define('APP_URL', getenv('PAYPAL_APP_URL') ?: 'http://localhost:8080');

define('PayPal_CLIENT_ID', getenv('PAYPAL_CLIENT_ID') ?: '');
define('PayPal_SECRET', getenv('PAYPAL_SECRET') ?: '');
define('PayPal_BASE_URL', rtrim(getenv('PAYPAL_BASE_URL') ?: 'https://api-m.sandbox.paypal.com/v1/', '/') . '/');
define('PayPal_API_BASE_URL', preg_replace('#/v1/$#', '/', PayPal_BASE_URL));
?>
