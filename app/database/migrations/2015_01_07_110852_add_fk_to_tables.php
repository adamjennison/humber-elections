<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Polls FKs
/*
		Schema::table('districts', function($t)
	    {
	        $t->foreign('body_id')
	                ->references('id')
	                ->on('bodies');
	    });


		Schema::table('polls', function($t)
	    {
	        $t->foreign('district_id')
	                ->references('id')
	                ->on('districts');

	        $t->foreign('election_id')
	                ->references('id')
	                ->on('elections');
	    });

		Schema::table('postcodes', function($t)
	    {
	        $t->foreign('pollingstation_id')
	                ->references('id')
	                ->on('pollingstations');

	        $t->foreign('district_id')
	                ->references('id')
	                ->on('districts');
	    });


		Schema::table('candidacies', function($t)
	    {
	        $t->foreign('election_id')
	                ->references('id')
	                ->on('elections')
	                ->onDelete('cascade');

	        $t->foreign('district_id')
	                ->references('id')
	                ->on('districts');

	        $t->foreign('party_id')
	                ->references('id')
	                ->on('parties');

	        $t->foreign('candidate_id')
	                ->references('id')
	                ->on('candidates');	                
	    });


		Schema::table('campaigns', function($t)
	    {
	        $t->foreign('party_id')
	                ->references('id')
	                ->on('parties');

	        $t->foreign('election_id')
	                ->references('id')
	                ->on('elections');
	    });

		Schema::table('elections', function($t)
	    {
	        $t->foreign('body_id')
	                ->references('id')
	                ->on('bodies');
	    });


*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{


	}		
	

}
