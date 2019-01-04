<?php
/**
 * Block Name: Fullwidth
 *
 * This is the template that displays the fullwidth block.
 */

// get image field (array)
$content = get_field('content');

// create id attribute for specific styling
$id = 'fullwidth-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// create background class
$background_image = get_field( 'background_image' );

if ( $background_image ) {
	$background_class = 'has-background-image';
	$background_image = wp_get_attachment_image_src( $background_image['ID'], 'large' );
	$background_image_url = $background_image[0];
}
?>

<!-- THE MARKUP -->
<section id="<?php echo $id; ?>" class="gutenberg-section fullwidth <?php echo $align_class; ?> <?php echo $background_class; ?>">
	<div class="content-wrap">
		<?php the_field( 'content' ); ?>
	</div>

	<?php
	if ( $background_image_url ) {
		printf( '<div class="background-image" style="background-image:url(%s);"></div>', $background_image_url );
		echo '<div class="color-overlay"></div>';
	}
	?>

</section>

<!-- LIVE UPDATE STYLES -->
<style type="text/css">
    #<?php echo $id; ?> {

    	/* Background color */
		<?php if ( get_field( 'background_color' ) ): ?>        
	        background: <?php the_field( 'background_color' ); ?>;
	    <?php endif; ?>    	

		/* Text color */
		<?php if ( get_field( 'text_color' ) ): ?>        
	        color: <?php the_field( 'text_color' ); ?>;
	    <?php endif; ?>

    }

	/* Top and bottom padding */
	@media( min-width: 768px ) {
		#<?php echo $id; ?> {
	        <?php if ( get_field( 'use_layout_defaults' ) === false ): ?>
		    	padding-top: <?php the_field( 'padding_top' ); ?>px;
		    	padding-bottom: <?php the_field( 'padding_bottom' ); ?>px;
		    <?php endif; ?>
		}
	}

    #<?php echo $id; ?> h1,
    #<?php echo $id; ?> h2,
    #<?php echo $id; ?> h3,
    #<?php echo $id; ?> h4,
    #<?php echo $id; ?> p,
    #<?php echo $id; ?> li {
    	color: <?php the_field( 'text_color' ); ?>;
    }

    /* Color overlay  */
    <?php if ( get_field( 'background_color') ): ?>
		#<?php echo $id; ?> .color-overlay {
			background-color: <?php the_field( 'background_color'); ?>;
	    }
    <?php endif; ?>

	/* Color overlay opacity */
    <?php if ( get_field( 'background_color_opacity') ): ?>
		#<?php echo $id; ?> .color-overlay {
			<?php $opacity = (int)get_field( 'background_color_opacity') / 100; ?>
			opacity: <?php echo $opacity; ?>;
	    }
    <?php endif; ?>

	/* Max content width */
	@media( min-width: 768px ) {
		<?php if ( get_field( 'use_layout_defaults' ) === false ): ?>
		    #<?php echo $id; ?> .content-wrap {
		    	max-width: <?php the_field( 'content_width' ); ?>px;
		    }
		<?php endif; ?>
    }

	/* Smart center align */
    <?php if ( get_field( 'smart_center_align' ) === true ): ?>
		@media( min-width: 767px ) {
	    	#<?php echo $id; ?> {
					text-align: center;
	    	}
		}
	<?php endif; ?>
</style>