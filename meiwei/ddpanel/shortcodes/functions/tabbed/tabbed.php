<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR TOOLTIPS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('tabbed', 'ddshort_tabbed');
	add_shortcode('tab', 'ddshort_tabs');
	
	//Our Funciton
	function ddshort_tabbed($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'tabs' => 'DDSnotabs'
		
		), $atts));
		
		if($tabs == 'DDSnotabs') { return; }
		
		//starts our output
		$output = '
		<div class="ddtabbed">
                
        	<ul class="tabs">';
			
		$myTabs = explode('|', $tabs);
		
		//displays our tabs
		foreach($myTabs as $tab) {
			
			$output .= '<li>'.$tab.'</li>';
			
		}
		
		//closes our tabs UL
		$output .= '</ul>';
		
		//returns
		return $output.'<ul class="tabbed">'.do_shortcode($content).'</ul></div>';
		
	}
	
	//Our Funciton
	function ddshort_tabs($atts, $content = null) {
		
		//returns
		return $output.'<li>'.do_shortcode($content).'</li>';
		
	}
	
	include('tinyMCE.php');

?>