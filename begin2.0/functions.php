<?php
// 小工具
if (function_exists('register_sidebar')){
	register_sidebar( array(
		'name'          => '首页侧边栏（上）',
		'id'            => 'sidebar-h-t',
		'description'   => '显示在首页侧边栏上面',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '首页侧边栏（跟随）',
		'id'            => 'sidebar-h-r',
		'description'   => '显示在首页，并跟随滚动',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '首页侧边栏（下）',
		'id'            => 'sidebar-h-b',
		'description'   => '显示在首页侧边栏下面',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '正文侧边栏（上）',
		'id'            => 'sidebar-s-t',
		'description'   => '显示在正文、页面上面',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '正文侧边栏（跟随）',
		'id'            => 'sidebar-s-r',
		'description'   => '显示在正文、页面，并跟随滚动',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '正文侧边栏（下）',
		'id'            => 'sidebar-s-b',
		'description'   => '显示在正文、页面下面',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '分类归档侧边栏（上）',
		'id'            => 'sidebar-a-t',
		'description'   => '显示在归档页、搜索、404页上面 ',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '分类归档侧边栏（跟随）',
		'id'            => 'sidebar-a-r',
		'description'   => '显示在归档页、搜索、404页并跟随滚动 ',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '分类归档侧边栏（下）',
		'id'            => 'sidebar-a-b',
		'description'   => '显示在归档页、搜索、404页下面 ',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => '正文底部小工具',
		'id'            => 'sidebar-e',
		'description'   => '显示在正文底部',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><div class="s-icon"></div>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '页脚小工具',
		'id'            => 'sidebar-f',
		'description'   => '显示在页脚',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><div class="s-icon"></div>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '杂志单栏小工具',
		'id'            => 'cms-one',
		'description'   => '显示在首页CMS杂志布局',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '杂志两栏小工具',
		'id'            => 'cms-two',
		'description'   => '显示在首页CMS杂志布局',
		'before_widget' => '<div class="xl2"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside></div>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '公司主页“一栏”小工具A',
		'id'            => 'pany-one-a',
		'description'   => '显示在公司主页布局',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '公司主页“两栏”小工具A',
		'id'            => 'pany-two-a',
		'description'   => '显示在公司主页布局',
		'before_widget' => '<div class="xl2"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside></div>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '公司主页“一栏”小工具B',
		'id'            => 'pany-one-b',
		'description'   => '显示在公司主页布局',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '公司主页“两栏”小工具B',
		'id'            => 'pany-two-b',
		'description'   => '显示在公司主页布局',
		'before_widget' => '<div class="xl2"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside></div>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '公司主页“一栏”小工具C',
		'id'            => 'pany-one-c',
		'description'   => '显示在公司主页布局',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '公司主页“两栏”小工具C',
		'id'            => 'pany-two-c',
		'description'   => '显示在公司主页布局',
		'before_widget' => '<div class="xl2"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside></div>',
		'before_title'  => '<h3 class="widget-title"><i class="fa fa-bars"></i>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => '菜单页面',
		'id'            => 'all-cat',
		'description'   => '只适用于菜单页面模板，添加自定义菜单小工具',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

register_nav_menus(
   array(
      'primary' => '主要菜单',
      'header' => '顶部菜单',
      'mobile' => '移动端菜单'
   )
);

add_theme_support( 'custom-background' );
add_theme_support( 'post-formats', array(
	'aside', 'image', 'video', 'quote'
) );
require get_template_directory() . '/inc/function/use.php';
add_editor_style( '/css/editor-style.css' );
add_theme_support( 'automatic-feed-links' );
show_admin_bar(false);
function default_menu() {
	echo '<ul class="default-menu"><li><a href="'.home_url().'/wp-admin/nav-menus.php">设置菜单</a></li></ul>';
}
define( 'version', '2016.06.12' );

function zmingcx_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '2.0');
	if (zm_get_option('highlight')) {
		if ( is_singular() ) {
			wp_enqueue_style( 'highlight', get_template_directory_uri() . '/css/highlight.css', array(), version );
		}
	}
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.10.1', false );
		if (zm_get_option('slider')) {
			wp_enqueue_script( 'slides', get_template_directory_uri() . '/js/slides.js', array(), version, false );
		}
		if (zm_get_option('qr_img')) {
			wp_enqueue_script( 'jquery.qrcode.min', get_template_directory_uri() . '/js/jquery.qrcode.min.js', array(), version, false );
		}
		if (zm_get_option('wow_no')) {
			wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array(), '0.1.9', false );
		}
		wp_enqueue_script( 'jquery-ias', get_template_directory_uri() . '/js/jquery-ias.js', array(), '2.2.1', false );
		wp_enqueue_script( 'lazyload', get_template_directory_uri() . '/js/jquery.lazyload.js', array(), version, false );
		wp_enqueue_script( 'tipso', get_template_directory_uri() . '/js/tipso.js', array(), '1.0.1', false );
		wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), version, false );
		wp_register_script( 'flexisel', get_template_directory_uri() . '/js/flexisel.js', array(), version, false );
		wp_enqueue_script( 'flexisel' );
	if ( is_singular() ) {
		wp_localize_script( 'script', 'wpl_ajax_url', admin_url() . "admin-ajax.php");
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox.js', array(), version, false);
		if (zm_get_option('qt')) {
			wp_enqueue_script( 'comments-ajax-qt', get_template_directory_uri() . '/js/comments-ajax-qt.js', array(), version, false);
		} else {
        	wp_enqueue_script( 'comments-ajax', get_template_directory_uri() . '/js/comments-ajax.js', array(), version, false);
		}
	}
	// 加载回复js
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'zmingcx_scripts' );

// 页脚JS
function footerscript() {
	wp_register_script( 'superfish', get_template_directory_uri() . "/js/superfish.js", array(), version, true );
	if (zm_get_option('gb2')) {
		wp_register_script( 'gb2big5', get_template_directory_uri() . "/js/gb2big5.js", array(), version, true );
	}
	if ( !is_admin() ) {
		wp_enqueue_script( 'superfish' );
		wp_enqueue_script( 'gb2big5' );
	}
}
add_action( 'wp_enqueue_scripts', 'footerscript' );

// 禁止加载jquery
add_action( 'pre_get_posts', 'jquery_register' );
function jquery_register() {
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.10.1', false );
		wp_enqueue_script( 'jquery' );
	}
}

// 头部冗余代码
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

// 编辑器增强
function enable_more_buttons($buttons) {
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'wp_page';
	$buttons[] = 'anchor';
	$buttons[] = 'backcolor';
	return $buttons;
}
add_filter( "mce_buttons_2", "enable_more_buttons" );

// 禁止代码标点转换
remove_filter( 'the_content', 'wptexturize' );

if (zm_get_option('xmlrpc_no')) {
// 禁用xmlrpc
add_filter('xmlrpc_enabled', '__return_false');
}

// 禁止评论超链接
remove_filter('comment_text', 'make_clickable', 9);

// 链接管理
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

if (zm_get_option('wp_thumbnails')) {
// 特色图像
add_theme_support( 'post-thumbnails' );
add_image_size( 'content', 280, 210, true );
}

// 显示全部设置
function all_settings_link() {
    add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'all_settings_link');

// 屏蔽自带小工具
function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

// 禁止后台加载谷歌字体
function wp_remove_open_sans_from_wp_core() {
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );
	wp_enqueue_style('open-sans','');
}
add_action( 'init', 'wp_remove_open_sans_from_wp_core' );

// 禁用emoji
 function disable_emojis() {
 	remove_action( 'wp_print_styles', 'print_emoji_styles' );
 }
 add_action( 'init', 'disable_emojis' );

// 禁用oembed/rest
function disable_embeds_init() {
	global $wp;
	$wp->public_query_vars = array_diff( $wp->public_query_vars, array(
		'embed',
	) );
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	add_filter( 'embed_oembed_discover', '__return_false' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
	add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}

add_action( 'init', 'disable_embeds_init', 9999 );

remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

function disable_embeds_tiny_mce_plugin( $plugins ) {
	return array_diff( $plugins, array( 'wpembed' ) );
}
function disable_embeds_rewrites( $rules ) {
	foreach ( $rules as $rule => $rewrite ) {
		if ( false !== strpos( $rewrite, 'embed=true' ) ) {
			unset( $rules[ $rule ] );
		}
	}
	return $rules;
}
function disable_embeds_remove_rewrite_rules() {
	add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'disable_embeds_remove_rewrite_rules' );
function disable_embeds_flush_rewrite_rules() {
	remove_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'disable_embeds_flush_rewrite_rules' );

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

// 全部结束
?>
