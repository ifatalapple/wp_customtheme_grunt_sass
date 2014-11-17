<!DOCTYPE html>
<html lang="de">
  <head> 
    <meta charset="utf-8" /> 
    <title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>
 
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /> 
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
 
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wrapper">
      <div class="inner">
        <div id="header">
          	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			<span id="description"><?php bloginfo('description'); ?></span>
        </div><!-- #header -->
	<div id="menu">
		<?php wp_nav_menu( array(
    		'menu_class' => 'menu', //Fügt eine Klasse zum Menü hinzu
    		'container_id' => 'navwrap', //Legt ID von dem Container fest, der das komplette Menü umgibt
			)
  		); ?>
</div>