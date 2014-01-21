<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ca.css">

<script type="text/javascript">
        $(function(){
            
            //控制div浮现
            $(".thumbnail").hover(function(){
              $(this).find(".updiv-inner").stop().animate({height:"80px"});
              $(this).find(".readmore").css("visibility","visible");
            },function(){
              $(this).find(".updiv-inner").stop().animate({height:"30px"},300);
              $(this).find(".readmore").css("visibility","hidden");
            });
            
        });
</script>




<!-- cacontainer -->
<div class="container projects">
    
    <!--行-->
    <div class="row">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail(); ?>
                <?php } else {?>
                <img src="<?php bloginfo('template_url'); ?>/images/default-thumb.jpg" />
                <?php } ?>
                <div class="updiv">
                    <div class="updiv-inner">
                        <!-- 标题 -->
                        <h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                        <!--文章内容-->
                        <div class="updiv-content"><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 150,"...");?></div>
                    </div>
                </div>
                <!--评论次数等-->
                <div class="counts">
                    <!--获取文章评论次数-->
                    <a><?php $id=$post->ID; echo get_post($id)->comment_count;?> 评论</a>&nbsp;&nbsp;&nbsp;
                    <a><?php echo getPostViews(get_the_ID()); ?> 次</a>
                    <!--readmore-->
                    <div class="readmore"><a href="<?php the_permalink(); ?>" rel="bookmark">READ MORE</a></div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        
        <?php else : ?>
        <h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
        <p>没有找到任何文章！</p>
        <?php endif; ?>
    </div>
    
    <div class="spepage">
      <?php theme_echo_pagenavi(); ?>
    </div>
</div>
<!-- #end cacontainer -->

<?php get_footer(); ?>