<?php

/**
 * Carbmin Divider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'carbmin-logo-grid-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'carbmin-logo-grid';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}

if ($is_preview) {
  $className .= ' is-admin';
}



?>

<div id="<?php echo esc_attr($id); ?>" class="carbmin-custom-logo-grid-block <?php echo esc_attr($className); ?>">

  <?php

  if (have_rows('custom_logo_grid')) : ?>
  <div class="custom_logo_grid <?php if (get_field('logo_grid_grayscale')) : ?>is-grayscale<?php endif; ?>"
    style="grid-template-columns: repeat(<?php echo the_field('logo_grid_columns'); ?>, 1fr)">
    <?php while (have_rows('custom_logo_grid')) : the_row();
        $link  = get_sub_field('custom_logo_grid_link');
        $image = get_sub_field('custom_logo_grid_image');
      ?>
    <?php
        if ($link) : ?>
    <a href="<?php echo $link ?>">
      <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
    </a>
    <?php else : ?>
    <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
    <?php endif; ?>

    <?php endwhile; ?>
  </div>
  <?php else : ?>
  <p>Add some funders or sponsors.</p>
  <?php endif; ?>
</div>