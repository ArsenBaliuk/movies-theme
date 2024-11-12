<?php
/**
 * Template Name: Main page
 */
?>
<?php get_header(); ?>

<?php if( have_rows( 'main_sections' ) ):
    while ( have_rows( 'main_sections' ) ) : the_row();

        if( get_row_layout() == 'content_side_image' ):
            get_template_part( '/parts/content_side_image' );

        elseif ( get_row_layout() == 'movies_with_filters' ):
            get_template_part( '/parts/movies_with_filters' );

        endif;
    endwhile;
endif;
?>



<?php get_footer(); ?>