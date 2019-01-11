<?php

function gs_common_styles( $id ) {
	?>

	<!-- LIVE UPDATE STYLES -->
	<style type="text/css">
	    #<?php echo $id; ?> {

	    	/* Background color */
			<?php if ( get_field( 'background_color' ) != '' ): ?>        
		        background: <?php the_field( 'background_color' ); ?>;
		    <?php endif; ?>    	

			/* Text color */
			<?php if ( get_field( 'text_color' ) != '' ): ?>        
		        color: <?php the_field( 'text_color' ); ?>;
		    <?php endif; ?>

	    }

		/* Top and bottom padding */
		@media( min-width: 768px ) {
			#<?php echo $id; ?> {

	        	<?php if ( get_field( 'padding_top' ) != '' ): ?>
			    	padding-top: <?php the_field( 'padding_top' ); ?>px;
			    <?php endif; ?>

			    <?php if ( get_field( 'padding_bottom' ) != '' ): ?>
			    	padding-bottom: <?php the_field( 'padding_bottom' ); ?>px;
			    <?php endif; ?>

			}
		}

		/* Top and bottom margins */
		@media( min-width: 768px ) {
			#<?php echo $id; ?> {

	        	<?php if ( get_field( 'margin_before' ) != '' ): ?>
			    	margin-top: <?php the_field( 'margin_before' ); ?>px;
			    <?php endif; ?>

			    <?php if ( get_field( 'margin_after' ) != '' ): ?>
			    	margin-bottom: <?php the_field( 'margin_after' ); ?>px;
			    <?php endif; ?>

			    <?php if ( get_field( 'z_index' ) != '' ): ?>
			    	z-index: <?php the_field( 'z_index' ); ?>;
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

	    /* Background image vars */
	    <?php
		$background_image = get_field( 'background_image' );

		if ( $background_image ) {
			$background_image = wp_get_attachment_image_src( $background_image['ID'], 'section-background' );
			$background_image_url = $background_image[0];
		}
	    ?>

	    <?php if ( $background_image ): ?>
			#<?php echo $id; ?>.has-background-image .background-image {
				background-image: url(<?php echo $background_image_url; ?>);
		    }
	    <?php endif; ?>

	    /* Color overlay  */
	    <?php if ( get_field( 'background_color') != '' ): ?>
			#<?php echo $id; ?> .color-overlay {
				background-color: <?php the_field( 'background_color'); ?>;
		    }
	    <?php endif; ?>

		/* Color overlay opacity */
	    <?php if ( get_field( 'background_color_opacity') != '' ): ?>
			#<?php echo $id; ?> .color-overlay {
				<?php $opacity = (int)get_field( 'background_color_opacity') / 100; ?>
				opacity: <?php echo $opacity; ?>;
		    }
	    <?php endif; ?>

		/* Max content width */
		@media( min-width: 768px ) {
			<?php if ( get_field( 'content_width' ) != '' ): ?>
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

	<?php
}
