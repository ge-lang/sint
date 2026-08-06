<?php ?>

<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix">
    <div class="container">
        <div class="row align-items-center">
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-4">
                <div class="single_widget_area">
                    <!-- Logo -->
                    <div class="footer-logo mr-50 w-25">
                        <a href="gts_index.php"><img class="evva-mark" src="img/logo_evva_hot.svg" alt="EVVA"></a>
                    </div>
                    <!-- Copywrite Text -->
                    <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <a href="index.php"><?php echo evva_text('footer_evolution'); ?></a> &copy;<script>document.write(new Date().getFullYear());</script> EVVA</p>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-8">
                <div class="single_widget_area">
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <nav class="navbar navbar-expand-lg justify-content-end">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                            <div class="collapse navbar-collapse" id="footerNavContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="gts_index.php"><?php echo evva_text('home'); ?></a>
                                    </li>
                                    <li class="nav-item footer-services-item">
                                        <a class="nav-link" href="diensten.php"><?php echo evva_text('services'); ?></a>
                                        <ul class="footer-services-submenu">
                                            <li><a href="dienst-details.php?id=1"><?php echo evva_text('telecom'); ?></a></li>
                                            <li><a href="dienst-details.php?id=2"><?php echo evva_text('internet'); ?></a></li>
                                            <li><a href="dienst-details.php?id=5"><?php echo evva_text('smart_home'); ?></a></li>
                                            <li><a href="dienst-details.php?id=3"><?php echo evva_text('energy'); ?></a></li>
                                            <li><a href="dienst-details.php?id=4"><?php echo evva_text('solar'); ?></a></li>
                                            <li class="footer-submenu-divider"><a href="klant_worden.php"><?php echo evva_text('client'); ?></a></li>
                                            <li><a href="partner_worden.php"><?php echo evva_text('partner'); ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php"><?php echo evva_text('shop'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="over.php"><?php echo evva_text('info'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.php">CONTACT</a>
                                    </li>
                                    <li class="nav-item footer-account-item">
                                        <a class="nav-link" href="login.php"><i class="fa fa-user"></i> <?php echo evva_text('login'); ?></a>
                                        <ul class="footer-services-submenu footer-account-submenu">
                                            <li><a href="login.php"><?php echo evva_text('login'); ?></a></li>
                                            <li><a href="my-orders.php"><?php echo evva_text('account'); ?></a></li>
                                            <li><a href="logout.php"><?php echo evva_text('logout'); ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item footer-cart-item">
                                        <?php if (!empty($_SESSION['cart'])): ?>
                                            <?php $footer_cart_count = count(array_keys($_SESSION['cart'])); ?>
                                            <a class="nav-link footer-cart-link" href="shopping-cart.php" aria-label="Shopping cart">
                                                <i class="fa fa-shopping-cart"></i> <span><?php echo $footer_cart_count; ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        </div>

</footer>
</div>
<!-- ##### Footer Area End ##### -->


<!--==========================
   Footer
 ==========================-->
<footer id="footer">
    <div class="container">

    </div>

</footer><!-- #footer -->


<!-- JavaScript -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Legacy shop plugins and behaviors use the shared jQuery instance above. -->
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/magnific-popup/magnific-popup.min.js"></script>
<script src="lib/sticky/sticky.js"></script>
<script src="js/main.js"></script>

</body>
</html>
