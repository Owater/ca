<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/unslider.min.js"></script>
		<div  class="banner has-dots" >
		 
			<ul>
			<?php $hot_posts = get_posts('numberposts=6&order=DESC&orderby=comment_count'); foreach( $hot_posts as $post ) :  ?> 
				<li>
				  <div class="inbannerleft">
				    <!--文章标题-->
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<!--时间-->
					<div class="time"><p><?php the_time('Y年n月j日') ?></p></div>
					<!--文章内容-->
					<div class="incontent"><p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 220,"...");?></p></div>
				  </div>
				  <div class="inbannerright">
				   <a href="<?php the_permalink(); ?>" class="readmore">
	                 <figure data-media="<?php echo catch_that_image() ?>" data-media440="<?php echo catch_that_image() ?>" data-media600="<?php echo catch_that_image() ?>"></figure></a>
				  </div>
				</li>
			<?php endforeach; ?>
			</ul>


		</div>

		<script>
			if(window.chrome) {
				$('.banner li').css('background-size', '100% 100%');
			}
			
			$('.banner').unslider({
				fluid: true,
				dots: true,
				speed: 500
			});

		</script>