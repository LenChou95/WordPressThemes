<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
*/
	
	
	include('includes/comment_template.php');
	
	////////////////////////////////////////
	// KILLS THE SCRIPT IF OPEN DIRECTLY
	////////////////////////////////////////
	if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		
		die ('Please do not load this page directly. Thanks!');
		
	}
	
	
	
	////////////////////////////////////////
	// IF REQUIRES PASSWORD
	////////////////////////////////////////
	
	if(post_password_required()) {
		
		echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
		return;
		
	}
	
	//LOADS OUR GLOBALS
	global $id;
	$id = $post->ID;
	
	
	
	////////////////////////////////////////
	// STARTS DISPLAYING OUR COMMENTS
	////////////////////////////////////////
	
	
	//IF WE HAVE COMMENTS
	if(have_comments()) :

?>

	<h6><?php comments_number('没有评论', '1个评论', '%个评论' ); ?></h6>
    
    <ol>
    
    	<?php
        
			wp_list_comments('avatar_size=60&style=ul&callback=flerCommentTemplate');
		
		?>
    
    </ol>
    
<?php
	
	//IF THERE ARE NO COMMENTS SO FAR
	else:
	
?>

	<h6>目前还没有评论。</h6>

<?php endif; ?>

<?php

	////////////////////////////////////
	// OUR COMMENT AREA
	////////////////////////////////////
	
	if(comments_open()) :

?>

	<div id="respond">
    
    	<h6>留下你的评论吧！</h6>
        
        <h5><?php cancel_comment_reply_link(); ?></h5>
        
        <?php
		
			// IF LOG I IS REQUIRED
			if(get_option('comment_registration') && (!is_user_logged_in())) :
		
		?>
        
        	<p>你必须<a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a>才能留言。</p>
            
        <?php 
			
			//IF LOGGED IN ISNT NECESSARY
			else:
			
		?>
        
        	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            
            <?php
			
				//IF USER IS LOGGED IN
				if (is_user_logged_in()) :
				
			?>
            
            	<p><em>登录为 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">登出 &raquo;</a></em></p>
            
            <?php
			
				//IF USER IS NOT LOGGED IN
				else:
				
			?>
            
            	<p>
                        
                    <label for="author">姓名<?php if ($req) echo "<span>*</span>"; ?>: </label>
                    <input type="text" class="medium" id="author" name="author" value="<?php echo esc_attr($comment_author); ?>" />
                
                </p>
            
                <p>
            
                    <label for="email">邮箱<?php if ($req) echo "<span>*</span>"; ?>: <em>不会被发表</em></label>
                    <input type="text" class="medium" id="email" name="email" value="<?php echo esc_attr($comment_author_email); ?>" />
                
                </p>
            
                <p>
            
                    <label for="url">网站:</label>
                    <input type="text" class="medium" id="url" name="url" value="<?php echo esc_attr($comment_author_url); ?>" />
                
                </p>
			
			<?php endif; ?>
            
            	<p>
                        
                    <label for="comment_msg">评论<span>*</span>:</label>
                    <textarea name="comment" id="comment_msg" rows="5" cols=""></textarea>
                
                </p>
                
                <p>
                        
                    <input type="submit" name="comment_submit" class="button" value="发布" />
                
                </p>
                
                <?php

					comment_id_fields();
				
				?>   
				
				<?php do_action('comment_form', $post->ID); ?>
            
            </form>
        
        <?php endif; ?>
    
    </div>
    
<?php else: ?>

	<div id="comment">
    
    	<h3>New comments are closed.</h3>
    
    </div>

<?php endif; ?>