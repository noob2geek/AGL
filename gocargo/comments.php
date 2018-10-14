<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GoCargo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	    <ul class="single-comment ">
				<?php wp_list_comments('callback=gocargo_theme_comment'); ?>
			<?php
				// Are there comments to navigate through?
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
				<nav class="navigation comment-navigation" role="navigation">		   
					<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'gocargo' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'gocargo' ) ); ?></div>
	                <div class="clearfix"></div>
				</nav><!-- .comment-navigation -->
			<?php endif; // Check for comment navigation ?>

			<?php if ( ! comments_open() && get_comments_number() ) : ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'gocargo' ); ?></p>
			<?php endif; ?>	
	    </ul>		
	<?php endif; ?>	

	<?php
    	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		$aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' => 'reply-form',                                
                'title_reply'=> esc_html__('Post a Comment', 'gocargo'),
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' => '<div class="three_columns clearfix"><div class="column1"><div class="column_inner"><input id="author" name="author" id="name" type="text" value="" placeholder="'. esc_html__( 'Name', 'gocargo' ) .'" /></div></div>',
                    'email' => '<div class="column2"><div class="column_inner"><input value="" id="email" name="email" type="text" placeholder="'. esc_html__( 'Email', 'gocargo' ) .'" /></div></div>', 
                    'url' => '<div class="column3"><div class="column_inner"><input name="url" placeholder="'.esc_html__('WebSite', 'gocargo').'" id="url" type="text" /></div></div></div>',
                ) ),                                
                 'comment_field' => '<textarea rows="10" cols="45" name="comment" '.$aria_req.' id="comment" placeholder="'. esc_html__( 'Message', 'gocargo' ) .'" ></textarea>',                                                   
                 'label_submit' => esc_html__( 'Post a comment', 'gocargo' ),
                 'comment_notes_before' => '',
                 'comment_notes_after' => '',   
                 'class_submit'      => 'btn btn-custom',            
	        )
	    ?>
	    <?php comment_form($comment_args); ?>

</div><!-- #comments -->
