<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5ab96b59374575ab96b5934edfContactLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('contact_location');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('contact_location')) {
            Schema::create('contact_location', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('contact_id')->unsigned()->nullable();
            $table->foreign('contact_id', 'fk_p_135003_135068_locati_5ab96a402453f')->references('id')->on('contacts');
                $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id', 'fk_p_135068_135003_contac_5ab96a4025b28')->references('id')->on('locations');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
