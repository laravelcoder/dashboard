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
            
            ['id' => 1, 'metrics_id' => '101030L', 'number' => '+12109609827 ', 'location_id' => null, 'company_id' => 4,],
            ['id' => 2, 'metrics_id' => '101030L', 'number' => '+12109609947', 'location_id' => null, 'company_id' => 4,],
            ['id' => 3, 'metrics_id' => '101030L', 'number' => '+12109609977', 'location_id' => null, 'company_id' => 4,],
            ['id' => 4, 'metrics_id' => '198010L', 'number' => '+18087400055', 'location_id' => 3, 'company_id' => 2,],
            ['id' => 5, 'metrics_id' => '198010L', 'number' => '+18087400051', 'location_id' => 3, 'company_id' => 2,],
            ['id' => 6, 'metrics_id' => '198010L', 'number' => '+18087400054', 'location_id' => 3, 'company_id' => 2,],
            ['id' => 7, 'metrics_id' => '198010L', 'number' => '+18087400052', 'location_id' => 3, 'company_id' => 2,],
            ['id' => 8, 'metrics_id' => '198020L', 'number' => '+18086701008', 'location_id' => 4, 'company_id' => 2,],
            ['id' => 9, 'metrics_id' => '198020L', 'number' => '+18086701192', 'location_id' => 4, 'company_id' => 2,],
            ['id' => 10, 'metrics_id' => '198020L', 'number' => '+18086701123', 'location_id' => 4, 'company_id' => 2,],
            ['id' => 11, 'metrics_id' => '198020L', 'number' => '+18086703585', 'location_id' => 4, 'company_id' => 2,],
            ['id' => 12, 'metrics_id' => '198020L', 'number' => '+18086701181', 'location_id' => 4, 'company_id' => 2,],

        ];

        foreach ($items as $item) {
            \App\TrackingNumber::create($item);
        }
    }
}
