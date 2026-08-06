<?php

$currency = '&euro; '; //Currency Character or code

define('HOST', getenv('DB_HOST') ?: 'db');
define('USER', getenv('DB_USER') ?: 'root');
define('PASSWORD', getenv('DB_PASSWORD') ?: 'root');
define('DATABASE', getenv('DB_NAME') ?: 'sint');

function DB()
{
    $con = new mysqli(HOST, USER, PASSWORD, DATABASE);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    return $con;
}

?>
