<?php
session_start();
require_once __DIR__ . '/includes/PayPal.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(array('success' => false, 'error' => 'Authentication required.'));
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$order_id = $input['orderID'] ?? '';
$success = (new PayPal())->capture_paypal_order($order_id, $_SESSION['user_id']);

if (!$success) {
    http_response_code(422);
    echo json_encode(array('success' => false, 'error' => 'PayPal payment was not completed.'));
    exit;
}

echo json_encode(array('success' => true));
