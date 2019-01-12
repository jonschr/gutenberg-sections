<?php

function gs_add_default_layout_heading( $key, $prefix ) {

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
	));

}

function gs_add_default_layout_fullheight( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'p3X3TnygcGVy864',
			'label' => 'Full height section',
			'name' => 'fullheight',
			'type' => 'true_false',
			'parent' => $key,
			'instructions' => 'Set this section to stretch to the full height of the screen (not shown in preview)',
			'required' => 0,
			'conditional_logic' => 0,
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
		),
	));
}

function gs_add_default_layout_content_width( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'field_5c2f0c882bec1',
			'label' => 'Maximum content width',
			'name' => 'content_width',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'The maximum width in pixels of the inner content',
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
	));
}

function gs_add_default_layout_padding_top( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . '22ZC8X8CGyXJoe6',
			'label' => 'Padding top',
			'name' => 'padding_top',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'Override the top padding (desktop only)',
			'required' => 0,
			'wrapper' => array(
				'width' => '33.333333',
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

function gs_add_default_layout_padding_bottom( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . '9qnRt992RqvYvt3',
			'label' => 'Padding bottom',
			'name' => 'padding_bottom',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'Override the bottom padding (desktop only)',
			'required' => 0,
			'wrapper' => array(
				'width' => '33.333333',
			),
			'default_value' => null,
			'min' => '',
			'max' => 300,
			'step' => 10,
			'append' => 'px',
		),
	));
}

function gs_add_default_layout_margin_before( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'Y7JCPN7E436xVHi',
			'label' => 'Margin before',
			'name' => 'margin_before',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'Spacing above this section (negative margins only, use the <em>spacer</em> block to add spacing.',
			'required' => 0,
			'wrapper' => array(
				'width' => '33.333333',
			),
			'default_value' => null,
			'min' => -300,
			'max' => 0,
			'prepend' => '',
			'append' => 'px',
		),
	));
}

function gs_add_default_layout_margin_after( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'c2GiB3Vzep89bY7',
			'label' => 'Margin after',
			'name' => 'margin_after',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'Spacing below this section (negative margins only, use the <em>spacer</em> block to add spacing.',
			'required' => 0,
			'wrapper' => array(
				'width' => '33.333333',
			),
			'default_value' => null,
			'min' => -300,
			'max' => 0,
			'append' => 'px',
		),
	));
}

function gs_add_default_layout_z_index( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 't3N2M3pifq8ea7o',
			'label' => 'Z index',
			'name' => 'z_index',
			'type' => 'number',
			'parent' => $key,
			'instructions' => 'The layer in which this section appears along the z axis (can appear above or below adjacent sections if one of them has a negative margin)',
			'required' => 0,
			'wrapper' => array(
				'width' => '33.333333',
			),
			'default_value' => null,
			'min' => -1,
			'max' => 100,
		),
	));
}