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
<div class="front-page-hero__container">
  <div class="front-page-hero__image" style="background-image: url(<?php echo the_field('front_page_hero_image') ?>)">
  </div>
  <div class="front-page-hero__overlay" style="background-color: <?php echo the_field('front_page_hero_overlay_color') ?>; 
			 				opacity: <?php echo the_field('front_page_hero_overlay_opacity'); ?>"></div>

  <div class="front-page-hero__inner-container">
    <div class="front-page-hero__column-one">
      <?php
      $icon = get_field('front_page_hero_logo');

      if (!empty($icon)) : ?>
      <img src="<?php echo esc_url($icon['url']); ?>" class="front-page-hero__logo"
        alt="<?php echo esc_attr($icon['alt']); ?>" />
      <?php endif; ?>

      <?php
      if (!empty(the_field('front_page_hero_title'))) :
        echo the_field('front_page_hero_title');
      endif; ?>

    </div>
    <div class="front-page-hero__column-two">
    </div>
  </div>

</div>

<main id="primary" class="site-main">

  <?php
  while (have_posts()) :
    the_post();

    get_template_part('template-parts/content', 'front-page');

  endwhile; // End of the loop.
  ?>

</main><!-- #main -->

<?php

get_footer();