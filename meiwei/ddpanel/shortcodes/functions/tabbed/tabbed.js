(function() {
	
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('ddshorts_tabbed');
	
	tinymce.create('tinymce.plugins.ddshorts_tabbed', {		 
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mceddshorts_tabbed', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('ddshorts_tabbeds.delta_width', 0),
					height : 180 + ed.getLang('ddshorts_tabbeds.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton('ddshorts_tabbed', {
				
				title : 'Tabbed Content',
				cmd : 'mceddshorts_tabbed',
				image : url + '/tabbed.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				cm.setActive('mceddshorts_tabbed', n.nodeName == 'IMG');
				
			});
		}, 
		getInfo : function() {
			
			return {
				
					longname : "DDStudios Shortcodes Framework",
					author : 'DDStudios',
					authorurl : 'http://themeforest.net/user/DDStudios/',
					infourl : 'http://themeforest.net/user/DDStudios/',
					version : "1.0"
					
			};
			
		}
		
	});

	// Register plugin
	tinymce.PluginManager.add('ddshorts_tabbed', tinymce.plugins.ddshorts_tabbed);
	
})();