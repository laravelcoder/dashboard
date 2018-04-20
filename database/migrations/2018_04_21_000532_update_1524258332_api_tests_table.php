<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1524258332ApiTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('api_tests', function (Blueprint $table) {
            if(Schema::hasColumn('api_tests', 'latitide')) {
                $table->dropColumn('latitide');
            }
            if(Schema::hasColumn('api_tests', 'longetude')) {
                $table->dropColumn('longetude');
            }
            
        });
Schema::table('api_tests', function (Blueprint $table) {
            
if (!Schema::hasColumn('api_tests', 'latitude')) {
                $table->string('latitude')->nullable();
                }
if (!Schema::hasColumn('api_tests', 'longitude')) {
                $table->string('longitude')->nullable();
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
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
            
        });
Schema::table('api_tests', function (Blueprint $table) {
                        $table->string('latitide')->nullable();
                $table->string('longetude')->nullable();
                
        });

    }
}
