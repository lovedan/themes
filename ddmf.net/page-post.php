<?php
/*
Template Name: 投稿
*/
?>
<?php ob_start();
		//投稿
		if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send')
		{
		if ( isset($_COOKIE["tougao"]) && ( time() - $_COOKIE["tougao"] ) < 120 )
		{
		wp_die('您投稿也太勤快了吧，先歇会儿,2分钟后再来投稿吧！');
		}
		// 表单变量初始化
		$name = trim($_POST['tougao_authorname']);
		$email = trim($_POST['tougao_authoremail']);
		$site = trim($_POST['tougao_site']);
		$title = strip_tags(trim($_POST['tougao_title']));
		$category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
		$content =  $_POST['tougao_content'];
		$tags =    strip_tags(trim($_POST['tougao_tags']));
		if(!empty($site)){
		if(substr($site, 0, 7) != 'http://') $site= 'http://'.$site;
		$author=''.$site.'';
		}else{
		$author=$site;
		}
		$info='感谢: '.$name.'&nbsp;&nbsp;'.'投稿'.'&nbsp;&nbsp;';
		$post_link='文章来源: '.$author."\n\n";
		 
		global $wpdb;
		$db="SELECT post_title FROM $wpdb->posts WHERE post_title = '$title' LIMIT 1";
		if ($wpdb->get_var($db)){
		wp_die('发现重复文章.你已经发表过了.或者存在该文章 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		// 表单项数据验证
		if ( !is_user_logged_in() ){
		if ($name == '')
		{
		wp_die('昵称必须填写，且长度不得超过20个字 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif(mb_strlen($name,'UTF-8') > 20 )
		{
		wp_die('你的名字怎么这么长啊，起个简单易记的吧，长度不要超过20个字哟! <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif ($email ==''|| !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
		{
		wp_die('Email必须填写，必须符合Email格式 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif ($site == '')
		{
		wp_die('请留下贵站名称，要不怎么宣传呀，这点很重要哦！ <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif ($site == '')
		{
		wp_die('请填写原文链接，好让其他人浏览你的网站，这是最重要的宣传方式哦！ <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		}
		if($title == '')
		{
		wp_die('文章标题必须填写，长度6到50个字之间 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif(mb_strlen($title,'UTF-8') > 50 )
		{
		wp_die('文章标题太长了，长度不得超过50个字 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif(mb_strlen($title,'UTF-8') < 6 )
		{
		wp_die('文章标题太短了，长度不得少于过6个字 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif ($content == '')
		{
		wp_die('内容必须填写，不要太长也不要太短,100到10000个字之间 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif (mb_strlen($content,'UTF-8') >10000)
		{
		wp_die('你也太能写了吧，写这么多，别人看着也累呀，100到10000个字之间 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif (mb_strlen($content,'UTF-8') < 100)
		{
		wp_die('太简单了吧，才写这么点，再加点内容吧，100到10000个字之间 <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif ($tags == '')
		{
		wp_die('不要这么懒吗，加个标签好人别人搜到你的文章，长度在2到20个字！ <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif (mb_strlen($tags,'UTF-8') < 2)
		{
		wp_die('不要这么懒吗，加个标签好人别人搜到你的文章，长度在2到20个字！ <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		elseif (mb_strlen($tags,'UTF-8') > 40)
		{
		wp_die('标签不用太长，长度在2到40个字就可以了！ <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		else{
		!is_user_logged_in()?$post_content = $info.$post_link.'<br />'.$content:$post_content = $content;
		 
		$tougao = array(
		'post_title' => $title,
		'post_content' => $post_content,
		'tags_input'    =>$tags,
		'post_status' => 'pending', //publish
		'post_category' => array($category)
		);
		// 将文章插入数据库
		$status = wp_insert_post( $tougao );
		if ($status != 0)
		{
				/*
				//将自定义域写入最新待审文章
				global $wpdb;
				$myposts = $wpdb->get_results("
					SELECT ID
					FROM $wpdb->posts
					WHERE post_status = 'pending'
					AND post_type = 'post'
					ORDER BY post_date DESC
				");
				add_post_meta($myposts[0]->ID, 'cbs_postauthor', $name);    //插入投稿人昵称的自定义域
				if ( !empty($blog)) add_post_meta($myposts[0]->ID, 'cbs_posturl', $blog);    //插入投稿人网址的自定义域
			*/
		setcookie("tougao", time(), time()+180);
		echo ('<div style="text-align:center;">'.'<title>'.'WordPress UED'.'</title>'.'</div>');
		echo ('<div style="text-align:center;">'.'<meta http-equiv="refresh" content="3;URL=http://www.ddmf.net">'.'</div>');
		echo ('<div style="position:relative;font-size:14px;margin-top:100px;text-align:center;">'.'投稿成功，感谢投稿，3秒钟后将返回蛋蛋魔法网首页！'.'</div>');
		echo ('<div style="position:relative;font-size:16px;margin-top:30px;text-align:center;">'.'<a href="/" >'.'立即返回蛋蛋魔法网首页'.'</a>'.'</div>');
		die();
		/* wp_die('投稿成功！ <SCRIPT language=javascript> function go(){window.location.href="http://www.ddmf.net";} setTimeout("go()",1000);</SCRIPT>'); */
		}
		else
		{
		wp_die('投稿失败！ <SCRIPT language=javascript> function go(){window.history.go(-1);} setTimeout("go()",1000);</SCRIPT>');
		}
		}
		}
?>
<?php include('header_post.php'); ?>
<div id="main">
		<div id="single-content">
			<div id="post-home" class="clearfix">
				<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-header" class="clearfix">

			</div>
				<div class="post-content">
					<?php the_content(''); ?>
					<?php if ( is_user_logged_in() ) : ?>
					<div id="new-info">
					<?php global $current_user;get_currentuserinfo();echo get_avatar( $current_user->user_email,64); ?>
					<p><?php echo $user_identity; ?> <?php _e('welcome back.','ddmf'); ?></p>
					<p> <?php _e('You can post you\'r images here.','ddmf'); ?></p>
					<div class="clear"></div>
					</div>
					<?php endif; ?>
					<form id="tougaoform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
					<?php if ( !is_user_logged_in() ) : ?>
					<p><input id="author" type="text" size="40" value="" name="tougao_authorname" /><label>昵称（*必填）</label></p>
					<p><input id="email" type="text" size="40" value="" name="tougao_authoremail" /><label>邮箱（*必填）</label></p>
					<p><input id="url" type="text" size="40" value="" name="tougao_site" /><label>您的博客/文章来源</label></p>
					<?php endif; ?>
					<p><input id="tougao_title" type="text" size="40" value="" name="tougao_title" /><label>文章标题（*必填）</label></p>
					<p><input id="tags" type="text" size="40" value="" name="tougao_tags" /><label>文章标签（多个标签请用英文逗号 , 分开）</label></p>
					<p><?php wp_dropdown_categories('show_option_none=请选择文章分类&show_count=1&hierarchical=1&hide_empty=0'); ?><label>文章分类（*必填）</label></p>
					<textarea id="tougao" name="tougao_content" rows="15" cols="55" class="xheditor-mfull {height:'380',urlType:'abs',<?php if ( is_user_logged_in() ) : ?>upImgUrl:'<?php bloginfo('template_url'); ?>/xheditor/upload.php?immediate=1',<?php endif; ?>upImgExt:'jpg,jpeg,gif,png'}" style="width:100%"></textarea>
					<p>
					<input type="hidden" value="send" name="tougao_form" />
					<input id="submit" type="submit" value="提交" />
					<input id="reset" type="reset" value="重填" />
					</p>
					</form>
					<?php if (get_option('ddmf_Ap1')!="") {?>
					<div id="iphotoAp1"><?php echo stripslashes(get_option('ddmf_Ap1')); ?></div>
					<?php }?>
				</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
<?php get_sidebar(); ?>
</div>
<?php include('footer_post.php'); ?>