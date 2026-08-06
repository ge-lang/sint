<?php
require_once ("admin/includes/init.php");
require_once (__DIR__ . '/i18n.php');

if (isset($_GET['lang']) && in_array($_GET['lang'], array('nl', 'en'), true)) {
    $_SESSION['evva_lang'] = $_GET['lang'];
}
$evva_lang = $_SESSION['evva_lang'] ?? 'nl';
$evva_lang_query = $_GET;
$evva_lang_query['lang'] = 'en';
$evva_en_url = basename($_SERVER['SCRIPT_NAME'] ?? 'gts_index.php') . '?' . http_build_query($evva_lang_query);
$evva_lang_query['lang'] = 'nl';
$evva_nl_url = basename($_SERVER['SCRIPT_NAME'] ?? 'gts_index.php') . '?' . http_build_query($evva_lang_query);

$seo_pages = array(
    'gts_index.php' => array(
        'title' => 'EVVA | Telecom, energie en slimme technologie',
        'description' => 'Vergelijk telecom, internet, energie en slimme technologie. EVVA helpt consumenten en zelfstandigen in België met een passende keuze.'
    ),
    'diensten.php' => array(
        'title' => 'Diensten | Telecom, internet, energie en zonnepanelen | EVVA',
        'description' => 'Ontdek de telecom-, internet-, energie- en zonnepanelendiensten van EVVA en vind een aanbod dat bij uw behoeften past.'
    ),
    'dienst-details.php' => array(
        'title' => 'Dienst | EVVA',
        'description' => 'Ontdek de diensten van EVVA en ontvang persoonlijk advies over telecom, internet, energie en slimme technologie.'
    ),
    'over.php' => array(
        'title' => 'Over EVVA | Onafhankelijk advies in België',
        'description' => 'Leer EVVA kennen: onafhankelijk advies en duidelijke vergelijkingen voor telecom, energie en slimme technologie.'
    ),
    'contact.php' => array(
        'title' => 'Contact | EVVA Oostende',
        'description' => 'Neem contact op met EVVA in Oostende voor advies over telecom, energie, internet en slimme technologie.'
    ),
    'tarieven.php' => array(
        'title' => 'Tarieven | EVVA',
        'description' => 'Bekijk de actuele tarieven en mogelijkheden voor telecom-, internet- en energiediensten van EVVA.'
    ),
    'partner_worden.php' => array(
        'title' => 'Partner worden | EVVA',
        'description' => 'Wilt u partner worden van EVVA? Neem contact op en ontdek de mogelijkheden voor samenwerking.'
    ),
    'klant_worden.php' => array(
        'title' => 'Klant worden | EVVA',
        'description' => 'Word klant van EVVA en ontvang persoonlijk advies over telecom, energie en slimme technologie.'
    ),
    'index.php' => array(
        'title' => 'Smart Shop | Moderne technologie | EVVA',
        'description' => 'Ontdek moderne smartphones, computers, smart-homeproducten en accessoires in de EVVA Smart Shop.'
    ),
    'shop.php' => array(
        'title' => 'Producten | EVVA Smart Shop',
        'description' => 'Bekijk het actuele aanbod technologieproducten in de EVVA Smart Shop.'
    ),
    'shop_categories.php' => array(
        'title' => 'Producten per categorie | EVVA Smart Shop',
        'description' => 'Vind technologieproducten per categorie in de EVVA Smart Shop.'
    ),
    'shop_brands.php' => array(
        'title' => 'Producten per merk | EVVA Smart Shop',
        'description' => 'Bekijk technologieproducten per merk in de EVVA Smart Shop.'
    ),
    'product-details.php' => array(
        'title' => 'Productdetails | EVVA Smart Shop',
        'description' => 'Bekijk de productdetails en bestel online via de EVVA Smart Shop.'
    ),
    'shopping-cart.php' => array(
        'title' => 'Winkelwagen | EVVA Smart Shop',
        'description' => 'Controleer uw winkelwagen in de EVVA Smart Shop.',
        'robots' => 'noindex, nofollow'
    ),
    'checkout.php' => array(
        'title' => 'Afrekenen | EVVA Smart Shop',
        'description' => 'Rond uw bestelling af in de EVVA Smart Shop.',
        'robots' => 'noindex, nofollow'
    )
);

$seo_key = basename(parse_url($_SERVER['SCRIPT_NAME'] ?? '', PHP_URL_PATH));
$seo = $seo_pages[$seo_key] ?? array(
    'title' => 'EVVA | Evolution Valuation',
    'description' => 'EVVA biedt onafhankelijk advies en praktische oplossingen voor telecom, energie en slimme technologie in België.'
);
if ($seo_key === 'product-details.php' && !empty($product['title'])) {
    $product_title = trim((string) $product['title']);
    $seo['title'] = $product_title . ' | EVVA Smart Shop';
    $seo['description'] = 'Bekijk de specificaties en bestel ' . $product_title . ' online via de EVVA Smart Shop.';
}
if ($seo_key === 'dienst-details.php' && !empty($dienst->title)) {
    $seo['title'] = $dienst->title . ' | EVVA Diensten';
    $seo['description'] = 'Ontdek de EVVA-dienst ' . $dienst->title . ' en ontvang persoonlijk advies over uw mogelijkheden.';
}
$seo_robots = $seo['robots'] ?? 'index, follow';
$site_url = rtrim((string) getenv('SITE_URL'), '/');
$canonical_url = $site_url !== '' ? $site_url . '/' . $seo_key : '';
?>


<!DOCTYPE html>
<html lang="<?php echo $evva_lang === 'en' ? 'en' : 'nl'; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="<?php echo htmlspecialchars($seo_robots, ENT_QUOTES, 'UTF-8'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title><?php echo htmlspecialchars($seo['title'], ENT_QUOTES, 'UTF-8'); ?></title>

    <?php if ($canonical_url !== ''): ?>
        <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="EVVA">
    <meta property="og:title" content="<?php echo htmlspecialchars($seo['title'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($seo['title'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8'); ?>">

    <!-- EVVA favicon -->
    <link rel="icon" href="img/logo_evva_hot.svg" type="image/svg+xml">
    <link rel="icon" href="img/favicon.png" sizes="32x33" type="image/png">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css?v=evva10">





    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files-->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css"/>

    <!-- Main Stylesheet File -->
    <link href="css/style.css?v=evva13" rel="stylesheet">
</head>
