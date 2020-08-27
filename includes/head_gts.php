<?php ?>

<body>
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
                        <ul class="bg-transparent">
                            <li><a href="gts_index.php" class="text-white">Telecomdiensten</a></li>
                            <li><a href="gts_index.php" class="text-white">Energie</a></li>
                            <li><a href="gts_index.php" class="text-white">Zonnenpanelen</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="index.php">Smart Shop</a> </li>
                    <li><a href="over.php">Over</a></li>

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

