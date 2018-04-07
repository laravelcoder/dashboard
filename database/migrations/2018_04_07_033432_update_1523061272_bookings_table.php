<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1523061272BookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            
if (!Schema::hasColumn('bookings', 'submitted_user_city')) {
                $table->string('submitted_user_city')->nullable();
                }
if (!Schema::hasColumn('bookings', 'submitted_user_state')) {
                $table->string('submitted_user_state')->nullable();
                }
if (!Schema::hasColumn('bookings', 'searched_for')) {
                $table->string('searched_for')->nullable();
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
            $table->dropColumn('submitted_user_city');
            $table->dropColumn('submitted_user_state');
            $table->dropColumn('searched_for');
            
        });

    }
}
