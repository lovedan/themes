<?php if ( get_post_meta($post->ID, 'thumbnail', true) ) : ?>
<div class="thumbnail_t">
	<?php $image = get_post_meta($post->ID, 'thumbnail', true); ?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php echo $image; ?>" alt="<?php the_title(); ?>"/>
	<div class="mask-img"></div></a>
</div>
<?php else: ?>
<!-- 截图 -->
<div class="thumbnail">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
	<?php if (has_post_thumbnail()) { the_post_thumbnail('thumbnail', array('alt' => get_the_title()));
	} else { ?>
	<img class="home-thumb" src="<?php echo catch_first_image() ?>" width="140px" height="140px" alt="<?php the_title(); ?>"/>
	<?php } ?><div class="mask-img"></div></a>
</div>
<?php endif; ?>