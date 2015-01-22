<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('polls', function($t)
		{
			$t->engine = 'InnoDB';
			//auto increment id
			$t->increments('id');

			$t->integer('electorate');
			$t->integer('ballot_papers_issued');
			$t->integer('ballot_papers_rejected');
			$t->integer('seats');

			$t->integer('election_id')->unsigned()->index('polls_elections_id_foreign');
			$t->integer('district_id')->unsigned()->index('polls_districts_id_foreign');

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
		Schema::drop('polls');
	}

}
