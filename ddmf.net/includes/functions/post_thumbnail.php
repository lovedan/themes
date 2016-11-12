<?php 
function post_thumbnail(){
	global $post;
	$link = get_permalink($post->ID);
	$title = $post->post_title;
	$template_url =get_bloginfo('template_url');
	$post_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/\<img.+?src="(.+?)".*?\/>/is',$post->post_content,$matches ,PREG_SET_ORDER);
	$cnt = count( $matches );
	if($cnt>0){
		$post_img_src1 = $matches [0][1]; //apache的写法
		$post_img_src2 = strpos($post_img_src1, "http://")===0?$matches [0][1]:site_url().$matches [0][1];//iis的写法
		$args = getimagesize($post_img_src2);
		$height = $args[1]*190/$args[0];
		if($height>900){ $sub ='<span class="xlong"></span>' ;$class='long';}
		$post_img = '<a class="ximg thepermalink '.$class.'" href="'.$link.'" target="_blank" hidefocus="true" title="'.$title.'"><img class="dhpic wp-post-image" src="'.$template_url.'/images/onepx.gif" data-original="'.$post_img_src1.'" alt="'.$title.'" width="190" height="'.$height.'"/><noscript><img class="dhpic wp-post-image" src="'.$post_img_src1.'" alt="'.$title.'" width="190" height="'.$height.'"/></noscript>'.$sub.'</a>';
		echo $post_img;
	}else{
		echo '<img data-original="" alt="" width="0" height=""/>';
	}
}
function video_post_thumbnail(){
	global $post;
	$link = get_permalink($post->ID);
	$title = $post->post_title;
	$template_url =get_bloginfo('template_url');
	$post_img = '';
		$post_img_src1 = get_post_meta($post->ID, 'video_pic', true);
		$post_img_src2 = strpos($post_img_src1, "http://")===0?$post_img_src1:site_url().$post_img_src1;//iis的写法
		$post_video = get_post_meta($post->ID, 'video_link', true);
		if($post_video) $post_video='video-url="'.$post_video.'"';
		$args = getimagesize($post_img_src2);
		$height = $args[1]*190/$args[0];
		if($height>900){ $sub ='<span class="xlong"></span>' ;$class='long';}
		$post_img = '<a class="ximg vimg thepermalink '.$class.'" href="'.$link.'" target="_blank" hidefocus="true" title="'.$title.'"><img class="dhpic wp-post-image" src="'.$template_url.'/images/onepx.gif" data-original="'.$post_img_src1.'" alt="'.$title.'" width="190" height="'.$height.'"/>'.$sub.'</a>';
		$post_img .='<a target="_blank" href="'.$link.'" class="video_play" '.$post_video.'><img src="'.$template_url.'/images/video_icon.png" alt="点击播放"></a>';
		echo $post_img;
}
function post_thumbnail_src(){
	global $post;
	$link = get_permalink($post->ID);
	$title = $post->post_title;
	$template_url =get_bloginfo('template_url');
	$post_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/\<img.+?src="(.+?)".*?\/>/is',$post->post_content,$matches ,PREG_SET_ORDER);
	$cnt = count( $matches );
	$video_pic = get_post_meta($post->ID, 'video_pic', true);
	if($cnt>0){
		$post_img_src = $matches [0][1];
		echo $post_img_src;
	}
	elseif($video_pic){echo $video_pic;}
	else{
		echo $template_url.'/images/default.png';
	}
}
?>