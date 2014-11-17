<div class="date"><?php the_time('l, d. F Y, h:i'); ?></div>
<div class="meta">
  <div class="author">Geschrieben von <?php the_author(); ?></div>
  <div><span>Kategorie(n):</span> <?php the_category(', '); ?></div>
  <?php the_tags('<div><span>Tags:</span> ', ', ', '</div>'); ?>
</div>
<div class="clear"></div>
  <a href="<?php the_permalink() ?>"><blockquote><span>&bdquo; </span><?php the_content(); ?><span>&rdquo;</span></blockquote></a>
<div class="quote_author">&ndash; <?php the_title(); ?></div>
<div class="meta_bottom">
  <a href="<?php echo get_post_format_link('quote'); ?>" class="quote_more">Weitere Zitate</a>
</div>