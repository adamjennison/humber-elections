<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('candidates', function($t)
		{
			$t->engine = 'InnoDB';
			//auto increment id
			$t->increments('id');

			$t->string('forenames');
			$t->string('surname')->index('surname_index');
			$t->string('gender')->nullable();


			//created_at, updated_at DATETIME
			$t->timestamps();

		});		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('candidates');
	}

}
