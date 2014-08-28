<?php
	
	///////////////////////////////////
	///////////////////////////////////
	//// THIS WILL HANDLE THE SHORTCODES
	//// FOR PORTFOLIO
	///////////////////////////////////
	///////////////////////////////////
	
	//Our hook
	add_shortcode('portfolio_gallery', 'ddshort_portfolio_gallery');
	
	//Our Funciton
	function ddshort_portfolio_gallery($atts, $content = null) {
		
		//extracts our attrs . if not set set default
		extract(shortcode_atts(array(
		
			'category' => 'All',
			'count' => 9999,
			'height' => '300',
			'title' => '',
			'autoslide' => ''
		
		), $atts));
		
		if($count == '') { $count = 9999; }
			
			
		
		///////////////////////////////////////
		// STARTS OUR LOOP
		///////////////////////////////////////
		
		$args = array(
		
			'post_type' => 'portfolio_posts',
			'portfolio_cats' => $category,
			'posts_per_page' => $count
		
		);
		
		if($category == 'All') {
			
			$args = array(
		
				'post_type' => 'portfolio_posts',
				'posts_per_page' => $count
			
			);
			
		}
		
		$portfolioQuery = new WP_Query($args);
		$uniqueId = randomTwitterId();
		
		//activates our slide
		$output = '<script type="text/javascript">
		
		jQuery(document).ready(function() {
			
			jQuery("#'.$uniqueId.'").portfolioSlide('.$autoslide.');
			
		});
		
</script>';
		
		//Ourput string
		$output .= '
		
					<div class="content-block">';
					
		if($title != '') {
						
			$output .= '
					
					<h6>'.$title.'</h6>';
						
		} else {
						
			$output .= '
					
					<h6>'.$category.'</h6>';
				
		}
		
		$galleryId = randomTwitterId();
					
		
					
		$output .= '
					
		            <div class="portfolio-arrow minus"></div>
                    <div class="portfolio-arrow more"></div>
                    
                    <div class="portfolio-slide" style="height: '.$height.'px;" id="'.$uniqueId.'">
					
						<ul>';
		
		if($portfolioQuery->have_posts()) {
			
			while($portfolioQuery->have_posts()) {
				
				$portfolioQuery->the_post();
				
				$output .= '
				<li>';
				
				if(get_post_meta(get_the_ID(), 'portVid', true)) {
					
					$output .= '<a href="'.get_post_meta(get_the_ID(), 'portVid', true).'" rel="prettyPhoto['.$galleryId.']" title="'.get_the_title().'">';
					
				} else {
					
					$output .= '<a href="'.get_post_meta(get_the_ID(), 'portFull', true).'" rel="prettyPhoto['.$galleryId.']" title="'.get_the_title().'">';
					
				}
				
				$output .= '<img src="'.get_bloginfo('template_url').'/includes/timthumb.php?src='.get_post_meta(get_the_ID(), 'portFull', true).'&amp;w='.get_post_meta(get_the_ID(), 'portWidth', true).'&amp;q=100&amp;h='.$height.'&amp;zc=1" alt="'.get_the_title().'" class="first" />';
				
				$otherTrue = get_post_meta(get_the_ID(), 'portOther', true);
				
				if($otherTrue != '') {
				
					$otherImgs = explode('|', $otherTrue);
					
					foreach($otherImgs as $img) {
						
						$output .= '<img src="'.get_bloginfo('template_url').'/includes/timthumb.php?src='.$img.'&amp;w='.get_post_meta(get_the_ID(), 'portWidth', true).'&amp;q=100&amp;h='.$height.'&amp;zc=1" alt="portfolio" />';
						
					}
					
				}
				
				$output .= '</a></li>';
				
			}
			
		}
		
		$output .= '
								</ul>
								<!-- /.portfolio-slide ul -->
								
							</div>
							<!-- /.portfolio-slide --></div>';
	
		return $output;
		
	}
	
	include('tinyMCE.php');

?>