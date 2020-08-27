<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarbminLab_Theme
 */

?>

<div class="front-page__container">
  <div class="visually-hidden">
    <?php the_title(); ?>
  </div>
  <?php
  the_content();
  ?>
</div>