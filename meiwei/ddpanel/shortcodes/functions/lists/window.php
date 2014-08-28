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
	<title>Insert List</title>
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
			
			var lists_type = document.getElementById('lists_type').value;
				
			tagtext = '[list type="'+lists_type+'"] [li] '+selectedContent+' [/li] [/list] ';
				
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
			<li id="lists_tab" class="current"><span><a href="javascript:mcTabs.displayTab('lists_tab','lists_panel');" onmousedown="return false;">Notifications</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper">
    
		<!-- small panel -->
		<div id="lists_panel" class="panel current" style="height: 200px;">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Styling:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="lists_type">Bullet:</label></td>
                    
                    <td>
                    
                        <select name="lists_type" id="lists_type" style="width: 230px">
                        
                            <option value="tick">Tick</option>
                            <option value="arrow">Arrow</option>
                            <option value="BW">BW</option>
                            <option value="hot">Hot</option>
                            <option value="star">Star</option>
                            <option value="clip">Clip</option>
                            <option value="black">Black</option>
                            <option value="blue">Blue</option>
                            <option value="orange">Orange</option>
                            <option value="green">Green</option>
                            <option value="purple">Purple</option>
                            <option value="pink">Pink</option>
                            <option value="red">Red</option>
                            <option value="yellow">Yellow</option>
                        
                        </select>
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 42px;">Choose the bullet of your list.</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
        <fieldset style="padding-left: 15px;">
        
            <legend>List Items:</legend>
            
            <br />
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 0;">An example will be inserted in your text editor.<br />To have multiple items just wrap each list item in <br />[li] ... [/li] tags.</em>
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
