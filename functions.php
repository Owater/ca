<?php
/** widgets */
if( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'First_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Second_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Third_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Fourth_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
    add_theme_support('post-thumbnails');//启动主题的特色图像功能
}


function curPageURL() {
	$pageURL = 'http://';

	$this_page = $_SERVER["REQUEST_URI"]; 
	if (strpos($this_page , "?") !== false) 
		$this_page = reset(explode("?", $this_page));

	$pageURL .= $_SERVER["SERVER_NAME"]  . $this_page;

	return $pageURL;
}

//获取图片
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){ //默认图片
    $first_img = bloginfo('template_url')."/images/default-thumb.jpg";
  }
  return $first_img;
}

function catch_that_image1() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  return $matches;
}

//获取文章特色图像
function get_post_thumbnail_url($post_id){
	$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
	$thumbnail_id = get_post_thumbnail_id($post_id);
	if($thumbnail_id ){
		$thumb = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
		return $thumb[0];
	}else{
		return bloginfo('template_url')."/images/default-thumb.jpg";
	}
}

//分页导航
function theme_echo_pagenavi(){ 
   global $request, $posts_per_page, $wpdb, $paged; 
   $maxButtonCount = 9; //显示的最多链接数目 
   if (!is_single()) { 
   if(!is_category()) { 
      preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches); 
   } else { 
      preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches); 
   } 
   $fromwhere = $matches[1]; 
   $numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere"); 
   $max_page = ceil($numposts /$posts_per_page); 
   if(empty($paged)) { 
      $paged = 1; 
   } 
   $start = max(1, $paged - intval($maxButtonCount/2)); 
   $end = min($start + $maxButtonCount - 1, $max_page); 
   $start = max(1, $end - $maxButtonCount + 1); 
   if($paged == 1){ 
     //echo "<span>首页</span>";
     echo "<ul class='pagination'><li class='disabled'><a href='#'>&laquo;</a></li>";
   }else{ 
     //echo '<a href="'.get_pagenum_link().'"><span>首页</span></a>';
     echo '<ul class="pagination"><li><a href="'.get_pagenum_link($paged-1).'">&laquo;</a></li>';
   } 
   for($i=$start; $i<=$end; $i++){
     if($i == $paged) {
        echo "<li class='active'><a href='#'>$i<span class='sr-only'>(current)</span></a></li>";
     } else {
        echo '<li><a href="'.get_pagenum_link($i).'"><span class="page_num">'.$i.'</span></a></li>'; 
     } 
   }
   if($paged == $max_page){
       echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
       //echo "<span>末页</span> "; 
   }else{
       echo '<li><a href="'.get_pagenum_link($paged+1).'">&raquo;</li></a>';
       //echo '<a href="'.get_pagenum_link($max_page).'"><span>末页</span></a>';
   }
       //echo "{$max_page}页.";
   }
}




//获取文章浏览次数
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


//评论
function aurelius_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">
        <!--访客标题-->
		<div class="visitor"> 
            <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
            <!--姓名-->
            <?php printf(__('<div class="author_name">%s</div>'), get_comment_author_link()); ?>
            <!--时间-->
            <div class="comment-time"> <?php echo get_comment_time('Y年m月d日 H:i'); ?></div>
        </div>
        <!--发表内容-->
		<div class="comment-content" id="comment-<?php comment_ID(); ?>">

					&nbsp;&nbsp;&nbsp;<?php edit_comment_link('修改'); ?>
            
			<div class="comment-text">
				<?php if ($comment->comment_approved == '0') : ?>
					<p><em>你的评论正在审核，稍后会显示出来！</em></p><br/>
      	<?php endif; ?>
      	<?php comment_text(); ?>
			</div>
		</div>
	</li>
<?php } ?>
