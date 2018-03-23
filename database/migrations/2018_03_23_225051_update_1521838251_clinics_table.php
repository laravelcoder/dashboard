<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1521838251ClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            if(Schema::hasColumn('clinics', 'storefront_image')) {
                $table->dropColumn('storefront_image');
            }
            if(Schema::hasColumn('clinics', 'google_map_address_address')) {
                $table->dropColumn('google_map_address_address');
                $table->dropColumn('google_map_address_latitude');
                $table->dropColumn('google_map_address_longitude');
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
        Schema::table('clinics', function (Blueprint $table) {
                        $table->string('storefront_image')->nullable();
                $table->string('google_map_address_address')->nullable();
                $table->double('google_map_address_latitude')->nullable();
                $table->double('google_map_address_longitude')->nullable();
                
        });

    }
}
