<div class="updated">
<h3 class="content-title">刚刚更新</h3>
<div class="single_l_area">
	<?php
	$post_num = 8; 
	global $post;
	$tmp_post = $post;
	$myposts = get_posts('numberposts='.$post_num);
	foreach($myposts as $post) {
	setup_postdata($post);
	?>
	<a class="img-g-block w75" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<div class="img-l-border h75 radius"></div>
					<img width="75" height="75" src="<?php bloginfo('template_url'); ?>/images/onepx.gif" data-original="<?php post_thumbnail_src();?>" class="img-l-src wh75 radius wp-post-image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="display: block; ">
					<div class="img-l-title">
						<?php echo mb_strimwidth(the_title(),0,30,'...');?>
					</div>
				</a>
	<?php
	}
	$post = $tmp_post; setup_postdata($post);
	?>
</div>
<div class="single_r_area ld_bg radius">250*250广告位</div>
</div>