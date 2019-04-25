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
	 * Register the slider
	 */
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => $key,
			'title' => 'Block: Slider',
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

// Content
add_action( 'slider_add_sections', 'gs_add_custom_slider_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_custom_content_slider_content_items', 10, 2 );

// Alignment
add_action( 'slider_add_sections', 'gs_add_default_alignment_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_alignment', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_container_alignment', 10, 2 );

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

// Video defaults
add_action( 'slider_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_files_or_url', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_video_url', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_video_mp4', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_video_webm', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_image_fallback', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_video_heading', 10, 2 );

// ID
add_action( 'slider_add_sections', 'gs_add_default_section_id_heading', 10, 2 );
add_action( 'slider_add_sections', 'gs_add_default_section_id', 10, 2 );

///////////////////
// SLIDER FIELDS //
///////////////////


function gs_add_custom_slider_heading( $key, $prefix ) {

	// Content fields
	acf_add_local_field(array(
		'key' => $prefix . 'vwMDe8JY98tsz82VR',
		'label' => 'Slides',
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

function gs_add_custom_content_slider_content_items( $key, $prefix ) {
	acf_add_local_field(array(
		'key' => $prefix . 'PF7nC9KB2v7dTV6ri',
		'label' => '',
		'name' => 'slides',
		'type' => 'repeater',
		'instructions' => '',
		'collapsed' => '',
		'parent' => $key,
		'min' => 1,
		'max' => 0,
		'layout' => 'block',
		'button_label' => 'Add slide',
		'sub_fields' => array(
			array(
				'key' => $prefix . '866mqytNvHkY8Qxo81',
				'label' => 'Featured Item Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'parent' => $prefix . 'PF7nC9KB2v7dTV6ri',
				'media_upload' => 1,
				'delay' => 0,
				'wrapper' => array(
					'width' => '60',
				),
			),
			array(
				'key' => $prefix . '866mqytNvHkY8Qxo82',
				'label' => 'Slide background image',
				'name' => 'image',
                'type' => 'image',
                'min-width' => '1600',
                'min-height' => '1000',
                'mime_types' => 'jpg',
				'parent' => $prefix . 'PF7nC9KB2v7dTV6ri',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => '',
				'placeholder' => '',
				'wrapper' => array(
					'width' => '40',
				),
			),
		),
	));
}