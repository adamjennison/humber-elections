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

		$candidacies = $candidate->candidacies();
		
		
		return View::make('pages.candidate', array(
				'candidate'		=>	$candidate,
				'page_title' 	=> 	$candidate->forenames.' '.$candidate->surname,
				'candidacies'	=>	$candidacies
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
