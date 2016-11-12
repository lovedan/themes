<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php include('includes/seo.php'); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style_single.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/danstyle_single.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/tougao.css" type="text/css" media="screen" />
<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style-ie9.css?ver=1.0.0"> <script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script> <![endif]-->
<link rel="shortcut icon" href="<?php bloginfo('url');?>/favicon.ico" type="image/x-icon" />
<?php if(get_option('iphoto_lib')!="") : ?>
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.4.4/jquery.min.js"></script>
<?php else : ?>	
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/xheditor/xheditor-1.1.14-zh-cn.min.js"></script>
<!--[if lte IE 6]> <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG-min.js" mce_src=”<?php bloginfo('template_url'); ?>/js/DD_belatedPNG-min.js”></script> <script type="text/javascript">DD_belatedPNG.fix('.header_logo,.#s,.shareico,.sub_icon, .nav-cat,ul.menu li:hover,.ts_img,.ts_ie,.current-menu-item a,.sub-menu li,.cat_icon, .share-section, .commentico, .dh_social, .dh_toolbar .nav-previous, .dh_toolbar .nav-next, .dh_toolbar .meta-nav-previous, .dh_toolbar .meta-nav-next,.comment_social,.s_stat,.s_Cnt, .arrowdown, .xlong, a.video_play img, .xlong img, .actions img,#nextpage a.nextmore, .sitemap_icon, .vote_icon,#site-generator a,a.post-button,#pagenavi');</script> <![endif]-->
<!--[if IE]><script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/comments-ajax-ie.js"></script><![endif]-->
<!--[if !IE]><!--><script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/comments-ajax.js"></script><!--<![endif]-->
<?php if(get_option('iphoto_phzoom')=="") : ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/phzoom.js"></script>
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body>
<div id="header">
    <div class="header-background">
        <div class="header-container page-container">
            <span class="user_logged">
                <?php wp_loginout(); ?>
                <span class="textline"> | </span>
                <?php wp_register('', ''); ?><a href="<?php bloginfo('url')?>/wp-login.php?action=register" target="_blank" >注册</a>
            </span>
            <div class="header-search">
                <form action="<?php bloginfo('url'); ?>/" id="navsearchform" method="get">
                    <input type="text" onblur="if (this.value == '') {this.value = '搜索好玩的... ';}" onfocus="if (this.value == '搜索好玩的... ')  {this.value = '';}" name="s" value="<?php echo wp_specialchars($s, 1); ?>"class="search-text radius" id="s">
					<!-- <input type="text" x-webkit-speech /> 在谷歌浏览器里增加一个语音搜索的功能-->
                </form>
            </div>
            <span id="openwb_1">
                <iframe width="126" scrolling="no" height="24" frameborder="0" src="http://widget.weibo.com/relationship/followbutton.php?language=zh_cn&amp;width=136&amp;height=24&amp;uid=1704598487&amp;style=2&amp;btn=red&amp;dpc=1"
                border="0" marginheight="0" marginwidth="0" allowtransparency="true" style="background:#F9F9FA">
                </iframe>
            </span>
            <a href="<?php bloginfo('url'); ?>" class="header_logo"><?php bloginfo('name'); ?></a>
            <div class="left">
                <div role="navigation" id="access">
                    <div class="skip-link screen-reader-text">
                        <a title="跳至正文" href="#content">
                            跳至正文
                        </a>
                    </div>
					<?php wp_nav_menu( array( 'theme_location' => 'about' ,'container_class' => 'menu-header','menu_class' => 'menu','menu_id' => "menu-danhuaer",'walker' => new header_walker(),) ); ?> 
                </div>
            </div>
        </div>
        <div class="sub-show" style="display: none;">
            <?php wp_nav_menu( array( 'theme_location' => 'hide-menu' ,'container' => '','container_class' => 'sub-show','menu_class' => 'menu','menu_id' => "menu-sub-icon",'link_before' => '','link_after' => '</span>','walker' => new sheader_walker(), )); ?> 
        </div>
    </div>
</div>
	<div id="wrapper" class="clearfix hfeed page-container">
	<div id="masthead">
                <div id="top_icon">
                    <div class="danhuaer_icon" style="">
                        <div class="nav-cat">
							<?php wp_nav_menu( array( 'theme_location' => 'hide-menu' ,'container_class' => 'nav-show','menu_class' => 'menu','menu_id' => "menu-nav-cat",'link_before' => '<h2>','link_after' => '</h2>','walker' => new cheader_walker(), )); ?> 
                        </div>
                    </div>
                </div>
            </div>