<div id="sidebar">
	<div id="sidebar-inner" style="float:right;">
		<!--<div id="navigation" class="widget clearfix">
			<div class="prev">
			<?php if(get_next_post()) {next_post_link('%link'); } else { echo '<span class="disabled"></span>'; }; ?>
			</div>
			<div class="next">
			<?php if(get_previous_post()) {previous_post_link('%link');_e('下一页','iphoto');} else{ echo '<span class="disabled"></span>'; }; ?>
			</div>
		</div>-->
		<div id="popular" class="widget stationary">
			<ul class="xoxo">
				<li id="tag_cloud-2" class="widget-container widget_tag_cloud">
					<h3 class="widget-title">标签</h3>
					<div class="tagcloud"><?php wp_tag_cloud('smallest=10&largest=10&orderby=count&order=DESC&number=20'); ?></div>
				</li>

				<li id="text-18" class="widget-container widget_text">
					<h3 class="widget-title">关注我们	</h3>
					<div class="textwidget">
						<div class="subwidget">
							<a class="dh_social dh_social_sina" rel="nofollow" title="关注我的新浪微博" href="http://weibo.com/ddmfnet" target="_blank">关注我的新浪微博</a>
							<a class="dh_social dh_social_qzone" rel="nofollow" title="关注我的QQ空间" href="http://user.qzone.qq.com/9188900" target="_blank">关注我的QQ空间</a>
							<a class="dh_social dh_social_qq" rel="nofollow" title="关注我的腾讯微博" href="http://t.qq.com/ddmfylw" target="_blank">关注我的腾讯微博</a>
							<a class="dh_social dh_social_renren" rel="nofollow" title="关注我的人人公共主页" href="http://page.renren.com/231372751" target="_blank">关注我的人人公共主页</a>
							<a class="dh_social dh_social_t163" rel="nofollow" title="关注我的网易微博" href="http://t.163.com/lovedannet" target="_blank">关注我的网易微博</a>
							<a class="dh_social dh_social_twitter" rel="nofollow" title="关注我的Twitter"	href="http://twitter.com/#!/lovedan719" target="_blank">关注我的Twitter</a>
							<div style="clear: both;">
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
<div id="float" class="div1">
	<div class="argslist img-row">
    <h3 class="widget-title">今日热门</h3>
					<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'meta_key' => 'views',
					'orderby'   => 'meta_value_num',
					'paged' => $paged,
					'order' => DESC,
					'showposts' => 8
				);
				query_posts($args);
					while (have_posts()) : the_post();
					$output = preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $imgs); 
					$cnt = count($imgs);
					$video_pic = get_post_meta($post->ID, 'video_pic', true);
				?>
				<?php if ( $cnt > 0 ) {  ?>
				    <a class="img-l-block w65" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<div class="img-l-border h65 radius"></div>
					<img width="65" height="65" src="<?php bloginfo('template_url'); ?>/images/onepx.gif" data-original="<?php echo $imgs[1];?>" class="img-l-src wh65 radius wp-post-image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="display: block; ">
					<div class="img-l-title">
						<?php echo mb_strimwidth(the_title(),0,30,'...');?>
					</div>
				</a>
				<?php } elseif ( $video_pic ) {  ?>
				<a class="img-l-block w65" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<div class="img-l-border h65 radius"></div>
					<img width="65" height="65" src="<?php bloginfo('template_url'); ?>/images/onepx.gif" data-original="<?php echo $video_pic;?>" class="img-l-src wh65 radius wp-post-image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="display: block; ">
					<div class="img-l-title">
						<?php echo mb_strimwidth(the_title(),0,30,'...');?>
					</div>
				</a>
				<?php } else {  ?>
					<a class="img-l-block w65" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<div class="img-l-border h65 radius"></div>
					<img width="65" height="65" src="<?php bloginfo('template_url'); ?>/images/onepx.gif" data-original="<?php bloginfo('template_url'); ?>/images/default.png" class="img-l-src wh65 radius wp-post-image"	alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="display: block; ">
					<div class="img-l-title">
						<?php echo mb_strimwidth(the_title(),0,30,'...');?>
					</div>
				</a>
				<?php } ?>
				<?php endwhile; wp_reset_query(); ?>
	</div>
</div>
		<?php if (get_option('iphoto_Ap1')!="") {?>
			<div id="iphotoAp2" class="widget>
				<?php echo stripslashes(get_option('iphoto_Ap2')); ?>
			</div>
		<?php }?>
		<?php if ( !dynamic_sidebar('primary-widget-area') ) : ?>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
</div>