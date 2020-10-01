<?php
/*
*
* Custom Gutenberg Settings
*
*/


function carbmin_block_categories($categories, $post)
{
  if ($post->post_type !== 'post') {
    return $categories;
  }
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'carbmin-custom',
        'title' => __('Carbmin Custom', 'carbmin-custom'),
        'icon'  => 'dashicons-admin-site-alt3',
      ),
    )
  );
}
add_filter('block_categories', 'carbmin_block_categories', 10, 2);



function carbminlab_gutenberg_defaults()
{
  // Disable some Gutenberg Features

  add_theme_support('disable-custom-font-sizes');
  // Default Colors
  add_theme_support(
    'editor-color-palette',
    array(
      array(
        'name' => 'White',
        'slug' => 'white',
        'color' => '#ffffff'
      ),
      array(
        'name' => 'Black',
        'slug' => 'black',
        'color' => '#000000'
      ),
      array(
        'name' => 'Light Blue',
        'slug' => 'light-blue',
        'color' => '#00A8E1'
      ),
      array(
        'name' => 'Dark Blue',
        'slug' => 'dark-blue',
        'color' => '#00053E'
      ),
      array(
        'name' => 'Light Grey',
        'slug' => 'light-grey',
        'color' => '#e2e2e2'
      ),
    )
  );
  // Default Font Sizes
  add_theme_support(
    'editor-font-sizes',
    array(
      array(
        'name' => 'Paragraph',
        'slug' => 'paragraph',
        'size' => 16
      ),
      array(
        'name' => 'Large Paragraph',
        'slug' => 'large-paragraph',
        'size' => 22
      ),
      array(
        'name' => 'Large',
        'slug' => 'large',
        'size' => 24
      )
    )
  );
};

add_action('init', 'carbminlab_gutenberg_defaults');

// Register Custom Blocks
function carbminlab_register_custom_blocks()
{
  wp_register_script(
    'carbminlab-custom-gutenberg',
    get_template_directory_uri() . '/build/gutenberg-bundle.js',
    array('wp-blocks', 'wp-block-editor', 'wp-components')
  );
  register_block_type(
    'carbminlab/custom-hero',
    array(
      'editor_script' => 'carbminlab-custom-gutenberg'
    )
  );
  register_block_type(
    'carbminlab/two-column-hero',
    array(
      'editor_script' => 'carbminlab-custom-gutenberg'
    )
  );
};

add_action('init', 'carbminlab_register_custom_blocks');