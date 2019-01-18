<?php

function gs_common_classes( $block ) {

	////////////
	// SET UP //
	////////////

	if ( !$classes )
		$classes = array();

	array_push( $classes, 'gutenberg-section' );

	//////////////////////
	// ADVANCED CLASSES //
	//////////////////////

	$advanced_classes = $block['className'];
	if ( $advanced_classes )
		array_push( $classes, $advanced_classes );

	///////////////
	// ALIGNMENT //
	///////////////

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
	array_push( $classes, $align_class );

	$container_align_class = get_field( 'float_content' );
	if ( $container_align_class )
		array_push( $classes, $container_align_class );


	/////////////////
	// FULL HEIGHT //
	/////////////////

	$fullheight = get_field( 'fullheight' );
	if ( $fullheight == 1 )
		array_push( $classes, 'full-height' );

	//////////////////////
	// FIXED BACKGROUND //
	//////////////////////

	$fixed_position_background = get_field( 'fixed_position_background' );
	if ( $fixed_position_background == 1 )
		array_push( $classes, 'fixed-position-background' );

	//////////////////////
	// BACKGROUND IMAGE //
	//////////////////////

	$background_image = get_field( 'background_image' );
	
	if ( $background_image )
		array_push( $classes, 'has-background-image' );

	//////////////////////
	// BACKGROUND VIDEO //
	//////////////////////

	$video_url = get_field( 'video_url' );
	$video_mp4 = get_field( 'video_mp4' );
	$video_webm = get_field( 'video_webm' );
	$image_fallback = get_field( 'image_fallback' );

	if ( $video_url || $video_mp4 || $video_webm )
		array_push( $classes, 'video' );

	////////////////////////
	// RETURN THE CLASSES //
	////////////////////////

	return implode( $classes, ' ' );
}