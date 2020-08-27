<?php
include ('includes/header.php');
require_once("admin/includes/init.php");
?>

<?php
include('includes/head_shop.php');
?>

<?php
include('includes/shop_sidebar_area.php');
?>
<?php
$_SESSION['products']=isset($_SESSION['products']) ? $_SESSION['products'] : array();
?>
<?php
// Enter your Host, username, password, database below.
$in = mysqli_connect("localhost:3308","root","","sint");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}


//include('in.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
    $code = $_POST['code'];
    $result = mysqli_query(
        $in,
        "SELECT * FROM `products` WHERE `code`='$code'"
    );
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $code = $row['code'];
    $prijs= $row['prijs'];
    $foto = $row['foto'];

    $cartArray = array(
        $code=>array(
            'title'=>$title,
            'code'=>$code,
            'prijs'=>$prijs,
            'quantity'=>1,
            'foto'=>$foto)
    );

    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div>Product is added to your cart!</div>";
    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($code,$array_keys)) {
            $status = "<div> Product is already added to your cart!</div>";
        } else {
            $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cartArray
            );
            $status = "<div >Product is added to your cart!</div>";
        }

    }
}
?>
<?php
$products = Product::find_all();

?>


    <div class="row">
        <?php foreach ($products as $product): ?>
            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img text-center">
                        <img  src="<?php echo 'admin' . DS . $product->picture_path(); ?>" class="w-75"   alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="<?php echo 'admin' . DS . $product->picture_path(); ?>" alt="">
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">&euro;<?= $product->prijs; ?></p>
                            <a href="product-details.php?id=<?php echo $product->id; ?>">
                                <h6><?= $product->title; ?></h6>
                            </a>
                        </div>
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>


                            <!-- Add to Cart Form -->
                            <form action="" class="cart clearfix" method="post">
                                <input type='hidden' name='code' value="<?= $product->code; ?>" />


                                <a href="caart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"> <button type="submit" name="addtocart" value="5" class="btn amado-btn"> <i class="fa fa-shopping-cart"></i></button></a>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>


    </div>
    <!-- ##### Main Content Wrapper End ##### -->







<?php
include ('includes/Newsletter.php');
?>




<?php
include ('includes/footer.php');

?>