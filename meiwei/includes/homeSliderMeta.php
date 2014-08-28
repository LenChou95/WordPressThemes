<?php

	$homeSliderImage = get_post_meta($post->ID, 'homeSliderImage', true);
	$homeSliderBg = get_post_meta($post->ID, 'homeSliderBg', true);
	
?>

<!-- CSS File -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ddpanel/css/colorpicker.css" media="screen" />

<script src="<?php bloginfo('template_url'); ?>/ddpanel/js/ajaxupload.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_url'); ?>/ddpanel/js/colorpicker.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">

	jQuery(document).ready(function() {
		
		jQuery('#uploadImage').each(function(){
			
			var the_button = jQuery(this);
			var image_input = jQuery('#homeSliderImage');
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
		
		//colorpicker
		jQuery('.ddpcolorpicker').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val(hex);
				jQuery(el).ColorPickerHide();
				jQuery(el).css({ 'background-color' : '#'+hex });
			},
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
			}
		});
		
	});

</script>
<br>

<p>
	
    <label for="homeSliderImage"><strong>Slide Background Image:</strong></label>
	<input type="text" class="widefat" name="homeSliderImage" id="homeSliderImage" value="<?php echo $homeSliderImage; ?>" />
    
    <p style="text-align: right;">
    
    	<input type="button" name="" class="button-primary autowidth" id="uploadImage" value="Upload Image" />
        
    </p>

</p>

<br><br><br>

<p>
	
    <label for="homeSliderBg"><strong>Slide Background Color:</strong></label>
	<input type="text" class="ddpcolorpicker" maxlength="6" name="homeSliderBg" id="homeSliderBg" style="color: #ffffff; text-shadow: 0 1px 0 #000000; text-align: right; float: right; width: 60px; margin-top: -5px; background: #<?php if($homeSliderBg == NULL) { echo "000000"; } else { echo $homeSliderBg; } ?>" value="<?php if($homeSliderBg == NULL) { echo "000000"; } else { echo $homeSliderBg; } ?>" />

</p>

<br><br>