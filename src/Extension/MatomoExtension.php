<?php
namespace ElliotSawyer\Matomo;

use SilverStripe\Control\Director;
use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;

class MatomoExtension extends Extension {
    public function onAfterInit(&$controller)
    {
        $matomoCode = $this->getMatomoCode();
        if($matomoCode) {
            Requirements::customScript($matomoCode, true);
        }
    }

    public function getMatomoCode()
    {
        //check dev
        // if(Director::isDev() && !$this->config()->show_on_dev) {
        //     return false;
        // }
        // //check test
        // if(Director::isTest() && !$this->config()->show_on_test) {
        //     return false;
        // }
        // //check live
        // if(Director::isLive() && !$this->config()->show_on_live) {
        //     return false;
        // }
        //check excluded controllers
        //check excluded URLs
        //check member opt-out

        //still here? render the template
        $config = SiteConfig::current_site_config();
        //check MatomoTrackingURL and MatomoSiteId
        return SSViewer::execute_template('Matomo', ArrayData::create([
            'MatomoTrackingURL' => $config->MatomoTrackingURL,
            'MatomoSiteId' => $config->MatomoSiteId,
        ]));
    }
}
