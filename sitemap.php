<?php

$site_url = rtrim((string) getenv('SITE_URL'), '/');
if ($site_url === '') {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $site_url = $scheme . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');
}

$pages = array(
    'gts_index.php',
    'diensten.php',
    'over.php',
    'tarieven.php',
    'contact.php',
    'partner_worden.php',
    'klant_worden.php',
    'index.php',
    'shop.php'
);

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach ($pages as $page) {
    echo '<url><loc>' . htmlspecialchars($site_url . '/' . $page, ENT_XML1, 'UTF-8') . '</loc></url>';
}
echo '</urlset>';

