<?php

use Illuminate\Database\Seeder;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \factory(\App\Models\Points::class, 10)->create();
    }
}
