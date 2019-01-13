<?php
/**
 * Block Name: Checkerboard
 *
 * This is the template that displays the fullwidth block.
 */

//////////
// VARS //
//////////

// Alignment
$alignmentclass = get_field( 'alignment' );

// create id attribute for specific styling
$id = 'checkerboard-' . $block['id'];

// Common classes
$classes = gs_common_classes( $block );
$classes = 'checkerboard ' . $classes;
$classes = $alignmentclass . ' ' . $classes;

// Section vars
$content = get_field( 'content' );
$image = get_field( 'image' );

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
	echo '<div class="checkerboard-wrap">';
		printf( '<div class="checkerboard-content column"><div class="checkerboard-content-wrap">%s</div></div>', $content );
		printf( '<div class="checkerboard-image column" style="background-image:url(%s);"></div>', $image );
	echo '</div>';

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
