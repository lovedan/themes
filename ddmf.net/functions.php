<?php
include("includes/functions/pagenavi.php");
include("includes/functions/slug_walker.php");
include("includes/functions/post_thumbnail.php");
include("includes/functions/cutstr_html.php");
include("includes/functions/yundanran_get_post_share_count.php");
define('THEME_NAME','ddmf');

// LOCALIZATION
load_theme_textdomain( THEME_NAME,TEMPLATEPATH .'/languages');

// Custom background
add_custom_background();

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Add post-formats
add_theme_support( 'post-formats', array( 'video','aside','gallery'));

// WP nav menu
if ( function_exists('register_nav_menus') ) {
	//开启主题支持菜单
// 自定义菜单
   register_nav_menus(
      array(
         'about' => __( '关于' ),
         'hide-menu' => __( '可隐藏导航' ),
		 'tag-cloud' => __( '云标签' )
      )
   );
}

// Widgetized Sidebar.
add_action( 'widgets_init', 'ddmf_widgets_init' );
function ddmf_widgets_init() {
	register_sidebar(array(
		'name' => __('Primary Widget Area','ddmf'),
		'id' => 'primary-widget-area',
		'description' => __('The primary widget area','ddmf'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
}

/* // Add post_meta likes
add_action('publish_post', 'add_likes_fields');
function add_likes_fields($post_ID) {
	add_post_meta($post_ID, 'likes', 0, true);
}

// Delete post_meta likes
add_action('delete_post', 'delete_likes_fields');
function delete_likes_fields($post_ID) {
	global $wpdb;
	if(!wp_is_post_revision($post_ID)) {
		delete_post_meta($post_ID, 'likes');
	}
}

// Add post_meta thumbnail
add_action('publish_post', 'add_thumbnail_fields');
function add_thumbnail_fields($post_ID) {
	global $wpdb;
	if(!wp_is_post_revision($post_ID)) {
		$content_post = get_post($post_ID);
		$content = $content_post->post_content;
		$post_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/\<img.+?src="(.+?)".*?\/>/is',$content,$matches ,PREG_SET_ORDER);
		$cnt = count( $matches );
		if($cnt>0){
			$post_img_src = $matches [0][1];
			$args = getimagesize($post_img_src);
			$height = $args[1]*285/$args[0];
			$post_img = '<img src="'.get_bloginfo('template_url').'/timthumb.php?src='.$post_img_src.'&amp;w=285&amp;zc=1" width="285" height="'.$height.'"/>';
		}
		if($post_img!="") add_post_meta($post_ID, 'thumbnail', $post_img, true);
	}
}

// Update post_meta likes
add_action('save_post', 'update_thumbnail_fields');
function update_thumbnail_fields($post_ID) {
	delete_post_meta($post_ID, 'thumbnail');
	add_thumbnail_fields($post_ID);
}

// Delete post_meta thumbnail
add_action('delete_post', 'delete_thumbnail_fields');
function delete_thumbnail_fields($post_ID) {
	global $wpdb;
	if(!wp_is_post_revision($post_ID)) {
		delete_post_meta($post_ID, 'thumbnail');
	}
}

// Write the thumbnail data to Database
add_action('init', 'ajax_thumbnail');
function ajax_thumbnail() {
	if( isset($_GET['action'])&& $_GET['action'] == 'update_thumbnail'){
		$img = $_GET['img'];
		$height = $_GET['height'];
		$id = $_GET['id'];
		$post_img =  '<img src="'.$img.'&w=285&zc=1" width="285" height="'.$height.'"/>';
		delete_post_meta($id, 'thumbnail');
		add_post_meta($id, 'thumbnail', $post_img, true);
		echo "success";
		die();
	}else return;
} */
add_action('login_head', 'my_custom_login_logo');
function my_custom_login_logo() {
    echo '<style type="text/css">body.login #login h1 {background-color: white;margin-left: 8px;font-weight: normal;-moz-border-radius: 3px;-khtml-border-radius: 3px;-webkit-border-radius: 3px;border-radius: 3px;border: 1px solid #E5E5E5;-moz-box-shadow: rgba(200,200,200,0.7) 0 4px 10px -1px;-webkit-box-shadow: rgba(200,200,200,0.7) 0 4px 10px -1px;-khtml-box-shadow: rgba(200,200,200,0.7) 0 4px 10px -1px;box-shadow: rgba(200,200,200,0.7) 0 4px 10px -1px;margin-bottom: 10px;} body.login #login h1 a {background: url(http://alvin.ddmf.net/wp-content/themes/ddmf.net/images/ddmf_logo.png) no-repeat 0 0 transparent;background-size:195px 65px;padding: 0;margin: 10px auto 5px;width: 200px;background-color: white;}</style>';
}
add_filter('login_headertitle', create_function(false,"return get_bloginfo('description');"));
add_filter('login_headerurl', create_function(false,"return get_bloginfo('siteurl');"));
// Ajax upload photo
add_action('wp_ajax_b_ajax_post_action', 'b_ajax_callback');
function b_ajax_callback() {
  global $wpdb;
  if(isset($_POST['type']) && $_POST['type'] == 'upload') {
    $clickedID = $_POST['data'];
    $filename = $_FILES[$clickedID];
    $filename['name'] = preg_replace('/[^a-zA-Z0-9._-]/', '', $filename['name']);
    $override['test_form'] = false;
    $override['action'] = 'wp_handle_upload';
    $uploaded_file = wp_handle_upload($filename,$override);
    $upload_tracking[] = $clickedID;
    update_option($clickedID, $uploaded_file['url'] );
    if(!empty($uploaded_file['error'])) {echo 'Upload Error: ' . $uploaded_file['error']; }
    else { echo $uploaded_file['url']; }
  }
  die();
}

// Replace remote image url
function save_post_pic($content){
	$content1 = stripslashes($content);
	$remote_url = '';
	if (get_magic_quotes_gpc()) $content1 = stripslashes($content1);
	preg_match_all("/ src=(\"|\'){0,}(http:\/\/(.+?))(\"|\'|\s)/is",$content1,$img_array);
	$img_array = array_unique($img_array[2]);
	foreach ($img_array as $key => $value){
		set_time_limit(180);
		if(str_replace(get_bloginfo('url'),"",$value)==$value&&str_replace(get_bloginfo('home'),"",$value)==$value){
			$remote_url = grab_remote_pic($value);
			$content1 = str_replace($value,get_bloginfo('url')."/".$remote_url,$content1);
		}
	}
	$content = AddSlashes($content1);
	return $content;
}

// Grab remote image
function grab_remote_pic($url){
	$filetime = time();
	$filepath = "wp-content/uploads/".date("Y",$filetime)."/".date("m",$filetime)."/";
	!is_dir($filepath) ? mkdir($filepath,755) : null;
	$ext = strrchr($url,".");
	if($ext!=".gif" && $ext!=".jpg" && $ext!=".jpeg" && $ext!=".png" && $ext!=".GIF" && $ext!=".JPG" && $ext!=".PNG" && $ext!=".JPEG") $ext=".jpg";
	$url = preg_replace( '/(?:^[\'"]+|[\'"\/]+$)/', '', $url );
	$hander = curl_init();
	$filename = $filepath.$filetime.$ext;
	$fp=@fopen($filename,"w+");
	curl_setopt($hander,CURLOPT_URL,$url);
	curl_setopt($hander,CURLOPT_FILE,$fp);
	curl_setopt($hander,CURLOPT_HEADER,0);
	curl_setopt($hander,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($hander,CURLOPT_TIMEOUT,60);
	curl_exec($hander);
	curl_close($hander);
	fclose($fp);
	return $filename;
}

// Ajax load posts
add_action('init', 'ajax_post');
function ajax_post(){
	if( isset($_GET['action'])&& $_GET['action'] == 'ajax_post'){
		$prePage = floor(get_option('posts_per_page')/4);
		if(isset($_GET['meta'])){
			$args = array(
				'meta_key' => $_GET['meta'],
				'orderby'   => 'meta_value_num',
				'paged' => $_GET['pag'],
				'order' => DESC,
				'showposts' =>$prePage
			);
		}else if(isset($_GET['cat'])){
			$args = array(
				'category_name' => $_GET['cat'],
				'paged' => $_GET['pag'],
				'showposts' =>$prePage
			);
		}else if(isset($_GET['tag'])){
			$args = array(
				'tag' => $_GET['tag'],
				'paged' => $_GET['pag'],
				'showposts' =>$prePage
			);
		}else if(isset($_GET['s'])){
			$args = array(
				's' => $_GET['s'],
				'paged' => $_GET['pag'],
				'showposts' =>$prePage
			);
		}else if(isset($_GET['pag'])){
			$args = array(
				'paged' => $_GET['pag'],
				'showposts' =>$prePage
			);
		}
		query_posts($args);
		if(have_posts()){while (have_posts()):the_post();?>
			<?php get_template_part( 'content', get_post_format() );?>
		<?php endwhile;}else{die();}
		wp_reset_query();
		die();
	}else{return;}
}
//删除登录后顶部导航
//remove_action('init',  '_wp_admin_bar_init');

//Theme comments lists
function ddmf_comment($comment,$args,$depth) {
$GLOBALS['comment'] = $comment;
;echo '	<li ';comment_class();;echo ' id="li-comment-';comment_ID() ;echo '" >
		<div id="comment-';comment_ID();;echo '" class="comment-body">
			<div class="commentmeta">';echo get_avatar( $comment->comment_author_email,$size = '48');;echo '</div>
				';if ($comment->comment_approved == '0') : ;echo '				<em>';_e('Your comment is awaiting moderation.') ;echo '</em><br />
				';endif;;echo '			<div class="commentmetadata">&nbsp;&nbsp;';printf(__('%1$s %2$s'),get_comment_date('Y.n.d'),get_comment_time('G:i'));;echo '</div>
			<div class="reply">';comment_reply_link(array_merge( $args,array('depth'=>$depth,'max_depth'=>$args['max_depth'],'reply_text'=>__('Reply')))) ;echo '</div>
			<div class="vcard">';printf(__('%s'),get_comment_author_link()) ;echo '</div>
			';comment_text() ;echo '		</div>
';
}
add_action('admin_init', 'ddmf_init');
function ddmf_init() {
	if (isset($_GET['page']) && $_GET['page'] == 'functions.php') {
		$dir = get_bloginfo('template_directory');
		wp_enqueue_script('adminjquery', $dir . '/js/admin.js', false, '1.0.0', false);
		wp_enqueue_style('admincss', $dir . '/css/admin.css', false, '1.0.0', 'screen');
	}
}

//Theme option
add_action('admin_menu','ddmf_page');
function ddmf_page (){
if ( count($_POST) >0 &&isset($_POST['ddmf_settings']) ){
$options = array ('keywords','description','analytics','phzoom','copyright','tag','Ap1','Ap2', 'Ap3', 'jquery');
foreach ( $options as $opt ){
delete_option ( 'ddmf_'.$opt,$_POST[$opt] );
add_option ( 'ddmf_'.$opt,$_POST[$opt] );
}
}
add_theme_page('蛋蛋魔法 '.__('主题设置',THEME_NAME),__('主题设置',THEME_NAME),'edit_themes',basename(__FILE__),'ddmf_settings');
}
function ddmf_settings(){?>
<div class="wrap">
<div>
<h2><?php _e( 'ddmf Theme Options<span>Version: ',THEME_NAME);?><?php $theme_data=get_theme_data(TEMPLATEPATH . '/style.css'); echo $theme_data['Version'];?></span></h2>
</div>
<div class="clear"></div>
<form method="post" action="">
	<div id="theme-Option">
		<div id="theme-menu">
			<span class="m1"><?php _e( 'jQuery Effect',THEME_NAME);?></span>
			<span class="m2"><?php _e( 'Ad Words',THEME_NAME);?></span>
			<span class="m3"><?php _e( 'Website Information',THEME_NAME);?></span>
			<span class="m4"><?php _e( 'Analytics Code',THEME_NAME);?></span>
			<span class="m5"><?php _e( 'Footer Copyright',THEME_NAME);?></span>
			<span class="m6"><?php _e( 'ddmf Theme Declare',THEME_NAME);?></span>
			<span class="m7"><?php _e( 'ddmf Theme Declare',THEME_NAME);?></span>
			<span class="m8"><?php _e( 'ddmf Theme Declare',THEME_NAME);?></span>
			<span class="m9"><?php _e( 'ddmf Theme Declare',THEME_NAME);?></span>
			<span class="m10"><?php _e( 'ddmf Theme Declare',THEME_NAME);?></span>
			<div class="clear"></div>
		</div>
		<div id="theme-content">
			<ul>
				<li>
				<tr><td>
					<em><?php _e( 'ddmf use jquery 1.4.4 which contained in this theme, you can also use the Google one instead.',THEME_NAME);?></em><br/>
					<label><input name="jquery" type="checkbox" id="jquery" value="hide" <?php if (get_option('ddmf_jquery')!='') echo 'checked="checked"' ;?>/><?php _e( 'Load the jQuery Library supported by Google',THEME_NAME);?></label><br/><br/><?php echo get_option('ddmf_jquery') ;?>
				</td></tr>
				<tr><td>
					<em><?php _e( 'ddmf has already containered <b>phZoom slide effect</b>, you may want to try it, and you should close relative plugins',THEME_NAME);?></em><br/>
					<label><input name="phzoom" type="checkbox" id="phzoom" value="1" <?php if (get_option('ddmf_phzoom')!='') echo 'checked="checked"'; ?>/><?php _e( 'Deactivate phZoom slide effect',THEME_NAME);?></label><br/><br/>
				</td></tr>
				<tr><td>
					<em><?php _e( 'Tags number of index.php',THEME_NAME);?></em><br/>
					<label><input name="tag" type="text" id="tag" value="<?php echo get_option('ddmf_tag')!=''? get_option('ddmf_tag'):20; ?>" /><?php _e( 'Tags number of index.php, default number is 20',THEME_NAME);?></label><br/><br/>
				</td></tr>
				</li>
				<li>
							<tr><td>
				<?php _e( '<em>Ad under the content, html code</em>',THEME_NAME);?><br/>
				<textarea name="Ap1" id="Ap1" rows="2" cols="70" style="font-size:11px;width:100%;"><?php echo get_option('ddmf_Ap1');?></textarea><br/>
			</td></tr>
							<tr><td>
				<?php _e( '<em>Ad at siderbar, html code </em>',THEME_NAME);?><br/>
				<textarea name="Ap2" id="Ap2" rows="2" cols="70" style="font-size:11px;width:100%;"><?php echo get_option('ddmf_Ap2');?></textarea><br/>
			</td></tr>
				</li>
				<li>
							<tr><td>
				<?php _e( '<em>Keywords, separate by English commas. like MuFeng, Computer, Software</em>',THEME_NAME);?><br/>
				<textarea name="keywords" id="keywords" rows="1" cols="70" style="font-size:11px;width:100%;"><?php echo get_option('ddmf_keywords');?></textarea><br/>
			</td></tr>
			<tr><td>
				<?php _e( '<em>Description, explain what\'s this site about. like MuFeng, Breathing the wind</em>',THEME_NAME);?><br/>
				<textarea name="description" id="description" rows="3" cols="70" style="font-size:11px;width:100%;"><?php echo get_option('ddmf_description');?></textarea>
			</td></tr>
				</li>
				<li>
							<tr><td>
				<?php _e( 'You can get your Google Analytics code <a target="_blank" href="https://www.google.com/analytics/settings/check_status_profile_handler">here</a>.',THEME_NAME);?></label><br>
				<textarea name="analytics" id="analytics" rows="5" cols="70" style="font-size:11px;width:100%;"><?php echo stripslashes(get_option('ddmf_analytics'));?></textarea>
			</td></tr>
				</li>
				<li>
							<tr><td>
				<textarea name="copyright" id="copyright" rows="5" cols="70" style="font-size:11px;width:100%;"><?php if(stripslashes(get_option('ddmf_copyright'))!=''){echo stripslashes(get_option('ddmf_copyright'));}else{echo 'Copyright &copy; '.date('Y').' '.'<a href="'.home_url( '/').'" title="'.esc_attr( get_bloginfo( 'name') ).'">'.esc_attr( get_bloginfo( 'name') ).'</a> All rights reserved'; };?></textarea>
				<br/><em><?php _e( '<b>Preview</b>',THEME_NAME);?><span> : </span><span><?php if(stripslashes(get_option('ddmf_copyright'))!=''){echo stripslashes(get_option('ddmf_copyright'));}else{echo 'Copyright &copy; '.date('Y').' '.'<a href="'.home_url( '/').'" title="'.esc_attr( get_bloginfo( 'name') ).'">'.esc_attr( get_bloginfo( 'name') ).'</a> All rights reserved'; };?></span></em>
			</td></tr>
				</li>
				<li>
							<tr><td>
			<h3 style="color:#333" id="introduce"><?php _e( 'Introduction',THEME_NAME);?></h3>
			<p style="text-indent: 2em;margin:10px 0;"><?php _e( 'ddmf is evolved from one theme of Tumblr and turned it into a photo theme which can be used at wordpress.',THEME_NAME);?></p>
			<h3 style="color:#333"><?php _e( 'Published Address',THEME_NAME);?></h3>
			<p  id="release" style="text-indent: 2em;margin:10px 0;"><a href="http://www.ddmf.net" target="_blank">http://www.ddmf.net</a></p>
			<h3 style="color:#333"><?php _e( 'Preview Address',THEME_NAME);?></h3>
			<p  id="preview" style="text-indent: 2em;margin:10px 0;"><a href="http://www.ddmf.net" target="_blank">http://www.ddmf.net</a></p>
			<h3 style="color:#333" id="bug"><?php _e( 'Report Bugs',THEME_NAME);?></h3>
			<p style="text-indent: 2em;margin:10px 0;"><?php _e( 'Weibo <a href="http://www.weibo.com/ddmfnet" target="_blank">@艾旦网络</a> or leave a message at <a href="http://www.ddmf.net" target="_blank">http://www.ddmf.net</a>。',THEME_NAME);?></p>
			</td></tr>
				</li>
				<li>
							<tr><td>
			<h3 style="color:#333" id="introduce"><?php _e( 'Introduction',THEME_NAME);?></h3>
			<p style="text-indent: 2em;margin:10px 0;"><?php _e( 'ddmf is evolved from one theme of Tumblr and turned it into a photo theme which can be used at wordpress.',THEME_NAME);?></p>
			<h3 style="color:#333"><?php _e( 'Published Address',THEME_NAME);?></h3>
			<p  id="release" style="text-indent: 2em;margin:10px 0;"><a href="http://www.ddmf.net" target="_blank">http://www.ddmf.net</a></p>
			<h3 style="color:#333"><?php _e( 'Preview Address',THEME_NAME);?></h3>
			<p  id="preview" style="text-indent: 2em;margin:10px 0;"><a href="http://www.ddmf.net" target="_blank">http://www.ddmf.net</a></p>
			<h3 style="color:#333" id="bug"><?php _e( 'Report Bugs',THEME_NAME);?></h3>
			<p style="text-indent: 2em;margin:10px 0;"><?php _e( 'Weibo <a href="http://www.weibo.com/ddmfnet" target="_blank">@艾旦网络</a> or leave a message at <a href="http://www.ddmf.net" target="_blank">http://www.ddmf.net</a>。',THEME_NAME);?></p>
			</td></tr>
				</li>
			</ul>
		</div>
	</div>
	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Options',THEME_NAME);?>" />
		<input type="hidden" name="ddmf_settings" value="save" style="display:none;" />
	</p>
</form>
</div>
<?php
}
//禁用页面的评论功能
function disable_page_comments( $posts ) {
	if ( is_page()) {
	$posts[0]->comment_status = 'disabled';
	$posts[0]->ping_status = 'disabled';
	}
	return $posts;
}
add_filter( 'the_posts', 'disable_page_comments' );
//禁用三十天之前的日志评论功能
function close_comments( $posts ) {
    if ( !is_single() ) { return $posts; }
    if ( time() - strtotime( $posts[0]->post_date_gmt ) > ( 30 * 24 * 60 * 60 ) ) {
        $posts[0]->comment_status = 'closed';
        $posts[0]->ping_status    = 'closed';
    }
    return $posts;
}
add_filter('the_posts','close_comments');

//全部结束
?>