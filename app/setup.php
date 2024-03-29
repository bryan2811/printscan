<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script('sage/app.js', asset('scripts/app.js')->uri(), array('jquery'), null, true);

  if (is_single() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
  }

  wp_enqueue_style('sage/app.css', asset('styles/app.css')->uri(), false, null);
}, 100);

/**
 * Add preload scripts
 *
 * @return void
 */
add_action('wp_head', function () {
  $handles = apply_filters('printscan/scripts/preload', [
      'sage/app.js'
  ]);

  collect($handles)
      ->filter(function ($handle) {
          return true;
      })
      ->filter(function ($handle) {
          return isset(wp_scripts()->registered[$handle]);
      })
      ->each(function ($handle) {
          $uri = wp_scripts()->registered[$handle]->src;
          echo "<link rel='preload' href='$uri' as='script'/>\n";
      });
}, 5);

/**
 * Add preload styles
 *
 * @return void
 */
add_action('wp_head', function () {
  $handles = apply_filters('printscan/styles/preload', [
      'sage/app.css',
  ]);

  collect($handles)
      ->filter(function ($handle) {
          return true;
      })
      ->filter(function ($handle) {
          return isset(wp_styles()->registered[$handle]);
      })
      ->each(function ($handle) {
          $uri = wp_styles()->registered[$handle]->src;
          echo "<link rel='preload' href='$uri' as='style'/>\n";
      });
}, 5);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
  if ($manifest = asset('scripts/editor.asset.php')->load()) {
    wp_enqueue_script('sage/editor.js', asset('scripts/editor.js')->uri(), array('jquery'), null, true);

    wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');
  }

  wp_enqueue_style('sage/editor.css', asset('styles/editor.css')->uri(), false, null);
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

/**
 * Enqueue custom styles to the theme admin panel.
 *
 * @return void
 */
add_action('admin_head', function () {
  wp_enqueue_style('sage/editor.css', asset('styles/editor.css')->uri(), false, null);
});