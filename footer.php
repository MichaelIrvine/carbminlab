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
  <?php
  require get_template_directory() . '/footer-row-1.php';
  require get_template_directory() . '/footer-row-2.php';
  ?>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>