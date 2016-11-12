</div>
<div id="footer" style="text-align: center;_margin-top:60px;*margin-top:60px;"><p>
<?php if(stripslashes(get_option('iphoto_copyright'))!=''){echo stripslashes(get_option('iphoto_copyright'));}else{echo 'Copyright &copy; '.date("Y").' '.'<a href="'.home_url( '/' ).'" title="'.esc_attr( get_bloginfo( 'name') ).'">'.esc_attr( get_bloginfo( 'name') ).'</a> All rights reserved';}?></p><p>Powered by <a href="http://wordpress.org/" title="Wordpress">WordPress <?php bloginfo('version');?></a>&#32;&#32;&#124;&#32;&#32;Written by <a href="http://www.lovedan.net" title="LoveDan">LoveDan</a> </p></div>
<!--<div id="scrollTop"><a href="#"><?php _e( 'Scroll to Top','iphoto');?></a></div>-->
<!--[if IE 6]><script src="<?php bloginfo('template_url');?>/js/jQuery.autoIMG.min.js"></script><![endif]-->
<?php if (get_option('iphoto_analytics')!="") {?>
<div id="iphotoAnalytics"><?php echo stripslashes(get_option('iphoto_analytics')); ?></div>
<?php }?>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/dh_packs_single.js"></script>
</body>
</html>