<?php

function gs_add_default_alignment_heading( $key, $prefix ) {
	// Alignment fields
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'bQZpKQ8ond94E27',
			'label' => 'Alignment',
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

function gs_add_default_alignment( $key, $prefix ) {

	// Alignment fields
	acf_add_local_field( array(
		array(
			'key' => $prefix . '68Cx8T6g3wGLVda',
			'label' => 'Smart center align',
			'name' => 'smart_center_align',
			'type' => 'true_false',
			'parent' => $key,
			'instructions' => 'Center align on desktop, left align on mobile (can be overridden with the editor alignment controls). This can be overriden by using the alignment controls inside the content area.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	));

}

function gs_add_container_alignment( $key, $prefix ) {

	// Alignment fields
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'UT8Xh8KFU6i73nT',
			'label' => 'Float content',
			'name' => 'float_content',
			'type' => 'radio',
			'parent' => $key,
			'instructions' => 'Push the text to the left or right side of the content area.',
			'required' => 0,
			'conditional_logic' => 0,
			'choices' => array (
				'default-content-container-alignment' => 'Centered',
				'left-content-container-alignment' => 'Left',
				'right-content-container-alignment' => 'Right',
				'right-content-container-alignment' => 'Right',
				'fullwidth-content-container-alignment' => 'No horizontal padding<small>Overrides horizontal width settings and affects all sizes</small>',
				'no-padding' => 'Remove all padding from this section<small>Overrides all other padding settings on all sizes</small>',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	));

}