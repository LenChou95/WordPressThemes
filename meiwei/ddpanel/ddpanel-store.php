<?php
	
	//if the user has submitted
	if(isset($_POST['ddp-submit'])) {
		
		//let's loop trough our fields
		foreach($myOpts as $opt) {
		
			if($opt['tabs'] != NULL) { foreach($opt['tabs'] as $tab) {
				
				if($tab['fields'] != NULL) { foreach($tab['fields'] as $field) {
					
					//if the default value isn't null or its info type
					if($field['type'] != 'info') {
						
						if($_POST['ddp_'.$field['name']] != NULL) {
						
							//updates our options
							update_option('ddp_'.$field['name'], $_POST['ddp_'.$field['name']]);
							
						} else {
							
							update_option('ddp_'.$field['name'], '');
							
						}
						
						$ddpStore = 1;
						
					}
					
				} }
				
			} }
			
		}	
		
	}

?>