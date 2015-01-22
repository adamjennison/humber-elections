<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidaciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('candidacies', function($t)
		{
			$t->engine = 'InnoDB';
			//auto increment id
			$t->increments('id');

			$t->string('address');
			$t->string('postcode');
			$t->integer('votes');
			$t->integer('position');
			$t->integer('seats');
			$t->boolean('elected');
			//$t->boolean('labcoop')->default(false); // 

			$t->integer('election_id')->unsigned()->index('candidacies_election_id_foreign');
			$t->integer('candidate_id')->unsigned()->index('candidacies_candidate_id_foreign');
			$t->integer('party_id')->unsigned()->index('candidacies_party_id_foreign');
			$t->integer('district_id')->unsigned()->index('candidacies_district_id_foreign');

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
		Schema::drop('candidacies');
	}

}
