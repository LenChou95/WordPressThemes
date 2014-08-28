(function($) { 
	
	$.fn.popup_links = function(options){
		options = $.extend({}, $.PopupLink.defaults, options);
		return this.each(function() {
			new $.PopupLink(this, options);
		});
	};
	
	$.PopupLink = function(ob, options){
	
		options = $.extend({}, $.PopupLink.defaults, options);
		
		var cX, cY, pX, pY;

		// A private function for getting mouse position
		var track = function(ev) {
			cX = ev.pageX;
			cY = ev.pageY;
		};

		// A private function for comparing current and previous mouse position
		var compare = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			// compare mouse positions to see if they've crossed the threshold
			if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < options.sensitivity ) {
				$(ob).unbind("mousemove",track);
				// set hoverIntent state to true (so mouseOut can be called)
				ob.hoverIntent_s = 1;
				$(options.popup_selector).hide();
				positionAndShowPopup(ev, ob);
				$(document).bind("mousemove", popupFollow);
			} else {
				// set previous coordinates for next time
				pX = cX; pY = cY;
				// use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
				ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , options.interval );
			}
		};
		
		var positionAndShowPopup = function(ev, ob){
			var popup = $(ob).next(options.popup_selector);
			var left = (parseInt(mouseX(ev) - options.offset_x - windowOffsetX()));
			if((left + popup.width()) > $('body').width() - windowOffsetX() - options.offset_x ){
				left = $('body').width() - windowOffsetX() - popup.width() - options.offset_x;
			}
			var arrowOffset = ((mouseX(ev) - left - windowOffsetX()) / popup.width()) * 100;  
			// set the top offset. We check if there are any child elements that better fit to use as our anchor.
			// did this to catch links with multiple words that can be split across different lines of text.
			var topOff = $(ob).offset().top - ($(ob).height()/2);
			if($(ob).children('span').length > 0){
				$(ob).children().each(function(){
					if($(this).offset().left <= mouseX(ev) && mouseX(ev) <= ($(this).offset().left + $(this).width())){
						return topOff = $(this).offset().top - ($(this).height()/2);
					}
				});
			}
			var top = (topOff - options.offset_y - popup.height());
			if(!options.lock_y){
				top = (parseInt(mouseY(ev) - options.offset_y  - popup.height() - windowOffsetY()));
			}
			popup.attr("style", "display:block;visible:true;top:"+top+"px;left:"+left+"px;background-position:"+arrowOffset+"% 100%;");
		};
		// A private function for delaying the mouseOut function
		var delay = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			ob.hoverIntent_s = 0;
			//return hidePopup.apply(ob,[ev]);
			return $(ob).next(options.popup_selector).attr("style", "display:none;");
		};
		
		var handleHover = function(e) {
			// next three lines copied from jQuery.hover, ignore children onMouseOver/onMouseOut
			var p = (e.type == "mouseover" ? e.fromElement : e.toElement) || e.relatedTarget;
			while ( p && p != this ) { try { p = p.parentNode; } catch(e) { p = this; } }
			if ( p == this ) { return false; }

			// copy objects to be passed into t (required for event object to be passed in IE)
			var ev = $.extend({},e);
			var ob = this;
			
			// cancel hoverIntent timer if it exists
			if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

			// else e.type == "onmouseover"
			if (e.type == "mouseover") {
				// set "previous" X and Y position based on initial entry point
				pX = mouseX(ev); pY = mouseY(ev);
				// update "current" X and Y position based on mousemove
				$(ob).bind("mousemove",track);
				// start polling interval (self-calling timeout) to compare mouse coordinates over time
				if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , options.interval );}

			// else e.type == "onmouseout"
			} else {
				//ensure we're actually outside and not just hitting the popup - NOT WORKING YET
				// if(mouseX(ev) > $(ob).offset().left && mouseX(ev) < ($(ob).offset().left + $(ob).width()) && mouseY(ev) > ($(ob).offset().top.y - $(ob).children().eq(0).height()) && mouseY(ev) < $(ob).offset().top){return alert('popup bump');};
				// unbind expensive mousemove event
				$(ob).unbind("mousemove",track);
				if(options.allowRollOver){$(document).unbind("mousemove", popupFollow);};
				// if hoverIntent state is true, then call the mouseOut function after the specified delay
				if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);$(document).unbind("mousemove", popupFollow);} , options.timeout );}
			}
		};
		
		var handlePopupHover = function(e){
			// next three lines copied from jQuery.hover, ignore children onMouseOver/onMouseOut
			var p = (e.type == "mouseover" ? e.fromElement : e.toElement) || e.relatedTarget;
			while ( p && p != this ) { try { p = p.parentNode; } catch(e) { p = this; } }
			if ( p == this ) { return false; }

			// copy objects to be passed into t (required for event object to be passed in IE)
			var ev = jQuery.extend({},e);
			
			// clear the links hovertimer
			if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }
			
			//reset the hover intent
			ob.hoverIntent_s = 0;
			
			if(e.type == "mouseout"){
				return $(this).attr("style", "display:none;");
			
			}
		};
		
		function popupFollow(evt){
			var ob = $(options.popup_selector+":visible").prev(options.link_selector);
			positionAndShowPopup(evt, ob);
			/*
			if(ob){
				var left =  ob.style.left;				
				if(!options.lock_x){
					var left = (parseInt(mouseX(evt) - options.offset_x - windowOffsetX()));
					if((left+$(options.popup_selector+":first").width()) > $('body').width() ){
						left = $('body').width() - ($(options.popup_selector+":first").width() + left) - 10;
					}
					left = left + 'px';
				}
				var top = parseInt(ob.style.top);
				if(!options.lock_y){
					top = (parseInt(mouseY(evt) - options.offset_y  - $(ob).height() - windowOffsetY())) + 'px';
				}
				var arrowOffset = ((mouseX(evt) - (left + options.offset_x + 25)) / $(ob).width()) * 100;  
				$(ob).attr("style", "display:block;visible:true;top:"+top+"px;left:"+left+"px;background-position:"+arrowOffset+"% 100%;");
				
			}*/
		}
	
		function mouseX(evt) {if (!evt) evt = window.event; if (evt.pageX) return evt.pageX; else if (evt.clientX)return evt.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft); else return 0;}
		function mouseY(evt) {if (!evt) evt = window.event; if (evt.pageY) return evt.pageY; else if (evt.clientY)return evt.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop); else return 0;}
		function windowOffsetX(){ var windowOffset = ($(document.body).width() - $('#main').width())/2; return (windowOffset < 0) ? 0 : windowOffset; }
		function windowOffsetY(){ var windowOffset = ($(document.body).height() - $('#main').height())/2; return (windowOffset < 0) ? 0 : windowOffset; }
		
		if(options.allowRollOver){$(ob).next().mouseover(handlePopupHover).mouseout(handlePopupHover)};
		return $(ob).mouseover(handleHover).mouseout(handleHover);
	};
		
	$.PopupLink.defaults = {
		link_selector: "a.popup",
		popup_selector: "div.popup",
		lock_x: false,
		lock_y: true,
		offset_x: 25,
		offset_y: 0,
		sensitivity: 7,
		allowRollOver: true,
		interval: 50,
		timeout: 200
	};
	
})(jQuery);