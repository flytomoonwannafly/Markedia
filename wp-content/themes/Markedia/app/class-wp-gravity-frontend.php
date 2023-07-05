<?php

namespace Theme\Markedia;

class WP_Gravity {
    /**
     * WP_Theme constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    public function init_hooks() {
        add_filter( 'gform_field_container', [ $this, 'customize_gravityforms_1_container' ], 10, 6 );
        add_filter( 'pre_option_rg_gforms_disable_css', '__return_true');

    }

    /*
 * Change display gravity form contact
 */
    function customize_gravityforms_1_container($field_container, $field, $form, $css_class, $style, $field_content) {
        if ($field->id == 9) {
            // Додайте ваші власні стилі CSS тут
            $field_container = '<input name="input_9" id="input_1_9" type="text" class="form-control" placeholder="Your name">';
        }
        if ($field->id == 5) {
            // Додайте ваші власні стилі CSS тут
            $field_container = '<input name="input_5" id="input_1_5" type="text" class="form-control" placeholder="Email address">';
        }
        if ($field->id == 6) {
            // Додайте ваші власні стилі CSS тут
            $field_container = '<input name="input_6" id="input_1_6" type="text" class="form-control" placeholder="Phone">';
        }
        if ($field->id == 7) {
            // Додайте ваші власні стилі CSS тут
            $field_container = '<input name="input_7" id="input_1_7" type="text" class="form-control" placeholder="Subject">';
        }
        if ($field->id == 8) {
            // Додайте ваші власні стилі CSS тут
            $field_container = '<textarea name="input_8" id="input_1_8" class="form-control" placeholder="Your message"></textarea>';
        }
        return $field_container;

    }

}