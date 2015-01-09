<?php

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
	return View::make('hello');
});



Route::resource('candidates','CandidatesController');

Route::get('/pollingstations', function()
{
	$pollingstations = Pollingstation::all();
	return View::make('pages.pollingstations',array(
			'pollingstations' 	=> $pollingstations,
			'page_title'		=> 'Polling Stations'			
	));	
});
