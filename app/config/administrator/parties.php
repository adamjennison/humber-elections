<?php

/**
 * Parties model config
 */

return array(

	'title' => 'Parties',

	'single' => 'party',

	'model' => 'Party',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name',
		'colour' => array(
            'title' => 'Color',
            'output' => '<div style="background-color: (:value); width: 20px; height: 20px; border-radius: 2px;"></div>',
        ),
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
		'name',
		'colour',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name',
		'colour' => array(
            'type' => 'color',
            'title' => 'Colour',
            )
	),

);
