<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1525291603ClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            if(Schema::hasColumn('clinics', 'clinic_email')) {
                $table->dropColumn('clinic_email');
            }
            if(Schema::hasColumn('clinics', 'clinic_phone')) {
                $table->dropColumn('clinic_phone');
            }
            if(Schema::hasColumn('clinics', 'clinic_phone_2')) {
                $table->dropColumn('clinic_phone_2');
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
                        $table->string('clinic_email');
                $table->string('clinic_phone')->nullable();
                $table->string('clinic_phone_2')->nullable();
                
        });

    }
}
