<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5ac8121a7331bRelationshipsToApiTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('api_tests', function(Blueprint $table) {
            if (!Schema::hasColumn('api_tests', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '141228_5ac80214ebfea')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('api_tests', function(Blueprint $table) {
            if(Schema::hasColumn('api_tests', 'created_by_id')) {
                $table->dropForeign('141228_5ac80214ebfea');
                $table->dropIndex('141228_5ac80214ebfea');
                $table->dropColumn('created_by_id');
            }
            
        });
    }
}
