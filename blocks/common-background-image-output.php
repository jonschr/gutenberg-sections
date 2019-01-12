<?php 

function gs_output_background_image( $block ) {

	// check if there's a background image
	$background_image = get_field( 'background_image' );

	// bail if there's no background image
	if ( !$background_image )
		return;

	$background_image = wp_get_attachment_image_src( $background_image['ID'], 'section-background' );
	$background_image_url = $background_image[0];

	// output the image itself
	echo '<div class="background-image"></div>';
	echo '<div class="color-overlay"></div>';
}