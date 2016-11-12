	<?php 
	function get_comments($cid){
      global $wpdb;
      $comments = $wpdb->get_results("SELECT comment_author, comment_author_email, comment_author_url, comment_ID, comment_post_ID, SUBSTRING(comment_content,1,65) AS comment_excerpt 
      FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_post_ID = $cid AND  comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 2");
      $cnt = count($comments);
      if($cnt>0){
    ?>
	<div class="post-info-2 topbo">
	<a href="<?php comments_link(); ?>" class="views-comments" hidefocus="true">查看全部<?php comments_number('0','1','%');?>条评论&nbsp;&raquo;</a>
	</div>
	<?php }?>

	<?php foreach($comments as $comment){;?>
	<div class="post-info-1 topbo">
	<div class="content-author">
	<?php echo get_avatar($comment->comment_author_email,32);?>
	</div>
	<div class="content-reader">
	<a href="<?php echo $comment->comment_author_url;?>"><?php echo $comment->comment_author; ?></a>：
    <?php echo convert_smilies(strip_tags($comment->comment_excerpt));?>
	</div>
	</div>
	<?php }?>