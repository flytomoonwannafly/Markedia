<?php

class recent_posts_widget extends WP_Widget
{
    function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'recent_posts_scripts'));
        parent::__construct(

// Base ID of your widget
            'markedia_recent_posts_widget',

// Widget name will appear in UI
            __('Recent Posts Markedia', 'markedia_recent_posts_widget'),

// Widget description
            array('description' => __('Widget for display recent posts', 'markedia_recent_posts_widget'),)
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Title', 'hs-text-domain') : $instance['title']);
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        $r = new WP_Query(
        /**
         * Filters the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         * @since 4.9.0 Added the `$instance` parameter.
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args     An array of arguments used to retrieve the recent posts.
         * @param array $instance Array of settings for the current widget.
         */
            apply_filters(
                'widget_posts_args',
                array(
                    'posts_per_page'      => $number,
                    'no_found_rows'       => true,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                ),
                $instance
            )
        );

        if ( ! $r->have_posts() ) {
            return;
        }
        ?>

        <?php echo $args['before_widget']; ?>

        <?php
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';

        /** This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php */
        $format = apply_filters( 'navigation_widgets_format', $format );

        if ( 'html5' === $format ) {
            // The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
            $title      = trim( strip_tags( $title ) );
            $aria_label = $title ? $title : $default_title;
            echo '<nav aria-label="' . esc_attr( $aria_label ) . '">';
        }
        ?>
<div class="blog-list-widget">
        <div class="list-group">
            <?php foreach ( $r->posts as $recent_post ) : ?>
                <?php
                $post_title   = get_the_title( $recent_post->ID );
                $title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
                $aria_current = '';

                if ( get_queried_object_id() === $recent_post->ID ) {
                    $aria_current = ' aria-current="page"';
                }
                ?>
                <a href="<?php the_permalink( $recent_post->ID ); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="w-100 justify-content-between">
                        <?php echo get_the_post_thumbnail($recent_post->ID, 'markedia_recent_posts', array( 'class' => 'img-fluid float-left' ))?>
                        <h5 class="mb-1"><?php echo $title; ?></h5>
                        <?php if ( $show_date ) : ?>
                        <small><?php echo get_the_date( 'j F Y', $recent_post->ID ); ?></small>
                        <?php endif; ?>

                    </div>
                </a>
            <?php endforeach; ?>
        </div>
</div>
        <?php
        if ( 'html5' === $format ) {
            echo '</nav>';
        }

        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $instance              = $old_instance;
        $instance['title']     = sanitize_text_field( $new_instance['title'] );
        $instance['number']    = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }

    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
        </p>

        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
        </p>
        <?php
    }


    public function recent_posts_scripts()
    {
//        wp_enqueue_script('media-upload');
        wp_enqueue_media();
//        wp_enqueue_script('recent_posts_scripts', get_template_directory_uri() . '/app/widgets/instagram-feed/instagram-feed.js', array('jquery'), '1.0', true);
    }
}

// Register and load the widget
function recent_posts_widget_load_widgets()
{
    register_widget('recent_posts_widget');
}

add_action('widgets_init', 'recent_posts_widget_load_widgets');