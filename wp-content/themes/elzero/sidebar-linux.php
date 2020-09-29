<?php
// Get Comments
$comments_args=array(
    'status' => 'approve' // Only Approved Comments
);
$comments_count=0; // Start From Zero
$all_comments = get_comments($comments_args); // Get All Comments
foreach($all_comments as $comment){ // Loop through All Comments
   $post_id = $comment->comment_post_ID; // Get Post ID of Comment
   if(! in_category('linux', $post_id)){ // Post Not Linux Category
   continue; // Continue Loop
   }
    $comments_count++; // Counter
}
// Get Category Posts count
$cat = get_queried_object(); // Get Full object Proprites
$posts_count=$cat->count; // Get Posts Count
/*
echo '<pre>';
print_r($cat);
echo '</pre>';
*/
?>
<div class="sidebar-linux">
    <div class="widget">
        <h3 class="widget-title"><?php single_cat_title() ?> Statistcs</h3>
            <div class="widget-content">
               <ul>
                   <li>
                       <span>Comments Count </span>: <?php echo $comments_count ?>
</li>
<li>
                       <span>Posts Count </span>:  <?php echo $posts_count ?>
</li>
</ul>
</div>
</div>
<div class="widget">
        <h3 class="widget-title">Latest PHP Posts</h3>
            <div class="widget-content">
               <ul>
                   <?php
                   $posts_args=array(
                       'posts_per_page' => 5,
                       'cat' => 19
                   );
                   $query = new WP_Query($posts_args);
                   if($query->have_posts()){
                           while($query->have_posts()){
                            $query->the_post();?>
                           <li>
                           <a target="_blank" href="<?php  the_permalink() ?>">
                           <?php the_title() ?>
                          </a>
                            </li>
                            <?php
                           }
                   }
                   ?>
</ul>
</div>
</div>
<div class="widget">
        <h3 class="widget-title">Hot Post By Comments</h3>
            <div class="widget-content">
            <ul>
                   <?php
                   $hotpost_args=array(
                       'posts_per_page' => 1,
                       'orderby' => 'comment_count'
                   );
                   $hotquery = new WP_Query($hotpost_args);
                   if($hotquery->have_posts()){
                           while($hotquery->have_posts()){
                            $hotquery->the_post();?>
                           <li>
                           <a target="_blank" href="<?php  the_permalink() ?>">
                           <?php the_title() ?>
                          </a>
                          <hr> This Post Has:
                            <?php comments_popup_link('0 Comments','One Comment','% Comments','comment-url','Comments Disabled') ?>
                            </li>
                           
                            <?php
                           }
                   }
                   ?>
</ul>
</div>
</div>
</div>