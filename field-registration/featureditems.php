<?php

//////////////////////////
// SET UP THE ACF BLOCK //
//////////////////////////

add_action( 'acf/init', 'init_featureditems_block' );
function init_featureditems_block() {
    
    // bail if ACF isn't active
    if( !function_exists( 'acf_register_block' ) )
        return;

    // register a two column block
    acf_register_block(
        array(
            'name'              => 'featureditems',
            'title'             => __( 'Featured Items' ),
            'description'       => __( 'A wrapper with support for two-column layouts' ),
            'render_callback'   => 'gs_render',
            'category'          => 'sections',
            'icon'              => 'tagcloud',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( 'featured items', 'featured', 'wrapper', 'featureditems' ),
            'supports'          => array(
                'align' =>  array( 'full', 'wide' ),
            ),
        )
    );
}

//////////////////////////////
// REGISTER THE FIELD GROUP //
//////////////////////////////

add_action( 'after_setup_theme', 'register_section_featureditems' );
function register_section_featureditems() {

	$key = 'group_97qyPJ3TKoPrp68';
	$prefix = 'featureditems_';

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
						'value' => 'acf/featureditems',
					),
				),
			),
		));

	endif;

}

//////////////////////////////////////////////////
// DEFINE THE SPECIFIC FIELDS THAT WILL BE USED //
//////////////////////////////////////////////////

// Featured items
add_action( 'featureditems_add_sections', 'gs_add_custom_featureditems_heading', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_custom_content_featureditems_content_range', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_custom_content_featureditems_content_items', 10, 2 );

// Content
add_action( 'featureditems_add_sections', 'gs_add_default_content_heading', 10, 2 );
// add_action( 'featureditems_add_sections', 'gs_add_default_content', 10, 2 );

	// Content additions
	add_action( 'featureditems_add_sections', 'gs_add_custom_content_featureditems_above_and_below', 10, 2 );
	add_action( 'featureditems_add_sections', 'gs_add_custom_content_featureditems_content_above', 10, 2 );
	add_action( 'featureditems_add_sections', 'gs_add_custom_content_featureditems_content_below', 10, 2 );

// Alignment defaults
add_action( 'featureditems_add_sections', 'gs_add_default_alignment_heading', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_custom_content_featureditems_orphan_alignment', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_alignment', 10, 2 );

// Layout defaults
add_action( 'featureditems_add_sections', 'gs_add_default_layout_heading', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_layout_fullheight', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_layout_content_width', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_layout_padding_top', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_layout_padding_bottom', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_layout_margin_before', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_layout_margin_after', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_layout_z_index', 10, 2 );

// Color defaults
add_action( 'featureditems_add_sections', 'gs_add_default_color_heading', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_color_field_background_image', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_color_field_fixed_position_background', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_color_field_background_color', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_color_field_background_color_opacity', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_color_field_maintain_default_text_color', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_color_field_text_color', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_custom_color_field_featured_text_color', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_custom_color_field_featured_background_color', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_custom_color_field_featured_link_color', 10, 2 );

// Video defaults
add_action( 'featureditems_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_video_files_or_url', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_video_video_url', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_video_video_mp4', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_video_video_webm', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_video_image_fallback', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_video_heading', 10, 2 );
add_action( 'featureditems_add_sections', 'gs_add_default_video_heading', 10, 2 );

////////////////////////////////////
// FEATURED ITEMS REPEATER FIELDS //
////////////////////////////////////

function gs_add_custom_featureditems_heading( $key, $prefix ) {

	// Content fields
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'mw6Nua3ov8E3n8u',
			'label' => 'Featured Items',
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

function gs_add_custom_content_featureditems_content_range( $key, $prefix ) {
	acf_add_local_field(array(
        array(
			'key' => $prefix . '264EDKQ2cmZ3bpN',
			'label' => 'Columns',
			'name' => 'columns',
			'type' => 'range',
            'parent' => $key,
            'min' => '1',
            'max' => '10',
            'step' => '1',
			'default_value' => '3',
			'wrapper' => array(
				'width' => '100',
			),
		),
    ));
}

function gs_add_custom_content_featureditems_content_items( $key, $prefix ) {
	acf_add_local_field(array(
		array(
            'key' => $prefix . '5c3d94fe69220',
            'label' => 'Featured item',
            'name' => 'featureditem',
            'type' => 'repeater',
            'instructions' => '',
            'collapsed' => '',
            'parent' => $key,
            'min' => 3,
            'max' => 0,
            'layout' => 'block',
            'button_label' => 'Add featured item',
            'sub_fields' => array(
                array(
                    'key' => $prefix . 'KBnKU8962rX7smj',
                    'label' => 'Featured Item Content',
                    'name' => 'content',
                    'type' => 'wysiwyg',
                    'parent' => $prefix . '5c3d94fe69220',
                    'instructions' => 'If you use headings in this area, you\'ll want to start with a heading level three.',
					'media_upload' => 1,
                    'delay' => 0,
                    'wrapper' => array(
                        'width' => '60',
                    ),
                ),
                array(
                    'key' => $prefix . 'koQNTFC634kc3g4',
                    'label' => 'Featured Item Link',
                    'name' => 'link',
                    'type' => 'url',
                    'parent' => $prefix . '5c3d94fe69220',
                    'instructions' => 'If you add a link here, it will link <em>all</em> of the text in an item to your URL. If you\'d prefer a button, simply insert that in the content area instead.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'placeholder' => '',
                    'wrapper' => array(
                        'width' => '40',
                    ),
                ),
            ),
        ),
	));
}

///////////////////////////////////
// FEATURED ITEMS CONTENT FIELDS //
///////////////////////////////////

function gs_add_custom_content_featureditems_above_and_below( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . '43wHjyj7Vxgqd24',
			'label' => '',
			'name' => 'above_and_below',
			'type' => 'checkbox',
			'choices' => array(
				'above'	=> 'Content above the featured items layout',
				'below'	=> 'Content below the featured items layout',
			),
			'parent' => $key,
			'default_value' => '',
			'ui' => 1,
		),
	));
}

function gs_add_custom_content_featureditems_content_above( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'T77X2DVne4R2Dap',
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
						'key' => $prefix . '43wHjyj7Vxgqd24',
						'operator' => '==',
						'value' => 'above',
					),
				),
			),
		),
	));
}

function gs_add_custom_content_featureditems_content_below( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . '72HwdTK38aJd6wA',
			'label' => 'Content below',
			'name' => 'content_below',
			'type' => 'wysiwyg',
			'conditional_logic' => array(
				array(
					array(
						'key' => $prefix . '43wHjyj7Vxgqd24',
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

//////////////////////////////
// FEATURED ITEMS ALIGNMENT //
//////////////////////////////

function gs_add_custom_content_featureditems_orphan_alignment( $key, $prefix ) {
	
	// orphan alignment
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'CwNLx7Z6GK64r6V',
			'label' => 'Orphan alignment',
			'name' => 'orphan_alignment',
			'type' => 'radio',
			'parent' => $key,
			'instructions' => 'How should "leftover" featured items be aligned?',
			'required' => 1,
			'conditional_logic' => 0,
			'choices' => array (
				'orphans_left' => 'Align orphans left',
				'orphans_center' => 'Align orphans center',
				'orphans_right' => 'Align orphans right',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'orphans_left',
		),
	));
}

//////////////////////////////
// FEATURED ITEMS ALIGNMENT //
//////////////////////////////

// Featured items text color 
function gs_add_custom_color_field_featured_text_color( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'MDh32N2Yov2qL6f',
			'label' => 'Featured item text color',
			'name' => 'featured_text_color',
			'type' => 'color_picker',
			'parent' => $key,
			'instructions' => 'The color of the text inside each featured item box',
			'required' => 0,
			'conditional_logic' => 0,
			'default_value' => '',
		),
	));
}

// Featured items background color 
function gs_add_custom_color_field_featured_background_color( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . '33N2as2UtVkHw6t',
			'label' => 'Featured item background color',
			'name' => 'featured_background_color',
			'type' => 'color_picker',
			'parent' => $key,
			'instructions' => 'The color of the background inside each featured item box',
			'required' => 0,
			'conditional_logic' => 0,
			'default_value' => '',
		),
	));
}

// Featured items background color 
function gs_add_custom_color_field_featured_link_color( $key, $prefix ) {
	acf_add_local_field( array(
		array(
			'key' => $prefix . 'xUpyD6hGqW9284f',
			'label' => 'Featured item link color',
			'name' => 'featured_link_color',
			'type' => 'color_picker',
			'parent' => $key,
			'instructions' => 'The color of any links inside the featured items',
			'required' => 0,
			'conditional_logic' => 0,
			'default_value' => '',
		),
	));
}