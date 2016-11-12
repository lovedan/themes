<div id="post-<?php the_ID(); ?>" class="post-home video content-node post-<?php the_ID(); ?>">
	<div class="ts_post">
    <div class="ts_open ts_ie">
        <span class="ts_img ts_icon"></span>
        <span class="ts_img ts_text"></span>
        <span class="shareico share_sina" data="s_<?php the_ID(); ?>" alt="转帖到新浪微博"></span>
        <span class="shareico share_qq" data="s_<?php the_ID(); ?>" alt="转帖到腾讯微博"></span>
        <span class="shareico share_qzone" data="s_<?php the_ID(); ?>" alt="转帖到QQ空间"></span>
    </div>
</div>
	<div class="post-thumbnail">
<?php video_post_thumbnail();?>
	</div>
	<div class="exinfo marbot"><a href="<?php the_permalink(); ?>" target="_blank"><?php $the_content = apply_filters('the_content', $post->post_content); echo cutstr_html($the_content, 120 , '...'); ?></a></div>
	<div class="post-info">
		<div class="views"><?php if(function_exists('the_views')) {$views = the_views(0);preg_match('/\d+/', $views, $match);echo '<span>'.$match[0].'</span>';} ?></div>
		<div class="comments"><span><?php comments_popup_link('0', '1', '%'); ?></span></div>
		<?php if(function_exists('wizylike')) wizylike('button');  ?>
	</div>
		   <div id="comments" class="comment-container">
                                <ol class="commentlist">
									<?php 
									  $cid=get_the_ID();
									  global $wpdb;
									  $comments = $wpdb->get_results("SELECT comment_author, comment_author_email, comment_author_url, comment_ID, comment_post_ID, SUBSTRING(comment_content,1,65) AS comment_excerpt 
									  FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_post_ID = $cid AND  comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC");//LIMIT 3
									  $cnt = count($comments);
									  if($cnt>3){
									?>
                                    <li id="comments-number" class="comnav">
                                        <a rel="nofollow" target="_blank" href="<?php comments_link(); ?>" class="comments-all">浏览全部<?php comments_number('0','1','%');?>条评论&nbsp;» </a>
                                    </li>
									<?php }?>
									<?php $out=1; foreach($comments as $comment){if($out>3) break; else {?>
                                    <li class="comment even thread-even depth-1" id="li-comment-161355">
                                        <div id="comment-161355" class="comment-span">
                                            <div class="comment-author vcard">
                                                <?php echo get_avatar($comment->comment_author_email,32);?>
                                                <div class="comment-body">
                                                    <cite class="fn">
                                                        <a href="<?php echo $comment->comment_author_url;?>"><?php echo $comment->comment_author; ?></a>
                                                    </cite>
                                                    <span class="says">： </span>
                                                    <?php echo convert_smilies(strip_tags($comment->comment_excerpt));?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
									<?php $out++;}}?>
                                </ol>
                            </div>
           <div class="entry-utility share-section">
                                <a rel="nofollow" target="_blank" title="留下评论" href="<?php comments_link(); ?>">
                                    <span class="commentico comment_icon"> </span>
                                </a>
                                <span class="prompt left">转贴：</span>
                                <span alt="转帖到新浪微博" data="s_<?php the_ID(); ?>" class="shareico shareico_sina"></span>
                                <span alt="转帖到腾讯微博" data="s_<?php the_ID(); ?>" class="shareico shareico_qq"></span>
                                <span alt="转帖到QQ空间" data="s_<?php the_ID(); ?>" class="shareico shareico_qzone"></span>
                                <span class="s_stat"><span class="s_Cnt"><?php echo yundanran_get_post_share_count(get_the_ID());?></span></span>
                            </div>
</div>