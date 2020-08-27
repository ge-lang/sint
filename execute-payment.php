

<?php
session_start();
include ('includes/PayPal.php');


/*if (empty($_SESSION['user_id'])) {
    header('Location: index_.php');
    exit;
}*/


if (!empty($_GET['payment_id']) && !empty($_GET['payer_id']) && !empty($_GET['token'])) {

    $app = new PayPal();

    $user = $app->getUserDetails($_SESSION['user_id']);

    $payment_id = $_GET['payment_id'];
    $payer_id = $_GET['payer_id'];
    $token = $_GET['token'];

    if ($app->paypal_check_payment($payment_id, $payer_id, $token, $user['id'])) {
      header ("Location: my-orders.php?status=true");
        exit;
    } else {
       header ('Location: shopping-cart.php?status=false');
        exit;
    }

} else {
    header('Location: shop.php');
    exit;
}

?>
