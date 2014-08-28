(function() {
	
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('ddshorts_columns');
	
	tinymce.create('tinymce.plugins.ddshorts_columnsPlugin', {
		
		//init
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mceddshorts_columns', function() {
				
				ed.windowManager.open({
					
					file : url + 'window.html',
					width : 360 + ed.getLang('ddshorts_columns.delta_width', 0),
					height : 210 + ed.getLang('ddshorts_columns.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton('ddshorts_columns', {
				
				title : 'Insert a floated column into your page',
				cmd : 'mceddshorts_columns',
				image : url + 'columns.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				cm.setActive('mceddshorts_columns', n.nodeName == 'IMG');
				
			});
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
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
	tinymce.PluginManager.add('ddshorts_columns', tinymce.plugins.ddshorts_columns);
	
})();


