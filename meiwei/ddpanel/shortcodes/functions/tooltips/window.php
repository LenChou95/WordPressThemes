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
	<title>Insert Tooltip</title>
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
			
			document.getElementById('tooltip_el').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var tooltip_bt = document.getElementById('tooltip_panel');
		
		// who is active ?
		if (tooltip_bt.className.indexOf('current') != -1) {
			
			var selectedContent = tinyMCE.activeEditor.selection.getContent();
			
			var tooltip_color = document.getElementById('tooltip_color').value;
			var tooltip_el = document.getElementById('tooltip_el').value;
			var tooltip_text = document.getElementById('tooltip_text').value;
				
			if (tooltip_text != '' )
				tagtext = '[tooltip color="'+tooltip_color+'" text="'+tooltip_text+'"] '+tooltip_el+' [/tooltip] ';
			else
				alert('Please specify a text to your tooltip.');
				
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
			<li id="tooltip_tab" class="current"><span><a href="javascript:mcTabs.displayTab('tooltip_tab','tooltip_panel');" onmousedown="return false;">Tooltips</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper">
    
		<!-- small panel -->
		<div id="tooltip_panel" class="panel current">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Styling:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="tooltip_color">Color:</label></td>
                    
                    <td>
                    
                        <select name="tooltip_color" id="tooltip_color" style="width: 230px">
                        
                            <option value="blue">Blue</option>
                            <option value="orange">Orange</option>
                            <option value="green">Green</option>
                            <option value="purple">Purple</option>
                            <option value="pink">Pink</option>
                            <option value="red">Red</option>
                            <option value="grey">Grey</option>
                            <option value="light">Light</option>
                            <option value="black">Black</option>
                        
                        </select>
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 42px;">Color of your tooltip balloon.</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
        <fieldset style="padding-left: 15px;">
        
        	<legend>Options:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
              
             <tr>
             
                <td nowrap="nowrap"><label for="tooltip_el"><span>*</span>Item:</label></td>
                
                <td>
                
                    <input type="text" name="tooltip_el" id="tooltip_el" style="width: 230px" />
                
                </td>
                
             </tr>
              
          	</table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">The 'tooltiped' element. Accepts shortcodes.</em>
            <br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
             <tr>
             
                <td nowrap="nowrap"><label for="tooltip_text"><span>*</span>Text:</label></td>
                
                <td>
                
                    <textarea type="text" name="tooltip_text" id="tooltip_text" style="width: 230px" rows="4"></textarea>
                
                </td>
                
              </tr>
              
            </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">Insert the text that goes in the balloon of your tooltip.</em>
            <br /><br />
        
        </fieldset>
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
