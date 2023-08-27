<?php
namespace ElliotSawyer\Matomo;

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\ToggleCompositeField;
use SilverStripe\ORM\DataExtension;

class MatomoSiteConfigExtension extends DataExtension {

    private static $db = [
        'MatomoTrackingURL' => 'Varchar(255)',
        'MatomoSiteId' => 'Int'
    ];

    public function updateCMSFields(\SilverStripe\Forms\FieldList $fields)
    {
        $fields->addFieldToTab('Root.Analytics',
            ToggleCompositeField::create(
                'MatomoToggle',
                'Matomo',
                [
                    TextField::create('MatomoTrackingURL', 'Tracking URL'),
                    TextField::create('MatomoSiteId', 'Site ID'),
                ]
            )
        );
    }

    public function onBeforeWrite()
    {
        // only store protocol agnostic hostname if full URL is provided
        $this->owner->MatomoTrackingURL = parse_url(trim($this->owner->MatomoTrackingURL ?? ''), PHP_URL_HOST));
    }
}
