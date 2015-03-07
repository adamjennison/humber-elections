<?php
Config::set('laravel-debugbar::config.enabled', true);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
        $elections  = Election::all();
		return View::make('pages.index',array(
			'elections' 	=> $elections,
			'page_title'	=> 'Humber Elections'			
	));	
});


Route::get('candidates/ynmp/{id}/name/{name}','CandidatesController@ynmp');

Route::resource('candidates','CandidatesController');

Route::get('/bodies/{bodyslug}/elections/{d}','BodiesController@electionForBody' );

Route::get('/pollingstations', 'PollingstationsController@index');

Route::get('/polling-stations', 'PollingstationsController@index'); //easier to read URL

Route::get('/bodies', 'BodiesController@index');

Route::get('/bodies/{bodyslug}','BodyController@show');

Route::get('/body/{bodyslug}','BodyController@show');

Route::get('/parties', 'PartiesController@index');

Route::get('/party/{partyslug}', 'PartyController@show');

Route::get('/bodies/{body_slug}/{districts_name}/{district_slug}', 'DistrictController@show');

Route::get('/bodies/{body_slug}/elections/{d}/{districts_name}/{district}', 'DistrictController@resultsForDistrict');
Route::get('/about',function(){
	return View::make('pages.about',array(
		'page_title' => 'About this website',
			));
});

