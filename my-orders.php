<?php
include ('includes/header.php');
?>

<?php
include('includes/head_shop.php');
?>

<?php


/*
if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}*/

$app = new PayPal();

if (isset($_GET['status']) && $_GET['status'] == TRUE) {
    $message = 'Your payment transaction has been successfully completed.';
}

$user = $app->getUserDetails($_SESSION['user_id']);
$orders = $app->getOrders($user['id']);

?>


<div class="text-dark section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    Mijn Orders
                </h3>
            </div>
        </div>
        <div class="row">


            <div class="row">
                <div class="col-md-12">

                    <?php
                    if (isset($message) && $message != "") {
                        echo '<div class="alert alert-success"><strong>Success: </strong> ' . $message . '</div>';
                    }
                    ?>

                    <?php if (count($orders) > 0) {
                        foreach ($orders as $order){
                            ?>
                            <div class="panel panel-info pb-5">
                                <div class="panel-heading">
                                    <h5 class="panel-title" style="color: #f55a22">
                                        Order @ <?php echo $order['created_at'] ?>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Title</th>
                                            <th>Total</th>

                                        </tr>
                                        <?php foreach ($app->getOrderItems($order['id']) as $item){?>
                                            <tr>
                                                <td>
                                                    <?php echo $item['title']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $currency.$item['prijs']; ?>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </table>
                                    <h5>
                                        Grand total: <?php echo $order['payment_total']; ?> EUR
                                    </h5>
                                </div>
                            </div>

                        <?php }
                    }else{ ?>
                        <p>
                            You don't have any orders yet, visit <a href="shop.php">Products</a> to order.
                        </p>
                    <?php }?>

                </div>

            </div>




    </div>
</div>
</div>

</div>
<!-- ##### Main Content Wrapper End ##### -->


<?php
include ('includes/Newsletter.php');
?>

<?php
include ('includes/footer.php');
?>

<div class="container">



</div>

</body>
</html>
