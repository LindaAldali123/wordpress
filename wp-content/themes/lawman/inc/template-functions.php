<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Moral
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lawman_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// When global archive layout is checked.
	if ( is_archive() || lawman_is_latest_posts() || is_404() || is_search() ) {
		$archive_sidebar = get_theme_mod( 'lawman_archive_sidebar', 'right' ); 
		$classes[] = esc_attr( $archive_sidebar ) . '-sidebar';
	} else if ( is_single() ) { // When global post sidebar is checked.
    	$lawman_post_sidebar_meta = get_post_meta( get_the_ID(), 'lawman-select-sidebar', true );
    	if ( ! empty( $lawman_post_sidebar_meta ) ) {
			$classes[] = esc_attr( $lawman_post_sidebar_meta ) . '-sidebar';
    	} else {
			$global_post_sidebar = get_theme_mod( 'lawman_global_post_layout', 'right' ); 
			$classes[] = esc_attr( $global_post_sidebar ) . '-sidebar';
    	}
	} elseif ( lawman_is_frontpage_blog() || is_page() ) {
		if ( lawman_is_frontpage_blog() ) {
			$page_id = get_option( 'page_for_posts' );
		} else {
			$page_id = get_the_ID();
		}

    	$lawman_page_sidebar_meta = get_post_meta( $page_id, 'lawman-select-sidebar', true );
		if ( ! empty( $lawman_page_sidebar_meta ) ) {
			$classes[] = esc_attr( $lawman_page_sidebar_meta ) . '-sidebar';
		} else {
			$global_page_sidebar = get_theme_mod( 'lawman_global_page_layout', 'right' ); 
			$classes[] = esc_attr( $global_page_sidebar ) . '-sidebar';
		}
	}

    if ( get_theme_mod( 'lawman_make_menu_sticky', false ) ) {
        $classes[] = 'menu-sticky';
    }
    
	// Site layout classes
	$site_layout = get_theme_mod( 'lawman_site_layout', 'wide' );
	$classes[] = esc_attr( $site_layout ) . '-layout';

	return $classes;
}
add_filter( 'body_class', 'lawman_body_classes' );

function lawman_post_classes( $classes ) {
	if ( lawman_is_page_displays_posts() ) {
		// Search 'has-post-thumbnail' returned by default and remove it.
		$key = array_search( 'has-post-thumbnail', $classes );
		unset( $classes[ $key ] );
		
		$archive_img_enable = get_theme_mod( 'lawman_enable_archive_featured_img', true );

		if( has_post_thumbnail() && $archive_img_enable ) {
			$classes[] = 'has-post-thumbnail';
		} else {
			$classes[] = 'no-post-thumbnail';
		}
	}
  
	return $classes;
}
add_filter( 'post_class', 'lawman_post_classes' );

/**
 * Excerpt length
 * 
 * @since Moral 1.0.0
 * @return Excerpt length
 */
function lawman_excerpt_length( $length ){
	if ( is_admin() ) {
		return $length;
	}

	$length = get_theme_mod( 'lawman_archive_excerpt_length', 60 );
	return $length;
}
add_filter( 'excerpt_length', 'lawman_excerpt_length', 999 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function lawman_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'lawman_pingback_header' );

/**
 * Get an array of post id and title.
 * 
 */
function lawman_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'lawman' ) );
	$args = array( 'numberposts' => -1, );
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$id = $post->ID;
		$title = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get an array of cat id and title.
 * 
 */
function lawman_get_post_cat_choices() {
  $choices = array( '' => esc_html__( '--Select--', 'lawman' ) );
	$cats = get_categories();

	foreach ( $cats as $cat ) {
		$id = $cat->term_id;
		$title = $cat->name;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function lawman_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Your latest posts".
 */
function lawman_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Posts page".
 */
function lawman_is_frontpage_blog() {
	return ( is_home() && ! is_front_page() );
}

/**
 * Checks to see if the current page displays any kind of post listing.
 */
function lawman_is_page_displays_posts() {
	return ( lawman_is_frontpage_blog() || is_search() || is_archive() || lawman_is_latest_posts() );
}

/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Arguments to pass to Breadcrumb_Trail.
 * @return void
 */
function lawman_breadcrumb( $args = array() ) {
	$breadcrumb = apply_filters( 'breadcrumb_trail_object', null, $args );

	if ( ! is_object( $breadcrumb ) )
		$breadcrumb = new Breadcrumb_Trail( $args );

	return $breadcrumb->trail();
}

/**
 * Pagination in archive/blog/search pages.
 */
function lawman_posts_pagination() { 
	$archive_pagination = get_theme_mod( 'lawman_archive_pagination_type', 'numeric' );
	if ( 'disable' === $archive_pagination ) {
		return;
	}
	if ( 'numeric' === $archive_pagination ) {
		the_posts_pagination( array(
            'prev_text'          => lawman_get_svg( array( 'icon' => 'left-arrow' ) ),
            'next_text'          => lawman_get_svg( array( 'icon' => 'left-arrow' ) ),
        ) );
	} elseif ( 'older_newer' === $archive_pagination ) {
        the_posts_navigation( array(
            'prev_text'          => lawman_get_svg( array( 'icon' => 'left' ) ) . '<span>'. esc_html__( 'Older', 'lawman' ) .'</span>',
            'next_text'          => '<span>'. esc_html__( 'Newer', 'lawman' ) .'</span>' . lawman_get_svg( array( 'icon' => 'right' ) ),
        )  );
	}
}

function lawman_get_svg_by_url( $url = false ) {
	if ( ! $url ) {
		return false;
	}

	$social_icons = lawman_social_links_icons();

	foreach ( $social_icons as $attr => $value ) {
		if ( false !== strpos( $url, $attr ) ) {
			return lawman_get_svg( array( 'icon' => esc_attr( $value ) ) );
		}
	}
}

if ( ! function_exists( 'lawman_the_excerpt' ) ) :

  /**
   * Generate excerpt.
   *
   * @since 1.0.0
   *
   * @param int     $length Excerpt length in words.
   * @param WP_Post $post_obj WP_Post instance (Optional).
   * @return string Excerpt.
   */
  function lawman_the_excerpt( $length = 0, $post_obj = null ) {

    global $post;

    if ( is_null( $post_obj ) ) {
      $post_obj = $post;
    }

    $length = absint( $length );

    if ( 0 === $length ) {
      return;
    }

    $source_content = $post_obj->post_content;

    if ( ! empty( $post_obj->post_excerpt ) ) {
      $source_content = $post_obj->post_excerpt;
    }

    $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
    $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
    return $trimmed_content;

  }

endif;

function lawman_get_section_content( $section_name, $content_type, $content_count ){

    $content = array();


    if (  in_array( $content_type, array( 'post', 'page' ) ) ) {
    $content_id = array();
    if ( 'post' === $content_type ) {
        for ( $i=1; $i <= $content_count; $i++ ) { 
            $content_id[] = get_theme_mod( "lawman_{$section_name}_{$content_type}_" . $i );
            } 
    }else {
        for ( $i=1; $i <= $content_count; $i++ ) { 
            $content_id[] = get_theme_mod( "lawman_{$section_name}_{$content_type}_" . $i );
        }
    }
    $args = array(
        'post_type' => $content_type,
        'post__in' => (array)$content_id,   
        'orderby'   => 'post__in',
        'posts_per_page' => absint( $content_count ),
        'ignore_sticky_posts' => true,
    );

    } else {
        $cat_content_id = get_theme_mod( "lawman_{$section_name}_{$content_type}" );
        $args = array(
            'cat' => $cat_content_id,   
            'posts_per_page' =>  absint( $content_count ),
            'ignore_sticky_posts' => true,

        );
    }

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        $i = 0;
        while ( $query->have_posts() ) {
            $query->the_post();

            $content[$i]['id'] = get_the_id();
            $content[$i]['title'] = get_the_title();
            $content[$i]['url'] = get_the_permalink();
            $content[$i]['content'] = get_the_content();
            $i++;
        }
        wp_reset_postdata();
    }

    return $content;
}


// Add auto p to the palces where get_the_excerpt is being called.
add_filter( 'get_the_excerpt', 'wpautop' );