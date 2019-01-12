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
            'title'             => __( 'checkerboard' ),
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
// add_action( 'checkerboard_add_sections', 'gs_add_default_content_heading', 10, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_content', 15, 2 );

// // Alignment
// add_action( 'checkerboard_add_sections', 'gs_add_default_alignment_heading', 20, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_alignment', 25, 2 );

// // Layout
// add_action( 'checkerboard_add_sections', 'gs_add_default_layout_heading', 30, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_layout', 35, 2 );

// // Color
// add_action( 'checkerboard_add_sections', 'gs_add_default_color_heading', 40, 2 );
// add_action( 'checkerboard_add_sections', 'gs_add_default_color', 45, 2 );