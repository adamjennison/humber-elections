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

Route::get('/bodies', function()
{
	$bodies = Body::all();
	return View::make('pages.bodies',array(
			'bodies' 	=> $bodies,
			'page_title'		=> 'Government Bodies'			
	));	
});

Route::get('/bodies/{bodyslug}', function($bodyslug)
{
		$body 		= Body::where('slug', '=', $bodyslug)->firstOrFail();
		$elections	= $body->elections;
		$districts	= $body->districts;
		
		
	return View::make('pages.body',array(
		'body' => $body,
		'elections' => $elections,
		'districts' => $districts,
		'page_title'=> $body->name
	
	));

});

