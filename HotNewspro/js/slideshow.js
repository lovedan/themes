$(function(){
    var page = 1;
    var i = 4;
    $("span.next").click(function(){
	     var $parent = $(this).parents("div.v_show");
		 var $v_show = $parent.find("div.v_content_list");
		 var $v_content = $parent.find("div.v_content");
		 var v_width = $v_content.width() ;
		 var len = $v_show.find("li").length;
		 var page_count = Math.ceil(len / i) ;
		 if( !$v_show.is(":animated") ){
			  if( page == page_count ){
				$v_show.animate({ left : '0px'}, "slow");
				page = 1;
				}else{
				$v_show.animate({ left : '-='+v_width }, "slow");
				page++;
			 }
		 }
		 $parent.find("span").eq((page-1)).addClass("current").siblings().removeClass("current");
   });
    $("span.prev").click(function(){
	     var $parent = $(this).parents("div.v_show");
		 var $v_show = $parent.find("div.v_content_list");
		 var $v_content = $parent.find("div.v_content");
		 var v_width = $v_content.width();
		 var len = $v_show.find("li").length;
		 var page_count = Math.ceil(len / i) ;
		 if( !$v_show.is(":animated") ){
		 	 if( page == 1 ){
				$v_show.animate({ left : '-='+v_width*(page_count-1) }, "slow");
				page = page_count;
			}else{
				$v_show.animate({ left : '+='+v_width }, "slow");
				page--;
			}
		}
		$parent.find("span").eq((page-1)).addClass("current").siblings().removeClass("current");
    });
});