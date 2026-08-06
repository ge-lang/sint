<?php $is_en = (($evva_lang ?? $_SESSION['evva_lang'] ?? 'nl') === 'en'); ?>

<!--==========================
     Trust Section
   ============================-->
<section id="testimonials" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2><?php echo $is_en ? 'WHY CHOOSE EVVA?' : 'WAAROM KIEZEN VOOR EVVA?'; ?></h2>
            <p><?php echo $is_en ? 'We make complex choices clear and guide you personally through telecom, energy and smart technology.' : 'Wij maken complexe keuzes overzichtelijk en begeleiden u persoonlijk bij telecom, energie en slimme technologie.'; ?></p>
        </div>
        <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
                <p><?php echo $is_en ? 'Clear comparisons based on your needs.' : 'Heldere vergelijking van aanbiedingen op basis van uw behoeften.'; ?></p>
                <h3><?php echo $is_en ? 'Personal advice' : 'Persoonlijk advies'; ?></h3>
                <h4>EVVA</h4>
            </div>

            <div class="testimonial-item">
                <p><?php echo $is_en ? 'A practical approach to telecom, internet and energy.' : 'Een praktische aanpak voor telecom, internet en energie.'; ?></p>
                <h3><?php echo $is_en ? 'Independent choice' : 'Onafhankelijke keuze'; ?></h3>
                <h4>EVVA</h4>
            </div>

            <div class="testimonial-item">
                <p><?php echo $is_en ? 'From your first question to the right solution, we stay available.' : 'Van eerste vraag tot passende oplossing: wij blijven bereikbaar.'; ?></p>
                <h3><?php echo $is_en ? 'Support without hassle' : 'Begeleiding zonder zorgen'; ?></h3>
                <h4>EVVA</h4>
            </div>

            <div class="testimonial-item">
                <p><?php echo $is_en ? 'Modern products and services in one trusted place.' : 'Moderne producten en diensten op één herkenbare plek.'; ?></p>
                <h3><?php echo $is_en ? 'Everything in one overview' : 'Alles overzichtelijk'; ?></h3>
                <h4>EVVA</h4>
            </div>

            <div class="testimonial-item">
                <p><?php echo $is_en ? 'We speak clearly and take time to understand your situation.' : 'Wij spreken duidelijke taal en nemen de tijd voor uw situatie.'; ?></p>
                <h3><?php echo $is_en ? 'Clear communication' : 'Duidelijke communicatie'; ?></h3>
                <h4>EVVA</h4>
            </div>

        </div>

    </div>
</section><!-- #testimonials -->
