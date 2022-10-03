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
