<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1525294695LocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            if(Schema::hasColumn('locations', 'clinic_id')) {
                $table->dropColumn('clinic_id');
            }
            
        });
Schema::table('locations', function (Blueprint $table) {
            
if (!Schema::hasColumn('locations', 'clinic_location_id')) {
                $table->integer('clinic_location_id')->nullable()->unsigned();
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
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('clinic_location_id');
            
        });
Schema::table('locations', function (Blueprint $table) {
                        $table->string('clinic_id')->nullable();
                
        });

    }
}
