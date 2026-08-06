<?php

$evva_translations = array(
    'nl' => array(
        'home' => 'HOME', 'services' => 'DIENSTEN', 'shop' => 'SMART SHOP', 'info' => 'INFO', 'contact' => 'CONTACT', 'login' => 'LOGIN', 'account' => 'MIJN ACCOUNT', 'logout' => 'UITLOGGEN',
        'client' => 'KLANT WORDEN', 'partner' => 'PARTNER WORDEN', 'services_all' => 'ALLE DIENSTEN',
        'services_heading' => 'WAT BIEDEN WE AAN',
        'services_intro' => 'Heldere oplossingen voor verbinding, comfort en energie. Wij helpen u kiezen wat past bij uw woning, gezin of onderneming.',
        'benefits_heading' => 'KIEZEN VOOR EVVA',
        'benefits_intro' => 'Persoonlijk advies, duidelijke keuzes en ondersteuning die verder gaat dan een vergelijking.',
        'cta_title' => 'Vragen over de EVVA-diensten?',
        'cta_text' => 'Contacteer ons voor extra informatie, een analyse of hulp.',
        'footer_evolution' => 'Evolution Valuation',
        'telecom' => 'TELECOM', 'internet' => 'INTERNET', 'smart_home' => 'SMART HOME', 'energy' => 'ENERGY', 'solar' => 'SOLAR PANELS',
    ),
    'en' => array(
        'home' => 'HOME', 'services' => 'SERVICES', 'shop' => 'SMART SHOP', 'info' => 'ABOUT', 'contact' => 'CONTACT', 'login' => 'LOGIN', 'account' => 'MY ACCOUNT', 'logout' => 'LOG OUT',
        'client' => 'BECOME A CUSTOMER', 'partner' => 'BECOME A PARTNER', 'services_all' => 'ALL SERVICES',
        'services_heading' => 'WHAT WE OFFER',
        'services_intro' => 'Clear solutions for connectivity, comfort and energy. We help you choose what fits your home, family or business.',
        'benefits_heading' => 'WHY CHOOSE EVVA',
        'benefits_intro' => 'Personal advice, clear choices and support that goes beyond a simple comparison.',
        'cta_title' => 'Questions about EVVA services?',
        'cta_text' => 'Contact us for more information, an analysis or support.',
        'footer_evolution' => 'Evolution Valuation',
        'telecom' => 'TELECOM', 'internet' => 'INTERNET', 'smart_home' => 'SMART HOME', 'energy' => 'ENERGY', 'solar' => 'SOLAR PANELS',
    )
);

function evva_text($key, $fallback = '')
{
    global $evva_translations, $evva_lang;
    return $evva_translations[$evva_lang][$key] ?? $fallback;
}
