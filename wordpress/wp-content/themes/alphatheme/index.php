<?php get_header(); ?>
        <div id="main">
	  		<div id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    		<div <?php  post_class('article'); ?>>
		    			<?php get_template_part('content', get_post_format());?>
					</div> <!-- .article -->
		  		<?php endwhile; endif; ?>
        	</div><!-- #content -->
        
 		<div id="sidebar">
 		<?php get_sidebar(); ?>
		</div><!-- #sidebar -->
					
	  <div class="clear"></div>
	</div><!-- #main -->
<?php get_footer(); ?>

