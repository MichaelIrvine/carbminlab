<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CarbminLab_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&family=Roboto:ital,wght@0,300;0,400;1,400&display=swap"
    rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text"
      href="#primary"><?php esc_html_e('Skip to content', 'carbminlab-theme'); ?></a>

    <header id="masthead" class="site-header">
      <div class="inner-header__container">
        <div class="site-branding">
          <?php
          the_custom_logo();
          if (is_front_page() && is_home()) :
          ?>
          <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
              rel="home"><?php bloginfo('name'); ?></a>
          </h1>
          <?php
          else :
          ?>
          <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
              rel="home"><?php bloginfo('name'); ?></a>
          </p>
          <?php
          endif;
          $carbminlab_theme_description = get_bloginfo('description', 'display');
          if ($carbminlab_theme_description || is_customize_preview()) :
          ?>
          <p class="site-description"><?php echo $carbminlab_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                        ?></p>
          <?php endif; ?>
        </div>

        <nav id="site-navigation" class="main-navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <svg class="primary-menu__icon" focusable="false" viewBox="0 0 20 20" width="20" height="18">
              <rect y="1" width="20" height="3"></rect>
              <rect y="8" width="20" height="3"></rect>
              <rect y="15" width="20" height="3"></rect>
            </svg>
          </button>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
            )
          );
          ?>
        </nav>
      </div>
      <div class="search-bar__container">
        <?php

        if (is_active_sidebar('custom-header-widget')) : ?>
        <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
          <?php dynamic_sidebar('custom-header-widget'); ?>
        </div>

        <?php endif; ?>
      </div>

    </header>