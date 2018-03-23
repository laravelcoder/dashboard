<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)',],
            ['id' => 3, 'title' => 'Developer',],
            ['id' => 4, 'title' => 'Larada Manager',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}