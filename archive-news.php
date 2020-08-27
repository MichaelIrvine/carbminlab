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


<div class="page-title__container">
  <div class="page-title__inner-container">
    <div class="page-title__column-one">
      <h1>
        <?php echo post_type_archive_title(); ?>
      </h1>
    </div>
  </div>
</div>

<main id="primary" class="site-main archive-page__news">
  <div class="categories-filter__container">
    <h2>Filter</h2>
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
        <h2><?php the_title(); ?></h2>
        <div class="post-details__container">
          <span class="post-category"><?php the_category(', '); ?></span>
          <span class="post-date"><?= get_the_date(); ?></span>
        </div>
      </div>
      <div class="article-container__row-2">
        <?php
          the_post_thumbnail('medium');
          the_excerpt();
          ?>
        <a href="<?= the_permalink(); ?>" class="news-post-cta">Read More</a>
      </div>
    </div>


    <?php endwhile;
    wp_reset_postdata(); ?>

  </div>
</main>

<?php
get_footer();