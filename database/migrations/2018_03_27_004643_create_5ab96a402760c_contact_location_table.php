<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5ab96a402760cContactLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('contact_location')) {
            Schema::create('contact_location', function (Blueprint $table) {
                $table->integer('contact_id')->unsigned()->nullable();
                $table->foreign('contact_id', 'fk_p_135003_135068_locati_5ab96a4027779')->references('id')->on('contacts')->onDelete('cascade');
                $table->integer('location_id')->unsigned()->nullable();
                $table->foreign('location_id', 'fk_p_135068_135003_contac_5ab96a4027844')->references('id')->on('locations')->onDelete('cascade');
                
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
        Schema::dropIfExists('contact_location');
    }
}
