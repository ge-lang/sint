<?php
include ('includes/header.php');

require_once("admin/includes/init.php");


?>

<?php
include('includes/head_shop.php');
?>
<?php
$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>


<?php

$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["cart"])) {
        foreach($_SESSION["cart"] as $key => $value) {
            if($_POST["code"] == $key){
                unset($_SESSION["cart"][$key]);
                $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
            }
            if(empty($_SESSION["cart"]))
                unset($_SESSION["cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["cart"] as &$value){
        if($value['code'] === $_POST["code"]){
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }

}
?>
<?php
if(isset($_SESSION["shopping_cart"])){
$total_price = 0;
?>
<div class="cart-table-area text-dark section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>

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
                        foreach ($_SESSION["cart"] as $product){
                        ?>
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
                                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
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
                                <form method='post' action=''>
                                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                    <input type='hidden' name='action' value="remove" />
                                    <button type='submit' class='btn btn-link' style="color: #f55a22">Remove</i></button>
                                </form>
                            </td>

                        </tr>
                            <?php
                        $total_price += ($product["prijs"]*$product["quantity"]);
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5 >Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span><?php echo $currency.$total_price; ?></span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span><?php echo $currency.$total_price; ?></span></li>
                    </ul>
                    <div class="cart-btn mt-100">
                        <a href="checkout.php" class="btn amado-btn w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}else{ echo "<h3 class='text-center mt-70 ml-50' style='color:#f55a22 '>Your cart is empty!</h3>
";
}?>

</div>
<!-- ##### Main Content Wrapper End ##### -->

