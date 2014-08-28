<?php

	///////////////////////////////////////////
	///////////////////////////////////////////
	//// THIS FILE HANDLES OUR SHORTCODES
	//// FUNCTIONS AND STYLES
	//// DVP. BY GUILHERME SALUM - DDSTUDIOS
	//// DO NOT DISTRIBUTE, MODIFY OR REUSE
	///////////////////////////////////////////
	///////////////////////////////////////////
	
	
	
	////////////////////////////////////
	// LOADS OUR JS SCRIPT
	////////////////////////////////////
	
	//init hook
	add_action('init', 'ddShortIncludeJs');
	
	//our include js function
	function ddShortIncludeJs() {
		
		if(!is_admin()) {
			
			//shortcodes.js
			wp_register_script('ddshortcodes', get_bloginfo('template_url').'/ddpanel/shortcodes/js/shortcodes.js');
			
			//Enqueue our script
			wp_enqueue_script('jquery');
			wp_enqueue_script('ddshortcodes');
			
		}
		
	}
	
	
	
	////////////////////////////////////
	// LOADS OUR CSS FILES
	////////////////////////////////////
	
	//Let's now include our .css file
	add_action('wp_head', 'ddShortIncludeCss');
	
	//let's include the necessary file
	function ddShortIncludeCss() {
		
		//builds our CSS tag
		$output = '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/ddpanel/shortcodes/css/shortcodes.css" media="screen" />';
		
		echo $output;
		
	}
	
	
	
	////////////////////////////////////
	// OUR jQUERY ACTIVATORS
	////////////////////////////////////
	
	//Let's now include our .css file
	add_action('wp_head', 'ddShortIncludeJsActivators');
	
	//let's include the necessary file
	function ddShortIncludeJsActivators() {
		
		//builds our CSS tag
		$output = "
		<script type=\"text/javascript\">
		
			jQuery(document).ready(function() {
				
				jQuery('.ddtooltip').each(function() {
					
					jQuery(this).DDTooltip();
					
				});
				
				jQuery('.ddnotification').each(function() {
					
					jQuery(this).closeNotification();
					
				});
				
				jQuery('.ddimage-slider').each(function() {
					
					jQuery(this).ddImageSlider();
					
				});
				
				jQuery('.ddtoggle-open, .ddtoggle-closed').each(function() {
					
					jQuery(this).ddToggle();
					
				});
				
				jQuery('.ddtabbed').each(function() {
					
					jQuery(this).ddTabbed();
					
				});
				
			});
		
		</script>";
		
		echo $output;
		
	}
	
	
	
	////////////////////////////////////
	// NOW OUR SHORTCODES
	////////////////////////////////////
	
	//COLUMN TEMPLATE
	include('functions/columns/columns.php');
	
	//ROUNDED BUTTONS
	include('functions/buttons/rounded.php');
	
	//SQUARE BUTTONS
	include('functions/buttons/square.php');
	
	//ICON BUTTONS
	include('functions/buttons/icon.php');
	
	//BIG BUTTONS
	include('functions/buttons/big.php');
	
	//TOOLTIPS
	include('functions/tooltips/tooltips.php');
	
	//NOTIFICATIONS
	include('functions/notifications/notifications.php');
	
	//LISTS
	include('functions/lists/lists.php');
	
	//IMAGE SLIDER
	include('functions/slider/slider.php');
	
	//TOGGLE
	include('functions/toggle/toggle.php');
	
	//TOGGLE
	include('functions/tabbed/tabbed.php');
	
	//Twitter Feed
	include('functions/twitter/twitter.php');
	
	//Portfolio
	include('functions/portfolio/portfolio.php');
	
	//Contact
	include('functions/contact/contact.php');
	
	//Testimonial
	include('functions/testimonial/testimonial.php');
	
	//let's trick tinymce into thnking its a new version to clean up the cache
	function my_refresh_mce($ver) {
		
	  $ver += 3;
	  return $ver;
	  
	}
	
	//tricks tinyMCE
	add_filter( 'tiny_mce_version', 'my_refresh_mce');

?>