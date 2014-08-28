<?php
	
	///////////////////////////////////
	// OUR COMMENTS TEMPLATE
	///////////////////////////////////
	
	function flerCommentTemplate($comment, $args, $depth) {
		
		//LOADS OUR GLOBAL
		$GLOBALS['comment'] = $comment;
		
		?>
        
        	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            
            	<div class="comment-info">
                                
                    <?php echo get_avatar( get_comment_author_email(), 60 ); ?>
                    
                    <span class="comment-author"><?php comment_author_link()?></span>
                    <span class="comment-date"><?php comment_time('d/m/Y'); ?></span>
                    <span class="comment-time"><?php comment_time('H:i a'); ?></span>
                    <span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
                
                </div>
                <!-- /.comment avatar -->
                                
                <div class="comment-content">
                
                	<?php comment_text(); ?>
                
                </div>
				
				<?php if($comment->comment_approved == '0') { echo '<em>Your comment is awaiting approval.</em><br />'; } ?>
        
    <?php
		
	}
	
?>