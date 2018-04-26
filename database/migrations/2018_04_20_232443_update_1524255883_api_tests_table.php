<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1524255883ApiTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('api_tests', function (Blueprint $table) {
            if(Schema::hasColumn('api_tests', 'submitted')) {
                $table->dropColumn('submitted');
            }
            
        });
Schema::table('api_tests', function (Blueprint $table) {
            
if (!Schema::hasColumn('api_tests', 'submitted')) {
                $table->string('submitted')->nullable();
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
            
        });
Schema::table('api_tests', function (Blueprint $table) {
                        $table->date('submitted')->nullable();
                
        });

    }
}
