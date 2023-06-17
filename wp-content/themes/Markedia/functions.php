<?php

function markedia_setup(){

    load_theme_textdomain('markedia');

    add_theme_support('title-tag');

    add_theme_support('custom-logo', array(
        'height'=>50,
        'width'=>200,
        'flex-height'=>true
    ));
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 460);
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    register_nav_menu('primary', 'Primary menu');
}

add_action('after_setup_theme', 'markedia_setup');

function wp_markedia_scripts(){
    wp_enqueue_style('style-css', get_stylesheet_uri());
    wp_enqueue_style('animate', get_template_directory_uri(). '/assets/css/animate.css' );
    wp_enqueue_style('bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.css' );
    wp_enqueue_style('colors', get_template_directory_uri(). '/assets/css/colors.css' );
    wp_enqueue_style('font-awesome', get_template_directory_uri(). '/assets/css/font-awesome.min.css' );
    wp_enqueue_style('responsive', get_template_directory_uri(). '/assets/css/responsive.css' );
    wp_enqueue_style('marketing', get_template_directory_uri(). '/assets/css/version/marketing.css' );

    wp_enqueue_script('jquery');
    wp_enqueue_script('tether', get_template_directory_uri(). '/assets/js/tether.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri(). '/assets/js/bootstrap.js');
    wp_enqueue_script('animate', get_template_directory_uri(). '/assets/js/animate.js');
    wp_enqueue_script('custom', get_template_directory_uri(). '/assets/js/custom.js');

    wp_enqueue_script('food-map', get_template_directory_uri(). '/assets/js/food-map.js');
    wp_enqueue_script('garden-map', get_template_directory_uri(). '/assets/js/garden-map.js');

    wp_enqueue_script('masonry', get_template_directory_uri(). '/assets/js/masonry.js');

}
add_action('wp_enqueue_scripts', 'wp_markedia_scripts');
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


function my_nav_link_filter( $atts, $item, $args){
    if(isset($args->add_a_class)) {
        $atts['class'] = $args->add_a_class;
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'my_nav_link_filter', 10, 4 );