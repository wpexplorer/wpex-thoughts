<?php
/**
 * Setup the output of your WordPress Comments
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

function wpex_comments_output($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body <?php if ($comment->comment_approved == '0') echo 'pending-comment'; ?> clearfix">
                <div class="comment-details">
                    <div class="comment-avatar">
                        <?php echo get_avatar( $comment, 45 ); ?>
                    </div><!-- /comment-avatar -->
                    <section class="comment-author vcard">
						<cite class="author"><?php echo get_comment_author_link(); ?></cite>
						<span class="comment-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"> &middot; <?php echo esc_html( get_comment_date() ); ?></a></span>
                        <span class="reply"><?php comment_reply_link( array_merge( $args, array('reply_text' => __('Reply','wpex-thoughts' ) ,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
                    </section><!-- /comment-meta -->
                    <section class="comment-content">
    	                <div class="comment-text"><?php comment_text() ?></div><!-- /comment-text -->
                    </section><!-- /comment-content -->
				</div><!-- /comment-details -->
		</div><!-- /comment -->
<?php
} //end wpex_comments_output()
?>