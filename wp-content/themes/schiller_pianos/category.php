<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<!-- Begin Content -->
<div id="content">

				<h1><?php
					printf( __( '%s', 'twentyten' ), '' . single_cat_title( '', false ) . '' );
				
					//get_cat_icon("small=true&link=false&cat=".get_cat_ID( single_cat_title("", false) )."&exclude=9");
				?>
                </h1>
                
              	<div id="page">
            
                <div id="details">
	
    			<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>
                
                </div>
                
                </div>
                
	
</div>

<div style="clear:both"></div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>