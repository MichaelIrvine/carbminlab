<?php

/**
 * Template part for displaying Coming Soon Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarbminLab_Theme
 */

?>

<?php

$heroLogo = get_field('hero_logo');

?>

<div class="full-screen-hero__image" style="background-image: url(<?php echo the_field('full_hero') ?>)"></div>
<div class="full-screen-hero__overlay"></div>

<div class="full-screen-hero__inner-container">
  <div class="hero-logo__container">
    <img class="carbmin-logo" src="<?php echo esc_url($heroLogo['url']); ?>"
      alt="<?php echo esc_attr($heroLogo['alt']); ?>" />
  </div>
  <div class="hero-column-container">

    <div class="hero-column-one">
      <?php echo the_field('column_1'); ?>
    </div>
    <div class="hero-column-two">
      <?php echo the_field('column_2'); ?>
    </div>
  </div>
</div>