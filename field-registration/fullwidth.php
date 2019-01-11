<?php

add_action( 'after_setup_theme', 'register_section_fullwidth' );
function register_section_fullwidth() {

	$key = 'group_5c2ed4ffa9285';
	$prefix = 'fullwidth_';

	do_action( $prefix . 'add_sections', $key, $prefix );

	/**
	 * Register the fullwidth section
	 */
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => $key,
			'title' => 'Block: Fullwidth',
			'fields' => array(),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/fullwidth',
					),
				),
			),
		));

	endif;

}

// Add each settings group
add_action( 'fullwidth_add_sections', 'gs_add_default_content', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_alignment', 20, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout', 30, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_color', 40, 2 );