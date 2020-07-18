<?php
/*
*
* Custom Gutenberg Settings
*
*/

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
    'carbminlab-custom-hero',
    get_template_directory_uri() . '/build/gutenberg-bundle.js',
    array('wp-blocks', 'wp-block-editor', 'wp-components')
  );
  register_block_type(
    'carbminlab/custom-hero',
    array(
      'editor_script' => 'carbminlab-custom-hero'
    )
  );
};

add_action('init', 'carbminlab_register_custom_blocks');