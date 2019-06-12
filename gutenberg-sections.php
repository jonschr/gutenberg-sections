<?php
/*
    Plugin Name: Gutenberg Sections
    Plugin URI: https://elod.in
    GitHub Plugin URI: https://github.com/jonschr/gutenberg-sections
    Description: Preset layouts for Gutenberg, using ACF for rendering
    Version: 0.10.7
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
define ( 'GUTENBERG_SECTIONS_VERSION', '0.10.5' );

/**
 * Add a notification if ACF isn't installed and active
 */
add_action( 'admin_notices', 'gutenberg_sections_error_notice_ACF' );
function gutenberg_sections_error_notice_ACF() {

    if( !class_exists( 'acf' ) ) {
        echo '<div class="error notice"><p>Please install and activate the <a target="_blank" href="https://www.advancedcustomfields.com/pro/">Advanced Custom Fields Pro</a> plugin. Without it, the Gutenberg Sections plugin won\'t work properly.</p></div>';
    }
    //* Testing to see whether we have the Pro version of ACF installed
    if( class_exists( 'acf' ) && !class_exists( 'acf_pro_updates' ) ) {
        echo '<div class="error notice"><p>It looks like you\'ve installed the free version of Advanced Custom Fields. To work properly, the Gutenberg Sections plugin requires <a target="_blank" href="https://www.advancedcustomfields.com/pro/">the Pro version</a> instead.</p></div>';
    }
}

//* Bail completely if ACF isn't loaded
if( class_exists('ACF') && class_exists( 'acf_pro_updates' ) ) :

    /**
     * Temporary fix to Gutenberg bug
     * https://github.com/WordPress/gutenberg/issues/12530
     */
    remove_filter( 'the_content', 'wpautop' );
    add_filter( 'the_content', function ($content) {
        
        // bail if this has blocks
        if (has_blocks() )
            return $content;
        
        // apply the filter if it doesn't have blocks
        return wpautop($content);
    });

    //////////////////////
    // COMMON FUNCTIONS //
    //////////////////////

    // Needed to work properly
    function section_alignment_setup() {
        add_theme_support( 'align-wide' );
    }
    add_action( 'after_setup_theme', 'section_alignment_setup' );

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
    require_once( 'field-registration/default_groups/default_content_above_below.php' );
    require_once( 'field-registration/default_groups/default_alignment.php' );
    require_once( 'field-registration/default_groups/default_layout.php' );
    require_once( 'field-registration/default_groups/default_color.php' );
    require_once( 'field-registration/default_groups/default_video.php' );
    require_once( 'field-registration/default_groups/default_id.php' );

    // Register the fields and set up the acf blocks
    require_once( 'field-registration/fullwidth.php' );
    require_once( 'field-registration/slider.php' );
    require_once( 'field-registration/twocolumn.php' );
    require_once( 'field-registration/checkerboard.php' );
    require_once( 'field-registration/featureditems.php' );
    require_once( 'field-registration/masonrygallery.php' );

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

        // Slick
        wp_register_script( 'gs-slick-main-script', plugin_dir_url( __FILE__ ) . 'slick/slick.min.js', array( 'jquery' ), GUTENBERG_SECTIONS_VERSION, true );
        wp_register_style( 'gs-slick-main-style', plugin_dir_url( __FILE__ ) . 'slick/slick.css', array(), GUTENBERG_SECTIONS_VERSION, 'screen' );
        wp_register_style( 'gs-slick-main-theme', plugin_dir_url( __FILE__ ) . 'slick/slick-theme.css', array( 'gs-slick-main-style' ), GUTENBERG_SECTIONS_VERSION, 'screen' );

    }

    /**
     * Backend styles and scripts
     */
    add_action( 'enqueue_block_editor_assets', 'gs_enqueue_backend' );
    function gs_enqueue_backend() {

        // Plugin styles
        wp_enqueue_style( 'gs-section-defaults', plugin_dir_url( __FILE__ ) . 'css/editor-style.css', array(), GUTENBERG_SECTIONS_VERSION, 'screen' );

        // Slick
        wp_enqueue_script( 'gs-slick-main-script', plugin_dir_url( __FILE__ ) . 'slick/slick.min.js', array( 'jquery' ), GUTENBERG_SECTIONS_VERSION );
        wp_enqueue_style( 'gs-slick-main-style', plugin_dir_url( __FILE__ ) . 'slick/slick.css', array(), GUTENBERG_SECTIONS_VERSION, 'screen' );
        wp_enqueue_style( 'gs-slick-main-theme', plugin_dir_url( __FILE__ ) . 'slick/slick-theme.css', array( 'gs-slick-main-style' ), GUTENBERG_SECTIONS_VERSION, 'screen' );

    }

    /**
     * Required scripts needed on both frontend and backend
     */
    add_action( 'enqueue_block_assets', 'gs_enqueue_required' );
    function gs_enqueue_required() {
        
    
    }

endif; // the class check to make sure ACF exists