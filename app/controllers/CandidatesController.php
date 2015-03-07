<?php

class CandidatesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$candidates = Candidate::orderBy('surname','ASC')->get();
		$alphas = range('A', 'Z');
		return View::make('pages.candidates', array('candidates' => $candidates, 'page_title' => 'Candidates', 'alphas' => $alphas));
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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$candidate = Candidate::find($id);
        
        $json   =   null;
        
        $constituency = null;
        
		$candidacies = $candidate->getAllDetails();
		if($candidate->ynmp_id>0){    
            $json = json_decode(file_get_contents('http://yournextmp.popit.mysociety.org/api/v0.1/search/persons?q=id:'.$candidate->ynmp_id), true);
        }else{
                // do nothing..
        }
		
        if(!is_null($json)){
            // we have an MP so lets see if they are standing and if so grab the constituency data
            if(array_key_exists('2015',$json['result'][0]['standing_in'])){
                // they are standing in 2015 - now we can grab the data for the constituency
                
                $constituency = json_decode(file_get_contents('http://yournextmp.popit.mysociety.org/api/v0.1/posts/'.$json['result'][0]['standing_in']['2015']['post_id'].'?embed=membership.person'), true);
                
                
            }
        }
        
		//dd('http://yournextmp.popit.mysociety.org/api/v0.1/search/persons?q=name:%22'.$candidate->fullName.'%22');
        //dd($json);
        
        	//$candidate->gender 		=	$json['gender'];
		return View::make('pages.candidate', array(
				'candidate'		=>	$candidate,
				'page_title' 	=> 	$candidate->forenames.' '.$candidate->surname,
				'candidacies'	=>	$candidacies,
                'yournextmp'    =>  $json,
                'constituency'  =>  $constituency
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

    public function ynmp($id, $name)
    {
        
        $candidate 		=   Candidate::where('ynmp_id', '=', $id)->first();
        if(is_null($candidate)){
            //we couldn't find by a ynmp_id so lets try the name instead
            $split_name=explode(' ',$name);
            $candidate 		=   Candidate::where('surname', '=', end($split_name))->where('forenames','=',reset($split_name))->first();
            	//we couldn't find one candidate so lets see if we present the some like it..
            if(is_null($candidate)){
            	$candidates 		=   Candidate::where('surname', '=', end($split_name))->get();
            	if(!is_null($candidates)){
            		//return $this->showList($candidates);
            		return View::make('pages.candidateslist', array(
									'candidates'		=>	$candidates,
									'page_title' 	=>  'Choose the closest candidate',
									));
            	}else{
            		// no candidates - 404 
            	}
            }
        }
        
        return $this->show($candidate->id);
    }



}
