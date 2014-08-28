<?php


	//Let's create out Custom post Types & taxonomies
	add_action('init', 'flerCustomPortfolioType');
	add_action('init', 'flerCustomPortfolioTaxonomy');	

	//Adds Portfolio Posts
	function flerCustomPortfolioType() {
		
		//Adds Portfolio Posts
		register_post_type( 'portfolio_posts',
			array(
				'labels' => array(
					'name' => __( 'Portfolio' ),
					'singular_name' => __( 'Portfolio Item' )
				),
				'public' => true,
				'menu_position' => 7,
				'query_var' => true,
				'supports' => array(
				
					'title',
					'editor',
					'custom-fields'
				
				),
				'rewrite' => array(
				
					'slug' => 'portfolio',
					'with_front' => false
				
				)
			)
		);
		
	}
	
	//ADDS OUR PORTFOLIO CATEGORIES
	function flerCustomPortfolioTaxonomy() {
		
		//Portfolio Categories
		register_taxonomy(
		
			'portfolio_cats',
			'portfolio_posts',
			array(
			
				'hierarchical' => true,
				'label' => 'Portfolio Categories'
			
			)
		
		);
		
	}
	
	
	
	
	
	//////////////////////////////////
	// ADDS OUR PORTFOLIO METABOXES
	//////////////////////////////////
	
	add_action('admin_menu', 'flerPortfolioMeta');
	add_action('save_post', 'flerSavePortfolioMeta');
	
	//OUR PAGE METABOXES
	function flerPortfolioMeta() {
		
		add_meta_box( 'flerPortfolio', 'Portfolio Images', 'flerCreatePortfolioMeta', 'portfolio_posts', 'side', 'high' );
		
	}
	
	//CREATES OUR METABOX INPUT
	function flerCreatePortfolioMeta() {
		
		global $post;
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_portFull', false, true );
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_portOther', false, true );
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_portWidth', false, true );
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp_nonce_portVid', false, true );
		include('portfolioMeta.php');
		
	}
	
	//SAVES OUR METABOX
	function flerSavePortfolioMeta($post_id) {
		
		global $post;	
		
		 if ( !wp_verify_nonce( $_POST['wp_nonce_portFull'], plugin_basename(__FILE__) )) { return $post_id; }
		 if ( !wp_verify_nonce( $_POST['wp_nonce_portOther'], plugin_basename(__FILE__) )) { return $post_id; }
		 if ( !wp_verify_nonce( $_POST['wp_nonce_portWidth'], plugin_basename(__FILE__) )) { return $post_id; }
		 if ( !wp_verify_nonce( $_POST['wp_nonce_portVid'], plugin_basename(__FILE__) )) { return $post_id; }
		
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
		
		update_post_meta($post_id, 'portFull', htmlspecialchars($_POST['portFull']));
		update_post_meta($post_id, 'portOther', htmlspecialchars($_POST['portOther']));
		update_post_meta($post_id, 'portWidth', htmlspecialchars($_POST['portWidth']));
		update_post_meta($post_id, 'portVid', htmlspecialchars($_POST['portVid']));
		
	}


?>