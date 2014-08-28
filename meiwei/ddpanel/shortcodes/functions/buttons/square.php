<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR SQUARED SMALL BUTTONS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('button_square', 'ddshort_button_square');
	
	//Our Funciton
	function ddshort_button_square($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'url' => '#',
			'color' => 'light'
		
		), $atts));
		
		//decide colors
		switch($color) {
			
			case 'blue':
				$class = 'square-blue';
				break;
			
			case 'orange':
				$class = 'square-orange';
				break;
			
			case 'green':
				$class = 'square-green';
				break;
			
			case 'purple':
				$class = 'square-purple';
				break;
			
			case 'pink':
				$class = 'square-pink';
				break;
			
			case 'red':
				$class = 'square-red';
				break;
			
			case 'grey':
				$class = 'square-grey';
				break;
			
			case 'light':
				$class = 'square-light';
				break;
			
			case 'black':
				$class = 'square-black';
				break;
			
			case 'grey-glossy':
				$class = 'square-grey-glossy';
				break;
			
			case 'light-glossy':
				$class = 'square-light-glossy';
				break;
			
		}
		
		return '<a href="'.$url.'" class="button-small '.$class.'"><span></span>'.$content.'</a>';
		
	}

?>