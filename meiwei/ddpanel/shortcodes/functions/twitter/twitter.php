<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR TOOLTIPS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('twitter_feed', 'ddshort_twitter_feed');
	
	//Our Funciton
	function ddshort_twitter_feed($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'id' => 'envato',
			'count' => 3
		
		), $atts));
		
		//twitter container ID
		$contId = randomTwitterId();
		
		//our output
		$output = '';
		
		//output script
		$output .= '<script type="text/javascript" charset="utf-8">
    getTwitters(\''.$contId.'\', {
        id: \''.$id.'\',
		prefix: \'\',
        clearContents: false,
        count: '.$count.', 
        ignoreReplies: false,
        newwindow: true,
        template: \'<img height="70" width="70" src="%user_profile_image_url%" class="alignleft" /><span class="grey p13">%user_screen_name% - %time%</span><br />%text%\'
    });
    </script>';
	
		//output container
		$output .= '<div class="twitter-feed" id="'.$contId.'"></div>';
		
		return $output;
		
	}
	
	function randomTwitterId() {
		
		$length = 10;
		$characters = 'abcdefghijklmnopqrstuvwxyz';
		$string = "";    
	
		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters))];
		}
	
		return $string;
	}
	
	include('tinyMCE.php');

?>