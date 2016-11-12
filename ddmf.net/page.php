<?php include('header_single.php'); ?>
<div id="main">
<style>#header .page-container, #wrapper.page-container {width:996px;}</style>
		<div id="single-content">
			<div id="post-home" class="clearfix">
				<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="post-header" class="clearfix">
					<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '48' ); }?>
					<div id="post-title">
						<h1><?php the_title_attribute(); ?></h1>
						<p>by <?php the_author_link(); ?> &#160;&#124;&#160;<?php the_time('M d, Y'); ?>&#160;&#124;&#160;in <?php the_category(', '); ?>&#160;&#124;&#160;<?php if(function_exists('the_views')) {$views = the_views(0);preg_match('/\d+/', $views, $match);echo '<span>'._e( 'Views',ddmf).' '.$match[0].'</span>';} ?>&#160;&#124;&#160;<?php _e( 'Comments',ddmf).' ';?><?php comments_popup_link('0', '1', '%'); ?></p>			 
					</div>
				</div>
				<div class="post-content">
					<?php the_content(''); ?>
					<?php if (get_option('ddmf_Ap1')!="") {?>
					<div id="ddmfAp1"><?php echo stripslashes(get_option('ddmf_Ap1')); ?></div>
					<?php }?>
				</div>
				<?php endwhile; endif; ?>
				<div id="share-bar" class="share-bar-wrap entry-utility share-section">
					<div id="nav-below" class="navigation dh_toolbar">
						<div class="nav-previous">
							<?php if(get_previous_post()) { previous_post_link('%link', '<span class="meta-nav-previous"></span>', TRUE); } else { echo ''; }; ?>
						</div>
						<div class="nav-next">
							<?php if(get_next_post()) { next_post_link('%link', '<span class="meta-nav-next"></span>', TRUE); } else { echo ''; }; ?>
						</div>
					</div>
					<span class="prompt left">转贴：</span>
					<a class="left" rel="nofollow" href="http://service.weibo.com/share/share.php?appkey=1290333080&amp;title=<?php the_title_attribute(); ?>&amp;pic=<?php post_thumbnail_src();?>&amp;url=<?php the_permalink(); ?>" title="新浪微博" target="_blank" data="s_<?php the_ID(); ?>"><span alt="新浪微博" class="shareico share_sina" ></span></a>
					<a class="left" rel="nofollow" href="http://v.t.qq.com/share/share.php?appkey=801185823&amp;title=<?php the_title_attribute(); ?>&amp;pic=<?php post_thumbnail_src();?>&amp;url=<?php the_permalink(); ?>" title="腾讯微博" target="_blank" data="s_<?php the_ID(); ?>" ><span alt="腾讯微博" class="shareico share_qq"></span></a>
					<a class="left" rel="nofollow" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php the_permalink(); ?>&amp;pics=<?php post_thumbnail_src();?>&amp;title=<?php the_title_attribute(); ?>&amp;summary=<?php the_title_attribute(); ?>"	title="QQ空间" target="_blank" data="s_<?php the_ID(); ?>"><span alt="QQ空间" class="shareico share_qzone"></span></a>
					<a class="left" rel="nofollow" href="http://share.renren.com/share/buttonshare.do?title=<?php the_title_attribute(); ?>&amp;link=<?php the_permalink(); ?>&amp;pic=<?php post_thumbnail_src();?>" title="人人网" target="_blank" data="s_<?php the_ID(); ?>"><span alt="人人网" class="shareico share_renren" ></span></a>
					<span class="s_stat"><span class="s_Cnt"><?php echo yundanran_get_post_share_count(get_the_ID());?></span></span>
			</div>
			<p id="nav_next"><span style="display: none;"><?php if(get_next_post()) { next_post_link('%link', '›', TRUE); } else { echo ''; }; ?></span></p>
			<p id="nav_prev"><span style="display: none;"><?php if(get_previous_post()) { previous_post_link('%link', '‹', TRUE); } else { echo ''; }; ?></span></p>
			<?php include(TEMPLATEPATH . '/includes/Subscribe.php');?>
			<?php include(TEMPLATEPATH . '/includes/related.php');?>
			<?php include(TEMPLATEPATH . '/includes/updated.php');?>
				<div id="comments">
					<?php comments_template('', true); ?>
				</div>
			</div>
		</div>
<?php get_sidebar(); ?>
</div>
<?php include('footer_single.php'); ?>