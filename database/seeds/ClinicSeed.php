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
            
            ['id' => 1, 'nickname' => 'Lice Clinics of America', 'clinic_email' => 'contact@liceclinicsofamerica.com', 'clinic_phone' => null, 'clinic_phone_2' => null, 'logo' => null, 'company_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\Clinic::create($item);
        }
    }
}
