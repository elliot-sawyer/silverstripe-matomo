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

    private function getProtocolAgnosticHostname()
    {
        $hostname = '';
        if ($this->owner->MatomoTrackingURL) {
            $hostname = rtrim($this->owner->MatomoTrackingURL);
            $hostname = rtrim($hostname, '/');
            $hostname .= '/';

            $hostname = ltrim($hostname);
            $hostname = str_replace(['http://', 'https://', '//'], '', $hostname);

            $hostname = '//' . $hostname;
        }
        
        return $hostname;

    }

    public function onBeforeWrite()
    {
        $this->owner->MatomoTrackingURL = $this->getProtocolAgnosticHostname();
    }
}
