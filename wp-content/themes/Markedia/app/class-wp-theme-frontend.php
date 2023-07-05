<?php

namespace Theme\Markedia;

class WP_Frontend{

    /**
     * WP_Theme constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    public function init_hooks() {
        add_action( 'wp_enqueue_scripts', [ $this, 'wp_markedia_scripts' ] );
    }
    function wp_markedia_scripts(){
        wp_enqueue_style('style-css', get_stylesheet_uri());
        wp_enqueue_style('animate', get_template_directory_uri(). '/assets/css/animate.css' );
        wp_enqueue_style('bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.css' );
        wp_enqueue_style('colors', get_template_directory_uri(). '/assets/css/colors.css' );
        wp_enqueue_style('font-awesome', get_template_directory_uri(). '/assets/css/font-awesome.min.css' );
        wp_enqueue_style('responsive', get_template_directory_uri(). '/assets/css/responsive.css' );
        wp_enqueue_style('marketing', get_template_directory_uri(). '/assets/css/version/marketing.css' );
        wp_enqueue_style('font-roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' );

        wp_enqueue_script('jquery');
        wp_enqueue_script('tether', get_template_directory_uri(). '/assets/js/tether.min.js');
        wp_enqueue_script('bootstrap', get_template_directory_uri(). '/assets/js/bootstrap.js');
        wp_enqueue_script('animate', get_template_directory_uri(). '/assets/js/animate.js');
        wp_enqueue_script('custom', get_template_directory_uri(). '/assets/js/custom.js');
        wp_enqueue_script('food-map', get_template_directory_uri(). '/assets/js/food-map.js');
        wp_enqueue_script('garden-map', get_template_directory_uri(). '/assets/js/garden-map.js');
        wp_enqueue_script('masonry', get_template_directory_uri(). '/assets/js/masonry.js');
        wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js');
        wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js');
        wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
        wp_script_add_data('respond', 'conditional', 'lt IE 9');
    }

}