
<?php
include ('includes/header.php');

require_once("admin/includes/init.php");


?>

<?php
include('includes/head_shop.php');
?>

<?php

$app = new PayPal();
// fetch all products
$product = $app->get_product_details($_GET['id']);
$user = $app->getUserDetails($_SESSION['user_id']);
?>





        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#"><?= $product["categorie_id"]; ?></a></li>
                                <li class="breadcrumb-item"><a href="#"><?= $product["brand_id"]; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $product["title"]; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?php echo $product["foto"]; ?>);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(<?php echo $product["foto"]; ?>);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(<?php echo $product["foto"]; ?>);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(<?php echo $product["foto"]; ?>);">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="admin/img/products/<?php echo $product["foto"]; ?>">
                                            <img class="d-block w-100" src="admin/img/products/<?php echo $product["foto"]; ?>" alt="First slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="admin/img/products/<?php echo $product["foto"]; ?>">
                                            <img class="d-block w-100" src="admin/img/products/<?php echo $product["foto"]; ?>" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="admin/img/products/<?php echo $product["foto"]; ?>">
                                            <img class="d-block w-100" src="admin/img/products/<?php echo $product["foto"]; ?>" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="admin/img/products/<?php echo $product["foto"]; ?>">
                                            <img class="d-block w-100" src="admin/img/products/<?php echo $product["foto"]; ?>" alt="Fourth slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">&euro;<?php echo $product['prijs']  ?></p>
                                <a href="product-details.php?id=<?php echo $product['id'] ?>">
                                    <h6><?php echo $product['title'] ?></h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href=  "product_comment.php?id=<?php echo $product['id'] ?>" >Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p><?php echo $product['description'] ?></p>
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
        </div>
        <!-- Product Details Area End -->


    </div>
    <!-- ##### Main Content Wrapper End ##### -->


    <?php
    include ('includes/Newsletter.php');
    ?>


    <?php
    include ('includes/footer.php');
    ?>
