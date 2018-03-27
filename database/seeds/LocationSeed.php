<?php

use Illuminate\Database\Seeder;

class LocationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nickname' => 'Affordable Programmer', 'address' => '795 baker dr', 'address_2' => '', 'city' => 'midvale', 'state' => 'ut', 'phone' => '385-282-6160', 'phone2' => '', 'storefront' => null, 'google_map_link' => '795 E BAKER DR midvale utah 84047', 'clinic_id' => null, 'contact_person_id' => null,],
            ['id' => 2, 'nickname' => 'LCA CORPORATE', 'address' => '4850 S 154 E Myrtle Ave', 'address_2' => '#304', 'city' => 'Murray', 'state' => 'UT', 'phone' => '1-801-533-5423', 'phone2' => '', 'storefront' => null, 'google_map_link' => '4850, 154 E Myrtle Ave #304, Murray, UT 84107', 'clinic_id' => 1, 'contact_person_id' => null,],

        ];

        foreach ($items as $item) {
            \App\Location::create($item);
        }
    }
}
