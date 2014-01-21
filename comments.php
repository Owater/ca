<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>

<!-- 评 论 -->
<div class="panel panel-primary re-panel-primary">
    <div class="panel-heading re-panel-heading"><h3>/ 评论</h3></div>
    <div class="panel-body">
        <section>
            <!--评论内容-->
            <ol>
                <?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { ?>
                <li class="decmt-box">
                    <p><a href="#addcomment">请输入密码再查看评论内容.</a></p>
                </li>
                
                <?php } else if ( !comments_open() ) { ?>
                <li class="decmt-box">
                    <p><a href="#addcomment">评论功能已经关闭!</a></p>
                </li>
                <?php } else if ( !have_comments() ) { ?>
                <li class="decmt-box">
                    <p><a href="#addcomment">还没有任何评论，你来说两句吧</a></p>
                </li>
                <?php 
                   } else { wp_list_comments('type=comment&callback=aurelius_comment'); }
                ?>
            </ol>
            <?php
             if ( !comments_open() ) : elseif ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <p>你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
            <?php else  : ?>
        </section>
    </div>
</div>

<!-- 评论表单 -->
<div class="comment-panel">
<form class="form-horizontal" role="form" id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    

    <h3><span class="line">/</span>发表评论</h3>
    
        <?php if ( !is_user_logged_in() ) : ?>
            
          <div class="form-group">
            <div class="col-sm-8">
            <input type="text" class="form-control" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="昵称"/>
            </div>
          </div>
        
          <div class="form-group">
            <div class="col-sm-8">
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="电子邮件"/>
            </div>
          </div>
            
        <?php else : ?>
        <div class="clearfix">您已登录:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出 &raquo;</a></div>
            
        <?php endif; ?>
          <div class="form-group">
            <div class="col-sm-10">
            <label for="message" class="col-sm-2 control-label"></label>
            <textarea class="form-control" rows="5" id="message comment" name="comment" tabindex="4" placeholder="评论内容"></textarea>
            </div>
          </div>
            
        <div class="form-group">
            <div class="col-sm-10">
            <!-- Add Comment Button -->
            <a href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()"><button type="button" class="btn btn-primary btn-lg btn-block btn-sm">发表评论</button></a>
            </div>
        </div>
    
            
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>

</form>
</div>
<?php endif; ?>