<?php

/**
 * 
 * Template Name: Front Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarbminLab_Theme
 */

get_header();
?>

<?php
while (have_posts()) :
  the_post();

  get_template_part('template-parts/content', 'coming-soon');

endwhile; // End of the loop.
?>

<?php
get_footer();