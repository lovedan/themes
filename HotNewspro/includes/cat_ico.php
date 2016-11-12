<div class="cat_ico">
	<a href="<?php echo get_category_root_link(get_article_category_ID()); ?>" title="<?php $catArray = get_the_category(); $cat=$catArray[array_rand($catArray,1)];  echo $cat->cat_name;?>">
	<img src="<?php bloginfo('template_url');?>/images/caticon/<?php echo get_category_root_ico(get_article_category_ID()); ?>.gif" />
	</a>
</div>