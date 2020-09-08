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

    <header id="masthead" class="site-header fixed">
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


        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-pressed="false">
            <svg class="primary-menu__icon" focusable="false" viewBox="0 0 20 20" width="20" height="18">
              <rect y="1" width="20" height="2"></rect>
              <rect y="8" width="20" height="2"></rect>
              <rect y="15" width="20" height="2"></rect>
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
          <button id="open-search-bar" class="open-search-button" aria-label="Open Search Bar" aria-pressed="false"
            aria-disabled="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125" width="16px">
              <path
                d="M68.1 40.8C68.1 27.2 57 16 43.3 16c-13.7 0-24.8 11.1-24.8 24.8 0 13.7 11.1 24.8 24.8 24.8 13.7 0 24.8-11.1 24.8-24.8z"
                fill="none" />
              <path
                d="M72.5 63.1c4.7-6.2 7.6-13.9 7.6-22.3C80.1 20.5 63.6 4 43.3 4 23 4 6.5 20.5 6.5 40.8S23 77.6 43.3 77.6c7.6 0 14.6-2.3 20.5-6.3l22.9 22.9c1.2 1.2 2.7 1.8 4.2 1.8s3.1-.6 4.2-1.8c2.3-2.3 2.3-6.1 0-8.5L72.5 63.1zm-54-22.3C18.5 27.2 29.6 16 43.3 16 57 16 68.1 27.2 68.1 40.8c0 13.7-11.1 24.8-24.8 24.8-13.7 0-24.8-11.1-24.8-24.8z" />
            </svg>
          </button>
        </nav>
      </div>
      <div class="header-search-widget__container">
        <?php
        if (is_active_sidebar('custom-header-widget')) : ?>
        <?php dynamic_sidebar('custom-header-widget'); ?>
        <?php endif; ?>
      </div>
    </header>