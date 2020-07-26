<?php

/**
 * Footer Row 1 widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarbminLab_Theme
 */

if (!is_active_sidebar('footer_column-1')) {
  return;
}
?>

<div id="footer-widget-area__col-1" class="footer-widget-area">
  <?php dynamic_sidebar('footer_column-1'); ?>
</div>