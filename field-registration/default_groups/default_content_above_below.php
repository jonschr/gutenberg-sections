<?php

/////////////////////////////
// CONTENT ABOVE AND BELOW //
/////////////////////////////

function gs_add_default_content_above_and_below( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . '43wHjyj7Vxgqd24',
			'label' => '',
			'name' => 'above_and_below',
			'type' => 'checkbox',
			'choices' => array(
				'above'	=> 'Content above the featured items layout',
				'below'	=> 'Content below the featured items layout',
			),
			'parent' => $key,
			'default_value' => '',
			'ui' => 1,
		),
	));
}

function gs_add_default_content_content_above( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'T77X2DVne4R2Dap',
			'label' => 'Content above',
			'name' => 'content_above',
			'type' => 'wysiwyg',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
			'conditional_logic' => array(
				array(
					array(
						'key' => $prefix . '43wHjyj7Vxgqd24',
						'operator' => '==',
						'value' => 'above',
					),
				),
			),
		),
	));
}

function gs_add_default_content_content_below( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . '72HwdTK38aJd6wA',
			'label' => 'Content below',
			'name' => 'content_below',
			'type' => 'wysiwyg',
			'conditional_logic' => array(
				array(
					array(
						'key' => $prefix . '43wHjyj7Vxgqd24',
						'operator' => '==',
						'value' => 'below',
					),
				),
			),
			'parent' => $key,
			'required' => 0,
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
	));
}