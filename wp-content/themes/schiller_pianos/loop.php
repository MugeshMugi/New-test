<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) { ?>
		<h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive.', 'twentyten' ); ?></p>
		<?php //get_search_form(); ?>

<?php } else { ?>

	<?php 
    $category = getCurrentCatID(); 
    $posts = query_posts($query_string . '&cat='. $category .'&orderby=title&order=asc');
    
	// The Loop
    while ( have_posts() ) : the_post(); ?>
              
             <div class="product_border">   
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php 
					$alt = the_title('', '', false);
					$thumb_attr = array(
							
							'class'	=> "attachment-post-thumbnail",
							'alt'	=> $alt,
							'title'	=> $alt,
					);
					the_post_thumbnail( array(300,9999), $thumb_attr ); 
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
    
    
    <?php endwhile;  // End the loop. Whew. ?>
    
    <div class="clear"></div>
    
    <?php 
		// In the Theme Options, this outputs the HTML in that textarea in this category (cat 12)
		if ($category == 12) {
    		//echo stripslashes($exc_melodica);	
		} // endif
	
	?>
    
    

<?php } ?>

<div style="margin-top:50px;"><?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?></div>