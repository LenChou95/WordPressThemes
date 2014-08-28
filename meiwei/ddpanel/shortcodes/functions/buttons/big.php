<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR BIG BUTTONS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('big_button', 'ddshort_button_big');
	
	//Our Funciton
	function ddshort_button_big($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'url' => '#',
			'color' => 'light',
			'desc' => 'Don\'t forget your description'
		
		), $atts));
		
		//decide colors
		switch($color) {
			
			case 'blue':
				$class = 'big-blue';
				break;
			
			case 'orange':
				$class = 'big-orange';
				break;
			
			case 'green':
				$class = 'big-green';
				break;
			
			case 'purple':
				$class = 'big-purple';
				break;
			
			case 'pink':
				$class = 'big-pink';
				break;
			
			case 'red':
				$class = 'big-red';
				break;
			
			case 'grey':
				$class = 'big-grey';
				break;
			
			case 'light':
				$class = 'big-light';
				break;
			
			case 'black':
				$class = 'big-black';
				break;
			
			case 'grey-glossy':
				$class = 'big-grey-glossy';
				break;
			
			case 'light-glossy':
				$class = 'big-light-glossy';
				break;
			
			case 'dashed':
				$class = 'big-dashed';
				break;
			
		}
		
		return '<a href="'.$url.'" class="button-big '.$class.'"><span></span>'.$content.'<em>'.$desc.'</em></a>';
		
	}

?>