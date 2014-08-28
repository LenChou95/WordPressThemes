<?php
	
	
	$curUrl = $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
	$myUrl = explode('/', $curUrl);
	$remove = count($myUrl)-8;
	$root = 'http://';
	for($i = 0; $i < $remove; $i++) {
		$root .= $myUrl[$i].'/';
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Insert Button</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		
		if(selectedContent != '') {
			
			document.getElementById('small_text').value = selectedContent;
			document.getElementById('icon_text').value = selectedContent;
			document.getElementById('big_text').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var small_bt = document.getElementById('small_panel');
		var icon_bt = document.getElementById('icon_panel');
		var big_bt = document.getElementById('big_panel');
		
		// who is active ?
		if (small_bt.className.indexOf('current') != -1) {
			
			var selectedContent = tinyMCE.activeEditor.selection.getContent();
			
			var small_type = document.getElementById('buttonType').value;
			var small_color = document.getElementById('small_color').value;
			var small_link = document.getElementById('small_link').value;
			var small_text = document.getElementById('small_text').value;
			
			if(selectedContent == '') {
				
				if (small_text != '' )
					tagtext = '[button_'+small_type+' color="'+small_color+'" url="'+small_link+'"] '+small_text+' [/button_'+small_type+'] ';
				else
					alert('Please specify a text to your button.');
				
			} else {
				
				tagtext = '[button_'+small_type+' color="'+small_color+'" url="'+small_link+'"] '+selectedContent+' [/button_'+small_type+'] ';
				
			}
		}
		
		if (icon_bt.className.indexOf('current') != -1) {
			
			var icon_icon = document.getElementById('iconIcon').value;
			var icon_link = document.getElementById('icon_link').value;
			var icon_text = document.getElementById('icon_text').value;
				
			if (icon_text != '' )
				tagtext = '[button_icon icon="'+icon_icon+'" url="'+icon_link+'"] '+icon_text+' [/button_icon] ';
			else
				alert('Please specify a text to your button.');
		}
		if (big_bt.className.indexOf('current') != -1) {
			
			var big_color = document.getElementById('big_color').value;
			var big_link = document.getElementById('big_link').value;
			var big_text = document.getElementById('big_text').value;
			var big_desc = document.getElementById('big_desc').value;
				
			if (big_text != '' || big_desc != '' )
				tagtext = '[big_button color="'+big_color+'" url="'+big_link+'" desc="'+big_desc+'"] '+big_text+' [/big_button] ';
			else
				alert('Please specify a text and a description to your button.');
		}
	
		
		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
			//Peforms a clean up of the current editor HTML. 
			//tinyMCEPopup.editor.execCommand('mceCleanup');
			//Repaints the editor. Sometimes the browser has graphic glitches. 
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
	</script>
	<base target="_self" />
    
	<style type="text/css">
	
    label span { color: #f00; }
	
    </style>
    
</head>
<body onload="init();">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="DDShortcodes" action="#">
	<div class="tabs">
		<ul>
			<li id="small_tab" class="current"><span><a href="javascript:mcTabs.displayTab('small_tab','small_panel');" onmousedown="return false;">Small Button</a></span></li>
			<li id="icon_tab"><span><a href="javascript:mcTabs.displayTab('icon_tab','icon_panel');" onmousedown="return false;">Icon Button</a></span></li>
			<li id="big_tab"><span><a href="javascript:mcTabs.displayTab('big_tab','big_panel');" onmousedown="return false;">Big Button</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper">
    
		<!-- small panel -->
		<div id="small_panel" class="panel current">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Styling:</legend>
            
            <br />
            
            <table border="0" cellpadding="4" cellspacing="0">
            
                <tr>
                
                	<td nowrap="nowrap"><label for="buttonType">Type:</label></td>
                
                    <td>
                    
                    	<select name="buttonType" id="buttonType" style="width: 230px">
                    
                    		<option value="round">Rounded</option>
                    		<option value="square">Square</option>
                    
                    	</select>
                    
                    </td>
                
                </tr>
            
            </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 42px;">Type of your button</em>
            <br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="small_color">Color:</label></td>
                    
                    <td>
                    
                        <select name="small_color" id="small_color" style="width: 230px">
                        
                            <option value="blue">Blue</option>
                            <option value="orange">Orange</option>
                            <option value="green">Green</option>
                            <option value="purple">Purple</option>
                            <option value="pink">Pink</option>
                            <option value="red">Red</option>
                            <option value="grey">Grey</option>
                            <option value="light">Light</option>
                            <option value="black">Black</option>
                            <option value="grey-glossy">Glossy Grey</option>
                            <option value="light-glossy">Glossy Light</option>
                        
                        </select>
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 42px;">Color of your button</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
        <fieldset style="padding-left: 15px;">
        
        	<legend>Options:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
              
             <tr>
             
                <td nowrap="nowrap"><label for="small_link">Link:</label></td>
                
                <td>
                
                    &nbsp;&nbsp;<input type="text" name="small_link" id="small_link" style="width: 230px" />
                
                </td>
                
             </tr>
              
          	</table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">The URL your button will redirect to.</em>
            <br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
             <tr>
             
                <td nowrap="nowrap"><label for="small_text"><span>*</span>Text:</label></td>
                
                <td>
                
                    <input type="text" name="small_text" id="small_text" style="width: 230px" />
                
                </td>
                
              </tr>
              
            </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">Insert the text of your button.</em>
            <br /><br />
        
        </fieldset>
		</div>
		<!-- end small panel -->
    
		<!-- icon panel -->
		<div id="icon_panel" class="panel">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Styling:</legend>
            
            <br />
            
            <table border="0" cellpadding="4" cellspacing="0">
            
                <tr>
                
                	<td nowrap="nowrap"><label for="iconIcon">Icon:</label></td>
                
                    <td>
                    
                    	<select name="iconIcon" id="iconIcon" style="width: 230px">
                    
                    		<option value="accept">Tick</option>
                            <option value="add">Add</option>
                            <option value="anchor">Anchor</option>
                            <option value="cancel">Cancel</option>
                            <option value="clock">Clock</option>
                            <option value="coins">Coins</option>
                            <option value="delete">Delete</option>
                            <option value="heart">Heart</option>
                            <option value="hourglass">Hourglass</option>
                            <option value="house">House</option>
                            <option value="info">Info</option>
                            <option value="lightbulb">Lightbulb</option>
                            <option value="lightning">Lightning</option>
                            <option value="lock">Lock</option>
                            <option value="palette">Palette</option>
                            <option value="refresh">Refresh</option>
                            <option value="shuffle">Shuffle</option>
                            <option value="asterisk">Asterisk</option>
                            <option value="bell">Bell</option>
                            <option value="bomb">Bomb</option>
                            <option value="briefcase">Briefcase</option>
                            <option value="cake">Cake</option>
                            <option value="bricks">Bricks</option>
                            <option value="color">Color</option>
                            <option value="disconnect">Disconnect</option>
                            <option value="door">Door</option>
                            <option value="emoticon">Emoticon</option>
                            <option value="rss">Rss</option>
                    
                    	</select>
                    
                    </td>
                
                </tr>
            
            </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 42px;">Icon of your button</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Options:</legend>
            
            <br />
            
            <table border="0" cellpadding="4" cellspacing="0">
            
                <tr>
                
                	<td nowrap="nowrap"><label for="icon_link">Link:</label></td>
            
                    <td>
                    
                        &nbsp;&nbsp;<input type="text" name="icon_link" id="icon_link" style="width: 230px" />
                    
                    </td>
                
                </tr>
            
            </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">The URL your icon will redirect to.</em>
            <br /><br />
            
            <table border="0" cellpadding="4" cellspacing="0">
            
                <tr>
                
                	<td nowrap="nowrap"><label for="icon_text"><span>*</span>Text:</label></td>
            
                    <td>
                    
                        <input type="text" name="icon_text" id="icon_text" style="width: 230px" />
                    
                    </td>
                
                </tr>
            
            </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">Insert the text of your button.</em>
            <br /><br />
        
        </fieldset>
        
		</div>
		<!-- end icon panel -->
    
		<!-- big panel -->
		<div id="big_panel" class="panel">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Styling:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="big_color">Color:</label></td>
                    
                    <td>
                    
                        <select name="big_color" id="big_color" style="width: 230px">
                        
                            <option value="blue">Blue</option>
                            <option value="orange">Orange</option>
                            <option value="green">Green</option>
                            <option value="purple">Purple</option>
                            <option value="pink">Pink</option>
                            <option value="red">Red</option>
                            <option value="grey">Grey</option>
                            <option value="light">Light</option>
                            <option value="black">Black</option>
                            <option value="grey-glossy">Glossy Grey</option>
                            <option value="light-glossy">Glossy Light</option>
                            <option value="dashed">Dashed	</option>
                        
                        </select>
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 42px;">Color of your button</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Options:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="big_link">Link:</label></td>
                    
                    <td>
                    
                        &nbsp;&nbsp;<input type="text" name="big_link" id="big_link" style="width: 230px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">The link your button will redirect to</em>
            <br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="big_text"><span>*</span>Text:</label></td>
                    
                    <td>
                    
                        <input type="text" name="big_text" id="big_text" style="width: 230px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">Insert the text of your button</em>
            <br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="big_desc"><span>*</span>Desc:</label></td>
                    
                    <td>
                    
                        <input type="text" name="big_desc" id="big_desc" style="width: 230px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">Insert the description of your button</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
		</div>
		<!-- end small panel -->
		
		
	</div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="Close" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="Insert" onclick="insertShortcode();" />
		</div>
	</div>
</form>
</body>
</html>
<?php

?>
