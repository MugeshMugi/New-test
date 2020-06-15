<?php
$location = $options_page; 
?>

<div class="wrap">
	<h2>jQuery Featured Posts Slider</h2>

	<p></p>
	  
	<?php $catname = get_option("featured_cat");?>
	
	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>
		
		<h3>Category</h3>
        <p style="color:#06C"><strong>Suggestion:</strong> Make a category named "Featured" or "Featured Posts" and use that as your slider category.
        <br />Add that category to the posts you want to feature.
        </p>
		<?php wp_dropdown_categories("name=featured_cat&orderby=name&selected=".$catname );?>
		
		<br /><br />
        
        <h3>Post Order</h3>
		<p style="color:#F60"><strong>Note: </strong>Choose how to order the posts, and in ascending or descending order.</p>
        
        
        	
        
        <?php
		
		function showOptionsDrop($array, $active, $echo=true){
			$string = '';
	
			foreach($array as $k => $v){
				$s = ($active == $k)? ' selected="selected"' : '';
				$string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
			}
	
			if($echo)   echo $string;
			else        return $string;
		}
	
		$options = array('date'=>'Date', 'title'=>'Title', 'author'=>'Author', 'modified'=>'Modified', 'id'=>'ID', 'comment_count'=>'Comment Count', 'rand'=>'Random');
		
		?>
        
        <label for="order_by">Order By:</label>
        <select name="order_by" id="order_by">	
        	<?php echo showOptionsDrop($options, get_option("order_by"), true); ?>
        </select>
        
        <?php
        function radio($array, $active) { 
			foreach($array as $k => $v){
				$s = ($active == $k)? ' checked="checked"' : '';
				$string .= '<input type="radio" name="order" id="order_'.$k.'" value="'.$k.'"'.$s.' /> '.$v."\n";
			}
			
			if($echo)   echo $string;
			else        return $string;

		}
		
		$radio_options = array('ASC'=>'Ascending', 'DESC'=>'Descending');
		?>	   
        
        <br />
        
        <label for="order">Order:</label>
        <?php echo radio($radio_options, get_option("order")); ?>
        
        
        <br /><br />
		
		<h3>Slider Transition Interval</h3>
		<p style="color: #CC3300"><strong>Note: </strong>Transition interval is in milliseconds (500,1000,1500, etc). <em>Example:</em> 1000 would be 1 second.
        <br />If you deactivate the plugin, then re-activate it, the transition resets to 2000.</p>

		<input name="transition_speed" id="transition_speed"  size="20" value="<?php echo get_option('transition_speed'); ?>" /> 
					 
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="featured_cat,transition_speed,order_by,order" />
	
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
	</form>    
	
	
</div>