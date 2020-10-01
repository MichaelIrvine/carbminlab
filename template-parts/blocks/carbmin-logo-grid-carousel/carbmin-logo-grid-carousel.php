<?php

/**
 * Carbmin Logo Grid Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Create class attribute allowing for custom "className" and "align" values.
$className = 'carbmin-logo-grid-carousel';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}

if ($is_preview) {
  $className .= ' is-admin';
}

?>

<div
  class="<?php echo esc_attr($className); ?> <?php if (get_field('logo_grid_carousel_grayscale')) : ?>is-grayscale<?php endif; ?>">
  <?php if (have_rows('custom_logo_grid_carousel')) : ?>
  <div class="logo_carousel_slide">
    <?php while (have_rows('custom_logo_grid_carousel')) : the_row();
        $image = get_sub_field('custom_logo_grid_carousel_image');
      ?>
    <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
    <?php endwhile; ?>
  </div>
  <?php else : ?>
  <p>Add some funders or sponsors to the carousel.</p>
  <?php endif; ?>

</div>