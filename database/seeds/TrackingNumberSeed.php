<?php

use Illuminate\Database\Seeder;

class TrackingNumberSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'metrics_id' => '101030L', 'number' => '2109609827 ', 'location_id' => null, 'company_id' => 4,],
            ['id' => 2, 'metrics_id' => '101030L', 'number' => '2109609947', 'location_id' => null, 'company_id' => 4,],
            ['id' => 3, 'metrics_id' => '101030L', 'number' => '2109609977', 'location_id' => null, 'company_id' => 4,],
            ['id' => 4, 'metrics_id' => '198010L', 'number' => '8087400055', 'location_id' => 3, 'company_id' => 2,],
            ['id' => 5, 'metrics_id' => '198010L', 'number' => '8087400051', 'location_id' => 3, 'company_id' => 2,],
            ['id' => 6, 'metrics_id' => '198010L', 'number' => '8087400054', 'location_id' => 3, 'company_id' => 2,],
            ['id' => 7, 'metrics_id' => '198010L', 'number' => '8087400052', 'location_id' => 3, 'company_id' => 2,],
            ['id' => 8, 'metrics_id' => '198010L', 'number' => '8086701008', 'location_id' => null, 'company_id' => 2,],

        ];

        foreach ($items as $item) {
            \App\TrackingNumber::create($item);
        }
    }
}
