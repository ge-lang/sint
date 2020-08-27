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


$products = Product::find_all_by_brand_id($_GET['id']);

?>



<?php
$_SESSION['shopping_cart']=isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : array();
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

<div class="amado_product_area section-padding-100">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                    <!-- Total Products -->
                    <div class="total-products">
                        <p>Showing 1-8 0f 25</p>
                        <div class="view d-flex">
                            <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>

                        </div>
                    </div>
                    <!-- Sorting -->
                    <div class="product-sorting d-flex">
                        <div class="sort-by-date d-flex align-items-center mr-15">
                            <p>Sort by</p>
                            <form action="#" method="get">
                                <select name="select" id="sortBydate">
                                    <option value="value">Date</option>
                                    <option value="value">Newest</option>
                                    <option value="value">Popular</option>
                                </select>
                            </form>
                        </div>
                        <div class="view-product d-flex align-items-center">
                            <p>View</p>
                            <form action="#" method="get">
                                <select name="select" id="viewProduct">
                                    <option value="value">12</option>
                                    <option value="value">24</option>
                                    <option value="value">48</option>
                                    <option value="value">96</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
                                <!--<form action="" class="cart clearfix" method="post">
                                     <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"> <button type="submit" name="addtocart" value="5" class="btn amado-btn"><img src="img/core-img/cart.png" alt=""></button></a>
                                </form>-->
                                <!-- Add to Cart Form -->
                              <!--  <form action="" class="cart clearfix" method="post">
                                    <input type='hidden' name='code' value="<?/*= $product->code; */?>" />


                                    <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"> <button type="submit" name="addtocart" value="5" class="btn amado-btn"><i class="fa fa-shopping-cart"></i></button></a>
                                </form>-->


                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


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
