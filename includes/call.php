<?php ?>
<!--==========================
     Call To Action Section
   ============================-->


<section id="call-to-action" class="wow fadeInUp">
    <form action="mailto:info@evva.com" name="sentMessage" class="well" id="contactForm"  novalidate>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h3 class="cta-title"><?php echo evva_text('cta_title'); ?></h3>
                <p class="cta-text"><?php echo evva_text('cta_text'); ?></p>

                <div class="evva-cta-actions">
                    <a class="evva-gradient-button" href="klant_worden.php"><span><?php echo evva_text('client'); ?></span></a>
                    <a class="evva-gradient-button" href="partner_worden.php"><span><?php echo evva_text('partner'); ?></span></a>
                </div>
            </div>
            <div class="col-lg-6 cta-btn-container text-center">
                <img src="img/evva-contact-support.png" alt="EVVA support">
            </div>
        </div>

    </div>
    </form>
</section> <!-- #call-to-action -->
