<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 2, 'name' => 'Phillip Madsen', 'email' => 'wecodelaravel@gmail.com', 'password' => '$2y$10$ZzQreWXO4BGhzLYrJ3aT0utSoCxOTn1sCuenLU.cnGrd/FVOGKpeC', 'remember_token' => null,],
            ['id' => 3, 'name' => 'Jessica Eddowes', 'email' => 'jessica@laradasciences.com', 'password' => '$2y$10$SSkrm3Jujla3BT01dz2E5.JK5286eX3iHpeYdNaxE40i2NmyxqEzm', 'remember_token' => null,],
            ['id' => 4, 'name' => 'Rohit p Modi', 'email' => 'rohitpmodi@gmail.com', 'password' => '$2y$10$ubEkU1JOBofoDcM8QCx4zuKthEybZEt1eRcU84g1BxBTVjyETQqKu', 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
