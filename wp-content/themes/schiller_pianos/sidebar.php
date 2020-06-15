<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<div id="sidebar">
	
    	<div class="sidebar-content">
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			
				<h3>Brands We Carry</h3>
                <div class="brands">
				<?php
					$brands = get_post_meta($post->ID, "brands", true);
					$upload_dir = wp_upload_dir();

					if ($brands != "") { 
					?>
					
                    <?php $brands = explode("~", $brands); ?>
            
					
						<?php foreach($brands as $brand) { ?>
                        
                        		<div><img border="0" src="<?php echo $upload_dir['baseurl']; ?>/<?php echo $brand; ?>" alt="" /></div>
                        
						<?php } ?>
					
					<div class="clear"></div>
					
				 <?php } ?>
                    
                 </div>
			

		<?php endif; // end primary widget area ?>
        </div>
	
</div>