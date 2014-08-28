<?php get_header(); ?>
        
        <div id="content">
        
        	<div class="wrapper">
            
            <?php require_once('includes/submenu.php'); //our submenu ?>
                
                	<div class="one-third right last" id="sidebar">
                    
                    	<?php

							if(!function_exists('dynamic_sidebar') || !dynamic_sidebar("General Sidebar"));
							if(!function_exists('dynamic_sidebar') || !dynamic_sidebar("Page Sidebar"));
						
						?>
                    
                    </div>
                    <!-- /#sidebar -->
                
                <?php if(get_post_meta($post->ID, 'pageTemplate', true) == 'full') : //If its full width or left or right  ?>
                
                	<div class="one" id="main-content" style="margin-bottom: 50px;"> 
                
                <?php else : //if its right or left ?>
                
                	<div class="two-thirds<?php if(get_post_meta($post->ID, 'pageTemplate', true) == 'left') { echo ' last'; } ?>" id="main-content">
                
                <?php endif; //end of main content if ?>
                
                		<h6>Not found</h6>
                    
                    	<h1><a href="<?php bloginfo('wpurl'); ?>">page not found</a></h1>
                        
                        <p>Looks like you were not able to find the page you're looking for. This page may have been moved or deleted or never existed at all.</p>
                        
                        <p>Please check your URL typing or use our search field.</p>
                        
                        <ul id="pagination">
                            
                            <?php
                                    
                                //includes pagination
                                include('includes/pagination.php');
                                if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
                                    
                            ?>
                            
                        </ul>
                        <!-- /#pagination -->
                    
                    </div>
                    <!-- /#main-contnet -->
            
            </div>
            <!-- /.wrapper -->
        
        </div>
        <!-- /#content -->

<?php get_footer(); ?>