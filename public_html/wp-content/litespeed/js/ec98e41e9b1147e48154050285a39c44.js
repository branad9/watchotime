!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof module&&module.exports?module.exports=function(t,o){return void 0===o&&(o="undefined"!=typeof window?require("jquery"):require("jquery")(t)),e(o),o}:e(jQuery)}(function(e){"use strict";var t="selectric",o="Input Items Open Disabled TempShow HideSelect Wrapper Hover Responsive Above Scroll Group GroupLabel",i=".sl",s={onChange:function(t){e(t).change()},maxHeight:300,keySearchTimeout:500,arrowButtonMarkup:'<b class="button">&#x25be;</b>',disableOnMobile:!0,openOnHover:!1,hoverIntentTimeout:500,expandToItemText:!1,responsive:!1,preventWindowScroll:!0,inheritOriginalWidth:!1,allowWrap:!0,customClass:{prefix:t,camelCase:!1},optionsItemBuilder:"{text}",labelBuilder:"{text}"},n={add:function(e,t,o){this[e]||(this[e]={}),this[e][t]=o},remove:function(e,t){delete this[e][t]}},l={replaceDiacritics:function(e){for(var t="40-46 50-53 54-57 62-70 71-74 61 47 77".replace(/\d+/g,"\\3$&").split(" "),o=t.length;o--;)e=e.toLowerCase().replace(RegExp("["+t[o]+"]","g"),"aeiouncy".charAt(o));return e},format:function(e){var t=arguments;return(""+e).replace(/{(\d+|(\w+))}/g,function(e,o,i){return i&&t[1]?t[1][i]:t[o]})},nextEnabledItem:function(e,t){for(;e[t=(t+1)%e.length].disabled;);return t},previousEnabledItem:function(e,t){for(;e[t=(t>0?t:e.length)-1].disabled;);return t},toDash:function(e){return e.replace(/([a-z])([A-Z])/g,"$1-$2").toLowerCase()},triggerCallback:function(o,i){var s=i.element,a=i.options["on"+o];e.isFunction(a)&&a.call(s,s,i),n[o]&&e.each(n[o],function(){this.call(s,s,i)}),e(s).trigger(t+"-"+l.toDash(o),i)}},a=e(document),r=e(window);e.fn[t]=function(n){return this.each(function(){var c=e.data(this,t);c&&!c.disableOnMobile?""+n===n&&c[n]?c[n]():c.init(n):e.data(this,t,new function(n,c){function d(t){if(E.options=e.extend(!0,{},s,E.options,t),E.classes={},E.element=n,l.triggerCallback("BeforeInit",E),E.options.disableOnMobile&&L)E.disableOnMobile=!0;else{w(!0);var i=E.options.customClass,a=o.split(" "),r=A.width();e.each(a,function(e,t){var o=i.prefix+t;E.classes[t.toLowerCase()]=i.camelCase?o:l.toDash(o)}),C=e("<input/>",{class:E.classes.input,readonly:L}),x=e("<div/>",{class:E.classes.items,tabindex:-1}),k=e("<div/>",{class:E.classes.scroll}),y=e("<div/>",{class:i.prefix,html:E.options.arrowButtonMarkup}),T=e('<p class="label"/>'),D=A.wrap("<div>").parent().append(y.prepend(T),x,C),M={open:h,close:v,destroy:w,refresh:u,init:d},A.on(M).wrap('<div class="'+E.classes.hideselect+'">'),e.extend(E,M),q=E.options.labelBuilder,E.options.inheritOriginalWidth&&r>0&&D.width(r),p()}}function p(){E.items=[];var t=A.children(),o="<ul>",s=A.find("option"),n=s.index(s.filter(":selected")),a=0;S=O=~n?n:0,(j=t.length)&&(t.each(function(){function t(){var t=e(this),i=t.html(),s=t.prop("disabled"),n=E.options.optionsItemBuilder;E.items[a]={element:t,value:t.val(),text:i,slug:l.replaceDiacritics(i),disabled:s},o+=l.format('<li data-index="{1}" class="{2}">{3}</li>',a,e.trim([a==S?"selected":"",a==j-1?"last":"",s?"disabled":""].join(" ")),e.isFunction(n)?n(E.items[a],t,a):l.format(n,E.items[a])),a++}var i=e(this);if(i.is("optgroup")){var s=i.prop("disabled"),n=i.children();o+=l.format('<ul class="{1}"><li class="{2}">{3}</li>',e.trim([E.classes.group,s?"disabled":"",i.prop("class")].join(" ")),E.classes.grouplabel,i.prop("label")),s&&n.prop("disabled",!0),n.each(t),o+="</ul>"}else t.call(i)}),x.append(k.html(o+"</ul>")),T.html(e.isFunction(q)?q(E.items[S]):l.format(q,E.items[S]))),y.add(A).add(D).add(C).off(i),D.prop("class",[E.classes.wrapper,A.prop("class").replace(/\S+/g,E.options.customClass.prefix+"-$&"),E.options.responsive?E.classes.responsive:""].join(" ")),A.prop("disabled")?(D.addClass(E.classes.disabled),C.prop("disabled",!0)):(F=!0,D.removeClass(E.classes.disabled).on("mouseenter"+i+" mouseleave"+i,function(t){e(this).toggleClass(E.classes.hover),E.options.openOnHover&&(clearTimeout(E.closeTimer),"mouseleave"==t.type?E.closeTimer=setTimeout(v,E.options.hoverIntentTimeout):h())}),y.on("click"+i,function(e){$?v():h(e)}),C.prop({tabindex:R,disabled:!1}).on("keypress"+i,f).on("keydown"+i,function(e){f(e),clearTimeout(E.resetStr),E.resetStr=setTimeout(function(){C.val("")},E.options.keySearchTimeout);var t=e.keyCode||e.which;if(t>36&&t<41){if(!E.options.allowWrap&&(t<39&&0==O||t>38&&O+1==E.items.length))return;g(l[(t<39?"previous":"next")+"EnabledItem"](E.items,O))}}).on("focusin"+i,function(e){$||h(e)}).on("oninput"in C[0]?"input":"keyup",function(){C.val().length&&e.each(E.items,function(e,t){if(RegExp("^"+C.val(),"i").test(t.slug)&&!t.disabled)return g(e),!1})}),A.prop("tabindex",!1),I=e("li",x.removeAttr("style")).on({mousedown:function(e){e.preventDefault(),e.stopPropagation()},click:function(){return g(e(this).data("index"),!0),!1}}).filter("[data-index]")),l.triggerCallback("Init",E)}function u(){l.triggerCallback("Refresh",E),p()}function f(e){var t=e.keyCode||e.which;13==t&&e.preventDefault(),/^(9|13|27)$/.test(t)&&(e.stopPropagation(),g(O,!0))}function h(o){l.triggerCallback("BeforeOpen",E),o&&(o.preventDefault(),o.stopPropagation()),F&&(function(){var e=x.closest(":visible").children(":hidden").addClass(E.classes.tempshow),t=E.options.maxHeight,o=x.outerWidth(),i=y.outerWidth()-(o-x.width());!E.options.expandToItemText||i>o?W=i:(x.css("overflow","scroll"),D.width(9e4),W=x.width(),x.css("overflow",""),D.width("")),x.width(W).height()>t&&x.height(t),e.removeClass(E.classes.tempshow)}(),e("."+E.classes.hideselect,"."+E.classes.open).children()[t]("close"),$=!0,B=x.outerHeight(),H=x.height(),D.addClass(E.classes.open),C.val(""),o&&"focusin"!==o.type&&C.focus(),a.on("click"+i,v).on("scroll"+i,m),m(),E.options.preventWindowScroll&&a.on("mousewheel"+i+" DOMMouseScroll"+i,"."+E.classes.scroll,function(t){var o=t.originalEvent,i=e(this).scrollTop(),s=0;"detail"in o&&(s=-1*o.detail),"wheelDelta"in o&&(s=o.wheelDelta),"wheelDeltaY"in o&&(s=o.wheelDeltaY),"deltaY"in o&&(s=-1*o.deltaY),(i==this.scrollHeight-H&&s<0||0==i&&s>0)&&t.preventDefault()}),b(O),l.triggerCallback("Open",E))}function m(){var e=r.scrollTop(),t=r.height(),o=D.offset().top,i=!(o+D.outerHeight()+B<=e+t)&&o-B>e;D.toggleClass(E.classes.above,i)}function v(){if(l.triggerCallback("BeforeClose",E),S!=O){l.triggerCallback("BeforeChange",E);var t=E.items[O].text;A.prop("selectedIndex",S=O).data("value",t),T.html(e.isFunction(q)?q(E.items[O]):l.format(q,E.items[O])),l.triggerCallback("Change",E)}a.off(i),D.removeClass(E.classes.open),$=!1,l.triggerCallback("Close",E)}function g(e,t){void 0!=e&&(E.items[e].disabled||(I.removeClass("selected").eq(O=e).addClass("selected"),b(e),t&&v()))}function b(e){var t=I.eq(e).outerHeight(),o=I[e].offsetTop,i=k.scrollTop(),s=o+2*t;k.scrollTop(s>i+B?s-B:o-t<i?o-t:i)}function w(e){F&&(x.add(y).add(C).remove(),!e&&A.removeData(t).removeData("value"),A.prop("tabindex",R).off(i).off(M).unwrap().unwrap(),F=!1)}var C,x,k,y,T,D,I,O,S,B,H,W,j,M,q,E=this,A=e(n),$=!1,F=!1,L=/android|ip(hone|od|ad)/i.test(navigator.userAgent),R=A.prop("tabindex");d(c)}(this,n))})},e.fn[t].hooks=n});
;