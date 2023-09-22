<?php

namespace ElliotSawyer\Matomo;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\ToggleCompositeField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;

/**
 * Class \ElliotSawyer\Matomo\MatomoSiteConfigExtension
 *
 * @property SiteConfig|MatomoSiteConfigExtension $owner
 * @property string $MatomoTrackingURL
 * @property int $MatomoSiteId
 */
class MatomoSiteConfigExtension extends DataExtension
{
    private static $db = [
        'MatomoTrackingURL' => 'Varchar(255)',
        'MatomoSiteId'      => 'Int'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Analytics',
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
        $this->owner->MatomoTrackingURL = $this->getProtocolAgnosticHostname();
    }

    private function getProtocolAgnosticHostname()
    {
        $hostname = '';
        if ($this->owner->MatomoTrackingURL) {
            $hostname = trim($this->owner->MatomoTrackingURL);
            $hostname = str_replace(['http://', 'https://', '//'], '', $hostname);
            $hostname = rtrim($hostname, '/');

            $hostname = sprintf('//%s/', $hostname);
        }

        return $hostname;
    }
}
