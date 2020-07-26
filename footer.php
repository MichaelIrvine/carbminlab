<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarbminLab_Theme
 */

?>

<footer id="footer" class="footer__wrapper">
  <div class="footer__row-1">
    <?php
    require get_template_directory() . '/footer-col-1.php';
    require get_template_directory() . '/footer-col-2.php';
    require get_template_directory() . '/footer-col-3.php';
    ?>
  </div>
  <div class="footer__row-2">
    <?php
    require get_template_directory() . '/footer-sub-menu.php';
    ?>
  </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>