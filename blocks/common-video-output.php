<?php

function gs_output_background_video( $block ) {
	
	// get fields
	$video_url = get_field( 'video_url' );
	$video_mp4 = get_field( 'video_mp4' );
	$video_webm = get_field( 'video_webm' );
	$image_fallback = get_field( 'image_fallback' );

	// Output the video background
	if ( $video_url || $video_mp4 || $video_webm ) {

		// The video itself
		printf( '<video class="background_video_the_video" autoplay muted loop playsinline poster="%s" preload="auto" class="video-playing">', $image_fallback );

	        if ( $video_url )
	            printf( '<source src="%s" type="video/mp4">', $video_url );

			if ( $video_mp4 && !$video_url )
				printf( '<source src="%s" type="video/mp4">', $video_mp4 );

			if ( $video_webm && !$video_url )
				printf( '<source src="%s" type="video/webm">', $video_webm );
		
		echo '</video>';

		// The color overlay
		echo '<div class="color-overlay"></div>';
	}
}