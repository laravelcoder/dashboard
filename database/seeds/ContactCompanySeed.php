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
            ['id' => 2, 'name' => 'LCA Hawaii', 'logo' => '/tmp/phpjI9YjJ',],
            ['id' => 3, 'name' => 'LCA Pasadena', 'logo' => null,],
            ['id' => 4, 'name' => 'LCA San Antonio', 'logo' => null,],

        ];

        foreach ($items as $item) {
            \App\ContactCompany::create($item);
        }
    }
}
