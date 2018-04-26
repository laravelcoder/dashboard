<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create5abbd3a07cb2eContactContactTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('contact_contact')) {
			Schema::create('contact_contact', function (Blueprint $table) {
				$table->integer('contact_id')->unsigned()->nullable();
				$table->foreign('contact_id', 'fk_p_135003_135003_contac_5abbd3a07ccd7')->references('id')->on('contacts')->onDelete('cascade');

			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('contact_contact');
	}
}
