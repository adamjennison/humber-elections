<?php


class Candidate extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'candidates';



	/**
	 * Select all details for the candidate
	 *
	 * @return Response
	 */
	public function getAllDetails(){


		$results= DB::select(
			 'SELECT
		        e.d,
		        c.*,
		        p.name AS party_name,
		        p.colour AS party_colour,
		        b.name AS body_name,
		        b.slug AS body_slug,
		        b.districts_name AS districts_name,
		        d.name AS district_name,
		        d.slug AS district_slug
		      
		      FROM candidacies c
		      
		      INNER JOIN elections e
		      ON c.election_id = e.id
		      
		      INNER JOIN parties p
		      ON c.party_id = p.id
		      
		      INNER JOIN bodies b
		      ON e.body_id = b.id
		      
		      INNER JOIN districts d
		      ON c.district_id = d.id
		      
		      WHERE c.candidate_id = ?
		      
		      ORDER BY d DESC
		    ', array($this->id)
		);

		return $results;

	}
    
    public function candidacies(){
            return $this->hasMany('Candidacy');
    }
    
    public function getFullNameAttribute(){
        
        
        return  $this->forenames.' '.$this->surname;
        
        
    }
    
    public function getFormatedNameAttribute(){
            return $this->surname.', '.$this->forenames;
    }

    public function short_name(){

    	$first_name = explode(' ', $this->forenames);
    	return $first_name[0].' '.$this->surname;
    }
}
