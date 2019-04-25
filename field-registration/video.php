<?php

//////////////////////////
// SET UP THE ACF BLOCK //
//////////////////////////

add_action( 'acf/init', 'init_video_block' );
function init_video_block() {
    
    // bail if ACF isn't active
    if( !function_exists( 'acf_register_block' ) )
        return;

    // register a video block
    acf_register_block(
        array(
            'name'              => 'video',
            'title'             => __( 'Background Video' ),
            'description'       => __( 'A fullwidth wrapper with background video support.' ),
            'render_callback'   => 'gs_render',
            'category'          => 'sections',
            'icon'              => 'tagcloud',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( 'video', 'fullwidth video', 'background video', 'wrapper' ),
            'supports'          => array(
                'align' =>  array( 'full', 'wide' ),
            ),
        )
    );
}

//////////////////////////////
// REGISTER THE FIELD GROUP //
//////////////////////////////

add_action( 'after_setup_theme', 'register_section_video' );
function register_section_video() {

	$key = 'group_pX2DY6oy6F8B9tK';
	$prefix = 'video_';

	// Allow hookable fields
	do_action( $prefix . 'add_sections', $key, $prefix );

	/**
	 * Register the fullwidth section
	 */
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => $key,
			'title' => 'Block: Background Video',
			'fields' => array(),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/video',
					),
				),
			),
		));

	endif;

}

//////////////////////////////////////////////////
// DEFINE THE SPECIFIC FIELDS THAT WILL BE USED //
//////////////////////////////////////////////////

// Video Content
add_action( 'video_add_sections', 'gs_add_video_content_heading', 0, 2 );
add_action( 'video_add_sections', 'gs_add_video_content', 5, 2 );

// Content
add_action( 'video_add_sections', 'gs_add_default_content_heading', 10, 2 );
add_action( 'video_add_sections', 'gs_add_default_content', 15, 2 );

// Alignment
add_action( 'video_add_sections', 'gs_add_default_alignment_heading', 20, 2 );
// add_action( 'video_add_sections', 'gs_add_default_alignment', 25, 2 );

// Layout
add_action( 'video_add_sections', 'gs_add_default_layout_heading', 30, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout_fullheight', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout_content_width', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout_padding_top', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout_padding_bottom', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout_margin_before', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout_margin_after', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout_z_index', 10, 2 );

// Color
add_action( 'video_add_sections', 'gs_add_default_color_heading', 40, 2 );
// add_action( 'video_add_sections', 'gs_add_default_color', 45, 2 );
add_action( 'video_add_sections', 'gs_add_video_color_fields', 45, 2 );

// ID
add_action( 'video_add_sections', 'gs_add_default_section_id_heading', 10, 2 );
add_action( 'video_add_sections', 'gs_add_default_section_id', 10, 2 );

function gs_add_video_content_heading( $key, $prefix ) {

	// Alignment fields
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'F7aWEC6uj4V66uu',
			'label' => 'Video',
			'name' => '',
			'type' => 'accordion',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
	));
}

function gs_add_video_content( $key, $prefix ) {

	// Alignment fields
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'F7aWEC6uj4V66uu',
			'label' => 'Video',
			'name' => '',
			'type' => 'accordion',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
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
		),
        array(
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
        ),
		array(
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
        ),
        array(
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
        ),
        array(
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
        ),
	));
}

function gs_add_video_color_fields( $key, $prefix ) {

	// Color and background
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'XwD94xiL6y8AM6Y',
			'label' => 'Color overlay',
			'name' => '',
			'type' => 'accordion',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => $prefix . 'AF49yue6j7Rut7Q',
			'label' => 'Overlay color',
			'name' => 'background_color',
			'type' => 'color_picker',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33333',
			),
		),
		array(
			'key' => $prefix . 'iAG44q2khq72Brc',
			'label' => 'Overlay color opacity',
			'name' => 'background_color_opacity',
			'type' => 'number',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'wrapper' => array(
				'width' => '33.33333',
			),
			'default_value' => 0,
			'min' => '',
			'max' => 100,
			'step' => '',
			'prepend' => '',
			'append' => '%',
		),
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
			'wrapper' => array(
				'width' => '33.33333',
			),
		),
	));

}