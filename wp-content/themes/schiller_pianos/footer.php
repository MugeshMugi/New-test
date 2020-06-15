<?php global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>

<?php
	
	ini_set('date.timezone', 'America/Chicago');
	$thisYear = date('Y');
?>
	 
   		<div class="push"></div><!-- pushes footer to bottom -->
		 
   </div>
   <!-- End Wrapper -->

<!-- Begin Footer -->
   <div id="footer_bg">
       <div id="footer">
                                  
          <div class="copyright">
              &copy; 2011 Schiller Piano Co. - All Rights Reserved
          </div>
          
          <div class="links">
              <ul class="footer_menu">
                  <?php add_last_class(wp_list_pages('sort_column=menu_order&title_li=&include=2,5,7,9,11,13&echo=0')); ?>
                 
              </ul>
          </div>
                   
       </div>
   </div>
   <!-- End Footer -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>