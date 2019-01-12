<?php

//////////////////////////
// SET UP THE ACF BLOCK //
//////////////////////////

add_action( 'acf/init', 'init_fullwidth_block' );
function init_fullwidth_block() {
    
    // bail if ACF isn't active
    if( !function_exists( 'acf_register_block' ) )
        return;

    // register a fullwidth block
    acf_register_block(
        array(
            'name'              => 'fullwidth',
            'title'             => __( 'Fullwidth' ),
            'description'       => __( 'A fullwidth wrapper section, with support for background images and colors behind grouped paragraphs, headings, etc.' ),
            'render_callback'   => 'gs_render',
            'category'          => 'sections',
            'icon'              => 'tagcloud',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( 'full', 'fullwidth', 'full-width', 'wrapper' ),
            'supports'          => array(
                'align' =>  array( 'full', 'wide' ),
            ),
        )
    );
}

//////////////////////////////
// REGISTER THE FIELD GROUP //
//////////////////////////////

add_action( 'after_setup_theme', 'register_section_fullwidth' );
function register_section_fullwidth() {

	$key = 'group_5c2ed4ffa9285';
	$prefix = 'fullwidth_';

	// Allow hookable fields
	do_action( $prefix . 'add_sections', $key, $prefix );

	/**
	 * Register the fullwidth section
	 */
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => $key,
			'title' => 'Block: Fullwidth',
			'fields' => array(),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/fullwidth',
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
add_action( 'fullwidth_add_sections', 'gs_add_default_content_heading', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_content', 10, 2 );

// Alignment
add_action( 'fullwidth_add_sections', 'gs_add_default_alignment_heading', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_alignment', 10, 2 );

// Layout
add_action( 'fullwidth_add_sections', 'gs_add_default_layout_heading', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_layout', 10, 2 );

// Color
add_action( 'fullwidth_add_sections', 'gs_add_default_color_heading', 10, 2 );
add_action( 'fullwidth_add_sections', 'gs_add_default_color', 10, 2 );