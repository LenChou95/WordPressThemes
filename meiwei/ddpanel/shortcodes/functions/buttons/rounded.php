<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR ROUNDED SMALL BUTTONS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('button_round', 'ddshort_button_round');
	add_shortcode('read_more', 'ddshort_read_more');
	
	//Our Funciton
	function ddshort_button_round($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'url' => '#',
			'color' => 'light'
		
		), $atts));
		
		//decide colors
		switch($color) {
			
			case 'blue':
				$class = 'rounded-blue';
				break;
			
			case 'orange':
				$class = 'rounded-orange';
				break;
			
			case 'green':
				$class = 'rounded-green';
				break;
			
			case 'purple':
				$class = 'rounded-purple';
				break;
			
			case 'pink':
				$class = 'rounded-pink';
				break;
			
			case 'red':
				$class = 'rounded-red';
				break;
			
			case 'grey':
				$class = 'rounded-grey';
				break;
			
			case 'light':
				$class = 'rounded-light';
				break;
			
			case 'black':
				$class = 'rounded-black';
				break;
			
			case 'grey-glossy':
				$class = 'rounded-grey-glossy';
				break;
			
			case 'light-glossy':
				$class = 'rounded-light-glossy';
				break;
			
		}
		
		return '<a href="'.$url.'" class="button-small '.$class.'"><span></span>'.$content.'</a>';
		
	}
	
	function ddshort_read_more($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'url' => '#'
		
		), $atts));
		
		if($content == null) { $content = 'Read More'; }
		
		return '<a href="'.$url.'" class="read-more">'.$content.'</a>';
		
	}
	
	include('tinyMCE.php');

?>