<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CarbminLab_Theme
 */

get_header();
?>

<main id="primary" class="site-main not-found-page">

  <section class="error-404 not-found">
    <header class="page-header">
      <h1 class="page-title"><?php esc_html_e('That page can&rsquo;t be found.', 'carbminlab-theme'); ?></h1>
    </header><!-- .page-header -->
    <p>
      <?php esc_html_e('It looks like nothing was found at this location.', 'carbminlab-theme'); ?>
    </p>


  </section>

</main><!-- #main -->

<?php
get_footer();