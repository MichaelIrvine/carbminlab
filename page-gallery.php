<?php

/**
 * The template for displaying all pages
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


<div
  class="half-screen-hero__container <?php if (!empty(the_field('hst-hero-image'))) : ?>half-screen-hero__container--no-image<?php endif; ?>">
  <div class="half-screen-hero__image" style="background-image: url(<?php echo the_field('hst-hero-image') ?>)"></div>
  <div class="half-screen-hero__overlay" style="background-color: <?php echo the_field('hst_hero_overlay_color') ?>; 
								opacity: <?php echo the_field('hst_hero_overlay_opacity'); ?>"></div>
  <div class="half-screen-hero__inner-container">
    <div class="half-screen-hero__column-one">
      <h1 class="<?php if (!empty(get_field('hst-hero-image'))) : ?>light-color<?php endif; ?>">
        <?php echo the_title(); ?>
      </h1>
    </div>
  </div>
</div>
<main id="primary" class="site-main gallery-page default-page-template">

  <?php
  while (have_posts()) :
    the_post();

    the_content();

  endwhile; // End of the loop.
  ?>

  <?php
  $images = get_field('gallery');

  if ($images) : ?>
  <div class="swiper-container">
    <div class="swiper-wrapper">

      <?php foreach ($images as $image) : ?>

      <div class="swiper-slide">
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <p><?php echo esc_html($image['caption']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <!-- Swiper Navigation -->
    <div class="swiper-button-next">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 668">
        <path
          d="M363 364L71 656c-17 16-43 16-59 0s-16-42 0-59l263-263L12 71C-4 55-4 28 12 12s42-16 59 0l292 293c16 16 16 42 0 59z"
          fill="#ffffff" />
      </svg>
    </div>
    <div class="swiper-button-prev">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 668">
        <path
          d="M12 304L304 12c17-16 43-16 59 0s16 42 0 59L100 334l263 263c16 16 16 43 0 59s-42 16-59 0L12 363c-16-16-16-42 0-59z"
          fill="#ffffff" />
      </svg>
    </div>

  </div>

  <?php endif; ?>
</main>

<?php
get_footer();