<?php

$themename = "SP";
$shortname = "sp";

$options = array (


/* Start: Options */		
	array(  "name" => "Some Page Text",
			"type" => "heading",
			"desc" => "",
		   ),	
	
	array(  "name" => "",
			"id" => $shortname."_some",
			"type" => "textarea",
			"std" => ""
			),
/* End: Options */	
   
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=dashboard.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=dashboard.php&reset=true");
            die;

        }
    }

      add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
    
?>



<div class="wrap">
<h2><b><?php echo $themename; ?> theme options</b></h2>

<form method="post">

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>


<table class="optiontable" >

<?php foreach ($options as $value) { 
    
	
if ($value['type'] == "text") { ?>
        
<tr align="left"> 
    <th scope="row"><?php echo $value['name']; ?></th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
				
    </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small></td></tr>

<?php } elseif ($value['type'] == "textarea") { ?>
<tr align="left"> 
    <th scope="row"><?php echo $value['name']; ?></th>
    <td>
                   <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="80" rows="7"/><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_option($value['id'] )); } else { echo $value['std']; } ?>
</textarea>

				
    </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small></td></tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr align="left"> 
        <th scope="top"><?php echo $value['name']; ?></th>
	        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; }?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
			
        </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small></td></tr>






<?php } elseif ($value['type'] == "checkbox") { ?>
		
            <tr>
            <td style="width: 40%"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
                <td><?php if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        



<?php } elseif ($value['type'] == "heading") { ?>

   <tr valign="top"> 
		    <td colspan="2" style="text-align: left;"><h2 style="color:grey;"><?php echo $value['name']; ?></h2></td>
		</tr>
<tr><td colspan=2> <small> <p style="color:green; margin:0 0;" > <?php echo $value['desc']; ?> </P> </small></td></tr>

<?php } ?>
<?php 
}
?>
</table>






<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>


<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>