<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR TOOLTIPS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('list', 'ddshort_list');
	add_shortcode('li', 'ddshort_list_li');
	
	//Our Funciton
	function ddshort_list($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'type' => 'tick'
		
		), $atts));
		
		//decide colors
		switch($type) {
			
			case 'tick':
				$class = 'tick';
				break;
			
			case 'BW':
				$class = 'BW';
				break;
			
			case 'arrow':
				$class = 'arrow';
				break;
			
			case 'hot':
				$class = 'hot';
				break;
			
			case 'star':
				$class = 'star';
				break;
			
			case 'clip':
				$class = 'clip';
				break;
			
			case 'blue':
				$class = 'blue';
				break;
			
			case 'black':
				$class = 'black';
				break;
			
			case 'green':
				$class = 'green';
				break;
			
			case 'orange':
				$class = 'orange';
				break;
			
			case 'yellow':
				$class = 'yellow';
				break;
			
			case 'pink':
				$class = 'pink';
				break;
			
			case 'purple':
				$class = 'purple';
				break;
			
			case 'red':
				$class = 'red';
				break;
			
		}
		
		return '<ul class="list-'.$type.'">'.do_shortcode($content).'</ul>';
		
	}
	
	function ddshort_list_li($atts, $content = null) {
		
		return '<li>'.do_shortcode($content).'</li>';
		
	}
	
	include('tinyMCE.php');

?>