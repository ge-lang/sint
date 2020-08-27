<?php ?>
<?php
include ('includes/header.php');
?>

<?php
$diensten = Dienst::find_all();


?>



<!--==========================
        Our Portfolio Section
      ============================-->
<section id="portfolio" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2>Onze diensten</h2>
            <p>Er is steeds een aanbod dat bij jouw noden past</p>
        </div>
    </div>



            <div class= "products-catagories-area clearfix">
                <div class="amado-pro-catagory clearfix ">
                    <?php foreach ($diensten as $dienst): ?>

                        <div class="portfolio-item wow fadeInUp single-products-catagory clearfix">
                            <a href="diensten.php?id=<?php echo $dienst->id; ?>">
                                <img src="<?php echo 'admin' . DS . $dienst->picture_path(); ?>" alt="">
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <div class="line"></div>

                                    <h4><?= $dienst->title; ?></h4>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>


            <!--<div class="col-lg-3 col-md-4">
                <div class="portfolio-item wow fadeInUp">
                    <a href="img/wind-turbines-in-a-field-with-the-sun-setting-in-the-background.jpg" class="portfolio-popup">
                        <img src="img/wind-turbines-in-a-field-with-the-sun-setting-in-the-background.jpg" alt="">
                        <div class="portfolio-overlay">
                            <div class="portfolio-info"><h2 class="wow fadeInUp">Energie</h2></div>
                        </div>
                    </a>
                </div>
            </div>-->




</section><!-- #portfolio -->
