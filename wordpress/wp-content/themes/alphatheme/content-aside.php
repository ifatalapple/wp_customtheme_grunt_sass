<div class="date"><?php the_time('l, d. F Y, h:i'); ?></div>
<div class="meta">
	<div class="author">Geschrieben von <?php the_author(); ?></div>
  	<div><span>Kategorie(n):</span> <?php the_category(', '); ?></div>
  	<?php the_tags('<div><span>Tags:</span> ', ', ', '</div>'); ?>
</div>

<div class="clear"></div>

<div class="aside_content">
	<a href="the_permalink();"><?php the_content(); ?></a>
</div>
<div class="meta_bottom">
	<a href="<?php echo get_post_format_link('aside'); ?>" class="aside_more">Weitere Kurznachrichten</a>
</div>