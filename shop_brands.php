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


$brand_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$products = $brand_id > 0 ? Product::find_all_by_brand_id($brand_id) : [];

?>



<div class="amado_product_area section-padding-100">
    <div class="container-fluid">

        <h1 class="sr-only">Producten per merk</h1>

        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                    <!-- Total Products -->
                    <div class="total-products">
                        <p>Showing <?php echo count($products); ?> products</p>
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
                        <a href="product-details.php?id=<?php echo $product->id; ?>" class="product-card-link">
                        <div class="product-img text-center">
                            <img src="<?php echo 'admin' . DS . $product->picture_path(); ?>" class="w-75" alt="<?php echo htmlspecialchars($product->title, ENT_QUOTES, 'UTF-8'); ?>">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="<?php echo 'admin' . DS . $product->picture_path(); ?>" alt="" aria-hidden="true">
                        </div>
                        </a>

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
