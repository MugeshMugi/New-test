		jQuery(document).ready(function () {
			jQuery('a.gallery_colorbox').colorbox({ 
				slideshow: true,
								title: false,
								slideshowAuto:false,
								slideshowSpeed: 5000 ,
				slideshowStart: 'Play',
				slideshowStop :  'Pause',
				current : 'Image {current} of {total}', 
				scalePhotos : true , 
				previous: 'Previous',	
				next:'Next',
				close:'Close',
				maxWidth: 1920, 
				maxHeight : 1080,
				opacity:0.8 , 
				onComplete : function(){ 
					jQuery("#cboxLoadedContent").css({overflow:'hidden'});
								},
				rel:'group1' 
			});
		});	
						
		