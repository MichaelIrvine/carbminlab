<?php

/**
 * Footer Row 2 widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarbminLab_Theme
 */

if (!is_active_sidebar('footer_row-2')) {
  return;
}
?>

<aside id="secondary" class="widget-area">
  <?php dynamic_sidebar('footer_row-2'); ?>
</aside><!-- #secondary -->