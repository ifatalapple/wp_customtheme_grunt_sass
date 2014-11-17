<div class="date"><?php the_time('l, d. F Y, h:i'); ?></div>
<div class="meta">
  <div class="author">Geschrieben von <?php the_author(); ?></div>
  <div><span>Kategorie(n):</span> <?php the_category(', '); ?></div>
     <?php the_tags('<div><span>Tags:</span> ', ', ', '</div>'); ?>
</div>
<div class="clear"></div>
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<a href="<?php echo get_the_content(); ?>" class="link"><?php the_content(); ?></a>
<?php if (has_post_thumbnail()) { ?>
  <div class="artikelbild"> <?php the_post_thumbnail('array'); ?></div>
<?php } ?>
<div class="meta_bottom">
  <a href="<?php echo get_post_format_link('link'); ?>" class="link_more">Weitere Links</a>
</div>
	