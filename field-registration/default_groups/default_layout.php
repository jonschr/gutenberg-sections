<?php

function gs_add_default_layout( $key, $prefix ) {

	// Layouts
	acf_add_local_field( array(
		array(
			'key' => $prefix . '8MXL4p7cM6T3PRF',
			'label' => 'Layout',
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
		// array(
		// 	'key' => $prefix . 'BJxE6333akWx2ho',
		// 	'label' => '',
		// 	'name' => 'use_layout_defaults',
		// 	'type' => 'true_false',
		// 	'parent' => $key,
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'message' => '',
		// 	'default_value' => 1,
		// 	'ui' => 1,
		// 	'ui_on_text' => 'Use defaults',
		// 	'ui_off_text' => 'Set manually',
		// ),
		array(
			'key' => $prefix . 'field_5c2f0c882bec1',
			'label' => 'Maximum content width',
			'name' => 'content_width',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'The maximum width in pixels of the inner content',
			// 'conditional_logic' => array(
			// 	array(
			// 		array(
			// 			'field' => $prefix . 'BJxE6333akWx2ho',
			// 			'operator' => '!=',
			// 			'value' => '1',
			// 		),
			// 	),
			// ),
			'wrapper' => array(
				'width' => '33.333333',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'min' => 200,
			'max' => 1800,
			'step' => 10,
			'prepend' => '',
			'append' => 'px',
		),
		array(
			'key' => $prefix . '22ZC8X8CGyXJoe6',
			'label' => 'Padding top',
			'name' => 'padding_top',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'Override the top padding (desktop only)',
			'required' => 0,
			// 'conditional_logic' => array(
			// 	array(
			// 		array(
			// 			'field' => $prefix . 'BJxE6333akWx2ho',
			// 			'operator' => '!=',
			// 			'value' => '1',
			// 		),
			// 	),
			// ),
			'wrapper' => array(
				'width' => '33.333333',
				'class' => '',
				'id' => '',
			),
			'default_value' => null,
			'min' => '',
			'max' => 300,
			'step' => 10,
			'prepend' => '',
			'append' => 'px',
		),
		array(
			'key' => $prefix . '9qnRt992RqvYvt3',
			'label' => 'Padding bottom',
			'name' => 'padding_bottom',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'Override the bottom padding (desktop only)',
			'required' => 0,
			// 'conditional_logic' => array(
			// 	array(
			// 		array(
			// 			'field' => $prefix . 'BJxE6333akWx2ho',
			// 			'operator' => '!=',
			// 			'value' => '1',
			// 		),
			// 	),
			// ),
			'wrapper' => array(
				'width' => '33.333333',
				'class' => '',
				'id' => '',
			),
			'default_value' => null,
			'min' => '',
			'max' => 300,
			'step' => 10,
			'prepend' => '',
			'append' => 'px',
		),
	));

}