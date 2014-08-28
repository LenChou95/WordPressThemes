<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR TOOLTIPS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('notification', 'ddshort_notification');
	
	//Our Funciton
	function ddshort_notification($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'type' => 'standard'
		
		), $atts));
		
		//decide colors
		switch($type) {
			
			case 'error':
				$class = 'notification-error';
				break;
			
			case 'standard':
				$class = 'notification-standard';
				break;
			
			case 'alert':
				$class = 'notification-alert';
				break;
			
			case 'info':
				$class = 'notification-info';
				break;
			
			case 'success':
				$class = 'notification-success';
				break;
			
		}
		
		return '<div class="ddnotification '.$class.'"><span class="icon"></span><span class="close"></span>'.do_shortcode($content).'</div>';
		
	}
	
	include('tinyMCE.php');

?>