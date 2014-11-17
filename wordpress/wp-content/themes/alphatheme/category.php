<?php get_header(); ?>
  <div id="main">
    <div id="content">
      <h2 id="category_title"><?php single_cat_title( '', true ); ?></h2>
      <div id="category_description"><?php echo category_description(); ?></div>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="article">
          <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
          <?php the_content(); ?>
        </div> <!-- .article -->
      <?php endwhile; endif; ?>
    </div><!-- #content -->
 
    <div id="sidebar">
      <?php get_sidebar(); ?> 
    </div><!-- #sidebar -->
					
    <div class="clear"></div>
  </div><!-- #main --> 
<?php get_footer(); ?>