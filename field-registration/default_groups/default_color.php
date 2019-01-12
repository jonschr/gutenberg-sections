<?php

/////////////////
// THE HEADING //
/////////////////

// Color & Background 
function gs_add_default_color_heading( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'XwD94xiL6y8AM6Y',
			'label' => 'Color & Background Image',
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
		),
	));
}

////////////////////////////////////
// INDIVIDUAL FIELD REGISTRATIONS //
////////////////////////////////////

// Background image
function gs_add_default_color_field_background_image( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'M3Zsa6XBo3G63Cg',
			'label' => 'Background image',
			'name' => 'background_image',
			'type' => 'image',
			'parent' => $key,
			'instructions' => 'An optional background image',
			'required' => 0,
			'conditional_logic' => 0,
			'return_format' => 'array',
			'preview_size' => 'editor-thumb-wide',
			'library' => 'all',
			'min_width' => '1400',
			'min_height' => '800',
			'mime_types' => 'jpg',
		),
	));
}

// Fixed position background
function gs_add_default_color_field_fixed_position_background( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . '3gmo8M63TPuT9Fv',
			'label' => 'Fixed position background',
			'name' => 'fixed_position_background',
			'type' => 'true_false',
			'parent' => $key,
			'instructions' => 'Make the background fixed-position',
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			// 'ui_on_text' => 'Full',
			// 'ui_off_text' => 'Normal',
			'conditional_logic' => array(
				array(
					array(
						'field' => $prefix . 'M3Zsa6XBo3G63Cg',
						'operator' => '!=empty',
					),
				),
			),
		),
	));
}

// Background color picker
function gs_add_default_color_field_background_color( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'AF49yue6j7Rut7Q',
			'label' => 'Background color',
			'name' => 'background_color',
			'type' => 'color_picker',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'default_value' => '',
		),
	));
}

// Overlay opacity
function gs_add_default_color_field_background_color_opacity( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'iAG44q2khq72Brc',
			'label' => 'Background overlay opacity',
			'name' => 'background_color_opacity',
			'type' => 'number',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			// 'conditional_logic' => array(
			// 	array(
			// 		array(
			// 			'field' => $prefix . 'M3Zsa6XBo3G63Cg',
			// 			'operator' => '!=empty',
			// 		),
			// 	),
			// ),
			'default_value' => '',
			'min' => 0,
			'max' => 100,
			'step' => 10,
			'append' => '%',
		),
	));
}

// Text color
function gs_add_default_color_field_text_color( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'UNG6K78Cr29CuWw',
			'label' => 'Text color',
			'name' => 'text_color',
			'type' => 'color_picker',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'default_value' => '',
		),
	));
}