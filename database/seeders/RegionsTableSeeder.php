<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Seed the regions table.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            ['name' => 'Tanger-Tétouan-Al Hoceïma', 'code' => '01'],
            ['name' => 'L\'Oriental', 'code' => '02'],
            ['name' => 'Fès-Meknès', 'code' => '03'],
            ['name' => 'Rabat-Salé-Kénitra', 'code' => '04'],
            ['name' => 'Béni Mellal-Khénifra', 'code' => '05'],
            ['name' => 'Casablanca-Settat', 'code' => '06'],
            ['name' => 'Marrakech-Safi', 'code' => '07'],
            ['name' => 'Souss-Massa', 'code' => '08'],
            ['name' => 'Guelmim-Oued Noun', 'code' => '09'],
            ['name' => 'Laâyoune-Sakia El Hamra', 'code' => '10'],
            ['name' => 'Dakhla-Oued Ed-Dahab', 'code' => '11'],
        ];

        DB::table('regions')->insert($regions);
    }
}
