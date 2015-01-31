<?php

/**
 * Candidacies model config
 */

return array(

	'title' => 'Candidacies',

	'single' => 'Candidacy',

	'model' => 'Candidacy',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
        'party' =>  array(
            'title'         =>  'Party',
            'relationship'  =>  'party',
            'select'    =>  '(:table).name',
        ),
        'election' =>  array(
            'title'         =>  'Election',
            'relationship'  =>  'election',
            'select'        =>  "CONCAT((:table).d,' ',(:table).kind)",
        ),        
		'votes',
		'position',
        'seats',
        'elected',
        'candidate_name' => array(
            'title'         => 'Candidate',
            'relationship'  => 'candidate', //this is the name of the Eloquent relationship method!
            'select'        => "CONCAT((:table).forenames,' ',(:table).surname)",
            ),
        'district_name' =>  array(
            'title'         =>  'Ward',
            'relationship'  =>  'district',
            'select'        =>  "(:table).name",
            
        ),
       'body_name' =>  array(
            'title'         =>  'Body',
            'relationship'  =>  'district.body',
            'select'        =>  "(:table).name",
            
        ),        
        
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
        'party' =>  array(
            'title'         =>  'Party',
            'type'          =>  'relationship',
            'name_field'    =>  'name',
        ),
		'votes',
        'position',
        'seats',
        'candidate' => array(
                'title' => 'Name',
                'type'  =>  'relationship',
                'name_field'    =>  'surname',
         ),
         'election' =>  array(
            'title'    =>  'Election',
            'type'     =>  'relationship',
            'name_field'    =>  "d",
        ),
        'district' =>  array(
            'title'         =>  'Ward',
            'type'          =>  'relationship',
            'name_field'    =>  "name",
            
        ),
                  
        
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'votes',
		'position',
        'seats',
        'candidate' =>  array(
            'type'  =>  'relationship',
            'title' =>  'Candidate',
            'name_field'   =>  "full_name",
            'autocomplete' => true,
            'num_options' => 10, //default is 10
            'search_fields' => array("CONCAT(forenames, ' ', surname)"),            
        ),
        'party' =>  array(
            'type'          =>  'relationship',
            'title'         =>  'Party',
            'name_field'    =>  'name',
            'autocomplete' => true,
            'num_options' => 10, //default is 10
            'search_fields' => array('name'),
        ),
        'district' =>  array(
            'title'         =>  'Ward',
            'type'          =>  'relationship',
            'name_field'    =>  "name",
            'autocomplete' => true,
            'num_options' => 10, //default is 10
            'search_fields' => array('name'),
            
        ),
        
	),

);
