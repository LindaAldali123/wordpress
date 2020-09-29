<?php

    $comments_args = array(
        'status' => 'approve' // only approved comments
    );

    $comments_count = 0;   //start form zero

    $all_comments = get_comments($comments_args);  // Get all comments

    foreach($all_comments as $comment){

        
        $post_id = $comment->comment_post_ID; // get post id of comment

        if(! in_category( 'linux', $post_id )){ // check if post not in linux category
            continue; // continue loop
        }

        $comments_count++; // counter
    }

    // get category posts count 

    $cat = get_queried_object();  // get full object properties

    $posts_count = $cat->count;
    
    

?>




<div class="sidebar-linux">
    <div class="widget">
        <h3 class="widget-title"><?php single_cat_title() ?> statistics</h3>
        <div class="widget-content">
            <ul>
                <li>
                    <span>Comments Count</span> : <?php echo $comments_count;?>
                </li>
                <li>
                    <span>Articles Count</span> : <?php echo $posts_count;?>
                </li>
            </ul>
        </div>
    </div><!-- widget -->
    <div class="widget">
        <h3 class="widget-title">Latest php posts</h3>
        <div class="widget-content">
            <ul>
                <?php 
                    $posts_args = array(
                        'posts_per_page' => 5, // number of posts to show
                        'cat'            =>3  // for tag_id  learn linux
                    );

                    $query = new WP_Query($posts_args );

                    if($query->have_posts()){
                        while($query->have_posts()){
                            $query->the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            </li>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </div><!-- widget -->
    <div class="widget">
        <h3 class="widget-title">Hot post by commet</h3>
        <div class="widget-content">
            <ul>
                <?php 
                    $Hotposts_args = array(
                        'posts_per_page' => 1,
                        'orderby'        =>'comment_count' //ordered by number of comments
                    );

                    $Hotquery = new WP_Query($Hotposts_args );

                    if($Hotquery->have_posts()){
                        while($Hotquery->have_posts()){
                            $Hotquery->the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                <hr>
                                <?php comments_popup_link( 'zero', 'one', '% comments' );?>
                            </li>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </div><!-- widget -->
</div><!-- sidebar-linux -->