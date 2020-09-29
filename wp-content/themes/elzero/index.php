<?php
/* funcion for return header */
get_header(); ?>
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
 /*
 echo '<div class="post-pagination">';
 if(get_previous_posts_link()){
    previous_posts_link('<i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i>Prev');
 }else{
 echo '<span class="previous-span">Prev</span>';
 }
if(get_next_posts_link()){
next_posts_link('Next<i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i>');
}else{
    echo '<span class="next-span">Next</span>';
}
echo '</div>';
*/

 ?>
 </div>
 <div class="pagination-number">
<?php echo numbering_pagination(); ?>
</div>
</div>
<!--
<div class="container">
  <div class="row">
    <div class="col-sm-6">
       <div class="main-post">
       <h3 class="post-title">This Is Our Main Post Title</h3>
       <span class="post-author"><i class="fa fa-user fa-fw "></i>Linda, </span>
       <span class="post-date"><i class="fa fa-calendar fa-fw "></i>06/03/2020, </span>
       <span class="post-comments"><i class="fa fa-comments-o fa-fw "></i>20 comments</span>
       <img class="img-responsive img-thumbnail" src="http://localhost/wordpress/wp-content/themes/elzero/img/l.jpg" alt="" />
       <p class="post-content">Hello Ilearn programming languages and I love software so much and I'am studing web and design web in professional
           I'am Software Engineer and Ilive in hims in Syria.
       </p>
       <hr>
       <p class="categories">
           <i class="fa fa-tags fa-fw"></i>
           html , Test , Testing , Coding</p>
</div>
</div>
<div class="col-sm-6">
<div class="main-post">
<h3 class="post-title">This Is Our Main Post Title</h3>
<span class="post-author"><i class="fa fa-user fa-fw "></i>Linda, </span>
<span class="post-date"><i class="fa fa-calendar fa-fw "></i>06/03/2020, </span>
<span class="post-comments"><i class="fa fa-comments-o fa-fw "></i>20 comments</span>
<img class="img-responsive img-thumbnail" src="http://localhost/wordpress/wp-content/themes/elzero/img/l.jpg" alt="" />
<p class="post-content">Hello Ilearn programming languages and I love software so much and I'am studing web and design web in professional
    I'am Software Engineer and Ilive in hims in Syria.
</p>
<hr>
<p class="categories">
    <i class="fa fa-tags fa-fw"></i>
    html , Test , Testing , Coding</p>
</div>
</div>
<div class="col-sm-6">
<div class="main-post">
<h3 class="post-title">This Is Our Main Post Title</h3>
<span class="post-author"><i class="fa fa-user fa-fw "></i>Linda, </span>
<span class="post-date"><i class="fa fa-calendar fa-fw "></i>06/03/2020, </span>
<span class="post-comments"><i class="fa fa-comments-o fa-fw "></i>20 comments</span>
<img class="img-responsive img-thumbnail" src="http://localhost/wordpress/wp-content/themes/elzero/img/l.jpg" alt="" />
<p class="post-content">Hello Ilearn programming languages and I love software so much and I'am studing web and design web in professional
    I'am Software Engineer and Ilive in hims in Syria.
</p>
<hr>
<p class="categories">
    <i class="fa fa-tags fa-fw"></i>
    html , Test , Testing , Coding</p>
</div>
</div>
<div class="col-sm-6">
<div class="main-post">
<h3 class="post-title">This Is Our Main Post Title</h3>
<span class="post-author"><i class="fa fa-user fa-fw "></i>Linda, </span>
<span class="post-date"><i class="fa fa-calendar fa-fw "></i>06/03/2020, </span>
<span class="post-comments"><i class="fa fa-comments-o fa-fw "></i>20 comments</span>
<img class="img-responsive img-thumbnail" src="http://localhost/wordpress/wp-content/themes/elzero/img/l.jpg" alt="" />
<p class="post-content">Hello Ilearn programming languages and I love software so much and I'am studing web and design web in professional
    I'am Software Engineer and Ilive in hims in Syria.
</p>
<hr>
<p class="categories">
    <i class="fa fa-tags fa-fw"></i>
    html , Test , Testing , Coding</p>
</div>
</div>
</div>
</div>   -->
<?php get_footer(); ?>
