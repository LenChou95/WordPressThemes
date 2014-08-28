<?php

	//DDStudios Framework
	require_once('ddpanel/ddpanel.php');
	
	
	
	
	//////////////////////////////////////////
	//	LOGO FUNCTION
	//////////////////////////////////////////
	
	function ddp_get_logo() {
		
		if(ddp('logo_url') == NULL) {
			
			echo '<h1 id="logo"><a href="'.get_bloginfo('wpurl').'"><img src="'.ddp('logo_image').'" alt="'.get_bloginfo('name').'" /></a></h1>';
			
		} else {
			
			echo '<h1 id="logo"><a href="'.ddp('logo_url').'"><img src="'.ddp('logo_image').'" alt="'.get_bloginfo('name').'" /></a></h1>';
			
		}
		
	}
	
	
	
	
	//////////////////////////////////////////
	//	LOGO FUNCTION
	//////////////////////////////////////////
	function ddp_get_stylesheet() {
		
		$curColor = ddp('color_scheme');
		
		switch($curColor) {
			
			case 'Lime':
				echo 'style-lime.css';
				break;
				
			case 'Baby-Blue':
				echo 'style-baby-blue.css';
				break;
				
			case 'Blue':
				echo 'style-blue.css';
				break;
				
			case 'Orange':
				echo 'style-orange.css';
				break;
				
			case 'Pink':
				echo 'style-pink.css';
				break;
				
			case 'Purple':
				echo 'style-purple.css';
				break;
				
			case 'Grey':
				echo 'style-grey.css';
				break;
				
			case 'Red':
				echo 'style-red.css';
				break;
			
		}
		
	}
	
	function getPageColor($color) {
		
		if($color == '') { $color = ddp('color_scheme'); }
		
		switch($color) {
			
			case 'Lime':
				return 'style-lime.css';
				break;
				
			case 'Baby-Blue':
				return 'style-baby-blue.css';
				break;
				
			case 'Blue':
				return 'style-blue.css';
				break;
				
			case 'Orange':
				return 'style-orange.css';
				break;
				
			case 'Pink':
				return 'style-pink.css';
				break;
				
			case 'Purple':
				return 'style-purple.css';
				break;
				
			case 'Grey':
				return 'style-grey.css';
				break;
				
			case 'Red':
				return 'style-red.css';
				break;
			
		}
			
		
		
	}
	
	function ddp_header_color($color) {
		
		if($color == '') {
			
			return ddp('header_bg_color');
			
		} else {
			
			return $color;
			
		}
		
	}
	
	function ddp_header_image($image) {
		
		if($image == '') {
			
			return ddp('header_bg');
			
		} else {
			
			return $image;
			
		}
		
	}
	
	
	
	
	////////////////////////////////////
	// LOADS OUR JS SCRIPTS
	////////////////////////////////////
	
	add_action('init', 'flerEnqueueScripts');
	
	function flerEnqueueScripts() {
		
		if(!is_admin()) {
			
			//scripts.js
			wp_register_script('flerScripts', get_bloginfo('template_url').'/js/scripts.js');
			
			//scripts.js
			wp_register_script('colorPlugin', get_bloginfo('template_url').'/js/jquery.color.js');
			
			//prettyphoto
			wp_register_script('prettyPhoto', get_bloginfo('template_url').'/js/jquery.prettyPhoto.js');
			
			//form_validation
			wp_register_script('form_validation', get_bloginfo('template_url').'/js/form_validation.js');
			
			//scripts.js
			wp_register_script('cufon', get_bloginfo('template_url').'/js/cufon-yui.js');
			
			//scripts.js
			wp_register_script('nobile.font', get_bloginfo('template_url').'/js/Nobile.font.js');
			
			//twitter_feed.js
			wp_register_script('twitter_feed', get_bloginfo('template_url').'/js/twitter.js');
			
			//twitter_feed.js
			wp_register_script('jQuery_cookies', get_bloginfo('template_url').'/js/jquery.cookies.js');
			
			//Enqueu our scripts
			wp_enqueue_script('jquery');
			wp_enqueue_script('colorPlugin');
			wp_enqueue_script('flerScripts');
			wp_enqueue_script('prettyPhoto');
			wp_enqueue_script('form_validation');
			wp_enqueue_script('cufon');
			wp_enqueue_script('nobile.font');
			wp_enqueue_script('twitter_feed');
			
		}
		
	}
	
	
	
	
	////////////////////////////////////
	// OUR HOME SLIDER CUSTOM POSTS AND ETC
	////////////////////////////////////
	
	require_once('includes/home-slider.php');
	
	
	
	
	////////////////////////////////////
	// OUR HOME CUSTOM POSTS
	////////////////////////////////////
	
	require_once('includes/home-posts.php');
	
	
	
	
	
	//register our menus
	add_action( 'init', 'registerFlerMenus' );
	
	function registerFlerMenus() {
		
		register_nav_menu( 'main_menu', __( 'Header Menu' ) );
		
	}
	
	
	// OUR SECONDARY MENU
	function flerSecondaryMenu() {
		
		echo '<ul id="menu">';
		
			wp_list_pages('title_li=');
		
		echo '</ul>';
		
	}
	
	
	

	///////////////////////////////////
	/// REGISTER OUR GENERAL SIDEBAR
	///////////////////////////////////
	
	if ( function_exists('register_sidebar') ) {
		
		register_sidebar(array(
		
			'name' => 'General Sidebar',
			'before_widget' => '<div class="sidebar-item">',
			'after_widget' => '</div>',
			'before_title' => '<h6>',
			'after_title' => '</h6>'
		
		));
		
	}
	
	
	
	
	////////////////////////////////////
	// PAGE FUNCTIONS AND ETC
	////////////////////////////////////
	
	include('includes/page.php');
	
	
	
	
	////////////////////////////////////
	// PAGE FUNCTIONS AND ETC
	////////////////////////////////////
	
	include('includes/blog.php');
	
	
	
	
	////////////////////////////////////
	// PAGE FUNCTIONS AND ETC
	////////////////////////////////////
	
	include('includes/portfolio.php');
	

	
	function custom_excerpt_length( $length ) {
		return 170;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length');



	function new_excerpt_more($more) {
       global $post;
		return '<a href="'. get_permalink($post->ID) . '"> ... 阅读全文</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
?>