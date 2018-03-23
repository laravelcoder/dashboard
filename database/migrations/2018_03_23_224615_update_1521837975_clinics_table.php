<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1521837975ClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            
if (!Schema::hasColumn('clinics', 'clinic_email')) {
                $table->string('clinic_email');
                }
if (!Schema::hasColumn('clinics', 'clinic_phone')) {
                $table->string('clinic_phone')->nullable();
                }
if (!Schema::hasColumn('clinics', 'clinic_phone_2')) {
                $table->string('clinic_phone_2')->nullable();
                }
if (!Schema::hasColumn('clinics', 'logo')) {
                $table->string('logo')->nullable();
                }
if (!Schema::hasColumn('clinics', 'storefront_image')) {
                $table->string('storefront_image')->nullable();
                }
if (!Schema::hasColumn('clinics', 'google_map_address_address')) {
                $table->string('google_map_address_address')->nullable();
                $table->double('google_map_address_latitude')->nullable();
                $table->double('google_map_address_longitude')->nullable();
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
            $table->dropColumn('clinic_email');
            $table->dropColumn('clinic_phone');
            $table->dropColumn('clinic_phone_2');
            $table->dropColumn('logo');
            $table->dropColumn('storefront_image');
            $table->dropColumn('google_map_address_address');
            $table->dropColumn('google_map_address_latitude');
            $table->dropColumn('google_map_address_longitude');
            
        });

    }
}
