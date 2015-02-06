<?php

class DistrictController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  string  $body_slug
     * @param  string  $districts_name
     * @param  string  $district_slug
	 * @return Response
	 */
	public function show($body_slug,$districts_name,$district_slug)
	{
		
        $district 	  =	District::where('slug','=',$district_slug)->firstOrFail();
        $body		      =	Body::where('slug','=',$body_slug)->firstOrFail();
        $elections    = $district->body->elections;

        $page_title   = $district->name.' '. $district->body->district_name.' '.$district->body->name;
      
        return View::make('pages.district',array(
            'district'	=>	$district,
            'body'		=>	$body,
            'page_title'	=>	$page_title,
        'elections' =>  $elections
        ));


	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


    public function resultsForDistrict($body_slug,$d,$districts_name,$district)
    {
    
        $district 	                =	District::where('slug','=',$district)->firstOrFail();
        $body		                =	Body::where('slug','=',$body_slug)->firstOrFail();
        $election                   =   Election::where('body_id','=',$body->id)->where('d','=',$d)->firstOrFail();
        $candidacies                =   Candidacy::where('district_id','=',$district->id)->where('election_id','=',$election->id)->orderBy('votes','DESC')->get();
        $total_votes                =   Candidacy::where('district_id','=',$district->id)->where('election_id','=',$election->id)->sum('votes');
        $total_candidates           =   Candidacy::where('district_id','=',$district->id)->where('election_id','=',$election->id)->count();
        $total_seats                =   Candidacy::where('district_id','=',$district->id)->where('election_id','=',$election->id)->sum('seats');
        $districts_in_this_election =   $election->districts();
        $election_held 				= 	(int) DB::table('candidacies')->where('district_id','=',$district->id)->where('election_id','=',$election->id)->sum('votes');
        //echo count($districts_in_this_election);
        //var_dump($election_held);
        $poll                       =   Poll::where('district_id','=',$district->id)->where('election_id','=',$election->id)->first();
       
       // echo 'district id='.$district->id.'<br/>';
        //echo 'election id='.$election->id.'<br/>';
        //dd($poll);

        $results_by_party = DB::select("
            SELECT 
              p.name AS party_name,
              p.colour AS party_colour,
              COUNT(c.id) AS num_candidates,
              SUM(c.seats) AS num_seats,
              SUM(c.votes) AS total_votes
            FROM candidacies c
            
            LEFT JOIN parties p
            ON c.party_id = p.id
            
            WHERE c.district_id = ?
            AND c.election_id = ?
            
            GROUP BY p.name, p.colour
            
            ORDER BY total_votes DESC
          ",  array( $district->id, $election->id));
      
        $page_title =   $district->name.' '.$body->district_name.' results, '.$body->name.' election '.$election->d;
      
         return View::make('pages.resultsdistrict', array(
            'district'	                    =>	$district,
            'body'		                    =>	$body,
            'page_title'	                =>	$page_title,
            'election'                      =>  $election,         
            'candidacies'                   =>  $candidacies,     
            'total_votes'                   =>  $total_votes,      
            'total_candidates'              =>  $total_candidates,     
            'total_seats'                   =>  $total_seats,
            'districts_in_this_election'    =>  $districts_in_this_election,
            'poll'                          =>  $poll,
            'results_by_party'              =>  $results_by_party,
            'election_held'					=>	$election_held
            
         ));
          
    }

}
