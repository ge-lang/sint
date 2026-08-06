<?php
session_start();
require_once __DIR__ . '/includes/PayPal.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(array('error' => 'Authentication required.'));
    exit;
}

$order_id = (new PayPal())->create_paypal_order();
if (!$order_id) {
    http_response_code(502);
    echo json_encode(array('error' => 'PayPal order could not be created.'));
    exit;
}

echo json_encode(array('id' => $order_id));
