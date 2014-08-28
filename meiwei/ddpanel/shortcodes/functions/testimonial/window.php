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
	<title>Insert Testimonial</title>
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
			
			document.getElementById('test_text').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		var lists_bt = document.getElementById('lists_panel');
		
		// who is active ?
		if (lists_bt.className.indexOf('current') != -1) {
			
			var test_author = document.getElementById('test_author').value;
			var test_image = document.getElementById('test_image').value;
			var test_location = document.getElementById('test_location').value;
			var test_text = document.getElementById('test_text').value;
			
				tagtext = '[testimonial';
				
				if(test_author != '') {
					
					tagtext += ' author="'+test_author+'"';
					
				} else {
					
					tagtext += ' author="Your Author HERE"';
					
				}
				
				if(test_image != '') { tagtext += ' image="'+test_image+'"'; }
				
				if(test_location != '') { tagtext += ' location="'+test_location+'"'; }
				
				tagtext += '] ';
				
				if(test_text != '') {
					
					tagtext += test_text;
					
				} else {
					
					tagtext += 'INSERT YOUR TESTIMONIAL TEXT';
					
				}
				
				tagtext += ' [/testimonial] ';
				
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
			<li id="lists_tab" class="current"><span><a href="javascript:mcTabs.displayTab('lists_tab','lists_panel');" onmousedown="return false;">Testimonial</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 400px;">
    
		<!-- small panel -->
		<div id="lists_panel" class="panel current">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Options:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="test_author">Author:</label></td>
                    
                    <td>
                    
                        &nbsp;&nbsp;&nbsp;<input type="text" name="test_author" id="test_author" style="width: 210px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Author of your testimonial</em>
            <br /><br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="test_location">Location:</label></td>
                    
                    <td>
                    
                        &nbsp;<input type="text" name="test_location" id="test_location" style="width: 210px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Location of your author. Optional.</em>
            <br /><br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="test_image">Image:</label></td>
                    
                    <td>
                    
                        &nbsp;&nbsp;&nbsp;<input type="text" name="test_image" id="test_image" style="width: 210px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Thumbnail of your testimonial. Optional<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;category name.</em>
            <br /><br />
        
        </fieldset>
        
        <br />
        
        <fieldset style="padding-left: 15px;">
        
        	<legend>Testimonial</legend>
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="test_text">Text:</label></td>
                    
                    <td>
                    
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="4" type="text" name="test_text" id="test_text" style="width: 210px"></textarea>
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Text of your testimonial.<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;category name.</em>
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
