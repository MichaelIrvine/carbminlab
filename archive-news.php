<?php

/**
 * Template Name: News
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarbminLab_Theme
 */

get_header();
?>

<div class="half-screen-hero__container">
  <div class="half-screen-hero__image"
    style="background-image: url(<?php echo the_field('hst-hero-image', 'option') ?>)"></div>
  <div class="half-screen-hero__overlay" style="background-color: <?php echo the_field('hst_hero_overlay_color', 'option') ?>; 
			 				opacity: <?php echo the_field('hst_hero_overlay_opacity', 'option'); ?>"></div>

  <div class="half-screen-hero__inner-container">
    <div class="half-screen-hero__column-one">
      <h1 class="<?php if (!empty(get_field('hst-hero-image', 'option'))) : ?>light-color<?php endif; ?>">
        <?php echo post_type_archive_title(); ?>
      </h1>
    </div>
  </div>

</div>

<main id="primary" class="site-main archive-page__news">
  <div class="categories-filter__container">

    <?php echo the_field('news_archive_filter_desc', 'option'); ?>
    <ul class="categories-filter__list">
      <li class="category-filter__item"><a class="current-active-category" href="<?php echo home_url('news') ?>">All
          News</a>
      </li>
      <?php

      $cat_args = array(
        'exclude' => array(1),
        'option_all' => 'All'
      );

      $categories = get_categories($cat_args);

      foreach ($categories as $cat) : ?>

      <li class="category-filter__item"><a data-category="<?= $cat->term_id; ?>"
          href="<?= get_category_link($cat->term_id); ?>"><?= $cat->name; ?></a></li>
      <?php
      endforeach;
      ?>

    </ul>
  </div>

  <div class="filtered-articles">
    <?php

    $args = array(
      'post_type' => 'news',
      'posts_per_page' => -1,
    );

    $the_query = new WP_Query($args);

    while ($the_query->have_posts()) : $the_query->the_post();
    ?>

    <div class="article__container">
      <div class="article__container__row-1">
        <a href="<?= the_permalink(); ?>">
          <h2><?php the_title(); ?></h2>
        </a>
        <div class="post-details__container">
          <span class="post-category"><?php the_category(' '); ?></span>
          <span class="post-date"><?= get_the_date(); ?></span>
        </div>
      </div>
      <div class="article-container__row-2">
        <a href="<?= the_permalink(); ?>" class="feature-image-link">
          <?php
            the_post_thumbnail('full');
            ?>
        </a>
        <div class="article-link__container">
          <?php the_excerpt(); ?>
          <a href="<?= the_permalink(); ?>" class="news-post-cta btn --outline">Read More</a>
        </div>


      </div>
    </div>


    <?php endwhile;
    wp_reset_postdata(); ?>

  </div>
</main>

<?php
get_footer();