<div class="date"><?php the_time('l, d. F Y, h:i'); ?></div> 
  <div class="meta">
    <div class="author">Geschrieben von <?php the_author(); ?></div>
    <div><span>Kategorie(n):</span> <?php the_category(', '); ?></div>
    <?php the_tags('<div><span>Tags:</span> ', ', ', '</div>'); ?>
  </div>
  <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
  <?php if (has_post_thumbnail()) { echo '<div class="artikelbild">'; the_post_thumbnail('array'); echo '</div>'; }?>
  <?php the_content('Weiterlesen'); ?>