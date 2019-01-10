<?php

function gs_common_classes( $block ) {

	if ( !$classes )
		$classes = array();

	array_push( $classes, 'gutenberg-section' );

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
	array_push( $classes, $align_class );

	// create background class
	$background_image = get_field( 'background_image' );
	
	if ( $background_image )
		array_push( $classes, 'has-background-image' );

	return implode( $classes, ' ' );
}