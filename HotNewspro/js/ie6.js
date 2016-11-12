// png
DD_belatedPNG.fix('.boxCaption,.top_box,.logo,.reply,.imgcat,.zoom a,#fancybox-left-ico,#fancybox-right-ico,#fancybox-close,#featured_tag,#slider_nav a');

// ÏÂÀ­²Ëµ¥
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls = document.getElementById("menu").getElementsByTagName("li");

	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
	}	
	var sfEls = document.getElementById("topnav").getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);