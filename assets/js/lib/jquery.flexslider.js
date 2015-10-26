/*! fancyBox v2.1.0 fancyapps.com | fancyapps.com/fancybox/#license */
(function(u,p,f,q){var o=f(u),n=f(p),b=f.fancybox=function(){b.open.apply(this,arguments)},z=null,m=p.createTouch!==q,x=function(a){return a&&a.hasOwnProperty&&a instanceof f},s=function(a){return a&&"string"===f.type(a)},C=function(a){return s(a)&&0<a.indexOf("%")},k=function(a,c){var e=parseInt(a,10);c&&C(a)&&(e*=b.getViewport()[c]/100);return Math.ceil(e)},v=function(a,b){return k(a,b)+"px"};f.extend(b,{version:"2.1.0",defaults:{padding:15,margin:20,width:800,height:600,minWidth:100,minHeight:100,
maxWidth:9999,maxHeight:9999,autoSize:!0,autoHeight:!1,autoWidth:!1,autoResize:!m,autoCenter:!m,fitToView:!0,aspectRatio:!1,topRatio:0.5,leftRatio:0.5,scrolling:"auto",wrapCSS:"",arrows:!0,closeBtn:!0,closeClick:!1,nextClick:!1,mouseWheel:!0,autoPlay:!1,playSpeed:3E3,preload:3,modal:!1,loop:!0,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},iframe:{scrolling:"auto",preload:!0},swf:{wmode:"transparent",allowfullscreen:"true",allowscriptaccess:"always"},keys:{next:{13:"left",34:"up",39:"left",40:"up"},
prev:{8:"right",33:"down",37:"right",38:"down"},close:[27],play:[32],toggle:[70]},direction:{next:"left",prev:"right"},scrollOutside:!0,index:0,type:null,href:null,content:null,title:null,tpl:{wrap:'<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',image:'<img class="fancybox-image" src="{href}" alt="" />',iframe:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"'+
(f.browser.msie?' allowtransparency="true"':"")+"></iframe>",error:'<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',closeBtn:'<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',next:'<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',prev:'<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'},openEffect:"fade",openSpeed:250,openEasing:"swing",
openOpacity:!0,openMethod:"zoomIn",closeEffect:"fade",closeSpeed:250,closeEasing:"swing",closeOpacity:!0,closeMethod:"zoomOut",nextEffect:"elastic",nextSpeed:250,nextEasing:"swing",nextMethod:"changeIn",prevEffect:"elastic",prevSpeed:250,prevEasing:"swing",prevMethod:"changeOut",helpers:{overlay:{closeClick:!0,speedOut:200,showEarly:!0,css:{}},title:{type:"float"}},onCancel:f.noop,beforeLoad:f.noop,afterLoad:f.noop,beforeShow:f.noop,afterShow:f.noop,beforeChange:f.noop,beforeClose:f.noop,afterClose:f.noop},
group:{},opts:{},previous:null,coming:null,current:null,isActive:!1,isOpen:!1,isOpened:!1,wrap:null,skin:null,outer:null,inner:null,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,transitions:{},helpers:{},open:function(a,c){if(a&&(f.isPlainObject(c)||(c={}),!1!==b.close(!0)))return f.isArray(a)||(a=x(a)?f(a).get():[a]),f.each(a,function(e,d){var j={},g,h,i,l,k;"object"===f.type(d)&&(d.nodeType&&(d=f(d)),x(d)?(j={href:d.attr("href"),title:d.attr("title"),isDom:!0,element:d},f.metadata&&
f.extend(!0,j,d.metadata())):j=d);g=c.href||j.href||(s(d)?d:null);h=c.title!==q?c.title:j.title||"";l=(i=c.content||j.content)?"html":c.type||j.type;!l&&j.isDom&&(l=d.data("fancybox-type"),l||(l=(l=d.prop("class").match(/fancybox\.(\w+)/))?l[1]:null));if(s(g)&&(l||(b.isImage(g)?l="image":b.isSWF(g)?l="swf":"#"===g.charAt(0)?l="inline":s(d)&&(l="html",i=d)),"ajax"===l))k=g.split(/\s+/,2),g=k.shift(),k=k.shift();i||("inline"===l?g?i=f(s(g)?g.replace(/.*(?=#[^\s]+$)/,""):g):j.isDom&&(i=d):"html"===l?
i=g:!l&&(!g&&j.isDom)&&(l="inline",i=d));f.extend(j,{href:g,type:l,content:i,title:h,selector:k});a[e]=j}),b.opts=f.extend(!0,{},b.defaults,c),c.keys!==q&&(b.opts.keys=c.keys?f.extend({},b.defaults.keys,c.keys):!1),b.group=a,b._start(b.opts.index)},cancel:function(){var a=b.coming;a&&!1!==b.trigger("onCancel")&&(b.hideLoading(),b.ajaxLoad&&b.ajaxLoad.abort(),b.ajaxLoad=null,b.imgPreload&&(b.imgPreload.onload=b.imgPreload.onerror=null),a.wrap&&a.wrap.stop(!0).trigger("onReset").remove(),b.current||
b.trigger("afterClose"),b.coming=null)},close:function(a){b.cancel();!1!==b.trigger("beforeClose")&&(b.unbindEvents(),!b.isOpen||!0===a?(f(".fancybox-wrap").stop(!0).trigger("onReset").remove(),b._afterZoomOut()):(b.isOpen=b.isOpened=!1,b.isClosing=!0,f(".fancybox-item, .fancybox-nav").remove(),b.wrap.stop(!0,!0).removeClass("fancybox-opened"),"fixed"===b.wrap.css("position")&&b.wrap.css(b._getPosition(!0)),b.transitions[b.current.closeMethod]()))},play:function(a){var c=function(){clearTimeout(b.player.timer)},
e=function(){c();b.current&&b.player.isActive&&(b.player.timer=setTimeout(b.next,b.current.playSpeed))},d=function(){c();f("body").unbind(".player");b.player.isActive=!1;b.trigger("onPlayEnd")};if(!0===a||!b.player.isActive&&!1!==a){if(b.current&&(b.current.loop||b.current.index<b.group.length-1))b.player.isActive=!0,f("body").bind({"afterShow.player onUpdate.player":e,"onCancel.player beforeClose.player":d,"beforeLoad.player":c}),e(),b.trigger("onPlayStart")}else d()},next:function(a){var c=b.current;
c&&(s(a)||(a=c.direction.next),b.jumpto(c.index+1,a,"next"))},prev:function(a){var c=b.current;c&&(s(a)||(a=c.direction.prev),b.jumpto(c.index-1,a,"prev"))},jumpto:function(a,c,e){var d=b.current;if(d&&(a=k(a),b.direction=c||d.direction[a>=d.index?"next":"prev"],b.router=e||"jumpto",d.loop&&(0>a&&(a=d.group.length+a%d.group.length),a%=d.group.length),d.group[a]!==q))b.cancel(),b._start(a)},reposition:function(a,c){var e;b.isOpen&&(e=b._getPosition(c),a&&"scroll"===a.type?(delete e.position,b.wrap.stop(!0,
!0).animate(e,200)):b.wrap.css(e))},update:function(a){var c=a&&a.type,e=!c||"orientationchange"===c;e&&(clearTimeout(z),z=null);if(b.isOpen&&!z){if(e||m)b.wrap.removeAttr("style").addClass("fancybox-tmp"),b.trigger("onUpdate");z=setTimeout(function(){var d=b.current;if(d){b.wrap.removeClass("fancybox-tmp");c!=="scroll"&&b._setDimension();c==="scroll"&&d.canShrink||b.reposition(a);b.trigger("onUpdate");z=null}},m?500:e?20:300)}},toggle:function(a){b.isOpen&&(b.current.fitToView="boolean"===f.type(a)?
a:!b.current.fitToView,b.update())},hideLoading:function(){n.unbind("keypress.fb");f("#fancybox-loading").remove()},showLoading:function(){var a,c;b.hideLoading();n.bind("keypress.fb",function(a){if(27===(a.which||a.keyCode))a.preventDefault(),b.cancel()});a=f('<div id="fancybox-loading"><div></div></div>').click(b.cancel).appendTo("body");b.defaults.fixed||(c=b.getViewport(),a.css({position:"absolute",top:0.5*c.h+c.y,left:0.5*c.w+c.x}))},getViewport:function(){var a=b.current?b.current.locked:!1,
c={x:o.scrollLeft(),y:o.scrollTop()};a?(c.w=a[0].clientWidth,c.h=a[0].clientHeight):(c.w=m&&u.innerWidth?u.innerWidth:o.width(),c.h=m&&u.innerHeight?u.innerHeight:o.height());return c},unbindEvents:function(){b.wrap&&x(b.wrap)&&b.wrap.unbind(".fb");n.unbind(".fb");o.unbind(".fb")},bindEvents:function(){var a=b.current,c;a&&(o.bind("orientationchange.fb"+(m?"":" resize.fb")+(a.autoCenter&&!a.locked?" scroll.fb":""),b.update),(c=a.keys)&&n.bind("keydown.fb",function(e){var d=e.which||e.keyCode,j=e.target||
e.srcElement;!e.ctrlKey&&(!e.altKey&&!e.shiftKey&&!e.metaKey&&(!j||!j.type&&!f(j).is("[contenteditable]")))&&f.each(c,function(c,j){if(1<a.group.length&&j[d]!==q)return b[c](j[d]),e.preventDefault(),!1;if(-1<f.inArray(d,j))return b[c](),e.preventDefault(),!1})}),f.fn.mousewheel&&a.mouseWheel&&b.wrap.bind("mousewheel.fb",function(c,d,j,g){for(var h=f(c.target||null),i=!1;h.length&&!i&&!h.is(".fancybox-skin")&&!h.is(".fancybox-wrap");)i=h[0]&&!(h[0].style.overflow&&"hidden"===h[0].style.overflow)&&
(h[0].clientWidth&&h[0].scrollWidth>h[0].clientWidth||h[0].clientHeight&&h[0].scrollHeight>h[0].clientHeight),h=f(h).parent();if(0!==d&&!i&&1<b.group.length&&!a.canShrink){if(0<g||0<j)b.prev(0<g?"down":"left");else if(0>g||0>j)b.next(0>g?"up":"right");c.preventDefault()}}))},trigger:function(a,c){var e,d=c||b.coming||b.current;if(d){f.isFunction(d[a])&&(e=d[a].apply(d,Array.prototype.slice.call(arguments,1)));if(!1===e)return!1;"onCancel"===a&&!b.isOpened&&(b.isActive=!1);d.helpers&&f.each(d.helpers,
function(c,e){if(e&&b.helpers[c]&&f.isFunction(b.helpers[c][a]))b.helpers[c][a](e,d)});f.event.trigger(a+".fb")}},isImage:function(a){return s(a)&&a.match(/\.(jp(e|g|eg)|gif|png|bmp|webp)((\?|#).*)?$/i)},isSWF:function(a){return s(a)&&a.match(/\.(swf)((\?|#).*)?$/i)},_start:function(a){var c={},e,d,a=k(a);e=b.group[a]||null;if(!e)return!1;c=f.extend(!0,{},b.opts,e);e=c.margin;d=c.padding;"number"===f.type(e)&&(c.margin=[e,e,e,e]);"number"===f.type(d)&&(c.padding=[d,d,d,d]);c.modal&&f.extend(!0,c,
{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,mouseWheel:!1,keys:null,helpers:{overlay:{closeClick:!1}}});c.autoSize&&(c.autoWidth=c.autoHeight=!0);"auto"===c.width&&(c.autoWidth=!0);"auto"===c.height&&(c.autoHeight=!0);c.group=b.group;c.index=a;b.coming=c;if(!1===b.trigger("beforeLoad"))b.coming=null;else{d=c.type;e=c.href;if(!d)return b.coming=null,b.current&&b.router&&"jumpto"!==b.router?(b.current.index=a,b[b.router](b.direction)):!1;b.isActive=!0;if("image"===d||"swf"===d)c.autoHeight=c.autoWidth=
!1,c.scrolling="visible";"image"===d&&(c.aspectRatio=!0);"iframe"===d&&m&&(c.scrolling="scroll");c.wrap=f(c.tpl.wrap).addClass("fancybox-"+(m?"mobile":"desktop")+" fancybox-type-"+d+" fancybox-tmp "+c.wrapCSS).appendTo(c.parent);f.extend(c,{skin:f(".fancybox-skin",c.wrap),outer:f(".fancybox-outer",c.wrap),inner:f(".fancybox-inner",c.wrap)});f.each(["Top","Right","Bottom","Left"],function(a,b){c.skin.css("padding"+b,v(c.padding[a]))});b.trigger("onReady");if("inline"===d||"html"===d){if(!c.content||
!c.content.length)return b._error("content")}else if(!e)return b._error("href");"image"===d?b._loadImage():"ajax"===d?b._loadAjax():"iframe"===d?b._loadIframe():b._afterLoad()}},_error:function(a){f.extend(b.coming,{type:"html",autoWidth:!0,autoHeight:!0,minWidth:0,minHeight:0,scrolling:"no",hasError:a,content:b.coming.tpl.error});b._afterLoad()},_loadImage:function(){var a=b.imgPreload=new Image;a.onload=function(){this.onload=this.onerror=null;b.coming.width=this.width;b.coming.height=this.height;
b._afterLoad()};a.onerror=function(){this.onload=this.onerror=null;b._error("image")};a.src=b.coming.href;(a.complete===q||!a.complete)&&b.showLoading()},_loadAjax:function(){var a=b.coming;b.showLoading();b.ajaxLoad=f.ajax(f.extend({},a.ajax,{url:a.href,error:function(a,e){b.coming&&"abort"!==e?b._error("ajax",a):b.hideLoading()},success:function(c,e){"success"===e&&(a.content=c,b._afterLoad())}}))},_loadIframe:function(){var a=b.coming,c=f(a.tpl.iframe.replace(/\{rnd\}/g,(new Date).getTime())).attr("scrolling",
m?"auto":a.iframe.scrolling).attr("src",a.href);f(a.wrap).bind("onReset",function(){try{f(this).find("iframe").hide().attr("src","//about:blank").end().empty()}catch(a){}});a.iframe.preload&&(b.showLoading(),c.one("load",function(){f(this).data("ready",1);m||f(this).bind("load.fb",b.update);f(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();b._afterLoad()}));a.content=c.appendTo(a.inner);a.iframe.preload||b._afterLoad()},_preloadImages:function(){var a=b.group,c=b.current,
e=a.length,d=c.preload?Math.min(c.preload,e-1):0,f,g;for(g=1;g<=d;g+=1)f=a[(c.index+g)%e],"image"===f.type&&f.href&&((new Image).src=f.href)},_afterLoad:function(){var a=b.coming,c=b.current,e,d,j,g,h;b.hideLoading();if(a&&!1!==b.isActive)if(!1===b.trigger("afterLoad",a,c))a.wrap.stop(!0).trigger("onReset").remove(),b.coming=null;else{c&&(b.trigger("beforeChange",c),c.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove(),"fixed"===c.wrap.css("position")&&c.wrap.css(b._getPosition(!0)));
b.unbindEvents();e=a.content;d=a.type;j=a.scrolling;f.extend(b,{wrap:a.wrap,skin:a.skin,outer:a.outer,inner:a.inner,current:a,previous:c});g=a.href;switch(d){case "inline":case "ajax":case "html":a.selector?e=f("<div>").html(e).find(a.selector):x(e)&&(e.data("fancybox-placeholder")||e.data("fancybox-placeholder",f('<div class="fancybox-placeholder"></div>').insertAfter(e).hide()),e=e.show().detach(),a.wrap.bind("onReset",function(){f(this).find(e).length&&e.hide().replaceAll(e.data("fancybox-placeholder")).data("fancybox-placeholder",
false)}));break;case "image":e=a.tpl.image.replace("{href}",g);break;case "swf":e='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="'+g+'"></param>',h="",f.each(a.swf,function(a,b){e=e+('<param name="'+a+'" value="'+b+'"></param>');h=h+(" "+a+'="'+b+'"')}),e+='<embed src="'+g+'" type="application/x-shockwave-flash" width="100%" height="100%"'+h+"></embed></object>"}(!x(e)||!e.parent().is(a.inner))&&a.inner.append(e);b.trigger("beforeShow");
a.inner.css("overflow","yes"===j?"scroll":"no"===j?"hidden":j);b._setDimension();a.wrap.removeClass("fancybox-tmp");a.pos=f.extend({},a.dim,b._getPosition(!0));b.isOpen=!1;b.coming=null;b.bindEvents();if(b.isOpened){if(c.prevMethod)b.transitions[c.prevMethod]()}else f(".fancybox-wrap").not(a.wrap).stop(!0).trigger("onReset").remove();b.transitions[b.isOpened?a.nextMethod:a.openMethod]();b._preloadImages()}},_setDimension:function(){var a=b.getViewport(),c=0,e=!1,d=!1,e=b.wrap,j=b.skin,g=b.inner,h=
b.current,d=h.width,i=h.height,l=h.minWidth,t=h.minHeight,m=h.maxWidth,n=h.maxHeight,s=h.scrolling,q=h.scrollOutside?h.scrollbarWidth:0,w=h.margin,o=w[1]+w[3],p=w[0]+w[2],x,r,u,A,y,D,z,B,E;e.add(j).add(g).width("auto").height("auto");w=j.outerWidth(!0)-j.width();x=j.outerHeight(!0)-j.height();r=o+w;u=p+x;A=C(d)?(a.w-r)*k(d)/100:d;y=C(i)?(a.h-u)*k(i)/100:i;if("iframe"===h.type){if(E=h.content,h.autoHeight&&1===E.data("ready"))try{E[0].contentWindow.document.location&&(g.width(A).height(9999),D=E.contents().find("body"),
q&&D.css("overflow-x","hidden"),y=D.height())}catch(F){}}else if(h.autoWidth||h.autoHeight)g.addClass("fancybox-tmp"),h.autoWidth||g.width(A),h.autoHeight||g.height(y),h.autoWidth&&(A=g.width()),h.autoHeight&&(y=g.height()),g.removeClass("fancybox-tmp");d=k(A);i=k(y);B=A/y;l=k(C(l)?k(l,"w")-r:l);m=k(C(m)?k(m,"w")-r:m);t=k(C(t)?k(t,"h")-u:t);n=k(C(n)?k(n,"h")-u:n);D=m;z=n;o=a.w-o;p=a.h-p;if(h.aspectRatio){if(d>m&&(d=m,i=d/B),i>n&&(i=n,d=i*B),d<l&&(d=l,i=d/B),i<t)i=t,d=i*B}else d=Math.max(l,Math.min(d,
m)),i=Math.max(t,Math.min(i,n));if(h.fitToView)if(m=Math.min(a.w-r,m),n=Math.min(a.h-u,n),g.width(k(d)).height(k(i)),e.width(k(d+w)),a=e.width(),r=e.height(),h.aspectRatio)for(;(a>o||r>p)&&(d>l&&i>t)&&!(19<c++);)i=Math.max(t,Math.min(n,i-10)),d=i*B,d<l&&(d=l,i=d/B),d>m&&(d=m,i=d/B),g.width(k(d)).height(k(i)),e.width(k(d+w)),a=e.width(),r=e.height();else d=Math.max(l,Math.min(d,d-(a-o))),i=Math.max(t,Math.min(i,i-(r-p)));q&&("auto"===s&&i<y&&d+w+q<o)&&(d+=q);g.width(k(d)).height(k(i));e.width(k(d+
w));a=e.width();r=e.height();e=(a>o||r>p)&&d>l&&i>t;d=h.aspectRatio?d<D&&i<z&&d<A&&i<y:(d<D||i<z)&&(d<A||i<y);f.extend(h,{dim:{width:v(a),height:v(r)},origWidth:A,origHeight:y,canShrink:e,canExpand:d,wPadding:w,hPadding:x,wrapSpace:r-j.outerHeight(!0),skinSpace:j.height()-i});!E&&(h.autoHeight&&i>t&&i<n&&!d)&&g.height("auto")},_getPosition:function(a){var c=b.current,e=b.getViewport(),d=c.margin,f=b.wrap.width()+d[1]+d[3],g=b.wrap.height()+d[0]+d[2],d={position:"absolute",top:d[0],left:d[3]};c.autoCenter&&
c.fixed&&!a&&g<=e.h&&f<=e.w?d.position="fixed":c.locked||(d.top+=e.y,d.left+=e.x);d.top=v(Math.max(d.top,d.top+(e.h-g)*c.topRatio));d.left=v(Math.max(d.left,d.left+(e.w-f)*c.leftRatio));return d},_afterZoomIn:function(){var a=b.current;a&&((b.isOpen=b.isOpened=!0,b.wrap.addClass("fancybox-opened").css("overflow","visible"),b.reposition(),(a.closeClick||a.nextClick)&&b.inner.css("cursor","pointer").bind("click.fb",function(c){if(!f(c.target).is("a")&&!f(c.target).parent().is("a"))b[a.closeClick?"close":
"next"]()}),a.closeBtn&&f(a.tpl.closeBtn).appendTo(b.skin).bind("click.fb",b.close),a.arrows&&1<b.group.length&&((a.loop||0<a.index)&&f(a.tpl.prev).appendTo(b.outer).bind("click.fb",b.prev),(a.loop||a.index<b.group.length-1)&&f(a.tpl.next).appendTo(b.outer).bind("click.fb",b.next)),b.trigger("afterShow"),!a.loop&&a.index===a.group.length-1)?b.play(!1):b.opts.autoPlay&&!b.player.isActive&&(b.opts.autoPlay=!1,b.play()))},_afterZoomOut:function(){var a=b.current;f(".fancybox-wrap").stop(!0).trigger("onReset").remove();
f.extend(b,{group:{},opts:{},router:!1,current:null,isActive:!1,isOpened:!1,isOpen:!1,isClosing:!1,wrap:null,skin:null,outer:null,inner:null});b.trigger("afterClose",a)}});b.transitions={getOrigPosition:function(){var a=b.current,c=a.element,e=a.orig,d={},f=50,g=50,h=a.hPadding,i=a.wPadding,l=b.getViewport();!e&&(a.isDom&&c.is(":visible"))&&(e=c.find("img:first"),e.length||(e=c));x(e)?(d=e.offset(),e.is("img")&&(f=e.outerWidth(),g=e.outerHeight())):(d.top=l.y+(l.h-g)*a.topRatio,d.left=l.x+(l.w-f)*
a.leftRatio);a.locked&&(d.top-=l.y,d.left-=l.x);return d={top:v(d.top-h*a.topRatio),left:v(d.left-i*a.leftRatio),width:v(f+i),height:v(g+h)}},step:function(a,c){var e,d,f=c.prop;d=b.current;var g=d.wrapSpace,h=d.skinSpace;if("width"===f||"height"===f)e=c.end===c.start?1:(a-c.start)/(c.end-c.start),b.isClosing&&(e=1-e),d="width"===f?d.wPadding:d.hPadding,d=a-d,b.skin[f](k("width"===f?d:d-g*e)),b.inner[f](k("width"===f?d:d-g*e-h*e))},zoomIn:function(){var a=b.current,c=a.pos,e=a.openEffect,d="elastic"===
e,j=f.extend({opacity:1},c);delete j.position;d?(c=this.getOrigPosition(),a.openOpacity&&(c.opacity=0.1)):"fade"===e&&(c.opacity=0.1);b.wrap.css(c).animate(j,{duration:"none"===e?0:a.openSpeed,easing:a.openEasing,step:d?this.step:null,complete:b._afterZoomIn})},zoomOut:function(){var a=b.current,c=a.closeEffect,e="elastic"===c,d={opacity:0.1};e&&(d=this.getOrigPosition(),a.closeOpacity&&(d.opacity=0.1));b.wrap.animate(d,{duration:"none"===c?0:a.closeSpeed,easing:a.closeEasing,step:e?this.step:null,
complete:b._afterZoomOut})},changeIn:function(){var a=b.current,c=a.nextEffect,e=a.pos,d={opacity:1},f=b.direction,g;e.opacity=0.1;"elastic"===c&&(g="down"===f||"up"===f?"top":"left","down"===f||"right"===f?(e[g]=v(k(e[g])-200),d[g]="+=200px"):(e[g]=v(k(e[g])+200),d[g]="-=200px"));"none"===c?b._afterZoomIn():b.wrap.css(e).animate(d,{duration:a.nextSpeed,easing:a.nextEasing,complete:b._afterZoomIn})},changeOut:function(){var a=b.previous,c=a.prevEffect,e={opacity:0.1},d=b.direction;"elastic"===c&&
(e["down"===d||"up"===d?"top":"left"]=("up"===d||"left"===d?"-":"+")+"=200px");a.wrap.animate(e,{duration:"none"===c?0:a.prevSpeed,easing:a.prevEasing,complete:function(){f(this).trigger("onReset").remove()}})}};b.helpers.overlay={overlay:null,update:function(){var a="100%",b;this.overlay.width(a).height("100%");f.browser.msie?(b=Math.max(p.documentElement.offsetWidth,p.body.offsetWidth),n.width()>b&&(a=n.width())):n.width()>o.width()&&(a=n.width());this.overlay.width(a).height(n.height())},onReady:function(a,
b){f(".fancybox-overlay").stop(!0,!0);this.overlay||f.extend(this,{overlay:f('<div class="fancybox-overlay"></div>').appendTo(b.parent),margin:n.height()>o.height()||"scroll"===f("body").css("overflow-y")?f("body").css("margin-right"):!1,el:p.all&&!p.querySelector?f("html"):f("body")});b.fixed&&!m&&(this.overlay.addClass("fancybox-overlay-fixed"),b.autoCenter&&(this.overlay.append(b.wrap),b.locked=this.overlay));!0===a.showEarly&&this.beforeShow.apply(this,arguments)},beforeShow:function(a,c){var e=
this.overlay.unbind(".fb").width("auto").height("auto").css(a.css);a.closeClick&&e.bind("click.fb",function(a){f(a.target).hasClass("fancybox-overlay")&&b.close()});c.fixed&&!m?c.locked&&(this.el.addClass("fancybox-lock"),!1!==this.margin&&f("body").css("margin-right",k(this.margin)+c.scrollbarWidth)):this.update();e.show()},onUpdate:function(a,b){(!b.fixed||m)&&this.update()},afterClose:function(a){var c=this,a=a.speedOut||0;c.overlay&&!b.isActive&&c.overlay.fadeOut(a||0,function(){f("body").css("margin-right",
c.margin);c.el.removeClass("fancybox-lock");c.overlay.remove();c.overlay=null})}};b.helpers.title={beforeShow:function(a){var c=b.current.title,e=a.type;if(s(c)&&""!==f.trim(c)){c=f('<div class="fancybox-title fancybox-title-'+e+'-wrap">'+c+"</div>");switch(e){case "inside":e=b.skin;break;case "outside":e=b.wrap;break;case "over":e=b.inner;break;default:e=b.skin,c.appendTo("body").width(c.width()).wrapInner('<span class="child"></span>'),b.current.margin[2]+=Math.abs(k(c.css("margin-bottom")))}"top"===
a.position?c.prependTo(e):c.appendTo(e)}}};f.fn.fancybox=function(a){var c,e=f(this),d=this.selector||"",j=function(g){var h=f(this).blur(),i=c,j,k;!g.ctrlKey&&(!g.altKey&&!g.shiftKey&&!g.metaKey)&&!h.is(".fancybox-wrap")&&(j=a.groupAttr||"data-fancybox-group",k=h.attr(j),k||(j="rel",k=h.get(0)[j]),k&&(""!==k&&"nofollow"!==k)&&(h=d.length?f(d):e,h=h.filter("["+j+'="'+k+'"]'),i=h.index(this)),a.index=i,!1!==b.open(h,a)&&g.preventDefault())},a=a||{};c=a.index||0;!d||!1===a.live?e.unbind("click.fb-start").bind("click.fb-start",
j):n.undelegate(d,"click.fb-start").delegate(d+":not('.fancybox-item, .fancybox-nav')","click.fb-start",j);return this};n.ready(function(){f.scrollbarWidth===q&&(f.scrollbarWidth=function(){var a=f('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),b=a.children(),b=b.innerWidth()-b.height(99).innerWidth();a.remove();return b});if(f.support.fixedPosition===q){var a=f.support,c=f('<div style="position:fixed;top:20px;"></div>').appendTo("body"),e=20===c[0].offsetTop||
15===c[0].offsetTop;c.remove();a.fixedPosition=e}f.extend(b.defaults,{scrollbarWidth:f.scrollbarWidth(),fixed:f.support.fixedPosition,parent:f("body")})})})(window,document,jQuery);


/*
 * jQuery FlexSlider v2.0
 * http://www.woothemes.com/flexslider/
 *
 * Copyright 2012 WooThemes
 * Free to use under the GPLv2 license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Contributing author: Tyler Smith (@mbmufffin)
 */

;(function ($) {

  //FlexSlider: Object Instance
  $.flexslider = function(el, options) {
    var slider = $(el),
        vars = $.extend({}, $.flexslider.defaults, options),
        namespace = vars.namespace,
        touch = ("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch,
        eventType = (touch) ? "touchend" : "click",
        vertical = vars.direction === "vertical",
        reverse = vars.reverse,
        carousel = (vars.itemWidth > 0),
        fade = vars.animation === "fade",
        asNav = vars.asNavFor !== "",
        methods = {};
    
    // Store a reference to the slider object
    $.data(el, "flexslider", slider);
    
    // Privat slider methods
    methods = {
      init: function() {
        slider.animating = false;
        slider.currentSlide = vars.startAt;
        slider.animatingTo = slider.currentSlide;
        slider.atEnd = (slider.currentSlide === 0 || slider.currentSlide === slider.last);
        slider.containerSelector = vars.selector.substr(0,vars.selector.search(' '));
        slider.slides = $(vars.selector, slider);
        slider.container = $(slider.containerSelector, slider);
        slider.count = slider.slides.length;
        // SYNC:
        slider.syncExists = $(vars.sync).length > 0;
        // SLIDE:
        if (vars.animation === "slide") vars.animation = "swing";
        slider.prop = (vertical) ? "top" : "marginLeft";
        slider.args = {};
        // SLIDESHOW:
        slider.manualPause = false;
        // TOUCH/USECSS:
        slider.transitions = !vars.video && !fade && vars.useCSS && (function() {
          var obj = document.createElement('div'),
              props = ['perspectiveProperty', 'WebkitPerspective', 'MozPerspective', 'OPerspective', 'msPerspective'];
          for (var i in props) {
            if ( obj.style[ props[i] ] !== undefined ) {
              slider.pfx = props[i].replace('Perspective','').toLowerCase();
              slider.prop = "-" + slider.pfx + "-transform";
              return true;
            }
          }
          return false;
        }());
        // CONTROLSCONTAINER:
        if (vars.controlsContainer !== "") slider.controlsContainer = $(vars.controlsContainer).length > 0 && $(vars.controlsContainer);
        // MANUAL:
        if (vars.manualControls !== "") slider.manualControls = $(vars.manualControls).length > 0 && $(vars.manualControls);
        
        // RANDOMIZE:
        if (vars.randomize) {
          slider.slides.sort(function() { return (Math.round(Math.random())-0.5); });
          slider.container.empty().append(slider.slides);
        }
        
        slider.doMath();
        
        // ASNAV:
        if (asNav) methods.asNav.setup();
        
        // INIT
        slider.setup("init");
        
        // CONTROLNAV:
        if (vars.controlNav) methods.controlNav.setup();
        
        // DIRECTIONNAV:
        if (vars.directionNav) methods.directionNav.setup();
        
        // KEYBOARD:
        if (vars.keyboard && ($(slider.containerSelector).length === 1 || vars.multipleKeyboard)) {
          $(document).bind('keyup', function(event) {
            var keycode = event.keyCode;
            if (!slider.animating && (keycode === 39 || keycode === 37)) {
              var target = (keycode === 39) ? slider.getTarget('next') :
                           (keycode === 37) ? slider.getTarget('prev') : false;
              slider.flexAnimate(target, vars.pauseOnAction);
            }
          });
        }
        // MOUSEWHEEL:
        if (vars.mousewheel) {
          slider.bind('mousewheel', function(event, delta, deltaX, deltaY) {
            event.preventDefault();
            var target = (delta < 0) ? slider.getTarget('next') : slider.getTarget('prev');
            slider.flexAnimate(target, vars.pauseOnAction);
          });
        }
        
        // PAUSEPLAY
        if (vars.pausePlay) methods.pausePlay.setup();
        
        // SLIDSESHOW
        if (vars.slideshow) {
          if (vars.pauseOnHover) {
            slider.hover(function() {
              slider.pause();
            }, function() {
              if (!slider.manualPause) slider.play();
            });
          }
          // initialize animation
          (vars.initDelay > 0) ? setTimeout(slider.play, vars.initDelay) : slider.play();
        }
        
        // TOUCH
        if (touch && vars.touch) methods.touch();
        
        // FADE&&SMOOTHHEIGHT || SLIDE:
        if (!fade || (fade && vars.smoothHeight)) $(window).bind("resize focus", methods.resize);
        
        
        // API: start() Callback
        setTimeout(function(){
          vars.start(slider);
        }, 200);
      },
      asNav: {
        setup: function() {
          slider.asNav = true;
          slider.animatingTo = Math.floor(slider.currentSlide/slider.move);
          slider.currentItem = slider.currentSlide;
          slider.slides.removeClass(namespace + "active-slide").eq(slider.currentItem).addClass(namespace + "active-slide");
          slider.slides.click(function(e){
            e.preventDefault();
            var $slide = $(this),
                target = $slide.index();
            if (!$(vars.asNavFor).data('flexslider').animating && !$slide.hasClass('active')) {
              slider.direction = (slider.currentItem < target) ? "next" : "prev";
              slider.flexAnimate(target, vars.pauseOnAction, false, true, true);
            }
          });
        }
      },
      controlNav: {
        setup: function() {
          if (!slider.manualControls) {
            methods.controlNav.setupPaging();
          } else { // MANUALCONTROLS:
            methods.controlNav.setupManual();
          }
        },
        setupPaging: function() {
          var type = (vars.controlNav === "thumbnails") ? 'control-thumbs' : 'control-paging',
              j = 1,
              item;
          
          slider.controlNavScaffold = $('<ol class="'+ namespace + 'control-nav ' + namespace + type + '"></ol>');
          
          if (slider.pagingCount > 1) {
            for (var i = 0; i < slider.pagingCount; i++) {
              item = (vars.controlNav === "thumbnails") ? '<img src="' + slider.slides.eq(i).attr("data-thumb") + '"/>' : '<a>' + j + '</a>';
              slider.controlNavScaffold.append('<li>' + item + '</li>');
              j++;
            }
          }
          
          // CONTROLSCONTAINER:
          (slider.controlsContainer) ? $(slider.controlsContainer).append(slider.controlNavScaffold) : slider.append(slider.controlNavScaffold);
          methods.controlNav.set();
          
          methods.controlNav.active();
        
          slider.controlNavScaffold.delegate('a, img', eventType, function(event) {
            event.preventDefault();
            var $this = $(this),
                target = slider.controlNav.index($this);

            if (!$this.hasClass(namespace + 'active')) {
              slider.direction = (target > slider.currentSlide) ? "next" : "prev";
              slider.flexAnimate(target, vars.pauseOnAction);
            }
          });
          // Prevent iOS click event bug
          if (touch) {
            slider.controlNavScaffold.delegate('a', "click touchstart", function(event) {
              event.preventDefault();
            });
          }
        },
        setupManual: function() {
          slider.controlNav = slider.manualControls;
          methods.controlNav.active();
          
          slider.controlNav.live(eventType, function(event) {
            event.preventDefault();
            var $this = $(this),
                target = slider.controlNav.index($this);
                
            if (!$this.hasClass(namespace + 'active')) {
              (target > slider.currentSlide) ? slider.direction = "next" : slider.direction = "prev";
              slider.flexAnimate(target, vars.pauseOnAction);
            }
          });
          // Prevent iOS click event bug
          if (touch) {
            slider.controlNav.live("click touchstart", function(event) {
              event.preventDefault();
            });
          }
        },
        set: function() {
          var selector = (vars.controlNav === "thumbnails") ? 'img' : 'a';
          slider.controlNav = $('.' + namespace + 'control-nav li ' + selector, (slider.controlsContainer) ? slider.controlsContainer : slider);
        },
        active: function() {
          slider.controlNav.removeClass(namespace + "active").eq(slider.animatingTo).addClass(namespace + "active");
        },
        update: function(action, pos) {
          if (slider.pagingCount > 1 && action === "add") {
            slider.controlNavScaffold.append($('<li><a>' + slider.count + '</a></li>'));
          } else if (slider.pagingCount === 1) {
            slider.controlNavScaffold.find('li').remove();
          } else {
            slider.controlNav.eq(pos).closest('li').remove();
          }
          methods.controlNav.set();
          (slider.pagingCount > 1 && slider.pagingCount !== slider.controlNav.length) ? slider.update(pos, action) : methods.controlNav.active();
        }
      },
      directionNav: {
        setup: function() {
          var directionNavScaffold = $('<ul class="' + namespace + 'direction-nav"><li><a class="' + namespace + 'prev" href="#">' + vars.prevText + '</a></li><li><a class="' + namespace + 'next" href="#">' + vars.nextText + '</a></li></ul>');
        
          // CONTROLSCONTAINER:
          if (slider.controlsContainer) {
            $(slider.controlsContainer).append(directionNavScaffold);
            slider.directionNav = $('.' + namespace + 'direction-nav li a', slider.controlsContainer);
          } else {
            slider.append(directionNavScaffold);
            slider.directionNav = $('.' + namespace + 'direction-nav li a', slider);
          }
        
          methods.directionNav.update();
        
          slider.directionNav.bind(eventType, function(event) {
            event.preventDefault();
            var target = ($(this).hasClass(namespace + 'next')) ? slider.getTarget('next') : slider.getTarget('prev');
            slider.flexAnimate(target, vars.pauseOnAction);
          });
          // Prevent iOS click event bug
          if (touch) {
            slider.directionNav.bind("click touchstart", function(event) {
              event.preventDefault();
            });
          }
        },
        update: function() {
          var disabledClass = namespace + 'disabled';
          if (!vars.animationLoop) {
            if (slider.pagingCount === 1) {
             slider.directionNav.addClass(disabledClass);
            } else if (slider.animatingTo === 0) {
              slider.directionNav.removeClass(disabledClass).filter('.' + namespace + "prev").addClass(disabledClass);
            } else if (slider.animatingTo === slider.last) {
              slider.directionNav.removeClass(disabledClass).filter('.' + namespace + "next").addClass(disabledClass);
            } else {
              slider.directionNav.removeClass(disabledClass);
            }
          }
        }
      },
      pausePlay: {
        setup: function() {
          var pausePlayScaffold = $('<div class="' + namespace + 'pauseplay"><a></a></div>');
        
          // CONTROLSCONTAINER:
          if (slider.controlsContainer) {
            slider.controlsContainer.append(pausePlayScaffold);
            slider.pausePlay = $('.' + namespace + 'pauseplay a', slider.controlsContainer);
          } else {
            slider.append(pausePlayScaffold);
            slider.pausePlay = $('.' + namespace + 'pauseplay a', slider);
          }
        
          // slider.pausePlay.addClass(pausePlayState).text((pausePlayState == 'pause') ? vars.pauseText : vars.playText);
          methods.pausePlay.update((vars.slideshow) ? namespace + 'pause' : namespace + 'play');
        
          slider.pausePlay.bind(eventType, function(event) {
            event.preventDefault();
            if ($(this).hasClass(namespace + 'pause')) {
              slider.pause();
              slider.manualPause = true;
            } else {
              slider.play();
              slider.manualPause = false;
            }
          });
          // Prevent iOS click event bug
          if (touch) {
            slider.pausePlay.bind("click touchstart", function(event) {
              event.preventDefault();
            });
          }
        },
        update: function(state) {
          (state === "play") ? slider.pausePlay.removeClass(namespace + 'pause').addClass(namespace + 'play').text(vars.playText) : slider.pausePlay.removeClass(namespace + 'play').addClass(namespace + 'pause').text(vars.pauseText);
        }
      },
      touch: function() {
        var startX,
          startY,
          offset,
          cwidth,
          dx,
          startT,
          scrolling = false;
              
        el.addEventListener('touchstart', onTouchStart, false);
        function onTouchStart(e) {
          if (slider.animating) {
            e.preventDefault();
          } else if (e.touches.length === 1) {
            slider.pause();
            // CAROUSEL: 
            cwidth = (vertical) ? slider.h : slider. w;
            startT = Number(new Date());
            // CAROUSEL:
            offset = (carousel && reverse && slider.animatingTo === slider.last) ? 0 :
                     (carousel && reverse) ? slider.limit - (((slider.itemW + vars.itemMargin) * slider.move) * slider.animatingTo) :
                     (carousel && slider.currentSlide === slider.last) ? slider.limit :
                     (carousel) ? ((slider.itemW + vars.itemMargin) * slider.move) * slider.currentSlide : 
                     (reverse) ? (slider.last - slider.currentSlide + slider.cloneOffset) * cwidth : (slider.currentSlide + slider.cloneOffset) * cwidth;
            startX = (vertical) ? e.touches[0].pageY : e.touches[0].pageX;
            startY = (vertical) ? e.touches[0].pageX : e.touches[0].pageY;

            el.addEventListener('touchmove', onTouchMove, false);
            el.addEventListener('touchend', onTouchEnd, false);
          }
        }

        function onTouchMove(e) {
          dx = (vertical) ? startX - e.touches[0].pageY : startX - e.touches[0].pageX;
          scrolling = (vertical) ? (Math.abs(dx) < Math.abs(e.touches[0].pageX - startY)) : (Math.abs(dx) < Math.abs(e.touches[0].pageY - startY));
          
          if (!scrolling || Number(new Date()) - startT > 500) {
            e.preventDefault();
            if (!fade && slider.transitions) {
              if (!vars.animationLoop) {
                dx = dx/((slider.currentSlide === 0 && dx < 0 || slider.currentSlide === slider.last && dx > 0) ? (Math.abs(dx)/cwidth+2) : 1);
              }
              slider.setProps(offset + dx, "setTouch");
            }
          }
        }
        
        function onTouchEnd(e) {
          if (slider.animatingTo === slider.currentSlide && !scrolling && !(dx === null)) {
            var updateDx = (reverse) ? -dx : dx,
                target = (updateDx > 0) ? slider.getTarget('next') : slider.getTarget('prev');
            
            if (slider.canAdvance(target) && (Number(new Date()) - startT < 550 && Math.abs(updateDx) > 20 || Math.abs(updateDx) > cwidth/2)) {
              slider.flexAnimate(target, vars.pauseOnAction);
            } else {
              slider.flexAnimate(slider.currentSlide, vars.pauseOnAction, true);
            }
          }
          // finish the touch by undoing the touch session
          el.removeEventListener('touchmove', onTouchMove, false);
          el.removeEventListener('touchend', onTouchEnd, false);
          startX = null;
          startY = null;
          dx = null;
          offset = null;
        }
      },
      resize: function() {
        if (!slider.animating && slider.is(':visible')) {
          if (!carousel) slider.doMath();
          
          if (fade) {
            // SMOOTH HEIGHT:
            methods.smoothHeight();
          } else if (carousel) { //CAROUSEL:
            slider.slides.width(slider.computedW);
            slider.update(slider.pagingCount);
            slider.setProps();
          }
          else if (vertical) { //VERTICAL:
            slider.viewport.height(slider.h);
            slider.setProps(slider.h, "setTotal");
          } else {
            // SMOOTH HEIGHT:
            if (vars.smoothHeight) methods.smoothHeight();
            slider.newSlides.width(slider.computedW);
            slider.setProps(slider.computedW, "setTotal");
          }
        }
      },
      smoothHeight: function(dur) {
        if (!vertical || fade) {
          var $obj = (fade) ? slider : slider.viewport;
          (dur) ? $obj.animate({"height": slider.slides.eq(slider.animatingTo).height()}, dur) : $obj.height(slider.slides.eq(slider.animatingTo).height());
        }
      },
      sync: function(action) {
        var $obj = $(vars.sync).data("flexslider"),
            target = slider.animatingTo;
        
        switch (action) {
          case "animate": $obj.flexAnimate(target, vars.pauseOnAction, false, true); break;
          case "play": if (!$obj.playing && !$obj.asNav) { $obj.play(); } break;
          case "pause": $obj.pause(); break;
        }
      }
    }
    
    // public methods
    slider.flexAnimate = function(target, pause, override, withSync, fromNav) {
      if (!slider.animating && (slider.canAdvance(target) || override) && slider.is(":visible")) {
        if (asNav && withSync) {
          var master = $(vars.asNavFor).data('flexslider');
          slider.atEnd = target === 0 || target === slider.count - 1;
          master.flexAnimate(target, true, false, true, fromNav);
          slider.direction = (slider.currentItem < target) ? "next" : "prev";
          master.direction = slider.direction;
          
          if (Math.ceil((target + 1)/slider.visible) - 1 !== slider.currentSlide && target !== 0) {
            slider.currentItem = target;
            slider.slides.removeClass(namespace + "active-slide").eq(target).addClass(namespace + "active-slide");
            target = Math.floor(target/slider.visible);
          } else {
            slider.currentItem = target;
            slider.slides.removeClass(namespace + "active-slide").eq(target).addClass(namespace + "active-slide");
            return false;
          }
        }
        
        slider.animating = true;
        slider.animatingTo = target;
        // API: before() animation Callback
        vars.before(slider);
        
        // SLIDESHOW:
        if (pause) slider.pause();
        
        // SYNC:
        if (slider.syncExists && !fromNav) methods.sync("animate");
        
        // CONTROLNAV
        if (vars.controlNav) methods.controlNav.active();
        
        // !CAROUSEL:
        // CANDIDATE: slide active class (for add/remove slide)
        if (!carousel) slider.slides.removeClass(namespace + 'active-slide').eq(target).addClass(namespace + 'active-slide');
        
        // INFINITE LOOP:
        // CANDIDATE: atEnd
        slider.atEnd = target === 0 || target === slider.last;
        
        // DIRECTIONNAV:
        if (vars.directionNav) methods.directionNav.update();
        
        if (target === slider.last) {
          // API: end() of cycle Callback
          vars.end(slider);
          // SLIDESHOW && !INFINITE LOOP:
          if (!vars.animationLoop) slider.pause();
        }
        
        // SLIDE:
        if (!fade) {
          var dimension = (vertical) ? slider.slides.filter(':first').height() : slider.computedW,
              margin, slideString, calcNext;
          
          // INFINITE LOOP / REVERSE:
          if (carousel) {
            margin = (vars.itemWidth > slider.w) ? vars.itemMargin * 2 : vars.itemMargin;
            calcNext = ((slider.itemW + margin) * slider.move) * slider.animatingTo;
            slideString = (calcNext > slider.limit && slider.visible !== 1) ? slider.limit : calcNext;
          } else if (slider.currentSlide === 0 && target === slider.count - 1 && vars.animationLoop && slider.direction !== "next") {
            slideString = (reverse) ? (slider.count + slider.cloneOffset) * dimension : 0;
          } else if (slider.currentSlide === slider.last && target === 0 && vars.animationLoop && slider.direction !== "prev") {
            slideString = (reverse) ? 0 : (slider.count + 1) * dimension;
          } else {
            slideString = (reverse) ? ((slider.count - 1) - target + slider.cloneOffset) * dimension : (target + slider.cloneOffset) * dimension;
          }
          slider.setProps(slideString, "", vars.animationSpeed);
          if (slider.transitions) {
            if (!vars.animationLoop || !slider.atEnd) {
              slider.animating = false;
              slider.currentSlide = slider.animatingTo;
            }
            slider.container.unbind("webkitTransitionEnd transitionend");
            slider.container.bind("webkitTransitionEnd transitionend", function() {
              slider.wrapup(dimension);
            });
          } else {
            slider.container.animate(slider.args, vars.animationSpeed, vars.easing, function(){
              slider.wrapup(dimension);
            });
          }
        } else { // FADE:
          slider.slides.eq(slider.currentSlide).fadeOut(vars.animationSpeed, vars.easing);
          slider.slides.eq(target).fadeIn(vars.animationSpeed, vars.easing, slider.wrapup);
        }
        // SMOOTH HEIGHT:
        if (vars.smoothHeight) methods.smoothHeight(vars.animationSpeed);
      }
    } 
    slider.wrapup = function(dimension) {
      // SLIDE:
      if (!fade && !carousel) {
        if (slider.currentSlide === 0 && slider.animatingTo === slider.last && vars.animationLoop) {
          slider.setProps(dimension, "jumpEnd");
        } else if (slider.currentSlide === slider.last && slider.animatingTo === 0 && vars.animationLoop) {
          slider.setProps(dimension, "jumpStart");
        }
      }
      slider.animating = false;
      slider.currentSlide = slider.animatingTo;
      // API: after() animation Callback
      vars.after(slider);
    }
    
    // SLIDESHOW:
    slider.animateSlides = function() {
      if (!slider.animating) slider.flexAnimate(slider.getTarget("next"));
    }
    // SLIDESHOW:
    slider.pause = function() {
      clearInterval(slider.animatedSlides);
      slider.playing = false;
      // PAUSEPLAY:
      if (vars.pausePlay) methods.pausePlay.update("play");
      // SYNC:
      if (slider.syncExists) methods.sync("pause");
    }
    // SLIDESHOW:
    slider.play = function() {
      slider.animatedSlides = setInterval(slider.animateSlides, vars.slideshowSpeed);
      slider.playing = true;
      // PAUSEPLAY:
      if (vars.pausePlay) methods.pausePlay.update("pause");
      // SYNC:
      if (slider.syncExists) methods.sync("play");
    }
    slider.canAdvance = function(target) {
      // ASNAV:
      var last = (asNav) ? slider.pagingCount - 1 : slider.last;
      return (asNav && slider.currentItem === 0 && target === slider.pagingCount - 1 && slider.direction !== "next") ? false :
             (target === slider.currentSlide && !asNav) ? false :
             (vars.animationLoop) ? true :
             (slider.atEnd && slider.currentSlide === 0 && target === last && slider.direction !== "next") ? false :
             (slider.atEnd && slider.currentSlide === last && target === 0 && slider.direction === "next") ? false :
             true;
    }
    slider.getTarget = function(dir) {
      slider.direction = dir; 
      if (dir === "next") {
        return (slider.currentSlide === slider.last) ? 0 : slider.currentSlide + 1;
      } else {
        return (slider.currentSlide === 0) ? slider.last : slider.currentSlide - 1;
      }
    }
    
    // SLIDE:
    slider.setProps = function(pos, special, dur) {
      var target = (function() {
        var posCheck = (pos) ? pos : ((slider.itemW + vars.itemMargin) * slider.move) * slider.animatingTo,
            posCalc = (function() {
              if (carousel) {
                return (special === "setTouch") ? pos :
                       (reverse && slider.animatingTo === slider.last) ? 0 :
                       (reverse) ? slider.limit - (((slider.itemW + vars.itemMargin) * slider.move) * slider.animatingTo) :
                       (slider.animatingTo === slider.last) ? slider.limit : posCheck;
              } else {
                switch (special) {
                  case "setTotal": return (reverse) ? ((slider.count - 1) - slider.currentSlide + slider.cloneOffset) * pos : (slider.currentSlide + slider.cloneOffset) * pos;
                  case "setTouch": return (reverse) ? pos : pos;
                  case "jumpEnd": return (reverse) ? pos : slider.count * pos;
                  case "jumpStart": return (reverse) ? slider.count * pos : pos;
                  default: return pos;
                }
              }
            }());
            return (posCalc * -1) + "px";
          }());

      if (slider.transitions) {
        target = (vertical) ? "translate3d(0," + target + ",0)" : "translate3d(" + target + ",0,0)";
        dur = (dur !== undefined) ? (dur/1000) + "s" : "0s";
        slider.container.css("-" + slider.pfx + "-transition-duration", dur);
      }
      
      slider.args[slider.prop] = target;
      if (slider.transitions || dur === undefined) slider.container.css(slider.args);
    }
    
    slider.setup = function(type) {
      // SLIDE:
      if (!fade) {
        var sliderOffset, arr;
            
        if (type === "init") {
          slider.viewport = $('<div class="flex-viewport"></div>').css({"overflow": "hidden", "position": "relative"}).appendTo(slider).append(slider.container);
          // INFINITE LOOP:
          slider.cloneCount = 0;
          slider.cloneOffset = 0;
          // REVERSE:
          if (reverse) {
            arr = $.makeArray(slider.slides).reverse();
            slider.slides = $(arr);
            slider.container.empty().append(slider.slides);
          }
        }
        // INFINITE LOOP && !CAROUSEL:
        if (vars.animationLoop && !carousel) {
          slider.cloneCount = 2;
          slider.cloneOffset = 1;
          // clear out old clones
          if (type !== "init") slider.container.find('.clone').remove();
          slider.container.append(slider.slides.first().clone().addClass('clone')).prepend(slider.slides.last().clone().addClass('clone'));
        }
        slider.newSlides = $(vars.selector, slider);
        
        sliderOffset = (reverse) ? slider.count - 1 - slider.currentSlide + slider.cloneOffset : slider.currentSlide + slider.cloneOffset;
        // VERTICAL:
        if (vertical && !carousel) {
          slider.container.height((slider.count + slider.cloneCount) * 200 + "%").css("position", "absolute").width("100%");
          setTimeout(function(){
            slider.newSlides.css({"display": "block"});
            slider.doMath();
            slider.viewport.height(slider.h);
            slider.setProps(sliderOffset * slider.h, "init");
          }, (type === "init") ? 100 : 0);
        } else {
          slider.container.width((slider.count + slider.cloneCount) * 200 + "%");
          slider.setProps(sliderOffset * slider.computedW, "init");
          setTimeout(function(){
            slider.doMath();
            slider.newSlides.css({"width": slider.computedW, "float": "left", "display": "block"});
            // SMOOTH HEIGHT:
            if (vars.smoothHeight) methods.smoothHeight();
          }, (type === "init") ? 100 : 0);
        }
      } else { // FADE: 
        slider.slides.css({"width": "100%", "float": "left", "marginRight": "-100%", "position": "relative"});
        if (type === "init") slider.slides.eq(slider.currentSlide).fadeIn(vars.animationSpeed, vars.easing);
        // SMOOTH HEIGHT:
        if (vars.smoothHeight) methods.smoothHeight();
      }
      // !CAROUSEL:
      // CANDIDATE: active slide
      if (!carousel) slider.slides.removeClass(namespace + "active-slide").eq(slider.currentSlide).addClass(namespace + "active-slide");
    }
    
    slider.doMath = function() {
      var slide = slider.slides.first(),
          slideMargin = vars.itemMargin,
          minItems = vars.minItems,
          maxItems = vars.maxItems;
      
      slider.w = slider.width();
      slider.h = slide.height();
      slider.boxPadding = slide.outerWidth() - slide.width();

      // CAROUSEL:
      if (carousel) {
        slider.itemT = vars.itemWidth + slideMargin;
        slider.minW = (minItems) ? minItems * slider.itemT : slider.w;
        slider.maxW = (maxItems) ? maxItems * slider.itemT : slider.w;
        slider.itemW = (slider.minW > slider.w) ? (slider.w - (slideMargin * minItems))/minItems :
                       (slider.maxW < slider.w) ? (slider.w - (slideMargin * maxItems))/maxItems :
                       (vars.itemWidth > slider.w) ? slider.w : vars.itemWidth;
        slider.visible = Math.floor(slider.w/(slider.itemW + slideMargin));
        slider.move = (vars.move > 0 && vars.move < slider.visible ) ? vars.move : slider.visible;
        slider.pagingCount = Math.ceil(((slider.count - slider.visible)/slider.move) + 1);
        slider.last =  slider.pagingCount - 1;
        slider.limit = (slider.pagingCount === 1) ? 0 :
                       (vars.itemWidth > slider.w) ? ((slider.itemW + (slideMargin * 2)) * slider.count) - slider.w - slideMargin : ((slider.itemW + slideMargin) * slider.count) - slider.w;
      } else {
        slider.itemW = slider.w;
        slider.pagingCount = slider.count;
        slider.last = slider.count - 1;
      }
      slider.computedW = slider.itemW - slider.boxPadding;
    }
    
    slider.update = function(pos, action) {
      slider.doMath();
      
      // update currentSlide and slider.animatingTo if necessary
      if (!carousel) {
        if (pos < slider.currentSlide) {
          slider.currentSlide += 1;
        } else if (pos <= slider.currentSlide && pos !== 0) {
          slider.currentSlide -= 1;
        }
        slider.animatingTo = slider.currentSlide;
      }
      
      // update controlNav
      if (vars.controlNav && !slider.manualControls) {
        if ((action === "add" && !carousel) || slider.pagingCount > slider.controlNav.length) {
          methods.controlNav.update("add");
        } else if ((action === "remove" && !carousel) || slider.pagingCount < slider.controlNav.length) {
          if (carousel && slider.currentSlide > slider.last) {
            slider.currentSlide -= 1;
            slider.animatingTo -= 1;
          }
          methods.controlNav.update("remove", slider.last);
        }
      }
      // update directionNav
      if (vars.directionNav) methods.directionNav.update();
      
    }
    
    slider.addSlide = function(obj, pos) {
      var $obj = $(obj);
      
      slider.count += 1;
      slider.last = slider.count - 1;
      
      // append new slide
      if (vertical && reverse) {
        (pos !== undefined) ? slider.slides.eq(slider.count - pos).after($obj) : slider.container.prepend($obj);
      } else {
        (pos !== undefined) ? slider.slides.eq(pos).before($obj) : slider.container.append($obj);
      }
      
      // update currentSlide, animatingTo, controlNav, and directionNav
      slider.update(pos, "add");
      
      // update slider.slides
      slider.slides = $(vars.selector + ':not(.clone)', slider);
      // re-setup the slider to accomdate new slide
      slider.setup();
      
      //FlexSlider: added() Callback
      vars.added(slider);
    }
    slider.removeSlide = function(obj) {
      var pos = (isNaN(obj)) ? slider.slides.index($(obj)) : obj;
      
      // update count
      slider.count -= 1;
      slider.last = slider.count - 1;
      
      // remove slide
      if (isNaN(obj)) {
        $(obj, slider.slides).remove();
      } else {
        (vertical && reverse) ? slider.slides.eq(slider.last).remove() : slider.slides.eq(obj).remove();
      }
      
      // update currentSlide, animatingTo, controlNav, and directionNav
      slider.doMath();
      slider.update(pos, "remove");
      
      // update slider.slides
      slider.slides = $(vars.selector + ':not(.clone)', slider);
      // re-setup the slider to accomdate new slide
      slider.setup();
      
      // FlexSlider: removed() Callback
      vars.removed(slider);
    }
    
    //FlexSlider: Initialize
    methods.init();
  }
  
  //FlexSlider: Default Settings
  $.flexslider.defaults = {
    namespace: "flex-",             //{NEW} String: Prefix string attached to the class of every element generated by the plugin
    selector: ".slides > li",       //{NEW} Selector: Must match a simple pattern. '{container} > {slide}' -- Ignore pattern at your own peril
    animation: "fade",              //String: Select your animation type, "fade" or "slide"
    easing: "swing",               //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
    direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
    reverse: false,                 //{NEW} Boolean: Reverse the animation direction
    animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
    smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode  
    startAt: 0,                     //Integer: The slide that the slider should start on. Array notation (0 = first slide)
    slideshow: true,                //Boolean: Animate slider automatically
    slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
    animationSpeed: 600,            //Integer: Set the speed of animations, in milliseconds
    initDelay: 0,                   //{NEW} Integer: Set an initialization delay, in milliseconds
    randomize: false,               //Boolean: Randomize slide order
    
    // Usability features
    pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
    pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
    useCSS: true,                   //{NEW} Boolean: Slider will use CSS3 transitions if available
    touch: true,                    //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
    video: false,                   //{NEW} Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches
    
    // Primary Controls
    controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
    directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
    prevText: "Previous",           //String: Set the text for the "previous" directionNav item
    nextText: "Next",               //String: Set the text for the "next" directionNav item
    
    // Secondary Navigation
    keyboard: true,                 //Boolean: Allow slider navigating via keyboard left/right keys
    multipleKeyboard: false,        //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
    mousewheel: false,              //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
    pausePlay: false,               //Boolean: Create pause/play dynamic element
    pauseText: "Pause",             //String: Set the text for the "pause" pausePlay item
    playText: "Play",               //String: Set the text for the "play" pausePlay item
    
    // Special properties
    controlsContainer: "",          //{UPDATED} jQuery Object/Selector: Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be $(".flexslider-container"). Property is ignored if given element is not found.
    manualControls: "",             //{UPDATED} jQuery Object/Selector: Declare custom control navigation. Examples would be $(".flex-control-nav li") or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
    sync: "",                       //{NEW} Selector: Mirror the actions performed on this slider with another slider. Use with care.
    asNavFor: "",                   //{NEW} Selector: Internal property exposed for turning the slider into a thumbnail navigation for another slider
    
    // Carousel Options
    itemWidth: 0,                   //{NEW} Integer: Box-model width of individual carousel items, including horizontal borders and padding.
    itemMargin: 0,                  //{NEW} Integer: Margin between carousel items.
    minItems: 0,                    //{NEW} Integer: Minimum number of carousel items that should be visible. Items will resize fluidly when below this.
    maxItems: 0,                    //{NEW} Integer: Maxmimum number of carousel items that should be visible. Items will resize fluidly when above this limit.
    move: 0,                        //{NEW} Integer: Number of carousel items that should move on animation. If 0, slider will move all visible items.
                                    
    // Callback API
    start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
    before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
    after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
    end: function(){},              //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
    added: function(){},            //{NEW} Callback: function(slider) - Fires after a slide is added
    removed: function(){}           //{NEW} Callback: function(slider) - Fires after a slide is removed
  }


  //FlexSlider: Plugin Function
  $.fn.flexslider = function(options) {
    options = options || {};
    if (typeof options === "object") {
      return this.each(function() {
        var $this = $(this),
            selector = (options.selector) ? options.selector : ".slides > li",
            $slides = $this.find(selector);

        if ($slides.length === 1) {
          $slides.fadeIn(400);
          if (options.start) options.start($this);
        } else if ($this.data('flexslider') === undefined) {
          new $.flexslider(this, options);
        }
      });
    } else {
      // Helper strings to quickly perform functions on the slider
      var $slider = $(this).data('flexslider');
      switch (options) {
        case "play": $slider.play(); break;
        case "pause": $slider.pause(); break;
        case "next": $slider.flexAnimate($slider.getTarget("next"), true); break;
        case "prev":
        case "previous": $slider.flexAnimate($slider.getTarget("prev"), true); break;
        default: if (typeof options === "number") $slider.flexAnimate(options, true);
      }
    }
  }  

})(jQuery);

/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:false, latedef:true, newcap:true, noarg:true, noempty:true, nonew:true, undef:true, strict:false, trailing:true, 
  browser:true, jquery:true */
/*!
 * jQuery flexslider extension
 * Original author: @markirby
 * Licensed under the MIT license
 */

;(function ( $, window, document, undefined ) {
  
  var flexsliderManualDirectionControls = 'flexsliderManualDirectionControls',
      defaults = {
        previousElementSelector: ".previous",
        nextElementSelector: ".next",
        disabledStateClassName: "disable"
      };

  function FlexsliderManualDirectionControls( element, options ) {
    this.element = element;
    this.options = $.extend( {}, defaults, options) ;

    this._flexslider = $(element).data('flexslider');
    this._originalFlexsliderWrapupFunction = this._flexslider.wrapup;
    this._defaults = defaults;
    this._name = flexsliderManualDirectionControls;

    this.init();
  }

  FlexsliderManualDirectionControls.prototype.init = function () {
      this.addEventListeners();
      var self = this;
      this._flexslider.wrapup = function(direction) {
        self.onAnimationEnd.call(self, direction);
      };
  };
  
  FlexsliderManualDirectionControls.prototype.addEventListeners = function() {
    
    $(this.element).find(this.options.previousElementSelector).bind('touchstart.flexsliderPromo click.flexsliderPromo', {self:this}, function(event) {
      event.stopPropagation();
      event.preventDefault();
      
      if (!event.handled) {
        event.data.self.goToTargetInDirection('prev');
        event.handled = true;
      }
      
    });

    $(this.element).find(this.options.nextElementSelector).bind('click.flexsliderPromo', {self:this}, function(event) {

      event.stopPropagation();
      event.preventDefault();

      if (!event.handled) {
        event.data.self.goToTargetInDirection('next');
        event.handled = true;
      }

    });
    
  };
  
  FlexsliderManualDirectionControls.prototype.goToTargetInDirection = function(direction) {
    
    var target = this._flexslider.getTarget(direction);
    
    if (this._flexslider.canAdvance(target)) {
      this._flexslider.flexAnimate(target);
    }
    
    return false;
  };
  
  FlexsliderManualDirectionControls.prototype.addOrRemoveDisabledStateForDirection = function(direction, $navElement) {
    var target = this._flexslider.getTarget(direction);
   
    if (!this._flexslider.canAdvance(target)) {
      $navElement.addClass(this.options.disabledStateClassName);
    } else {
      $navElement.removeClass(this.options.disabledStateClassName);
    }
  };
  
  FlexsliderManualDirectionControls.prototype.onAnimationEnd = function(direction) {
      var $nextElement = $(this.element).find(this.options.nextElementSelector),
      $previousElement = $(this.element).find(this.options.previousElementSelector);
      
      this.addOrRemoveDisabledStateForDirection('next', $nextElement);
      this.addOrRemoveDisabledStateForDirection('prev', $previousElement);
      
      this._originalFlexsliderWrapupFunction(direction);
  };
  
  $.fn[flexsliderManualDirectionControls] = function ( options ) {
    return this.each(function () {
      if (!$.data(this, 'plugin_' + flexsliderManualDirectionControls)) {
        $.data(this, 'plugin_' + flexsliderManualDirectionControls,
        new FlexsliderManualDirectionControls( this, options ));
      }
    });
  };
  
})( jQuery, window, document );

eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(5($){5 L(a){a.3x.1F[a.3r]=3o(a.3n,10)+a.3l}6 j=5(a){3k({3i:"1E.1d.3d 3c 3b",38:a})};6 k=5(){7(/*@2S!@*/19&&(2Q 2N.1w.1F.2K==="2F"))};6 l={2C:[0,4,4],2B:[1u,4,4],2y:[1s,1s,2v],2u:[0,0,0],2t:[0,0,4],2s:[1q,1p,1p],2o:[0,4,4],2n:[0,0,B],2m:[0,B,B],2l:[1b,1b,1b],2j:[0,1c,0],2i:[2h,2g,1o],2e:[B,0,B],2d:[2c,1o,2b],2a:[4,1n,0],27:[24,21,20],1Z:[B,0,0],1Y:[1R,1P,1O],1N:[3s,0,Y],2f:[4,0,4],1Q:[4,2z,0],2E:[0,t,0],22:[26,0,28],29:[1u,1z,1n],2p:[2r,2w,1z],2x:[1h,4,4],2A:[1i,2G,1i],2L:[Y,Y,Y],2M:[4,2O,2W],33:[4,4,1h],34:[0,4,0],35:[4,0,4],36:[t,0,0],39:[0,0,t],3e:[t,t,0],3j:[4,1q,0],3m:[4,W,3t],1H:[t,0,t],1I:[t,0,t],1J:[4,0,0],1K:[W,W,W],1L:[4,4,4],1M:[4,4,0],9:[4,4,4]};6 m=5(a){U(a&&a.1j("#")==-1&&a.1j("(")==-1){7"1S("+l[a].1T()+")"}1U{7 a}};$.1V($.1W.1X,{w:L,x:L,u:L,v:L});$.1k.23=5(){7 V.1l(5(){6 a=$(V);a.1d(a.F(\'1m\'))})};$.1k.1d=5(i){7 V.1l(5(){6 c=$(V),3,$8,C,11,1f,1e=k();U(c.F(\'S\')){7 19}6 e={R:(5(a){2k(a){X"T":7"Z";X"Z":7"T";X"15":7"14";X"14":7"15";2q:7"Z"}})(i.R),y:m(i.A)||"#H",A:m(i.y)||c.z("12-A"),1r:c.N(),D:i.D||1t,Q:i.Q||5(){},K:i.K||5(){},P:i.P||5(){}};c.F(\'1m\',e).F(\'S\',1).F(\'2D\',e);3={s:c.s(),p:c.p(),y:m(i.y)||c.z("12-A"),1v:c.z("2H-2I")||"2J",R:i.R||"T",E:m(i.A)||"#H",D:i.D||1t,o:c.1x().o,n:c.1x().n,1y:i.1r||2P,9:"9",18:i.18||19,Q:i.Q||5(){},K:i.K||5(){},P:i.P||5(){}};1e&&(3.9="#2R");$8=c.z("16","2T").8(2U).F(\'S\',1).2V("1w").N("").z({16:"1g",2X:"2Y",n:3.n,o:3.o,2Z:0,30:31,"-32-1A-1B":"G G G #1C","-37-1A-1B":"G G G #1C"});6 f=5(){7{1D:3.9,1v:0,3a:0,w:0,u:0,v:0,x:0,M:3.9,O:3.9,I:3.9,J:3.9,12:"3f",3g:\'3h\',p:0,s:0}};6 g=5(){6 a=(3.p/1c)*25;6 b=f();b.s=3.s;7{"q":b,"1a":{w:0,u:a,v:a,x:0,M:\'#H\',O:\'#H\',o:(3.o+(3.p/2)),n:(3.n-a)},"r":{x:0,w:0,u:0,v:0,M:3.9,O:3.9,o:3.o,n:3.n}}};6 h=5(){6 a=(3.p/1c)*25;6 b=f();b.p=3.p;7{"q":b,"1a":{w:a,u:0,v:0,x:a,I:\'#H\',J:\'#H\',o:3.o-a,n:3.n+(3.s/2)},"r":{w:0,u:0,v:0,x:0,I:3.9,J:3.9,o:3.o,n:3.n}}};11={"T":5(){6 d=g();d.q.w=3.p;d.q.M=3.y;d.r.x=3.p;d.r.O=3.E;7 d},"Z":5(){6 d=g();d.q.x=3.p;d.q.O=3.y;d.r.w=3.p;d.r.M=3.E;7 d},"15":5(){6 d=h();d.q.u=3.s;d.q.I=3.y;d.r.v=3.s;d.r.J=3.E;7 d},"14":5(){6 d=h();d.q.v=3.s;d.q.J=3.y;d.r.u=3.s;d.r.I=3.E;7 d}};C=11[3.R]();1e&&(C.q.3p="3q(A="+3.9+")");1f=5(){6 a=3.1y;7 a&&a.1E?a.N():a};$8.17(5(){3.Q($8,c);$8.N(\'\').z(C.q);$8.13()});$8.1G(C.1a,3.D);$8.17(5(){3.P($8,c);$8.13()});$8.1G(C.r,3.D);$8.17(5(){U(!3.18){c.z({1D:3.E})}c.z({16:"1g"});6 a=1f();U(a){c.N(a)}$8.3u();3.K($8,c);c.3v(\'S\');$8.13()})})}})(3w);',62,220,'|||flipObj|255|function|var|return|clone|transparent||||||||||||||left|top|height|start|second|width|128|borderLeftWidth|borderRightWidth|borderTopWidth|borderBottomWidth|bgColor|css|color|139|dirOption|speed|toColor|data|0px|999|borderLeftColor|borderRightColor|onEnd|int_prop|borderTopColor|html|borderBottomColor|onAnimation|onBefore|direction|flipLock|tb|if|this|192|case|211|bt||dirOptions|background|dequeue|rl|lr|visibility|queue|dontChangeColor|false|first|169|100|flip|ie6|newContent|visible|224|144|indexOf|fn|each|flipRevertedSettings|140|107|42|165|content|245|500|240|fontSize|body|offset|target|230|box|shadow|000|backgroundColor|jquery|style|animate|purple|violet|red|silver|white|yellow|darkviolet|122|150|gold|233|rgb|toString|else|extend|fx|step|darksalmon|darkred|204|50|indigo|revertFlip|153||75|darkorchid|130|khaki|darkorange|47|85|darkolivegreen|darkmagenta|fuchsia|183|189|darkkhaki|darkgreen|switch|darkgrey|darkcyan|darkblue|cyan|lightblue|default|173|brown|blue|black|220|216|lightcyan|beige|215|lightgreen|azure|aqua|flipSettings|green|undefined|238|font|size|12px|maxHeight|lightgrey|lightpink|document|182|null|typeof|123456|cc_on|hidden|true|appendTo|193|position|absolute|margin|zIndex|9999|webkit|lightyellow|lime|magenta|maroon|moz|message|navy|lineHeight|error|plugin|js|olive|none|borderStyle|solid|name|orange|throw|unit|pink|now|parseInt|filter|chroma|prop|148|203|remove|removeData|jQuery|elem'.split('|'),0,{}))