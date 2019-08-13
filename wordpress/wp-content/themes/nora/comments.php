<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Nora
 * @since Nora 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) { return; };

$comments_by_type = separate_comments( $comments );

if ( ! empty( $comments_by_type['comment'] ) ) : ?>

	<!--Comments Section-->
	<div class="entry-comments" id="comments">	
		
		<h3><?php comments_number( __( '0 Comments', 'nora'), __( '1 Comment', 'nora' ), __( '% Comments', 'nora' ) ); ?></h3>      

        <?php if ( !comments_open() && '0' != get_comments_number() ) : ?>

			<p class="comments-closed"><?php _e( 'Comments are closed.', 'nora' ) ?></p>

		<?php else : ?>

        	<ol class="comment-list">
            	<?php wp_list_comments( 'type=comment&callback=nora_comment' ); ?>
        	</ol>

            <?php paginate_comments_links() ?>

    	<?php endif; ?>
	    		    	
	</div>

    <hr>

<?php elseif ( !comments_open() && !is_page() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    
    <p><?php esc_html_e( 'Comments are closed.', 'nora' ) ?></p>

    <hr>
    
<?php endif; ?>


<?php if ( comments_open() ) : ?>
    
	<!--Leave Response-->
	<?php
        $fields = array(
            'comment_field'        => '<label for="comment">' . __( 'Comment', 'nora' ) . '</label><p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
            'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'nora' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out</a>', 'nora' ), esc_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'title_reply'          => __( 'Leave a reply', 'nora' ),
            'title_reply_to'       => __( 'Leave a reply to %s', 'nora' ),
            'cancel_reply_link'    => __( 'Cancel reply', 'nora' ),
            'label_submit'         => __( 'Submit Comment', 'nora' )
        );
    ?>
    		    	
    <?php comment_form( $fields ); ?>
    
<?php endif; ?>
