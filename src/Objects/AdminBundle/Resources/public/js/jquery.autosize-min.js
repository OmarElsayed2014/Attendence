/*!
	jQuery Autosize v1.17.0
	(c) 2013 Jack Moore - jacklmoore.com
	updated: 2013-06-19
	license: http://www.opensource.org/licenses/mit-license.php
*/
(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var o,a={};if(t=d,s.className=i.className,r=parseInt(c.css("maxHeight"),10),e.each(n,function(e,t){a[t]=c.css(t)}),e(s).css(a),"oninput"in d){var l=d.style.width;d.style.width="0px",o=d.offsetWidth,d.style.width=l}}function a(){var n,a,p,f;t!==d&&o(),s.value=d.value+i.append,s.style.overflowY=d.style.overflowY,a=parseInt(d.style.height,10),"getComputedStyle"in window?(f=window.getComputedStyle(d),p=d.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,t){p-=parseInt(f[t],10)}),s.style.width=p+"px"):s.style.width=Math.max(c.width(),0)+"px",s.scrollTop=0,s.scrollTop=9e4,n=s.scrollTop,r&&n>r?(d.style.overflowY="scroll",n=r):(d.style.overflowY="hidden",l>n&&(n=l)),n+=h,a!==n&&(d.style.height=n+"px",u&&i.callback.call(d,d))}var r,l,d=this,c=e(d),h=0,u=e.isFunction(i.callback),p={height:d.style.height,overflow:d.style.overflow,overflowY:d.style.overflowY,wordWrap:d.style.wordWrap,resize:d.style.resize};if(!c.data("autosize")){if(c.data("autosize",!0),("border-box"===c.css("box-sizing")||"border-box"===c.css("-moz-box-sizing")||"border-box"===c.css("-webkit-box-sizing"))&&(h=c.outerHeight()-c.height()),l=Math.max(parseInt(c.css("minHeight"),10)-h||0,c.height()),c.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===c.css("resize")||"vertical"===c.css("resize")?"none":"horizontal"}),"onpropertychange"in d?"oninput"in d?c.on("input.autosize keyup.autosize",a):c.on("propertychange.autosize",function(){"value"===event.propertyName&&a()}):c.on("input.autosize",a),i.resizeDelay!==!1){var f,w=e(d).width();e(window).on("resize.autosize",function(){clearTimeout(f),f=setTimeout(function(){e(d).width()!==w&&a()},parseInt(i.resizeDelay,10))})}c.on("autosize.resize",a),c.on("autosize.resizeIncludeStyle",function(){t=null,a()}),c.on("autosize.destroy",function(){t=null,c.off("autosize").off(".autosize").css(p).removeData("autosize")}),a()}})}})(window.jQuery||window.Zepto);