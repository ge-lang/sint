<?php
$diensten = Dienst::find_all();
$is_en = (($evva_lang ?? $_SESSION['evva_lang'] ?? 'nl') === 'en');
$service_titles_en = array('Zonnenpanelen' => 'Solar Panels', 'Energie' => 'Energy');
?>



<!--==========================
        Our Portfolio Section
      ============================-->
<section id="portfolio" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2><?php echo $is_en ? 'OUR SERVICES' : 'ONZE DIENSTEN'; ?></h2>
            <p><?php echo $is_en ? 'Find the right solution for your needs.' : 'Er is steeds een aanbod dat bij jouw noden past'; ?></p>
        </div>
    </div>



            <div class= "products-catagories-area clearfix">
                <div class="amado-pro-catagory clearfix ">
                    <?php foreach ($diensten as $dienst): ?>

                        <?php
                        $dienst_title = (string) $dienst->title;
                        if ($is_en && isset($service_titles_en[$dienst_title])) {
                            $dienst_title = $service_titles_en[$dienst_title];
                        }
                        ?>

                        <div class="portfolio-item wow fadeInUp single-products-catagory clearfix">
                            <a href="dienst-details.php?id=<?php echo (int) $dienst->id; ?>">
                                <img src="<?php echo 'admin' . DS . $dienst->picture_path(); ?>" alt="<?php echo htmlspecialchars($dienst_title, ENT_QUOTES, 'UTF-8'); ?>">
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <div class="line"></div>

                                    <h4><?= htmlspecialchars($dienst_title, ENT_QUOTES, 'UTF-8'); ?></h4>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>


            




</section><!-- #portfolio -->
