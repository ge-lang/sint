<?php ?>
<!--==========================
     Contact Section
   ============================-->
<section id="contact" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2>Contact</h2>
            <p>Neem contact met ons op</p>
        </div>

        <div class="row contact-info">
            <div class="col-lg-5">
                <div class="contact-address">
                    <i class="ion-ios-location-outline"></i>
                    <h3>Adres</h3>
                    <address>Gistelsesteenweg 1 0202 8400 Oostende België</address>
                </div>
                <div class="contact-phone">
                    <i class="ion-ios-telephone-outline"></i>
                    <h3>Telefoonnummer</h3>
                    <p><a href="tel:+155895548855">+32 496 39 30 28</a></p>
                </div>
                <div class="contact-email">
                    <i class="ion-ios-email-outline"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:info@wtsvoip.com">info@wtsvoip.com</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="container">
                    <div class="form">

                        <!-- Form itself -->
                        <form action="mailto:info@wtsvoip.com" name="sentMessage" class="well" id="contactForm"  novalidate>
                            <div class="control-group">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Naam" id="name" required
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
                           placeholder="Bericht" id="message" required
                           data-validation-required-message="Please enter your message" minlength="5"
                           data-validation-minlength-message="Min 5 characters"
                           maxlength="999" style="resize:none"></textarea>
                                </div>
                            </div>
                            <div id="success"> </div>
                            <button type="submit" class="btn btn-primary pull-right">Sturen</button><br />
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>




    <div class="container mb-4 map py-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4998.333260039581!2d2.9262000000000006!3d51.216006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dcaeda7f3b6083%3A0x11cbbf42918769f0!2sGistelsesteenweg%201%2C%208400%20Oostende!5e0!3m2!1snl!2sbe!4v1592290868236!5m2!1snl!2sbe" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

</section><!-- #contact -->