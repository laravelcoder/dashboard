<?php

use Illuminate\Database\Seeder;

class TaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'name' => 'Troubleshoot booking api', 'description' => 'working on this now', 'status_id' => 2, 'attachment' => null, 'due_date' => '', 'user_id' => 2],

        ];

        foreach ($items as $item) {
            \App\Task::create($item);
        }
    }
}
