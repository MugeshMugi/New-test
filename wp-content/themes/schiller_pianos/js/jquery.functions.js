// jQuery Functions
var $j = jQuery.noConflict();


/*
*****************************************************************************
*	Fader function, used to fade a class, or other element in the html.
*	Change the fadeTo params to get a different fade effect
*
*	From the jQuery documentation:
*   ------------------------------
*	.fadeTo( duration, opacity, [ easing ], [ callback ] )
*	duration	A string or number determining how long the animation will run.
*	opacity		A number between 0 and 1 denoting the target opacity.
*	easing		A string indicating which easing function to use for the transition.
*	callback	A function to call once the animation is complete.	
*****************************************************************************
*/
function fader(item) {
	$j(item).hover(function(){
		$j(this).stop().fadeTo(300, 0.5);
	},function(){
		$j(this).stop().fadeTo(300, 1.0);
	});
}

$j(document).ready(function() {	
	
	// Using the fader function to fade certain classes and id's
	fader(".fade");
	fader(".product_border");
	fader(".main_photo");
	fader("#additional-photos li");
	
	// Colorbox
	$j("a[rel='colorbox']").colorbox();
	
	// jCarousel for product thumbs
	$j('#additional-photos').jcarousel();
	
});