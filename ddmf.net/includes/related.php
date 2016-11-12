<div class="relatedposts">
<h3 class="content-title">您可能还喜欢...</h3>
<ol>
	<?php
	$post_num = 12; 
	global $post;
	$tmp_post = $post;
	$tags = ''; $i = 0;
	if ( get_the_tags( $post->ID ) ) {
	foreach ( get_the_tags( $post->ID ) as $tag ) $tags .= $tag->name . ',';
	$tags = strtr(rtrim($tags, ','), ' ', '-');
	$myposts = get_posts('numberposts='.$post_num.'&tag='.$tags.'&exclude='.$post->ID);
	foreach($myposts as $post) {
	setup_postdata($post);
	?>
	<a class="img-x-block w85" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<div class="img-l-border h85 radius"></div>
					<img width="85" height="85" src="<?php bloginfo('template_url'); ?>/images/onepx.gif" data-original="<?php post_thumbnail_src();?>" class="img-l-src wh85 radius wp-post-image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="display: block; ">
					<div class="img-l-title">
						<?php echo mb_strimwidth(the_title(),0,30,'...');?>
					</div>
				</a>
	<?php
	$i += 1;
	}
	}
	if ( $i < $post_num ) {
	$post = $tmp_post; setup_postdata($post);
	$cats = ''; $post_num -= $i;
	foreach ( get_the_category( $post->ID ) as $cat ) $cats .= $cat->cat_ID . ',';
	$cats = strtr(rtrim($cats, ','), ' ', '-');
	$myposts = get_posts('numberposts='.$post_num.'&offset='.$i.'&category='.$cats.'&exclude='.$post->ID);
	foreach($myposts as $post) {
	setup_postdata($post);
	?>
	<a class="img-x-block w85" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<div class="img-l-border h85 radius"></div>
					<img width="85" height="85" src="<?php bloginfo('template_url'); ?>/images/onepx.gif" data-original="<?php post_thumbnail_src();?>" class="img-l-src wh85 radius wp-post-image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="display: block; ">
					<div class="img-l-title">
						<?php echo mb_strimwidth(the_title(),0,30,'...');?>
					</div>
				</a>
	<?php
	}
	}
	$post = $tmp_post; setup_postdata($post);
	?>
</ol>
</div>