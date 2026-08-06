<?php $is_en = ($evva_lang ?? 'nl') === 'en'; ?>

<section id="event">
    <div class="container">
        <div class="section-header">
            <h2><?php echo evva_text('benefits_heading'); ?></h2>
            <p><?php echo evva_text('benefits_intro'); ?></p>
        </div>

        <div class="row evva-benefit-grid">
            <div class="col-lg-6 mb-4">
                <article class="evva-benefit-card wow fadeInLeft">
                    <div class="evva-benefit-icon" aria-hidden="true"><i class="fa fa-comments"></i></div>
                    <div>
                        <span class="service-eyebrow"><?php echo $is_en ? 'ADVICE' : 'ADVIES'; ?></span>
                        <h3><?php echo $is_en ? 'Personal advice' : 'Persoonlijk advies'; ?></h3>
                        <p><?php echo $is_en ? 'We listen to your situation and turn your needs into a clear, practical solution.' : 'Wij luisteren naar uw situatie en vertalen uw wensen naar een oplossing die helder en haalbaar is.'; ?></p>
                        <a href="klant_worden.php"><?php echo $is_en ? 'BECOME A CUSTOMER' : 'START ALS KLANT'; ?> <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
            </div>

            <div class="col-lg-6 mb-4">
                <article class="evva-benefit-card wow fadeInRight">
                    <div class="evva-benefit-icon" aria-hidden="true"><i class="fa fa-list-alt"></i></div>
                    <div>
                        <span class="service-eyebrow"><?php echo $is_en ? 'CLARITY' : 'OVERZICHT'; ?></span>
                        <h3><?php echo $is_en ? 'Transparent choices' : 'Transparante keuzes'; ?></h3>
                        <p><?php echo $is_en ? 'Get a clear view of options, conditions and costs before making a decision.' : 'U krijgt een duidelijk overzicht van mogelijkheden, voorwaarden en kosten voordat u beslist.'; ?></p>
                        <a href="diensten.php"><?php echo $is_en ? 'VIEW SERVICES' : 'BEKIJK DIENSTEN'; ?> <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
            </div>

            <div class="col-lg-6 mb-4 mb-lg-0">
                <article class="evva-benefit-card wow fadeInLeft">
                    <div class="evva-benefit-icon" aria-hidden="true"><i class="fa fa-bolt"></i></div>
                    <div>
                        <span class="service-eyebrow"><?php echo $is_en ? 'SOLUTIONS' : 'OPLOSSINGEN'; ?></span>
                        <h3><?php echo $is_en ? 'Technology with impact' : 'Technologie met impact'; ?></h3>
                        <p><?php echo $is_en ? 'From telecom to energy, we combine current products with solutions that work in real life.' : 'Van telecom tot energie: we combineren actuele producten met oplossingen die in de praktijk werken.'; ?></p>
                        <a href="index.php"><?php echo $is_en ? 'GO TO SMART SHOP' : 'NAAR SMART SHOP'; ?> <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
            </div>

            <div class="col-lg-6 mb-4 mb-lg-0">
                <article class="evva-benefit-card wow fadeInRight">
                    <div class="evva-benefit-icon" aria-hidden="true"><i class="fa fa-handshake-o"></i></div>
                    <div>
                        <span class="service-eyebrow"><?php echo $is_en ? 'PARTNERSHIP' : 'SAMENWERKING'; ?></span>
                        <h3><?php echo $is_en ? 'A network that grows' : 'Een netwerk dat groeit'; ?></h3>
                        <p><?php echo $is_en ? 'As a partner, you get support, a strong offer and room to grow with EVVA.' : 'Als partner krijgt u ondersteuning, een sterk aanbod en ruimte om samen met EVVA te groeien.'; ?></p>
                        <a href="partner_worden.php"><?php echo $is_en ? 'BECOME A PARTNER' : 'WORD PARTNER'; ?> <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
