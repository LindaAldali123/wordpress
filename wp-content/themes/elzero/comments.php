<?php 
 if(comments_open()){
  //echo 'Comments Are Open';
 
  echo '<h3 class="comments-count">';
  comments_number('no comments','one comment', '% comments');
echo "</h3>";
  echo '<ul class="list-unstyled comments-list">';
  $comments_arguments = array(
      'max_depth' => 3, //Comments level
      'type'     => 'comment', //Comments Type
      'avatar_size' => 64
  );
 wp_list_comments($comments_arguments);
 /*
 foreach($comments as $comment){
 comment_author();
 }
 */
echo '</ul>';
echo '<hr class="comment-separator">';
/*$commentform_arguments =array(
  'fields' => array(
    'author' => '<div class="form-group"><label>Your Name</label><input class="form-control"></div>',
    'email' => '<div class="form-group"><label>Email</label>This Is Email field</div>',
    'url' => '<div class="form-group"><label>Url</label>This Is Url field</div>'
  ),
  'comment_field' => '<div class="form-group">Textarea</div>'
);
comment_form($commentform_arguments); */
$commentform_arguments =array(
 'title_reply' => 'Add Your Comment',
 'title_reply_to' => 'Add a Reply to [%s]',
 'class_submit' => 'btn btn-primary btn-md',
 'comment_notes_before' => ''
);
comment_form($commentform_arguments); 
 }else{
  echo 'Sorry Comments Are Disabled';
 }