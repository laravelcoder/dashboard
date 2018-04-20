<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1524254313ApiTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('api_tests', function (Blueprint $table) {
            
if (!Schema::hasColumn('api_tests', 'submitted')) {
                $table->date('submitted')->nullable();
                }
if (!Schema::hasColumn('api_tests', 'latitide')) {
                $table->string('latitide')->nullable();
                }
if (!Schema::hasColumn('api_tests', 'longetude')) {
                $table->string('longetude')->nullable();
                }
if (!Schema::hasColumn('api_tests', 'country')) {
                $table->string('country')->nullable();
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
            $table->dropColumn('submitted');
            $table->dropColumn('latitide');
            $table->dropColumn('longetude');
            $table->dropColumn('country');
            
        });

    }
}
