<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR TESTIMONIALS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('testimonial', 'ddshort_testimonial'	);
	
	//Our Funciton
	function ddshort_testimonial($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'author' => 'SOMEBODY',
			'location' => '',
			'image' => ''
		
		), $atts));
		
		if($image != '') {
			
			$output = '<blockquote class="testimonial"><span></span>'.$content.'</blockquote>
                                
                                <p class="testimonial_p"><img src="'.$image.'" alt="user" class="alignleft" /><span class="p14">'.$author.'</span><br />
                                <span class="p13 grey">'.$location.'</span></p><div class="clear"></div>';	
			
		} else {
			
			$output = '<blockquote class="testimonial"><span></span>'.$content.'</blockquote>
                                
                                <p class="testimonial_p"><span class="p14">'.$author.'</span><br />
                                <span class="p13 grey">'.$location.'</span></p><div class="clear"></div>';	
			
		}
						
		
						
		return $output;
		
	}
	
	include('tinyMCE.php');

?>