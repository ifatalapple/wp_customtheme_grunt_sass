<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="span8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="row">
				<div class="page-header span8">
					<h2><?php the_title();?> <small><em>by: <?php the_author( ); ?></em></small></h2>
					<h4><?php the_date(); ?></h4>
				</div>
				

				<div class="row">
					<div class="span8">
						<?php the_content(); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="span8">
						<?php comments_template(); ?>
					</div>
				</div>
				
				<?php endwhile; ?>
				<!-- post navigation -->
				<?php else: ?>
				<!-- no posts found -->
				<?php endif; ?>
			</div>
		</div>
		<div class="span4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>