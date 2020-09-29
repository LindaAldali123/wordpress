<?php
/* funcion for return header */
get_header(); ?>
<div class="container">
<div class="row category-information text-center">
  <div class="col-md-4">
<h1 class="category-title"><?php single_cat_title() ?></h1></div>
<div class="col-md-4"> <p class="category-description"><?php echo category_description() ?></p></div>
<div class="col-md-4"> 
    <div class="cat-stats">
          <span>Articles Counts:</span>,
          <span>Comments Counts:</span>
      </div>
      </div>
</div>
</div>
<div class="container home-page">
  <div class="row">
<?php
 if(have_posts()){ // Check If There's Posts
      while(have_posts()){ //Loop Through Posts
         the_post(); ?>
         <div class="col-sm-6">
       <div class="main-post">
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
           the_excerpt() //كلمة 55 تجلب مقتطف من النص 
           //the_content('Read More...') ?>
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
      </div>
           <?php
      } // End While Loop
 } // End If Condition  
 echo '<div class="clearfix"></div>';
 
 ?>
 </div>
 <div class="pagination-number">
<?php echo numbering_pagination(); ?>
</div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<br>
<br>
<?php get_footer(); ?>
