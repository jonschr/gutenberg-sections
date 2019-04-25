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

// Common classes
$classes = gs_common_classes( $block );
$classes = 'twocolumn ' . $classes . ' ' . $horizontal_alignment . ' ' . $vertical_alignment;

////////////
// MARKUP //
////////////

// Section wrapper
printf( '<section id="%s" class="%s">', $id, $classes );

	// Output the anchor link
	$anchor_id = get_field( 'section_id' );
	if ( $anchor_id ) {
		printf( '<div class="hidden-anchor" id="%s"></div>', $anchor_id );
	}

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
