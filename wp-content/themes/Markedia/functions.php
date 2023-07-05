<?php

// Autoload classes

require_once __DIR__ . '/app/class-wp-autoloader.php';
Theme\Markedia\WP_Autoloader::init();

new Theme\Markedia\WP_Theme;
new Theme\Markedia\WP_Customizer();
new Theme\Markedia\WP_Frontend();
new Theme\Markedia\WP_Gravity();
new Theme\Markedia\WP_Comment();

