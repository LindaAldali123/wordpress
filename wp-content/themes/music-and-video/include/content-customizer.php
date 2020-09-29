<?php if( ! defined( 'ABSPATH' ) ) exit;

function music_and_video_customize_register_content( $wp_customize ) {

		function music_and_video_sanitize_homepage_columns( $input ) {
			$valid = array(
				'1' => esc_html__( 'One', 'music-and-video' ),
				'2' => esc_html__( 'Two', 'music-and-video' ),
				'3' => esc_html__( 'Three', 'music-and-video' ),
			);

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
		
/**
 * Recent Posts
 */
		$wp_customize->add_section( 'seos_content_section' , array(
			'title'       => __( 'Content Options', 'music-and-video' ),
			'priority'    => 2,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) ); 
 
 		$wp_customize->add_setting( 'homepage_columns', array (
		    'default' => 3,
			'sanitize_callback' => 'music_and_video_sanitize_homepage_columns',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'homepage_columns', array(
			'label'    => __( 'Homepage Post Columns', 'music-and-video' ),
			'section'  => 'seos_content_section',
			'settings' => 'homepage_columns',
			'type' => 'radio',
			'choices' => array(
				'1' => esc_html__( 'One', 'music-and-video' ),
				'2' => esc_html__( 'Two', 'music-and-video' ),
				'3' => esc_html__( 'Three', 'music-and-video' ),
				),			
			
		) ) );	
		
 		$wp_customize->add_setting( 'content_max_width', array (
            'default' => 1210,		
			'sanitize_callback' => 'absint',
		) );
				
		 $wp_customize->add_control( 'content_max_width', array(
		  'type' => 'range',
		  'section' => 'seos_content_section',
		  'settings' => 'content_max_width',
		  'label' => __( 'Content max width', 'music-and-video' ),
		  'input_attrs' => array(
			'min' => 1210,
			'max' => 2000,
			'step' => 1,
		  ),
		) );
 
 		$wp_customize->add_setting( 'content_padding', array (
            'default' => 0,		
			'sanitize_callback' => 'absint',
		) );
				
		 $wp_customize->add_control( 'content_padding', array(
		  'type' => 'range',
		  'section' => 'seos_content_section',
		  'settings' => 'content_padding',
		  'label' => __( 'Content Padding', 'music-and-video' ),
		  'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		  ),
		) );

 		$wp_customize->add_setting( 'hide_home_content', array (
            'default' => '',		
			'sanitize_callback' => 'music_and_video_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_home_content', array(
			'label'    => __( 'Hide sidebar and content on home page', 'music-and-video' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'hide_home_content',
			'type' => 'checkbox',
		) ) );		
}
add_action( 'customize_register', 'music_and_video_customize_register_content' );


/********************************************
* Content Styles
*********************************************/ 	

function music_and_video_content_styles () {

        $content_max_width = esc_attr(get_theme_mod( 'content_max_width' ) );
        $hide_home_content = esc_attr(get_theme_mod( 'hide_home_content' ) );
        $content_padding = esc_attr(get_theme_mod( 'content_padding' ) );
        $homepage_columns = esc_attr(get_theme_mod( 'homepage_columns' ) );

		if( $content_max_width ) { $content_max_width_style = "#content,.h-center {max-width: {$content_max_width}px !important;}";} else {$content_max_width_style ="";}
		if( $hide_home_content and (is_home() or is_front_page() ) ) { $hide_home_content_style = "#content #primary, body #content #secondary {display: none !important;}";} else {$hide_home_content_style ="";}
		if( $content_padding ) { $content_padding_style = "#content,.h-center {padding: {$content_padding}px !important;}";} else {$content_padding_style ="";}
		if( $homepage_columns == "1" and is_home()) { $homepage_columns_style1 = ".home article {width: 100%;}";} else {$homepage_columns_style1 ="";}
		if( $homepage_columns == "2" and is_home()) { $homepage_columns_style2 = ".home article {width: 45%;}";} else {$homepage_columns_style2 ="";}
		if( $homepage_columns == "3" and is_home()) { $homepage_columns_style3 = ".home article {width: 32%;}";} else {$homepage_columns_style3 ="";}

		
        wp_add_inline_style( 'music-and-video-style-css', 
		$content_max_width_style.$hide_home_content_style.$content_padding_style.$homepage_columns_style1.$homepage_columns_style2.$homepage_columns_style3
		);
}
add_action( 'wp_enqueue_scripts', 'music_and_video_content_styles' );