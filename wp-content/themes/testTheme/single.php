<?php get_header(); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/wordpress/wp-content/themes/testTheme/includes/breadcrumb.php');?>






<div class="container post-page">

    <?php 

        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                    <div class="main-post single-post">
                        <div class="text-right">
                            <?php edit_post_link('edit post <i class="fa fa-pen"></i>'); ?>
                        </div>

                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                        </a>
                        </h3>
                        <div>
                            <span class="post-author"><i class="fa fa-user fa-fw"></i> <?php the_author_posts_link(); ?></span>
                            <span class="post-date"><i class="fa fa-calendar fa-fw"></i> <?php the_date(); ?></span>
                            <span class="post-comments"><i class="fa fa-comments fa-fw"></i> <?php 
                                comments_popup_link('0 comments','one comment', '% comments','comment-class', 'comments are disabled');
                            ?></span>
                        </div>
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid img-thumbnail', 'title' => 'Feature image', 'id' => 'testID']);?>                        

                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                        <hr>
                        <p class="post-categories"><i class="fa fa-tags fa-fw"></i> <?php the_category(','); ?></p>
                        <p class="post-tags"><?php 
                            if(has_tag()){
                                the_tags();
                            }else{
                                echo '<span class="text-danger">tags: there is no tags</span>';
                            }
                        ?></p>
                        
                    </div>

                


                <?php
                
            }
        }


        
        

    ?>



        <h2 class="text-center">user information</h2>

        <div class="userInfo bg-light p-4">
            <div class="row">
                <div class="col-md-2">
                    <?php
                        $args = array(
                            'class' => 'img-fluid img-thumbnail d-block m-auto'
                        );
                        echo get_avatar(get_the_author_meta('ID'), 100, '','User Avatar', $args);
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
            <p class="author-status">
                user Posts Count : <span class="posts-count text-info"><?php echo count_user_posts(get_the_author_meta('ID')) ?></span>
                User Profile Link : <?php the_author_posts_link() ?>
            </p>
        </div><!-- userInfo -->


        <!--    start WP_Query -->

        <div class="WP_Query">
            <h3 class="text-center bg-dark text-white p-3">random articles from the same category</h3>
        <?php

        /* 
        ************************
        اشياء احتاجها
        // get_queried_object_id();
        
        ************************
        */
        
        $random_posts_arguments = array(
            
            'posts_per_page' => 5,
            'orderby' => 'rand',
            'category__in' => wp_get_post_categories(get_queried_object_id()),
            'post__not_in' => array(get_queried_object_id())
        );
        
        // echo "<pre>";
        // print_r(wp_get_post_categories(get_queried_object_id()));
        // echo "</pre>";

        $random_posts = new WP_Query($random_posts_arguments);

        if($random_posts->have_posts()){
            while($random_posts->have_posts()){
                $random_posts->the_post(); ?>

                <div class="author-posts bg-white p-3 mb-3">
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>

                </div><!-- author-posts -->


                <?php
            }
        }




        

        ?>
        </div><!-- WP_Query -->

        <!--    end WP_Query -->




        <?php

        comments_template();



        echo '<div class="post-pagination">';
        if(get_previous_post_link()){
            
            echo '<span>'.previous_post_link('%link','<i class="fa fa-chevron-left"></i> %title').'</span>';   

        }else{
            echo "prev";
        }

        if(get_previous_post_link()){

            echo '<span>'.next_post_link('%link','%title <i class="fa fa-chevron-right"></i>').'</span>';   

        }else{
            echo "next";
        }
        
        echo '</div>';

        

    ?>
</div><!-- container -->

<?php get_footer(); ?>



<?php
