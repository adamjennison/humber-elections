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

Route::get('/bodies/{bodyslug}/elections/{d}', function($bodyslug,$d){
	$body						=	Body::where('slug', '=', $bodyslug)->firstOrFail();
	$election					=	Election::where('body_id','=',$body->id)->where('d','=',$d)->firstOrFail();
	$elections_for_this_body	=	Election::orderBy('d')->where('body_id','=',$body->id)->get();
	$total_seats				=	Candidacy::where('election_id','=',$election->id)->sum('seats');
	$total_votes				=	Candidacy::where('election_id','=',$election->id)->sum('votes');
	
	
	
	return View::make('pages.electionsummary',array(
			'body' 						=>	$body,
			'election'					=>	$election,
			'elections_for_this_body'	=> 	$elections_for_this_body	,
			'total_seats'				=>	$total_seats,
			'total_votes'				=> 	$total_votes,
			'page_title'				=> 	$body->name.' '.$election->kind.' '.$election->d		
	));	
});



Route::get('/pollingstations', function()
{
	$pollingstations = Pollingstation::all();
	return View::make('pages.pollingstations',array(
			'pollingstations' 	=> $pollingstations,
			'page_title'		=> 'Polling Stations'			
	));	
});

Route::get('/polling-stations', function()
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

