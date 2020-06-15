<?php
/*
* Template Name: Grands
*/

get_header(); ?>
   

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!-- Begin Content -->
<div id="content">

		<h1><?php the_title(); ?></h1>
	
    		<div id="page">
            
                <div id="details">
    
    				<?php the_content(); ?>
    
    
                
                	<?php if (get_category('3')->category_count > 0) { ?>	
                	
                    
                    
					<?php $piano_query = new WP_Query('cat=3&orderby=title&order=asc'); ?>
                    
                    <?php while ($piano_query->have_posts()) : $piano_query->the_post(); ?>
                      
                         <div class="product_border">   
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php 
                                $alt = the_title('', '', false);
                                $thumb_attr = array(
                                        
                                        'class'	=> "attachment-post-thumbnail",
                                        'alt'	=> $alt,
                                        'title'	=> $alt,
                                );
                                the_post_thumbnail( array(300,99999), $thumb_attr ); 
                                ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                                <?php 
									$color = get_post_meta($post->ID, "finish", true);
									if ($color != "") { 
										echo '<br /><span class="smallTxt">' . $color . '</span>';
									} else {
										// nothing
									}
								?>
                            </a>
                            <?php 
								$vidya = get_post_meta($post->ID, "video", true);
								if ($vidya != "") { 
									echo '<img src="'.get_bloginfo( 'template_url' ).'/images/video.png" width="10" height="10" alt="This product has a video" />';
								} else {
									// nothing
								}
							?>
                         </div>
                      
                      
                    <?php endwhile; ?>
                    
                    <div class="clear"></div>
                    
				
				<?php } else { ?>
						
                        There are no products at this time. Please check back later.
                
				<?php } ?>             
				
				
                
				
                    
                <div style="margin-top:50px;"><?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?></div>

		</div><!-- End #details -->
                
                
	</div><!-- End #page -->
            
            
</div>
<!-- End #content -->
<div class="clear"></div>

<?php endwhile; ?>

<?php get_footer(); ?>