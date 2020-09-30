<?php

/**
 * CarbminLab Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CarbminLab_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('carbminlab_theme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function carbminlab_theme_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CarbminLab Theme, use a find and replace
		 * to change 'carbminlab-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('carbminlab-theme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'carbminlab-theme'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'carbminlab_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'carbminlab_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carbminlab_theme_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('carbminlab_theme_content_width', 640);
}
add_action('after_setup_theme', 'carbminlab_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carbminlab_theme_widgets_init()
{
	register_sidebar(array(
		'name'          => 'Custom Header Search Bar Widget',
		'id'            => 'custom-header-widget',
		'description'   => esc_html__('Search Bar for Header. Do not remove.', 'carbminlab-theme'),
		'before_widget' => '<div class="header-widget-area" role="complementary">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="header-widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Column 1', 'carbminlab-theme'),
			'id'            => 'footer_column-1',
			'description'   => esc_html__('Add widgets here for the Footer Column 1 section.', 'carbminlab-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Column 2', 'carbminlab-theme'),
			'id'            => 'footer_column-2',
			'description'   => esc_html__('Add widgets here for the Footer Column 2 section.', 'carbminlab-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Column 3', 'carbminlab-theme'),
			'id'            => 'footer_column-3',
			'description'   => esc_html__('Add widgets here for the Footer Column 3 section.', 'carbminlab-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Sub Menu', 'carbminlab-theme'),
			'id'            => 'footer_sub-menu',
			'description'   => esc_html__('Add widgets here for the Privacy Policy and Terms & Conditions.', 'carbminlab-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'carbminlab_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function carbminlab_theme_scripts()
{
	wp_enqueue_style('main-styles', get_template_directory_uri() . '/build/main.css', array(), get_the_time(), false);
	wp_enqueue_style('swiper-styles', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css', array(), get_the_time(), false);
	wp_enqueue_script('swiper-script', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js', array(), get_the_time(), true);

	wp_enqueue_script('main-js', get_template_directory_uri() . '/build/main-bundle.js', array(), get_the_time(), true);
	wp_enqueue_script('swiper-js', get_template_directory_uri() . '/build/swiper.js', array(), get_the_time(), true);

	wp_style_add_data('carbminlab-theme-style', 'rtl', 'replace');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'carbminlab_theme_scripts');


/**
 * Custom Category / taxonomy filter
 */
function category_filter()
{
	wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/src/js/ajax-filter.js', array('jquery'), get_the_time(), true);

	wp_localize_script('ajax-filter', 'wpAjax', array('ajaxUrl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'category_filter');

// Require file for Ajax Filter
require get_template_directory() . '/inc/ajax-filter/ajax-filter.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Custom Gutenberg File
 */
require get_template_directory() . '/inc/gutenberg.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Dequeue Post Block Front End Style Sheet
function carbmin_disable_scripts_styles()
{
	wp_dequeue_style('ptam-style-css');
	wp_dequeue_style('ptam-style-css-editor');
}
add_action('wp_enqueue_scripts', 'carbmin_disable_scripts_styles', 100);

add_image_size('people-image-size', 250, 250);
add_image_size('two-column-image-size', 425, 425);

add_filter('image_size_names_choose', 'carbminlab_custom_image_sizes');

function carbminlab_custom_image_sizes($sizes)
{
	return array_merge($sizes, array(
		'two-column-image-size' => __('Column Image')
	));
}

// Remove Menu Items from Dashboard

function remove_menus()
{
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_menus');


function carbmin_op_init()
{
	if (function_exists('acf_add_options_page')) {
		acf_add_options_sub_page(array(
			'page_title'      => 'News Archive Settings',
			'parent_slug'     => 'edit.php?post_type=news',
			'capability' => 'manage_options'
		));
	}
}

add_action('acf/init', 'carbmin_op_init');

// Custom ACF Blocks

if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
};

function register_acf_block_types()
{
	acf_register_block_type(
		array(
			'name'              => 'carbmin-divider',
			'title'             => __('Carbmin Divider'),
			'description'       => __('A custom divider block.'),
			'render_template'   => 'template-parts/blocks/carbmin-divider/carbmin-divider.php',
			'category'          => 'design',
			'icon' 							=> 'minus',
			'keywords' 					=> array('divider, carbmin'),
			'enqueue_assets' 	  => function () {
				wp_enqueue_style('carbmin-divider', get_template_directory_uri() . '/template-parts/blocks/carbmin-divider/carbmin-divider.css', array(), '1.0.1');
			},
		)
	);
	acf_register_block_type(
		array(
			'name'              => 'carbmin-logo-grid',
			'title'             => __('Carbmin Custom Logo Grid'),
			'description'       => __('A custom block to add logos.'),
			'render_template'   => 'template-parts/blocks/carbmin-logo-grid/carbmin-logo-grid.php',
			'category'          => 'design',
			'icon' 							=> 'grid-view',
			'keywords' 					=> array('logo-grid, carbmin'),
			'enqueue_assets' 	  => function () {
				wp_enqueue_style('carbmin-logo-grid', get_template_directory_uri() . '/template-parts/blocks/carbmin-logo-grid/carbmin-logo-grid_style.css', array(), '1.0.1');
			},
		)
	);
	acf_register_block_type(
		array(
			'name'              => 'carbmin-logo-grid-carousel',
			'title'             => __('Carbmin Custom Logo Grid Carousel'),
			'description'       => __('A custom block to add logos inside a carousel.'),
			'render_template'   => 'template-parts/blocks/carbmin-logo-grid-carousel/carbmin-logo-grid-carousel.php',
			'category'          => 'design',
			'icon' 							=> 'images-alt2',
			'keywords' 					=> array('logo-grid, carbmin'),
			'enqueue_assets' 	  => function () {

				wp_enqueue_style('carbmin-logo-grid-carousel-style', get_template_directory_uri() . '/template-parts/blocks/carbmin-logo-grid-carousel/carbmin-logo-grid-carousel_style.css', array(), '1.0.0', false);
				wp_enqueue_script('carbmin-logo-grid-carousel', get_template_directory_uri() . '/template-parts/blocks/carbmin-logo-grid-carousel/carbmin-logo-grid-carousel.js', array(), '1.0.0', true);

				wp_enqueue_style('slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', false);
				wp_enqueue_style('slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1', false);
				wp_enqueue_script('slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.8.1', true);
			},
		)
	);
};


/**
 * ACF Color Palette
 *
 * Add default color palatte to ACF color picker for branding
 * Match these colors to colors in /functions.php & /assets/scss/partials/base/variables.scss
 *
 */
add_action('acf/input/admin_footer', 'wd_acf_color_palette');
function wd_acf_color_palette()
{ ?>
<script type="text/javascript">
(function($) {
  acf.add_filter('color_picker_args', function(args, $field) {
    // add the hexadecimal codes here for the colors you want to appear as swatches
    args.palettes = ['#ffffff', '#000000', '#00A8E1', '#00053E', '#e2e2e2'];
    // return colors
    return args;
  });
})(jQuery);
</script>
<?php }