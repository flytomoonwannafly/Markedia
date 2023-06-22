<?php
include_once 'app/widgets/advertising/advertising_widget.php';
include_once 'app/widgets/instagram-feed/instagram_feed_widget.php';

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

/*
 * Pagination
 */

function markedia_pagination( $args = array() ) {

    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous', 'text-domain' ),
        'next_string'     => __( 'Next', 'text-domain' ),
        'before_output'   => '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">',
        'after_output'    => '</ul></div>'
    );

    $args = wp_parse_args(
        $args,
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );

    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );

    if ( $count <= 1 )
        return FALSE;

    if ( !$page )
        $page = 1;

    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }

    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );

    if ( $previous && (1 != $page) )
        $echo .= '<li class="page-item"><a href="' . $previous . '" class="page-link" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';

    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="page-item active"><span class="page-link active">' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li class="page-item"><a href="%s" class="page-link" >%2d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }

    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li class="page-item"><a href="' . $next . '" class="page-link" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';

    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}

/*
 * Sidebar
 */

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
}
add_action( 'widgets_init', 'markedia_widgets_init' );

/*
 * Reorder feilds of comments form
 */
function markedia_reorder_comment_data($fields){
    $new_fields = array();
    $myorder = array('author','email', 'url', 'comment');
    foreach ($myorder as $key){
        $new_fields[$key] = $fields[$key];
        unset($fields[$key]);
    }
    if ($fields){
        foreach ($fields as $key=>$val){
            $new_fields[$key] = $val;
            return $new_fields;
        }
    }
}
add_filter('comment_form_fields', 'markedia_reorder_comment_data');
/*
 * Change display comments list
 */
function markedia_comments_list($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'media';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class('media' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
    <a class="media-left"><?php
    if ( $args['avatar_size'] != 0 ) {
        echo get_avatar( $comment, $args['avatar_size'], null, null,  array( 'class' => array( 'rounded-circle' ) ) );
    }
?>
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo get_comment_author ().' '?>
            <small>
                <?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
            </small>
        </h4>
    <?php
    if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php
    } ?>
    <?php comment_text(); ?>
    <?php
    comment_reply_link(
        array_merge(
            $args,
            array(
                'add_below' => $add_below,
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'class'     => 'btn btn-primary btn-sm',
            )
        )
    ); ?>
    </div><?php
    if ( 'div' != $args['style'] ) : ?>
        </div><?php
    endif;
}