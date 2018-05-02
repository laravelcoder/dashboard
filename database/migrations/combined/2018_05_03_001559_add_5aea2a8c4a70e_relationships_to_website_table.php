<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aea2a8c4a70eRelationshipsToWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websites', function(Blueprint $table) {
            if (!Schema::hasColumn('websites', 'company_id')) {
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id', '135070_5ab96bdf0b47a')->references('id')->on('contact_companies')->onDelete('cascade');
                }
                if (!Schema::hasColumn('websites', 'clinic_id')) {
                $table->integer('clinic_id')->unsigned()->nullable();
                $table->foreign('clinic_id', '135070_5ab96bdf14607')->references('id')->on('clinics')->onDelete('cascade');
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
        Schema::table('websites', function(Blueprint $table) {
            if(Schema::hasColumn('websites', 'company_id')) {
                $table->dropForeign('135070_5ab96bdf0b47a');
                $table->dropIndex('135070_5ab96bdf0b47a');
                $table->dropColumn('company_id');
            }
            if(Schema::hasColumn('websites', 'clinic_id')) {
                $table->dropForeign('135070_5ab96bdf14607');
                $table->dropIndex('135070_5ab96bdf14607');
                $table->dropColumn('clinic_id');
            }
            
        });
    }
}
