<?php
/*
* Template Name: Used Band
*/

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="contentWrap">

	<div id="content">

		<h1 class="title"><?php the_title(); ?></h1>
	
    			<?php the_content(); ?>
                
           
				
                
                
                <?php if (get_category('6')->category_count > 0) { ?>	
                	
                    
                    
					<?php $mel_query = new WP_Query('cat=6&orderby=slug&order=asc'); ?>
                    
                    <?php while ($mel_query->have_posts()) : $mel_query->the_post(); ?>
                      
                         <div class="exBorder">   
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php 
                                $alt = the_title('', '', false);
                                $thumb_attr = array(
                                        
                                        'class'	=> "attachment-post-thumbnail",
                                        'alt'	=> $alt,
                                        'title'	=> $alt,
                                );
                                the_post_thumbnail( array(200,150), $thumb_attr ); 
                                ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                                <?php 
								$color = get_post_meta($post->ID, "color", true);
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

	</div>

</div>
<div class="clear"></div>

<?php endwhile; ?>

<?php get_footer(); ?>