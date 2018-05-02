<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5aea2a8ce13ecTaskTaskTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('task_task_tag')) {
            Schema::create('task_task_tag', function (Blueprint $table) {
                $table->integer('task_id')->unsigned()->nullable();
                $table->foreign('task_id', 'fk_p_136426_136425_taskta_5aea2a8ce1504')->references('id')->on('tasks')->onDelete('cascade');
                $table->integer('task_tag_id')->unsigned()->nullable();
                $table->foreign('task_tag_id', 'fk_p_136425_136426_task_t_5aea2a8ce15a7')->references('id')->on('task_tags')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_task_tag');
    }
}
