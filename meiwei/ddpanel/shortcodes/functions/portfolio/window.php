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
	<title>Insert Portfolio Slide</title>
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
			
			var port_cat = document.getElementById('port_cat').value;
			var port_title = document.getElementById('port_title').value;
			var port_count = document.getElementById('port_count').value;
			var port_height = document.getElementById('port_height').value;
			var port_auto = document.getElementById('port_auto').value;
			
				tagtext = '[portfolio_gallery';
				
				if(port_cat != '') {
					
					tagtext += ' category="'+port_cat+'"';
					
				} else {
					
					tagtext += ' category="All"';
					
				}
				
				if(port_count != '') { tagtext += ' count="'+port_count+'"'; }
				
				if(port_title != '') { tagtext += ' title="'+port_title+'"'; }
				
				if(port_height != '') { tagtext += ' height="'+port_height+'"'; }
				
				if(port_auto != '') { tagtext += ' autoslide="'+port_auto+'"'; }
				
				tagtext += '] ';
				
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
			<li id="lists_tab" class="current"><span><a href="javascript:mcTabs.displayTab('lists_tab','lists_panel');" onmousedown="return false;">Portfolio Slide</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 430px;">
    
		<!-- small panel -->
		<div id="lists_panel" class="panel current">
        
        <fieldset style="padding-left: 15px;">
        
            <legend>Options:</legend>
            
            <br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="port_cat">Category:</label></td>
                    
                    <td>
                    
                        <input type="text" name="port_cat" id="port_cat" style="width: 200px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Name of your category. Does not accept multiple</em><br />
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">items. Insert "All" (no quotes) to display all.</em>
            <br /><br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="port_count">Count:</label></td>
                    
                    <td>
                    
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="port_count" id="port_count" style="width: 210px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Number of portfolio posts. Leave blank to show<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;all.</em>
            <br /><br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="port_title">Title:</label></td>
                    
                    <td>
                    
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="port_title" id="port_title" style="width: 210px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Title of your slider. Blank will display<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;category name.</em>
            <br /><br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="port_height">Height:</label></td>
                    
                    <td>
                    
                        &nbsp;&nbsp;&nbsp;<input type="text" name="port_height" id="port_height" style="width: 210px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Height of your slider. Full images will be cropped<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to fit this height.</em>
            <br /><br /><br />
        
            <table border="0" cellpadding="4" cellspacing="0">
            
                 <tr>
                 
                    <td nowrap="nowrap"><label for="port_auto">AutoSlide:</label></td>
                    
                    <td>
                    
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="port_auto" id="port_auto" style="width: 210px" />
                    
                    </td>
                    
                  </tr>
                  
              </table>
                        
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Delay to auto play portfolio slie in miliseconds.</em><br />
            <em style="font-size: 9px; color: #999999; padding: 5px 0 0 60px;">Leave blank to not auto play.</em>
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
