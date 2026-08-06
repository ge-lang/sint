<?php
include('includes/header.php');
include('includes/head_gts.php');
$is_en = (($evva_lang ?? 'nl') === 'en');
?>

<main id="main">
    <section class="evva-application-page">
        <div class="container">
            <div class="evva-application-intro">
                <span class="evva-kicker">EVVA ADVIES</span>
                <h1><?php echo $is_en ? 'BECOME A CUSTOMER' : 'KLANT WORDEN'; ?></h1>
                <p><?php echo $is_en ? 'Tell us what you need. We compare the options and contact you with a clear proposal for telecom, internet, energy or smart technology.' : 'Vertel ons wat u nodig heeft. Wij vergelijken de mogelijkheden en nemen contact op met een duidelijk voorstel voor telecom, internet, energie of slimme technologie.'; ?></p>
            </div>

            <div class="row align-items-stretch">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="evva-application-panel">
                        <h2><?php echo $is_en ? 'A solution that fits you' : 'Een oplossing die bij u past'; ?></h2>
                        <ul class="evva-check-list">
                            <li><?php echo $is_en ? 'Personal advice without complicated conditions' : 'Persoonlijk advies zonder ingewikkelde voorwaarden'; ?></li>
                            <li><?php echo $is_en ? 'Comparison of current offers' : 'Vergelijking van actuele aanbiedingen'; ?></li>
                            <li><?php echo $is_en ? 'Guidance from application to activation' : 'Begeleiding van aanvraag tot activatie'; ?></li>
                        </ul>
                        <a class="evva-gradient-button" href="diensten.php"><span><?php echo $is_en ? 'VIEW OUR SERVICES' : 'BEKIJK ONZE DIENSTEN'; ?></span></a>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="evva-application-form">
                        <h2><?php echo $is_en ? 'Request advice' : 'Vraag advies aan'; ?></h2>
                        <p><?php echo $is_en ? 'We will respond to your request as soon as possible.' : 'Wij beantwoorden uw aanvraag zo snel mogelijk.'; ?></p>
                        <form action="mailto:info@evva.com" method="post" enctype="text/plain">
                            <input type="hidden" name="Onderwerp" value="Nieuwe klantaanvraag voor EVVA">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customer-name"><?php echo $is_en ? 'Name *' : 'Naam *'; ?></label>
                                    <input id="customer-name" name="Naam" type="text" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="customer-email">E-mail *</label>
                                    <input id="customer-email" name="E-mail" type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customer-phone"><?php echo $is_en ? 'Phone' : 'Telefoonnummer'; ?></label>
                                    <input id="customer-phone" name="Telefoonnummer" type="tel" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="customer-interest"><?php echo $is_en ? 'What would you like advice about?' : 'Waarover wilt u advies?'; ?></label>
                                    <select id="customer-interest" name="Interesse" class="form-control">
                                        <option value="Telecom">Telecom</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Energie"><?php echo $is_en ? 'Energy' : 'Energie'; ?></option>
                                        <option value="Zonnepanelen"><?php echo $is_en ? 'Solar Panels' : 'Zonnepanelen'; ?></option>
                                        <option value="Smart Home">Smart Home</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customer-message"><?php echo $is_en ? 'Your question' : 'Uw vraag'; ?></label>
                                <textarea id="customer-message" name="Bericht" class="form-control" rows="5" placeholder="<?php echo $is_en ? 'How can we help you?' : 'Waar kunnen wij u mee helpen?'; ?>"></textarea>
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
