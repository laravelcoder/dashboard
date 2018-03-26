<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5ab96978ece7fClinicUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clinic_user')) {
            Schema::create('clinic_user', function (Blueprint $table) {
                $table->integer('clinic_id')->unsigned()->nullable();
                $table->foreign('clinic_id', 'fk_p_135004_134992_user_c_5ab96978ecfac')->references('id')->on('clinics')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_134992_135004_clinic_5ab96978ed05c')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('clinic_user');
    }
}
