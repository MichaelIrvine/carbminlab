<?php

/**
 * Footer Row 2 widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarbminLab_Theme
 */

if (!is_active_sidebar('footer_sub-menu')) {
  return;
}
?>

<div id="footer-widget-area__sub-menu" class="footer-widget-area__sub-menu">
  <?php dynamic_sidebar('footer_sub-menu'); ?>
</div>