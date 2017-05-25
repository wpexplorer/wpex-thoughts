<?php
/**
* @ Comments.php credit to Twenty 11 WordPress theme - http://wordpress.org/extend/themes/twentyeleven
* @ Modified by WPExplorer
 */


/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>
<div id="commentsbox" class="boxframe">
	<div id="comments" class="comments-area clearfix">
    
        <?php // You can start editing here -- including this comment! ?>
    
        <?php if ( have_comments() ) : ?>
            <h3 class="comments-title comment-scroll"><?php comments_popup_link(__('Leave a comment', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link', __('Comments closed', 'wpex')); ?></h3>
    
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
                <h1 class="assistive-text"><?php echo __('Comment Navigation','wpex'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( '&larr;'. __('Older Comments','wpex') ); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments','wpex') .'&rarr;'); ?></div>
            </nav><!-- /coment-nav-above -->
            <?php endif; ?>
    
            <ol class="commentlist">
                <?php wp_list_comments( array( 'callback' => 'wpex_comments_output' ) ); ?>
            </ol><!-- /commentlist -->
    
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
                <h1 class="assistive-text"><?php echo __('Comment Navigation','wpex'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( '&larr;'. __('Older Comments','wpex') ); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments','wpex') .'&rarr;'); ?></div>
            </nav><!-- /coment-nav-below -->
            <?php endif; ?>
    
        <?php endif; ?>
    
        <?php if (!comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
            <?php /* <p class="nocomments"><?php _e( 'Comments are closed.', 'wpex' ); ?></p> */ ?>
        <?php endif; ?>
    
    	<?php
		//important variables
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		//custom fields callback
		$fields =  array(
			'author' => '<p class="comment-form-author">' . '<label for="author">'. __('Name','wpex') .' ' . ( $req ? '<span class="required">*</span></label>' : '' ) .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			'email' => '<p class="comment-form-email"><label for="email">'. __('Email','wpex') .' ' . ( $req ? '<span class="required">*</span></label>' : '' ) .
			'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
			'url' => '<p class="comment-form-url"><label for="url">'. __('Website','wpex') .'</label>' .
			'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);

		//custom comment form output
        $comments_args = array(
			'fields' => $fields,
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" rows="10"></textarea></p>',
			'must_log_in' => '<p class="must-log-in"><a href="' . wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">'. __('Log In To Comment','wpex') .'</a></p>',
			'comment_form_top' => '',
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			'cancel_reply_link' => '<span class="wpex-icon-remove-sign"></span>',
			'label_submit' => __('Post Comment','wpex')
		);
		
		//show comment form
		comment_form($comments_args); ?>
    </div><!-- /comments -->
</div><!-- /commentsbox -->