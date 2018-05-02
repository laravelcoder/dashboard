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

        ];

        foreach ($items as $item) {
            \App\ContactCompany::create($item);
        }
    }
}
