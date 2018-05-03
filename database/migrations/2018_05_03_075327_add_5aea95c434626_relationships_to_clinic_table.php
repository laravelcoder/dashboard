<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aea95c434626RelationshipsToClinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function(Blueprint $table) {
            if (!Schema::hasColumn('clinics', 'company_id')) {
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id', '135004_5ab9637967c9a')->references('id')->on('contact_companies')->onDelete('cascade');
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
        Schema::table('clinics', function(Blueprint $table) {
            if(Schema::hasColumn('clinics', 'company_id')) {
                $table->dropForeign('135004_5ab9637967c9a');
                $table->dropIndex('135004_5ab9637967c9a');
                $table->dropColumn('company_id');
            }
            
        });
    }
}
