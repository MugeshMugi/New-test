<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php include(WP_PLUGIN_DIR . '/jquery-featured-posts-slider/featured-posts.php'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	
			<?php if ( is_front_page() ) { ?>
					

            
            <!-- Begin Content -->
		    <div id="content">
            
   
            
			<?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
            <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
                
            <br />
            
            <div class="columns">
                
                <!-- Left Column -->
                <div class="col_left">
                  <h1>A Bit of History</h1>
                  
                  <p><span class="large_letter">B</span>orn 1860, in Berlin, German, <strong>Gustav Johann Schiller</strong>, son of a furniture maker, was raised in a large family of eight children. At a young age, Gustav distinctively stood out among his siblings, like an orator has a natural choice of words.</p>
                  <p>Gustav had a facility with mechanics and tools. What his mind envisioned, his hands could put into reality - to fix and create parts for his father's factory, came easy to Gustav. At the age of 15, he joined his father's Furniture Company full time, quickly rising from Apprentice to Top Master Maker...</p>
                  
                  <p><a href="about-us" class="more">Read More »</a></p>
                </div>
                
                <!-- Middle Column -->
                <div class="col_mid">
                
                <h1>Featured</h1>
                
				<?php if (get_category('3')->category_count > 0 || get_category('3')->category_count > 0) { ?>	

					<?php $feature_query = new WP_Query('cat=3,4&posts_per_page=1&orderby=rand'); ?>
                
                	<?php while ($feature_query->have_posts()) : $feature_query->the_post(); ?>
                  
                      <div class="title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                      </div>
                      
                      <?php 
					  // Code for getting post thumb (featured image)
						  $imgURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'', false, '' );
					  ?>
					  
					  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					  <?php
						  $alt = the_title('', '', false);
						  $thumb_attr = array(
							  
							  'class'	=> "pic_border2",
							  'alt'	=> $alt,
							  'title'	=> $alt,
						  );
						  the_post_thumbnail( array(270,9999), $thumb_attr ); 
					  ?>
					  </a>
                      
                      <!--<p><?php echo substr(get_the_content(),0,190).'...'; ?></p>
                      <p><a href="<?php the_permalink(); ?>" class="more">View Piano &raquo;</a></p>-->
                      
                     <?php endwhile; ?>
                     
                 <?php } ?>
                 
                </div>
                
                <!-- Right Column -->
                <div class="col_right">
                  <h1>Top Pianos</h1>
                  <?php if (get_category('7')->category_count > 0) { ?>	

                      <ul>
                      
                          <?php $top_query = new WP_Query('cat=7&posts_per_page=10'); ?>
                        
                          <?php while ($top_query->have_posts()) : $top_query->the_post(); ?>
                              <li>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                              </li>
                          <?php endwhile; ?>
                          
                      </ul>
                 
                   <?php } ?>
                </div>
			
            </div>
            
            <div class="clear"></div>
            
            
		 </div>
		 <!-- End #content -->
               
                    
		<?php } else { ?>
        
        
        
        <!-- Begin Content -->
		 <div id="content">
		       
	     	<h1><?php the_title(); ?></h1>
            
            <div id="page">
            
                <div id="details">
                
                    <?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
                
                </div><!-- End #details -->
                
                
            </div><!-- End #page -->
            
            
		 </div>
		 <!-- End #content -->
        
                    
                    
		<?php } ?>				
	
    </div>

<div class="clear"></div>

<?php endwhile; ?>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>