<?php include('ddpanel-store.php'); ?>

<!-- CSS File -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ddpanel/DDPanel.css" media="screen" />

<!-- CSS File -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ddpanel/css/iPhoneCheckbox.css" media="screen" />

<!-- CSS File -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ddpanel/css/colorpicker.css" media="screen" />

<!-- ajax upload -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ddpanel/js/ajaxupload.js"></script>

<!-- checkbox -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ddpanel/js/jquery.checkbox.min.js"></script>

<!-- main script file -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ddpanel/js/scripts.js"></script>

<!-- iphone style -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ddpanel/js/jquery.iphone.min.js"></script>

<!-- colorpicker -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ddpanel/js/colorpicker.js"></script>
        
<script type="text/javascript">

	jQuery(document).ready(function() {

		//drop down of logo
		logoDropDown();
		
		//menu effects and functions
		menuEffects();
		
		//fields tooltips
		fieldsTooltips();
		
		//Layout
		ddpanelLayout();
		
		//select area
		ddpanelSelect();
				
		ddpanelNotifications();
		
		//colorpicker
		jQuery('.ddpanel-colorpicker').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val(hex);
				jQuery(el).ColorPickerHide();
				jQuery(el).css({ 'background-color' : '#'+hex });
			},
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
			}
		})

		
		//Check if element exists
		jQuery.fn.exists = function(){return jQuery(this).length;}
		
		<?php
			
			//Lets go through our fields to check if there's any upload buttons
			foreach($myOpts as $opt) {
				
				//foreach tab
				if($opt['tabs'] != NULL) { foreach($opt['tabs'] as $tab) {
					
					//foreach field
					if($tab['fields'] != NULL) { foreach($tab['fields'] as $field) {
						
						//check if theres any image uplaod thingies
						if($field['type'] == 'image') {
						
		?>
		
		//AJAX upload
		jQuery('#ddp_<?php echo $field['name']; ?>_image').each(function(){
			
			var the_button = jQuery(this);
			var image_input = jQuery('#ddp_<?php echo $field['name']; ?>');
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
		
		<?php
							
						} elseif($field['type'] == 'check') {
							
		?>
		
		jQuery('#ddp_<?php echo $field['name']; ?>').iphoneStyle();
		
		<?php
						}
						
					} }
					
				} }
				
			}
		
		?>
		
		//tabs
		ddpanelTabs();
		
		jQuery('#ddpanel-sections > li').hide();
		jQuery('#ddpanel-menu > ul > li:first').addClass('current');
		jQuery('#ddpanel-sections > li:first').show().addClass('current');
		
	});

</script>

<div id="ddpanel-wrapper">

	<div id="ddpanel-header">
    
    	<div id="ddpanel-logo">
                
            <span></span>
            <span class="hovered"></span>
            <!-- #logo image -->
            
            <ul>
            
                <li><span></span><a href="<?php bloginfo('template_url'); ?>/help.html" target="_blank">View Documentation</a></li>
            
                <li><span></span><a href="http://themeforest.net/user/DDStudios/portfolio" target="_blank">DDStudios Portfolio</a></li>
            
                <li><span></span><a href="http://themeforest.net/user/DDStudios/" target="_blank">Get Support</a></li>
            
            </ul>
            <!-- /#logo ul -->
        
        </div>
        <!-- /#logo -->
        
        <div id="ddpanel-menu">
                
            <ul>
                
                <?php
				
					//starts our output var
					$output = '';
					
					//Builds our sections menu
					foreach($myOpts as $opt) {
						
						//Opens our li
						$output .= '<li id="ddsection-'.$opt['name'].'">';
						
							$output .= '<div>';
						
								$output .= '<span></span>';
								
								//Section Icon
								$output .= '<img src="'.get_bloginfo('template_url').'/ddpanel/icons/'.$opt['icon'].'" alt="'.$opt['title'].'" />';
								
							$output .= '</div>';
							
							//section title
							$output .= '<p class="title"><span></span>'.$opt['title'].'</p>';
						
						//closes our li
						$output .= '</li>';
						
					}
					
					//displays our output
					echo $output;
				
				?>
            
            </ul>
            <!-- /#menu ul -->
        
        </div>
        <!-- /#menu -->
    
    </div>
    <!-- /#ddpanel-header -->
    
    <?php
	
		if(isset($ddpStore)) {
			
			echo '<div class="ddpanel-info-message ddpanel-notification">
            
            	Changes successfully stored.
                
                <span></span>
            
            </div>';
			
		}
	
	?>
    
    <div id="ddpanel-content">
    
    	<form id="ddpanel-form" action="" method="post">
        
        	<ul id="ddpanel-sections">
            
            	<?php
				
					//starts our output variable
					$output = '';
					
					//starts our loop
					foreach($myOpts as $opt) {
						
						//opens our li
						$output .= '<li class="ddsection-'.$opt['name'].'">';
						
						//opens our tab menu
						$output .= '<ul class="ddpanel-tabs">';
						
							//loops through our tabs
							if($opt['tabs'] != NULL) { foreach($opt['tabs'] as $tab) {
								
								//opens our li
								$output .= '<li id="ddtab-'.$tab['name'].'">';
								
								//our Title
								$output .= $tab['title'];
								
								//closes our li
								$output .= '</li>';
								
							} }
						
						//closes our tabs menu
						$output .= '</ul>';
						
						//Our top submit button
						$output .= '<input type="submit" class="button-blue save-changes-top" value="save changes" name="ddp-submit" />';
						
						//opens our ul of tabs
						$output .= '<ul class="ddtabs">';
						
						//loops trough our tabs to create our content
						if($opt['tabs'] != NULL) { foreach($opt['tabs'] as $tab) {
							
							//opens our li
							$output .= '<li class="ddtab-'.$tab['name'].'">';
							
							//let's loop trhough our fields
							if($tab['fields'] != NULL) {foreach($tab['fields'] as $field) {
								
								//if is an info area
								if($field['type'] == 'info') {
									
									//opens our block cont
									$output .= '<div class="block info">';
									
										//our info icon
										$output .= '<img src="'.get_bloginfo('template_url').'/ddpanel/icons/'.$field['icon'].'" class="info-icon" alt="info icon" />';
										
										//Our info text
										$output .= $field['description'];
									
									//closes our block cont
									$output .= '</div>';
									
								} 
								
								//if its a text input
								elseif($field['type'] == 'text') {
									
									//opens our block cont
									$output .= '<div class="block">';
									
										//our label
										$output .= '<label for="ddp_'.$field['name'].'">'.$field['title'].'</label>';
										
										//our input field
										$output .= '<input type="text" value="'.htmlspecialchars(stripslashes(ddp($field['name']))).'" name="ddp_'.$field['name'].'" id="ddp_'.$field['name'].'" class="textField" />';
										
										//our description tooltip
										$output .= '<span class="ddpanel-desc text-description"><p><span></span>'.$field['description'].'</p></span>';
									
									//closes our block cont
									$output .= '</div>';
									
								}  
								
								//if its a color input
								elseif($field['type'] == 'colorpicker') {
									
									//opens our block cont
									$output .= '<div class="block">';
									
										//our label
										$output .= '<label for="ddp_'.$field['name'].'">'.$field['title'].'</label>';
										
										//our input field
										$output .= '<input type="text" value="'.htmlspecialchars(stripslashes(ddp($field['name']))).'" name="ddp_'.$field['name'].'" id="ddp_'.$field['name'].'" class="colorField ddpanel-colorpicker" maxlength="6" style="background: #'.ddp($field['name']).';" />';
										
										//our description tooltip
										$output .= '<span class="ddpanel-desc color-description"><p><span></span>'.$field['description'].'</p></span>';
									
									//closes our block cont
									$output .= '</div>';
									
								} 
								
								//if its a image uplaod input
								elseif($field['type'] == 'image') {
									
									//opens our block cont
									$output .= '<div class="block">';
									
										//our label
										$output .= '<label for="ddp_'.$field['name'].'">'.$field['title'].'</label>';
										
										//our input field
										$output .= '<input type="text" value="'.stripslashes(ddp($field['name'])).'" name="ddp_'.$field['name'].'" id="ddp_'.$field['name'].'" class="textField" />';
										
										//inserts our upload image button
										$output .= '<p style="text-align: right">
										<input type="button" value="upload image" name="ddp_'.$field['name'].'_image" id="ddp_'.$field['name'].'_image" class="button" />
										</p>';
										
										//our description tooltip
										$output .= '<span class="ddpanel-desc text-description"><p><span></span>'.$field['description'].'</p></span>';
									
									//closes our block cont
									$output .= '</div>';
									
								} 
								
								//if its a text area
								elseif($field['type'] == 'textarea') {
									
									//opens our block cont
									$output .= '<div class="block">';
									
										//our label
										$output .= '<label for="ddp_'.$field['name'].'">'.$field['title'].'</label>';
										
										//our input field
										$output .= '<textarea name="ddp_'.$field['name'].'" id="ddp_'.$field['name'].'" class="textArea" cols="" rows="5">'.stripslashes(ddp($field['name'])).'</textarea>';
										
										//our description tooltip
										$output .= '<span class="ddpanel-desc text-description"><p><span></span>'.$field['description'].'</p></span>';
									
									//closes our block cont
									$output .= '</div>';
									
								}  
								
								//if its a checkbox
								elseif($field['type'] == 'check') {
									
									//opens our block cont
									$output .= '<div class="block">';
									
										//our label
										$output .= '<label for="ddp_'.$field['name'].'">'.$field['title'].'</label>';
										
										//our input field
										$output .= '<input type="checkbox" '.ddp_check(ddp($field['name'])).' name="ddp_'.$field['name'].'" id="ddp_'.$field['name'].'" />';
										
										//our description tooltip
										$output .= '<span class="ddpanel-desc checkbox-description"><p><span></span>'.$field['description'].'</p></span>';
									
									//closes our block cont
									$output .= '</div>';
									
								}
								
								//if its a text area
								elseif($field['type'] == 'select') {
									
									//opens our block cont
									$output .= '<div class="block">';
									
										//our label
										$output .= '<label>'.$field['title'].'</label>';
										
										//Our select container
										$output .= '<div class="ddpanel-select">';
										
											$output .= '<span class="ddpanel-select-button"><span></span></span>';
											
											$output .= '<span class="current"></span>';
											
											//opens our list of options
											$output .= '<ul>';
											
												//loops through our options
												foreach($field['options'] as $option) {
													
													$output .= '<li '.ddp_select($option, ddp($field['name'])).' title="'.stripslashes($option).'"><span class="bg"></span><span class="text">'.stripslashes($option).'</span></li>';
													
												}
											
											//closes our list of options
											$output .= '</ul>';
											
											//Our hidden input
											$output .= '<input type="hidden" value="" name="ddp_'.$field['name'].'" id="ddp_'.$field['name'].'" />';
										
										//Close our select container
										$output .= '</div>';
										
										//our description tooltip
										$output .= '<span class="ddpanel-desc select-description"><p><span></span>'.$field['description'].'</p></span>';
									
									//closes our block cont
									$output .= '</div>';
									
								} 
								
								elseif($field['type'] == 'layout') {
									
									//opens our block cont
									$output .= '<div class="block">';
									
										//our label
										$output .= '<label>'.$field['title'].'</label>';
										
										//Our select container
										$output .= '<div class="ddpanel-layout">';
										
											//our UL
											$output .= '<ul>';
											
											foreach($field['layouts'] as $lay) {
												
												//opens our LI
												$output .= '<li title="'.$lay.'" '.ddp_layout($lay, ddp($field['name'])).'>';
												
													//our image
													$output .= '<img src="'.get_bloginfo('template_url').'/ddpanel/images/'.$lay.'.gif" alt="Layout" />';
												
												//closes our LI
												$output .= '</li>';
												
											}
											
											//our hidden input
											$output .= '<input type="hidden" value="" name="ddp_'.$field['name'].'" id="ddp_'.$field['name'].'" />';
											
											//closes our UL
											$output .= '</ul>';
										
										//Close our select container
										$output .= '</div>';
										
										//our description tooltip
										$output .= '<span class="ddpanel-desc layout-description"><p><span></span>'.$field['description'].'</p></span>';
									
									//closes our block cont
									$output .= '</div>';
									
								}
								
								//if its a text area
								elseif($field['type'] == 'category') {
									
									//opens our block cont
									$output .= '<div class="block">';
									
										//our label
										$output .= '<label>'.$field['title'].'</label>';
										
										//Our select container
										$output .= '<div class="ddpanel-select">';
										
											$output .= '<span class="ddpanel-select-button"><span></span></span>';
											
											$output .= '<span class="current"></span>';
											
											//opens our list of options
											$output .= '<ul>';
											
												//get our categories
												$categories = get_categories();
											
												//loops through our options
												foreach($categories as $cat) {
													
													$output .= '<li '.ddp_select($cat->term_id, ddp($field['name'])).' title="'.$cat->term_id.'"><span class="bg"></span><span class="text">'.$cat->name.'</span></li>';
													
												}
											
											//closes our list of options
											$output .= '</ul>';
											
											//Our hidden input
											$output .= '<input type="hidden" value="" name="ddp_'.$field['name'].'" id="ddp_'.$field['name'].'" />';
										
										//Close our select container
										$output .= '</div>';
										
										//our description tooltip
										$output .= '<span class="ddpanel-desc select-description"><p><span></span>'.$field['description'].'</p></span>';
									
									//closes our block cont
									$output .= '</div>';
									
								}  
								
							} }
							
							//adds our reset/submit button at the end of the page
							//starts our block
							$output .= '<div class="ddp-submit">';
							
								//our reset button
								$output .= '<input type="reset" class="button" value="reset changes" style="float: left;" />&nbsp;';
								
								//our submit button
								$output .= '<input type="submit" class="button-blue" value="save changes" name="ddp-submit" />';
							
							//closes our block cont
							$output .= '</div>';
							
							//closes our li
							$output .= '</li>';
							
						}}
						
						//closes our ul
						$output .= '</ul>';
						
						//closes our li
						$output .= '</li>';
						
					}
					
					//displays our output
					echo $output;
				
				?>
            
            </ul>
        
        </form>
        <!-- /form -->
    
    </div>
    <!-- /#content -->
    
    <div id="ddpanel-copyright">
    
    	<div style="float: left;">
        
        	<?php echo $ddpConf['panel_version'] ?>
        
        </div>
    
    	<div style="float: right;">
        
        	<?php echo $ddpConf['theme_name'] ?> v<?php echo $ddpConf['theme_version'] ?>
        
        </div>
    
    </div>

</div>
<!-- /#ddpanel-wrapper -->