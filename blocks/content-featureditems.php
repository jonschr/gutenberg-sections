<?php
/**
 * Block Name: Featured Items
 *
 * This is the template that displays the two column block.
 */

//////////
// VARS //
//////////

$content_above = get_field('content_above');
$content_below = get_field('content_below');
$orphan_alignment = get_field('orphan_alignment');

// create id attribute for specific styling
$id = 'featureditems-' . $block['id'];

// Common classes
$classes = gs_common_classes( $block );
$classes = 'featureditems ' . $classes . ' ' . $orphan_alignment;

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

        echo '<div class="featured-items-wrap">';
        
            // check if the repeater field has rows of data
            if( have_rows('featureditem') ):

                // loop through the rows of data
                while ( have_rows('featureditem') ) : the_row();

                    // display a sub field value
                    echo '<div class="item">';

                        if ( get_sub_field('link') )
                            printf( '<a href="%s">', get_sub_field('link') );
                        
                            the_sub_field('content');

                        if ( get_sub_field('link') )
                            echo '</a>';

                    echo '</div>';

                endwhile;

            else :

                // no rows found

            endif;

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
?>

<style>
    <?php if ( get_field( 'columns' ) != '' ): ?>
        @media( min-width: 768px ) {
            #<?php echo $id; ?> .featured-items-wrap .item {
                width: calc( 100% / <?php the_field('columns'); ?> - 30px );
            }
        }
    <?php endif; ?>

    <?php if ( get_field( 'featured_text_color' ) != '' ): ?>
        #<?php echo $id; ?> .featured-items-wrap .item > a,
        #<?php echo $id; ?> .featured-items-wrap .item h3,
        #<?php echo $id; ?> .featured-items-wrap .item p,
        #<?php echo $id; ?> .featured-items-wrap .item li {
            color: <?php the_field('featured_text_color'); ?>;
        }
    <?php endif; ?>

    <?php if ( get_field( 'featured_background_color' ) != '' ): ?>
        #<?php echo $id; ?> .featured-items-wrap .item {
            background-color: <?php the_field('featured_background_color'); ?>;
        }
    <?php endif; ?>

    <?php if ( get_field( 'featured_link_color' ) != '' ): ?>
        #<?php echo $id; ?> .featured-items-wrap .item a:not(.button) {
            color: <?php the_field('featured_link_color'); ?>;
        }
    <?php endif; ?>
</style>
