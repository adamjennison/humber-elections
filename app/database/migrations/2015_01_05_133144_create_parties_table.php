<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartiesTable extends Migration {


	protected $fillable = array('name');


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('parties', function($t)
		{
			$t->engine = 'InnoDB';
			//auto increment id
			$t->increments('id');

			$t->string('name');
			$t->string('colour')->nullable();

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
		Schema::drop('parties');
	}
}
