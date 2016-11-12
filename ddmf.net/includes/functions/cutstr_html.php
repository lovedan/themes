<?php 
function cutstr_html($string,$length=0,$ellipsis='...'){
	if(!count($string)){
		return '';
	}
	if(!is_numeric($length)){
		return '';
	}
	$string=strip_tags($string);
	$string=preg_replace('/\n/is','',$string);
	$string=preg_replace('/ |　/is','',$string);
	$string=preg_replace('/&nbsp;/is','',$string);
	preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/",$string,$t_string);
	if($t_string[0]&&$length&&count($t_string[0])>$length){
		return join('', array_slice($t_string[0], 0, $length)).$ellipsis;   
	}else{
		return join('', $t_string[0]); 
	}
}
?>