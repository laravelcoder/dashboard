<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1521829798ClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clinics')) {
            Schema::create('clinics', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nickname');
                $table->string('clinic_email');
                $table->string('clinic_phone')->nullable();
                $table->string('clinic_phone_2')->nullable();
                $table->string('logo')->nullable();
                
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
        Schema::dropIfExists('clinics');
    }
}
