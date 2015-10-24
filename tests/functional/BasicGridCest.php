<?php

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
}
