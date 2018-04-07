<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5ac83439a9e35RoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('role_user')) {
            Schema::create('role_user', function (Blueprint $table) {
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', 'fk_p_134991_134992_user_r_5ac83439a9fa3')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_134992_134991_role_u_5ac83439aa073')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('role_user');
    }
}
