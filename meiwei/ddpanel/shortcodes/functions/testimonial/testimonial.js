(function() {
	
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('ddshorts_testimonial');
	
	tinymce.create('tinymce.plugins.ddshorts_testimonial', {		 
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mceddshorts_testimonial', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('ddshorts_testimonials.delta_width', 0),
					height : 480 + ed.getLang('ddshorts_testimonials.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton('ddshorts_testimonial', {
				
				title : 'Insert Testimonial',
				cmd : 'mceddshorts_testimonial',
				image : url + '/testimonial.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				cm.setActive('mceddshorts_testimonial', n.nodeName == 'IMG');
				
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
	tinymce.PluginManager.add('ddshorts_testimonial', tinymce.plugins.ddshorts_testimonial);
	
})();