<?php if( ! defined( 'ABSPATH' ) ) exit;

add_action( 'customize_register', 'music_and_video_back_to_top_customize_register' );

function music_and_video_back_to_top_customize_register( $wp_customize ) {
	
/***********************************************************************************
 * Back to top button Options
***********************************************************************************/
 
		$wp_customize->add_section( 'back_to_top' , array(
			'title'       => __( 'Back To Top Button Options', 'music-and-video' ),
			'priority'   => 98,
		) );
		
		$wp_customize->add_setting( 'activate_back_to_top', array (
			'sanitize_callback' => 'music_and_video_sanitize_checkbox',
		) );
		
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_back_to_top', array(
			'label'    => __( 'Activate Back To Top Button', 'music-and-video' ),
			'section'  => 'back_to_top',
			'settings' => 'activate_back_to_top',
			'type' => 'checkbox',
		) ) );
	
		$wp_customize->add_setting('back_button_background_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		) ); 	
		$wp_customize->add_setting('back_top_button_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		) ); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_top_button_color', array(
		'label' => __('Button Color', 'music-and-video'),        
		'section' => 'back_to_top',
		'settings' => 'back_top_button_color'
		) ) );
		
		$wp_customize->add_setting('back_top_button_hover_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		) ); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_top_button_hover_color', array(
		'label' => __('Button Hover Color', 'music-and-video'),        
		'section' => 'back_to_top',
		'settings' => 'back_top_button_hover_color'
		) ) );
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_button_background_color', array(
		'label' => __('Button Background Color', 'music-and-video'),        
		'section' => 'back_to_top',
		'settings' => 'back_button_background_color'
		) ) );	
			
		$wp_customize->add_setting('back_button_background_hover_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		) ); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_button_background_hover_color', array(
		'label' => __('Button Background Hover Color', 'music-and-video'),        
		'section' => 'back_to_top',
		'settings' => 'back_button_background_hover_color'
		) ) );
}

/********************************************
* Back to top styles
*********************************************/ 	

add_action( 'wp_enqueue_scripts', 'music_and_video_back_top_method' );	

function music_and_video_back_top_method() {

        $back_top_button_color_mod = esc_attr( get_theme_mod( 'back_top_button_color' ) );
        $back_top_button_hover_color_mod = esc_attr( get_theme_mod( 'back_top_button_hover_color' ) );
        $back_button_background_color_mod = esc_attr( get_theme_mod( 'back_button_background_color' ) );
        $back_button_background_hover_color_mod = esc_attr( get_theme_mod( 'back_button_background_hover_color' ) );
		
		if( $back_top_button_color_mod ) { $back_top_button_color = "#totop {color: {$back_top_button_color_mod} !important;}";} else { $back_top_button_color =""; }
		if( $back_top_button_hover_color_mod ) { $back_top_button_hover_color = "#totop:hover {color: {$back_top_button_hover_color_mod} !important;}";} else {$back_top_button_hover_color ="";}
		if( $back_button_background_color_mod ) { $back_button_background_color = "#totop {background: {$back_button_background_color_mod} !important;}";} else {$back_button_background_color ="";}
		if( $back_button_background_hover_color_mod ) { $back_button_background_hover_color = "#totop:hover {background: {$back_button_background_hover_color_mod} !important;}";} else {$back_button_background_hover_color ="";}
		
        wp_add_inline_style( 'music-and-video-style-css', 
		$back_top_button_color.$back_top_button_hover_color.$back_button_background_color.$back_button_background_hover_color
		);
}	

/*********************************************************************************************************
* Back to top
**********************************************************************************************************/			
	
function music_and_video_to_top() {
    echo '<a id="totop" href="#"><span class="dashicons dashicons-arrow-up-alt2"></span></a>';
    }

    add_action( 'wp_head', 'music_and_video_back_to_top_style' );
    function music_and_video_back_to_top_style() {
    echo '<style>
    #totop {
		position: fixed;
		right: 40px;
	    z-index: 9999999;
		bottom: 20px;
		display: none;
		outline: none;
		background: #000;
		width: 49px;
		height: 48px;
		text-align: center;
		color: #FFFFFF;
		padding: 10px;
		border: 2px solid #333;
		border-radius: 10%;

		-webkit-transition: all 0.1s linear 0s;
		-moz-transition: all 0.1s linear 0s;
		-o-transition: all 0.1s linear 0s;
		transition: all 0.1s linear 0s;
		font-family: \'Tahoma\', sans-serif;
		}
		#totop .dashicons {
			font-size: 24px;		
		}
		#totop:hover {
			opacity: 0.8;	
		}
		
	#totop .dashicons{
		display: block;
	}
    </style>';
    }