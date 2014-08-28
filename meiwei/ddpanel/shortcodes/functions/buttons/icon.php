<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR ICON SMALL BUTTONS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('button_icon', 'ddshort_button_icon');
	
	//Our Funciton
	function ddshort_button_icon($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'url' => '#',
			'icon' => 'accept'
		
		), $atts));
		
		//decide colors
		switch($icon) {
			
			case 'accept':
				$class = 'icon-accept';
				break;
			
			case 'add':
				$class = 'icon-add';
				break;
			
			case 'anchor':
				$class = 'icon-anchor';
				break;
			
			case 'cancel':
				$class = 'icon-cancel';
				break;
			
			case 'clock':
				$class = 'icon-clock';
				break;
			
			case 'coins':
				$class = 'icon-coins';
				break;
			
			case 'delete':
				$class = 'icon-delete';
				break;
			
			case 'heart':
				$class = 'icon-heart';
				break;
			
			case 'hourglass':
				$class = 'icon-hourglass';
				break;
			
			case 'house':
				$class = 'icon-house';
				break;
			
			case 'information':
				$class = 'icon-information';
				break;
			
			case 'lightbulb':
				$class = 'icon-lightbulb';
				break;
			
			case 'lightning':
				$class = 'icon-lightning';
				break;
			
			case 'lock':
				$class = 'icon-lock';
				break;
			
			case 'palette':
				$class = 'icon-palette';
				break;
			
			case 'refresh':
				$class = 'icon-refresh';
				break;
			
			case 'switch':
				$class = 'icon-switch';
				break;
			
			case 'asterisk':
				$class = 'icon-asterisk';
				break;
			
			case 'bell':
				$class = 'icon-bell';
				break;
			
			case 'bomb':
				$class = 'icon-bomb';
				break;
			
			case 'bricks':
				$class = 'icon-bricks';
				break;
			
			case 'briefcase':
				$class = 'icon-briefcase';
				break;
			
			case 'cake':
				$class = 'icon-cake';
				break;
			
			case 'color':
				$class = 'icon-color';
				break;
			
			case 'disconnect':
				$class = 'icon-disconnect';
				break;
			
			case 'door':
				$class = 'icon-door';
				break;
			
			case 'emoticon':
				$class = 'icon-emoticon';
				break;
			
			case 'feed':
				$class = 'icon-feed';
				break;
			
		}
		
		return '<a href="'.$url.'" class="button-icon '.$class.'"><span></span><em></em>'.$content.'</a>';
		
	}

?>