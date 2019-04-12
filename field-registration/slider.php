<?php

//////////////////////////
// SET UP THE ACF BLOCK //
//////////////////////////

add_action( 'acf/init', 'init_slider_block' );
function init_slider_block() {
    
    // bail if ACF isn't active
    if( !function_exists( 'acf_register_block' ) )
        return;

    // register a two column block
    acf_register_block(
        array(
            'name'              => 'slider',
            'title'             => __( 'Slider' ),
            'description'       => __( 'A full-width slick slider' ),
            'render_callback'   => 'gs_render',
            'category'          => 'sections',
            'icon'              => 'tagcloud',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( 'fullwidth', 'featured', 'wrapper', 'slider', 'section' ),
            'supports'          => array(
                'align' =>  array( 'full', 'wide' ),
            ),
        )
    );
}

//////////////////////////////
// REGISTER THE FIELD GROUP //
//////////////////////////////

add_action( 'after_setup_theme', 'register_section_slider' );
function register_section_slider() {

	$key = 'group_n4qTUPf6DK9g3qD2u';
	$prefix = 'slider_';

	// Allow hookable fields
	do_action( $prefix . 'add_sections', $key, $prefix );

	/**
	 * Register the two column section
	 */
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => $key,
			'title' => 'Block: Two Column',
			'fields' => array(),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/slider',
					),
				),
			),
		));

	endif;

}

//////////////////////////////////////////////////
// DEFINE THE SPECIFIC FIELDS THAT WILL BE USED //
//////////////////////////////////////////////////

// Content above and below
add_action( 'slider_add_sections', 'gs_add_custom_slider_content_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_content_above_and_below', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_content_content_above', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_content_content_below', 10, 2 );

// Featured items
add_action( 'slider_add_sections', 'gs_add_custom_slider_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_custom_content_slider_content_range', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_custom_content_slider_content_items', 10, 2 );


// Alignment defaults
add_action( 'slider_add_sections', 'gs_add_default_alignment_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_custom_content_slider_orphan_alignment', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_alignment', 10, 2 );

// Layout defaults
add_action( 'slider_add_sections', 'gs_add_default_layout_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_layout_fullheight', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_layout_content_width', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_layout_padding_top', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_layout_padding_bottom', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_layout_margin_before', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_layout_margin_after', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_layout_z_index', 10, 2 );

// Color defaults
add_action( 'slider_add_sections', 'gs_add_default_color_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_color_field_background_image', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_color_field_fixed_position_background', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_color_field_background_color', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_color_field_background_color_opacity', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_color_field_maintain_default_text_color', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_color_field_text_color', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_custom_color_field_featured_text_color', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_custom_color_field_featured_background_color', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_custom_color_field_featured_link_color', 10, 2 );

// Video defaults
add_action( 'slider_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_files_or_url', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_video_url', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_video_mp4', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_video_webm', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_image_fallback', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_heading', 10, 2 );
