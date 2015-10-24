<?php
use PixelCreativityBoard\JustGiving;

class JustGivingDonationCest
{

    /**
     * Test the generated JustGiving url
     *
     * @param \FunctionalTester $I
     */
    public function testJustGivingDonateUrl(FunctionalTester $I)
    {
        $url = JustGiving::getDonationUrl();
        $I->assertContains('justgiving.com', $url);
        $I->assertContains(env('JUST_GIVING_SHORT_URL'), $url);
        $I->assertContains('donated', $url);
    }
}
