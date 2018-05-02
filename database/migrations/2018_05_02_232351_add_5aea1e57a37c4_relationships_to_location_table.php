<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aea1e57a37c4RelationshipsToLocationTable extends Migration
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
                if (!Schema::hasColumn('locations', 'contact_person_id')) {
                $table->integer('contact_person_id')->unsigned()->nullable();
                $table->foreign('contact_person_id', '135068_5ab96b5952da6')->references('id')->on('contacts')->onDelete('cascade');
                }
                if (!Schema::hasColumn('locations', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '135068_5aea1ce1f190b')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('locations', 'parent_website_id')) {
                $table->integer('parent_website_id')->unsigned()->nullable();
                $table->foreign('parent_website_id', '135068_5aea1e5427ee3')->references('id')->on('websites')->onDelete('cascade');
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
