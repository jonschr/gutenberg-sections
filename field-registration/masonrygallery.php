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
            'name'              => 'masonrygallery',
            'title'             => __( 'Masonry Gallery' ),
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
	 * Register the Masonry Gallery section
	 */
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => $key,
			'title' => 'Block: Masonry Gallery',
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
add_action( 'masonrygallery_add_sections', 'gs_add_custom_content_masonrygallery_heading', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_content_above_and_below', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_content_content_above', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_default_content_content_below', 10, 2 );

// Masonry gallery options & content
add_action( 'masonrygallery_add_sections', 'gs_add_custom_content_masonrygallery_options_heading', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_custom_content_masonrygallery_number_of_columns', 10, 2 );
add_action( 'masonrygallery_add_sections', 'gs_add_custom_content_masonrygallery_content_items', 10, 2 );

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

////////////////////////////
// MASONRY GALLERY FIELDS //
////////////////////////////

function gs_add_custom_content_masonrygallery_heading( $key, $prefix ) {

	// Content fields
	acf_add_local_field(array(
		array(
			'key' => $prefix . '9xpwp32bZ8bcLEe4',
			'label' => 'Content above and below the gallery',
			'name' => '',
			'type' => 'accordion',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
	));

}

function gs_add_custom_content_masonrygallery_options_heading( $key, $prefix ) {

	// Content fields
	acf_add_local_field(array(
		array(
			'key' => $prefix . 'k8WH7qa6F94tzdKH',
			'label' => 'Gallery options and slides',
			'name' => '',
			'type' => 'accordion',
			'parent' => $key,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
	));

}

function gs_add_custom_content_masonrygallery_number_of_columns( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . '8QvQ2zi2c9VmB3UN',
			'label' => 'Number of gallery columns',
			'name' => 'columns',
			'type' => 'range',
            'parent' => $key,
            'min' => '1',
            'max' => '12',
            'step' => '1',
			'default_value' => '6',
			'instructions' => 'Number of rows is based on the sizing and number of items.',
			'wrapper' => array(
				'width' => '50',
			),
		),
	));
}

function gs_add_custom_content_masonrygallery_space_between_columns( $key, $prefix ) {
	acf_add_local_field(array(
		array(
			'key' => $prefix . '9D2fRK727YHQycAL',
			'label' => 'Space between slides',
			'name' => 'columns',
			'type' => 'range',
            'parent' => $key,
            'min' => '0',
            'max' => '50',
            'step' => '1',
			'default_value' => '0',
			'wrapper' => array(
				'width' => '50',
			),
		),
	));
}

function gs_add_custom_content_masonrygallery_content_items( $key, $prefix ) {
	acf_add_local_field(array(
		array(
            'key' => $prefix . 'wEttWgK7Z9JxT762',
            'label' => 'Gallery item',
            'name' => 'galleryitem',
            'type' => 'repeater',
            'instructions' => '',
            'collapsed' => '',
            'parent' => $key,
            'min' => 3,
            'max' => 0,
            'layout' => 'block',
            'button_label' => 'Add gallery item',
            'sub_fields' => array(
				array(
					'key' => $prefix . 'J4Z46gmb9W6VbFXY',
					'parent' => $prefix . 'wEttWgK7Z9JxT762',
					'label' => 'Desktop width',
					'name' => 'width_desktop',
					'type' => 'number',
					'parent' => $key,
					'default_value' => '',
					'placeholder' => '# of columns',
					'ui' => 1,
					'wrapper' => array(
                        'width' => '25',
                    ),
				),
				array(
					'key' => $prefix . 'J4Z46gmb9W6VbFXY',
					'parent' => $prefix . 'wEttWgK7Z9JxT762',
					'label' => 'Desktop height',
					'name' => 'height_desktop',
					'type' => 'number',
					'parent' => $key,
					'default_value' => '',
					'placeholder' => '# of rows',
					'ui' => 1,
					'wrapper' => array(
                        'width' => '25',
                    ),
				),
				array(
					'key' => $prefix . 'J4Z46gmb9W6VbFXY',
					'parent' => $prefix . 'wEttWgK7Z9JxT762',
					'label' => 'Tablet width',
					'name' => 'width_tablet',
					'type' => 'number',
					'parent' => $key,
					'default_value' => '',
					'placeholder' => '# of columns',
					'ui' => 1,
					'wrapper' => array(
                        'width' => '25',
                    ),
				),
				array(
					'key' => $prefix . 'J4Z46gmb9W6VbFXY',
					'parent' => $prefix . 'wEttWgK7Z9JxT762',
					'label' => 'Tablet height',
					'name' => 'height_tablet',
					'type' => 'number',
					'parent' => $key,
					'default_value' => '',
					'placeholder' => '# of rows',
					'ui' => 1,
					'wrapper' => array(
                        'width' => '25',
                    ),
				),
				array(
                    'key' => $prefix . 'TtYGY87E39usLe4o',
                    'parent' => $prefix . 'wEttWgK7Z9JxT762',
					'label' => 'Background image',
					'name' => 'background_image',
					'type' => 'image',
					'parent' => $key,
					'instructions' => 'An optional background image',
					'required' => 0,
					'conditional_logic' => 0,
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'mime_types' => 'jpg',
					'wrapper' => array(
                        'width' => '25',
                    ),
				),
				array(
					'key' => $prefix . 'Jy2dx2i89szZ4TXG',
					'parent' => $prefix . 'wEttWgK7Z9JxT762',
					'label' => 'Background color',
					'name' => 'background_color',
					'type' => 'color_picker',
					'parent' => $key,
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'default_value' => '',
					'wrapper' => array(
						'width' => '25',
					),
				),
				array(
                    'key' => $prefix . 'KBnKU8962rX7smj',
                    'parent' => $prefix . 'wEttWgK7Z9JxT762',
                    'label' => 'Gallery Item Content',
                    'name' => 'content',
                    'type' => 'wysiwyg',
                    'instructions' => 'If you use headings in this area, you\'ll want to start with a heading level three.',
					'media_upload' => 1,
                    'delay' => 0,
                    'wrapper' => array(
                        'width' => '50',
                    ),
				),
            ),
        ),
	));
}