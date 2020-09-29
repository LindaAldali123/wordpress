<?php
// include Nav walker
require_once('wp_bootstrap_navwalker.php');
// Add Featured Image Support
add_theme_support('post-thumbnails');
/*
** Function to Add My Custom styles 
** Added by @linda
** wp_enqueue_style()
*/
function elzero_add_styles(){
    wp_enqueue_style('bootstrap-css',get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css',get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('main',get_template_directory_uri() . '/css/main.css');
}
/*
** Function to Add My Custom scripts
** Added by @linda
** wp_enqueue_script()
*/
function elzero_add_scripts(){
    wp_deregister_script('jquery'); //Removed Registeration For Old JQuery 
    wp_register_script('jquery',includes_url('/js/jquery/jquery.js'),false,'',true); //Register A New JQuery In Footer
    wp_enqueue_script('jquery');// Enque The New JQuery
    wp_enqueue_script('bootstrap-js',get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'),false,true);
  //  wp_enqueue_script('jquery-js',get_template_directory_uri() . '/js/jquery-3.x-git.min.js',array(),false,true);  
    wp_enqueue_script('main-js',get_template_directory_uri() . '/js/main.js',array(),false,true);
    wp_enqueue_script('html5shiv',get_template_directory_uri() . '/js/html5shiv.js');
    wp_script_add_data('html5shiv','conditional','It IE 9');
    wp_enqueue_script('respond',get_template_directory_uri() . '/js/respond.min.js');
    wp_script_add_data('respond','conditional','It IE 9');
}
/*
** Add Custom Menu Support
** Added by @linda
*/
function elzero_register_custom_menu(){
//register_nav_menu('bootstrap-menu',__('Navigation Bar'));
register_nav_menus(array(
    'bootstrap-menu' => 'Navigation Bar',
    'footer-menu' =>  'Footer Menu'
));
}
function elzero_bootstrap_menu(){
wp_nav_menu(array(
    'theme_location' => 'bootstrap-menu',
    'menu_class' => 'nav navbar-nav navbar-right',
    'container' => false,
    'depth'    => 2,
    'walker'   => new wp_bootstrap_navwalker()
));
}
/*
** Customize The Excerpt Word Length and Read More Dots. عرض فقط 15 كلمة 
** Added by @linda
*/
function elzero_extend_excerpt_length($length){
    if(is_author()){
 return 40;
    }else if(is_category()){
       return 50; 
    }else{
  return 20;}
}
add_filter('excerpt_length','elzero_extend_excerpt_length');
/*ازال الاقواس المربعة ووضع محلن نقاط ... 
*/
function elzero_excerpt_change_dots($more){
    return ' ...';
  }
add_filter('excerpt_more','elzero_excerpt_change_dots');
/*
** Add Actions
** Added by @linda
** add_action()
*/
/* Add css Style */
add_action('wp_enqueue_scripts','elzero_add_styles');
/* Add Js Style */
add_action('wp_enqueue_scripts','elzero_add_scripts');
/* Add Register custom Menu */
add_action('init','elzero_register_custom_menu');
// Numbering Pagination 
function numbering_pagination(){
    global $wp_query; // Make Wp_Query Global
    $all_pages = $wp_query->max_num_pages; // Get All Posts
    $current_page = max(1,get_query_var('paged')); // Get Current Page
    //echo $current_page;
    if($all_pages > 1){ // Check If Total Pages > 1
   return paginate_links(array(
       'base' => get_pagenum_link() . '%_%',
       'format' => 'page/%#%', //?items=4
       'current' => $current_page,
       'mid_size' => 2,
       'end_size' => 2
      // 'total' =>  $current_page
   ));
    }
}
// Register Sidebar
function elzero_main_sidebar(){
    // Register Main Sidebar
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id'   => 'main-sidebar',
        'description' => 'Main Sidebar Apper Everywhere',
        'class' => 'main-sidebar',
        'before_widget' => '<div class="widget-content">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init','elzero_main_sidebar');
// Remove Paragraph Element From Post
function elzero_remove_paragraph($content){
remove_filter('the_content','wpautop');
return $content;
}
add_filter('the_content','elzero_remove_paragraph',0);
?>
