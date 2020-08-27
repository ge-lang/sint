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

/*if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}*/

$app = new PayPal();
// fetch all products
$products = $app->getAllProducts();
$user = $app->getUserDetails($_SESSION['user_id']);







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
                            <img  src="admin/img/products/<?php echo $product["foto"]; ?>" class="w-75"   alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="admin/img/products/<?php echo $product["foto"]; ?>" alt="">
                        </div>-->

                        <!-- Product Description -->
                        <div class="product-description d-flex align-items-center justify-content-between">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">&euro;<?php echo $product['prijs']  ?></p>
                                <a href="product-details.php?id=<?php echo $product['id'] ?>">
                                    <h6><?php echo $product['title'] ?></h6>
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
                                <form action="shopping-cart.php" class="cart clearfix" method="post">
                                    <input type='hidden' name='product_id' value="<?php echo $product['id'] ?>" />


                                    <a href="shopping-cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"> <button type="submit" name="btnAddProduct" value="5" class="btn amado-btn"> <i class="fa fa-shopping-cart"></i></button></a>
                                </form>


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

<div class="row">





<?php
include ('includes/Newsletter.php');
?>
<?php
include ('includes/footer.php');

?>

