<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1523070007BookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            
if (!Schema::hasColumn('bookings', 'latitude')) {
                $table->string('latitude')->nullable();
                }
if (!Schema::hasColumn('bookings', 'longitude')) {
                $table->string('longitude')->nullable();
                }
if (!Schema::hasColumn('bookings', 'country')) {
                $table->string('country')->nullable();
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
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
            $table->dropColumn('country');
            
        });

    }
}
