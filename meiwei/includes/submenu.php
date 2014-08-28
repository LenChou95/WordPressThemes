
            
            	
                
                	<?php 
						
							if($post->post_parent) {
								
								$children = wp_list_pages(array(
								
									'title_li' => '',
									'child_of' => $post->post_parent,
									'echo' => 0,
									'depth' => -1
								
								));
							
							if($children != '') {
								
								echo '<ul id="submenu">';
								
								echo $children;
							
								echo '</ul><div id="show-hide-submenu"></div>';
								
							}
								
								
							} else {
								
								$children = wp_list_pages(array(
								
									'title_li' => '',
									'child_of' => $post->ID,
									'echo' => 0,
									'depth' => -1
								
								));
							
							if($children != '') {
								
								echo '<ul id="submenu">';
								
								echo $children;
							
								echo '</ul><div id="show-hide-submenu"></div>';
								
							}
								
							}
						
						?>
                    
                