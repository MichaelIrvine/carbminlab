<?php

/**
 * Template Name: Hero Sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarbminLab_Theme
 */

get_header();
?>

<div class="half-screen-hero__container">
  <div class="half-screen-hero__image" style="background-image: url(<?php echo the_field('hst-hero-image') ?>)"></div>
  <div class="half-screen-hero__overlay" style="background-color: <?php echo the_field('hst_hero_overlay_color') ?>; 
			 				opacity: <?php echo the_field('hst_hero_overlay_opacity'); ?>"></div>

  <div class="half-screen-hero__inner-container">
    <div class="half-screen-hero__column-one">
      <h1 class="<?php if (!empty(get_field('hst-hero-image'))) : ?>light-color<?php endif; ?>">
        <?php echo the_title(); ?>
        <?php
        if (!empty(the_field('hst_subtitle'))) :
          echo the_field('hst_subtitle');
        endif; ?>
      </h1>
    </div>
    <div class="half-screen-hero__column-two">

      <?php
      $icon = get_field('hst_column_2_icon');

      if (!empty($icon)) : ?>
      <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
      <?php endif; ?>
    </div>
  </div>

</div>
<main id="primary" class="site-main template__hero-sidebar
<?php if (!have_rows('hst_sidebar_menu')) : ?> no-sidebar <?php endif; ?>
">
  <?php if (have_rows('hst_sidebar_menu')) : ?>
  <aside class="sidebar--jump-links__container">

    <?php if (!empty(get_field('sidebar_jump_links_title'))) : ?>
    <h4 class="hst_sidebar-header">
      <?php
          echo the_field('sidebar_jump_links_title');
          ?>
    </h4>
    <?php endif; ?>
    <ul class="hst_sidebar_menu">
      <?php while (have_rows('hst_sidebar_menu')) : the_row();
          $linkTitle = get_sub_field('hst_sidebar_menu_item');
          $linkUrl = get_sub_field('hst_sidebar_menu_item_link');
        ?>
      <li>
        <a href="<?php echo $linkUrl; ?>"><?php echo $linkTitle; ?></a>
      </li>
      <?php endwhile; ?>
    </ul>
  </aside>
  <?php endif; ?>

  <section class="hero-sidebar__main-content">
    <?php
    while (have_posts()) : ?>
    <?php the_post();
      the_content();
    endwhile; // End of the loop.
    ?>
  </section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();