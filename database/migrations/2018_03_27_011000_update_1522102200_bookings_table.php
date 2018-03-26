<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1522102200BookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            
if (!Schema::hasColumn('bookings', 'requested_clinic')) {
                $table->string('requested_clinic')->nullable();
                }
if (!Schema::hasColumn('bookings', 'clinic_id')) {
                $table->string('clinic_id')->nullable();
                }
if (!Schema::hasColumn('bookings', 'clinic_email')) {
                $table->string('clinic_email')->nullable();
                }
if (!Schema::hasColumn('bookings', 'clinic_address')) {
                $table->string('clinic_address')->nullable();
                }
if (!Schema::hasColumn('bookings', 'clinic_phone')) {
                $table->string('clinic_phone')->nullable();
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
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('requested_clinic');
            $table->dropColumn('clinic_id');
            $table->dropColumn('clinic_email');
            $table->dropColumn('clinic_address');
            $table->dropColumn('clinic_phone');
            
        });

    }
}
