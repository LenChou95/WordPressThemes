<?php get_header(); ?>
        
        <div id="content">
        
        	<div class="wrapper">
            
            <?php require_once('includes/submenu.php'); //our submenu ?>
            
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            
				<?php
                
                    //DEFINES THE SIDEBAR DEPENDING ON LAYOUT
                    $postLayout = get_post_meta($post->ID, 'pageTemplate', true);
                    
                    
                    //if its right or left display sidebar
                    if(($postLayout == 'right') || ($postLayout == 'left')) :
                
                ?>
                
                	<div class="one-third<?php if($postLayout == 'right') { echo ' last right'; } else { echo ' left'; } ?>" id="sidebar">
                    
                    	<?php

							if(!function_exists('dynamic_sidebar') || !dynamic_sidebar("General Sidebar"));
							if(!function_exists('dynamic_sidebar') || !dynamic_sidebar("Page Sidebar"));
						
						?>
                    
                    </div>
                    <!-- /#sidebar -->
                
                <?php endif; //ends sidebar if ?>
                
                <?php if(get_post_meta($post->ID, 'pageTemplate', true) == 'full') : //If its full width or left or right  ?>
                
                	<div class="one" id="main-content" style="margin-bottom: 50px;"> 
                
                <?php else : //if its right or left ?>
                
                	<div class="two-thirds<?php if(get_post_meta($post->ID, 'pageTemplate', true) == 'left') { echo ' last'; } ?>" id="main-content">
                
                <?php endif; //end of main content if ?>
                        
                        <?php the_content(''); ?>
                    
                    </div>
                    <!-- /#main-contnet -->
            
            <?php endwhile; endif; //ends loop ?>
            
            </div>
            <!-- /.wrapper -->
        
        </div>
        <!-- /#content -->

<?php get_footer(); ?>