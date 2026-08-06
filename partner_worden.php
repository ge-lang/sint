<?php
include('includes/header.php');
include('includes/head_gts.php');
$is_en = (($evva_lang ?? 'nl') === 'en');
?>

<main id="main">
    <section class="evva-application-page evva-partner-page">
        <div class="container">
            <div class="evva-application-intro">
                <span class="evva-kicker">EVVA NETWORK</span>
                <h1><?php echo $is_en ? 'BECOME A PARTNER' : 'PARTNER WORDEN'; ?></h1>
                <p><?php echo $is_en ? 'Would you like to offer telecom, energy or smart home solutions? Become an EVVA partner and help build a network with clear service and strong solutions.' : 'Wilt u telecom-, energie- of smart-homeoplossingen aanbieden? Word partner van EVVA en bouw mee aan een netwerk met duidelijke service en sterke oplossingen.'; ?></p>
            </div>

            <div class="row align-items-stretch">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="evva-application-panel">
                        <h2><?php echo $is_en ? 'Grow together' : 'Samen groeien'; ?></h2>
                        <ul class="evva-check-list">
                            <li><?php echo $is_en ? 'A recognisable EVVA partner network' : 'Een herkenbaar EVVA-partnernetwerk'; ?></li>
                            <li><?php echo $is_en ? 'Access to current products and services' : 'Toegang tot actuele producten en diensten'; ?></li>
                            <li><?php echo $is_en ? 'Personal support when you get started' : 'Persoonlijke ondersteuning bij uw start'; ?></li>
                        </ul>
                        <a class="evva-gradient-button" href="over.php"><span><?php echo $is_en ? 'MORE ABOUT EVVA' : 'MEER OVER EVVA'; ?></span></a>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="evva-application-form">
                        <h2><?php echo $is_en ? 'Partner application' : 'Partneraanvraag'; ?></h2>
                        <p><?php echo $is_en ? 'Leave your details and we will discuss the possibilities with you.' : 'Laat uw gegevens achter. We bespreken daarna de mogelijkheden.'; ?></p>
                        <form action="mailto:info@evva.com" method="post" enctype="text/plain">
                            <input type="hidden" name="Onderwerp" value="Nieuwe partneraanvraag voor EVVA">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="partner-company"><?php echo $is_en ? 'Company name *' : 'Bedrijfsnaam *'; ?></label>
                                    <input id="partner-company" name="Bedrijfsnaam" type="text" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="partner-contact"><?php echo $is_en ? 'Contact person *' : 'Contactpersoon *'; ?></label>
                                    <input id="partner-contact" name="Contactpersoon" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="partner-email">E-mail *</label>
                                    <input id="partner-email" name="E-mail" type="email" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="partner-phone"><?php echo $is_en ? 'Phone' : 'Telefoonnummer'; ?></label>
                                    <input id="partner-phone" name="Telefoonnummer" type="tel" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="partner-sector"><?php echo $is_en ? 'Your sector' : 'Uw sector'; ?></label>
                                <input id="partner-sector" name="Sector" type="text" class="form-control" placeholder="<?php echo $is_en ? 'For example telecom, energy or installation technology' : 'Bijvoorbeeld telecom, energie of installatietechniek'; ?>">
                            </div>
                            <div class="form-group">
                                <label for="partner-message"><?php echo $is_en ? 'Tell us about your company' : 'Vertel ons over uw bedrijf'; ?></label>
                                <textarea id="partner-message" name="Bericht" class="form-control" rows="5" placeholder="<?php echo $is_en ? 'What kind of partnership do you have in mind?' : 'Welke samenwerking heeft u in gedachten?'; ?>"></textarea>
                            </div>
                            <button type="submit" class="evva-gradient-button"><span><?php echo $is_en ? 'SEND REQUEST' : 'VERSTUUR AANVRAAG'; ?></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include('includes/footer.php'); ?>
