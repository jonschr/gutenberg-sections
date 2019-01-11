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
// add_action( 'twocolumn_add_sections', 'gs_add_default_content', 15, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_custom_content_twocolumn', 15, 2 );

// Alignment
add_action( 'twocolumn_add_sections', 'gs_add_default_alignment_heading', 20, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_alignment', 25, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_custom_alignment_twocolumn', 27, 2 );

// Layout
add_action( 'twocolumn_add_sections', 'gs_add_default_layout_heading', 30, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_layout', 35, 2 );

// Color
add_action( 'twocolumn_add_sections', 'gs_add_default_color_heading', 40, 2 );
add_action( 'twocolumn_add_sections', 'gs_add_default_color', 45, 2 );

function gs_add_custom_content_twocolumn( $key, $prefix ) {

	// Content fields
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

function gs_add_custom_alignment_twocolumn( $key, $prefix ) {

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