<?php

/////////////////
// THE HEADING //
/////////////////

// Video accordion heading
function gs_add_default_video_heading( $key, $prefix ) {
	acf_add_local_field( array(
		'key' => $prefix . 'F7aWEC6uj4V66uu',
		'label' => 'Video Background',
		'name' => '',
		'type' => 'accordion',
		'parent' => $key,
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'open' => 0,
		'multi_expand' => 0,
		'endpoint' => 0,
	));
}

// Select files or url for the video source
function gs_add_default_video_files_or_url( $key, $prefix ) {
	acf_add_local_field( array(
		'key' => $prefix . '8Q9qk3tCBAzW6j6',
		'label' => 'Video source',
		'name' => 'files_or_url',
		'type' => 'true_false',
		'parent' => $key,
		'instructions' => 'Would you prefer to use a direct link, using a service like Vimeo (recommended), or would you like to upload files?',
		'default_value' => 1,
		'ui' => 1,
		'ui_on_text' => 'Link',
		'ui_off_text' => 'Files',
			'wrapper' => array(
			'width' => 25,
		),
	));
}

// Video image fallback
function gs_add_default_video_image_fallback( $key, $prefix ) {
	acf_add_local_field( array(
		'key' => $prefix . 'RiG8mwm6Fe9hw29',
		'label' => 'Fallback image',
		'name' => 'image_fallback',
		'type' => 'image',
		'parent' => $key,
		'instructions' => 'An image fallback to load on slow connections, low power mode on iOS, and before the video has finished loading',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => 25,
		),
		'return_format' => 'array',
		'preview_size' => 'thumbnail',
		'library' => 'all',
	));
}

// Video url
function gs_add_default_video_video_url( $key, $prefix ) {
	acf_add_local_field( array(
		'key' => $prefix . '3fuQ97Tnx9TLD8i',
		'label' => 'Direct link to URL (Option A)',
		'name' => 'video_url',
		'type' => 'url',
		'parent' => $key,
		'instructions' => 'If this is a Vimeo link, it should look something like this: <a href="https://player.vimeo.com/external/293021235.hd.mp4?s=08a3590ddf3f55ce74ca4262633e0737954f8d71" target="_blank">https://player.vimeo.com/external/293021235.hd.mp4?s=08a3590ddf3f55ce74ca4262633e0737954f8d71</a>',
		'conditional_logic' => array(
			array(
				array(
					'field' => $prefix . '8Q9qk3tCBAzW6j6',
					'operator' => '==',
					'value' => '1',
				),
			),
		),
		'wrapper' => array(
			'width' => 50,
		),
	));
}

// MP4 file
function gs_add_default_video_video_mp4( $key, $prefix ) {
	acf_add_local_field( array(
		'key' => $prefix . '7bQceR49XGCQ26f',
		'label' => '.mp4 video file',
		'name' => 'video_mp4',
		'type' => 'file',
		'parent' => $key,
		'return_format' => 'url',
		'library' => 'all',
		'min_size' => '',
		'max_size' => '',
		'mime_types' => 'mp4',
		'conditional_logic' => array(
			array(
				array(
					'field' => $prefix . '8Q9qk3tCBAzW6j6',
					'operator' => '!=',
					'value' => '1',
				),
			),
		),
		'wrapper' => array(
			'width' => 25,
		),
	));
}

// Webm file
function gs_add_default_video_video_webm( $key, $prefix ) {
	acf_add_local_field( array(
		'key' => $prefix . '23X2wiAT6RKGLh8',
		'label' => '.webm video file',
		'name' => 'video_webm',
		'type' => 'file',
		'parent' => $key,
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => array(
			array(
				array(
					'field' => $prefix . '8Q9qk3tCBAzW6j6',
					'operator' => '!=',
					'value' => '1',
				),
			),
		),
		'wrapper' => array (
			'width' => 25,
		),
		'return_format' => 'url',
		'library' => 'all',
		'min_size' => '',
		'max_size' => '',
		'mime_types' => 'webm',
	));
}

// function gs_add_video_color_fields( $key, $prefix ) {

// 	// Color and background
// 	acf_add_local_field( array(
	// 	'key' => $prefix . 'XwD94xiL6y8AM6Y',
	// 	'label' => 'Color overlay',
	// 	'name' => '',
	// 	'type' => 'accordion',
	// 	'parent' => $key,
	// 	'instructions' => '',
	// 	'required' => 0,
	// 	'conditional_logic' => 0,
	// 	'open' => 0,
	// 	'multi_expand' => 0,
	// 	'endpoint' => 0,
	// ),
	// array(
	// 	'key' => $prefix . 'AF49yue6j7Rut7Q',
	// 	'label' => 'Overlay color',
	// 	'name' => 'background_color',
	// 	'type' => 'color_picker',
	// 	'parent' => $key,
	// 	'instructions' => '',
	// 	'required' => 0,
	// 	'conditional_logic' => 0,
	// 	'wrapper' => array(
	// 		'width' => '33.33333',
	// 	),
	// ),
	// array(
	// 	'key' => $prefix . 'iAG44q2khq72Brc',
	// 	'label' => 'Overlay color opacity',
	// 	'name' => 'background_color_opacity',
	// 	'type' => 'number',
	// 	'parent' => $key,
	// 	'instructions' => '',
	// 	'required' => 0,
	// 	'wrapper' => array(
	// 		'width' => '33.33333',
	// 	),
	// 	'default_value' => 0,
	// 	'min' => '',
	// 	'max' => 100,
	// 	'step' => '',
	// 	'prepend' => '',
	// 	'append' => '%',
	// ),
	// array(
	// 	'key' => $prefix . 'UNG6K78Cr29CuWw',
	// 	'label' => 'Text color',
	// 	'name' => 'text_color',
	// 	'type' => 'color_picker',
	// 	'parent' => $key,
	// 	'instructions' => '',
	// 	'required' => 0,
	// 	'conditional_logic' => 0,
	// 	'default_value' => '',
	// 	'wrapper' => array(
	// 		'width' => '33.33333',
	// 	),
// 	));

// }