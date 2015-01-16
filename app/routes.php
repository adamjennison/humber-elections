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
	$candidacies				=	$election->candidacies;
	
	# There's got to be a better way to do this, either with SQL or Datamapper
  

  $total_districts = DB::table('candidacies')->where('election_id','=',$election->id)->groupBy('district_id')->orderBy('district_id')->count();

  $results_by_party = DB::select("
    SELECT
      p.colour,
      p.name,
      SUM(c.votes) AS votez,
      SUM(c.seats) AS seatz,
      COUNT(*) AS cands
    FROM candidacies c
    LEFT JOIN parties p ON p.id = c.party_id
    WHERE c.election_id = ?
    GROUP BY c.party_id, p.colour, p.name
    ORDER BY seatz DESC, votez DESC
  ", array($election->id));

  $results_by_district = DB::select("
    SELECT
      d.name,
      d.slug AS district_slug,
      SUM(c.seats) AS seats,
      SUM(c.votes) AS votez,
      COUNT(c.id) AS num_candidates
      
    FROM districts d, candidacies c
    WHERE
      c.district_id = d.id
      AND c.election_id = ?
    GROUP BY c.district_id, d.name, d.slug
    ORDER BY d.name
  ", array($election->id));
  
  # For elections that haven't yet been held
  $districts_in_this_election = DB::select("
    SELECT DISTINCT d.name, d.slug
    FROM candidacies c
    LEFT JOIN districts d
    ON c.district_id = d.id
    WHERE c.election_id = ?
    ORDER BY d.name
  ", array($election->id));

	$electionHeld = DB::table('candidacies')->where('election_id','=',$election->id)->sum('votes');


	return View::make('pages.electionsummary',array(
			'body' 						=>	$body,
			'election'					=>	$election,
			'elections_for_this_body'	=> 	$elections_for_this_body	,
			'total_seats'				=>	$total_seats,
			'total_votes'				=> 	$total_votes,
			'electionHeld'				=>	$electionHeld,
			'districts_in_this_election'=>	$districts_in_this_election,
			'results_by_district'		=>	$results_by_district,
			'results_by_party'			=>	$results_by_party,
			'total_districts'			=>	$total_districts,
			'candidacies'				=>	$candidacies,
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

