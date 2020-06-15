<?php 
if (function_exists('JQFP_head')) {

	$category = get_option('featured_cat');
	$order_by = get_option('order_by');
	$order = get_option('order');
	$numberposts = 4; 
?>
<?php if ( is_front_page() ) { ?>
<?php	$featured_slider = new WP_Query("cat=".$category."&showposts=".$numberposts."&orderby=".$order_by."&order=".$order);	?>
<?php if($featured_slider->have_posts()) { ?>

<h1 class="featured">Featured Pianos</h1>

<div id="feature_list_bg">        

		<div id="feature_list">
			
            <ul id="tabs">
            	<?php if($featured_slider->have_posts()) : while($featured_slider->have_posts()) : $featured_slider->the_post(); ?>
				<?php 
					$bad = array("-", "&", "–", "#8211;");
					//$good = str_replace($bad, "", $post_title);
                    if(get_post_meta($post->ID,"replacement_title",true)){
                        $post_title = get_post_meta($post->ID,"replacement_title",true);
						$post_title = str_replace($bad, " ", $post_title);;
                    }
                    else {
                        $post_title = get_the_title(get_the_ID());
						$post_title = str_replace($bad, " ", $post_title);
                    }	
                ?>
				<li>
					<a href="javascript:;">
						
						<?php 
							$title_length = strlen($post_title);
							//echo $title_length;
							if ($title_length > 38) {
								echo '<div class="tab_title">' . substr($post_title,0,37).'...' . '</div>';
								
								$finish = get_post_meta($post->ID, "finish", true);
								if ($finish != "") { 
									echo $finish;
								} else {
									// nothing
								}
					 
							} else {
								echo '<div class="tab_title">' . $post_title . '</div>';
								
								$finish = get_post_meta($post->ID, "finish", true);
								if ($finish != "") { 
									echo $finish;
								} else {
									// nothing
								}
							}
						?>
						
					</a>
				</li>
                <?php endwhile; endif; ?>
			</ul>
			
            <ul id="output">
				<?php if($featured_slider->have_posts()) : while($featured_slider->have_posts()) : $featured_slider->the_post(); ?>
                <?php 
					if(get_post_meta($post->ID,"replacement_title",true)){
						$post_title = get_post_meta($post->ID,"replacement_title",true);
					}
					else {
						$post_title = get_the_title(get_the_ID());
					}	
				?>
                <?php
					/*$blogurl = get_bloginfo('wpurl'); 
					$longurl = get_post_meta($post->ID,'slider_image',true); 
					$newurl= str_replace($blogurl,"", $longurl);
					$newurl= str_replace("//","/", $newurl);*/
				?>
				<?php               
                	$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);
				?>
                <li>
                	<div class="imgOuter"><div class="imgInner">
                    <a href="<?php the_permalink();?>">
                    <img src="<?php echo JQFP_PLUGIN_URL; ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&h=320" alt="<?php echo $post_title; ?>" />
                    </a>
                    </div></div>
                    <div class="featured_title"><?php echo $post_title; ?></div>
                    <?php 
						$color = get_post_meta($post->ID, "finish", true);
						if ($color != "") { 
							echo '<div class="featured_finish">' . $color . '</div>';
						} else {
							// nothing
						}
					?>
                	<div class="featured_desc">
                    <?php 
						$description = get_the_content();
						$description = strip_tags($description);
						$description = substr($description,0,200).'...';
					?>
                    <?php echo $description; ?>
                    </div>
                    
					<a href="<?php the_permalink();?>" class="more">Read more...</a>
				</li>
                <?php endwhile; endif; ?>
                
			</ul>

		</div>
		        
</div>
<?php } ?>

<?php } ?>

<?php } ?>