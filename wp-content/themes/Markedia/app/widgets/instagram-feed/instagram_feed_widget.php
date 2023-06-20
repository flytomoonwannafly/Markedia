<?php

class instagram_feed_widget extends WP_Widget
{
    function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'inst_scripts'));
        parent::__construct(

// Base ID of your widget
            'markedia_instagram_feed_widget',

// Widget name will appear in UI
            __('Instagram Feed Markedia', 'markedia_instagram_feed_widget'),

// Widget description
            array('description' => __('Widget for display instagram feed', 'markedia_instagram_feed_widget'),)
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Title', 'hs-text-domain') : $instance['title']);
        $gallery = explode( ',', $instance['gallery'] );

        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        if ( ! empty( $gallery ) ) {
            echo '<div class="instagram-wrapper clearfix">';

            foreach ( $gallery as $image ) {
                ?>
                <a class="" href="<?php echo $image?>"><img src="<?php echo $image?>" width="90" height="90" alt="" class="img-fluid"></a>
                <?php
            }

            echo '</ul>';
        }
        echo $args['after_widget'];


    }



    public function form( $instance ) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Title', 'hs-text-domain');
        $gallery = !empty($instance['gallery']) ? $instance['gallery'] : '';

        ?>


        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('gallery'); ?>"><?php _e('Gallery:', 'hs-text-domain'); ?></label>
            <img class="widefat" src="<?php echo esc_url($gallery); ?>"/>
            <input class="widefat" id="<?php echo $this->get_field_id('gallery'); ?>"
                   name="<?php echo $this->get_field_name('gallery'); ?>" type="hidden"
                   value="<?php echo esc_url($gallery); ?>"/>
            <button
                class="upload_gallery_button button button-primary"><?php _e('Upload Image', 'hs-text-domain') ?></button>
        </p>



        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['gallery'] = (!empty($new_instance['gallery'])) ? $new_instance['gallery'] : '';
        return $instance;
    }


    public function inst_scripts()
    {
//        wp_enqueue_script('media-upload');
        wp_enqueue_media();
        wp_enqueue_script('insta_scripts', get_template_directory_uri() . '/app/widgets/instagram-feed/instagram-feed.js', array('jquery'), '1.0', true);
    }
}

// Register and load the widget
function instagram_feed_widget_load_widgets()
{
    register_widget('instagram_feed_widget');
}

add_action('widgets_init', 'instagram_feed_widget_load_widgets');