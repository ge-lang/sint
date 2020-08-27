<?php ?>
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
/*
$user = $app->getUserDetails($_SESSION['user_id']);
$orders = $app->getOrders($user['id']);*/

?>
<body">
<div class="container-fluid px-0">
<!--==========================
       Top Bar
     ============================-->
<section id="" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i> <a href="mailto:info@wtsvoip.com">info@wtsvoip.com</a>
            <i class="fa fa-phone"></i> +32 496 39 30 28
        </div>
        <div class="social-links float-right">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>

    </div>
</section>


    <!--==========================
          Header
        ============================-->
    <header id="header">
        <div class="container ">

            <div id="" class="pull-left position-absolute">
                <a href="#body" class="scrollto"><img class="w-50" src="img/logo_104x104.png" alt="" title="" /></a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="gts_index.php">GTS</a></li>
                    <li class="">
                        <a href="diensten.php" class="" data-toggle="">Diensten</a>
                        <ul class="bg-transparent text-dark">
                            <li><a href="gts_index.php" class="">Telecomdiensten</a></li>
                            <li><a href="gts_index.php" class="">Energie</a></li>
                            <li><a href="gts_index.php" class="">Zonnenpanelen</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="index.php">Smart Shop</a>

                    </li>  <li><a href="over.php">Over</a></li>

                    <li><a href="contact.php">Contact</a></li>
                    <li><i class="fa fa-user"></i> <a href="login.php">Login</a></li>


                    <li><?php
                        if(!empty($_SESSION["cart"])) {
                            $cart_count = count(array_keys($_SESSION["cart"]));
                            ?>
                            <div class="">
                                <a href="shopping-cart.php"><i class="fa fa-shopping-cart"></i><span>
<?php echo $cart_count; ?></span></a>
                            </div>
                            <?php
                        }
                        ?></li>

                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->


<!-- Search Wrapper Area Start -->
<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type your keyword...">
                        <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Wrapper Area End -->

<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper bg-white d-flex clearfix ">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>


<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <!--<div class="logo">
        <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
    </div>-->
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>

        </ul>
    </nav>
    <!-- Button Group -->
    <div class="amado-btn-group mt-30 mb-100">
        <a href="#" class="btn amado-btn mb-15">Sale </a>
        <a href="#" class="btn amado-btn active">New</a>
    </div>


  <!-- <div class="btn btn-danger text-left" style="background-color:  #f55a22">
        <p class="">Klant</p>
        <p class="">
            <b><?php /*echo $user['username'] */?></b>
        </p>
        <p class="">
            <b><?php /*echo $user['first_name'] . ' ' . $user['last_name'] */?></b>
        </p>
        <p class="">
            <b><?php /*echo $user['email']; */?></b>
        </p>
    </div>-->

    <!-- Cart Menu -->
    <div class=" text-left mt-30 ">
    <div class="cart-fav-search mb-100">

        <?php
            if(!empty($_SESSION["cart"])) {
                $cart_count = count(array_keys($_SESSION["cart"]));
                ?>
                <div class="cart-nav">
                    <a href="shopping-cart.php" class="cart-nav" ><span><i class="fa fa-shopping-cart" style="color: #f55a22"></i>Cart</span> <span>(<?php echo $cart_count; ?>)</span></a>

                </div>
                <?php
            }
            ?>
        <a href="#" class="fav-nav"><span><i class="fa fa-heart" style="color: #f55a22"></i></span><span>Like</span></a>
        <a href="#" class="search-nav"><span><i class="fa fa-search" style="color: #f55a22"></i> </span><span>Search</span></a>
    </div>
    </div>


    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between mt-70">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>

<!-- Header Area End -->
