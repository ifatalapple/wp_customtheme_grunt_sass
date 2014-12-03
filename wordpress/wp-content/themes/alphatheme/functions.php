<?php

/**
* Load CSS and Javascript
*/

function load_styles_and_scripts(){

	//load styles
	wp_enqueue_style(
		'bootstrap-style',
		get_template_directory_uri(). '/dev/css/bootstrap-style.css'
	);

	wp_enqueue_style(
		'global',
		get_template_directory_uri(). '/dev/css/global.css'
	);


	wp_enqueue_style(
		'main',
		get_template_directory_uri(). '/style.css'
	);

	//load scripts

	wp_enqueue_script(
		'jquery',
		'http://code.jquery.com/jquery.min.js'
	);

	wp_enqueue_script(
		'bootstrap-scripts',
		get_template_directory_uri(). '/dev/js/production.min.js'
	);

}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');

/**
* Register main nav
**/

register_nav_menus(array(
	'main-nav' 		=> 'Main Navigation',
	'footer-nav' 	=> 'Footer Navigation'

));

/**
* Register Sidebar
**/
 
register_sidebar(array(
	'name'          => 'main-sidebar',
	'description'   => 'This is the main sidebar',
	'before_widget' => '<div class="span4"></div>',
	'after_widget'  => '',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>'
	)
);

/**
* Add thumbnail feature
**/

add_theme_support('post-thumbnails');

/**
* Bootstrap Comment Template
**/
		 
function comments_feed_template_callback($comment, $args, $depth){
	$GLOBAL['comment'] = $comment;
	?>
		<div class='media'>
			<a href="<?php echo get_comment_author(); ?>" class="pull-left">
				<?php echo get_avatar(get_the_author_ID() ); ?>
			</a>
			<div class="meida-body">
				<h5 class="media-heading">
					<a href="<?php echo get_comment_author(); ?>">
						<?php echo get_comment_author(); ?>
					</a>
					<small><?php comment_date(); ?> at <?php comment_time(); ?></small>
				</h5>

				<?php comment_text(); ?>

				<?php comment_reply_link( array_merge($args, array(
					'reply_text' 	=> __('<strong>reply</strong> <i class="icon-share-alt"></i>'),
					'depth' 		=> $depth,
					'max_depth'		=> $args['max_depth']
				))); ?>
			</div>
		</div>
	<?php 
}

/**
* Filter for adding class to thumbnail
**/

add_filter('get_avatar','add_avatar_class');

function add_avatar_class($class){
	$class = str_replace("class='avatar", "class='img-circle", $class);
	return $class;
}

/**
* add bootstrap btn style to replay link
**/

add_filter('comment_reply_link','add_reply_link_class');

function add_reply_link_class($class) {
	$class = str_replace("class='comment-reply-link", "class='btn btn-min pull-right", $class);
	return $class;
}

/**
* Register the Slide post type
**/

function create_slides_post_type() {
	$labels = array(
		'name'               => 'Slides', 
		'singular_name'      =>  'Slide', 
		'menu_name'          =>  'Slides',
		'name_admin_bar'     =>  'Slide', 
		'add_new'            =>  'Add New', 
		'add_new_item'       =>  'Add New Slide',
		'new_item'           =>  'New Slide', 
		'edit_item'          => 'Edit Slide', 
		'view_item'          =>  'View Slide', 
		'all_items'          =>  'All Slides', 
		'search_items'       =>  'Search slides', 
		'parent_item_colon'  =>  'Parent Slides:', 
		'not_found'          =>  'No Slides found.', 
		'not_found_in_trash' =>  'No Slides found in Trash.'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title')
	);

	register_post_type( 'slide', $args );
}

add_action('init', 'create_slides_post_type');



