<?php

// if you want other social media channels
define('SOCIAL_MEDIA_OPTIONS', implode(',', array('facebook','twitter','linkedIn','pinterest','googleplus','youtube','vimeo', 'instagram','tumblr','flickr')));

// image sizes for the header, change accordingly (current 2.5 / 1 ratio )
add_image_size('header-image-large', '1900', '760', true);
add_image_size('header-image-medium', '768', '307', true);
add_image_size('header-image-small', '480', '192', true);

// post thumnail support
add_theme_support( 'post-thumbnails' );

// enqueue scripts and styles here, not in Footer or Header see:
// https://codex.wordpress.org/Function_Reference/wp_enqueue_style
// https://codex.wordpress.org/Function_Reference/wp_enqueue_script
function snvEnqueueScriptStyles()
{
    wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/js/script.js', array('bootstrap','jquery','script'), 1.0, true );
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('theme', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'snvEnqueueScriptStyles', 40);

// custom excerpt, change accordingly
function newExcerptMore($more)
{
    global $post;
    return ' <a class="moretag" href="' . get_permalink($post->ID) . '">Lees meer...</a> ';
}
add_filter('excerpt_more', 'newExcerptMore');

// register menu's here...
function registerMyMenus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu'),
            'footer-menu-2' => __('Footer Menu 2'),
        )
    );
}
add_action('init', 'registerMyMenus');