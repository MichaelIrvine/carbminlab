<?php

/**
 * Footer Row 1 widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarbminLab_Theme
 */

if (!is_active_sidebar('footer_row-1')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
  <?php dynamic_sidebar('footer_row-1'); ?>
</aside><!-- #secondary -->