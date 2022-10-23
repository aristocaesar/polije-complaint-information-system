<?php

// BASEURL
function BaseURL()
{
    return "http://localhost/polije-complaint";
}
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
