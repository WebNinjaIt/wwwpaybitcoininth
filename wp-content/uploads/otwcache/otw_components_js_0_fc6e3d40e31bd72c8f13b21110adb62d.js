// Magnific Popup v0.9.9 by Dmitry Semenov
// http://bit.ly/magnific-popup#build=inline+ajax
(function(a){var b="Close",c="BeforeClose",d="AfterClose",e="BeforeAppend",f="MarkupParse",g="Open",h="Change",i="mfp",j="."+i,k="mfp-ready",l="mfp-removing",m="mfp-prevent-close",n,o=function(){},p=!!window.jQuery,q,r=a(window),s,t,u,v,w,x=function(a,b){n.ev.on(i+a+j,b)},y=function(b,c,d,e){var f=document.createElement("div");return f.className="mfp-"+b,d&&(f.innerHTML=d),e?c&&c.appendChild(f):(f=a(f),c&&f.appendTo(c)),f},z=function(b,c){n.ev.triggerHandler(i+b,c),n.st.callbacks&&(b=b.charAt(0).toLowerCase()+b.slice(1),n.st.callbacks[b]&&n.st.callbacks[b].apply(n,a.isArray(c)?c:[c]))},A=function(b){if(b!==w||!n.currTemplate.closeBtn)n.currTemplate.closeBtn=a(n.st.closeMarkup.replace("%title%",n.st.tClose)),w=b;return n.currTemplate.closeBtn},B=function(){a.magnificPopup.instance||(n=new o,n.init(),a.magnificPopup.instance=n)},C=function(){var a=document.createElement("p").style,b=["ms","O","Moz","Webkit"];if(a.transition!==undefined)return!0;while(b.length)if(b.pop()+"Transition"in a)return!0;return!1};o.prototype={constructor:o,init:function(){var b=navigator.appVersion;n.isIE7=b.indexOf("MSIE 7.")!==-1,n.isIE8=b.indexOf("MSIE 8.")!==-1,n.isLowIE=n.isIE7||n.isIE8,n.isAndroid=/android/gi.test(b),n.isIOS=/iphone|ipad|ipod/gi.test(b),n.supportsTransition=C(),n.probablyMobile=n.isAndroid||n.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),t=a(document),n.popupsCache={}},open:function(b){s||(s=a(document.body));var c;if(b.isObj===!1){n.items=b.items.toArray(),n.index=0;var d=b.items,e;for(c=0;c<d.length;c++){e=d[c],e.parsed&&(e=e.el[0]);if(e===b.el[0]){n.index=c;break}}}else n.items=a.isArray(b.items)?b.items:[b.items],n.index=b.index||0;if(n.isOpen){n.updateItemHTML();return}n.types=[],v="",b.mainEl&&b.mainEl.length?n.ev=b.mainEl.eq(0):n.ev=t,b.key?(n.popupsCache[b.key]||(n.popupsCache[b.key]={}),n.currTemplate=n.popupsCache[b.key]):n.currTemplate={},n.st=a.extend(!0,{},a.magnificPopup.defaults,b),n.fixedContentPos=n.st.fixedContentPos==="auto"?!n.probablyMobile:n.st.fixedContentPos,n.st.modal&&(n.st.closeOnContentClick=!1,n.st.closeOnBgClick=!1,n.st.showCloseBtn=!1,n.st.enableEscapeKey=!1),n.bgOverlay||(n.bgOverlay=y("bg").on("click"+j,function(){n.close()}),n.wrap=y("wrap").attr("tabindex",-1).on("click"+j,function(a){n._checkIfClose(a.target)&&n.close()}),n.container=y("container",n.wrap)),n.contentContainer=y("content"),n.st.preloader&&(n.preloader=y("preloader",n.container,n.st.tLoading));var h=a.magnificPopup.modules;for(c=0;c<h.length;c++){var i=h[c];i=i.charAt(0).toUpperCase()+i.slice(1),n["init"+i].call(n)}z("BeforeOpen"),n.st.showCloseBtn&&(n.st.closeBtnInside?(x(f,function(a,b,c,d){c.close_replaceWith=A(d.type)}),v+=" mfp-close-btn-in"):n.wrap.append(A())),n.st.alignTop&&(v+=" mfp-align-top"),n.fixedContentPos?n.wrap.css({overflow:n.st.overflowY,overflowX:"hidden",overflowY:n.st.overflowY}):n.wrap.css({top:r.scrollTop(),position:"absolute"}),(n.st.fixedBgPos===!1||n.st.fixedBgPos==="auto"&&!n.fixedContentPos)&&n.bgOverlay.css({height:t.height(),position:"absolute"}),n.st.enableEscapeKey&&t.on("keyup"+j,function(a){a.keyCode===27&&n.close()}),r.on("resize"+j,function(){n.updateSize()}),n.st.closeOnContentClick||(v+=" mfp-auto-cursor"),v&&n.wrap.addClass(v);var l=n.wH=r.height(),m={};if(n.fixedContentPos&&n._hasScrollBar(l)){var o=n._getScrollbarSize();o&&(m.marginRight=o)}n.fixedContentPos&&(n.isIE7?a("body, html").css("overflow","hidden"):m.overflow="hidden");var p=n.st.mainClass;return n.isIE7&&(p+=" mfp-ie7"),p&&n._addClassToMFP(p),n.updateItemHTML(),z("BuildControls"),a("html").css(m),n.bgOverlay.add(n.wrap).prependTo(n.st.prependTo||s),n._lastFocusedEl=document.activeElement,setTimeout(function(){n.content?(n._addClassToMFP(k),n._setFocus()):n.bgOverlay.addClass(k),t.on("focusin"+j,n._onFocusIn)},16),n.isOpen=!0,n.updateSize(l),z(g),b},close:function(){if(!n.isOpen)return;z(c),n.isOpen=!1,n.st.removalDelay&&!n.isLowIE&&n.supportsTransition?(n._addClassToMFP(l),setTimeout(function(){n._close()},n.st.removalDelay)):n._close()},_close:function(){z(b);var c=l+" "+k+" ";n.bgOverlay.detach(),n.wrap.detach(),n.container.empty(),n.st.mainClass&&(c+=n.st.mainClass+" "),n._removeClassFromMFP(c);if(n.fixedContentPos){var e={marginRight:""};n.isIE7?a("body, html").css("overflow",""):e.overflow="",a("html").css(e)}t.off("keyup"+j+" focusin"+j),n.ev.off(j),n.wrap.attr("class","mfp-wrap").removeAttr("style"),n.bgOverlay.attr("class","mfp-bg"),n.container.attr("class","mfp-container"),n.st.showCloseBtn&&(!n.st.closeBtnInside||n.currTemplate[n.currItem.type]===!0)&&n.currTemplate.closeBtn&&n.currTemplate.closeBtn.detach(),n._lastFocusedEl&&a(n._lastFocusedEl).focus(),n.currItem=null,n.content=null,n.currTemplate=null,n.prevHeight=0,z(d)},updateSize:function(a){if(n.isIOS){var b=document.documentElement.clientWidth/window.innerWidth,c=window.innerHeight*b;n.wrap.css("height",c),n.wH=c}else n.wH=a||r.height();n.fixedContentPos||n.wrap.css("height",n.wH),z("Resize")},updateItemHTML:function(){var b=n.items[n.index];n.contentContainer.detach(),n.content&&n.content.detach(),b.parsed||(b=n.parseEl(n.index));var c=b.type;z("BeforeChange",[n.currItem?n.currItem.type:"",c]),n.currItem=b;if(!n.currTemplate[c]){var d=n.st[c]?n.st[c].markup:!1;z("FirstMarkupParse",d),d?n.currTemplate[c]=a(d):n.currTemplate[c]=!0}u&&u!==b.type&&n.container.removeClass("mfp-"+u+"-holder");var e=n["get"+c.charAt(0).toUpperCase()+c.slice(1)](b,n.currTemplate[c]);n.appendContent(e,c),b.preloaded=!0,z(h,b),u=b.type,n.container.prepend(n.contentContainer),z("AfterChange")},appendContent:function(a,b){n.content=a,a?n.st.showCloseBtn&&n.st.closeBtnInside&&n.currTemplate[b]===!0?n.content.find(".mfp-close").length||n.content.append(A()):n.content=a:n.content="",z(e),n.container.addClass("mfp-"+b+"-holder"),n.contentContainer.append(n.content)},parseEl:function(b){var c=n.items[b],d;c.tagName?c={el:a(c)}:(d=c.type,c={data:c,src:c.src});if(c.el){var e=n.types;for(var f=0;f<e.length;f++)if(c.el.hasClass("mfp-"+e[f])){d=e[f];break}c.src=c.el.attr("data-mfp-src"),c.src||(c.src=c.el.attr("href"))}return c.type=d||n.st.type||"inline",c.index=b,c.parsed=!0,n.items[b]=c,z("ElementParse",c),n.items[b]},addGroup:function(a,b){var c=function(c){c.mfpEl=this,n._openClick(c,a,b)};b||(b={});var d="click.magnificPopup";b.mainEl=a,b.items?(b.isObj=!0,a.off(d).on(d,c)):(b.isObj=!1,b.delegate?a.off(d).on(d,b.delegate,c):(b.items=a,a.off(d).on(d,c)))},_openClick:function(b,c,d){var e=d.midClick!==undefined?d.midClick:a.magnificPopup.defaults.midClick;if(!e&&(b.which===2||b.ctrlKey||b.metaKey))return;var f=d.disableOn!==undefined?d.disableOn:a.magnificPopup.defaults.disableOn;if(f)if(a.isFunction(f)){if(!f.call(n))return!0}else if(r.width()<f)return!0;b.type&&(b.preventDefault(),n.isOpen&&b.stopPropagation()),d.el=a(b.mfpEl),d.delegate&&(d.items=c.find(d.delegate)),n.open(d)},updateStatus:function(a,b){if(n.preloader){q!==a&&n.container.removeClass("mfp-s-"+q),!b&&a==="loading"&&(b=n.st.tLoading);var c={status:a,text:b};z("UpdateStatus",c),a=c.status,b=c.text,n.preloader.html(b),n.preloader.find("a").on("click",function(a){a.stopImmediatePropagation()}),n.container.addClass("mfp-s-"+a),q=a}},_checkIfClose:function(b){if(a(b).hasClass(m))return;var c=n.st.closeOnContentClick,d=n.st.closeOnBgClick;if(c&&d)return!0;if(!n.content||a(b).hasClass("mfp-close")||n.preloader&&b===n.preloader[0])return!0;if(b!==n.content[0]&&!a.contains(n.content[0],b)){if(d&&a.contains(document,b))return!0}else if(c)return!0;return!1},_addClassToMFP:function(a){n.bgOverlay.addClass(a),n.wrap.addClass(a)},_removeClassFromMFP:function(a){this.bgOverlay.removeClass(a),n.wrap.removeClass(a)},_hasScrollBar:function(a){return(n.isIE7?t.height():document.body.scrollHeight)>(a||r.height())},_setFocus:function(){(n.st.focus?n.content.find(n.st.focus).eq(0):n.wrap).focus()},_onFocusIn:function(b){if(b.target!==n.wrap[0]&&!a.contains(n.wrap[0],b.target))return n._setFocus(),!1},_parseMarkup:function(b,c,d){var e;d.data&&(c=a.extend(d.data,c)),z(f,[b,c,d]),a.each(c,function(a,c){if(c===undefined||c===!1)return!0;e=a.split("_");if(e.length>1){var d=b.find(j+"-"+e[0]);if(d.length>0){var f=e[1];f==="replaceWith"?d[0]!==c[0]&&d.replaceWith(c):f==="img"?d.is("img")?d.attr("src",c):d.replaceWith('<img src="'+c+'" class="'+d.attr("class")+'" />'):d.attr(e[1],c)}}else b.find(j+"-"+a).html(c)})},_getScrollbarSize:function(){if(n.scrollbarSize===undefined){var a=document.createElement("div");a.id="mfp-sbm",a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(a),n.scrollbarSize=a.offsetWidth-a.clientWidth,document.body.removeChild(a)}return n.scrollbarSize}},a.magnificPopup={instance:null,proto:o.prototype,modules:[],open:function(b,c){return B(),b?b=a.extend(!0,{},b):b={},b.isObj=!0,b.index=c||0,this.instance.open(b)},close:function(){return a.magnificPopup.instance&&a.magnificPopup.instance.close()},registerModule:function(b,c){c.options&&(a.magnificPopup.defaults[b]=c.options),a.extend(this.proto,c.proto),this.modules.push(b)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&times;</button>',tClose:"Close (Esc)",tLoading:"Loading..."}},a.fn.magnificPopup=function(b){B();var c=a(this);if(typeof b=="string")if(b==="open"){var d,e=p?c.data("magnificPopup"):c[0].magnificPopup,f=parseInt(arguments[1],10)||0;e.items?d=e.items[f]:(d=c,e.delegate&&(d=d.find(e.delegate)),d=d.eq(f)),n._openClick({mfpEl:d},c,e)}else n.isOpen&&n[b].apply(n,Array.prototype.slice.call(arguments,1));else b=a.extend(!0,{},b),p?c.data("magnificPopup",b):c[0].magnificPopup=b,n.addGroup(c,b);return c};var D="inline",E,F,G,H=function(){G&&(F.after(G.addClass(E)).detach(),G=null)};a.magnificPopup.registerModule(D,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){n.types.push(D),x(b+"."+D,function(){H()})},getInline:function(b,c){H();if(b.src){var d=n.st.inline,e=a(b.src);if(e.length){var f=e[0].parentNode;f&&f.tagName&&(F||(E=d.hiddenClass,F=y(E),E="mfp-"+E),G=e.after(F).detach().removeClass(E)),n.updateStatus("ready")}else n.updateStatus("error",d.tNotFound),e=a("<div>");return b.inlineElement=e,e}return n.updateStatus("ready"),n._parseMarkup(c,{},b),c}}});var I="ajax",J,K=function(){J&&s.removeClass(J)},L=function(){K(),n.req&&n.req.abort()};a.magnificPopup.registerModule(I,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){n.types.push(I),J=n.st.ajax.cursor,x(b+"."+I,L),x("BeforeChange."+I,L)},getAjax:function(b){J&&s.addClass(J),n.updateStatus("loading");var c=a.extend({url:b.src,success:function(c,d,e){var f={data:c,xhr:e};z("ParseAjax",f),n.appendContent(a(f.data),I),b.finished=!0,K(),n._setFocus(),setTimeout(function(){n.wrap.addClass(k)},16),n.updateStatus("ready"),z("AjaxContentAdded")},error:function(){K(),b.finished=b.loadError=!0,n.updateStatus("error",n.st.ajax.tError.replace("%url%",b.src))}},n.st.ajax.settings);return n.req=a.ajax(c),""}}});var M,N=function(){return M===undefined&&(M=document.createElement("p").style.MozTransform!==undefined),M};a.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(a){return a.is("img")?a:a.find("img")}},proto:{initZoom:function(){var a=n.st.zoom,d=".zoom",e;if(!a.enabled||!n.supportsTransition)return;var f=a.duration,g=function(b){var c=b.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),d="all "+a.duration/1e3+"s "+a.easing,e={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},f="transition";return e["-webkit-"+f]=e["-moz-"+f]=e["-o-"+f]=e[f]=d,c.css(e),c},h=function(){n.content.css("visibility","visible")},i,j;x("BuildControls"+d,function(){if(n._allowZoom()){clearTimeout(i),n.content.css("visibility","hidden"),e=n._getItemToZoom();if(!e){h();return}j=g(e),j.css(n._getOffset()),n.wrap.append(j),i=setTimeout(function(){j.css(n._getOffset(!0)),i=setTimeout(function(){h(),setTimeout(function(){j.remove(),e=j=null,z("ZoomAnimationEnded")},16)},f)},16)}}),x(c+d,function(){if(n._allowZoom()){clearTimeout(i),n.st.removalDelay=f;if(!e){e=n._getItemToZoom();if(!e)return;j=g(e)}j.css(n._getOffset(!0)),n.wrap.append(j),n.content.css("visibility","hidden"),setTimeout(function(){j.css(n._getOffset())},16)}}),x(b+d,function(){n._allowZoom()&&(h(),j&&j.remove(),e=null)})},_allowZoom:function(){return n.currItem.type==="image"},_getItemToZoom:function(){return n.currItem.hasSize?n.currItem.img:!1},_getOffset:function(b){var c;b?c=n.currItem.img:c=n.st.zoom.opener(n.currItem.el||n.currItem);var d=c.offset(),e=parseInt(c.css("padding-top"),10),f=parseInt(c.css("padding-bottom"),10);d.top-=a(window).scrollTop()-e;var g={width:c.width(),height:(p?c.innerHeight():c[0].offsetHeight)-f-e};return N()?g["-moz-transform"]=g.transform="translate("+d.left+"px,"+d.top+"px)":(g.left=d.left,g.top=d.top),g}}}),B()})(window.jQuery||window.Zepto);otw_sticky = function( node ){

	this.type = '';
	
	this.position = '';
	
	this.effect = 'slide';
	
	this.effect_speed = 1000;
	
	this.node = node;
	
	this.wrapper = node.parents( '.otw-sticky-wrapoer' );
	
	this.admin_bar_size = 0;
	
	this.hide_value = 0;
	
	this.show_value = 0;
	
	this.push_content = false;
	
	this.push_show_value = 0;
	
	this.push_hide_value = 0;
	
	this.background = false;
	
	this.fixed = '';
	
	this.show_button = '';
	
	this.show_button_pos = 0;
	
	this.hide_button = '';
	
	this.hide_button_pos = 0;
	
	this.disabled = false;
	
	this.visible = true;
	
	with( this ){
		setTimeout( function(){
			init();
		}, 1000 );
	};
}

otw_sticky.prototype.init = function(){
	
	if( this.node.hasClass( 'otw-full-bar' ) ){
		this.type = 'full-bar';
	};
	
	if( this.node.hasClass( 'otw-top-sticky' ) ){
		this.position = 'top';
	};
	
	if( this.node.hasClass( 'otw-bottom-sticky' ) ){
		this.position = 'bottom';
	};
	
	if( this.node.hasClass( 'otw-left-sticky' ) ){
		this.position = 'left';
	};
	
	if( this.node.hasClass( 'otw-right-sticky' ) ){
		this.position = 'right';
	};
	
	if( this.node.hasClass( 'otw-push-content' ) ){
		this.push_content = true;
	}
	
	if( this.node.hasClass( 'otw-with-ovbackground' ) ){
		this.background = true;
	}
	
	if( this.node.hasClass( 'scrolling-position' ) ){
		this.fixed = 'scrolling';
	}
	
	if( this.wrapper.hasClass( 'otw-show-sticky-delay' ) || this.wrapper.hasClass( 'otw-show-sticky-loads' ) || this.wrapper.hasClass( 'otw-show-sticky-seconds' ) || this.node.hasClass( 'otw-show-sticky-mouse' ) || this.node.hasClass( 'otw-show-sticky-wooab' ) || this.node.hasClass( 'otw-show-sticky-scroll' ) || this.node.hasClass( 'otw-show-sticky-scrollto' ) || this.node.hasClass( 'otw-show-sticky-clickon' ) ){
		this.visible = false;
	}
	
	if( this.node.hasClass( 'otw-fade-animation' ) ){
		this.effect = 'fade';
	}
	
	this.show_button = this.node.find( '.otw-show-man-label' );
	
	this.hide_button = this.node.find( '.otw-hide-man-label' );
	
	var admin_bar = jQuery( '#wpadminbar' );
	
	if( admin_bar.size() ){
	
		this.admin_bar_size = admin_bar.height();
	}
	
	switch( this.position ){
		
		case 'left':
				this.node.css( 'visibility', 'hidden' );
				this.node.css( 'display', 'block' );
				
				this.node.css( 'top', this.admin_bar_size );
				
				this.recalculate_settings();
				
				if( this.show_button && this.show_button.size() && this.show_button.hasClass( 'otw-btn-vertical' ) ){
					this.show_button.css( 'top', - ( this.show_button.height()  ) );
				}
				
				if( this.visible ){
					this.node.css( 'visibility', 'visible' );
				}
			break;
		case 'right':
				this.node.css( 'visibility', 'hidden' );
				this.node.css( 'display', 'block' );
				
				this.node.css( 'top', this.admin_bar_size );
				
				this.recalculate_settings();
				
				this.node.css( 'right', this.hide_value );
				
				if( this.visible ){
					this.node.css( 'visibility', 'visible' );
				}
			break;
		case 'top':
				this.node.css( 'visibility', 'hidden' );
				this.node.css( 'display', 'block' );
				
				this.recalculate_settings();
				
				this.node.css( 'top', this.hide_value );
				
				if( this.show_button && this.show_button.size() && this.show_button.hasClass( 'otw-btn-vertical' ) ){
					this.show_button.css( 'right', -( this.show_button.width() ) );
				}
				
				if( this.visible ){
					this.node.css( 'visibility', 'visible' );
				}
			break;
		case 'bottom':
				
				this.node.css( 'visibility', 'hidden' );
				this.node.css( 'display', 'block' );
				
				this.recalculate_settings();
				
				this.node.css( 'bottom', this.hide_value );
				
				if( this.show_button && this.show_button.size() && this.show_button.hasClass( 'otw-btn-vertical' ) ){
					this.show_button.css( 'right', this.show_button.outerHeight() + 30 );
				}
				
				if( this.show_button && this.show_button.size() ){
					this.show_button.css( 'margin-top', this.show_button_pos );
				}
				
				if( this.hide_button && this.hide_button.size() ){
					this.hide_button.css( 'margin-top', this.hide_button_pos );
				}
				
				if( this.visible ){
					this.node.css( 'visibility', 'visible' );
				}
				
			break;
	}
	
	with( this ){
	
		node.find( '.otw-show-man-label' ).click( function(){
			open_sticky();
		} );
		
		node.find( '.otw-hide-man-label' ).click( function(){
			close_sticky();
		} );
	};
	
	if( this.node.hasClass( 'otw_no_device_large' ) && ( jQuery( 'html, body' ).width() > 767 ) ){
		this.node.css( 'display', 'none' );
		this.disabled = true;
	}
	if( this.node.hasClass( 'otw_no_device_small' ) && ( jQuery( 'html, body' ).width() <= 767 ) ){
		this.node.css( 'display', 'none' );
		this.disabled = true;
	}
}

otw_sticky.prototype.open_sticky = function(){
	
	if( this.disabled ){
		return;
	}
	
	if( this.node.css( 'visibility' ) == 'hidden' ){
		this.node.css( 'visibility', 'visible' );
	}
	
	with( this ){
		
		recalculate_settings();
		
		if( push_content ){
			prepare_push_content();
		}
		
		if( background ){
			show_background();
		}
		
		switch( this.position ){
			
			case 'left':
					switch( this.effect ){
					
						case 'slide':
								this.open_left = function(){
									
									hide_button.css( 'margin-left', - ( hide_button_pos + node.width() ) );
									
									node.addClass( 'otw-opening-sticky' );
									node.removeClass( 'otw-hide-sticky' );
									
									hide_button.animate( { 'margin-left': hide_button_pos }, this.effect_speed );
									
									this.node.animate( { right: this.show_value }, this.effect_speed, function(){
										opened_sticky();
									} );
									
									if( push_content ){
										jQuery( '#otw-push-wrapper' ).animate( { 'margin-left': this.push_show_value  }, effect_speed );
									}
								}
								
								show_button.animate( { 'margin-left':  -( show_button_pos + node.width() ) }, this.effect_speed / 2, function(){ open_left() } );
							
							break;
						case 'fade':
								node.css( 'display', 'none' );
								node.css( 'right', show_value );
								node.fadeIn( effect_speed );
								
								opened_sticky();
								
								if( push_content ){
									jQuery( '#otw-push-wrapper' ).css( 'margin-left', this.push_show_value );
								}
							break;
						default:
								this.node.css( 'right', this.show_value );
								opened_sticky();
							break;
						
					}
				break;
			case 'right':
					switch( this.effect ){
					
						case 'slide':
								this.open_right = function(){
									
									hide_button.css( 'margin-right', - ( hide_button_pos + node.width() ) );
									
									node.addClass( 'otw-opening-sticky' );
									node.removeClass( 'otw-hide-sticky' );
									
									hide_button.animate( { 'margin-right': hide_button_pos }, this.effect_speed );
									
									node.animate( { right: this.show_value }, this.effect_speed, function(){
										opened_sticky();
									} );
									
									if( push_content ){
										jQuery( '#otw-push-wrapper' ).animate( { 'margin-left': this.push_show_value  }, effect_speed );
									};
								}
								if( show_button.hasClass( 'otw-btn-vertical' ) ){
									show_button.animate( { 'margin-left':  ( show_button_pos + node.width() ) }, this.effect_speed / 2, function(){ open_right() } );
								}else{
									show_button.animate( { 'margin-right':  -( show_button_pos + node.width() ) }, this.effect_speed / 2, function(){ open_right() } );
								}
							break;
						case 'fade':
								node.css( 'display', 'none' );
								node.css( 'right', show_value );
								node.fadeIn( effect_speed );
								
								opened_sticky();
								
								if( push_content ){
									jQuery( '#otw-push-wrapper' ).css( 'margin-left', this.push_show_value );
								}
							break;
						default:
								this.node.css( 'right', this.show_value );
								opened_sticky();
							break;
						
					}
				break;
			case 'top':
					switch( this.effect ){
					
						case 'slide':
								this.open_top = function(){
									
									hide_button.css( 'margin-top', - ( hide_button_pos + node.height() ) );
									
									node.addClass( 'otw-opening-sticky' );
									node.removeClass( 'otw-hide-sticky' );
									
									hide_button.animate( { 'margin-top': hide_button_pos }, this.effect_speed );
									
									this.node.animate( { top: this.show_value }, this.effect_speed, function(){
										opened_sticky();
									} );
									
									if( push_content ){
										jQuery( '#otw-push-wrapper' ).animate( { 'margin-top': this.push_show_value  }, effect_speed );
									}
								}
								show_button.animate( { 'margin-top':  - ( show_button_pos + node.height() ) }, this.effect_speed / 2, function(){ open_top() } );
							break;
						case 'fade':
								node.css( 'display', 'none' );
								node.css( 'top', show_value );
								node.fadeIn( effect_speed );
								
								opened_sticky();
								
								if( push_content ){
									jQuery( '#otw-push-wrapper' ).css( 'margin-top', this.push_show_value );
								}
							break;
						default:
								this.node.css( 'top', this.show_value );
								opened_sticky();
							break;
						
					}
				break;
			case 'bottom':
					var show_value = this.show_value;
					
					if( this.fixed == 'scrolling' ){
						jQuery( 'body' ).scrollTop( jQuery(document).height() );
						setTimeout(function() {
							jQuery( 'body' ).scrollTop( jQuery(document).height() ); },
						20 );
						this.node.css( 'visibility', 'hidden' );
						this.node.css( 'position', 'absolute' );
						
						show_value = - node.height();
					}
					switch( this.effect ){
					
						case 'slide':
						
								this.open_bottom = function(){
								
									if( this.fixed == 'scrolling' ){
										this.node.css( 'visibility', 'visible' );
									}
									
									hide_button.css( 'margin-top', hide_button_pos + node.height() );
									
									node.addClass( 'otw-opening-sticky' );
									node.removeClass( 'otw-hide-sticky' );
									
									hide_button.animate( { 'margin-top': hide_button_pos }, this.effect_speed );
									
									node.animate( { bottom: show_value }, this.effect_speed, function(){
										opened_sticky();
									} );
									
									if( push_content ){
										jQuery( '#otw-push-wrapper' ).css( 'position', 'relative' );
										jQuery( '#otw-push-wrapper' ).height( jQuery( '#otw-push-wrapper-inner' ).height() );
										jQuery( '#otw-push-wrapper-inner' ).css( 'position', 'absolute' );
										jQuery( '#otw-push-wrapper-inner' ).animate( { 'top': - push_show_value  }, effect_speed );
									}
								}
								
								show_button.animate( { 'margin-top': show_button_pos + node.height() }, this.effect_speed / 2, function(){ open_bottom() } );
							break;
						case 'fade':
								
								this.node.css( 'display', 'none' );
								if( this.fixed == 'scrolling' ){
									this.node.css( 'visibility', 'visible' );
								}
								this.node.css( 'bottom', this.show_value );
								this.node.fadeIn( this.effect_speed );
								
								if( push_content ){
										jQuery( '#otw-push-wrapper' ).css( 'position', 'relative' );
										jQuery( '#otw-push-wrapper' ).height( jQuery( '#otw-push-wrapper-inner' ).height() );
										jQuery( '#otw-push-wrapper-inner' ).css( 'position', 'absolute' );
										jQuery( '#otw-push-wrapper-inner' ).css( 'top', - push_show_value );
								}
								opened_sticky();
							break;
						default:
								this.node.css( 'bottom', this.show_value );
								opened_sticky();
							break;
						
					}
				break;
		}
	};
};
otw_sticky.prototype.opened_sticky = function(){
	
	
	this.node.removeClass( 'otw-opening-sticky' );
	this.node.removeClass( 'otw-hide-sticky' );
	this.node.addClass( 'otw-show-sticky' );
	
	if( this.fixed == 'scrolling' ){
		this.node.css( 'position', 'absolute' );
	}
	
}
otw_sticky.prototype.recalculate_settings = function(){
	
	switch( this.position ){
		
		case 'left':
				this.hide_value = '100%';
				
				this.push_show_value = this.node.width();
				
				this.show_value = jQuery( 'body' ).width() - this.node.width();
			break;
		case 'right':
				this.hide_value = - this.node.width();
				
				this.push_show_value = - this.node.width();
			break;
		case 'top':
				this.hide_value = - ( this.node.height() - this.admin_bar_size + 2 );
				
				this.show_value = this.admin_bar_size;
				
				this.push_show_value = ( this.node.outerHeight() );
			break;
		case 'bottom':
				this.hide_value = - ( this.node.height() );
				
				this.push_show_value = ( this.node.height() );
				
				if( this.show_button && this.show_button.size() ){
					this.show_button_pos = this.hide_value - this.show_button.outerHeight();
				}
				
				if( this.hide_button && this.hide_button.size() ){
					this.hide_button_pos = this.hide_value - this.hide_button.outerHeight();
				}
			break;
	}
}
otw_sticky.prototype.close_sticky = function(){
	
	with( this ){
		
		recalculate_settings();
		
		switch( this.position ){
			
			case 'left':
					switch( this.effect ){
						
						case 'slide':
								hide_button.animate( { 'margin-left': -( hide_button_pos + node.height() + hide_button.outerHeight() ) }, effect_speed );
								
								this.node.animate( { right: this.hide_value }, this.effect_speed, function(){
									closed_sticky();
									show_button.animate( { 'margin-left': show_button_pos }, this.effect_speed );
								} );
								if( push_content ){
									
									jQuery( '#otw-push-wrapper' ).animate( { 'margin-left':  this.push_hide_value  }, effect_speed );
								}
							break;
						case 'fade':
								this.node.fadeOut( this.effect_speed, function(){
									node.css( 'right', hide_value );
									node.css( 'display', 'block' );
									
									closed_sticky();
									
									if( push_content ){
										jQuery( '#otw-push-wrapper' ).css( 'margin-left', push_hide_value );
									}
								} );
							break;
						default:
								this.node.css( 'right', this.hide_value );
								closed_sticky();
							break;
					}
				break;
			case 'right':
					switch( this.effect ){
						
						case 'slide':
								hide_button.animate( { 'margin-right': -( hide_button_pos + node.height() + hide_button.outerHeight() ) }, effect_speed );
								
								this.node.animate( { right: this.hide_value }, this.effect_speed, function(){
									
									closed_sticky();
									
									if( show_button.hasClass( 'otw-btn-vertical' ) ){
										show_button.animate( { 'margin-left': show_button_pos }, this.effect_speed );
									}else{
										show_button.animate( { 'margin-right': show_button_pos }, this.effect_speed );
									}
								} );
								
								if( push_content ){
									jQuery( '#otw-push-wrapper' ).animate( { 'margin-left':  this.push_hide_value  }, effect_speed );
								}
							break;
						case 'fade':
								this.node.fadeOut( this.effect_speed, function(){
									node.css( 'right', hide_value );
									node.css( 'display', 'block' );
									
									closed_sticky();
									
									if( push_content ){
										jQuery( '#otw-push-wrapper' ).css( 'margin-left', push_hide_value );
									}
								} );
							break;
						default:
								this.node.css( 'right', this.hide_value );
								closed_sticky();
							break;
					}
				break;
			case 'top':
					switch( this.effect ){
						
						case 'slide':
								hide_button.animate( { 'margin-top': -( hide_button_pos + node.height() + hide_button.outerHeight() ) }, effect_speed );
								this.node.animate( { top: this.hide_value }, this.effect_speed, function(){
										
									closed_sticky();
									show_button.animate( { 'margin-top': show_button_pos }, this.effect_speed );
								} );
								
								if( push_content ){
									jQuery( '#otw-push-wrapper' ).animate( { 'margin-top':  this.push_hide_value  }, effect_speed );
								}
							break;
						case 'fade':
								this.node.fadeOut( this.effect_speed, function(){
									node.css( 'top', hide_value );
									node.css( 'display', 'block' );
									
									closed_sticky();
									
									if( push_content ){
										jQuery( '#otw-push-wrapper' ).css( 'margin-top', push_hide_value );
									}
								} );
							break;
						default:
								this.node.css( 'top', this.hide_value );
								closed_sticky();
							break;
					}
				break;
			case 'bottom':
					
					switch( this.effect ){
						
						case 'slide':
								hide_button.animate( { 'margin-top': hide_button_pos + node.height() + hide_button.outerHeight() }, effect_speed );
								
								this.node.animate( { bottom: this.hide_value }, this.effect_speed, function(){
									
									closed_sticky();
									show_button.animate( { 'margin-top': show_button_pos }, this.effect_speed );
								} );
								
								if( push_content ){
									
									jQuery( '#otw-push-wrapper' ).height( 'auto' );
									jQuery( '#otw-push-wrapper-inner' ).css( 'position', 'inherit' );
									jQuery( '#otw-push-wrapper-inner' ).animate( { 'top': this.push_hide_value  }, effect_speed );
								}
							break;
						case 'fade':
								
								this.node.fadeOut( this.effect_speed, function(){
									node.css( 'bottom', hide_value );
									node.css( 'display', 'block' );
									
									closed_sticky();
									
									if( push_content ){
									
										jQuery( '#otw-push-wrapper' ).height( 'auto' );
										jQuery( '#otw-push-wrapper-inner' ).css( 'position', 'inherit' );
										jQuery( '#otw-push-wrapper-inner' ).css( 'top', push_hide_value );
									}
								} );
							break;
						default:
								this.node.css( 'bottom', this.hide_value );
								closed_sticky();
							break;
					}
				break;
		}
		
		if( background ){
			hide_background();
		}
	}
}
otw_sticky.prototype.closed_sticky = function(){
	
	this.node.removeClass( 'otw-show-sticky' );
	this.node.addClass( 'otw-hide-sticky' );
	
	if( this.fixed == 'scrolling' ){
		this.node.css( 'position', 'fixed' );
	}
}
otw_sticky.prototype.show_background = function(){

	var background_class = '';
	var background_style = '';
	
	var classes = this.node.attr( 'class' ).split( /\s+/ );
	
	for( var cC = 0; cC < classes.length; cC++ ){
		
		if( classes[cC].match( /^otw\-overlay\-pattern\-([0-9]+)$/ ) ){
			if( background_class.length ){
				background_class = background_class + ' ' + classes[cC];
			}else{
				background_class = classes[cC];
			}
		}else if( classes[cC].match( /^otw_no_device_small$/ ) ){
			if( background_class.length ){
				background_class = background_class + ' ' + classes[cC];
			}else{
				background_class = classes[cC];
			}
		}
	};
	
	if( this.node.attr( 'data-style' ) && this.node.attr( 'data-style' ).length ){
		background_style = this.node.attr( 'data-style' );
	};
	
	if( jQuery( '#otw-overwray-background-wrapper' ).size() == 0 ){
		jQuery( 'body' ).append( '<div id="otw-overwray-background-wrapper"></div>' );
	}
	jQuery( '#otw-overwray-background-wrapper' ).show();
	
	if( background_class.length ){
		jQuery( '#otw-overwray-background-wrapper' ).attr( 'class', background_class );
	}else{
		jQuery( '#otw-overwray-background-wrapper' ).removeAttr( 'class' );
	}
	
	if( background_style.length ){
		jQuery( '#otw-overwray-background-wrapper' ).attr( 'style', background_style );
	}else{
		jQuery( '#otw-overwray-background-wrapper' ).removeAttr( 'style' );
	}
}

otw_sticky.prototype.hide_background = function(){
	
	if( jQuery( '#otw-overwray-background-wrapper' ).size() > 0 ){
		jQuery( '#otw-overwray-background-wrapper' ).hide();
	}
};

otw_sticky.prototype.prepare_push_content = function(){
		
	if( jQuery( '#otw-push-wrapper' ).size() == 0 ){
		jQuery( 'body' ).wrapInner( '<div id="otw-push-wrapper"><div id="otw-push-wrapper-inner"></div></div>' );
		jQuery( '#otw-push-wrapper-inner' ).css( 'width', jQuery( 'body' ).width() + 'px' );
	};
};jQuery(document).ready(function(){

	otw_init_man_bars();
	
	otw_set_full_bar_height();
	
	otw_set_scrolling_content();
	
	otw_set_up_show_hide_buttons();
	
	otw_init_status_classes();
	
	// Switch stickies
	jQuery('.otw-hide-label').click(function(){
	
		
		if( jQuery(this).parent().hasClass( 'otw-bottom-sticky' ) && jQuery(this).parent().hasClass( 'scrolling-position' ) ){
			var node = jQuery( this );
			
			node.parent().find( '.otw-show-label' ).hide();
			
			setTimeout( function(){
				node.parent().css( 'top', 'auto' );
				node.parent().css( 'position', 'fixed' );
				node.parent().find( '.otw-show-label' ).show();
				
				
			}, 1000 );
		}
		if( jQuery(this).parent().hasClass( 'otw-right-sticky' ) && jQuery(this).parent().hasClass( 'scrolling-position' ) ){
			var node = jQuery( this );
			node.parent().find( '.otw-show-label' ).hide();
			
			setTimeout( function(){
				node.parent().css( 'top', node.parent()[0].initial_top );
				//node.parent().css( 'position', 'absolute' );
				node.parent().find( '.otw-show-label' ).show();
				node.parent().addClass( 'otw-right-sticky-closed' );
			}, 1000 );
		}
		jQuery(this).parent().toggleClass("otw-hide-sticky");
		jQuery(this).parent().toggleClass("otw-show-sticky");
		
		otw_overlay_background( jQuery(this).parent(), 'hide' );
		
		if( jQuery(this).parent().hasClass( 'otw-first-show-sticky') ){
			jQuery(this).parent().removeClass( 'otw-first-show-sticky');
		}
	});
	jQuery('.otw-show-label').click(function(){
		
		if( jQuery(this).parent().hasClass( 'otw-bottom-sticky' ) && jQuery(this).parent().hasClass( 'scrolling-position' ) ){
		
			var node = jQuery( this );
			
			node.parent().find( '.otw-show-label' ).slideDown({
				duration: 1000,
				easing: "easeInQuad",
				complete: function(){
					
				}
			});
			setTimeout( function(){
				node.parent().find( '.otw-show-label' ).hide();
				node.parent().css( 'top', jQuery(document).scrollTop() + jQuery( window ).height() - node.parent().height() );
				node.parent().css( 'position', 'absolute' );
				
			
			}, 1000 );
		}
		if( jQuery(this).parent().hasClass( 'otw-right-sticky' ) && jQuery(this).parent().hasClass( 'scrolling-position' ) ){
			
			var node = jQuery( this );
			
			node.parent().removeClass( 'otw-right-sticky-closed' );
			
			/*node.parent().css( 'position', 'fixed' );*/
			
			if( typeof( node.parent()[0].initial_top ) == 'undefined' ){
				node.parent()[0].initial_top = node.parent().position().top;
			}
			
			node.parent().css( 'top', node.parent().position().top );
			node.parent().css( 'position', 'absolute' );
			
			setTimeout( function(){
				/*node.parent().css( 'top', node.parent().position().top );*/
				node.parent().css( 'top', node.parent().position().top );
				node.parent().css( 'position', 'absolute' );
			
			}, 1000 );
		}
		
		jQuery(this).parent().toggleClass("otw-hide-sticky");
		jQuery(this).parent().toggleClass("otw-show-sticky");
		
		otw_overlay_background( jQuery(this).parent(), 'show' );
		
		otw_set_scrolling();
	});
	 
	//open events
	setTimeout( function(){ 
		if( jQuery( '.otw-first-show-sticky' ).size() ){
		
			jQuery( '.otw-first-show-sticky' ).each( function(){
				
				var node = jQuery( this );
				
				if( node.parents( '.otw-show-sticky-delay' ).size() ){
					
					setTimeout( function(){ 
						
						node.parents( '.otw-show-sticky-delay' ).removeClass( 'otw-show-sticky-delay' );
						
						if( node.hasClass( 'otw-sticky-man' ) ){
							
							node.find( '.otw-show-man-label' ).click();
							
							node.find( '.otw-hide-man-label' ).click( function(){
								jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
							} );
						}else{
							node.find( '.otw-show-label' ).click();
							node.find( '.otw-hide-label' ).click( function(){
								jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
							} );
						}
					}, node.parents( '.otw-show-sticky-delay' ).attr( 'data-param' ) );
					
				}else if( node.parents( '.otw-show-sticky-loads' ).size() ){
					
					var parent_node = node.parents( '.otw-show-sticky-loads' ).first();
					
					jQuery.ajax({
						
						type: 'post',
						data: { 
							otw_overlay_action: 'otw-overlay-tracking',
							method: 'open_loads',
							overlay_id: node.attr( 'id' )
						},
						success: function( response ){
						
							if( response == 'open' ){
								if( node.hasClass( 'otw-sticky-man' ) ){
									node.find( '.otw-show-man-label' ).click();
								}else{
									node.find( '.otw-show-label' ).click();
								}
								parent_node.removeClass( 'otw-show-sticky-loads' );
							}
						}
					});
				}else if( node.parents( '.otw-show-sticky-seconds' ).size() ){
					
					var parent_node = node.parents( '.otw-show-sticky-seconds' ).first();
					
					otw_show_sticky_by_seconds( parent_node, true, 1 );
					
				}else if( node.hasClass( 'otw-show-sticky-mouse' ) ){
					
					node.find( '.otw-hide-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-mouse' ).first().removeClass( 'otw-show-sticky-mouse' );
					} );
					node.find( '.otw-hide-man-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-mouse' ).first().removeClass( 'otw-show-sticky-mouse' );
					} );
				}else if( node.hasClass( 'otw-show-sticky-wooab' ) ){
					
					node.find( '.otw-hide-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-wooab' ).first().removeClass( 'otw-show-sticky-wooab' );
					} );
					node.find( '.otw-hide-man-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-wooab' ).first().removeClass( 'otw-show-sticky-wooab' );
					} );
				}else if( node.hasClass( 'otw-show-sticky-scroll' ) ){
					
					node.find( '.otw-hide-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-scroll' ).first().removeClass( 'otw-show-sticky-scroll' );
					} );
					node.find( '.otw-hide-man-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-scroll' ).first().removeClass( 'otw-show-sticky-scroll' );
					} );
				}else if( node.hasClass( 'otw-show-sticky-scrollto' ) ){
					
					node.find( '.otw-hide-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-scrollto' ).first().removeClass( 'otw-show-sticky-scrollto' );
					} );
					node.find( '.otw-hide-man-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-scrollto' ).first().removeClass( 'otw-show-sticky-scrollto' );
					} );
				}else if( node.hasClass( 'otw-show-sticky-clickon' ) ){
					
					node.find( '.otw-hide-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-clickon' ).first().removeClass( 'otw-show-sticky-clickon' );
					} );
					node.find( '.otw-hide-man-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-clickon' ).first().removeClass( 'otw-show-sticky-clickon' );
					} );
				}else if( node.hasClass( 'otw-show-sticky-link' ) ){
					node.find( '.otw-hide-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-link' ).first().removeClass( 'otw-show-sticky-link' );
					} );
					node.find( '.otw-hide-man-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
						jQuery( this ).parents( '.otw-show-sticky-link' ).first().removeClass( 'otw-show-sticky-link' );
					} );
				}else{
					if( node.find( '.otw-show-man-label' ).size() ){
						node.find( '.otw-show-man-label' ).click();
					}else{
						node.find( '.otw-show-label' ).click();
					}
					node.find( '.otw-hide-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
					} );
					node.find( '.otw-hide-man-label' ).click( function(){
						jQuery( this ).parents( '.otw-first-show-sticky' ).first().removeClass( 'otw-first-show-sticky' );
					} );
				}
			} );
		}
	}, 1005);
	otw_init_close_effects();
	
	if( jQuery( '.otw-show-sticky-scroll, .lh-otw-show-sticky-scroll, .otw-show-sticky-scrollto, .lh-otw-show-sticky-scrollto' ).size() ){
		
		
		var scroll_nodes = jQuery( '.otw-show-sticky-scroll' );
		var scroll_lh_nodes = jQuery( '.lh-otw-show-sticky-scroll' );
		var scrollto_nodes = jQuery( '.otw-show-sticky-scrollto' );
		var scrollto_lh_nodes = jQuery( '.lh-otw-show-sticky-scrollto' );
		
		
		jQuery( window ).scroll( function(){
		
			var percentige = Math.floor( ( jQuery(window).scrollTop() / jQuery(document).height() ) * 100 );
			
			scroll_nodes.each( function(){
				
				var node = jQuery( this );
				
				var settingValue = node.parent().attr( 'data-param' );
				
				if( settingValue <= percentige ){
					
					if( node.hasClass( 'otw-first-show-sticky' ) ){
						
						if( node.find( '.otw-show-man-label' ).size() ){
							node.find( '.otw-show-man-label' ).click();
						}else{
							node.find( '.otw-show-label' ).click();
						}
					}else{
						if( node.hasClass( 'otw-sticky-man' ) ){
							node.css( 'visibility', 'visible' );
						}
					}
					node.removeClass( 'otw-show-sticky-scroll' );
					
					scroll_nodes = jQuery( '.otw-show-sticky-scroll' );
				}
			});
			
			scroll_lh_nodes.each( function(){
				
				var node = jQuery( this );
				
				var settingValue = node.attr( 'data-param' );
				
				if( settingValue <= percentige ){
					
					if( node.hasClass( 'mfp-hide') ){
					
						otwOpenMagnificPopup( node );
						
						node.removeClass( 'lh-otw-show-sticky-scroll' );
						
						scroll_lh_nodes = jQuery( '.lh-otw-show-sticky-scroll' );
					}
				}
			});
			
			scrollto_nodes.each( function(){
				
				var node = jQuery( this );
				
				var settingValue = otw_format_element_selector( node.parent().attr( 'data-param' ) );
				
				if( jQuery( settingValue ).size() ){
					
					if( jQuery( settingValue ).position().top <= jQuery(window).scrollTop() ){
						
						if( node.hasClass( 'otw-first-show-sticky' ) ){
							
							if( node.find( '.otw-show-man-label' ).size() ){
								node.find( '.otw-show-man-label' ).click();
							}else{
								node.find( '.otw-show-label' ).click();
							}
						}else{
							if( node.hasClass( 'otw-sticky-man' ) ){
								node.css( 'visibility', 'visible' );
							}
						}
						node.removeClass( 'otw-show-sticky-scrollto' );
						
						scrollto_nodes = jQuery( '.otw-show-sticky-scrollto' );
					};
				};
			});
			
			scrollto_lh_nodes.each( function(){
				
				var node = jQuery( this );
				
				var settingValue = otw_format_element_selector( node.attr( 'data-param' ) );
				
				if( jQuery( settingValue ).size() ){
					
					if( jQuery( settingValue ).position().top <= jQuery(window).scrollTop() ){
						
						if( node.hasClass( 'mfp-hide') ){
							
							otwOpenMagnificPopup( node );
							
							node.removeClass( 'lh-otw-show-sticky-scrollto' );
							
							scrollto_lh_nodes = jQuery( '.lh-otw-show-sticky-scrollto' );
						}
					};
				};
			});
		} );
		
	}
	
	if( jQuery( '.otw-show-sticky-clickon' ).size() || jQuery( '.lh-otw-show-sticky-clickon' ).size() ){
	
		var clickon_nodes = jQuery( '.otw-show-sticky-clickon' );
		var clickon_lh_nodes = jQuery( '.lh-otw-show-sticky-clickon' );
		
		clickon_nodes.each( function(){
			
			var node = jQuery( this );
			
			var settingValue = otw_format_element_selector( node.parent().attr( 'data-param' ) );
			
			if( jQuery( settingValue ).size() ){
				
				jQuery( settingValue ).click( function(){
				
					if( node.hasClass( 'otw-first-show-sticky' ) ){
						if( node.find( '.otw-show-man-label' ).size() ){
							node.find( '.otw-show-man-label' ).click();
						}else{
							node.find( '.otw-show-label' ).click();
						}
					}else{
						if( node.hasClass( 'otw-sticky-man' ) ){
							node.css( 'visibility', 'visible' );
						}
					}
					node.removeClass( 'otw-show-sticky-clickon' );
				});
			};
		});
		
		clickon_lh_nodes.each( function(){
			
			var node = jQuery( this );
				
			var settingValue = otw_format_element_selector( node.attr( 'data-param' ) );
			
			if( jQuery( settingValue ).size() ){
				
				jQuery( settingValue ).click( function(){
				
					if( node.hasClass( 'mfp-hide') ){
							
						otwOpenMagnificPopup( node );
						
						node.removeClass( 'lh-otw-show-sticky-clickon' );
						
						scrollto_lh_nodes = jQuery( '.lh-otw-show-sticky-clickon' );
					}
				});
			};
		});
	}
	
	if( jQuery( '.otw-show-sticky-mouse' ).size() || jQuery( '.lh-otw-show-sticky-mouse' ).size() || jQuery( '.otw-show-sticky-wooab' ).size() || jQuery( '.lh-otw-show-sticky-wooab' ).size() ){
		
		
		jQuery( document ).mouseout( function( e ){
			
			if( e.relatedTarget == null && ( e.clientY < 0 ) ){
				
				jQuery( '.otw-show-sticky-mouse' ).each( function(){
					
					if( !jQuery( this ).hasClass( 'otw-show-sticky') ){
						
						var node = jQuery( this );
						
						if( node.hasClass( 'otw-first-show-sticky' ) ){
							if( node.find( '.otw-show-man-label' ).size() ){
								node.find( '.otw-show-man-label' ).click();
							}else{
								node.find( '.otw-show-label' ).click();
							}
						}else{
							if( node.hasClass( 'otw-sticky-man' ) ){
								node.css( 'visibility', 'visible' );
							}
							node.removeClass( 'otw-show-sticky-mouse' );
						}
						
						jQuery.ajax({
						
							type: 'post',
							data: { 
								otw_overlay_action: 'otw-overlay-tracking',
								method: 'open_mouse',
								overlay_id: jQuery( this ).attr( 'id' )
							}
						});
					};
				});
				
				jQuery( '.lh-otw-show-sticky-mouse' ).each( function(){
					
					if( jQuery( this ).hasClass( 'mfp-hide') ){
						
						otwOpenMagnificPopup( jQuery( this ) );
						
						jQuery.ajax({
						
							type: 'post',
							data: { 
								otw_overlay_action: 'otw-overlay-tracking',
								method: 'open_mouse',
								overlay_id: jQuery( this ).attr( 'id' )
							}
						});
						jQuery( this ).removeClass( 'lh-otw-show-sticky-mouse' );
						
					};
				});
				
				jQuery( '.otw-show-sticky-wooab' ).each( function(){
					
					if( !jQuery( this ).hasClass( 'otw-show-sticky') ){
						
						var node = jQuery( this );
						
						jQuery.ajax({
						
							type: 'post',
							data: { 
								otw_overlay_action: 'otw-overlay-tracking',
								method: 'open_wooab',
								overlay_id: jQuery( this ).attr( 'id' ),
							},
							success: function( response ){
								
								if( response == 'open' ){
									
									if( node.hasClass( 'otw-first-show-sticky' ) ){
										
										if( node.find( '.otw-show-man-label' ).size() ){
											node.find( '.otw-show-man-label' ).click();
										}else{
											node.find( '.otw-show-label' ).click();
										}
									}else{
										if( node.hasClass( 'otw-sticky-man' ) ){
											node.css( 'visibility', 'visible' );
										}
										node.removeClass( 'otw-show-sticky-wooab' );
									}
								}
							}
						});
					}
				});
				
				jQuery( '.lh-otw-show-sticky-wooab' ).each( function(){
					
					if( jQuery( this ).hasClass( 'mfp-hide') ){
						
						var node = jQuery( this );
						
						
						jQuery.ajax({
						
							type: 'post',
							data: { 
								otw_overlay_action: 'otw-overlay-tracking',
								method: 'open_wooab',
								overlay_id: jQuery( this ).attr( 'id' )
							},
							success: function( response ){
								
								if( response == 'open' ){
									otwOpenMagnificPopup( node );
									
									node.removeClass( 'lh-otw-show-sticky-wooab' );
								}
							}
						});
						
						
					};
				});
				
			};
		} );
	};
	
	set_up_close_button_events( false );
	
	//decriment page loads session
	if( jQuery( '.otcl_track' ).size() ){
	
		jQuery( '.otcl_track' ).each( function(){
		
			var matches = false;
			
			if( matches = this.id.match( /^(ovcl|ovcf)_otw\-(.*)$/ ) ){
			
				var track_method = '';
				
				switch( matches[1] ){
					case 'ovcl':
							track_method = 'close_loaded';
						break;
					case 'ovcf':
							track_method = 'close_forever';
						break;
				}
				
				jQuery.ajax({
						
					type: 'post',
					data: { 
						otw_overlay_action: 'otw-overlay-tracking',
						method: track_method,
						overlay_id: 'otw-' + matches[2]
					}
				});
			}
		} );
	}
	
	
	//open after click on link
	if( jQuery( '.otw-open-overlay' ).size() ){
	
		jQuery( '.otw-open-overlay' ).click( function(){
			
			var ov_id = jQuery( this ).attr( 'href' ) || jQuery( this ).attr( 'data-id' );
			
			
			var overlay = jQuery( ov_id );
			
			if( overlay.size() ){
				
				if( overlay.hasClass( 'otw-first-show-sticky' ) ){
					overlay.addClass( 'otw-link-opened' );
					
					if( overlay.find( '.otw-show-man-label' ).size() ){
						overlay.find( '.otw-show-man-label' ).click();
					}else{
						overlay.find( '.otw-show-label' ).click();
					}
				}else if( overlay.hasClass( 'otw-link-opened' ) ){
					if( overlay.find( '.otw-show-man-label' ).size() ){
						overlay.find( '.otw-show-man-label' ).click();
					}else{
						overlay.find( '.otw-show-label' ).click();
					}
				}else{
					overlay.addClass( 'otw-link-opened' );
					overlay.removeClass( 'otw-show-sticky-link' );
				}
			};
		} );
	}
	
	//open after page loads
	if( jQuery( '.otw-show-sticky-loads' ).size() ){
	
		jQuery( '.otw-show-sticky-loads' ).each( function(){
		
			var node = jQuery( this );
			
			if( node.find( '.otw-first-show-sticky' ).size() > 0 ){
				return;
			}
			
			var sticky_id = 0;
			
			if( node.find( '.otw-sticky-man' ).size() ){
				sticky_id = node.find( '.otw-sticky-man' ).attr( 'id' );
			}else{
				sticky_id = node.find( '.otw-sticky' ).attr( 'id' );
			}
			
			jQuery.ajax({
				
				type: 'post',
				data: { 
					otw_overlay_action: 'otw-overlay-tracking',
					method: 'open_loads',
					overlay_id: sticky_id
				},
				success: function( response ){
				
					if( response == 'open' ){
						node.removeClass( 'otw-show-sticky-loads' );
						
						
						if( node.find( '.otw-sticky-man' ).size() ){
							node.find( '.otw-sticky-man' ).css( 'visibility', 'visible' );
						}
					}
				}
			});
		} );
	};
	
	//open after seconds on site
	if( jQuery( '.otw-show-sticky-seconds' ).size() ){
		
		jQuery( '.otw-show-sticky-seconds' ).each( function(){
		
			var node = jQuery( this );
			
			if( node.find( '.otw-first-show-sticky' ).size() > 0 ){
				return;
			}
			
			otw_show_sticky_by_seconds( node, false, 1 );
			
			
		} );
	};
	
	if( jQuery( '.lh-otw-show-sticky-seconds' ).size() ){
		
		jQuery( '.lh-otw-show-sticky-seconds' ).each( function(){
		
			var node = jQuery( this );
			
			otw_show_sticky_by_seconds( node, false, 2 );
			
		} );
	};
	
	//open after page delay
	if( jQuery( '.otw-show-sticky-delay' ).size() ){
	
		jQuery( '.otw-show-sticky-delay' ).each( function(){
			
			var node = jQuery( this );
			setTimeout( function(){ 
				node.removeClass( 'otw-show-sticky-delay' ); 
				
				if( node.find( '.otw-sticky-man' ).size() ){
					node.find( '.otw-sticky-man' ).css( 'visibility', 'visible' );
				}
			}, node.attr( 'data-param' ) );
		} );
	};
	
	//open light boxes
	if( jQuery( '.lh-otw-show-sticky-load' ).size() ){
	
		jQuery( '.lh-otw-show-sticky-load' ).each( function(){
			
			var node = jQuery( this );
			otwOpenMagnificPopup( node );
			
		} );
	};
	
	//lilght open after page delay
	if( jQuery( '.lh-otw-show-sticky-delay' ).size() ){
	
		jQuery( '.lh-otw-show-sticky-delay' ).each( function(){
			
			var node = jQuery( this );
			
			setTimeout( function(){ 
				node.removeClass( 'lh-otw-show-sticky-delay' );
				otwOpenMagnificPopup( node );
			}, node.attr( 'data-param' ) );
		} );
	};
	
	//open light box after page loads
	if( jQuery( '.lh-otw-show-sticky-loads' ).size() ){
	
		jQuery( '.lh-otw-show-sticky-loads' ).each( function(){
		
			var node = jQuery( this );
			jQuery.ajax({
				
				type: 'post',
				data: { 
					otw_overlay_action: 'otw-overlay-tracking',
					method: 'open_loads',
					overlay_id: node.attr( 'id' )
				},
				success: function( response ){
				
					if( response == 'open' ){
						otwOpenMagnificPopup( node );
					}
				}
			});
		} );
	};
	
	
	
	//open from links
	// Inline popups
	jQuery('.otw-display-overlay').click( function(){
		
		var ov_id_code = jQuery( this ).attr( 'href' ) || jQuery( this ).attr( 'data-id' );
		
		var ov_id = ov_id_code.replace( /^#/, '' );
		
		if( jQuery( '#' + ov_id ).size() == 0 ){
			
			jQuery.ajax({
				
				type: 'post',
				data: '&otwcalloverlay=' + ov_id,
				
				success: function( response ){
					
					jQuery( 'body' ).append( response );
					
					if( jQuery( '#' + ov_id ).hasClass( 'otw-sticky-man' ) ){
						
						otw_init_man_sticky( jQuery( '#' + ov_id ) );
						
						otw_init_close_effects();
					}else{
						
						otw_set_scrolling();
						
						jQuery( '#' + ov_id ).find('.otw-hide-label').click(function(){
							jQuery(this).parent().toggleClass("otw-hide-sticky");
							jQuery(this).parent().toggleClass("otw-show-sticky");
							
							otw_overlay_background( jQuery(this).parent(), 'hide' );
						});
						jQuery( '#' + ov_id ).find('.otw-show-label').click(function(){
							
							jQuery(this).parent().toggleClass("otw-hide-sticky");
							jQuery(this).parent().toggleClass("otw-show-sticky");
							
							otw_overlay_background( jQuery(this).parent(), 'show' );
						});
						
						otw_set_scrolling();
						
						otw_overlay_with_admin_bar();
						
						otw_set_up_show_hide_buttons();
						
						set_up_close_button_events( jQuery( '#' + ov_id ) );
						
						otw_init_close_effects();
						
						setTimeout( function(){
							jQuery( '#' + ov_id ).find('.otw-show-label').click();
						}, 100 );
					}
				}
			});
		}else{
			if( jQuery( '#' + ov_id ).hasClass( 'otw-sticky-man' ) ){
				jQuery( '#' + ov_id ).find( '.otw-show-man-label' ).click();
			}else{
				jQuery( '#' + ov_id ).find( '.otw-show-label' ).click();
			}
		}
	});
	
	jQuery('.otw-display-popup-link').each( function(){
	
		var ov_data_id = jQuery( this ).attr( 'href' ) || jQuery( this ).attr( 'data-id' );
		var ov_id = ov_data_id.replace( /^#/, '' );
		
		var effects = jQuery( this ).attr( 'data-effect' );
		
		if( jQuery( '#' + ov_id ).size() ){
			
			var params = {
				callbacks: {
					beforeOpen: function() {
						
						this.st.mainClass = 'otw-mfp ' + this.st.el.attr('data-effect');
					},
					open: function(){
						if( this.content.hasClass( 'hide-overlay-for-small' ) ){
							this.bgOverlay.addClass( 'hide-overlay-for-small' );
							this.container.addClass( 'hide-overlay-for-small' );
							this.container.parents('.mfp-wrap').addClass( 'hide-overlay-for-small' );
						}
						if( this.content.hasClass( 'otw_no_device_large' ) ){
							this.bgOverlay.addClass( 'otw_no_device_large' );
							this.container.addClass( 'otw_no_device_large' );
							this.container.parents('.mfp-wrap').addClass( 'otw_no_device_large' );
						}
						if( this.content.hasClass( 'otw_no_device_small' ) ){
							this.bgOverlay.addClass( 'otw_no_device_small' );
							this.container.addClass( 'otw_no_device_small' );
							this.container.parents('.mfp-wrap').addClass( 'otw_no_device_small' );
						}
					},
					close: function(){
						otwCloseMagnificPopup( this.content );
					}
				},
				removalDelay: 500, //delay removal by X to allow out-animation
				midClick: true
			};
			
			params = otw_magnificPopup_params( jQuery( '#' + ov_id ), params );
			
			jQuery( this ).magnificPopup( params );
		}else{
			var params = {
				type: 'ajax',
				ajax: {
					settings: {
						method: 'post',
						data: '&otwcalloverlay=' + ov_id
					}
				},
				callbacks: {
					ajaxContentAdded: function(){
						
						if( jQuery( this.content[2] ).hasClass( 'hide-overlay-for-small' ) ){
							this.bgOverlay.addClass( 'hide-overlay-for-small' );
							this.container.addClass( 'hide-overlay-for-small' );
							this.container.parents('.mfp-wrap').addClass( 'hide-overlay-for-small' );
						}
						if( jQuery( this.content[2] ).hasClass( 'otw_no_device_large' ) ){
							this.bgOverlay.addClass( 'otw_no_device_large' );
							this.container.addClass( 'otw_no_device_large' );
							this.container.parents('.mfp-wrap').addClass( 'otw_no_device_large' );
						}
						if( jQuery( this.content[2] ).hasClass( 'otw_no_device_small' ) ){
							this.bgOverlay.addClass( 'otw_no_device_small' );
							this.container.addClass( 'otw_no_device_small' );
							this.container.parents('.mfp-wrap').addClass( 'otw_no_device_small' );
						}
						otw_set_scrolling();
						
						otw_init_close_effects();
					},
					close: function(){
						otwCloseMagnificPopup( jQuery( this.content[2] ) );
					}
				},
				mainClass: effects,
				removalDelay: 500, //delay removal by X to allow out-animation
				midClick: true
			}
			params = otw_magnificPopup_params( effects, params );
			
			jQuery( this ).magnificPopup( params );
		};
	} );
	
	jQuery('.otw-display-hinge').each( function(){
	
		var ov_id = jQuery( this ).attr( 'href' ).replace( /^#/, '' );
		
		var effects = 'mfp-with-fade';
		
		if( jQuery( this ).attr( 'data-effect' ).length ){
			effects = effects + ' '+ jQuery( this ).attr( 'data-effect' );
		}
		
		if( jQuery( '#' + ov_id ).size() ){
			var params = {
				mainClass: 'mfp-with-fade',
				callbacks: {
					beforeOpen: function() {
						this.st.mainClass = 'otw-mfp ' + this.st.el.attr('data-effect');
					},
					beforeClose: function() {
						this.content.addClass('hinge');
					},
					close: function() {
						this.content.removeClass('hinge');
					},
					close: function() {
						this.content.removeClass('hinge');
						otwCloseMagnificPopup( this.content );
					},
					open: function(){
						if( this.content.hasClass( 'hide-overlay-for-small' ) ){
							this.bgOverlay.addClass( 'hide-overlay-for-small' );
							this.container.addClass( 'hide-overlay-for-small' );
							this.container.parents('.mfp-wrap').addClass( 'hide-overlay-for-small' );
						}
						if( this.content.hasClass( 'otw_no_device_large' ) ){
							this.bgOverlay.addClass( 'otw_no_device_large' );
							this.container.addClass( 'otw_no_device_large' );
							this.container.parents('.mfp-wrap').addClass( 'otw_no_device_large' );
						}
						if( this.content.hasClass( 'otw_no_device_small' ) ){
							this.bgOverlay.addClass( 'otw_no_device_small' );
							this.container.addClass( 'otw_no_device_small' );
							this.container.parents('.mfp-wrap').addClass( 'otw_no_device_small' );
						}
					}
				},
				removalDelay: 1000, //delay removal by X to allow out-animation
				midClick: true
			}
			params = otw_magnificPopup_params( jQuery( '#' + ov_id ), params );
			
			jQuery( this ).magnificPopup( params );
		}else{
			
			var params = {
				type: 'ajax',
				ajax: {
					settings: {
						method: 'post',
						data: '&otwcalloverlay=' + ov_id
					}
				},
				mainClass: effects,
				removalDelay: 1000, //delay removal by X to allow out-animation
				callbacks: {
					ajaxContentAdded: function(){
						
						if( jQuery( this.content[2] ).hasClass( 'hide-overlay-for-small' ) ){
							this.bgOverlay.addClass( 'hide-overlay-for-small' );
							this.container.addClass( 'hide-overlay-for-small' );
							this.container.parents('.mfp-wrap').addClass( 'hide-overlay-for-small' );
						}
						if( jQuery( this.content[2] ).hasClass( 'otw_no_device_large' ) ){
							this.bgOverlay.addClass( 'otw_no_device_large' );
							this.container.addClass( 'otw_no_device_large' );
							this.container.parents('.mfp-wrap').addClass( 'otw_no_device_large' );
						}
						if( jQuery( this.content[2] ).hasClass( 'otw_no_device_small' ) ){
							this.bgOverlay.addClass( 'otw_no_device_small' );
							this.container.addClass( 'otw_no_device_small' );
							this.container.parents('.mfp-wrap').addClass( 'otw_no_device_small' );
						}
						
						otw_set_scrolling();
						
						otw_init_close_effects();
					},
					beforeClose: function() {
						this.content.addClass('hinge');
					},
					close: function() {
						this.content.removeClass('hinge');
						otwCloseMagnificPopup( jQuery( this.content[2] ) );
					}
				},
				midClick: true
			};
			
			params = otw_magnificPopup_params( effects, params );
			
			jQuery( this ).magnificPopup( params );
		}
	} );
	
	otw_overlay_with_admin_bar();
	
	
	
} );

otw_format_element_selector = function( selector ){
	
	if( typeof( selector ) == 'string' ){
		
		if( selector.match( /^\#/ ) ){
			return selector;
		}
		if( selector.match( /^\./ ) ){
			return selector;
		}
		
		return '#' + selector + ', .' + selector;
	}
	return '';
}

otw_init_status_classes = function(){
	
	jQuery( '.otw-right-sticky.scrolling-position.otw-hide-sticky' ).each( function(){
		
		if( !jQuery( this ).hasClass( 'otw-right-sticky-closed' ) ){
			jQuery( this ).addClass( 'otw-right-sticky-closed' );
		}
	});
};


otw_init_close_effects = function(){
	
	if( jQuery( '.otw-close-sticky-scroll, .lh-otw-close-sticky-scroll, .otw-close-sticky-scrollto, .lh-otw-close-sticky-scrollto' ).size() ){
		
		var scroll_close_nodes = jQuery( '.otw-close-sticky-scroll' );
		var scroll_close_lh_nodes = jQuery( '.lh-otw-close-sticky-scroll' );
		var scrollto_close_nodes = jQuery( '.otw-close-sticky-scrollto' );
		var scrollto_close_lh_nodes = jQuery( '.lh-otw-close-sticky-scrollto' );
		
		jQuery( window ).scroll( function(){
			
			var percentige = Math.floor( ( jQuery(window).scrollTop() / jQuery(document).height() ) * 100 );
			
			scroll_close_nodes.each( function(){
				
				var node = jQuery( this );
				
				var settingValue = node.parent().attr( 'data-closeparam' );
				
				if( settingValue <= percentige ){
					
					if( node.hasClass( 'otw-show-sticky' ) ){
						if( node.find( '.otw-hide-label' ).size() ){
							node.find( '.otw-hide-label' ).click();
						}
						if( node.find( '.otw-hide-man-label' ).size() ){
							node.find( '.otw-hide-man-label' ).click();
						}
					}
				}
			});
			
			scroll_close_lh_nodes.each( function(){
				
				var node = jQuery( this );
				
				var settingValue = node.attr( 'data-closeparam' );
				
				if( settingValue <= percentige ){
					
					if( !node.hasClass( 'mfp-hide') ){
						if( node.find( 'button.mfp-close' ) ){
							node.find( 'button.mfp-close' ).click();
						}
					}
				}
			});
			
			scrollto_close_nodes.each( function(){
				
				var node = jQuery( this );
				
				var settingValue = otw_format_element_selector( node.parent().attr( 'data-closeparam' ) );
				
				if( jQuery( settingValue ).size() ){
					
					if( jQuery( settingValue ).position().top <= jQuery(window).scrollTop() ){
						
						if( node.hasClass( 'otw-show-sticky' ) ){
							if( node.find( '.otw-hide-label' ).size() ){
								node.find( '.otw-hide-label' ).click();
							}
							if( node.find( '.otw-hide-man-label' ).size() ){
								node.find( '.otw-hide-man-label' ).click();
							}
						}
					};
				};
			});
			
			scrollto_close_lh_nodes.each( function(){
				
				var node = jQuery( this );
				
				var settingValue = otw_format_element_selector( node.attr( 'data-closeparam' ) );
				
				if( jQuery( settingValue ).size() ){
					
					if( jQuery( settingValue ).position().top <= jQuery(window).scrollTop() ){
						
						if( !node.hasClass( 'mfp-hide') ){
							if( node.find( 'button.mfp-close' ) ){
								node.find( 'button.mfp-close' ).click();
							}
						}
					};
				};
			});
		});
	}
}

otw_overlay_background = function( node, type ){
	
	if( node.hasClass( 'otw-full-bar' ) && node.hasClass( 'otw-with-ovbackground' ) ){
		
		var background_class = '';
		var background_style = '';
		
		var classes = node.attr( 'class' ).split( /\s+/ );
		
		for( var cC = 0; cC < classes.length; cC++ ){
			
			if( classes[cC].match( /^otw\-overlay\-pattern\-([0-9]+)$/ ) ){
				if( background_class.length ){
					background_class = background_class + ' ' + classes[cC];
				}else{
					background_class = classes[cC];
				}
			}
			else if( classes[cC].match( /^otw_no_device_small$/ ) ){
				
				if( background_class.length ){
					background_class = background_class + ' ' + classes[cC];
				}else{
					background_class = classes[cC];
				}
			}
		}
		
		if( node.attr( 'data-style' ) && node.attr( 'data-style' ).length ){
			var background_style = node.attr( 'data-style' );
		}
		
		if( type == 'show' ){
			if( jQuery( '#otw-overwray-background-wrapper' ).size() == 0 ){
				jQuery( 'body' ).append( '<div id="otw-overwray-background-wrapper"></div>' );
			}
			jQuery( '#otw-overwray-background-wrapper' ).show();
			
			if( background_class.length ){
				jQuery( '#otw-overwray-background-wrapper' ).attr( 'class', background_class );
			}else{
				jQuery( '#otw-overwray-background-wrapper' ).removeAttr( 'class' );
			}
			
			if( background_style.length ){
				jQuery( '#otw-overwray-background-wrapper' ).attr( 'style', background_style );
			}else{
				jQuery( '#otw-overwray-background-wrapper' ).removeAttr( 'style' );
			}
		}else{
			if( jQuery( '#otw-overwray-background-wrapper' ).size() > 0 ){
				jQuery( '#otw-overwray-background-wrapper' ).hide();
			}
		}
	}
}

otw_init_man_bars = function(){

	jQuery( '.otw-sticky-man' ).each( function(){
	
		otw_init_man_sticky( jQuery( this ) );
	} );
}

otw_init_man_sticky = function( node ){

	var otw_man_sticky = new otw_sticky( node );
}

otw_show_sticky_by_seconds = function( node, open_on_load, type ){
	
	if( type == 2 ){
		var sticky_id = node.attr( 'id' );
	}else{
		if( node.find( '.otw-sticky-man' ).size() ){
			var sticky_id = node.find( '.otw-sticky-man' ).attr( 'id' );
		}else{
			var sticky_id = node.find( '.otw-sticky' ).attr( 'id' );
		}
	}
	
	try{
		clearTimeout( window[ 'ssec_' + sticky_id ] );
	}catch( e ){};
	
	
	jQuery.ajax({
		
		type: 'post',
		data: { 
			otw_overlay_action: 'otw-overlay-tracking',
			method: 'open_seconds',
			overlay_id: sticky_id
		},
		success: function( response ){
			
			if( response.match( /^\d+$/ ) ){
			
				window[ 'ssec_' + sticky_id ] = setTimeout( function(){
				
					if( type == 2 ){
						otwOpenMagnificPopup( node );
					}else{
						if( open_on_load ){
							if( node.find( '.otw-show-man-label' ).size() ){
								node.find( '.otw-show-man-label' ).click();
							}else{
								node.find( '.otw-show-label' ).click();
							}
						}
					}
					
					if( node.find( '.otw-sticky-man' ).size() ){
						node.find( '.otw-sticky-man' ).css( 'visibility', 'visible' );
					}
					node.removeClass( 'otw-show-sticky-seconds' );
				}, response * 1000 );
			};
		}
	});
};

set_up_close_button_events = function( selector ){
	
	//close forever events
	var links = false;
	if( selector ){
		
		if( selector.hasClass( 'otw-close-forever' ) ){
			var links = jQuery(  selector  );
		}
	}else{
		var links = jQuery( '.otw-close-forever' );
	}
	
	if( links && links.size() ){
	
		links.each( function(){
		
			var node = jQuery( this );
			if( jQuery( this ).find( '.otw-hide-label' ).size() ){
				
				jQuery( this ).find( '.otw-hide-label' ).click( function(){
					
					node.find( '.otw-show-label' ).hide();
					
					jQuery.ajax({
							
						type: 'post',
						data: { 
							otw_overlay_action: 'otw-overlay-tracking',
							method: 'close_forever',
							overlay_id: node.attr( 'id' )
						}
					});
				} );
			};
			if( jQuery( this ).find( '.otw-hide-man-label' ).size() ){
				
				jQuery( this ).find( '.otw-hide-man-label' ).click( function(){
					
					node.find( '.otw-show-man-label' ).hide();
					
					jQuery.ajax({
							
						type: 'post',
						data: { 
							otw_overlay_action: 'otw-overlay-tracking',
							method: 'close_forever',
							overlay_id: node.attr( 'id' )
						}
					});
				} );
			};
		} );
	};
	
	//close for number of page loads
	var links = false;
	if( selector ){
		
		if( selector.hasClass( 'otw-close-loads' ) ){
			var links = jQuery(  selector  );
		}
	}else{
		var links = jQuery( '.otw-close-loads' );
	}
	
	if( links && links.size() ){
	
		links.each( function(){
		
			var node = jQuery( this );
			jQuery( this ).find( '.otw-hide-label' ).click( function(){
				
				node.find( '.otw-show-label' ).hide();
				
				jQuery.ajax({
						
					type: 'post',
					data: { 
						otw_overlay_action: 'otw-overlay-tracking',
						method: 'close_loads',
						overlay_id: node.attr( 'id' )
					}
				});
			} );
			jQuery( this ).find( '.otw-hide-man-label' ).click( function(){
				
				node.find( '.otw-show-man-label' ).hide();
				
				jQuery.ajax({
						
					type: 'post',
					data: { 
						otw_overlay_action: 'otw-overlay-tracking',
						method: 'close_loads',
						overlay_id: node.attr( 'id' )
					}
				});
			} );
		} );
	};
	
	//close for number of days
	var links = false;
	if( selector ){
		
		if( selector.hasClass( 'otw-close-days' ) ){
			var links = jQuery(  selector  );
		}
	}else{
		var links = jQuery( '.otw-close-days' );
	}
	
	if( links && links.size() ){
	
		links.each( function(){
		
			var node = jQuery( this );
			jQuery( this ).find( '.otw-hide-label' ).click( function(){
				
				node.find( '.otw-show-label' ).hide();
				
				jQuery.ajax({
						
					type: 'post',
					data: { 
						otw_overlay_action: 'otw-overlay-tracking',
						method: 'close_days',
						overlay_id: node.attr( 'id' )
					}
				});
			} );
			
			jQuery( this ).find( '.otw-hide-man-label' ).click( function(){
				
				node.find( '.otw-show-man-label' ).hide();
				
				jQuery.ajax({
						
					type: 'post',
					data: { 
						otw_overlay_action: 'otw-overlay-tracking',
						method: 'close_days',
						overlay_id: node.attr( 'id' )
					}
				});
			} );
		} );
	};
	
	//close until page reload
	var links = false;
	if( selector ){
		
		if( selector.hasClass( 'otw-close-page' ) ){
			var links = jQuery(  selector  );
		}
	}else{
		var links = jQuery( '.otw-close-page' );
	}
	
	if( links && links.size() ){
	
		links.each( function(){
		
			var node = jQuery( this );
			jQuery( this ).find( '.otw-hide-label' ).click( function(){
				
				node.find( '.otw-show-label' ).hide();
				
			} );
			
			jQuery( this ).find( '.otw-hide-man-label' ).click( function(){
				
				node.find( '.otw-show-man-label' ).hide();
				
			} );
		} );
	};
}

otw_set_scrolling_content = function(){

	jQuery( '.otw-small-csr.fixed-position' ).each( function(){
	
		
		var section = jQuery( this ).find( '.otw-sticky-content' );
		
		var section_height = jQuery( this ).outerHeight();
		var section_position = jQuery( this ).position();
		
		var window_height = jQuery( window ).height();
		
		var end_point = Number( section_position.top ) + Number( section_height );
		
		if( end_point > window_height ){
			
			section.css( 'height', ( section.height() - ( end_point - window_height ) - 20 ) + 'px' );
			
			section.css( 'overflow', 'auto' );
		}
	});
}

otw_set_full_bar_height = function(){
	
	jQuery( '.otw-full-bar' ).each( function(){
	
		var node = jQuery( this );
		
		if( node.hasClass( 'otw-left-sticky' ) ||  node.hasClass( 'otw-right-sticky' ) ){
			
			var new_height = jQuery( 'body' ).height();
			
			node.css( 'height', new_height + 'px' );
		};
	});
	
};

otw_set_scrolling = function(){

	if( jQuery( window ).width() <= 767 ){
		jQuery( '.otw-small-csr' ).each( function(){
			
			var node = jQuery( this );
			
			if( node.hasClass( 'fixed-position' ) ){
				
				if( node.find( 'section' ).height() > jQuery( window ).height() ){
					    
						if( node.hasClass( 'otw-top-sticky' ) || node.hasClass( 'otw-bottom-sticky' ) ){
							
							node.find( 'section' ).css( 'height', ( jQuery( window ).height() -  node.find( '.otw-hide-label' ).height() - 100 ) + 'px' );
						}else{
							
							node.find( 'section' ).css( 'height', ( jQuery( window ).height() - 100 ) + 'px' );
						}
						node.find( 'section' ).css( 'overflow', 'auto' );
				}
				if( node.find( 'section' ).width() > jQuery( window ).width() ){
						
						if( node.hasClass( 'otw-left-sticky' ) || node.hasClass( 'otw-right-sticky' ) ){
							node.find( 'section' ).css( 'width', ( jQuery( window ).width() -  node.find( '.otw-hide-label' ).width() - 100 ) + 'px' );
						}else{
							node.find( 'section' ).css( 'width', ( jQuery( window ).width() ) + 'px' );
						}
						node.find( 'section' ).css( 'overflow', 'auto' );
				}
			}else if( node.parents( '.mfp-content' ).size() ){
				
				if( node.parents( '.mfp-content' ).width() > jQuery( window ).width() ){
					
					node.parents( '.mfp-content' ).css( 'width', ( jQuery( window ).width() - 100 )+ 'px' );
					node.parents( '.mfp-content' ).css( 'overflow', 'auto' );
				}
				if( node.parents( '.mfp-content' ).height() > jQuery( window ).height() ){
					
					node.parents( '.mfp-content' ).css( 'height', ( jQuery( window ).height() - 100 ) + 'px' );
					node.parents( '.mfp-content' ).css( 'overflow', 'auto' );
				}
			}
		} );
	}
};

otw_set_up_show_hide_buttons = function(){
	
	jQuery( '.otw-sticky.otw-left-sticky  .otw-btn-vertical' ).each( function(){
			jQuery( this ).css( 'margin-left', ( jQuery( this ).outerHeight() ) + 'px' );
	} );
};

otw_overlay_with_admin_bar = function(){

	var admin_bar = jQuery( '#wpadminbar' );
	
	if( admin_bar.size() ){
		
		
		jQuery( '.otw-sticky.otw-top-sticky, .otw-sticky.otw-left-sticky, .otw-sticky.otw-right-sticky ' ).each( function(){
			
		//	if( jQuery( 'body' ).css( 'position') != 'relative' ){
				if( typeof( this.wpadminbar_fixed ) == 'undefined' ){
					jQuery( this ).css( 'top',  jQuery( this ).position().top + admin_bar.height() );
					
					this.wpadminbar_fixed = 1;
				}
		//	}
		} )
	
	}
}

otwCloseMagnificPopup = function( popup ){
	
	if( popup.hasClass( 'otw-close-forever' ) ){
		
		jQuery.ajax({
			type: 'post',
			data: { 
				otw_overlay_action: 'otw-overlay-tracking',
				method: 'close_forever',
				overlay_id: popup.attr( 'id' )
			}
		});
	}else if( popup.hasClass( 'otw-close-loads' ) ){
		
		jQuery.ajax({
			type: 'post',
			    data: {
				otw_overlay_action: 'otw-overlay-tracking',
				method: 'close_loads',
				overlay_id: popup.attr( 'id' )
			}
		});
	}else if( popup.hasClass( 'otw-close-days') ){
		
		jQuery.ajax({
			type: 'post',
			data: {
				otw_overlay_action: 'otw-overlay-tracking',
				method: 'close_days',
				overlay_id: popup.attr( 'id' )
			}
		});
	}
}

otwOpenMagnificPopup = function( node ){
	
	var is_hinge = false;
	var close_delay = 500;
	var main_class = '';
	
	if( node.attr( 'data-ceffect' ) && ( node.attr( 'data-ceffect' ) == 'hinge' ) ){
		is_hinge = true;
	}
	
	var ppCallbacks = {
		beforeOpen: function() {
			this.st.mainClass = 'otw-mfp ' + node.attr('data-effect'); 
		},
		open: function(){
		
			otw_init_magnificPopup( this );
		},
		close: function(){
			otwCloseMagnificPopup( this.content );
		}
	};
	
	if( is_hinge ){
		
		ppCallbacks.beforeClose = function() {
			this.content.addClass('hinge');
		}
		ppCallbacks.close = function() {
			this.content.removeClass('hinge');
			otwCloseMagnificPopup( this.content );
		}
		close_delay = 1000;
		main_class = 'mfp-with-fade';
	};
	
	var params = {
		mainClass: main_class,
		removalDelay: close_delay,
		items: {
			src: node,
			type: 'inline'
		},
		callbacks: ppCallbacks
	}
	
	params = otw_magnificPopup_params( node, params );
	
	jQuery.magnificPopup.open( params );
}

otw_magnificPopup_params = function( node, params ){
	
	params.closeBtnInside = true;
	params.closeOnContentClick = false;
	params.closeOnBgClick = true;
	params.showCloseBtn = true;
	
	if( ( typeof( params.mainClass ) == 'string' ) && params.mainClass.length > 0 ){
		params.mainClass = params.mainClass + ' otw-mfp';
	}else{
		params.mainClass = 'otw-mfp';
	}
	
	if( typeof( node ) == 'string' ){
		
		if( node.match( /otw\-never\-close/ ) ){
			
			params.closeBtnInside = false;
			params.showCloseBtn = false;
			params.closeOnContentClick = false;
			params.closeOnBgClick = false;
			params.enableEscapeKey = false;
			
		}else{
			
			if( node.match( /otw\-no\-close\-button/ ) ){
				params.closeBtnInside = false;
				params.showCloseBtn = false;
			}
			
			if( node.match( /otw\-close\-on\-content/ ) ){
				params.closeOnContentClick = true;
			}
			
			if( node.match( /otw\-no\-close\-bkg/ ) ){
				params.closeOnBgClick = false;
			}
		}
	}else{
		if( node.hasClass( 'otw-never-close' ) ){
			params.closeBtnInside = false;
			params.showCloseBtn = false;
			params.closeOnContentClick = false;
			params.closeOnBgClick = false;
			params.enableEscapeKey = false;
		}else{
			if( node.hasClass( 'otw-no-close-button' ) ){
				params.closeBtnInside = false;
				params.showCloseBtn = false;
			}
			
			if( node.hasClass( 'otw-close-on-content' ) ){
				params.closeOnContentClick = true;
			}
			
			if( node.hasClass( 'otw-no-close-bkg' ) ){
				params.closeOnBgClick = false;
			}
		}
	}
	return params;
}


otw_init_magnificPopup = function( popupObject ){
	
	if( popupObject.content.attr( 'data-index' ) && Number( popupObject.content.attr( 'data-index' ) ) > 0 ){
		
		popupObject.bgOverlay.zIndex( Number( popupObject.content.attr( 'data-index' ) ) );
		popupObject.container.parents( '.mfp-wrap' ).zIndex( Number( popupObject.content.attr( 'data-index' ) ) + 1 );
	}
	if( popupObject.content.hasClass( 'otw-close-forever' ) ){
	
		if( popupObject.content.find( '.mfp-close' ).size() ){
		
			popupObject.content.find( '.mfp-close' ).click( function(){
				jQuery.ajax({
					type: 'post',
					data: { 
						otw_overlay_action: 'otw-overlay-tracking',
						method: 'close_forever',
						overlay_id: popupObject.content.attr( 'id' )
					}
				});
			});
		}
	}else if( popupObject.content.hasClass( 'otw-close-loads' ) ){
		
		if( popupObject.content.find( '.mfp-close' ).size() ){
		
			popupObject.content.find( '.mfp-close' ).click( function(){
				jQuery.ajax({
					type: 'post',
					data: { 
						otw_overlay_action: 'otw-overlay-tracking',
						method: 'close_loads',
						overlay_id: popupObject.content.attr( 'id' )
					}
				});
			});
		}
	}else if( popupObject.content.hasClass( 'otw-close-days' ) ){
		
		if( popupObject.content.find( '.mfp-close' ).size() ){
		
			popupObject.content.find( '.mfp-close' ).click( function(){
				jQuery.ajax({
					type: 'post',
					data: { 
						otw_overlay_action: 'otw-overlay-tracking',
						method: 'close_days',
						overlay_id: popupObject.content.attr( 'id' )
					}
				});
			});
		}
	}
	if( popupObject.content.hasClass( 'hide-overlay-for-small' ) ){
		popupObject.bgOverlay.addClass( 'hide-overlay-for-small' );
		popupObject.container.addClass( 'hide-overlay-for-small' );
		popupObject.container.parents('.mfp-wrap').addClass( 'hide-overlay-for-small' );
	}
	if( popupObject.content.hasClass( 'otw_no_device_large' ) ){
		popupObject.bgOverlay.addClass( 'otw_no_device_large' );
		popupObject.container.addClass( 'otw_no_device_large' );
		popupObject.container.parents('.mfp-wrap').addClass( 'otw_no_device_large' );
	}
	if( popupObject.content.hasClass( 'otw_no_device_small' ) ){
		popupObject.bgOverlay.addClass( 'otw_no_device_small' );
		popupObject.container.addClass( 'otw_no_device_small' );
		popupObject.container.parents('.mfp-wrap').addClass( 'otw_no_device_small' );
	}
	
	if( popupObject.content.attr( 'data-style' ) && popupObject.content.attr( 'data-style' ).length ){
		popupObject.bgOverlay.css( 'cssText', popupObject.content.attr( 'data-style' ) );
	}
	
	otw_set_scrolling();
}