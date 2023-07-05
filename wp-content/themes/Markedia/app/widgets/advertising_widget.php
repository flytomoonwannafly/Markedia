<?php

// Creating the widget
class advertising_widget extends WP_Widget
{

    function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'hs_scripts'));
        parent::__construct(

// Base ID of your widget
            'markedia_advertising_widget',

// Widget name will appear in UI
            __('Advertising Markedia', 'markedia_advertising_widget'),

// Widget description
            array('description' => __('Widget for display advertising', 'markedia_advertising_widget'),)
        );
    }

    public function widget($args, $instance)
    {
        // Our variables from the widget settings
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Title', 'hs-text-domain') : $instance['title']);
        $image = !empty($instance['image']) ? $instance['image'] : '';
        ob_start();
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        if ($image): ?>
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="<?php echo esc_url($image); ?>" alt="" class="img-fluid">
                </div>
            </div>

        <?php endif;
        echo $args['after_widget'];
        ob_end_flush();
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Title', 'hs-text-domain');
        $image = !empty($instance['image']) ? $instance['image'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image:', 'hs-text-domain'); ?></label>
            <img class="widefat" src="<?php echo esc_url($image); ?>"/>
            <input class="widefat" id="<?php echo $this->get_field_id('image'); ?>"
                   name="<?php echo $this->get_field_name('image'); ?>" type="hidden"
                   value="<?php echo esc_url($image); ?>"/>
            <button
                class="upload_image_button button button-primary"><?php _e('Upload Image', 'hs-text-domain') ?></button>
        </p>
        <?php
    }


    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['image'] = (!empty($new_instance['image'])) ? $new_instance['image'] : '';
        return $instance;
    }

    public function hs_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_media();
        wp_enqueue_script('our_admin', get_template_directory_uri() . '/assets/admin-dashboard/advertising.js', array('jquery'));
    }
}

// Register and load the widget
function wpb_load_widget()
{
    register_widget('advertising_widget');
}

add_action('widgets_init', 'wpb_load_widget');
