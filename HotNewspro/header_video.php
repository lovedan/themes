<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php include('includes/seo.php'); ?>
<title><?php setTitle(); ?> | <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/css.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/video.css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/lazyload.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/mousewheel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox-video.js"></script>
<!--[if lt IE 7]>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/pngfix.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ie6.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">
	<div id="top">
		<div id='topnav'>
			<div class="left_top ">
				<div class="home_h"><a href="<?php echo bloginfo('url'); ?>" title="首  页" class="home_h"></a></div>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?> 
			</div>
			<!-- end: left_top --> 
			<div id="searchbar">
				<?php if (get_option('swt_search') == 'google') { ?>
				<?php include('includes/g_search.php'); ?>
				<?php } else { include(TEMPLATEPATH . '/includes/w_search.php'); } ?>
			</div>
			<!-- end: searchbar -->
		</div>
		<!-- end: topnav -->
	</div>
	<!-- end: top -->
	<div id="header">
		<div class="header_c">
			<div class="login_t"><?php include('includes/login.php'); ?></div>
			<?php include('includes/time.php'); ?>
			<?php if (get_option('swt_logo') == '关闭') { ?>
			<h1 class="site_title"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
			<h2 class="site_description"><?php bloginfo('description'); ?></h2>
			<?php { echo ''; } ?>
			<?php } else { include(TEMPLATEPATH . '/includes/logo.php'); } ?>
		</div>
		<div class="clear"></div>
		<!-- end: header_c -->
	</div>
	<!-- scroll -->
	<?php include('includes/scroll.php'); ?>