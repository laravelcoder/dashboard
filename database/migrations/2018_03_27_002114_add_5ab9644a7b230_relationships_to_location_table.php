<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5ab9644a7b230RelationshipsToLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function(Blueprint $table) {
            if (!Schema::hasColumn('locations', 'clinic_id')) {
                $table->integer('clinic_id')->unsigned()->nullable();
                $table->foreign('clinic_id', '135068_5ab9644779eff')->references('id')->on('clinics')->onDelete('cascade');
                }
                if (!Schema::hasColumn('locations', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '135068_5ab964479eb2b')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function(Blueprint $table) {
            
        });
    }
}
