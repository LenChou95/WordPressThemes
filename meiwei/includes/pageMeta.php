<?php

	$pageTemplate = get_post_meta($post->ID, 'pageTemplate', true);
	$pageColor = get_post_meta($post->ID, 'pageColor', true);
	$pageHeaderImage = get_post_meta($post->ID, 'pageHeaderImage', true);
	$pageHeaderBg = get_post_meta($post->ID, 'pageHeaderBg', true);
	
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ddpanel/css/colorpicker.css" media="screen" />

<script src="<?php bloginfo('template_url'); ?>/ddpanel/js/ajaxupload.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_url'); ?>/ddpanel/js/colorpicker.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">

	function ddColorChooser() {
		
		var firstColor = jQuery('#pageColor').val();
		jQuery('#ddColorChooser > li.'+firstColor).addClass('active');
		
		jQuery('#ddColorChooser > li').click(function() {
			
			jQuery('#ddColorChooser > li.active').removeClass('active');
			jQuery(this).addClass('active');
			
			var newColor = jQuery(this).attr('class').split(' ');
			jQuery('#pageColor').val(newColor[0]);
			
		});
		
	}

	jQuery(document).ready(function() {
		
		ddColorChooser();
		
		jQuery('#uploadImage').each(function(){
			
			var the_button = jQuery(this);
			var image_input = jQuery('#pageHeaderImage');
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

<style type="text/css">

	.ddDivider {
		
		height: 1px;
		float: left;
		width: 100%;
		background: #dfdfdf;
		margin: 30px 0;
		
	}
	
	#ddColorChooser {
		
		list-style: none;
		margin: 0 0 0 7px;
		padding: 0;
		
	}
	
		#ddColorChooser li {
			
			border: 1px solid #ffffff;
			background: #ffffff;
			padding: 3px;
			
			cursor: pointer;
			float: left;
			margin: 4px 11px 0 0;
			width: 14px;
			
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			
		}
	
		#ddColorChooser li:hover {
			
			border: 1px solid #dfdfdf;
			background: #ededed;
			padding: 3px;
			
		}
	
		#ddColorChooser li.active {
			
			border: 1px solid #65bbde;
			background: #b4dff0;
			padding: 3px;
			
		}
	
		#ddColorChooser li img {
			
			float: left;
			padding: 0;
			margin: 0;
			display:
			
		}

</style>
<br />

<p>
	
    <label for="pageTemplate"><strong>Page Layout:</strong></label>
    
    <select name="pageTemplate" id="pageTemplate" class="widefat">
    
    	<option value="right" <?php if($pageTemplate == 'right') { echo 'selected="selected"'; } ?>>Right Sidebar</option>
    
    	<option value="left" <?php if($pageTemplate == 'left') { echo 'selected="selected"'; } ?>>Left Sidebar</option>
    
    	<option value="full" <?php if($pageTemplate == 'full') { echo 'selected="selected"'; } ?>>Full Width</option>
    
    </select>

</p>

<div class="ddDivider">&nbsp;</div>

<p>
	
    <label for="pageColor"><strong>Page Color:</strong></label>
    <br />
    <ul id="ddColorChooser">
    
    	<li class="Lime"><img src="<?php bloginfo('template_url'); ?>/images/icons/pageMeta_lime.gif" alt="Lime" title="Lime" /></li>
    
    	<li class="Orange"><img src="<?php bloginfo('template_url'); ?>/images/icons/pageMeta_orange.gif" alt="orange" title="Orange" /></li>
    
    	<li class="Baby-Blue"><img src="<?php bloginfo('template_url'); ?>/images/icons/pageMeta_baby_blue.gif" alt="Baby Blue" title="Baby Blue" /></li>
    
    	<li class="Purple"><img src="<?php bloginfo('template_url'); ?>/images/icons/pageMeta_purple.gif" alt="Purple" title="Purple" /></li>
    
    	<li class="Grey"><img src="<?php bloginfo('template_url'); ?>/images/icons/pageMeta_grey.gif" alt="Grey" title="Grey" /></li>
    
    	<li class="Red"><img src="<?php bloginfo('template_url'); ?>/images/icons/pageMeta_red.gif" alt="Red" title="Red" /></li>
    
    	<li class="Blue"><img src="<?php bloginfo('template_url'); ?>/images/icons/pageMeta_blue.gif" alt="Blue" title="Blue" /></li>
    
    	<li class="Pink" style="margin-right: 0;"><img src="<?php bloginfo('template_url'); ?>/images/icons/pageMeta_pink.gif" alt="Pink" title="Pink" /></li>
    
    </ul>
    <input type="hidden" name="pageColor" id="pageColor" value="<?php if($pageColor == '') { echo ddp('color_scheme'); } else { echo $pageColor; } ?>" />

</p>

<br /><br />

<div class="ddDivider">&nbsp;</div>

<p>
	
    <label for="pageHeaderImage"><strong>Header Background Image:</strong></label>
	<input type="text" class="widefat" name="pageHeaderImage" id="pageHeaderImage" value="<?php if($pageHeaderImage == NULL) { echo ddp('header_bg'); } else { echo $pageHeaderImage; } ?>" />
    
    <p style="text-align: right;">
    
    	<input type="button" name="" class="button-primary autowidth" id="uploadImage" value="Upload Image" />
        
    </p>

</p>

<div class="ddDivider">&nbsp;</div>

<p>
	
    <label for="pageHeaderBg"><strong>Header Background Color:</strong></label>
	<input type="text" class="ddpcolorpicker" maxlength="6" name="pageHeaderBg" id="pageHeaderBg" style="color: #ffffff; text-shadow: 0 1px 0 #000000; text-align: right; float: right; width: 60px; margin-top: -5px; background: #<?php if($pageHeaderBg == NULL) { echo ddp('header_bg_color'); } else { echo $pageHeaderBg; } ?>" value="<?php if($pageHeaderBg == NULL) { echo ddp('header_bg_color'); } else { echo $pageHeaderBg; } ?>" />

</p>
<br />