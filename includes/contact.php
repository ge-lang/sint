<?php $is_en = (($evva_lang ?? $_SESSION['evva_lang'] ?? 'nl') === 'en'); ?>
<!--==========================
     Contact Section
   ============================-->
<section id="contact" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2>Contact</h2>
            <p><?php echo $is_en ? 'Get in touch with us' : 'Neem contact met ons op'; ?></p>
        </div>

        <div class="row contact-info">
            <div class="col-lg-5">
                <div class="contact-address">
                    <i class="ion-ios-location-outline"></i>
                    <h3><?php echo $is_en ? 'Address' : 'Adres'; ?></h3>
                    <address>Archimedesstraat 4/6, 8400 Oostende, België</address>
                </div>
                <div class="contact-phone">
                    <i class="ion-ios-telephone-outline"></i>
                    <h3><?php echo $is_en ? 'Phone' : 'Telefoonnummer'; ?></h3>
                    <p><a href="tel:+32 000 00 00 00">+32 000 00 00 00</a></p>
                </div>
                <div class="contact-email">
                    <i class="ion-ios-email-outline"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:info@evva.com">info@evva.com</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="container">
                    <div class="form">

                        <!-- Form itself -->
                        <form action="mailto:info@evva.com" name="sentMessage" class="well" id="contactForm"  novalidate>
                            <div class="control-group">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="<?php echo $is_en ? 'Name' : 'Naam'; ?>" id="name" required
                                           data-validation-required-message="Please enter your name" />
                                    <p class="help-block"></p>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <input type="email" class="form-control" placeholder="Email"
                                           id="email" required
                                           data-validation-required-message="Please enter your email" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="controls">
				 <textarea rows="10" cols="100" class="form-control"
                           placeholder="<?php echo $is_en ? 'Message' : 'Bericht'; ?>" id="message" required
                           data-validation-required-message="Please enter your message" minlength="5"
                           data-validation-minlength-message="Min 5 characters"
                           maxlength="999" style="resize:none"></textarea>
                                </div>
                            </div>
                            <div id="success"> </div>
                            <button type="submit" class="btn btn-primary pull-right"><?php echo $is_en ? 'Send' : 'Sturen'; ?></button><br />
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>




    <div class="container mb-4 map py-5">
    <iframe src="https://www.google.com/maps?q=VDAB+Oostende%2C+Archimedesstraat+4%2F6%2C+8400+Oostende&output=embed" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen loading="lazy" title="VDAB Oostende, Archimedesstraat 4/6"></iframe>
</div>

</section><!-- #contact -->
