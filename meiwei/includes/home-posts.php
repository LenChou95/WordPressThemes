<?php
	
	//////////////////////////////////
	// ADDS OUR HOME SLIDER POST TYPE
	//////////////////////////////////

	//Let's create out Custom post Types & taxonomies
	add_action('init', 'flerCustomHomePostsType');	
	
	//Adds Portfolio Posts
	function flerCustomHomePostsType() {
		
		//Adds Portfolio Posts
		register_post_type( 'home_posts',
			array(
				'labels' => array(
					'name' => __( 'Home Posts' ),
					'singular_name' => __( 'home_post' )
				),
				'public' => true,
				'menu_position' => 4,
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

?>