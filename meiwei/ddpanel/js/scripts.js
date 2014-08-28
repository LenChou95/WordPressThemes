function logoDropDown() {
	
	//defines new css properties
	jQuery('#ddpanel-logo > span.hovered').css({ display: 'block', opacity: 0 });
	jQuery('#ddpanel-logo > ul > li > span').css({ display: 'block', opacity: 0 });
	
	//when we hover the logo
	jQuery('#ddpanel-logo').hover(function() {
		
		jQuery(this).children('span.hovered').stop().animate({ opacity: 1 }, 150, function() {
			
			jQuery('#ddpanel-logo > ul').stop(true, true).slideDown(200);
			
		});
		
	}, function() {
		
		jQuery(this).children('span.hovered').stop().animate({ opacity: 0 }, 150);
		
		jQuery('#ddpanel-logo > ul').stop(true, true).fadeOut(150);
		
	});
	
	//when we hover the menu items
	jQuery('#ddpanel-logo > ul > li').hover(function() {
		
		jQuery(this).children('span').stop().animate({ opacity: 1 }, 200);
		
	}, function() {
		
		jQuery(this).children('span').stop().animate({ opacity: 0 }, 200);
		
	});
	
}

function menuEffects() {
	
	jQuery('#ddpanel-menu > ul > li:first').addClass('current');
	jQuery('#ddpanel-sections > li:first').show().addClass('current');
	
	//defines new css properties
	jQuery('#ddpanel-menu > ul > li > div > span, #ddpanel-menu > ul > li > .title').css({ display: 'block', opacity: 0 });
	
	//hover effects
	jQuery('#ddpanel-menu > ul > li > div').hover(function() {
		
		if(jQuery(this).parent().attr('class') != 'current') {
		
			jQuery(this).children('span').stop().animate({ opacity: 1 }, 150, function() {
				
				jQuery(this).parent().parent().children('.title').stop().animate({ opacity: 1, top: '52px' }, 150);
				
			});
		
		}
		
	}, function() {
		
		jQuery(this).children('span').stop().animate({ opacity: 0 }, 150);
		jQuery(this).parent().children('.title').stop().animate({ opacity: 0, top: '47px' }, 100);
		
	});
	
	//when clicked
	jQuery('#ddpanel-menu > ul > li > div').click(function() {
		
		if(jQuery(this).parent().attr('class') != 'current') {
			
			jQuery('#ddpanel-menu > ul > li.current').removeClass('current');
			jQuery(this).parent().addClass('current');
			
			var mySectionId = jQuery(this).parent().attr('id');
			
			jQuery('#ddpanel-sections > li.current').hide().removeClass('current');
			jQuery('.'+mySectionId).show().addClass('current');
			
			ddpanelTabs();
			
		}
		
	});
	
}

function fieldsTooltips() {
	
	jQuery('.ddpanel-desc').click(function() {
		
		if(jQuery(this).children('p').css('display') == 'none') {
			
			jQuery(this).children('p').stop(true, true).fadeIn(150);
			
		} else {
			
			jQuery(this).children('p').stop(true, true).fadeOut(100);
			
		}
		
	});
	
}

function ddpanelLayout() {
	
	jQuery('.ddpanel-layout ul').each(function() {
		
		var myVal = jQuery(this).children('li.current').attr('title');
		jQuery(this).children('input').val(myVal);
		
	});
	
	jQuery('.ddpanel-layout ul li').click(function() {
		
		var myNewVal = jQuery(this).attr('title');
		
		jQuery(this).parent().children('li.current').removeClass('current');
		jQuery(this).addClass('current');
		
		jQuery(this).parent().children('input').val(myNewVal);
		
	});
	
}

function ddpanelSelect() {
	
	jQuery('.ddpanel-select-button > span, .ddpanel-select > ul > li > span.bg').css({ display: 'block', opacity: 0 });
	
	jQuery(window).click(function() {
		
		if(selectOpen == 1) {
		
			jQuery('.ddpanel-select-button-active').removeClass('ddpanel-select-button-active').addClass('ddpanel-select-button');
			jQuery('.ddpanel-select > ul').stop(true, true).slideUp(150);
			
			selectOpen = 0;
			
		}
		
	});
	
	jQuery('.ddpanel-select').each(function() {
	
		var currentOption = jQuery(this).children('ul').children('li.current');
		
		if(currentOption.length > 0) {} else {
			
			var currentOption = jQuery(this).children('ul').children('li:first');
			
		}
		
		jQuery(this).children('span.current').text(currentOption.children('.text').text());
		
		jQuery(this).children('input').val(currentOption.attr('title'));
	
	});
	
	jQuery('.ddpanel-select').hover(function() {
		
		jQuery(this).children('.ddpanel-select-button').children('span').stop().animate({ opacity: 1 }, 150);
		
	}, function() {
		
		jQuery(this).children('.ddpanel-select-button').children('span').stop().animate({ opacity: 0 }, 150);
		
	});
	
	jQuery('.ddpanel-select > ul > li').hover(function() {
		
		jQuery(this).children('span.bg').stop().animate({ opacity: 1 }, 100);
		
	}, function() {
		
		jQuery(this).children('span.bg').stop().animate({ opacity: 0 }, 100);
		
	});
	
	selectOpen = 0;
	
	jQuery('.ddpanel-select > span.current').click(function() {
		
		var mainCont = jQuery(this).parent();
		
		if(jQuery(this).parent().children('ul').css('display') == 'none') {
			
			jQuery(this).parent().children('.ddpanel-select-button').removeClass('ddpanel-select-button').addClass('ddpanel-select-button-active');
			mainCont.css({ 'z-index': '60' });
			jQuery(this).parent().children('ul').stop(true, true).slideDown(200, function() {
				
				selectOpen = 1;
				
			});
			
		} else {
			
			jQuery(this).parent().children('.ddpanel-select-button-active').removeClass('ddpanel-select-button-active').addClass('ddpanel-select-button');
			jQuery(this).parent().children('ul').stop(true, true).slideUp(150, function() {
				
				mainCont.css({ 'z-index': '30' });
				
			});
			
			selectOpen = 0;
			
		}
		
	});
	
	jQuery('.ddpanel-select > ul > li').click(function() {
		
		jQuery(this).parent().parent().children('.ddpanel-select-button-active').removeClass('ddpanel-select-button-active').addClass('ddpanel-select-button');
		jQuery(this).parent().stop(true, true).slideUp(100);
		
		var currentOption = jQuery(this);
		
		selectOpen = 0;
		
		jQuery(this).parent().parent().children('span.current').text(currentOption.children('.text').text());
		
		jQuery(this).parent().parent().children('input').val(currentOption.attr('title'));
		
	});
	
}

function ddpanelTabs() {
	
	jQuery('#ddpanel-sections > li.current > .ddpanel-tabs > li').removeClass('current');
	jQuery('#ddpanel-sections > li.current > .ddpanel-tabs > li:first').addClass('current');
	jQuery('.ddtabs > li').hide();
	jQuery('#ddpanel-sections > li.current > .ddtabs > li:first').show();
	
	jQuery('.ddpanel-tabs > li').click(function() {
		
		if(jQuery(this).attr('class') != 'current') {
			
			var myTabId = jQuery(this).attr('id');
			
			jQuery('.ddtabs > li').hide();
			jQuery('.ddtabs > li.'+myTabId).show();
			
			jQuery('.ddpanel-tabs > li.current').removeClass('current');
			jQuery('#'+myTabId).addClass('current');
			
		}
		
	});
	
}

function ddpanelNotifications() {
	
	jQuery('.ddpanel-notification').click(function() {
		
		jQuery(this).fadeOut(200);
		
	});
	
}