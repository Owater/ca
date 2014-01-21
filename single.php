<?php get_header(); ?>
<script type="text/javascript" src="http://static.oschina.net/js/syntax-highlighter-2.1.382/scripts/brush.js"></script>
<link type="text/css" rel="stylesheet" href="http://static.oschina.net/js/syntax-highlighter-2.1.382/styles/shCore.css"/>
<link type="text/css" rel="stylesheet" href="http://static.oschina.net/js/syntax-highlighter-2.1.382/styles/shThemeDefault.css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ca.css">

<script type="text/javascript">
    $(function(){
        $(".post-content p img").addClass("img-responsive");
        SyntaxHighlighter.all();
    });
</script>

<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<?php setPostViews(get_the_ID());?><!--统计文章浏览量-->
<div class="container content">
    <div class="row">
        <!--标题-->
        <h1 class="head"><?php the_title(); ?></h1>
        <!--时间、作者栏-->
        <h6>
            <?php the_time('Y-n-j') ?> 
            <span class="line"> / </span>
            <?php the_author(); ?>
        </h6>
        
        <!--文章内容-->
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        
        <!--评论-->
        <?php comments_template(); ?>
        
        
    </div>
</div>
<?php else : ?>
<div class="errorbox">
	没有文章！
</div>
<?php endif; ?>

<?php get_footer(); ?>