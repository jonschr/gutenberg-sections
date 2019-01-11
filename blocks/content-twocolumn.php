<?php
/**
 * Block Name: Two Column
 *
 * This is the template that displays the two column block.
 */

//////////
// VARS //
//////////

$content_above = get_field('content_above');
$content_left = get_field('content_left');
$content_right = get_field('content_right');
$content_below = get_field('content_below');

$horizontal_alignment = get_field( 'horizontal_alignment' );
$vertical_alignment = get_field( 'vertical_alignment' );

// create id attribute for specific styling
$id = 'twocolumn-' . $block['id'];

// create background class
$background_image = get_field( 'background_image' );

if ( $background_image ) {
	$background_image = wp_get_attachment_image_src( $background_image['ID'], 'section-background' );
	$background_image_url = $background_image[0];
}

// Common classes
$classes = gs_common_classes( $block );
$classes = 'twocolumn ' . $classes . ' ' . $horizontal_alignment . ' ' . $vertical_alignment;

////////////
// MARKUP //
////////////

// Section wrapper
printf( '<section id="%s" class="%s">', $id, $classes );

	echo '<div class="content-wrap">';

		if ( $content_above )
			printf( '<div class="content-above">%s</div>', $content_above );

		echo '<div class="two-column-wrap">';

			if ( $content_left )
				printf( '<div class="column content-left">%s</div>', $content_left );

			if ( $content_right )
				printf( '<div class="column content-right">%s</div>', $content_right );

		echo '</div>';

		if ( $content_below )
			printf( '<div class="content-below">%s</div>', $content_below );

	echo '</div>';

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
