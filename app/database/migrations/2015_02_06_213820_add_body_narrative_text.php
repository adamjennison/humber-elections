<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBodyNarrativeText extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bodies', function($t)
		{
            $t->text('narrative');
            $t->text('url');
            $t->text('contact_email');
            $t->text('contact_phone');
            
            
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bodies', function($t)
        {
            $t->dropColumn('narrative');
            $t->dropColumn('url');
            $t->dropColumn('contact_email');
            $t->dropColumn('contact_phone');
            
        });
	}

}
