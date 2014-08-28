<?php

	//Configuration variables. Edit these
	$ddpConf = array(
		
		'panel_version' => 'DDPanel v1.2',
		'theme_name' => 'MeiWei',
		'theme_version' => '1.0'
	
	);
	
	$myOpts = array(
	
		array(
			
			'icon' => 'config.png',
			'name' => 'config',
			'title' => 'Main Options',
			'tabs' => array(
				
				'logo' => array(
					
					'name' => 'logo',
					'title' => 'Logo',
					'fields' => array(
					
						array(
							
							'type' => 'info',
							
							'icon' => 'info.png',
							
							'description' => 'In this area you can edit options of your logo and moch more. Take some time to edit the following:'
						
						),
						
						array(
							
							'type' => 'text',
							
							'name' => 'logo_url',
							
							'description' => 'the URL your logo will lead to. Blank will direct to the homepage.',
							'title' => 'Logo URL:',
							'default' => ''
						
						),
						
						array(
							
							'type' => 'image',
							'name' => 'logo_image',
							'description' => 'Insert the URL fo your logo image or upload a new one.',
							'title' => 'Logo Image:',
							'default' => get_bloginfo('template_url').'/images/logo.png'
						
						)
					
					)
				
				),
				
				'color_scheme' => array(
				
					'name' => 'tab_color',
					'title' => 'Styling',
					'fields' => array(
					
						array(
						
							'type' => 'info',
							'icon' => 'info.png',
							'description' => 'Select the desired color scheme for your theme'
						
						),
						
						array(
						
							'type' => 'select',
							'title' => 'Color Scheme',
							'name' => 'color_scheme',
							'description' => 'Select the desired Color Scheme',
							'options' => array(
							
								'Lime',
								'Baby-Blue',
								'Blue',
								'Orange',
								'Pink',
								'Red',
								'Grey',
								'Purple'
							
							),
							'default' => 'Lime'
						
						),
						
						array(
						
							'name' => 'top_border',
							'title' => 'Colored border at the top of the page',
							'description' => 'Switch on or off to display the colored border at the top of the page.',
							'type' => 'check',
							'default' => 'on'
						
						),
						
						array(
						
							'name' => 'header_bg',
							'title' => 'Header Background Image URL',
							'type' => 'text',
							'description' => 'THe URL of the image of oyur background. The image will be center aligned<br />and will blend in the color selected below.',
							'default' => get_bloginfo('template_url').'/images/bg-1.jpg'
						
						),
						
						array(
						
							'type' => 'colorpicker',
							'name' => 'header_bg_color',
							'title' => 'Header Background Color:',
							'description' => 'The background color of your header. Your background image will fade into this.',
							'default' => '000000'
						
						)
					
					)
				
				),
				
				array(
				
					'name' => 'tab_menu',
					'title' => 'Menu',
					'fields' => array(
					
						array(
						
							'name' => 'menu_type',
							'title' => 'Menu Layout',
							'type' => 'select',
							'description' => 'Select the menu variations of your theme',
							'default' => 'Big on Home &amp; Small on Pages',
							'options' => array(
							
								'Big on Home &amp; Small on Pages',
								'Always Big',
								'Always Small'
							
							)
						
						),
						array (
						
							'type' => 'check',
							'name' => 'menu_opacity',
							'title' => 'Enable Menu Opacity Animation?',
							'description' => 'Would you like to enable the hover animation on the menu? Choosing off will turn menus into grey.',
							'default' => 'on'
						
						)
					
					)
								
				),
				
				array(
				
					'name' => 'coyright_tab',
					'title' => 'Footer',
					'fields' => array(
					
						array(
						
							'type' => 'textarea',
							'name' => 'footer_left',
							'title' => 'Left text of your footer (HTML and Shortcodes accepted)',
							'description' => 'Insert the output on the left side of your footer. Shortcodes accepted.',
							'default' => '<ul class="list-icons">
                    
	<li><a href="#"><img src="'.get_bloginfo('template_url').'/images/footer-icon2.gif" alt="Proudly powered by wordpress" /></a></li>
                    
	<li><a href="#"><img src="'.get_bloginfo('template_url').'/images/footer-icon.gif" alt="Facebook Page" /></a></li>
                    
</ul>'
						
						),
					
						array(
						
							'type' => 'textarea',
							'name' => 'footer_right',
							'title' => 'Right text of your footer (HTML and Shortcodes accepted)',
							'description' => 'Insert the output on the right side of your footer. Shortcodes accepted.',
							'default' => '<p>&copy;2012 √¿Œ∂ È«©</p>
                    
<p><a href="#">Home</a> - <a href="#">Services</a> - <a href="#">Contact</a></p>'
						
						)
					
					)
				
				)
			
			)
		
		),
		
		array(
		
			'icon' => 'home.png',
			'title' => 'Home Options',
			'name' => 'sec_home',
			'tabs' => array(
			
				array(
				
					'name' => 'tab_homeposts',
					'title' => 'Home Content',
					'fields' => array(
					
						array(
						
							'type' => 'text',
							'name' => 'home_posts_no',
							'title' => 'Number of Home Posts Displayed:',
							'description' => 'Choose the number of home posts displayed in the homepage. If none is set, all posts are shown.',
							'default' => '3'
						
						)
					
					)
				
				),
			
				array(
				
					'name' => 'tab_home_slider',
					'title' => 'Homepage Slider',
					'fields' => array(
					
						array(
						
							'type' => 'check',
							'name' => 'home_slider',
							'title' => 'Home Slider',
							'description' => 'Turn On/Off Homepage Slider',
							'default' => 'on'
						
						),
					
						array(
						
							'type' => 'text',
							'name' => 'home_slider_no',
							'title' => 'Number of Sliders',
							'description' => 'The maximum number of slides in your homepage slider',
							'default' => '3'
						
						),
						
						array(
						
							'type' => 'text',
							'name' => 'slide_wait',
							'title' => 'Auto Slide Wait Time (miliseconds)',
							'description' => 'Wait time for your home slider slide',
							'default' => '7000'
						
						)
					
					)
				
				)
			
			)
		
		),
		
		array(
		
			'icon' => 'blog.png',
			'name' => 'blog_sec',
			'title' => 'Blog Options',
			'tabs' => array(
			
				array(
				
					'name' => 'blog_tab',
					'title' => 'General Blog Options',
					'fields' => array(
					
						array(
						
							'type' => 'check',
							'name' => 'blog_timthumb',
							'title' => 'Crop featured images using timthumb?',
							'description' => 'Enable this option if you want timthumb to crop your blog featured images.<br />If off is selected images are not cropped at all.',
							'default' => 'on'
						
						),
						
						array(
						
							'type' => 'text',
							'name' => 'blog_width',
							'title' => 'Featured Image Width',
							'description' => 'Set the width of your featured images.<br /> if timthumb is disabled images are not cropped and this option has no effect.',
							'default' => '250'
						
						),
						
						array(
						
							'type' => 'text',
							'name' => 'blog_height',
							'title' => 'Featured Image Height',
							'description' => 'Set the height of your featured images.<br /> if timthumb is disabled images are not cropped and this option has no effect.',
							'default' => '300'
						
						),
						
						array(
						
							'type' => 'text',
							'name' => 'blog_read_more',
							'title' => 'Read More Button Text:',
							'description' => 'The text displayed in your read more button',
							'default' => 'read more'
						
						),
						
						array (
						
							'type' => 'check',
							'name' => 'blog_excerpt',
							'title' => 'Post Excerpt on top of posts',
							'description' => 'Would you like to repeat the excerpt of your blog posts on the top of its single page?',
							'default' => 'on'
						
						)
					
					)
				
				)
			
			)
		
		),
		
		array(
		
			'icon' => 'analytics.png',
			'name' => 'sec_analytics',
			'title' => 'Google Analytics',
			'tabs' => array(
			
				array(
				
					'name' => 'tab_analytics',
					'title' => 'Google Analytics &amp; Other',
					'fields' => array(
					
						array(
						
							'type' => 'info',
							'icon' => 'info.png',
							'description' => 'Use the textarea below to insert any sort of tracking scripts you use. (ie. Google Analytics)'
						
						),
						
						array(
						
							'type' => 'textarea',
							'name' => 'analytics',
							'title' => 'Tracking Code',
							'description' => 'Insert any sort of tracking script you may use.'
						
						)
					
					)
				
				)
			
			)
		
		)
	
	);
	
	//lets loop trhoug our fields and check if they are already stored, if not store default values
	foreach($myOpts as $opt) {
		
		if($opt['tabs'] != NULL) { foreach($opt['tabs'] as $tab) {
			
			if($tab['fields'] != NULL) { foreach($tab['fields'] as $field) {
				
				//if the default value isn't null or its info type
				if($field['default'] != NULL && $field['type'] != 'info') {
					
					//if the option does not exist
					if(get_option('ddp_'.$field['name']) == FALSE) {
						
						//inserts the default option
						add_option('ddp_'.$field['name'], $field['default']);
						
					}
					
				}
				
			} }
			
		} }
		
	}

?>