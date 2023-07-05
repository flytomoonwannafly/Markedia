<?php

namespace Theme\Markedia;

class WP_Customizer {

    /**
     * WP_Theme constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    public function init_hooks() {
        add_action( 'customize_register', [ $this, 'markedia_banner_customize_register' ] );
    }
    function markedia_banner_customize_register($wp_customize) {

        $wp_customize->add_section('header_banner_section', array(
            'title' => 'Banner Header',
            'priority' => 30
        ));

        $wp_customize->add_setting('background_image_header_banner_setting', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_image_header_banner_control', array(
            'label' => 'Select an image',
            'section' => 'header_banner_section',
            'settings' => 'background_image_header_banner_setting'
        )));

        $wp_customize->add_setting('header_banner_title_setting', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('header_banner_title_control', array(
            'label' => 'Banner Title',
            'section' => 'header_banner_section',
            'settings' => 'header_banner_title_setting',
            'type' => 'text'
        ));

        $wp_customize->add_setting('header_banner_description_setting', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));

        $wp_customize->add_control('header_banner_description_control', array(
            'label' => 'Banner Description',
            'section' => 'header_banner_section',
            'settings' => 'header_banner_description_setting',
            'type' => 'textarea'
        ));

        $wp_customize->add_setting('header_banner_button_text_setting', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('header_banner_button_text_control', array(
            'label' => 'Button Text',
            'section' => 'header_banner_section',
            'settings' => 'header_banner_button_text_setting',
            'type' => 'text'
        ));

        $wp_customize->add_setting('header_banner_button_link_setting', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control('header_banner_button_link_control', array(
            'label' => 'Button Link',
            'section' => 'header_banner_section',
            'settings' => 'header_banner_button_link_setting',
            'type' => 'text'
        ));
    }


}