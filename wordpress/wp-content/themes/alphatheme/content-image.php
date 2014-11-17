<div class="date"><?php the_time('l, d. F Y, h:i'); ?></div>
<div class="meta">
     <div class="author">Geschrieben von <?php the_author(); ?></div>
  <div><span>Kategorie(n):</span> <?php the_category(', '); ?></div>
  <?php the_tags('<div><span>Tags:</span> ', ', ', '</div>'); ?>
</div>
<div class="clear"></div>
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<?php the_content(); ?>
<div class="meta_bottom">
  <a href="<?php echo get_post_format_link('image'); ?>" class="image_more">Weitere Bilder</a>
</div>