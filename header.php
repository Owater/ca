<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ( is_home() ) {
		bloginfo('name'); echo " - "; bloginfo('description');
	} elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} elseif (is_search() ) {
		echo "搜索结果"; echo " - "; bloginfo('name');
	} elseif (is_404() ) {
		echo '页面未找到!';
	} else {
		wp_title('',true);
	} ?></title>
<!-- Stylesheets -->

<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo $feed; ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>


</head>

<body>

    <div class="nav">
		<div class="nav-content">
			<span class="title"><a href="index.php" id="title"></a><small>计协黑板报 - 关于</small></span>
			<span id="ca"><a href="http://ca.sise.com.cn">CA首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="index.php">返回</a></span>
		</div>				
	</div>