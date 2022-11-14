<?php

// BASEURL
function BaseURL()
{
    return "http://localhost/polije-complaint";
}

// DATABASE
define("DB_HOST", "localhost");
define("DB_USER", "aristocaesar");
define("DB_PASS", "aristo0407");
define("DB_NAME", "polije_complaint");

// EMAIL
define("EMAIL_HOST", "smtp.gmail.com");
define("EMAIL_NAME", "POLITEKNIK NEGERI JEMBER");
define("EMAIL_USERNAME", "e41211739@student.polije.ac.id");
define("EMAIL_PASSWORD", "Aristo020704.");

// COMPONENTS
function getNavbarHome()
{
    require_once("app/views/components/navbarHome.php");
}
function getWizardLaporan()
{
    require_once("app/views/components/wizardLaporan.php");
}
function getTrackingLaporan()
{
    require_once("app/views/components/trackingLaporan.php");
}
function getSupportSosialMedia()
{
    require_once("app/views/components/supportSocialMedia.php");
}
function getInformasiLaporan()
{
    require_once("app/views/components/informasiLaporan.php");
}
function getFooterCopyright()
{
    require_once("app/views/components/footerCopyright.php");
}

// Admin
function getNavbarAdmin()
{
    require_once("app/views/components/admin/navigation.php");
}
function getSidebarAdmin()
{
    require_once("app/views/components/admin/sidebar.php");
}
function getFooterDashboard()
{
    require_once("app/views/components/admin/footerDashboard.php");
}
