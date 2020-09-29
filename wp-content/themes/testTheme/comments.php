<?php

    if(comments_open()){

        echo '<h3 class="comments-count">';
            comments_number('no comments','one comment', '% comments');
        echo "</h3>";

        echo '<ul class="list-unstyled comments-list">';

        $args = array(
            'max_depth' => 3,
            'style' => 'ul',
            'type' => 'comment',
            'avatar_size' => 50
        );


        wp_list_comments($args);

        echo '</ul>';

        echo '<hr class="comment-separator">';

        
        $comment_form_args = array(
            // 'fields' => array(
            //     'author' => '<div class="form-group"><label>Your Name</label><input type="text" class="form-control"></div>',
            //     'email' => '<div class="form-group"><label>Email</label> <input type="text" class="form-control"></div>',
            //     'url' => '<div class="form-group"><label>Url</label> <input type="text" class="form-control"></div>'
            // ),
            'comment_field' => '<div class="form-group"><textarea class="form-control"></textarea></div>',
            'title_reply' => 'Add your Comment',
            'title_reply_to' => 'Add a reply to [%s]',
            'class_submit' => 'btn btn-primary',
            'comment_notes_before' => ''
        );

        comment_form($comment_form_args);


    }else{
        echo "comments are disabled";
    }


    