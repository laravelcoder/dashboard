<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5ac868cfa5af85ac868cfa3aadContactContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('contact_contact');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('contact_contact')) {
            Schema::create('contact_contact', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('contact_id')->unsigned()->nullable();
            $table->foreign('contact_id', 'fk_p_135003_135003_contac_5abbd3a07a268')->references('id')->on('contacts');
                $table->integer('contact_id')->unsigned()->nullable();
            $table->foreign('contact_id', 'fk_p_135003_135003_contac_5abbd3a07a268')->references('id')->on('contacts');
                
                $table->timestamps();
                
            });
        }
    }
}
