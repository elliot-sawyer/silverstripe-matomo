<?php

namespace ElliotSawyer\Matomo;

use SilverStripe\View\ArrayData;
use SilverStripe\View\SSViewer;

class Matomo
{
    public static function tracking_code($trackingURL, $siteID)
    {
        return SSViewer::execute_template('Matomo', ArrayData::create([
            'MatomoTrackingURL' => $trackingURL,
            'MatomoSiteId'      => $siteID,
        ]));
    }
}
