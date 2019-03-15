<?php

//////////////////////////
// SET UP THE ACF BLOCK //
//////////////////////////

add_action( 'acf/init', 'init_masonrygallery_block' );
function init_masonrygallery_block() {
    
    // bail if ACF isn't active
    if( !function_exists( 'acf_register_block' ) )
        return;

    // register a masonrygallery block
    acf_register_block(
        array(
            'name'              => 'Masonry Gallery',
            'title'             => __( 'masonrygallery' ),
            'description'       => __( 'A pure css masonry-like gallery section, with support for both foreground and background images and individual size selections.' ),
            'render_callback'   => 'gs_render',
            'category'          => 'sections',
            'icon'              => 'tagcloud',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( 'full', 'gallery', 'image', 'masonry', 'packery', 'isotope', 'full-width', 'wrapper' ),
            'supports'          => array(
                'align' =>  array( 'full', 'wide' ),
            ),
        )
    );
}

//////////////////////////////
// REGISTER THE FIELD GROUP //
//////////////////////////////

add_action( 'after_setup_theme', 'register_section_masonrygallery' );
function register_section_masonrygallery() {

	$key = 'group_d2B3P3qmo7JnBD2M';
	$prefix = 'masonrygallery_';

	// Allow hookable fields
	do_action( $prefix . 'add_sections', $key, $prefix );

	/**
	 * Register the masonrygallery section
	 */
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => $key,
			'title' => 'Block: masonrygallery',
			'fields' => array(),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/masonrygallery',
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
add_action( 'masonrygallery_add_sections', 'gs_add_default_content_heading', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_content', 10, 2 );

// Alignment
add_action( 'masonrygallery_add_sections', 'gs_add_default_alignment_heading', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_alignment', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_container_alignment', 10, 2 );

// Layout defaults
add_action( 'masonrygallery_add_sections', 'gs_add_default_layout_heading', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_layout_fullheight', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_layout_content_width', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_layout_padding_top', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_layout_padding_bottom', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_layout_margin_before', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_layout_margin_after', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_layout_z_index', 10, 2 );

// Color defaults
add_action( 'masonrygallery_add_sections', 'gs_add_default_color_heading', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_color_field_background_image', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_color_field_fixed_position_background', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_color_field_background_color', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_color_field_background_color_opacity', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_color_field_maintain_default_text_color', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_color_field_text_color', 10, 2 );

// Video defaults
add_action( 'masonrygallery_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_video_files_or_url', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_video_video_url', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_video_video_mp4', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_video_video_webm', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_video_image_fallback', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_video_heading', 10, 2 );

