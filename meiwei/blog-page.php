<?php
/*

Template Name: Blog Page

*/
?>

<?php get_header(); ?>
        
        <div id="content">
        
        	<div class="wrapper">
            
            <?php require_once('includes/submenu.php'); //our submenu ?>
            
				<?php
                
                    //DEFINES THE SIDEBAR DEPENDING ON LAYOUT
                    $postLayout = get_post_meta($post->ID, 'pageTemplate', true);
                    
                    
                    //if its right or left display sidebar
                    if(($postLayout == 'right') || ($postLayout == 'left')) :
                
                ?>
                
                	<div class="one-third<?php if($postLayout == 'right') { echo ' last right'; } else { echo ' left'; } ?>" id="sidebar">
                    
                    	<?php

							if(!function_exists('dynamic_sidebar') || !dynamic_sidebar("General Sidebar"));
							if(!function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar"));
						
						?>
                    
                    </div>
                    <!-- /#sidebar -->
                
                <?php endif; //ends sidebar if ?>
                
                <?php if(get_post_meta($post->ID, 'pageTemplate', true) == 'full') : //If its full width or left or right  ?>
                
                	<div class="one" id="main-content" style="margin-bottom: 50px;"> 
                
                <?php else : //if its right or left ?>
                
                	<div class="two-thirds<?php if(get_post_meta($post->ID, 'pageTemplate', true) == 'left') { echo ' last'; } ?>" id="main-content">
                
                <?php endif; //end of main content if ?>
                
                		<!-- <h6><?php the_title(); ?></h6> -->
                    
                    	<?php
						
							$args = array(
							
								'post_type' => 'post',
								'posts_per_page' => get_option('posts_per_page '),
								'paged' => get_query_var('page')
							
							);
							
							$wp_query = new WP_Query($args);
							
							if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();
						
						?>
                    
                            <div class="blog-post">
                            
                            	<?php if(has_post_thumbnail()) : //if has thumbnail ?>
                            
                                <div class="blog-image">
                                
                                	<?php if(ddp('blog_timthumb') == 'on') : ?>
                                    
                                    	<?php
										
											//our featured image src
											$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
											
											$timthumbSrc = get_bloginfo('template_url').'/includes/timthumb.php?q=100&amp;zc=1&amp;w='.ddp('blog_width').'&amp;h='.ddp('blog_height').'&amp;src='.$src[0];
											
											echo '<img src="'.$timthumbSrc.'" alt="'.get_the_title().'" />';
										
										?>
                                    
                                    <?php else : ?>
                                
                                    	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                    
                                    <?php endif; ?>
                                    
                                    <!-- <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a> -->
                                    
                                    <div class="comments">
                                    
                                        <a href="<?php the_permalink(); ?>#comments"><span class="num"><?php comments_number('0','1','%'); ?></span>评论</a>
                                    
                                    </div>
                                
                                </div>
                                <!-- /.blog-image-->
                                
                                <?php endif; //end of has post thumbnail ?>
                                
                                <div class="blog-info">
                                    <?php echo get_avatar( get_the_author_email(), '43' ); ?>
                                    <p class="author-name"><?php the_author(display_name); ?></p>
                                    <p class="date">写于：<?php the_time('Y年n月d日'); ?><span>分类于：<?php the_category(', '); ?></span></p>
                                </div>
								
                                <h1 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            
                                <?php
								
									if(get_the_excerpt()) {
										
										the_excerpt();
										
									} else {
										
										the_content('');
										
									}
								
								?>
                                
                                <!-- <p>&nbsp;</p>
                                
                                <p><?php if(ddp('blog_read_more')) : ?><a href="<?php the_permalink(); ?>" class="read-more"><?php echo ddp('blog_read_more'); ?></a><?php endif; ?></p> -->
                            
                            </div>
                            <!-- /.blog-post -->
                        
                        <?php
						
							endwhile; endif;
						
						?>
                        
                        <ul id="pagination">
                            <?php
                                 include('includes/pagination.php');
                                 if(function_exists('wp_pagenavi')) {wp_pagenavi();}
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