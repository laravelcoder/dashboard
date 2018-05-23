<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5aed009e5b30aClinicUserTable extends Migration
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
                $table->foreign('clinic_id', 'fk_p_135004_134992_user_c_5aed009e5b3e9')->references('id')->on('clinics')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_134992_135004_clinic_5aed009e5b46d')->references('id')->on('users')->onDelete('cascade');
                
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
