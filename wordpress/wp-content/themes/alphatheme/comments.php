<?php
/**
* Comments template
**/

?>


	
<?php if ( 'open' == $post->comment_status ) : ?>

<div id="respond">

<h4><?php comment_form_title(); ?>
	<small><?php
		comments_number( $zero = '' , $one = '1' , $more = ('%'));
	?></small>
</h4>

<?php cancel_comment_reply_link(); ?>

<?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>
	<p>Logged in as <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account" class="muted">Log out &raquo;</a></p>

<?php else : ?>

	<label for="author">Name <?php if ( $req ) echo "( required )"; ?></label>
	<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="input-block-level" <?php if ($req) echo "aria-required='true'"; ?> />
	
	<label for="email">Email ( <?php if ( $req ) echo "required, "; ?>never shared )</label>
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="input-block-level" <?php if ($req) echo "aria-required='true'"; ?> />
	
	<label for="url">Website</label>
	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="input-block-level" />
	

<?php endif; ?>

<label for"comment"> Comment </label>
<textarea name="comment" id="comment" class="input-block-level" ></textarea>

<p>Some HTML is ok: <pre><?php echo allowed_tags(); ?></pre></p>

<input name="submit" type="submit" id="submit" class ="btn" value="Submit Comment" />
<?php do_action( 'comment_form', $post->ID ); comment_id_fields(); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // If comments are open: delete this and the sky will fall on your head ?>

<?php wp_list_comments(
	array(
		'type' 		=> 'comment',
		'callback' 	=> 'comments_feed_template_callback'
	)
); ?>


