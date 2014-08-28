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
	<title>Insert Notification Box</title>
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
			
			document.getElementById('nots_text').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var notifications_bt = document.getElementById('notifications_panel');
		
		// who is active ?
		if (notifications_bt.className.indexOf('current') != -1) {
			
			var nots_type = document.getElementById('nots_type').value;
			var nots_text = document.getElementById('nots_text').value;
				
			if (nots_text != '' )
				tagtext = '[notification type="'+nots_type+'"] '+nots_text+' [/notification] ';
			else
				alert('Please specify a text to your notifications.');
				
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
			<li id="notifications_tab" class="current"><span><a href="javascript:mcTabs.displayTab('notifications_tab','notifications_panel');" onmousedown="return false;">Notifications</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper">
    
		<!-- small panel -->
		<div id="notifications_panel" class="panel current">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Styling:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="nots_type">Type:</label></td>
                    
                    <td>
                    
                        <select name="nots_type" id="nots_type" style="width: 230px">
                        
                            <option value="standard">Standard</option>
                            <option value="success">Success</option>
                            <option value="error">Error</option>
                            <option value="info">Info</option>
                            <option value="alert">Alert</option>
                        
                        </select>
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 42px;">Choose the type of your notification</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
        <fieldset style="padding-left: 15px;">
        
        	<legend>Options:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
              
             <tr>
             
                <td nowrap="nowrap"><label for="nots_text"><span>*</span>Text:</label></td>
                
                <td>
                
                    <textarea type="text" name="nots_text" id="nots_text" style="width: 230px" rows="7"></textarea>
                
                </td>
                
             </tr>
              
          	</table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 47px;">Your notification text. Accepts Shortcodes.</em>
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
