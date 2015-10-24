<?php

use PixelCreativityBoard\GridItem;
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
        //Calculate how many grid items should exist
        $expectedNumGridItems = env('GRID_MAX_X') * env('GRID_MAX_Y');

        //Check all the grid items have been created
        $I->seeNumRecords($expectedNumGridItems, 'grid');
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
     * Test a grid item expires
     *
     * @param FunctionalTester $I
     */
    public function testGridExpires(FunctionalTester $I)
    {
        //Expires in the future
        $gridItem = GridItem::findOrFail(1);
        $gridItem->color = 'red';
        $gridItem->expires_at = Carbon::now()->addDays(2);
        $gridItem->save();
        //The grid item shouldn't be removed
        $I->amOnPage('/');
        $I->see('', ".red#0x0");

        //Expires in the past
        $gridItem->expires_at = Carbon::now()->subDay();
        $gridItem->save();
        //The grid item should be removed
        $I->amOnPage('/');
        $I->dontSee('', ".red#0x0");
    }
}
