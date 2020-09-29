<?php
/* funcion for return header */
get_header();
include(get_template_directory() . '/includes/breadcrumb.php');
 ?>

<div class="container post-page">
 
<?php
 if(have_posts()){ // Check If There's Posts
      while(have_posts()){ //Loop Through Posts
         the_post(); ?>
        
       <div class="main-post single-post">
           <?php edit_post_link('Edit <i class="fa fa-pencil"></i>') ?>
       <h3 class="post-title">
           <a href="<?php the_permalink() ?>">
               <?php the_title() ?>
      </a>
      </h3>
      <span class="post-author">
          <i class="fa fa-user fa-fw "></i>
          <?php the_author_posts_link() ?>,
         </span>
       <span class="post-date">
           <i class="fa fa-calendar fa-fw "></i>
         <?php 
         the_time('F j ,Y')// الوقت  
        // the_date() التاريخ 
        ?>, 
        </span>
        <span class="post-comments">
            <i class="fa fa-comments-o fa-fw "></i>
            <?php comments_popup_link('0 Comments','One Comment','% Comments','comment-url','Comments Disabled') ?>
        </span>
        <?php the_post_thumbnail('',['class' => 'img-responsive img-thumbnail ','title'=>'Post Image']) ?>
       <div class="post-content">
           <?php 
           //the_excerpt() //كلمة 55 تجلب مقتطف من النص 
           the_content() ?>
           <!--<a href=" <?php // echo get_permalink(); ?>">Read More..</a> -->
      </div>
        <hr>
       <p class="post-categories">
           <i class="fa fa-tags fa-fw"></i>
          <?php the_category(',') ?>
        </p> 
        <p class="post-tags">
        <?php
        if(has_tag()){
            the_tags();
        }else{
            echo 'Tags: There\'s No tags';
        }
          ?> 
      </p> 
      
      </div>
      <div class="dol">Random Posts From The Same Categries</div>
      <hr>
           <?php
      } // End While Loop
 } // End If Condition  
 echo '<div class="clearfix"></div>';
 // Get Post Id
 global $post;
 //echo $post->ID .'<br>'; get_queried_object_id();
 //print_r(wp_get_post_categories(get_queried_object_id()));
$random_posts_arguments=array(
   'posts_per_page' => 5,
   'orderby' => 'rand',
   'category__in' => wp_get_post_categories(get_queried_object_id()),
   'post__not_in'  => array(get_queried_object_id())
);
$random_posts= new WP_Query($random_posts_arguments);
if($random_posts->have_posts()){ // Check If There's Posts
    while($random_posts->have_posts()){ //Loop Through Posts
        $random_posts->the_post(); ?>
     <div class="author-posts">
     <h3 class="post-title">
         <a href="<?php the_permalink() ?>">
             <?php the_title() ?>
    </a>
    </h3>
    <hr>
    </div>
         <?php
    } // End While Loop
} // End If Condition  
 wp_reset_postdata(); //Reser Loop query
 ?>
 <!-- WP_Query -->
 <div class="row">
     <div class="col-md-2">
 <?php
 $avatar_arguments=array( // Avatar Arguments
     'class' => 'img-responsive img-thumbnail center-block'
 );
  echo get_avatar(get_the_author_meta('ID'),128,'','User Avatar',$avatar_arguments) 
  ?>
  </div>
  <div class="col-md-10 author-info">
 <h4>
 <?php the_author_meta('first_name'); ?>
     <?php the_author_meta('last_name') ?>
     (<span class="nickname"><?php the_author_meta('nickname') ?></span>)
</h4>
<?php
 //echo get_the_author_meta('ID');
if(get_the_author_meta('description')){?><p>
    <?php the_author_meta('description') ?>
<?php }else{
    echo 'Theres No Piography';
}
?>
</div>
<hr>
<p class="author-stats">
    User Posts Count:<span class="posts-count"><?php echo count_user_posts(get_the_author_meta('ID')) ?></span>,
    User Profile Link:<?php the_author_posts_link() ?>
</p>
</div>

<?php
 echo '<hr class="comment-separator">';
 echo '<div class="post-pagination">';
 if(get_previous_post_link()){
    previous_post_link('%link','<i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i>  %title');
 }else{
 echo '<span class="previous-span">Previos Articel : None</span>';
 }
if(get_next_post_link()){
next_post_link('%link','%title <i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i>');
}else{
    echo '<span class="next-span">Next Articel : None</span>';
}
echo '</div>';
echo '<div class="clearfix"></div>';
echo '<hr class="comment-separator">';
comments_template();
 ?>
 
</div>
<!--

<?php get_footer(); ?>
