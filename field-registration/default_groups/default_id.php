<?php

function gs_add_default_section_id_heading( $key, $prefix ) {

	// Accordion
	acf_add_local_field(array(
		'key' => $prefix . '7mDv6Jm3t9Zi2xNcq1',
		'label' => 'Section ID',
		'name' => '',
		'type' => 'accordion',
		'parent' => $key,
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'open' => 0,
		'multi_expand' => 0,
		'endpoint' => 0,
	));

}

function gs_add_default_section_id( $key, $prefix ) {

    // Section ID
	acf_add_local_field(array(
		'key' => $prefix . '7mDv6Jm3t9Zi2xNcq2',
		'label' => '',
		'name' => 'section_id',
		'type' => 'text',
		'parent' => $key,
		'instructions' => 'This isn\'t technically the section ID, as those are generated randomly by Gutenberg. However, if you enter a unique ID here, the section will automatically add markup with this ID at the top, allowing anchor links to scroll here.' ,
	));

}