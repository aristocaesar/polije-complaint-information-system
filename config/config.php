<?php

// BASEURL
function BaseURL()
{
    return $_ENV["BASE_URL"];
}

// DATABASE
define("DB_HOST", $_ENV["DB_HOST"]);
define("DB_USER", $_ENV["DB_USER"]);
define("DB_PASS", $_ENV["DB_PASS"]);
define("DB_NAME", $_ENV["DB_NAME"]);

// EMAIL
define("EMAIL_HOST", $_ENV["EMAIL_HOST"]);
define("EMAIL_NAME", str_replace("_", " ", $_ENV["EMAIL_NAME"]));
define("EMAIL_USERNAME", $_ENV["EMAIL_USER"]);
define("EMAIL_PASSWORD", $_ENV["EMAIL_PASS"]);

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
