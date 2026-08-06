<?php
require_once('admin/includes/init.php');
require_once('includes/i18n.php');
$evva_lang = (isset($_GET['lang']) && $_GET['lang'] === 'en') || (($_SESSION['evva_lang'] ?? 'nl') === 'en') ? 'en' : 'nl';

$dienst_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$dienst = $dienst_id ? Dienst::find_by_id($dienst_id) : false;

if (!$dienst) {
    redirect('diensten.php');
}

$dienst_content = array(
    'Telecom' => array(
        'eyebrow' => 'VERBINDING',
        'intro' => 'Blijf bereikbaar met een telecomoplossing die past bij uw dagelijks gebruik.',
        'text' => 'EVVA helpt u vergelijken tussen mobiele abonnementen, toestellen en aanvullende opties. We maken de keuze overzichtelijk en stemmen het aanbod af op uw gezin of onderneming.',
        'points' => array('Mobiele oplossingen voor elk gebruik', 'Duidelijke vergelijking van voorwaarden', 'Persoonlijk advies bij uw keuze')
    ),
    'Internet' => array(
        'eyebrow' => 'CONNECTIVITEIT',
        'intro' => 'Een stabiele internetverbinding als basis voor thuis en werk.',
        'text' => 'Van dagelijks streamen tot werken op afstand: EVVA helpt u een internetoplossing te vinden die aansluit bij uw snelheid, budget en gebruik.',
        'points' => array('Advies voor snelheid en dekking', 'Oplossingen voor thuis en zelfstandigen', 'Transparante abonnementskeuzes')
    ),
    'Energie' => array(
        'eyebrow' => 'BESPARING',
        'intro' => 'Maak een bewuste energiekeuze met inzicht in uw verbruik en kosten.',
        'text' => 'Wij helpen u energieleveranciers en oplossingen vergelijken. Zo krijgt u een helder beeld van tarieven, voorwaarden en mogelijkheden om slimmer met energie om te gaan.',
        'points' => array('Vergelijk actuele energietarieven', 'Inzicht in voorwaarden en kosten', 'Praktisch advies voor uw situatie')
    ),
    'Zonnenpanelen' => array(
        'eyebrow' => 'DUURZAAMHEID',
        'intro' => 'Ontdek wat zonnepanelen kunnen betekenen voor uw woning of onderneming.',
        'text' => 'EVVA brengt de mogelijkheden voor zonne-energie helder in kaart. We helpen u de juiste vragen te stellen over rendement, verbruik en installatie.',
        'points' => array('Inzicht in uw zonne-energiepotentieel', 'Vergelijking van mogelijkheden', 'Begeleiding bij de volgende stap')
    ),
    'Smart Home' => array(
        'eyebrow' => 'COMFORT',
        'intro' => 'Maak uw woning slimmer, comfortabeler en beter afgestemd op uw leven.',
        'text' => 'Van veiligheid en verlichting tot energiebeheer: EVVA helpt u slimme technologie kiezen die eenvoudig werkt en waarde toevoegt in uw dagelijks leven.',
        'points' => array('Slimme oplossingen voor elke woning', 'Meer comfort en controle', 'Technologie die met u meegroeit')
    ),
    'Smart Shop' => array(
        'eyebrow' => 'TECHNOLOGIE',
        'intro' => 'Ontdek moderne technologie voor werk, ontspanning en thuis.',
        'text' => 'In de EVVA Smart Shop vindt u zorgvuldig geselecteerde producten van de nieuwste generaties, met duidelijke productinformatie en een eenvoudige bestelervaring.',
        'points' => array('Actuele modellen en accessoires', 'Duidelijke productinformatie', 'Veilig online bestellen')
    )
);

$content = $dienst_content[$dienst->title] ?? array(
    'eyebrow' => 'EVVA DIENST',
    'intro' => 'Ontdek de mogelijkheden van ' . $dienst->title . '.',
    'text' => 'EVVA helpt u met een duidelijke vergelijking en persoonlijk advies.',
    'points' => array('Persoonlijk advies', 'Duidelijke mogelijkheden', 'Ondersteuning bij uw keuze')
);

if (($evva_lang ?? 'nl') === 'en') {
    $english_content = array(
        'Telecom' => array('title' => 'Telecom', 'eyebrow' => 'CONNECTIVITY', 'intro' => 'Stay connected with a telecom solution that fits the way you live and work.', 'text' => 'EVVA helps you compare mobile plans, devices and additional options. We make the choice clear and adapt the offer to your household or business.', 'points' => array('Mobile solutions for every need', 'Clear comparison of conditions', 'Personal advice for your choice')),
        'Internet' => array('title' => 'Internet', 'eyebrow' => 'CONNECTIVITY', 'intro' => 'A stable internet connection for home, work and everything in between.', 'text' => 'From streaming to working remotely, EVVA helps you find an internet solution that matches your speed, budget and daily use.', 'points' => array('Advice on speed and coverage', 'Solutions for homes and businesses', 'Transparent subscription choices')),
        'Energie' => array('title' => 'Energy', 'eyebrow' => 'SAVINGS', 'intro' => 'Make informed energy choices with a clear view of your usage and costs.', 'text' => 'We help you compare energy suppliers and solutions, so you can understand tariffs, conditions and ways to manage your energy more efficiently.', 'points' => array('Compare current energy tariffs', 'Clear view of conditions and costs', 'Practical advice for your situation')),
        'Zonnenpanelen' => array('title' => 'Solar Panels', 'eyebrow' => 'SUSTAINABILITY', 'intro' => 'Discover what solar energy can mean for your home or business.', 'text' => 'EVVA makes the possibilities of solar energy clear. We help you ask the right questions about return, usage and installation.', 'points' => array('Insight into your solar potential', 'Comparison of available options', 'Guidance on your next step')),
        'Smart Home' => array('title' => 'Smart Home', 'eyebrow' => 'COMFORT', 'intro' => 'Make your home smarter, more comfortable and better suited to your life.', 'text' => 'From security and lighting to energy management, EVVA helps you choose technology that is easy to use and adds value every day.', 'points' => array('Smart solutions for every home', 'More comfort and control', 'Technology that grows with you')),
        'Smart Shop' => array('title' => 'Smart Shop', 'eyebrow' => 'TECHNOLOGY', 'intro' => 'Discover modern technology for work, entertainment and home.', 'text' => 'The EVVA Smart Shop brings together carefully selected current-generation products with clear information and a simple ordering experience.', 'points' => array('Current models and accessories', 'Clear product information', 'Easy online ordering'))
    );
    if (isset($english_content[$dienst->title])) {
        $content = $english_content[$dienst->title];
    }
}

include('includes/header.php');
include('includes/head_gts.php');
?>

<main id="main">
    <section class="evva-service-detail">
        <div class="container">
            <div class="evva-service-hero">
                <div class="evva-service-hero-copy">
                    <span class="evva-kicker"><?php echo htmlspecialchars($content['eyebrow'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <h1><?php echo htmlspecialchars($content['title'] ?? $dienst->title, ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p><?php echo htmlspecialchars($content['intro'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <a class="evva-gradient-button" href="klant_worden.php"><span>VRAAG ADVIES AAN</span></a>
                </div>
                <div class="evva-service-hero-media">
                    <img src="admin/<?php echo htmlspecialchars($dienst->picture_path(), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($dienst->title, ENT_QUOTES, 'UTF-8'); ?> bij EVVA">
                </div>
            </div>

            <div class="row evva-service-detail-body">
                <div class="col-lg-7">
                    <h2>Een oplossing die bij u past</h2>
                    <p><?php echo htmlspecialchars($content['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="col-lg-5">
                    <ul class="evva-check-list evva-service-points">
                        <?php foreach ($content['points'] as $point): ?>
                            <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include('includes/footer.php'); ?>
