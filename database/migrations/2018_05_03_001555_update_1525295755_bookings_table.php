<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1525295755BookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            if(Schema::hasColumn('bookings', 'customername')) {
                $table->dropColumn('customername');
            }
            if(Schema::hasColumn('bookings', 'email')) {
                $table->dropColumn('email');
            }
            
        });
Schema::table('bookings', function (Blueprint $table) {
            
if (!Schema::hasColumn('bookings', 'customername')) {
                $table->string('customername')->nullable();
                }
if (!Schema::hasColumn('bookings', 'email')) {
                $table->string('email')->nullable();
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
            $table->dropColumn('customername');
            $table->dropColumn('email');
            
        });
Schema::table('bookings', function (Blueprint $table) {
                        $table->string('customername');
                $table->string('email');
                
        });

    }
}
