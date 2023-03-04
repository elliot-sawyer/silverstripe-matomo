<?php
namespace ElliotSawyer\Matomo;
use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;

class MatomoExtension extends Extension {
    public function onAfterInit(&$controller)
    {
        $siteConfig = SiteConfig::current_site_config();
        $matomoCode = Matomo::tracking_code(
            $siteConfig->MatomoTrackingURL,
            $siteConfig->MatomoSiteId
        );
        if($matomoCode) {
            Requirements::customScript($matomoCode, 'matomo-code');
        }
    }
}
