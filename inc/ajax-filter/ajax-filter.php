<?php
add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax()
{
  $category = $_POST['category'];

  $args = array(
    'post_type' => 'news',
    'posts_per_page' => -1,
  );

  if (isset($category)) {
    $args['category__in'] = $category;
  }

  $the_query = new WP_Query($args);

  while ($the_query->have_posts()) : $the_query->the_post();
?>

<div class="article__container">
  <div class="article__container__row-1">
    <a href="<?= the_permalink(); ?>">
      <h2><?php the_title(); ?></h2>
    </a>
    <div class="post-details__container">
      <span class="post-category"><?php the_category(', '); ?></span>
      <span class="post-date"><?= get_the_date(); ?></span>
    </div>
  </div>
  <div class="article-container__row-2">

    <?php
        the_post_thumbnail('medium');
        ?>
    <div class="article-link__container">
      <?php the_excerpt(); ?>
      <a href="<?= the_permalink(); ?>" class="news-post-cta btn --outline">Read More</a>
    </div>


  </div>
</div>

<?php endwhile;
  wp_reset_postdata();
  die();
}