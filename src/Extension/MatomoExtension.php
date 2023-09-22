<?php

namespace ElliotSawyer\Matomo;

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;

/**
 * Class \ElliotSawyer\Matomo\MatomoExtension
 *
 * @property ContentController|MatomoExtension $owner
 */
class MatomoExtension extends Extension
{
    public function onAfterInit($controller = null)
    {
        $siteConfig = SiteConfig::current_site_config();
        $matomoCode = Matomo::tracking_code(
            $siteConfig->MatomoTrackingURL,
            $siteConfig->MatomoSiteId
        );
        if ($matomoCode) {
            Requirements::customScript($matomoCode, 'matomo-code');
        }
    }
}
