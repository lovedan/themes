<div class="time">
<?php if($_COOKIE["comment_author_" . COOKIEHASH]!=""): ?>
<?php printf(__('%s 欢迎回来. '), $_COOKIE["comment_author_" . COOKIEHASH]) ?>
<?php endif; ?>

<?php
	global $user_identity,$user_level;
	get_currentuserinfo();
	if ($user_identity) { ?>
	  您已经登录：<?php echo $user_identity; ?>
	  <?php wp_register('', ''); ?><a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" title="">   退出</a>
	<?php } ?>
</div>