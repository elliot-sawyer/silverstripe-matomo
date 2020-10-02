<?php

namespace ElliotSawyer\Matomo;

use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;

/**
 * Class \ElliotSawyer\Matomo\MatomoExtension
 *
 * @property PageController|ContentController|MemberProfilePageController|MatomoExtension $owner
 */
class MatomoExtension extends Extension
{
    public function onAfterInit(&$controller)
    {
        $siteConfig = SiteConfig::current_site_config();
        $matomoCode = Matomo::tracking_code(
            $siteConfig->MatomoTrackingURL,
            $siteConfig->MatomoSiteId
        );
        if ($matomoCode) {
            Requirements::insertHeadTags("<script type='text/javascript'>$matomoCode</script>", true);
        }
    }
}
