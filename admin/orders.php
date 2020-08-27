<?php include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}

$orders = Order::find_all();


?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <td"><a href="orders.php" class="btn btn-outline-danger rounded-0  mb-3"><i class="fas fa-fw fa-cash-register"></i><span>All Orders</span></a></td>

            <table class="table table-header">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>User_id</th>
                    <th>Payment_id</th>
                    <th>Payer_id</th>
                    <th>Payment_total</th>
                    <th>Created_at</th>
                    <th>Delete?</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order->id; ?></td>
                        <td><?php echo $order->user_id; ?></td>
                        <td><?php echo $order->payment_id; ?></td>
                        <td><?php echo $order->payer_id; ?></td>
                        <td><?php echo $order->payment_total; ?></td>
                        <td><?php echo $order->created_at; ?></td>

                        <td><a href="delete_order.php?id=<?php echo $order->id; ?>"
                               class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i> </a> </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>


