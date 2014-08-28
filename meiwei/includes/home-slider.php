<?php
	
	//////////////////////////////////
	// ADDS OUR HOME SLIDER POST TYPE
	//////////////////////////////////

	//Let's create out Custom post Types & taxonomies
	add_action('init', 'flerCustomHomeSliderType');	
	
	//Adds Portfolio Posts
	function flerCustomHomeSliderType() {
		
		//Adds Portfolio Posts
		register_post_type( 'home_slider',
			array(
				'labels' => array(
					'name' => __( 'Slides' ),
					'singular_name' => __( 'Slide' )
				),
				'public' => true,
				'menu_position' => 25,
				'query_var' => true,
				'supports' => array(
				
					'title',
					'editor',
					'custom-fields',
					'thumbnail'
				
				),
				
				'rewrite' => array(
				
					'slug' => 'home-slide',
					'with_front' => false
				
				)
			)
		);
		
	}
	
	
	
	
	
	//////////////////////////////////
	// ADDS OUR HOME SLIDER METABOXES
	//////////////////////////////////
	
	add_action('admin_menu', 'flerHomeSliderMeta');
	add_action('save_post', 'flerSaveHomeSliderMeta');
	
	//OUR HOMESLIDER METABOXES
	function flerHomeSliderMeta() {
		
		add_meta_box( 'flerHomeSlider', 'Home Slider Images', 'flerCreateHomeSliderMeta', 'home_slider', 'side', 'high' );
		
	}
	
	//CREATES OUR METABOX INPUT
	function flerCreateHomeSliderMeta() {
		
		global $post;
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_homeSliderImage', false, true );
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_homeSliderBg', false, true );
		include('homeSliderMeta.php');
		
	}
	
	//SAVES OUR METABOX
	function flerSaveHomeSliderMeta($post_id) {
		
		global $post;	
		
		 if ( !wp_verify_nonce( $_POST['wp_nonce_homeSliderImage'], plugin_basename(__FILE__) )) { return $post_id; }
		 if ( !wp_verify_nonce( $_POST['wp_nonce_homeSliderBg'], plugin_basename(__FILE__) )) { return $post_id; }
		
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
		
		update_post_meta($post_id, 'homeSliderImage', htmlspecialchars($_POST['homeSliderImage']));
		update_post_meta($post_id, 'homeSliderBg', htmlspecialchars($_POST['homeSliderBg']));
		
	}

?>