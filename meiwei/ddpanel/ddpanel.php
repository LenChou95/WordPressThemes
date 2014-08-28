<?php

	include('ddpanel-config.php');
	
	//shortened function to return option
	function ddp($name) {
		
		return stripslashes(get_option('ddp_'.$name));
		
	}
	
	//function to check our check option and return checked if 'on'
	function ddp_check($field) {
		
		if($field == 'on') {
			
			return 'checked="checked"';
			
		}
		
	}
	
	//function to check for our select dropdown
	function ddp_select($name, $field) {
		
		if($field == $name) {
			
			return 'class="current"';
			
		}
		
	}
	
	//function to check for our current layout
	function ddp_layout($field, $curr) {
		
		if($field == $curr) {
			
			return 'class="current"';
			
		}
		
	}

	//Add the menu link for our panel
	add_action('admin_menu', ddpAddMenu);
	
	//function to add our menu
	function ddpAddMenu() {
		
		//get our config array
		global $ddpConf;
		
		//Inserts our menu
		add_menu_page('DDPanel - '.$ddpConf['theme_name'], $ddpConf['theme_name'], 10, 'DDPanel', 'includeDDPanel');
		
	}
	
	//Our AJAX thingie
	if(version_compare($wp_version, "2.8", ">")) {
		
		//Make sure we load this in our <head>
		require_once('ddpanel-ajax-upload.php');
	
	}
	
	//function to our page
	function includeDDPanel() {
		
		//get our config array
		global $ddpConf;
		
		//Our settings
		global $myOpts;
		
		include('ddpanel-builder.php');
		
	}
	
	
	//SHORTCODES FRAMEWORK
	include('shortcodes/shortcodes.php');

?>