<?php

use Illuminate\Database\Seeder;

class ZipcodeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'zipcode' => '96753', 'clinic_id' => 2, 'location_id' => 3],
            ['id' => 2, 'zipcode' => '96814', 'clinic_id' => 2, 'location_id' => 4],
            ['id' => 3, 'zipcode' => '84047', 'clinic_id' => null, 'location_id' => 2],
            ['id' => 4, 'zipcode' => '84088', 'clinic_id' => null, 'location_id' => 2],
            ['id' => 5, 'zipcode' => '84121', 'clinic_id' => null, 'location_id' => 2],

        ];

        foreach ($items as $item) {
            \App\Zipcode::create($item);
        }
    }
}
