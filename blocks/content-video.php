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
$id = 'video-' . $block['id'];

//* Get the background image information
$video_url = get_field( 'video_url' );
$video_mp4 = get_field( 'video_mp4' );
$video_webm = get_field( 'video_webm' );
$image_fallback = get_field( 'image_fallback' );

$background_color = get_field( 'background_color' );

// create background class
$background_image = get_field( 'background_image' );

if ( $background_image ) {
	$background_image = wp_get_attachment_image_src( $background_image['ID'], 'section-background' );
	$background_image_url = $background_image[0];
}

// Common classes
$classes = gs_common_classes( $block );
$classes = 'video ' . $classes;

////////////
// MARKUP //
////////////

// Section wrapper
printf( '<section id="%s" class="%s">', $id, $classes );

	// Content area
	printf( '<div class="content-wrap">%s</div>', $content );

	// Background div
	if ( $background_color ) {
		echo '<div class="color-overlay"></div>';
	}

	//* Output the video itself
	printf( '<video class="background_video_the_video" autoplay muted loop playsinline poster="%s" preload="auto" class="video-playing">', $image_fallback );

        if ( $video_url )
            printf( '<source src="%s" type="video/mp4">', $video_url );

		if ( $video_mp4 && !$video_url )
			printf( '<source src="%s" type="video/mp4">', $video_mp4 );

		if ( $video_webm && !$video_url )
			printf( '<source src="%s" type="video/webm">', $video_webm );

	echo '</video>';

echo '</section>';

////////////
// STYLES //
////////////

// Echoes the common styels
gs_common_styles( $id );

echo '<style>';
	// output section-specific styles
echo '</style>';
