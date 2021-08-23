<?php
defined( 'ABSPATH' ) || exit;

/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>
<div id="commentsbox" class="boxframe">
	<div id="comments" class="comments-area clearfix">

        <?php // You can start editing here -- including this comment! ?>

        <?php if ( have_comments() ) : ?>
            <h3 class="comments-title comment-scroll"><?php comments_popup_link(esc_html__( 'Leave a comment', 'wpex-thoughts' ), esc_html__( '1 Comment', 'wpex-thoughts' ), esc_html__( '% Comments', 'wpex-thoughts' ), 'comments-link', esc_html__( 'Comments closed', 'wpex-thoughts' )); ?></h3>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
                <h1 class="assistive-text"><?php esc_html_e( 'Comment Navigation', 'wpex-thoughts' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( '&larr;'. esc_html__( 'Older Comments', 'wpex-thoughts' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpex-thoughts' ) .'&rarr;' ); ?></div>
            </nav><!-- /coment-nav-above -->
            <?php endif; ?>

            <ol class="commentlist">
                <?php wp_list_comments( array( 'callback' => 'wpex_comments_output' ) ); ?>
            </ol><!-- /commentlist -->

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
                <h1 class="assistive-text"><?php esc_html_e( 'Comment Navigation', 'wpex-thoughts' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( '&larr;'. esc_html__( 'Older Comments', 'wpex-thoughts' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link(esc_html__( 'Newer Comments', 'wpex-thoughts' ) .'&rarr;' ); ?></div>
            </nav><!-- /coment-nav-below -->
            <?php endif; ?>

        <?php endif; ?>

        <?php if (!comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
            <?php /* <p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'wpex-thoughts' ); ?></p> */ ?>
        <?php endif; ?>

    	<?php
		//important variables
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		//custom fields callback
		$fields =  array(
			'author' => '<p class="comment-form-author">' . '<label for="author">'. esc_html__( 'Name', 'wpex-thoughts' ) .' ' . ( $req ? '<span class="required">*</span></label>' : '' ) .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			'email' => '<p class="comment-form-email"><label for="email">'. esc_html__( 'Email', 'wpex-thoughts' ) .' ' . ( $req ? '<span class="required">*</span></label>' : '' ) .
			'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
			'url' => '<p class="comment-form-url"><label for="url">'. esc_html__( 'Website', 'wpex-thoughts' ) .'</label>' .
			'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);

		//custom comment form output
        $comments_args = array(
			'fields' => $fields,
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" rows="10"></textarea></p>',
			'must_log_in' => '<p class="must-log-in"><a href="' . esc_url( wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '">'. esc_html__( 'Log In To Comment', 'wpex-thoughts' ) .'</a></p>',
			'comment_form_top' => '',
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			'cancel_reply_link' => '<span class="wpex-icon-remove-sign"></span>',
			'label_submit' => esc_html__( 'Post Comment', 'wpex-thoughts' )
		);

		//show comment form
		comment_form( $comments_args ); ?>
    </div><!-- /comments -->
</div><!-- /commentsbox -->