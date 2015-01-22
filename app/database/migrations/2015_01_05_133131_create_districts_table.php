<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('districts', function($t)
		{
			$t->engine = 'InnoDB';
			//auto increment id
			$t->increments('id');
			$t->string('slug');
			$t->integer('seats');
			$t->integer('body_id')->unsigned()->index('districts_bodies_id_foreign');

			//created_at, updated_at DATETIME
			$t->timestamps();


			$t->string('ons_district_code');
			$t->string('ons_district_code_old');
			$t->string('name');
			$t->string('ons_la_code');
			$t->string('body_name');
			$t->string('ons_constituency_code');
			$t->string('ons_constituency_code_old');
			$t->string('ons_constituency_name');
			$t->integer('male_all_ages');
			$t->integer('m0');
			$t->integer('m1');
			$t->integer('m2');
			$t->integer('m3');
			$t->integer('m4');
			$t->integer('m5');
			$t->integer('m6');
			$t->integer('m7');
			$t->integer('m8');
			$t->integer('m9');
			$t->integer('m10');
			$t->integer('m11');
			$t->integer('m12');
			$t->integer('m13');
			$t->integer('m14');
			$t->integer('m15');
			$t->integer('m16');
			$t->integer('m17');
			$t->integer('m18');
			$t->integer('m19');
			$t->integer('m20');
			$t->integer('m21');
			$t->integer('m22');
			$t->integer('m23');
			$t->integer('m24');
			$t->integer('m25');
			$t->integer('m26');
			$t->integer('m27');
			$t->integer('m28');
			$t->integer('m29');
			$t->integer('m30');
			$t->integer('m31');
			$t->integer('m32');
			$t->integer('m33');
			$t->integer('m34');
			$t->integer('m35');
			$t->integer('m36');
			$t->integer('m37');
			$t->integer('m38');
			$t->integer('m39');		
			$t->integer('m40');
			$t->integer('m41');
			$t->integer('m42');
			$t->integer('m43');
			$t->integer('m44');
			$t->integer('m45');
			$t->integer('m46');
			$t->integer('m47');
			$t->integer('m48');
			$t->integer('m49');
			$t->integer('m50');
			$t->integer('m51');
			$t->integer('m52');
			$t->integer('m53');
			$t->integer('m54');
			$t->integer('m55');
			$t->integer('m56');
			$t->integer('m57');
			$t->integer('m58');
			$t->integer('m59');
			$t->integer('m60');
			$t->integer('m61');
			$t->integer('m62');
			$t->integer('m63');
			$t->integer('m64');
			$t->integer('m65');
			$t->integer('m66');
			$t->integer('m67');
			$t->integer('m68');
			$t->integer('m69');
			$t->integer('m70');
			$t->integer('m71');
			$t->integer('m72');
			$t->integer('m73');
			$t->integer('m74');
			$t->integer('m75');
			$t->integer('m76');
			$t->integer('m77');
			$t->integer('m78');
			$t->integer('m79');
			$t->integer('m80');
			$t->integer('m81');
			$t->integer('m82');
			$t->integer('m83');		
			$t->integer('m84');
			$t->integer('m85');
			$t->integer('m86');
			$t->integer('m87');
			$t->integer('m88');
			$t->integer('m89');
			$t->integer('m90');
			$t->integer('female_all_ages');
			$t->integer('f0');
			$t->integer('f1');
			$t->integer('f2');
			$t->integer('f3');
			$t->integer('f4');
			$t->integer('f5');
			$t->integer('f6');
			$t->integer('f7');
			$t->integer('f8');
			$t->integer('f9');
			$t->integer('f10');
			$t->integer('f11');
			$t->integer('f12');
			$t->integer('f13');
			$t->integer('f14');
			$t->integer('f15');
			$t->integer('f16');
			$t->integer('f17');
			$t->integer('f18');
			$t->integer('f19');
			$t->integer('f20');
			$t->integer('f21');
			$t->integer('f22');
			$t->integer('f23');
			$t->integer('f24');
			$t->integer('f25');
			$t->integer('f26');
			$t->integer('f27');
			$t->integer('f28');
			$t->integer('f29');
			$t->integer('f30');
			$t->integer('f31');
			$t->integer('f32');
			$t->integer('f33');
			$t->integer('f34');
			$t->integer('f35');
			$t->integer('f36');
			$t->integer('f37');
			$t->integer('f38');
			$t->integer('f39');			
			$t->integer('f40');
			$t->integer('f41');
			$t->integer('f42');
			$t->integer('f43');
			$t->integer('f44');
			$t->integer('f45');
			$t->integer('f46');
			$t->integer('f47');
			$t->integer('f48');
			$t->integer('f49');
			$t->integer('f50');
			$t->integer('f51');
			$t->integer('f52');
			$t->integer('f53');
			$t->integer('f54');
			$t->integer('f55');
			$t->integer('f56');
			$t->integer('f57');
			$t->integer('f58');
			$t->integer('f59');
			$t->integer('f60');
			$t->integer('f61');
			$t->integer('f62');
			$t->integer('f63');
			$t->integer('f64');
			$t->integer('f65');
			$t->integer('f66');
			$t->integer('f67');
			$t->integer('f68');
			$t->integer('f69');
			$t->integer('f70');
			$t->integer('f71');
			$t->integer('f72');
			$t->integer('f73');
			$t->integer('f74');
			$t->integer('f75');
			$t->integer('f76');
			$t->integer('f77');
			$t->integer('f78');
			$t->integer('f79');
			$t->integer('f80');
			$t->integer('f81');
			$t->integer('f82');
			$t->integer('f83');		
			$t->integer('f84');
			$t->integer('f85');
			$t->integer('f86');
			$t->integer('f87');
			$t->integer('f88');
			$t->integer('f89');
			$t->integer('f90');			
			


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
		Schema::drop('districts');
	}

}