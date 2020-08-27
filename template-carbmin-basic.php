<?php

/**
 * Template Name: CarbMin Lab Basic
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarbminLab_Theme
 */

get_header();
?>

<div class="page-title__container">
  <div class="page-title__inner-container">
    <div class="page-title__column-one">
      <h1>
        <?php echo the_title(); ?>
      </h1>
    </div>
  </div>
</div>
<main id="primary" class="site-main template__hero-sidebar">

  <?php
  while (have_posts()) : ?>
  <?php the_post();
    the_content();
  endwhile;
  ?>
</main>
<?php
get_footer();