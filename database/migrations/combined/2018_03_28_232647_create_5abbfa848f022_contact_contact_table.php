<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5abbfa848f022ContactContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('contact_contact')) {
            Schema::create('contact_contact', function (Blueprint $table) {
                $table->integer('contact_id')->unsigned()->nullable();
                $table->foreign('contact_id', 'fk_p_135003_135003_contac_5abbfa848f18b')->references('id')->on('contacts')->onDelete('cascade');
                $table->integer('contact_id')->unsigned()->nullable();
                $table->foreign('contact_id', 'fk_p_135003_135003_contac_5abbfa848f26a')->references('id')->on('contacts')->onDelete('cascade');
                
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
        Schema::dropIfExists('contact_contact');
    }
}
