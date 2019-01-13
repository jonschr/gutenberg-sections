<?php

//////////////////////////
// SET UP THE ACF BLOCK //
//////////////////////////

add_action( 'acf/init', 'init_checkerboard_block' );
function init_checkerboard_block() {
    
    // bail if ACF isn't active
    if( !function_exists( 'acf_register_block' ) )
        return;

    // register a checkerboard block
    acf_register_block(
        array(
            'name'              => 'checkerboard',
            'title'             => __( 'Checkerboard' ),
            'description'       => __( 'A checkerboard wrapper section, with support for background images and colors behind grouped paragraphs, headings, etc.' ),
            'render_callback'   => 'gs_render',
            'category'          => 'sections',
            'icon'              => 'tagcloud',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( 'full', 'checkerboard', 'full-width', 'wrapper' ),
            'supports'          => array(
                'align' =>  array( 'full' ),
            ),
        )
    );
}

//////////////////////////////
// REGISTER THE FIELD GROUP //
//////////////////////////////

add_action( 'after_setup_theme', 'register_section_checkerboard' );
function register_section_checkerboard() {

	$key = 'group_74cMm4Up3s3dTQE';
	$prefix = 'checkerboard_';

	// Allow hookable fields
	do_action( $prefix . 'add_sections', $key, $prefix );

	/**
	 * Register the checkerboard section
	 */
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => $key,
			'title' => 'Block: Checkerboard',
			'fields' => array(),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/checkerboard',
					),
				),
			),
		));

	endif;

}

//////////////////////////////////////////////////
// DEFINE THE SPECIFIC FIELDS THAT WILL BE USED //
//////////////////////////////////////////////////

// Content
add_action( 'checkerboard_add_sections', 'gs_add_default_content_heading', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_content', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_custom_checkerboard_alignment', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_custom_checkerboard_content', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_custom_checkerboard_image', 10, 2 );

// Alignment
// add_action( 'checkerboard_add_sections', 'gs_add_default_alignment_heading', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_alignment', 10, 2 );

// Layout defaults
add_action( 'checkerboard_add_sections', 'gs_add_default_layout_heading', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_layout_fullheight', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_layout_content_width', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_layout_padding_top', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_layout_padding_bottom', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_default_layout_margin_before', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_default_layout_margin_after', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_default_layout_z_index', 10, 2 );

// Color defaults
// add_action( 'checkerboard_add_sections', 'gs_add_default_color_heading', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_checkerboard_custom_color_heading', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_color_field_background_image', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_color_field_fixed_position_background', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_default_color_field_background_color', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_color_field_background_color_opacity', 10, 2 );
add_action( 'checkerboard_add_sections', 'gs_add_default_color_field_text_color', 10, 2 );

// Video defaults
// add_action( 'checkerboard_add_sections', 'gs_add_default_video_heading', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_video_files_or_url', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_video_image_fallback', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_video_video_url', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_video_video_mp4', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_video_video_webm', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_video_heading', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_video_heading', 10, 2 );

////////////////////////////////
// CHECKERBOARD HEADING FIELD //
////////////////////////////////

// Color heading
function gs_add_checkerboard_custom_color_heading( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'XwD94xiL6y8AM6Y',
			'label' => 'Color',
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

/////////////////////////////////
// CHECKERBOARD CONTENT FIELDS //
/////////////////////////////////

// Checkerboard alignment
function gs_add_custom_checkerboard_alignment( $key, $prefix ) {

	acf_add_local_field(array(
		array(
			'key' => $prefix . 'CwNLx7Z6GK64r6V',
			'label' => 'Checkerboard alignment',
			'name' => 'alignment',
			'type' => 'radio',
			'parent' => $key,
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'choices' => array (
				'content_left' => 'Content left, image right',
				'content_right' => 'Image left, content right',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'content_left',
			'layout' => 'horizontal',
		),
	));

}

// Checkerboard content
function gs_add_custom_checkerboard_content( $key, $prefix ) {

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
				'width' => '50',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
	));

}

// Checkerboard image
function gs_add_custom_checkerboard_image( $key, $prefix ) {

	acf_add_local_field(array(
		array(
			'key' => $prefix . '9m8G96QRNWX3vLH',
			'label' => '',
			'name' => 'image',
			'type' => 'image',
			'parent' => $key,
			'instructions' => 'An image to place next to the content',
			'required' => 0,
			'conditional_logic' => 0,
			'return_format' => 'url',
			'preview_size' => 'large',
			'library' => 'all',
			'wrapper' => array(
				'width' => '50',
			),
			'min_width' => '800',
			'min_height' => '800',
			'mime_types' => 'jpg',
		),
	));

}