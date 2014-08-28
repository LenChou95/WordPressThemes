<?php

	$portFull = get_post_meta($post->ID, 'portFull', true);
	$portOther = get_post_meta($post->ID, 'portOther', true);
	$portWidth = get_post_meta($post->ID, 'portWidth', true);
	$portVid = get_post_meta($post->ID, 'portVid', true);
	
?>


<script src="<?php bloginfo('template_url'); ?>/ddpanel/js/ajaxupload.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">

	jQuery(document).ready(function() {
		
		jQuery('#uploadPortfolio_1').each(function(){
			
			var the_button = jQuery(this);
			var image_input = jQuery('#portFull');
			var image_id = jQuery(this).attr('id');
			
			new AjaxUpload(image_id, {
				
				  action: ajaxurl,
				  name: image_id,
				  
				  // Additional data
				  data: {
					action: 'ddpanel_ajax_upload',
					data: image_id
				  },
				  
				  autoSubmit: true,
				  responseType: false,
				  onChange: function(file, extension){},
				  onSubmit: function(file, extension) {
					  
						the_button.attr('disabled', 'disabled').val("Uploading...");	
									  
				  },
				  
				  onComplete: function(file, response) {
					  	
						the_button.removeAttr('disabled').val("Upload Image");
						
						if(response.search("Error") > -1){
							
							alert("There was an error uploading:\n"+response);
							
						}
						
						else{		
											
							image_input.val(response);
								
						}
						
					}
					
			});
			
		});
		
		jQuery('#uploadPortfolio_2').each(function(){
			
			var the_button = jQuery(this);
			var image_input = jQuery('#portOther');
			var image_id = jQuery(this).attr('id');
			
			new AjaxUpload(image_id, {
				
				  action: ajaxurl,
				  name: image_id,
				  
				  // Additional data
				  data: {
					action: 'ddpanel_ajax_upload',
					data: image_id
				  },
				  
				  autoSubmit: true,
				  responseType: false,
				  onChange: function(file, extension){},
				  onSubmit: function(file, extension) {
					  
						the_button.attr('disabled', 'disabled').val("Uploading...");	
									  
				  },
				  
				  onComplete: function(file, response) {
					  	
						the_button.removeAttr('disabled').val("Upload Another One");
						
						if(response.search("Error") > -1){
							
							alert("There was an error uploading:\n"+response);
							
						}
						
						else{
							
							var image_input_cur = jQuery('#portOther').val();
							
							if(image_input_cur == '') {
								
								image_input.val(response);
								
							} else {
								
								image_input.val(image_input_cur+'|'+response);
								
							}
									
						}
						
					}
					
			});
			
		});
		
	});
	
	function ddCheckField(el) {
		
		var fieldVal = jQuery(el).val();
		
		if(fieldVal == null || fieldVal == '') {
			
			jQuery(el).css({ background: '#ffffe0' });
			
		} else {
			
			jQuery(el).css({ background: '#ffffff' });
			
		}
		
	}

</script>

<style type="text/css">

	.ddDivider {
		
		height: 1px;
		float: left;
		width: 100%;
		background: #dfdfdf;
		margin: 30px 0;
		
	}

</style>
<br />

<p>
	
    <label for="portFull"><strong>Portfolio Image (full size)<span style="color: #f00;">*</span>:</strong></label>
    
    <input type="text" name="portFull" id="portFull" value="<?php echo $portFull; ?>" class="widefat" style=" <?php if($portFull == '') { echo 'background: #ffffe0;'; } ?>" onchange="ddCheckField(this);" />
    
    <p style="text-align: right;">
    
    	<input type="button" name="uploadPortfolio_1" class="button-primary autowidth" id="uploadPortfolio_1" value="Upload Image" />
        
    </p>
    
</p>

<div class="ddDivider">&nbsp;</div>

<p>
	
    <label for="portOther"><strong>Secondary Images <em style="font-weight: normal; font-size: 10px; color:#999;">Separate with "|" (no quotes)</em></strong></label>
    
    <textarea rows="5" name="portOther" id="portOther" class="widefat"><?php echo $portOther; ?></textarea>
    
    <p style="text-align: right;">
    
    	<input type="button" name="uploadPortfolio_2" class="button-primary autowidth" id="uploadPortfolio_2" value="Upload Image" />
        
    </p>
    
</p>

<div class="ddDivider">&nbsp;</div>

<p>
	
    <label for="portWidth"><strong>Thumbnail Width<span style="color: #f00;">*</span>:</strong></label>
    
    <input type="text" name="portWidth" id="portWidth" value="<?php if($portWidth == '') { echo '300'; } else { echo $portWidth; } ?>" class="widefat" style="float: right; width: 60px; margin-top: -3px; text-align: center;" onchange="ddCheckField(this);" />
    
</p>

<div class="ddDivider">&nbsp;</div>

<p>
	
    <label for="portVid"><strong>Video URL:</strong> <em style="font-weight: normal; font-size: 10px; color:#999;">(optional)</em></label>
    
    <input type="text" name="portVid" id="portVid" value="<?php echo $portVid; ?>" class="widefat" />
    
</p>

<br />