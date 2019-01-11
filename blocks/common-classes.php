<?php

function gs_common_classes( $block ) {

	if ( !$classes )
		$classes = array();

	array_push( $classes, 'gutenberg-section' );

	// create the advanced class
	$advanced_classes = $block['className'];
	if ( $advanced_classes )
		array_push( $classes, $advanced_classes );

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
	array_push( $classes, $align_class );

	// full-height
	$fullheight = get_field( 'fullheight' );
	if ( $fullheight == 1 )
		array_push( $classes, 'full-height' );

	// fixed background
	$fixed_position_background = get_field( 'fixed_position_background' );
	if ( $fixed_position_background == 1 )
		array_push( $classes, 'fixed-position-background' );

	// create background class
	$background_image = get_field( 'background_image' );
	
	if ( $background_image )
		array_push( $classes, 'has-background-image' );

	return implode( $classes, ' ' );
}