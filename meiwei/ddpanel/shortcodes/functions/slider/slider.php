<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR TOOLTIPS
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('image_slider', 'ddshort_slider');
	add_shortcode('slide', 'ddshort_slider_slide');
	
	//Our Funciton
	function ddshort_slider($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'width' => '940',
			'height' => '300'
		
		), $atts));
		
		return '
<div class="ddimage-slider">

	<ul class="ddimage-slider-images" style="width: '.$width.'px; height: '.$height.'px;">
		
		'.do_shortcode($content).'
	
	</ul>
	
	<ul class="ddimage-slider-selector">
	
		<li class="border"></li>
	
	</ul>
	
	<div class="arrow-left"></div>
	<div class="arrow-right"></div>
	
	<div class="shadow-left"></div>
	<div class="shadow-right"></div>
					
</div>
<!-- /.ddimage-slider -->';
		
	}
	
	//Our Funciton
	function ddshort_slider_slide($atts, $content = null) {
		
		return '<li><img src="'.$content.'" alt="" /></li>';
		
	}
	
	include('tinyMCE.php');

?>