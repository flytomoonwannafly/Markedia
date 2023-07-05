<?php

namespace Theme\Markedia;

class WP_Theme {

    const THEME_VERSION = '1.0.1';

    const TEXT_DOMAIN = 'markedia';

    /**
     * WP_Theme constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    public function init_hooks() {
        add_action( 'after_setup_theme', [ $this, 'markedia_setup' ] );
        add_action( 'widgets_init', [ $this, 'markedia_widgets_init' ] );
        add_filter( 'nav_menu_link_attributes', [ $this, 'markedia_nav_link_filter' ], 10, 4  );
        add_filter( 'nav_menu_css_class', [ $this, 'add_additional_class_on_li' ], 10, 4  );
    }

    public static function get_directory_uri() {
        return get_template_directory_uri( __FILE__ );
    }

    public static function get_directory() {
        return get_template_directory( __FILE__ );
    }


    /**
     * Implements hook: init().
     *
     * Registers locations to nav menus.
     */
    public function markedia_setup(){

        load_theme_textdomain('markedia');

        add_theme_support('title-tag');

        add_theme_support('custom-logo', array(
            'height'=>50,
            'width'=>200,
            'flex-height'=>true
        ));
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(800, 460);
        add_image_size('markedia_recent_posts', 55, 55, true);
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

        register_nav_menu('primary', 'Primary menu');
    }

    public function markedia_nav_link_filter( $atts, $item, $args){
        if(isset($args->add_a_class)) {
            $atts['class'] = $args->add_a_class;
        }

        return $atts;
    }

    function add_additional_class_on_li($classes, $item, $args) {
        if(isset($args->add_li_class)) {
            $classes[] = $args->add_li_class;
        }
        return $classes;
    }
    function markedia_widgets_init(){
        register_sidebar( array(
            'name'          => __( 'Main Sidebar', 'textdomain' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
            'before_widget' => '<div class="widget"> ',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar', 'textdomain' ),
            'id'            => 'footer-sidebar',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Left Sidebar', 'textdomain' ),
            'id'            => 'left-sidebar',
            'description'   => __( 'Widgets in this area will be shown on chosen pages.', 'textdomain' ),
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }

}