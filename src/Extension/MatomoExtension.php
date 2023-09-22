<?php

namespace ElliotSawyer\Matomo;

use ElliotSawyer\Service\MatomoService;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\Controller;
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
    /**
     * @param Controller|null $controller
     * @return void
     */
    public function onAfterInit($controller = null)
    {
        /** @var SiteConfig|MatomoSiteConfigExtension $siteConfig */
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
