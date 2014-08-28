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
	<title>Toggled Content</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		var lists_bt = document.getElementById('lists_panel');
		
		// who is active ?
		if (lists_bt.className.indexOf('current') != -1) {
			
			var toggle_state = document.getElementById('toggle_state').value;
			var toggle_title = document.getElementById('toggle_title').value;
			
			if(selectedContent != '') {
				
				tagtext = '[toggle state="'+toggle_state+'" title="'+toggle_title+'"] '+selectedContent+' [/toggle] ';
				
			} else {
				
				tagtext = '[toggle state="'+toggle_state+'" title="'+toggle_title+'"] Your Toggled Content Here [/toggle] ';
				
			}
				
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
			<li id="lists_tab" class="current"><span><a href="javascript:mcTabs.displayTab('lists_tab','lists_panel');" onmousedown="return false;">Toggled Content</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 200px;">
    
		<!-- small panel -->
		<div id="lists_panel" class="panel current" style="height: 200px;">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Options:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="toggle_state">Initial State:</label></td>
                    
                    <td>
                    
                        <select name="toggle_state" id="toggle_state" style="width: 170px">
                        
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        
                        </select>
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 77px;">Initial state of your content.</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Title:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
             <tr>
             
                <td nowrap="nowrap"><label for="toggle_title">Title:</label></td>
                
                <td>
                
                    <input type="text" name="toggle_title" id="toggle_title" style="width: 230px" />
                
                </td>
                
              </tr>
              
            </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 40px;">Title of your toggled content</em>
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
