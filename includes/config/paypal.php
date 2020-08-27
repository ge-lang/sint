<?php

/**
 *  If you make this application for live payments then update following variable values:
 *  Change MODE from sandbox to live
 *  Update PayPal Client ID and Secret to match with your live paypal app details
 *  Change Base URL to https://api.paypal.com/v1/
 *  finally make sure that APP URL matcher to your application url
 */

define('MODE', 'sandbox');
define('CURRENCY', 'USD');
define('APP_URL', 'http://localhost/sint/');

define("PayPal_CLIENT_ID", "AQBYg_wghJBEAY6PDcjJ6a3u0goMm7F0JbuNJ_p4QzwVgH75AQ6Wbg1KMR7XMdiRtnGzmr7HvNHftK3M");
define("PayPal_SECRET", "EN8g3K4m5IXCaSQcw4yLjAZFBOSXGh8OKnJU6REJv6WlYWuhhDOtTIsu7VVKyob0ikqh-3FSN32Nsmwj");
define("PayPal_BASE_URL", "https://api.sandbox.paypal.com/v1/");

?>
