<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR TOOLTIPS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('toggle', 'ddshort_toggle');
	
	//Our Funciton
	function ddshort_toggle($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'state' => 'closed',
			'title' => 'Don\'t forget your title attribute!'
		
		), $atts));
		
		if($state == 'open') {
			
			$class = 'ddtoggle-open';
			
		} else {
			
			$class = 'ddtoggle-closed';
			
		}
		
		return '<div class="'.$class.'"><div class="toggle-handler">'.$title.'</div><div class="toggle-content">'.do_shortcode($content).'</div></div>';
		
	}
	
	include('tinyMCE.php');

?>