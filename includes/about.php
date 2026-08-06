<?php $is_en = (($evva_lang ?? $_SESSION['evva_lang'] ?? 'nl') === 'en'); ?>
<!--==========================
      About Section
    ============================-->
<section id="about" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2><?php echo $is_en ? 'ABOUT US' : 'OVER ONS'; ?></h2>
            <p><?php echo $is_en ? 'Evolution Valuation works independently, so we can offer suitable prices and solutions. Whether you are a professional or residential customer, we can help with mobile and fixed telephony, internet and digital TV. With more than 15 years of experience, we help consumers and self-employed professionals in Belgium compare offers and choose the solution that best fits their needs.' : 'Evolution Valuation werkt onafhankelijk, waardoor wij u steeds passende prijzen en oplossingen kunnen aanbieden. Als professionele of residentiële klant kunt u bij ons terecht voor mobiele en vaste telefonie, internet en digitale tv. Met meer dan 15 jaar ervaring helpen wij consumenten en zelfstandigen in België om aanbiedingen eenvoudig te vergelijken en de oplossing te kiezen die het best bij hun behoeften past.'; ?></p>

        </div>
        <div class="row">
            <div class="col-lg-8 content">

                <h2><?php echo $is_en ? 'We help you save and switch with confidence' : 'Wij helpen jou met het besparen en omschakelen zonder zorgen'; ?></h2>
                <h3><?php echo $is_en ? 'As experienced telecom and energy specialists, we compare operators and suppliers based on your needs.' : 'Als ervaren telecom- en energiespecialist vergelijken wij telecomoperatoren en energieleveranciers op basis van uw behoeften.'; ?></h3>
                <p><?php echo $is_en ? 'Do you prefer 100% green energy or a fixed rate for several years? No problem. We understand the market and adapt our advice to your needs.' : 'Heeft u een voorkeur voor 100% groene stroom of enkele jaren aan een vast tarief? Geen probleem, wij zijn thuis op alle markten en schikken ons naar uw noden'; ?></p>
                <p><?php echo $is_en ? 'Looking for a mobile subscription? Find mobile plans and bundles with digital TV, internet and fixed-line services under one roof. Compare leading providers and choose the plan that suits you best.' : 'Ben je geïnteresseerd in een gsm-abonnement? Bij ons vind je gsm-tariefplannen en bundels met digitale tv, internet en vaste lijn, allemaal onder één dak. Ideaal wanneer je het aanbod van de grootste telecomspelers wilt vergelijken om zo het tariefplan te vinden dat het best past bij jouw behoeften'; ?></p>
                <ul>
                    <li><i class="icon ion-ios-checkmark-outline"></i> <?php echo $is_en ? 'Fast, easy service. Clear comparisons that make the market easier to understand.' : 'Een gemakkelijke en snelle service. Gedaan met de onbegrijpelijke beschrijvingen! De missie van EVVA VOF bestaat erin om de keuze van de consument te vergemakkelijken.'; ?></li>
                    <li><i class="icon ion-ios-checkmark-outline"></i> <?php echo $is_en ? 'A free comparison with no commitment. Take your time before choosing an offer.' : 'Een gratis vergelijking zonder engagement. EVVA VOF service is 100% gratis en zonder verplichting.'; ?></li>
                    <li><i class="icon ion-ios-checkmark-outline"></i> <?php echo $is_en ? 'A practical way to save. Define your needs first, then compare offers in detail.' : 'De ideale tool om te besparen. Definieer eerst uw behoeften en vergelijk daarna de aanbiedingen in detail.'; ?></li>
                    <li><i class="icon ion-ios-checkmark-outline"></i> <?php echo $is_en ? 'Expert guidance. Our team listens and helps you choose an offer tailored to your situation.' : 'Toegang tot het advies van deskundigen. Onze teams luisteren naar u en geven u advies voor het kiezen van een aanbieding op maat.'; ?></li>


                </ul>
            </div>
            <div class="col-lg-4 about-img">
                <img src="img/evva-about-team.png" alt="EVVA technology team">
            </div>

        </div>

    </div>
</section><!-- #about -->
