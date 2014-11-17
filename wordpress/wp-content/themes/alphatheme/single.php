<?php get_header(); ?>
  <div id="main">
    <div id="content">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
 
        <div id="meta">
	  <span>geschrieben am: <?php the_date('d.m.Y'); ?>
	  von: <?php the_author(); ?> in
	  Kategorie(n): <?php the_category(', '); ?><?php the_tags(' und getagged mit: ', '', ''); ?></span>
        </div>
 		<?php if (has_post_thumbnail()) { the_post_thumbnail('hard'); }else{}?> 
        <div class="entry">
	  <?php the_content(); ?>
	</div>
 
      <?php endwhile; endif; ?>
	<?php comments_template(); ?>
    </div><!-- content -->
 
    <div id="sidebar">
      <?php get_sidebar(); ?>
    </div><!-- #sidebar -->
  </div> <!-- #main -->
 
<?php get_footer(); ?>