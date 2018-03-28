<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5abbfcc7dbde5RelationshipsToLocationTable extends Migration
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
            if(Schema::hasColumn('locations', 'clinic_id')) {
                $table->dropForeign('135068_5ab9644779eff');
                $table->dropIndex('135068_5ab9644779eff');
                $table->dropColumn('clinic_id');
            }
            if(Schema::hasColumn('locations', 'contact_person_id')) {
                $table->dropForeign('135068_5ab96b5952da6');
                $table->dropIndex('135068_5ab96b5952da6');
                $table->dropColumn('contact_person_id');
            }
            
        });
    }
}
