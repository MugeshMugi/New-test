<?php
/*
Plugin Name: jQuery Featured Posts Slider
Plugin URI: http://www.jqueryslider.org.
Description: Displays 6 recent posts in a featured slideshow, including thumbnail, post excerpt, and link to full post.
Author: Erik Wiedeman
Version: 1.0
Author URI: http://www.driftingminds.com
*/

/* options page */
$options_page = get_option('url') . '/wp-admin/admin.php?page=jquery-featured-posts-slider/options.php';

define('JQFP_PLUGIN_URL',WP_PLUGIN_URL . '/jquery-featured-posts-slider');
define('JQFP_PLUGIN_FILE',WP_PLUGIN_DIR . '/jquery-featured-posts-slider/featured-posts.php');

function JQFP_head(){
?>
<link rel="stylesheet" href="<?php echo JQFP_PLUGIN_URL; ?>/style.css" />
<!--[if IE 7]>
<link href="<?php echo JQFP_PLUGIN_URL; ?>/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript" src="<?php echo JQFP_PLUGIN_URL; ?>/scripts/jquery.featureList.min.js"></script>
<script type="text/javascript" >
	
	var $jes = jQuery.noConflict();
	$jes(document).ready(function() {

			$jes.featureList(
				$jes("#tabs li a"),
				$jes("#output li"), {
					start_item			:	0,
					transition_interval : <?php echo get_option("transition_speed"); ?>
				}
			);

		});
	</script>
	
<?php

}
add_action('wp_head','JQFP_head');
function featured_options_page() {
	add_options_page('jQuery Featured Posts Slider', 'jQuery Featured Posts Slider', 10, 'jquery-featured-posts-slider/options.php');
}

add_action('admin_menu', 'featured_options_page');
register_activation_hook(__FILE__, 'myplugin_activate');
function myplugin_activate(){
	update_option('transition_speed',2000);
	update_option('order','ASC');
	update_option('order_by','date');
}
?>