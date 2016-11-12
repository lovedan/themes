<?php get_header(); ?>
	<div id="loader" style="text-align: center;_margin:200px 0px;"><img src='<?php bloginfo('template_url'); ?>/images/loading.gif' alt='Loading...'>图片加载中</div>
	<div id="cate" data-type="<?php echo isset($_GET['order']) ? "meta" : "index";?>" data-name="<?php if(isset($_GET['order'])) echo $_GET['order'];?>"></div>
	<div id="container">
		<div id="post-tags" class="post-home clearfix">
			<?php //$tag_num = get_option('iphoto_tag');wp_tag_cloud('smallest=10&largest=10&orderby=count&order=DESC&number='.$tag_num); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'tag-cloud' ,'container_class' => 'catlist radius','menu_class' => 'menu','menu_id' => "menu-interaction",)); ?>
		</div>
		<?php if(have_posts()):
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$paged = $paged*4-3;
			$prePage = get_option('posts_per_page')/4;
			if(isset($_GET['order'])){
			//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'meta_key' => $_GET['order'],
					'orderby'   => 'meta_value_num',
					'showposts'=> $prePage,
					'paged' => $paged,
					'order' => DESC
				);
			}else{
				$args = array(
					'showposts'=>$prePage,
					'paged' => $paged
				);
			}
			query_posts($args);
			while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; endif; ?>
	</div>
	<div id="pagenavi" style="display:none;">
		<?php pagenavi();?>
	</div>
<?php get_footer(); ?>