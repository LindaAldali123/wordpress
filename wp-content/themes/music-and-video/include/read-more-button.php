<?php if( ! defined( 'ABSPATH' ) ) exit;
	
/**
 * Read More Button
 */

	function music_and_video_excerpt_more( $more ) {
			return '<p class="link-more"><a class="myButt " href="'. esc_url(get_permalink( get_the_ID() ) ) . '">' . music_and_video_return_read_more_text (). '</a></p>';
	}
	add_filter( 'excerpt_more', 'music_and_video_excerpt_more' );	
	
	function music_and_video_excerpt_length( $length ) {
			if ( is_admin() ) {
					return $length;
			}
			return 22;
	}
	add_filter( 'excerpt_length', 'music_and_video_excerpt_length', 999 );
	
	function music_and_video_return_read_more_text () {
		return __( 'Read More','music-and-video');
	}