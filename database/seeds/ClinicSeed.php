<?php

use Illuminate\Database\Seeder;

class ClinicSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nickname' => 'Lice Clinics of America', 'logo' => null, 'company_id' => 1,],
            ['id' => 2, 'nickname' => 'Lice Clinics Hawaii', 'logo' => null, 'company_id' => 2,],

        ];

        foreach ($items as $item) {
            \App\Clinic::create($item);
        }
    }
}
