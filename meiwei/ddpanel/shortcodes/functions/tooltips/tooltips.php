<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR TOOLTIPS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('tooltip', 'ddshort_tooltip');
	
	//Our Funciton
	function ddshort_tooltip($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'text' => 'You have forgotten to include your "text" attribute to display your tooltip.',
			'color' => 'light'
		
		), $atts));
		
		//decide colors
		switch($color) {
			
			case 'blue':
				$class = 'tooltip-blue';
				break;
			
			case 'orange':
				$class = 'tooltip-orange';
				break;
			
			case 'green':
				$class = 'tooltip-green';
				break;
			
			case 'purple':
				$class = 'tooltip-purple';
				break;
			
			case 'pink':
				$class = 'tooltip-pink';
				break;
			
			case 'red':
				$class = 'tooltip-red';
				break;
			
			case 'grey':
				$class = 'tooltip-grey';
				break;
			
			case 'light':
				$class = 'tooltip-light';
				break;
			
			case 'black':
				$class = 'tooltip-black';
				break;
			
		}
		
		return '<span class="ddtooltip '.$class.'"><span class="tooltip-body"><span class="tooltip-arrow"></span>'.$text.'</span>'.do_shortcode($content).'</span>';
		
	}
	
	include('tinyMCE.php');

?>