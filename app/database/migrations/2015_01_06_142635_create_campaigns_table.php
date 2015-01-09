<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('campaigns', function($t)
		{
			$t->engine = 'InnoDB';


			$t->string('party_url');
			$t->string('manifesto_html_url');
			$t->string('manifesto_pdf_url');

			$t->integer('election_id')->unsigned()->index('campaigns_election_id_foreign');
			$t->integer('party_id')->unsigned()->index('campaigns_party_id_foreign');

			//created_at, updated_at DATETIME
			$t->timestamps();
			$t->primary(array('election_id', 'party_id'));
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
		Schema::drop('campaigns');
	}

}
