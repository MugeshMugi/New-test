<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );
	$color = get_post_meta($post->ID, "color", true);
	if ($color != "" && is_single()) { 
		echo '' . $color . ' | ';
	} else {
		// nothing
	}
	echo get_bloginfo( 'name', 'display' );

	?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/swfobject.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.colorbox-min.js"></script>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.jcarousel.min.js"></script>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.badBrowser.js"></script>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.functions.js"></script>

<!--[if IE 7]>
<link href="<?php bloginfo( 'template_url' ); ?>/IE7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 8]>
<link href="<?php bloginfo( 'template_url' ); ?>/IE8.css" rel="stylesheet" type="text/css" />
<![endif]-->


<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	/*if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );*/

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/contact-form.css" />

</head>

<body <?php body_class(); ?>>

            
<!-- Begin Wrapper -->
   <div id="wrapper">
   
     	  <!-- Begin Header -->
          <div id="header">
			  <div class="logo_container">
              	<div class="logo"><a href="<?php bloginfo( 'url' ); ?>" class="linkFill" title="Home"></a></div>
              </div>
              
              <div class="navigation">
              	<ul class="the_left_menu">
                	<?php wp_list_pages('sort_column=menu_order&title_li=&include=2,5,7'); ?>
                </ul>
				<ul class="the_right_menu">
                	<?php wp_list_pages('sort_column=menu_order&title_li=&include=9,11,13'); ?>
                 </ul>
              </div>
			  
              <div id="cities"></div>
          </div>
		  <!-- End Header -->