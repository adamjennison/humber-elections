<?php

/**
 * Candidacies model config
 */

return array(

	'title' => 'Districts',

	'single' => 'District',

	'model' => 'District',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
        'slug',
        'name',
        'seats',    
              
        'polls' => array(
                'title' => '# Polls',
                'relationship' => 'polls', //this is the name of the Eloquent relationship method!
                'select' => "COUNT((:table).id)",
            ),

       'body_name' =>  array(
            'title'         =>  'Body',
            'relationship'  =>  'body',
            'select'        =>  "(:table).name",
            
        ),        
        
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
        'slug',
        'name',
        'body' =>  array(
            'title'         =>  'Body',
            'type'          =>  'relationship',
            'name_field'    =>  "name",
            
        ),
                  
        
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'slug',
		'name',
        'seats',

        'body' =>  array(
            'title'         =>  'Ward',
            'type'          =>  'relationship',
            'name_field'    =>  "name",
            'autocomplete' => true,
            'num_options' => 10, //default is 10
            'search_fields' => array('name'),
            
        ),
        
	),

);
