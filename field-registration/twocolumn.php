<?php

//////////////////////////
// SET UP THE ACF BLOCK //
//////////////////////////

add_action( 'acf/init', 'init_twocolumn_block' );
function init_twocolumn_block() {
    
    // bail if ACF isn't active
    if( !function_exists( 'acf_register_block' ) )
        return;

    // register a two column block
    acf_register_block(
        array(
            'name'              => 'twocolumn',
            'title'             => __( 'Two Column' ),
            'description'       => __( 'A wrapper with support for two-column layouts' ),
            'render_callback'   => 'gs_render',
            'category'          => 'sections',
            'icon'              => 'tagcloud',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( 'two column', '2 column', 'column', 'wrapper', 'twocolumn', '2column' ),
            'supports'          => array(
                'align' =>  array( 'full', 'wide' ),
            ),
        )
    );
}

//////////////////////////////
// REGISTER THE FIELD GROUP //
//////////////////////////////

add_action( 'after_setup_theme', 'register_section_twocolumn' );
function register_section_twocolumn() {

	$key = 'group_R8M72ziw6WAm3xz';
	$prefix = 'twocolumn_';

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
						'value' => 'acf/twocolumn',
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
add_action( 'twocolumn_add_sections', 'gs_add_default_content_heading', 10, 2 );
// add_action( 'twocolumn_add_sections', 'gs_add_default_content', 10, 2 );

	// Content additions
	add_action( 'twocolumn_add_sections', 'gs_add_custom_content_twocolumn_above_and_below', 10, 2 );
	add_action( 'twocolumn_add_sections', 'gs_add_custom_content_twocolumn_content_above', 10, 2 );
	add_action( 'twocolumn_add_sections', 'gs_add_custom_content_twocolumn_content_left', 10, 2 );
	add_action( 'twocolumn_add_sections', 'gs_add_custom_content_twocolumn_content_right', 10, 2 );
	add_action( 'twocolumn_add_sections', 'gs_add_custom_content_twocolumn_content_below', 10, 2 );

// Alignment defaults
add_action( 'twocolumn_add_sections', 'gs_add_default_alignment_heading', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_alignment', 10, 2 );

	// More alignment fields
	add_action( 'twocolumn_add_sections', 'gs_add_custom_alignment_twocolumn_horizontal_alignment', 10, 2 );
	add_action( 'twocolumn_add_sections', 'gs_add_custom_alignment_twocolumn_vertical_alignment', 10, 2 );

// Layout defaults
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_heading', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_fullheight', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_content_width', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_padding_top', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_padding_bottom', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_margin_before', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_margin_after', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_z_index', 10, 2 );

// Color defaults
add_action( 'twocolumn_add_sections', 'gs_add_default_color_heading', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_color_field_background_image', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_color_field_fixed_position_background', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_color_field_background_color', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_color_field_background_color_opacity', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_color_field_text_color', 10, 2 );

// Video defaults
add_action( 'twocolumn_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_video_files_or_url', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_video_image_fallback', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_video_video_url', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_video_video_mp4', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_video_video_webm', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_video_heading', 10, 2 );

///////////////////////////////
// TWO-COLUMN CONTENT FIELDS //
///////////////////////////////

function gs_add_custom_content_twocolumn_above_and_below( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'Q48Wwib6PYrc73a',
			'label' => '',
			'name' => 'above_and_below',
			'type' => 'checkbox',
			'choices' => array(
				'above'	=> 'Content above the two-column layout',
				'below'	=> 'Content below the two-column layout',
			),
			'parent' => $key,
			'default_value' => '',
			'ui' => 1,
		),
	));
}

function gs_add_custom_content_twocolumn_content_above( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'Q6kQhLi98jLF34i',
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
						'key' => $prefix . 'Q48Wwib6PYrc73a',
						'operator' => '==',
						'value' => 'above',
					),
				),
			),
		),
	));
}

function gs_add_custom_content_twocolumn_content_left( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'uzk7G29g3TRx3HY',
			'label' => 'Content left',
			'name' => 'content_left',
			'type' => 'wysiwyg',
			'parent' => $key,
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

function gs_add_custom_content_twocolumn_content_right( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'DNWw79P6rTuwB64',
			'label' => 'Content right',
			'name' => 'content_right',
			'type' => 'wysiwyg',
			'parent' => $key,
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

function gs_add_custom_content_twocolumn_content_below( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'tHBA3hJe9WL32V',
			'label' => 'Content below',
			'name' => 'content_below',
			'type' => 'wysiwyg',
			'conditional_logic' => array(
				array(
					array(
						'key' => $prefix . 'Q48Wwib6PYrc73a',
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

/////////////////////////////////
// TWO-COLUMN ALIGNMENT FIELDS //
/////////////////////////////////

function gs_add_custom_alignment_twocolumn_horizontal_alignment( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'rbhTYUEAT8429q4',
			'label' => 'Horizontal alignment',
			'name' => 'horizontal_alignment',
			'type' => 'radio',
			'choices' => array(
				'horizontal-align-half'		=> 'Half & half',
				'horizontal-align-two-one'	=> 'Two thirds & one third',
				'horizontal-align-one-two'	=> 'One third & two thirds',
				'horizontal-align-auto'		=> 'Auto (align based on content)',
			),
			'parent' => $key,
			'default_value' => 'horizontal-align-half',
		),
	));
}

function gs_add_custom_alignment_twocolumn_vertical_alignment( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'WB8sQmm8WT8g42G',
			'label' => 'Vertical alignment',
			'name' => 'vertical_alignment',
			'type' => 'radio',
			'choices' => array(
				'vertical-align-center'		=> 'Align columns to vertical center',
				'vertical-align-top'		=> 'Align columns to top',
				'vertical-align-bottom'		=> 'Align columns to bottom',
			),
			'parent' => $key,
			'default_value' => 'vertical-align-center',
		),
	));
}