<?php

	class add_DDShortsPortfolio_button {
	
		var $pluginname = "ddshorts_portfolio";
		
		function add_DDShortsPortfolio_button()  {
			
			// Modify the version when tinyMCE plugins are changed.
			add_filter('tiny_mce_version', array(&$this, 'change_tinymce_version') );
			
			// init process for button control
			add_action('init', array (&$this, 'addShortPortfolio') );
			
		}
	
		function addShortPortfolio() {
		
			// Don't bother doing this stuff if the current user lacks permissions
			if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
			
			// Add only in Rich Editor mode
			if ( get_user_option('rich_editing') == 'true') {
			 
				// add the button for wp2.5 in a new way
				add_filter("mce_external_plugins", array(&$this, "add_DDShortsPortfolio_plugin" ), 5);
				add_filter('mce_buttons', array(&$this, 'register_DDShortsPortfolio_button' ), 5);
				
			}
		}
		
		// used to insert button in wordpress 2.5x editor
		function register_DDShortsPortfolio_button($buttons) {
		
			array_push($buttons, "", $this->pluginname );
			return $buttons;
			
		}
		
		// Load the TinyMCE plugin : (wp2.5)
		function add_DDShortsPortfolio_plugin($plugin_array) {    
		
			$plugin_array[$this->pluginname] =  get_bloginfo('template_url').'/ddpanel/shortcodes/functions/portfolio/portfolio.js';
			return $plugin_array;
			
		}
		
		function change_tinymce_version($version) {
			return ++$version;
		}
		
	}

	// Call it now
	$tinymce_button = new add_DDShortsPortfolio_button ();


?>