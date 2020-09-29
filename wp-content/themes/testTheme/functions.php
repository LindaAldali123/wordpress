<?php

    /* 
    - function to add my custom styles
    - added by hasan
    - wp_enqueue_style()
    */

    require_once('wp_bootstrap_navwalker.php');

    function hasan_add_styles(){

        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('fontAwesomeAll-css', get_template_directory_uri() . '/css/all.css');
        wp_enqueue_style('fontAwesome-css', get_template_directory_uri() . '/css/fontawesome.css');
        wp_enqueue_style('main', get_template_directory_uri() .'/css/main.css');

    }



    /* 
    - function to add my custom scripts
    - added by hasan
    - wp_enqueue_style()


    */




    function hasan_add_scripts(){
    
        
        wp_deregister_script('jquery'); // remove registeration for old jquery
        wp_register_script('jquery', includes_url('/js/jquery/jquery.js'),false, '', true); // register a new jquery in footer

        // enqueue the new jquery
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js' ,array(),false,true);   
        wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js' ,array(),false,true);   
        wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js');   
        wp_script_add_data('html5shiv','conditional','lt IE 9');
        wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js');   
        wp_script_add_data('respond','conditional','lt IE 9');
    
    }



    /* تشغيل الدوال */

    add_action('wp_enqueue_scripts','hasan_add_styles');
    add_action('wp_enqueue_scripts','hasan_add_scripts');




    /* 
        *******************
    add custom menu support
        *******************
    
    */

    function hasan_register_custom_menu(){        /*   add_action لن تعمل يجب ان اضع */

        register_nav_menus(array(

            'bootstrap-menu'=> 'navigation bar',
            'footer-menu'   => 'footer menu',
            
        ));  

    }

    function hasan_bootstrap_menu(){

        wp_nav_menu(array(
            "theme_location" => "bootstrap-menu",      //  register_nav_menus اخذته من ال
                                                        //theme_location  هو واحد من الباراميترات المهمة
            'container'  => false,
            'menu_class' => 'navbar-nav ml-auto',
            'depth'     => 2,
            'walker'    => new WP_Bootstrap_Navwalker(),
            
        ));
    }



    add_action('init','hasan_register_custom_menu');




    /* 
    add featured image support
    */

    add_theme_support( 'post-thumbnails' );



    /* 
        *********************
        Customize the excerpt word length & read More Dots               the_excerpt();  تعديل عدد الكلمات وتغيير النقاط في 
        *********************

    */

    function hasan_extend_excerpt_length($length){
        if(is_author()){
            return 30;
        }elseif(is_category()){
            return 35;
        }
        else{
            return 40;
        }
    }

    

    add_filter('excerpt_length','hasan_extend_excerpt_length');


    function hasan_excerpt_change_dots(){
        return '...';
    }

    add_filter('excerpt_more','hasan_excerpt_change_dots');




    // function example_callback( $example ) {
    //     // Maybe modify $example in some way.
    //     return $example;
    // }
    // add_filter( 'example_filter', 'example_callback' );


    /* start numbering pagination */

    function numbering_pagination(){
        global $wp_query;

        $all_pages = $wp_query->max_num_pages;

        $current_page = max(1, get_query_var('paged'));    // يجلب رقم الصفحة الحالية

        if($all_pages > 1){  // check if total pages > 1

            return paginate_links(array(
                'base' => get_pagenum_link() . '%_%',
                'format' => 'page/%#%',
                'current' =>  $current_page,
                'mid_size' => 3,   // default 2
                'end_size' => 2    // default 1
            ));

        }

    }

    /* end numbering pagination */



    /* start register sidebar */

    function my_main_sidebar(){
         //     تستطيع استخدامها اكثر من مرة داخل الدالة
         register_sidebar(array(
            'name'          => 'main-sidebar',
            'id'            => 'main-sidebarr',
            'description'   => 'descriptoin of mySidebar',
            'class'         => 'main-sidebar',
            'before_widget' => '<div class="widget-content">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        ));  
    }

    /* end register sidebar */


    add_action('widgets_init','my_main_sidebar');

   
  // remove paragraph element from posts

  function remove_paragraph(){
    remove_filter( 'the_content', 'wpautop');
    return $content;
  }
   
  add_filter('the_content', 'remove_paragraph',0);