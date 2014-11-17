<?php
function register_my_menus() {
  register_nav_menus(
    array('menu' => __( 'Header Menu' ) )
  );
}
 
add_action ('init', 'register_my_menus');

function widgets_init() {

	register_sidebar( array(
	'name' => __( 'Sidebar'),
	'id' => 'sidebar-widget-area',
	'description' => __( 'Bereich für Widgets innerhalb der Sidebar' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<strong class="widget-title">',
	'after_title' => '</strong>',
	) );
	 
	register_sidebar( array(
	'name' => __( 'Footer'),
	'id' => 'footer-widget-area',
	'description' => __( 'Bereich für Widgets innerhalb des Footer'),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<strong class="widget-title">',
	'after_title' => '</strong>',
	) );
}


if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
  wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
  wp_enqueue_script('livereload');
}


add_action( 'widgets_init', 'widgets_init' );

add_theme_support( 'post-thumbnails' );

add_image_size( 'hard', 690, 300, true );
add_image_size( 'soft', 690, 300, false );
add_image_size( 'array', 690, 300, array('left', 'bottom') );
add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' ) );
