<?php
/*
    Plugin Name: Gutenberg Sections
    Plugin URI: https://elod.in
    GitHub Plugin URI: https://github.com/jonschr/gutenberg-sections
    Description: Preset layouts for Gutenberg, using ACF for rendering
    Version: 0.7
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

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

// Plugin directory
define( 'GUTENBERG_SECTIONS', dirname( __FILE__ ) );

// Define the version of the plugin
define ( 'GUTENBERG_SECTIONS_VERSION', '0.7' );

//////////////////////
// COMMON FUNCTIONS //
//////////////////////

// Fields which may be used in multiple blocks
require_once( 'blocks/common-styles.php' );
require_once( 'blocks/common-classes.php' );
require_once( 'blocks/common-video-output.php' );
require_once( 'blocks/common-background-image-output.php' );

// Customize the ACF colorpicker to use the built-in WordPress colors
require_once( 'inc/acf-color-picker-customization.php' );

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
require_once( 'field-registration/default_groups/default_video.php' );

// Register the fields and set up the acf blocks
require_once( 'field-registration/fullwidth.php' );
// require_once( 'field-registration/video.php' );
require_once( 'field-registration/twocolumn.php' );
require_once( 'field-registration/checkerboard.php' );

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

/////////////////////
// BLOCK RENDERING //
/////////////////////

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