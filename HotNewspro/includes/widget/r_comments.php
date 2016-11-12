<h3>最新评论</h3>
<div class="r_comments">
	<ul>
		<?php
		$show_comments = 9;
		$my_email = get_bloginfo ('admin_email');
		$i = 1;
		$comments = get_comments('number=200&status=approve&type=comment');
		foreach ($comments as $hot_comment) {
			if ($hot_comment->comment_author_email != $my_email) {
				?>
				<li><a href="<?php echo get_permalink($hot_comment->comment_post_ID); ?>#comment-<?php echo $hot_comment->comment_ID; ?>"><?php echo get_avatar($hot_comment->comment_author_email,32); ?><b><span class="comment_author"><?php echo $hot_comment->comment_author; ?>:</span></b><br /><?php echo convert_smilies($hot_comment->comment_content); ?></a></li>
				<?php
				if ($i == $show_comments) break;
				$i++;
			}
		}
		?>
	</ul>
</div>
<div class="box-bottom">
	<i class="lb"></i>
	<i class="rb"></i>
</div>