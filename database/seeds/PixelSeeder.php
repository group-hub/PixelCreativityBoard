<?php

use Illuminate\Database\Seeder;

class PixelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create all the grid squares in the database
        for ($y = 0; $y < env('GRID_MAX_Y', 80); $y++) {
            for ($x = 0; $x < env('GRID_MAX_X', 70); $x++) {
                DB::table('pixels')->insert([
                    'x' => $x,
                    'y' => $y,
                    'color' => null,
                    'expires_at' => null,
                ]);
            }
        }
    }
}
