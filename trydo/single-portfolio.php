<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trydo
 */
get_header();
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content-portfolio' );

endwhile; // End of the loop.
get_footer();
