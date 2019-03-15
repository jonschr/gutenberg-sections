<?php
/**
 * Block Name: Fullwidth
 *
 * This is the template that displays the fullwidth block.
 */

//////////
// VARS //
//////////

$content = get_field('content');

// create id attribute for specific styling
$id = 'masonrygallery-' . $block['id'];

// Common classes
$classes = gs_common_classes( $block );
$classes = 'masonrygallery ' . $classes;

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
	printf( '<div class="content-wrap-outer"><div class="content-wrap">%s</div></div>', $content );

	// Output background image if there's one
	gs_output_background_image( $block );

	// Output background video if there's one
	gs_output_background_video( $block );

echo '</section>';

////////////
// STYLES //
////////////

// Echoes the common styels
gs_common_styles( $id );

// echo '<style>';
	// output section-specific styles
// echo '</style>';
