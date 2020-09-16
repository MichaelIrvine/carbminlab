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
$id = 'carbmin-divider-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'carbmin-divider';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="carbmin-custom-acf-block ">
  <div class="cb-divider <?php echo esc_attr($className); ?> has-<?php echo $wd_color_class; ?>-color"
    style="background-color:<?php the_field('divider_color'); ?>">

  </div>
</div>