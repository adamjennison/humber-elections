<?php

class PartyController extends \BaseController {

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
	 * @param  int  $partyslug
	 * @return Response
	 */
	public function show($partyslug)
	{
		
        $party 		=   Party::where('name', '=', $partyslug)->firstOrFail();
        //$elections  =   $party->
        //$candidacies = $party->candidacies->paginate(30);
        $candidacies = Candidacy::where('party_id','=',$party->id)->orderBy('position','ASC')->orderBy('district_id')->paginate(30);
        

        return View::make('pages.party',array(
                'party' 	=> $party,
                'page_title'		=> 'Party details'	,
                'candidacies'   =>  $candidacies		
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


}
