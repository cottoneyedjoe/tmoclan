<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wars', function(Blueprint $table) {
			$table->increments('id');
			$table->string('clan');
			$table->string('map');
			$table->string('map2');
			$table->integer('tmoR1');
			$table->integer('tmoR2');
			$table->integer('tmoR3');
			$table->integer('tmoR4');
			$table->integer('oppR1');
			$table->integer('oppR2');
			$table->integer('oppR3');
			$table->integer('oppR4');
			$table->text('screenshot');
			$table->text('screenshot2');
			$table->text('comment');
			$table->integer('author');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wars');
	}

}
