<?php get_header(); ?>




<div class="container home-page">
    <div class="row">

    <?php 

        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <div class="col-sm-6">
                    <div class="main-post">
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
                        <?php
                        
                        the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid img-thumbnail', 'title' => 'Feature image', 'id' => 'testID']);
                        // the_content('read the full article ..');
                        the_excerpt();
                        ?>                        
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
                </div>

                


                <?php
                
            }
        }

       



    ?>


    </div><!-- row -->

    <?php


        echo '<div class="post-pagination">';
        
        if(get_previous_posts_link()){
            previous_posts_link('<i class="fa fa-chevron-left"></i> prev');
        }else{
            echo "<span> No prev page</span>";
        }


        if(get_next_posts_link()){
            next_posts_link('next <i class="fa fa-chevron-right"></i> ');
        }else{
            echo "<span> No Next page</span>";
        }

        echo '</div>';


    ?>
    <div class="pagenation-numbers text-center my-3">
        <?php  echo numbering_pagination(); ?>
    </div>

</div><!-- container -->



<!-- <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="main-post">
                <h3 class="main-title">This is our Main post Title</h3>
                <div>
                    <span class="post-author"><i class="fa fa-user fa-fw"></i> hasan</span>
                    <span class="post-date"><i class="fa fa-calendar fa-fw"></i> 20/6/2020</span>
                    <span class="post-comments"><i class="fa fa-comments fa-fw"></i> 20 comments</span>
                </div>
                <img  src="https://unsplash.it/604" class="img-fluid img-thumbnail" alt="">
                <p class="post-content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, quidem distinctio voluptates corrupti architecto sed cum nostrum sint dolores tenetur officia eligendi incidunt ipsa minima. Pariatur tenetur quam perspiciatis necessitatibus?</p>
                <hr>
                <p class="categories"><i class="fa fa-tags fa-fw"></i> HTML, test, Coding</p>
            </div>
        </div>

    </div>
</div> -->

<?php get_footer(); ?>


<?php
