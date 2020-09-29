<?php get_header() ?>


<div class="userInfo bg-light p-4">
    <div class="container">
    <div class="author-main-info">
    <h2 class="text-center">
        <?php
            the_author_meta('first_name'); 
            echo " ";
            the_author_meta('last_name');
            echo " page";
        ?>
    </h2>
    <div class="row">
        <div class="col-md-2">
            <?php
                $args = array(
                    'class' => 'img-fluid img-thumbnail d-block m-auto'
                );
                echo get_avatar(get_the_author_meta('ID'), 200, '','User Avatar', $args);
            ?>
        </div>

        <div class="col-md-10">
            <h3 class="text-info">
            <?php
                the_author_meta('first_name'); 
                echo " ";
                the_author_meta('last_name');
            ?>
            </h3>
            <?php
            if(get_the_author_meta('description')){
                echo '<p class="lead">';
                    the_author_meta('description');  // or echo get_the_author_meta('description')
                echo '</p>';
            }else{
                echo "there is no Biography";
            }
            ?>
        </div>
    </div><!-- row -->
    </div><!-- author-main-info -->
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="status lead d-flex flex-column align-items-center bg-primary text-white p-3">
                posts count <span class="posts-count display-4"><?php echo count_user_posts(get_the_author_meta('ID')) ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="status lead d-flex flex-column align-items-center bg-primary text-white p-3">
                Comments count
                <span class="display-4">
                <?php

                    $commentsCount_arguments = array(
                        'user_id' => get_the_author_meta("ID"),
                        'count' => true
                    );

                    echo get_comments($commentsCount_arguments);
                ?>
                </span>
            </div>
        </div><!-- col-md-3 -->
        <div class="col-md-3">
            <div class="status lead d-flex flex-column align-items-center bg-primary text-white p-3">
                post views
                <span class="display-4">
                <?php
                    echo "0"; 
                ?>
                </span>
            </div>
        </div><!-- col-md-3 -->

        <div class="col-md-3">
            <div class="status lead d-flex flex-column align-items-center bg-primary text-white p-3">
                Testing 
                <span class="display-4">
                <?php 
                    echo "0"; 
                ?>
                </span>
            </div>
        </div>
    </div>
    </div><!-- container -->
</div><!-- userInfo -->




<div class="container">
    

<?php 

    $author_posts_per_page =6;

    $author_posts_arguments = array(
        'author' => get_the_author_meta('ID'),
        'posts_per_page' => $author_posts_per_page
    );

    $author_posts = new WP_Query($author_posts_arguments);



if($author_posts -> have_posts()){
        echo '<h3 class="text-center">';
            echo 'latest ' . $author_posts_per_page . " ";
            the_author();
        echo' posts</h3>';
    while($author_posts -> have_posts()){
        $author_posts -> the_post(); 
        ?>
        <div class="row mb-3 bg-white p-3 border border-dark">
            <div class="col-md-3">
            <?php       
                if(has_post_thumbnail()){

                    the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid img-thumbnail', 'title' => 'Feature image', 'id' => 'testID']); 
                }else{
                    echo '<img src="https://unsplash.it/300" class="img-fluid img-thumbnail" alt="">';
                }
            ?>

            </div>
            <div class="col-md-9">
            
            <h3 class="post-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <div>
                <span class="post-date"><i class="fa fa-calendar fa-fw"></i> <?php the_date(); ?></span>
                <span class="post-comments"><i class="fa fa-comments fa-fw"></i> <?php 
                    comments_popup_link('0 comments','one comment', '% comments','comment-class', 'comments are disabled');
                ?></span>
            </div>
            <p class="lead">
                <?php
                    the_excerpt();
                ?>              
            </p>          


            </div><!-- col-md-9 -->
        </div><!-- row -->
        <?php
    }
}        

    wp_reset_postdata();


    $comments_per_page = 2;

    $comments_arguments = array(
        'user_id' => get_the_author_meta('ID'), // number of author hasan=1 ali = 3
        'status' => 'approve',
        'number'    => $comments_per_page,
        'post_status'   => 'publish',
        'post_type'     => 'post'
    );

    
    

    $comments = get_comments($comments_arguments);

    if($comments){?>

        <h3>
            <?php
                if(get_comments($comments_arguments) >= $comments_per_page){
                    echo "latest " . $comments_per_page . " comments of ";
                    the_author_meta('first_name');
                }else{
                    echo "latest Comments of ";
                    the_author_meta('first_name');
                }
            ?>
        </h3>

    <?php

    

        foreach($comments as $comment){
            ?>

            <div class="bg-white p-3 mb-3">
                
                <a href="<?php echo get_permalink($comment->comment_post_ID) ?>">
                    <?php echo get_the_title($comment->comment_post_ID). "<br>"; ?>
                </a>
                <div>
                    <?php
                        echo mysql2date( 'l, F j, Y', $comment->comment_date ); // Thursday, February 23, 2012
                    ?>
                </div>
                <div>
                    <span class="mark">content is :</span> <?php echo $comment->comment_content; ?>
                </div>

                <hr>
            </div>


            <?php
        }
    }else{
        echo "this author has not any comment";
    }
?>










<?php


        echo '<div class="post-pagination text-center">';
        
        if(get_previous_posts_link()){
            echo '<span class="btn btn-light mr-3">';
                previous_posts_link('<i class="fa fa-chevron-left"></i> prev');
            echo '</span>';
        }else{
            echo '<span class="btn btn-light mr-3"> No prev page</span>';
        }
        
        
        if(get_next_posts_link()){
            echo '<span class="btn btn-light">';
                next_posts_link('next <i class="fa fa-chevron-right"></i> ');
            echo '</span>';
            
        }else{
            echo '<span class="btn btn-light mr-3"> No Next page</span>';
        }

        echo '</div>';


    ?>


</div><!-- container -->


<?php get_footer() ?>

<?php

