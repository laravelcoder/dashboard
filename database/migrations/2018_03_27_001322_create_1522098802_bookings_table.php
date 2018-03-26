<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1522098802BookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->increments('id');
                $table->date('submitted')->nullable();
                $table->string('customername');
                $table->string('email');
                $table->string('phone')->nullable();
                $table->string('family_number')->nullable();
                $table->string('how_long')->nullable();
                $table->date('requested_date')->nullable();
                $table->time('requested_time')->nullable();
                $table->string('clinic_text_numbers')->nullable();
                $table->string('client_firstname')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
