<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1522098802BookingsTable extends Migration
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
                $table->string('requested_clinic')->nullable();
                $table->string('clinic_id')->nullable();
                $table->string('clinic_email')->nullable();
                $table->string('clinic_address')->nullable();
                $table->string('clinic_phone')->nullable();
                $table->string('clinic_text_numbers')->nullable();
                $table->string('client_firstname')->nullable();
                $table->string('submitted_user_city')->nullable();
                $table->string('submitted_user_state')->nullable();
                $table->string('searched_for')->nullable();
                
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
