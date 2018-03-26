<?php

use Illuminate\Database\Seeder;

class ContactCompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Larada Sciences', 'logo' => null,],

        ];

        foreach ($items as $item) {
            \App\ContactCompany::create($item);
        }
    }
}
