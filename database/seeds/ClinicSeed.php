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

            ['id' => 1, 'nickname' => 'Lice Clinics of America', 'logo' => null, 'company_id' => 1, 'notes' => null],
            ['id' => 2, 'nickname' => 'Lice Clinics Hawaii', 'logo' => null, 'company_id' => 2, 'notes' => null],
            ['id' => 4, 'nickname' => 'Lice Clinics Pasadena', 'logo' => null, 'company_id' => 3, 'notes' => null],

        ];

        foreach ($items as $item) {
            \App\Clinic::create($item);
        }
    }
}
