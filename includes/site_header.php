<?php ?>

<body>
<div class="container-fluid px-0">
    <!--==========================
           Top Bar
         ============================-->
    <section id="" class="d-none d-lg-block">
        <div class="container clearfix">
            <div class="contact-info float-left">
                <i class="fa fa-envelope-o"></i> <a href="mailto:info@evva.com">info@evva.com</a>
                <i class="fa fa-phone"></i> +32 000 00 00 00
            </div>
            <div class="social-links float-right">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <span class="evva-language-switch"><a href="<?php echo htmlspecialchars($evva_nl_url, ENT_QUOTES, 'UTF-8'); ?>">NL</a><span>/</span><a href="<?php echo htmlspecialchars($evva_en_url, ENT_QUOTES, 'UTF-8'); ?>">EN</a></span>
            </div>
        </div>
    </section>


    <!--==========================
      Header
    ============================-->
    <header id="header">
        <div class="container ">

            <div id="" class="pull-left position-absolute">
                <a href="#body" class="scrollto"><img class="evva-mark" src="img/logo_evva_cool.svg" alt="EVVA" title="EVVA" /></a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="home.php"><?php echo evva_text('home'); ?></a></li>
                    <li class="menu-has-children">
                        <a href="diensten.php" aria-haspopup="true"><?php echo evva_text('services'); ?></a>
                        <ul>
                            <li><a href="dienst-details.php?id=1"><?php echo evva_text('telecom'); ?></a></li>
                            <li><a href="dienst-details.php?id=2"><?php echo evva_text('internet'); ?></a></li>
                            <li><a href="dienst-details.php?id=5"><?php echo evva_text('smart_home'); ?></a></li>
                            <li><a href="dienst-details.php?id=3"><?php echo evva_text('energy'); ?></a></li>
                            <li><a href="dienst-details.php?id=4"><?php echo evva_text('solar'); ?></a></li>
                            <li class="evva-nav-divider"><a href="klant_worden.php"><?php echo evva_text('client'); ?></a></li>
                            <li><a href="partner_worden.php"><?php echo evva_text('partner'); ?></a></li>
                        </ul>
                    </li>
                    <li class=""><a href="index.php"><?php echo evva_text('shop'); ?></a> </li>
                    <li><a href="over.php"><?php echo evva_text('info'); ?></a></li>

                    <li><a href="contact.php"><?php echo evva_text('contact'); ?></a></li>
                    <li class="menu-has-children evva-account-item">
                        <a href="login.php"><i class="fa fa-user"></i> <?php echo evva_text('login'); ?></a>
                        <ul>
                            <li><a href="login.php"><?php echo evva_text('login'); ?></a></li>
                            <li><a href="my-orders.php"><?php echo evva_text('account'); ?></a></li>
                            <li><a href="logout.php"><?php echo evva_text('logout'); ?></a></li>
                        </ul>
                    </li>

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

