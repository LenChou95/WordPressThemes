<?php
	
	
	//Simple Buttons
	function ddshorts_simple_columns() {
		
		echo "<script type='text/javascript'>

	/* <![CDATA[ */ 
		
		edButtons[edButtons.length] = new edButton('dd_one',
		
			'one',
			'[one] ',
			' [/one] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_half',
		
			'1/2',
			'[one_half] ',
			' [/one_half] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_half_last',
		
			'1/2 last',
			'[one_half last=\"last\"] ',
			' [/one_half] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_two_thirds',
		
			'2/3',
			'[two_thirds] ',
			' [/two_thirds] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_two_thirds_last',
		
			'2/3 last',
			'[two_thirds last=\"last\"] ',
			' [/two_thirds] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_third',
		
			'1/3',
			'[one_third] ',
			' [/one_third] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_third_last',
		
			'1/3 last',
			'[one_third last=\"last\"] ',
			' [/one_third] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_fourth',
		
			'1/4',
			'[one_fourth] ',
			' [/one_fourth] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_fourth_last',
		
			'1/4 last',
			'[one_fourth last=\"last\"] ',
			' [/one_fourth] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_three_fourths',
		
			'3/4',
			'[three_fourths] ',
			' [/three_fourths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_three_fourths_last',
		
			'3/4 last',
			'[three_fourths last=\"last\"] ',
			' [/three_fourths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_fifth',
		
			'1/5',
			'[one_fifth] ',
			' [/one_fifth] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_fifth_last',
		
			'1/5 last',
			'[one_fifth last=\"last\"] ',
			' [/one_fifth] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_two_fifths',
		
			'2/5',
			'[two_fifths] ',
			' [/two_fifths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_two_fifths_last',
		
			'2/5 last',
			'[two_fifths last=\"last\"] ',
			' [/two_fifths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_three_fifths',
		
			'3/5',
			'[three_fifths] ',
			' [/three_fifths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_three_fifths_last',
		
			'3/5 last',
			'[three_fifths last=\"last\"] ',
			' [/three_fifths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_four_fifths',
		
			'4/5',
			'[four_fifths] ',
			' [/four_fifths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_four_fifths_last',
		
			'4/5 last',
			'[four_fifths last=\"last\"] ',
			' [/four_fifths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_sixth',
		
			'1/6',
			'[one_sixth] ',
			' [/one_sixth] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_one_sixth_last',
		
			'1/6 last',
			'[one_sixth last=\"last\"] ',
			' [/one_sixth] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_five_sixths',
		
			'5/6',
			'[five_sixths] ',
			' [/five_sixths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_five_sixths_last',
		
			'5/6 last',
			'[five_sixths last=\"last\"] ',
			' [/five_sixths] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_clear',
		
			'clear',
			'\\n[clear]\\n',
			'',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('dd_raw',
		
			'raw',
			'[raw] ',
			' [/raw] ',
			''
		
		);

 /* ]]> */ 

	</script>";
		
	}
	
	// SIMPLE BUTTONS
	add_action('admin_head','ddshorts_simple_columns');



?>