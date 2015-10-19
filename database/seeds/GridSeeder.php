<?php

use Illuminate\Database\Seeder;

class GridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create all the grid squares in the database
        for ($y = 0; $y < env('GRID_MAX_Y', 60); $y++) {
            for ($x = 0; $x < env('GRID_MAX_X', 80); $x++) {
                DB::table('grid')->insert([
                    'x' => $x,
                    'y' => $y,
                    'color' => null,
                    'expires_at' => null,
                ]);
            }
        }
    }
}