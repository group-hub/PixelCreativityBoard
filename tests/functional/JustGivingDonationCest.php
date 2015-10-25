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

    /**
     * Test get JustGiving donation details
     *
     * @param FunctionalTester $I
     */
    public function testGetJustGivingDonationDetails(FunctionalTester $I)
    {
        //This donation should always be in JustGiving's database
        $donationDetails = JustGiving::getDonationDetails('8628020');

        $I->assertEquals('25.0000', $donationDetails->amount);
        $I->assertEquals('Johnny Hume', $donationDetails->donorDisplayName);
    }
}
