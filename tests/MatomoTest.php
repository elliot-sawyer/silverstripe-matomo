<?php

namespace ElliotSawyer\Matomo;

use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Dev\SapphireTest;

class MatomoTest extends SapphireTest
{
    protected static $fixture_file = 'fixtures/Matomo.yml';
    public function testMatomoSiteConfigFields()
    {
        //applied via SiteConfig
        $config1 = $this->objFromFixture(SiteConfig::class, 'good1');
        //add trailing slash
        $config1->write();
        $this->assertEquals('//matomotest-test-test.test/', $config1->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

        //applied via SiteConfig
        $config2 = $this->objFromFixture(SiteConfig::class, 'good2');
        //add trailing slash
        $config2->write();
        $this->assertEquals('//matomotest-test-test.test/', $config2->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

        //applied via SiteConfig
        $config3 = $this->objFromFixture(SiteConfig::class, 'good3');
        //add trailing slash
        $config3->write();
        $this->assertEquals('//matomotest-test-test.test/', $config3->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

        //applied via SiteConfig
        $config4 = $this->objFromFixture(SiteConfig::class, 'good4');
        //add trailing slash
        $config4->write();
        $this->assertEquals('//matomotest-test-test.test/', $config4->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

        //applied via SiteConfig
        $config5 = $this->objFromFixture(SiteConfig::class, 'bad1');
        //add trailing slash
        $config5->write();
        $this->assertEquals('//matomotest-test-test.test/', $config5->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);
    }

    public function testTrackingCode()
    {
        $config1 = $this->objFromFixture(SiteConfig::class, 'good1');
        $actual = (string) Matomo::tracking_code(
            $config1->MatomoTrackingURL,
            $config1->MatomoSiteId
        );

        $this->assertRegExp('#var u="//matomotest-test-test.test/";#', $actual);
        $this->assertRegExp("#_paq\.push\(\['setTrackerUrl', u\+'matomo.php'\]\);#", $actual);
        $this->assertRegExp("#_paq\.push\(\['setSiteId', '1234'\]\);#", $actual);
    }
}
