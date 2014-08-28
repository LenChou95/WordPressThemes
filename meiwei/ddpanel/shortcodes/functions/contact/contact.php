<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR PORTFOLIO
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('contact_form', 'ddshort_contact_form');
	
	//Our Funciton
	function ddshort_contact_form($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'email' => get_option('admin_email')
		
		), $atts));
		
		$output = '<form id="contactForm" action="'.get_bloginfo('template_url').'/php/mail.php" method="post">
                            	
                                <br />
                                
                                <p>
                                
                                    <label for="nameContact">Name<span>*</span>:</label>
                                    <input type="text" id="nameContact" name="nameContact" class="medium" />
                                
                                </p>
                            
                                <p>
                                
                                    <label for="emailContact">Email<span>*</span>:</label>
                                    <input type="text" id="emailContact" name="emailContact" class="medium" />
                                
                                </p>
                            
                                <p>
                                
                                    <label for="messageContact">Message<span>*</span>:</label>
                                    <textarea rows="7" id="messageContact" name="messageContact" ></textarea>
                                
                                </p>
                                
                                <p><input type="submit" class="button" id="contactFormSubmit" value="submit" name="submit" />
								<input type="hidden" name="sendTo" id="sendTo" value="'.$email.'" />
								</p>
                            
                            </form>';
							
							
		return $output;
		
	}
	
	include('tinyMCE.php');

?>