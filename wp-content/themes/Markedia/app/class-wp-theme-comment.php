<?php

namespace Theme\Markedia;

class WP_Comment
{
    /**
     * WP_Theme constructor.
     */
    public function __construct()
    {
        $this->init_hooks();
//        $this->markedia_comments_list();
    }

    public function init_hooks()
    {
        add_filter('comment_form_fields', [$this, 'markedia_reorder_comment_data'], 10, 6);

    }

    /*
    * Reorder feilds of comments form
    */
    public function markedia_reorder_comment_data($fields){
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

    public static function markedia_comments_list($comment, $args, $depth) {
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
}