<?php get_header(); ?>
        
        <div id="content">
        
        	<div class="wrapper">
            
            <?php require_once('includes/submenu.php'); //our submenu ?>
                
                	<div class="one" id="main-content" style="margin-bottom: 50px;"> 
                
                		<!-- <h6><?php the_title(); ?></h6> -->
                    
                    	<?php
							
							if(have_posts()) : while(have_posts()) : the_post();
						
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
                                    
                                    <div class="comments">
                                    
                                        <a href="<?php the_permalink(); ?>#comments"><span class="num"><?php comments_number('0','1','%'); ?></span>评论</a>
                                    
                                    </div>
                                
                                </div>
                                <!-- /.blog-image-->
                                
                                <?php endif; //end of has post thumbnail ?>
                                
                                <div class="blog-info">
                                    <?php echo get_avatar( get_the_author_email(), '43' ); ?>
                                    <p class="author-name"><?php the_author(display_name); ?></p>
                                    <p class="date">写于：<?php the_time('Y年n月d日'); ?></p>
                                    <p class="categories">分类于：<?php the_category(', '); ?></p>
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
                                
                                <p><span class="date"><?php the_time('F dS, Y'); ?></span> <?php if(ddp('blog_read_more')) : ?><a href="<?php the_permalink(); ?>" class="read-more"><?php echo ddp('blog_read_more'); ?></a><?php endif; ?></p> -->
                            
                            </div>
                            <!-- /.blog-post -->
                        
                        <?php
						
							endwhile; endif;
						
						?>
                        
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