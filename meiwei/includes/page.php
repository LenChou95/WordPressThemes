<?php

	///////////////////////////////////
	/// REGISTER OUR PAGE SIDEBAR
	///////////////////////////////////
	
	if ( function_exists('register_sidebar') ) {
		
		register_sidebar(array(
		
			'name' => 'Page Sidebar',
			'before_widget' => '<div class="sidebar-item">',
			'after_widget' => '</div>',
			'before_title' => '<h6>',
			'after_title' => '</h6>'
		
		));
		
	}
	
	
	
	
	
	//////////////////////////////////
	// ADDS OUR PAGE METABOXES
	//////////////////////////////////
	
	add_action('admin_menu', 'flerPageMeta');
	add_action('save_post', 'flerSavePageMeta');
	
	//OUR PAGE METABOXES
	function flerPageMeta() {
		
		add_meta_box( 'flerPage', 'Page Layout', 'flerCreatePageMeta', 'page', 'side', 'high' );
		
	}
	
	//CREATES OUR METABOX INPUT
	function flerCreatePageMeta() {
		
		global $post;
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_pageTemplate', false, true );
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_pageColor', false, true );
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_pageHeaderImage', false, true );
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_pageHeaderBg', false, true );
		include('pageMeta.php');
		
	}
	
	//SAVES OUR METABOX
	function flerSavePageMeta($post_id) {
		
		global $post;	
		
		 if ( !wp_verify_nonce( $_POST['wp_nonce_pageTemplate'], plugin_basename(__FILE__) )) { return $post_id; }
		 if ( !wp_verify_nonce( $_POST['wp_nonce_pageColor'], plugin_basename(__FILE__) )) { return $post_id; }
		 if ( !wp_verify_nonce( $_POST['wp_nonce_pageHeaderImage'], plugin_basename(__FILE__) )) { return $post_id; }
		 if ( !wp_verify_nonce( $_POST['wp_nonce_pageHeaderBg'], plugin_basename(__FILE__) )) { return $post_id; }
		
		//verify if it's autosave
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return $post_id; }
		
		  // Check permissions
		  if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) )
			  return $post_id;
		  } else {
			if ( !current_user_can( 'edit_post', $post_id ) )
			  return $post_id;
		  }
		
		update_post_meta($post_id, 'pageTemplate', htmlspecialchars($_POST['pageTemplate']));
		update_post_meta($post_id, 'pageColor', htmlspecialchars($_POST['pageColor']));
		update_post_meta($post_id, 'pageHeaderImage', htmlspecialchars($_POST['pageHeaderImage']));
		update_post_meta($post_id, 'pageHeaderBg', htmlspecialchars($_POST['pageHeaderBg']));
		
	}

?>