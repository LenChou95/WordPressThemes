<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html <?php language_attributes(); ?>>
	
    <!-- HEAD BEGINS -->
    <head>
    	
        <!-- CHARSET -->
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta property="wb:webmaster" content="37313201c815b0d6" />
        <meta property="qc:admins" content="1431674370751665" />
    	
        <!-- PAGE TITLE -->
    	<title><?php wp_title( '-', true, 'right' ); ?>  <?php bloginfo('name'); ?></title>
        
        <!-- CSS FILES -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
        <?php if(is_home()) :  ?><link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/<?php ddp_get_stylesheet(); ?>" media="screen" /><?php else : ?>
        
        <?php
		
			$pageColor = getPageColor(get_post_meta($post->ID, 'pageColor', true));
		
		?>
        
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/<?php echo $pageColor; ?>" media="screen" />
        
        <?php endif; ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/prettyPhoto.css" media="screen" />
        
        <!--[if IE 7]>
        <link href="<?php bloginfo('template_url') ?>/css/ie7.css" rel="stylesheet" type="text/css" />
		<![endif]-->
        
        <!-- WP_HEAD -->
        
        <?php wp_head(); ?>
                
        <!-- JQUERY ACTIVATORS -->
        <script type="text/javascript">
		
			jQuery(document).ready(function() {
				
				// Cufon.replace('#menu a', {
				//	 hover: true
				// });
				
				menuHovers(<?php if(ddp('menu_opacity') == 'on') { echo '1'; } else { echo '0'; } ?>);
				
				hideShowSubmenu();
				
				<?php if(is_home()) : ?>headerSliderInit();<?php endif; ?>
				
				jQuery("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'normal',theme:'light_square', show_title : false});
				
				jQuery('.portfolio-slide ul li').each(function() {
					
					jQuery(this).portfolioImageSlider();
					
				});
				
				submitContactForm();
				
				jQuery('#crew .cm').hover(function(){
					var cminfoWidth = jQuery(this).find('.cm-info').width();
					var cminfoHeight = jQuery(this).find('.cm-info').height();
					jQuery(this).find('.cm-info').css({'left':-(cminfoWidth-150)/2,'top':-cminfoHeight}).show();
				}, function(){
					jQuery(this).find('.cm-info').hide();
				});
				
			});
			
			jQuery(window).load(function() {
				
				headerSliderLoad(<?php echo ddp('slide_wait'); ?>);
				
			});
		
		</script>
        
        <style type="text/css">
		
			#header {
				
				background: #<?php echo ddp_header_color(get_post_meta($post->ID, 'pageHeaderBg', true)); ?> url(<?php echo ddp_header_image(get_post_meta($post->ID, 'pageHeaderImage', true)); ?>) no-repeat center top;
				
			}
		
		</style>
    
    </head>
    <!-- HEAD ENDS -->
    
    <body>
    
    	<div id="header"<?php if(is_home() && ddp('home_slider') == 'on') : ?>class="loading"<?php endif; ?>>
        
        	<?php
			
				//Top Border
				if(ddp('top_border') == 'on') :
			
			?>
        
        		<div id="header-border"></div>
            	<!-- /#header-border -->
                
            <?php endif; ?>
            
            <?php if(is_home()) : ?><div id="header-slider-bg" style=""></div><!-- /#header-slide-bg --><?php endif; ?>
        
        	<div class="wrapper">
            
            	<?php ddp_get_logo(); ?>
                
                <?php
				
					//// IF ITS OUR HOMEPAGE DISPLAY OUR HOMEPAGE SLIDER
					if(is_home() && ddp('home_slider') == 'on') :
				
				?>
                    
				<?php
                
                    $args = array(
            
                        'post_type' => 'home_slider',
                        'posts_per_page' => ddp('home_slider_no')
            
                    );
                    
                    $homeSliderQuery = new WP_Query($args);
                    
                    if($homeSliderQuery->have_posts()) : 
                
                ?>
                
                <div id="header-slider-content">
                
                	<ul>
                    
                    	<?php
						
							while($homeSliderQuery->have_posts()) : $homeSliderQuery->the_post();
						
						?>
                    
                            <li>
                            
                                <div class="header-bg"><?php echo get_post_meta($post->ID, 'homeSliderBg', true) ?>,<?php echo get_post_meta($post->ID, 'homeSliderImage', true) ?></div>
                            
                                <?php the_content(); ?>
                            
                            </li>
                            <!-- slider-item -->
                        
                        <?php endwhile; ?>
                    
                    </ul>
                    <!-- /#header-slider-content ul -->
                
                </div>
                <!-- /#header-slider-content -->
                
                <?php endif; ?>
                
                <?php endif; ?>
                
                <?php
				
					if(ddp('menu_type')  == 'Big on Home & Small on Pages') {
					
						if(!is_home()) {
							
							$class = 'menu-small';
							
						} else {
							
							$class = '';
							
						}
						
					} elseif(ddp('menu_type') == 'Always Small') {
						
						$class = 'menu-small';
						
					} else {
						
						$class = '';
						
					}
				
					wp_nav_menu( array(
					
						'menu'              => 'main_menu',
						'container'         => '',
						'container_class'   => '',
						'container_id'      => '',
						'menu_class'        => $class,
						'menu_id'           => 'menu',
						'echo'              => true,
						'fallback_cb'       => 'flerSecondaryMenu',
						'before'            => '',
						'after'             => '',
						'link_before'       => '',
						'link_after'        => '',
						'depth'             => 0,
						'walker'            => '',
						'theme_location'    => 'main_menu'
						
					) );
				
				?>
            
            </div>
            <!-- /#header .wrapper -->
        
        </div>
        <!-- /#header -->
