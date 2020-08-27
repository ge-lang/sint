<?php
include ('includes/header.php');
require_once("admin/includes/init.php");
?>

<?php
include('includes/head_shop.php');?>

<?php


/*
if (empty($_SESSION['user_id'])) {
    header('Location: index_.php');
    exit;
}*/

$app = new PayPal();

if (!empty($_POST['btnAddProduct'])) {

    $product_id = $_POST['product_id'];
    $product = $app->get_product_details($product_id);
    $app->add_new_product($product);
}

if (!empty($_POST['btnRemoveProduct'])) {
    $app->remove_product($_POST['index']);
}


//update item quantity in product session
if(isset($_POST["quantity"]) && is_array($_POST["quantity"])){
    foreach($_POST["quantity"] as $key => $value){
        if(is_numeric($value)){
            $_SESSION["cart"][$key]["quantity"] = $value;
        }
    }
}
if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["cart"] as &$value){
        if($value['product_id'] === $_POST["product_id"]){
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }

}

if (isset($_GET['status']) && $_GET['status'] == FALSE) {
    $message = 'Your payment transaction failed!';
}

//$user = $app->getUserDetails($_SESSION['user_id']);

$cart = (!empty($_SESSION['cart']) ? $_SESSION['cart'] : []);
$total = (!empty($_SESSION['cart']) ? $app->_get_sum() : 0);
/*$items_total = $product["prijs"]*$product["quantity"];
$total_price += ($product["prijs"]*$product["quantity"]);*/

?>

<div class="cart-table-area text-dark section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>
                <?php if (count($cart) > 0) { ?>
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Items total</th>
                        </tr>
                        </thead>
                        <tbody class="bg-light">
                        <?php
                        $i = 0;
                        foreach ($cart as $product) { ?>
                        <tr>


                           <td class="cart_product_img">
                                <a href="#"><img src="admin/img/products/<?php echo $product["foto"]; ?>" alt="Product"></a>
                            </td>
                            <td class="cart_product_desc">
                                <h5><?php echo $product["title"]; ?></h5>
                            </td>
                            <td class="price">
                                <span><?php echo $currency.$product["prijs"]; ?></span>
                            </td>

                            <td class="quantity">
                                <form method='post' action=''>
                                    <input type='hidden' name='product_id' value="<?php echo $product["product_id"]; ?>" />
                                    <input type='hidden' name='action' value="change" />
                                    <select name='quantity' class='nice-select' onChange="this.form.submit()">
                                        <option <?php if($product["quantity"]==1) echo "selected";?>
                                                value="1">1</option>
                                        <option <?php if($product["quantity"]==2) echo "selected";?>
                                                value="2">2</option>
                                        <option <?php if($product["quantity"]==3) echo "selected";?>
                                                value="3">3</option>
                                        <option <?php if($product["quantity"]==4) echo "selected";?>
                                                value="4">4</option>
                                        <option <?php if($product["quantity"]==5) echo "selected";?>
                                                value="5">5</option>
                                    </select>
                                </form>

                            <td class="items_total">
                                <span><?php echo $currency.$product["prijs"]*$product["quantity"]; ?></span>
                            </td>
                            <td class="remove">

                                <form method="post" action="shopping-cart.php">
                                    <input type="hidden" name="index" value="<?php echo $i; ?>">
                                    <input type="submit" name="btnRemoveProduct" class="btn btn-default btn-xs"
                                           value="Remove">
                                </form>
                            </td>

                        </tr><?php $i++;
                        } ?>

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5 >Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>subtotal:</span><span><?php echo $currency.$total; ?></span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span><?php echo $currency.$total; ?></span></li>
                    </ul>
                    <div class="cart-btn mt-100">

                        <div class="w-100 text-center"><?php (count($cart) > 0 ? require 'pay-with-paypal.php' : '') ?></div>
                        <?php } else { ?>
                            <div class="form-group">
                                <p style="color: #f55a22">Your shopping cart is empty you don't have selected any of the product to purchase <a
                                            href="shop.php">click here</a> to add products. </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php if(count($cart) > 0){ ?>

                    <p>
                        Email: <b>buy@itechempires.com</b>
                    </p>
                    <p>
                        Password: <b>itechempires</b>
                    </p>
                <?php } ?>
                        <a href="shop.php" class="btn amado-btn w-100">Continue Shopping</a>
                    </div>
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

