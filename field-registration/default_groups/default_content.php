<?php

function gs_add_default_content_heading( $key, $prefix ) {

	// Content fields
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'fP7U2q4oqghw2P6',
			'label' => 'Content',
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

function gs_add_default_content( $key, $prefix ) {

	// Content fields
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'uwXzbe372nV3Fd4',
			'label' => '',
			'name' => 'content',
			'type' => 'wysiwyg',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
	));

}