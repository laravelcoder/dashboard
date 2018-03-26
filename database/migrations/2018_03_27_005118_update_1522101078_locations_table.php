<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1522101078LocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            if(Schema::hasColumn('locations', 'user_id')) {
                $table->dropForeign('135068_5ab964479eb2b');
                $table->dropIndex('135068_5ab964479eb2b');
                $table->dropColumn('user_id');
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
        Schema::table('locations', function (Blueprint $table) {
                        
        });

    }
}
