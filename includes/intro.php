<?php $is_en = ($evva_lang ?? 'nl') === 'en'; ?>



<!--==========================
  Intro Section
============================-->
<section id="intro">
    <div class="carousel slide" data-interval="6500" data-pause="hover" id="myCarousel">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#myCarousel"></li>
            <li data-slide-to="1" data-target="#myCarousel"></li>
            <li data-slide-to="2" data-target="#myCarousel"></li>
            <li data-slide-to="3" data-target="#myCarousel"></li>
        </ol>
        <div class="carousel-inner align-items-center">
            <div class="carousel-item active">
                <a class="gradient w-100" href="#"><img alt="EVVA technology" class="d-block w-100" src="img/evva-hero-main.png"></a>

                <div class="container text-center">
                    <div class="carousel-caption intro-content">
                        <h1><span><?php echo $is_en ? 'SMARTER LIVING' : 'SLIMMER WONEN'; ?></span><br><?php echo $is_en ? 'Comfort connected to your everyday life.' : 'Comfort dat met u meebeweegt.'; ?></h1>
                        <h5><?php echo $is_en ? 'Connect smart technology, energy and security in one clear solution.' : 'Verbind slimme technologie, energie en veiligheid in één duidelijke oplossing.'; ?></h5>
                        <div>
                            <a class="evva-gradient-button intro-gradient-button" href="dienst-details.php?id=5"><span><?php echo $is_en ? 'EXPLORE SMART HOME' : 'ONTDEK SMART HOME'; ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <a class="gradient w-100" href="#"><img alt="EVVA internet" class="d-block w-100" src="img/evva-hero-internet.png"></a>
                <div class="container text-center">
                    <div class="carousel-caption intro-content">
                        <h2><span><?php echo $is_en ? 'MODERN MOBILE TECH' : 'MODERNE MOBIELE TECH'; ?></span><br><?php echo $is_en ? 'Find the device that fits your day.' : 'Vind het toestel dat bij uw dag past.'; ?></h2>
                        <h5><?php echo $is_en ? 'Compare smartphones and mobile solutions with clear, practical advice.' : 'Vergelijk smartphones en mobiele oplossingen met helder, praktisch advies.'; ?></h5>
                        <div>
                            <a class="evva-gradient-button intro-gradient-button" href="shop.php"><span><?php echo $is_en ? 'VIEW SMART SHOP' : 'BEKIJK SMART SHOP'; ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <a class="gradient w-100" href="#"><img alt="EVVA energy" class="d-block w-100" src="img/evva-hero-energy.png"></a>
                <div class="container text-center">
                    <div class="carousel-caption  intro-content">
                        <h2><span><?php echo $is_en ? 'SMART ENERGY' : 'SLIMME ENERGIE'; ?></span><br><?php echo $is_en ? 'Use energy with more confidence.' : 'Gebruik energie met meer inzicht.'; ?></h2>
                        <h5><?php echo $is_en ? 'Explore energy and solar solutions designed around your needs.' : 'Ontdek energie- en zonneoplossingen die passen bij uw behoeften.'; ?></h5>
                        <div>
                            <a class="evva-gradient-button intro-gradient-button" href="dienst-details.php?id=3"><span><?php echo $is_en ? 'DISCOVER ENERGY' : 'ONTDEK ENERGIE'; ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <a class="gradient w-100" href="dienst-details.php?id=1"><img alt="EVVA telecom and fibre connection" class="d-block w-100" src="img/evva-hero-telecom.png"></a>
                <div class="container text-center">
                    <div class="carousel-caption intro-content">
                        <h2><span><?php echo $is_en ? 'CONNECTED WITH CONFIDENCE' : 'VERBONDEN MET VERTROUWEN'; ?></span><br><?php echo $is_en ? 'Telecom that keeps up with you.' : 'Telecom die met u meebeweegt.'; ?></h2>
                        <h5><?php echo $is_en ? 'Choose mobile and internet solutions that are easy to understand and simple to manage.' : 'Kies mobiele en internetoplossingen die duidelijk en eenvoudig te beheren zijn.'; ?></h5>
                        <div>
                            <a class="evva-gradient-button intro-gradient-button" href="dienst-details.php?id=1"><span><?php echo $is_en ? 'DISCOVER TELECOM' : 'ONTDEK TELECOM'; ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" data-slide="prev" href="#myCarousel" role="button">
            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" data-slide="next" href="#myCarousel" role="button">
            <span aria-hidden="true" class="carousel-control-next-icon"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section><!-- #intro -->
