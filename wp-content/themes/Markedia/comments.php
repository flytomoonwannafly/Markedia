<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Markedia
 * @since Markedia 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div class="custombox clearfix">

    <?php if (have_comments()) : ?>
    <h4 class="small-title"><?php echo get_comments_number(get_the_ID()); ?> Comments</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                <?php
                wp_list_comments(array(
                    'style' => 'div',
                    'short_ping' => true,
                    'avatar_size' => 80,
                    'max_depth'=>2,
                    'reply_class'=> 'custom-reply-link',
                    'callback'=>'\Theme\Markedia\WP_Comment::markedia_comments_list'
                ));
                ?>
            </div>
        </div>
    </div>
        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>
</div>
<hr class="invis1">



<div class="custombox clearfix">
    <h4 class="small-title">Leave a Reply</h4>
    <?php
    $args = array(
        'fields' => [
            'author' => '<span class="required">*</span><input id="author" name="author" type="text" class="form-control" placeholder="Your name">',
            'email' => '<span class="required">*</span><input id="email" name="email" type="text" class="form-control" placeholder="Email address">',
            'url' => '<input id="url" name="url" type="text" class="form-control" placeholder="Website">',
            'cookies' => false,
        ],
        'class_form' => 'form-wrapper',
        'comment_field' => '<textarea id="comment" name="comment" class="form-control" placeholder="Your comment" aria-required="true" required="required"></textarea>',
        'title_reply' => '',
        'class_submit' => '',
        'submit_button' => '<button type="submit" class="btn btn-primary">Submit Comment</button>',
        'comment_notes_before' => false
    );
    ?>
    <div class="row">
        <div class="col-lg-12">
            <?php comment_form($args); ?>
        </div>
    </div>
</div>

