<?php

/**
 *
 * Template Name: Full Width
 * Template Post Type: post, page, product
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarbminLab_Theme
 */

get_header();
?>

<main class="site-main__full-width">

  <?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');


	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();