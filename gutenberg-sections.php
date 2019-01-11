<?php
/*
	Plugin Name: Gutenberg Sections
	Plugin URI: https://elod.in
    GitHub Plugin URI: https://github.com/jonschr/gutenberg-plates
    Description: Preset layouts for Gutenberg, using ACF for rendering
	Version: 0.4
    Author: Jon Schroeder
    Author URI: https://elod.in

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
*/


/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

// Plugin directory
define( 'GUTENBERG_SECTIONS', dirname( __FILE__ ) );

// Define the version of the plugin
define ( 'GUTENBERG_SECTIONS_VERSION', '0.4' );

/////////////////
// IMAGE SIZES //
/////////////////

// Add an image size for the editor
add_image_size( 'editor-thumb-wide', 300, 150, true );

// Add an image size for the frontend
add_image_size( 'section-background', 1800, 1000, true );

////////////////////////
// FIELD REGISTRATION //
////////////////////////

// Set up the default fields
require_once( 'field-registration/default_groups/default_content.php' );
require_once( 'field-registration/default_groups/default_alignment.php' );
require_once( 'field-registration/default_groups/default_layout.php' );
require_once( 'field-registration/default_groups/default_color.php' );

// Register the fields
require_once( 'field-registration/fullwidth.php' );
require_once( 'field-registration/video.php' );
require_once( 'field-registration/twocolumn.php' );

/////////////////////////////
// REGISTER BLOCK CATEGORY //
/////////////////////////////

add_filter( 'block_categories', 'gs_add_block_category', 10, 2);
function gs_add_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'sections',
                'title' => __( 'Sections', 'gutenberg-sections' ),
            ),
        )
    );
}

//////////////////
// BLOCKS SETUP //
//////////////////

require_once( 'blocks/common-styles.php' );
require_once( 'blocks/common-classes.php' );

add_action('acf/init', 'init_blocks');
function init_blocks() {
    
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

    // register a video block
    acf_register_block(
        array(
            'name'              => 'video',
            'title'             => __( 'Background Video' ),
            'description'       => __( 'A fullwidth wrapper with background video support.' ),
            'render_callback'   => 'gs_render',
            'category'          => 'sections',
            'icon'              => 'tagcloud',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( 'video', 'fullwidth video', 'background video', 'wrapper' ),
            'supports'          => array(
                'align' =>  array( 'full', 'wide' ),
            ),
        )
    );

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

/**
 * Render the block
 * This is a global function, which should handle rendering for all blocks
 */
function gs_render( $block ) {
  
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if( file_exists( plugin_dir_path( __FILE__ ) . "blocks/content-{$slug}.php" ) ) {
        include( plugin_dir_path( __FILE__ ) . "blocks/content-{$slug}.php" );
    }
}

////////////////////////
// STYLES AND SCRIPTS //
////////////////////////

/**
 * Frontend styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'gs_enqueue_frontend' );
function gs_enqueue_frontend() {
        
    // Plugin styles
    wp_enqueue_style( 'gs-section-defaults', plugin_dir_url( __FILE__ ) . 'css/section-defaults.css', array(), GUTENBERG_SECTIONS_VERSION, 'screen' );
    
    // Script
    // wp_register_script( 'slick-init', plugin_dir_url( __FILE__ ) . 'js/slick-init.js', array( 'slick-main' ), GUTENBERG_SECTIONS_VERSION, true );
    
}

/**
 * Backend styles and scripts
 */
add_action( 'enqueue_block_editor_assets', 'gs_enqueue_backend' );
function gs_enqueue_backend() {

    // Plugin styles
    wp_enqueue_style( 'gs-section-defaults', plugin_dir_url( __FILE__ ) . 'css/editor-style.css', array(), GUTENBERG_SECTIONS_VERSION, 'screen' );

}

/**
 * Required scripts needed on both frontend and backend
 */
add_action( 'enqueue_block_assets', 'gs_enqueue_required' );
function gs_enqueue_required() {

    // silence is golden...
    // 
}


