!function(e){var t={};function i(o){if(t[o])return t[o].exports;var a=t[o]={i:o,l:!1,exports:{}};return e[o].call(a.exports,a,a.exports,i),a.l=!0,a.exports}i.m=e,i.c=t,i.d=function(e,t,o){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(i.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)i.d(o,a,function(t){return e[t]}.bind(null,a));return o},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="/",i(i.s=0)}([function(e,t,i){i(1),i(2),e.exports=i(3)},function(e,t){var i;i=navigator.userAgent||navigator.vendor||window.opera,(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(i)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(i.substr(0,4))},function(e,i){var o;(o=jQuery).fn.extend({slimScroll:function(e){var i=o.extend({width:"auto",height:"250px",size:"7px",color:"#000",position:"right",distance:"1px",start:"top",opacity:.4,alwaysVisible:!1,disableFadeOut:!1,railVisible:!1,railColor:"#333",railOpacity:.2,railDraggable:!0,railClass:"slimScrollRail",barClass:"slimScrollBar",wrapperClass:"slimScrollDiv",allowPageScroll:!1,wheelStep:20,touchScrollStep:200,borderRadius:"7px",railBorderRadius:"7px"},e);return this.each(function(){var a,r,s,n,l,c,u,p,d="<div></div>",h=30,m=!1,g=o(this);if(g.parent().hasClass(i.wrapperClass)){var f=g.scrollTop();if(x=g.closest("."+i.barClass),y=g.closest("."+i.railClass),j(),o.isPlainObject(e)){if("height"in e&&"auto"==e.height){g.parent().css("height","auto"),g.css("height","auto");var b=g.parent().parent().height();g.parent().css("height",b),g.css("height",b)}if("scrollTo"in e)f=parseInt(i.scrollTo);else if("scrollBy"in e)f+=parseInt(i.scrollBy);else if("destroy"in e)return x.remove(),y.remove(),void g.unwrap();S(f,!1,!0)}}else if(!(o.isPlainObject(e)&&"destroy"in e)){i.height="auto"==i.height?g.parent().height():i.height;var v=o(d).addClass(i.wrapperClass).css({position:"relative",overflow:"hidden",width:i.width,height:i.height});g.css({overflow:"hidden",width:i.width,height:i.height});var w,y=o(d).addClass(i.railClass).css({width:i.size,height:"100%",position:"absolute",top:0,display:i.alwaysVisible&&i.railVisible?"block":"none","border-radius":i.railBorderRadius,background:i.railColor,opacity:i.railOpacity,zIndex:90}),x=o(d).addClass(i.barClass).css({background:i.color,width:i.size,position:"absolute",top:0,opacity:i.opacity,display:i.alwaysVisible?"block":"none","border-radius":i.borderRadius,BorderRadius:i.borderRadius,MozBorderRadius:i.borderRadius,WebkitBorderRadius:i.borderRadius,zIndex:99}),k="right"==i.position?{right:i.distance}:{left:i.distance};y.css(k),x.css(k),g.wrap(v),g.parent().append(x),g.parent().append(y),i.railDraggable&&x.bind("mousedown",function(e){var i=o(document);return s=!0,t=parseFloat(x.css("top")),pageY=e.pageY,i.bind("mousemove.slimscroll",function(e){currTop=t+e.pageY-pageY,x.css("top",currTop),S(0,x.position().top,!1)}),i.bind("mouseup.slimscroll",function(e){s=!1,H(),i.unbind(".slimscroll")}),!1}).bind("selectstart.slimscroll",function(e){return e.stopPropagation(),e.preventDefault(),!1}),y.hover(function(){z()},function(){H()}),x.hover(function(){r=!0},function(){r=!1}),g.hover(function(){a=!0,z(),H()},function(){a=!1,H()}),g.bind("touchstart",function(e,t){e.originalEvent.touches.length&&(l=e.originalEvent.touches[0].pageY)}),g.bind("touchmove",function(e){m||e.originalEvent.preventDefault(),e.originalEvent.touches.length&&(S((l-e.originalEvent.touches[0].pageY)/i.touchScrollStep,!0),l=e.originalEvent.touches[0].pageY)}),j(),"bottom"===i.start?(x.css({top:g.outerHeight()-x.outerHeight()}),S(0,!0)):"top"!==i.start&&(S(o(i.start).position().top,null,!0),i.alwaysVisible||x.hide()),w=this,window.addEventListener?(w.addEventListener("DOMMouseScroll",C,!1),w.addEventListener("mousewheel",C,!1)):document.attachEvent("onmousewheel",C)}function C(e){if(a){var t=0;(e=e||window.event).wheelDelta&&(t=-e.wheelDelta/120),e.detail&&(t=e.detail/3);var r=e.target||e.srcTarget||e.srcElement;o(r).closest("."+i.wrapperClass).is(g.parent())&&S(t,!0),e.preventDefault&&!m&&e.preventDefault(),m||(e.returnValue=!1)}}function S(e,t,o){m=!1;var a=e,r=g.outerHeight()-x.outerHeight();if(t&&(a=parseInt(x.css("top"))+e*parseInt(i.wheelStep)/100*x.outerHeight(),a=Math.min(Math.max(a,0),r),a=e>0?Math.ceil(a):Math.floor(a),x.css({top:a+"px"})),a=(u=parseInt(x.css("top"))/(g.outerHeight()-x.outerHeight()))*(g[0].scrollHeight-g.outerHeight()),o){var s=(a=e)/g[0].scrollHeight*g.outerHeight();s=Math.min(Math.max(s,0),r),x.css({top:s+"px"})}g.scrollTop(a),g.trigger("slimscrolling",~~a),z(),H()}function j(){c=Math.max(g.outerHeight()/g[0].scrollHeight*g.outerHeight(),h),x.css({height:c+"px"});var e=c==g.outerHeight()?"none":"block";x.css({display:e})}function z(){if(j(),clearTimeout(n),u==~~u){if(m=i.allowPageScroll,p!=u){var e=0==~~u?"top":"bottom";g.trigger("slimscroll",e)}}else m=!1;p=u,c>=g.outerHeight()?m=!0:(x.stop(!0,!0).fadeIn("fast"),i.railVisible&&y.stop(!0,!0).fadeIn("fast"))}function H(){i.alwaysVisible||(n=setTimeout(function(){i.disableFadeOut&&a||r||s||(x.fadeOut("slow"),y.fadeOut("slow"))},1e3))}}),this}}),o.fn.extend({slimscroll:o.fn.slimScroll})},function(e,t,i){"use strict";$(document).ready(function(){$.sidebarMenu=function(e){$(e).on("click","li a",function(e){var t=$(this),i=t.next();if(i.is(".xp-vertical-submenu")&&i.is(":visible"))i.slideUp(300,function(){i.removeClass("menu-open")}),i.parent("li").removeClass("active");else if(i.is(".xp-vertical-submenu")&&!i.is(":visible")){var o=t.parents("ul").first();o.find("ul:visible").slideUp(300).removeClass("menu-open");var a=t.parent("li");i.slideDown(300,function(){i.addClass("menu-open"),o.find("li.active").removeClass("active"),a.addClass("active")})}i.is(".xp-vertical-submenu")&&e.preventDefault()})}})}]);