<?php

/**
 * Template Name: News Article
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CarbminLab_Theme
 */

get_header();
?>

<main id="primary" class="site-main single-news-page">
  <aside>
    <h4>More To Read</h4>
    <?php
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous Article:', 'carbminlab-theme') . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__('Next Article:', 'carbminlab-theme') . '</span> <span class="nav-title">%title</span>',
			)
		);
		?>
  </aside>
  <section>
    <?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());

		endwhile;
		?>
  </section>

</main>

<?php
get_footer();