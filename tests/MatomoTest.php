<?php
namespace ElliotSawyer\Matomo;

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Core\Extensible;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\View\SSViewer;

class MatomoTest extends SapphireTest {
    protected static $fixture_file = 'fixtures/Matomo.yml';
    public function testMatomoSiteConfigFields()
    {
        //applied via SiteConfig
        $config1 = $this->objFromFixture(SiteConfig::class, 'good1');
        //add trailing slash
        $config1->write();
        $this->assertEquals('//matomo.test/', $config1->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

        //applied via SiteConfig
        $config2 = $this->objFromFixture(SiteConfig::class, 'good2');
        //add trailing slash
        $config2->write();
        $this->assertEquals('//matomo.test/', $config2->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

        //applied via SiteConfig
        $config3 = $this->objFromFixture(SiteConfig::class, 'good3');
        //add trailing slash
        $config3->write();
        $this->assertEquals('//matomo.test/', $config3->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

        //applied via SiteConfig
        $config4 = $this->objFromFixture(SiteConfig::class, 'good4');
        //add trailing slash
        $config4->write();
        $this->assertEquals('//matomo.test/', $config4->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

        //applied via SiteConfig
        $config5 = $this->objFromFixture(SiteConfig::class, 'bad1');
        //add trailing slash
        $config5->write();
        $this->assertEquals('//matomo.test/', $config5->MatomoTrackingURL);
        $this->assertEquals('1234', $config1->MatomoSiteId);

    }

    public function testScriptLoadedFromTemplate()
    {
        // //check template for emptiness and correctness



        // $empty1 = $this->objFromFixture(SiteConfig::class, 'emptytemplate1');
        // $template_noURL = SSViewer::execute_template('ElliotSawyer/Matomo/Includes/Matomo', [
        //     'MatomoTrackingURL' => $empty1->MatomoTrackingURL
        // ]);
        // $this->assertEmpty($template_noURL);

        // $template_noID = SSViewer::execute_template('ElliotSawyer\Matomo\MatomoJS', [
        //     'MatomoSiteId' => $config->MatomoSiteId
        // ]);
        // $this->assertEmpty($template_noID);

        // $template = SSViewer::execute_template('ElliotSawyer\Matomo\MatomoJS', []);
        // $this->assertNotEmpty($template);
    }

        // //applied to all frontend page controllers
        // $this->assertTrue(Extensible::has_extension(ContentController::class, MatomoExtension::class));
        // $this->assertTrue(Extensible::has_extension(PageController::class, MatomoExtension::class));

        //@todo: unsure how to test these
        //exclude specific pages using siteconfig
        //opt-in for dev
        //opt-in for test
        //opt-out for live
        //opt-out for users (assumes CMS access or frontend profile editing)
    // }
}
