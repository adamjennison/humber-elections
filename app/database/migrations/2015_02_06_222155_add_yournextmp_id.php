<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYournextmpId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('candidates', function($t)
		{
            $t->text('ynmp_id');     
            $t->text('twitter_username');      
            $t->text('facebook_url');
            $t->text('previous_identity');

            
            
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('candidates', function($t)
		{
            $t->dropColumn('ynmp_id'); 
            $t->dropColumn('twitter_username');      
            $t->dropColumn('facebook_url');
            $t->dropColumn('previous_identity');
        });
	}

}
