<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CarbminLab_Theme
 */

get_header();
?>

<main id="primary" class="site-main team-member-page">

  <?php
	while (have_posts()) :
		the_post();
	?>

  <div class="team-member__container">
    <div class="team-member_img__container">
      <?php carbminlab_theme_post_thumbnail(); ?>
    </div>
    <div class="team-member_info__container">
      <?php
				the_title('<h1 class="team-member-title">', '</h1>');
				?>
      <h3><?php the_field('team_member_subtitle'); ?></h3>
      <?php
				the_content();
				?>
    </div>
  </div>
  <?php
	endwhile; // End of the loop.
	?>





</main><!-- #main -->

<?php
get_sidebar();
get_footer();