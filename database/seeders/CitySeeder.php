<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Seed the cities table.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve region IDs by name
        $regions = [
            'Tanger-Tétouan-Al Hoceïma' => 1,
            'L\'Oriental' => 2,
            'Fès-Meknès' => 3,
            'Rabat-Salé-Kénitra' => 4,
            'Béni Mellal-Khénifra' => 5,
            'Casablanca-Settat' => 6,
            'Marrakech-Safi' => 7,
            'Souss-Massa' => 8,
            'Guelmim-Oued Noun' => 9,
            'Laâyoune-Sakia El Hamra' => 10,
            'Dakhla-Oued Ed-Dahab' => 11,
        ];

        $cities = [
            ['name' => 'Casablanca', 'code' => 'CAS', 'region_name' => 'Casablanca-Settat'],
            ['name' => 'Rabat', 'code' => 'RAB', 'region_name' => 'Rabat-Salé-Kénitra'],
            ['name' => 'Fes', 'code' => 'FES', 'region_name' => 'Fès-Meknès'],
            ['name' => 'Marrakech', 'code' => 'MAR', 'region_name' => 'Marrakech-Safi'],
            ['name' => 'Tangier', 'code' => 'TAN', 'region_name' => 'Tanger-Tétouan-Al Hoceïma'],
            ['name' => 'Agadir', 'code' => 'AGA', 'region_name' => 'Souss-Massa'],
            ['name' => 'Oujda', 'code' => 'OUJ', 'region_name' => 'L\'Oriental'],
            ['name' => 'Kenitra', 'code' => 'KEN', 'region_name' => 'Rabat-Salé-Kénitra'],
            ['name' => 'Tétouan', 'code' => 'TET', 'region_name' => 'Tanger-Tétouan-Al Hoceïma'],
            ['name' => 'Safi', 'code' => 'SAF', 'region_name' => 'Souss-Massa'],
            ['name' => 'El Jadida', 'code' => 'ELJ', 'region_name' => 'Casablanca-Settat'],
            ['name' => 'Meknes', 'code' => 'MEK', 'region_name' => 'Fès-Meknès'],
            ['name' => 'Nador', 'code' => 'NAD', 'region_name' => 'L\'Oriental'],
            ['name' => 'Larache', 'code' => 'LAR', 'region_name' => 'Tanger-Tétouan-Al Hoceïma'],
            ['name' => 'Khemisset', 'code' => 'KHE', 'region_name' => 'Rabat-Salé-Kénitra'],
            ['name' => 'Laâyoune', 'code' => 'LAY', 'region_name' => 'Laâyoune-Sakia El Hamra'],
            ['name' => 'Dakhla', 'code' => 'DAK', 'region_name' => 'Dakhla-Oued Ed-Dahab'],
            ['name' => 'Guelmim', 'code' => 'GUE', 'region_name' => 'Guelmim-Oued Noun'],
        ];

        foreach ($cities as $city) {
            // Retrieve region ID by region name
            $regionId = DB::table('regions')->where('name', $city['region_name'])->value('id');

            DB::table('cities')->insert([
                'name' => $city['name'],
                'code' => $city['code'],
                'region_id' => $regionId,
            ]);
        }
    }
}
