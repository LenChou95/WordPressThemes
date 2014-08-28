<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR BIG BUTTONS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('clear', 'ddshort_column_clear');
	add_shortcode('raw', 'ddshort_column_raw');
	add_shortcode('one', 'ddshort_column_one');
	add_shortcode('one_half', 'ddshort_column_one_half');
	add_shortcode('one_third', 'ddshort_column_one_third');
	add_shortcode('two_thirds', 'ddshort_column_two_thirds');
	add_shortcode('one_fourth', 'ddshort_column_one_fourth');
	add_shortcode('three_fourths', 'ddshort_column_three_fourths');
	add_shortcode('one_fifth', 'ddshort_column_one_fifth');
	add_shortcode('two_fifths', 'ddshort_column_two_fifths');
	add_shortcode('three_fifths', 'ddshort_column_three_fifths');
	add_shortcode('four_fifths', 'ddshort_column_four_fifths');
	add_shortcode('one_sixth', 'ddshort_column_one_sixth');
	add_shortcode('five_sixths', 'ddshort_column_five_sixths');
	
	//One Function
	function ddshort_column_one($atts, $content = null) {
		
		return '<div class="one">'.do_shortcode($content).'</div>';
		
	}
	
	//clear function
	function ddshort_column_raw($atts, $content = null) {
		
		return $content;
		
	}
	
	//raw function
	function ddshort_column_clear($atts, $content = null) {
		
		return '<div class="clear"></div>';
		
	}
	
	//One-half Function
	function ddshort_column_one_half($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="one-half'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//One-third Function
	function ddshort_column_one_third($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="one-third'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//Two-thirds Function
	function ddshort_column_two_thirds($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="two-thirds'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//one-fourth Function
	function ddshort_column_one_fourth($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="one-fourth'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//three-fourth Function
	function ddshort_column_three_fourths($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="three-fourths'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//one-fifth Function
	function ddshort_column_one_fifth($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="one-fifth'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//two-fifths Function
	function ddshort_column_two_fifths($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="two-fifths'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//three-fifths Function
	function ddshort_column_three_fifths($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="three-fifths'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//four-fifths Function
	function ddshort_column_four_fifths($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="four-fifths'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//one-sixth Function
	function ddshort_column_one_sixth($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="one-sixth'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//five-sixths Function
	function ddshort_column_five_sixths($atts, $content = null) {
		
		extract(shortcode_atts(array(
		
			'last' => ''
		
		), $atts));
		
		return '<div class="five-sixths'.ifLast($last).'">'.do_shortcode($content).'</div>';
		
	}
	
	//if last function
	function ifLast($last) {
		
		if($last == 'last') {
			
			return ' last';
			
		}
		
	}
	
	//our TinyMCE
	include('tinyMCE.php');

?>