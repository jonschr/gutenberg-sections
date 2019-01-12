<?php
/**
 * Block Name: Checkerboard
 *
 * This is the template that displays the checkerboard block.
 */

//////////
// VARS //
//////////

$content = get_field('content');

// create id attribute for specific styling
$id = 'checkerboard-' . $block['id'];

// create background class
$background_image = get_field( 'background_image' );

if ( $background_image ) {
	$background_image = wp_get_attachment_image_src( $background_image['ID'], 'section-background' );
	$background_image_url = $background_image[0];
}

// Common classes
$classes = gs_common_classes( $block );
$classes = 'checkerboard ' . $classes;

////////////
// MARKUP //
////////////

// // for testing (output all vars)
// echo '<pre style="font-size: 12px;">';
// print_r( $block );
// echo '</pre>';

// Section wrapper
printf( '<section id="%s" class="%s">', $id, $classes );

	// Content area
	printf( '<div class="content-wrap">%s</div>', $content );

	// Background div
	if ( $background_image ) {
		echo '<div class="background-image"></div>';
		echo '<div class="color-overlay"></div>';
	}

echo '</section>';

////////////
// STYLES //
////////////

// Echoes the common styels
gs_common_styles( $id );

// echo '<style>';
	// output section-specific styles
// echo '</style>';
