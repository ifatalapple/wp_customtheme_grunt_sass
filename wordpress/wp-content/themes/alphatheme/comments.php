<div id="comments_container">
  <?php foreach ($comments as $comment) : ?>
    <div class="comment" id="comment-<?php comment_ID() ?>">
      <div class="commentMeta"><?php comment_author_link() ?> am <?php comment_date('j. F Y') ?> um <?php comment_time('H:i') ?> Uhr</div>
      <?php comment_text() ?>

      <?php if ($comment->comment_approved == '0') : ?>
        <div>Dein Kommentar wird von uns überprüft und schnellstmöglich freigegeben.</div>
      <?php endif; ?>
    </div><!-- .comment -->
   <?php endforeach; ?>
</div><!-- #comments_container -->


<div id="comment_form">
  <h3 id="respond">Kommentar schreiben</h3>
	
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <div>
      <label for="author">Name</label><br />
      <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
    </div>
		
    <div>
      <label for="email">Email</label><br />
      <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
    </div>
		
    <div>
      <label for="url">Webseite</label><br />
      <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
    </div>
		
    <div>
      <label for="comment">Kommentar</label><br />
      <textarea name="comment" id="comment" rows="10" tabindex="4"></textarea>
    </div>
		
    <div>
      <input name="submit" type="submit" id="submit" tabindex="5" value="Kommentar abschicken" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    </div>
		
    <?php do_action('comment_form', $post->ID); ?>
  </form>
</div> <!-- #comment_form -->