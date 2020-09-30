<?php

/**
 * Carbmin Logo Grid Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'carbmin-logo-grid-carousel-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'carbmin-logo-grid-carousel';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}

if ($is_preview) {
  $className .= ' is-admin';
}

?>

<div id="<?php echo esc_attr($id); ?>"
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
  <button type="button" class="slick-button-prev">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 668">
      <path
        d="M12 304L304 12c17-16 43-16 59 0s16 42 0 59L100 334l263 263c16 16 16 43 0 59s-42 16-59 0L12 363c-16-16-16-42 0-59z"
        fill="#ffffff" />
    </svg>
  </button>
  <button type="button" class="slick-button-next">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 668">
      <path
        d="M363 364L71 656c-17 16-43 16-59 0s-16-42 0-59l263-263L12 71C-4 55-4 28 12 12s42-16 59 0l292 293c16 16 16 42 0 59z"
        fill="#ffffff" />
    </svg>
  </button>
</div>