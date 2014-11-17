<?php get_header(); ?>
  <div id="main">
    <div id="content">
      <h2 id="tag_title"><?php single_tag_title(); ?></h2>
      <div id="tag_description"><?php echo tag_description(); ?></div>
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