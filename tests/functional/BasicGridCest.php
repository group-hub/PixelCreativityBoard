<?php

use PixelCreativityBoard\Pixel;
use Carbon\Carbon;

class BasicGridCest
{

    /**
     * Verify the database has been seeded
     *
     * @param \FunctionalTester $I
     */
    public function testDatabaseSeeded(FunctionalTester $I)
    {
        //Calculate how many pixels should exist
        $expectedNumPixels = env('GRID_MAX_X') * env('GRID_MAX_Y');

        //Check all the pixels have been created
        $I->seeNumRecords($expectedNumPixels, 'pixels');
    }

    /**
     * Test the grid is drawn on the homepage
     *
     * @param FunctionalTester $I
     */
    public function testGridDrawnOnHomepage(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('', "#".(env('GRID_MAX_X')-1).'x'.(env('GRID_MAX_Y')-1));
    }

    /**
     * Test a pixel expires
     *
     * @param FunctionalTester $I
     */
    public function testGridExpires(FunctionalTester $I)
    {
        //Expires in the future
        $pixel = Pixel::findOrFail(1);
        $pixel->color = 'rgb(73, 134, 231)';
        $pixel->expires_at = Carbon::now()->addDays(2);
        $pixel->save();
        //The grid item shouldn't be removed
        $I->amOnPage('/');
        $I->see('', 'td[style*="background-color: rgb(73, 134, 231)"]');

        //Expires in the past
        $pixel->expires_at = Carbon::now()->subDay();
        $pixel->save();
        //The grid item should be removed
        $I->amOnPage('/');
        $I->dontSee('', 'td[style*="background-color: rgb(73, 134, 231)"]');
    }
}
