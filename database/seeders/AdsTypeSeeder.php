<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AdsType::factory(1)->create();
    }
}
