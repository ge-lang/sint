<?php
$app = new PayPal();

if (isset($_GET['status']) && $_GET['status'] == TRUE) {
    $message = 'Your payment transaction has been successfully completed.';
}

// The public top navigation lives in head_gts.php and is shared by every page.
include('head_gts.php');
?>


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
                        <input type="search" name="search" id="search" placeholder="Zoek in de shop..." aria-label="Zoek in de shop">
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
            <a href="index.php"><img class="evva-mark" src="img/logo_evva_hot.svg" alt="EVVA"></a>
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
        <a href="index.php"><img class="evva-mark" src="img/logo_evva_hot.svg" alt="EVVA"></a>
    </div>-->
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="active"><a href="index.php">HOME</a></li>
            <li><a href="shop.php">SHOP</a></li>

        </ul>
    </nav>
    <!-- Button Group -->
    <div class="amado-btn-group mt-30 mb-100">
        <a href="#" class="btn amado-btn mb-15">Sale </a>
        <a href="#" class="btn amado-btn active">New</a>
    </div>


  <!-- <div class="btn btn-danger text-left" style="background-color:  #8d1fea">
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
                    <a href="shopping-cart.php" class="cart-nav" ><span><i class="fa fa-shopping-cart" style="color: #8d1fea"></i>Cart</span> <span>(<?php echo $cart_count; ?>)</span></a>

                </div>
                <?php
            }
            ?>
        <a href="#" class="fav-nav"><span><i class="fa fa-heart" style="color: #8d1fea"></i></span><span>Like</span></a>
        <a href="#" class="search-nav"><span><i class="fa fa-search" style="color: #8d1fea"></i> </span><span>Search</span></a>
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
