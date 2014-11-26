<!-- this is where the footer file will begin -->
		<div id="push"></div>
	</div>   
	<footer>
		<div class="container">
			<div class="row">
				
				<div class="span4">
					&copy; 2013 <em> fatal </em>
				</div>
				<div class="span4">
					<?php 
	          			 wp_nav_menu(array(

	          				'theme_location' 	=> 'footer-nav',
	          				'container'			=> false,
	          				'menu_class' 		=> 'nav nav-pills',
	          			));
          			?>
				</div>
				<div class="span4">
					<i class="icon-hand-right icon-white"></i> <em> SOCIAL MEDIA LINKS </em> <i class="icon-hand-left icon-white"></i>
				</div>
			</div>

		</div>		

	</footer>
    
    <?php wp_footer();?>
  </body>
</html>