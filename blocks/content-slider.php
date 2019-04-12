<?php
/**
 * Block Name: Slider
 *
 * This is the template that displays the slider block.
 */

//////////
// VARS //
//////////

// create id attribute for specific styling
$id = 'slider-' . $block['id'];

// Common classes
$classes = gs_common_classes( $block );
$classes = 'slider ' . $classes;
$classes = $id . ' ' . $classes;

////////////
// MARKUP //
////////////

// // for testing (output all vars)
// echo '<pre style="font-size: 12px;">';
// print_r( $block );
// echo '</pre>';

// Do the scripts if we have any slides (needs to be done outside the slide markup)
if ( have_rows( 'slides' ) ) {
    
    wp_enqueue_script( 'gs-slick-main-script');
    wp_enqueue_style( 'gs-slick-main-style');
    wp_enqueue_style( 'gs-slick-main-theme');
    
    ?>
        <script>
            jQuery(document).ready(function( $ ) {
	
                $('.<?php echo $id; ?> .slider-wrap').slick({
                    dots: false,
                    infinite: true,
                    speed: 1000,
                    arrows: false,
                    fade: true,
                    cssEase: 'linear',
                });
                
            });       
        </script>
    <?php
}

// Section wrapper
printf( '<section id="%s" class="%s">', $id, $classes );

    echo '<div class="slider-wrap">';

    if( have_rows('slides') ):

        // loop through the rows of data
        while ( have_rows('slides') ) : the_row();

            // display a sub field value
            echo '<div class="slide">';
                echo '<div class="content-wrap-outer">'; 
                    echo '<div class="content-wrap">';

                        $content = get_sub_field( 'content' );
                        $background = get_sub_field('image');

                        if ( $content ) {
                            echo $content;
                        }       

                    echo '</div>'; // .content-wrap
                echo '</div>'; // .content-wrap-outer

                if ( $background ) {
                        
                    // // testing
                    // echo '<pre>';
                    // print_r( $background );
                    // echo '</pre>';

                    printf( '<div class="slide-background-image" style="background-image:url(%s);""></div>', $background['sizes']['section-background'] );
                }

                // output the image itself
                echo '<div class="slide-color-overlay"></div>';

            echo '</div>'; // .slide

        endwhile;

    else :

        // no rows found

    endif;

    echo '</div>'; // .slider

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
