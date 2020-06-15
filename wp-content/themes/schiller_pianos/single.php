<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<!-- Begin Content -->
<div id="content">
		       

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<h1><?php the_title(); ?></h1>
                    
                    
                    <div id="page">
            
                		<div id="product">
                
                            <div class="product_info">
                            	<?php 
									$color = get_post_meta($post->ID, "finish", true);
									if ($color != "") { 
										echo '<h2 class="finish">' . $color . '</h2>';
									} else {
										// nothing
									}
								?>
                            
                                <?php the_content('',FALSE,'t'); ?>
                        	</div><!-- End .product_info -->
                        
                    		<div class="product_photos">
						
                                <div class="main_photo">
                                    <?php 
									// Code for getting post thumb (featured image)
										$imgURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'', false, '' );
									?>
									
									<a href="<?php echo $imgURL[0]; ?>" rel="colorbox">
                                    <?php
										$alt = the_title('', '', false);
										$thumb_attr = array(
											
											'class'	=> "single-post-thumbnail",
											'alt'	=> $alt,
											'title'	=> $alt,
										);
										the_post_thumbnail( array(450,9999), $thumb_attr ); 
									?>
                                    </a>
                                </div>
                                
                                
                                
                                
                                <?php
									$thumbs = get_post_meta($post->ID, "images", true);
									$upload_dir = wp_upload_dir();
				
									if ($thumbs != "") { 
									?>
									
									<?php $thumbs = explode("~", $thumbs); ?>
                                    
                                    <ul id="additional-photos" class="jcarousel-skin-schiller">
									
										<?php foreach($thumbs as $thumb) { ?>
										
											<?php
												// Fix for the first image getting %0A appended to the image URL
												$replace = array("%0A", "\n", "\r");
												$thumb = str_replace($replace, "", $thumb);
											?>
                                            
                                            <li><a href="<?php echo $upload_dir['baseurl']; ?>/<?php echo $thumb; ?>" rel="colorbox">
										<img border="0" src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $upload_dir['baseurl']; ?>/<?php echo $thumb; ?>&w=100&h=100&zc=1" width="100" height="100" alt="<?php the_title(); ?>" />
									</a></li>
										
										<?php } ?>
									
									<div class="clear"></div>
									
									<?php } ?>
                        
                        	</div><!-- End .product_photos -->
                    
                    	</div><!-- End #product -->
                
                	</div><!-- End #page -->
                    

                    
                    <?php
					$video = get_post_meta($post->ID, "video", true);

					if ($video != "") { 
					?>
                    
                    <a name="video"></a>
					<h1>Video</h3>
	
                        <div id="videosec" style="float:left;">This site uses Adobe Flash Player, <a href="http://www.adobe.com/go/getflashplayer">please go here to download the player.</a> </div>
                            <script type="text/javascript">
                           var so = new SWFObject("<?php bloginfo('template_directory'); ?>/flash/videoWide.swf?videoPath=<?php echo $video; ?>&bufferSize=5&autoPlay=false&videoVolume=100&imgPath=<?php bloginfo('template_directory'); ?>/images/video/intro.jpg&logo=<?php bloginfo('template_directory'); ?>/images/video/logo.png&logoPlacement=topRight&logoLink=http://www.schillerpianoco.com&logoLinkTargetWindow=_blank&bgColor=0x802416&borderColor=0x151515&buttonsBGColor=0x0D0D0D&buttonElementsColor=0x999999&buttonElementsRollOverColor=0xffffff", "Video", "640", "360", "9", "#000000");
                           so.addParam("quality", "high");
                           so.addParam("menu", "false");
                           so.addParam("loop", "false");
                           so.addParam("scale", "noscale");
                           so.addParam("allowFullScreen", "false");
                           so.write("videosec");
                            </script>
                         <div align="center" style="float:right; width:240px; margin:0 25px 0 0;">
                         	<h3 class="video">Video not playing?</h3>
                            <strong><a href="http://www.adobe.com/go/getflashplayer" target="blank">Update your Flash Player here</a></strong><br /><br />
                            <a href="http://www.adobe.com/go/getflashplayer" target="blank"><img src="<?php bloginfo('template_directory'); ?>/images/video/getflashplayer.png" width="158" height="39" border="0" class="fade" /></a>
                            
                         </div>
					
					<div class="clear"></div>
					
					<?php } ?>

						
					<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

   
</div>
<!-- End #content -->				


<?php endwhile; // end of the loop. ?>

</div>

<?php //get_sidebar(); ?>

<div class="clear"></div>

</div>

<?php get_footer(); ?>