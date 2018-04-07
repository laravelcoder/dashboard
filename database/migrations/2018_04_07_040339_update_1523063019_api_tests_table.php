<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1523063019ApiTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('api_tests', function (Blueprint $table) {
            
if (!Schema::hasColumn('api_tests', 'searched_for')) {
                $table->string('searched_for')->nullable();
                }
if (!Schema::hasColumn('api_tests', 'email')) {
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
        Schema::table('api_tests', function (Blueprint $table) {
            $table->dropColumn('searched_for');
            $table->dropColumn('email');
            
        });

    }
}
