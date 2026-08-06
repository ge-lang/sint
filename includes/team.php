<?php
$teams = Teamlead::find_all();
$is_en = (($evva_lang ?? $_SESSION['evva_lang'] ?? 'nl') === 'en');
?>

<!--==========================
     Our Team Section
   ============================-->
<section id="team" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2><?php echo $is_en ? 'OUR TEAM' : 'ONS TEAM'; ?></h2>
        </div>




        <div class="row"><?php foreach ($teams as $team): ?>
            <div class="col-lg-3 col-md-6">

                <div class="member">
                    <div class="pic"><img src="<?php echo 'admin' . DS . $team->picture_path(); ?>" alt="<?php echo htmlspecialchars($team->naam . ' ' . $team->achternaam, ENT_QUOTES, 'UTF-8'); ?>"></div>
                    <div class="details">
                        <h4><?php echo $team->naam .' '. $team->achternaam; ?></h4>
                        <span><?php echo htmlspecialchars($is_en ? ucfirst((string) $team->positie) : $team->positie, ENT_QUOTES, 'UTF-8'); ?></span>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>


            <!--<div class="col-lg-3 col-md-6">
                <div class="member">
                    <div class="pic"><img src="img/logo_evva_mix.svg" alt="EVVA"></div>
                    <div class="details">
                        <h4>A J</h4>
                        <span>Act</span>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>

    </div>
</section><!-- #team -->
