
<?php get_header(); ?>
  <div id="main">
    <div id="content">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div><!-- #content -->
 
    <div id="sidebar">
      <?php get_sidebar(); ?>
    </div><!-- #sidebar -->
					
    <div class="clear"></div>
  </div><!-- #main -->
 
<?php get_footer(); ?>