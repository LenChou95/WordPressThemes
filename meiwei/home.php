<?php get_header(); ?>
        
        <div id="content">
        
        	<div class="wrapper">
            
            	<?php
				
					if(ddp('home_posts_no') == NULL) { $noPosts = 9999; } else { $noPosts = ddp('home_posts_no'); }
					
					$args = array(
					
						'post_type' => 'home_posts',
						'posts_per_page' => $noPosts
					
					);
					
					$homePosts = new WP_Query($args);
					
					if($homePosts->have_posts()) : while ($homePosts->have_posts()) : $homePosts->the_post();
				
				?>
            
                    <div class="content-block">
                    
                    	<h6><?php the_title(); ?></h6>
                    
                        <?php the_content(''); ?>
                    
                    </div>
                    <!-- /.content-block -->
                
                <?php
				
					endwhile; endif;
				
				?>
            
            </div>
            <!-- /.wrapper -->
        
        </div>
        <!-- /#content -->

<?php get_footer(); ?>