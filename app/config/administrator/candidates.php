<?php

/**
 * Candidates model config
 */

return array(

	'title' => 'Candidates',

	'single' => 'candidate',

	'model' => 'Candidate',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'forenames',
		'surname',
        'gender',
        'candidacies' => array(
                'title' => '# Candidacies',
                'relationship' => 'candidacies', //this is the name of the Eloquent relationship method!
                'select' => "COUNT((:table).id)",
            ),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'forenames',
        'surname',
        'gender',
        
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'forenames',
		'surname',
        'gender',

        
	),
    

);
