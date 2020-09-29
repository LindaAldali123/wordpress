<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 */

/**
 * Get all the default values of the theme mods.
 */
function lawman_get_default_mods() {
	$lawman_default_mods = array(
		// Footer copyright
		'lawman_copyright_txt' => esc_html__( '&copy; [the-year] [site-link]. All Right Reserved ', 'lawman' ),
		'lawman_power_by_txt'	=> sprintf( esc_html__( 'Design By %1$s ', 'lawman' ), '<a href="' . esc_url( 'http://moralthemes.com/' ) . '">Moral Themes</a>' ),
	);

	return apply_filters( 'lawman_default_mods', $lawman_default_mods );
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lawman_customize_register( $wp_customize ) {

	$default = lawman_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'lawman_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'lawman_customize_partial_blogdescription',
		) );
	}
	$wp_customize->get_setting( 'header_textcolor' )->default = '#ffffff';

	//Color Panel

	// Header tagline color setting
	$wp_customize->add_setting(	
		'lawman_header_tagline',
		array(
			'sanitize_callback' => 'lawman_sanitize_hex_color',
			'default' => '#fff',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'lawman_header_tagline',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site tagline Color:', 'lawman' ),
			)
		)
	);

	// Header text display setting
	$wp_customize->add_setting(	
		'lawman_header_text_display',
		array(
			'sanitize_callback' => 'lawman_sanitize_checkbox',
			'default' => true,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'lawman_header_text_display',
		array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Site Title and Tagline', 'lawman' ),
		)
	);


	// Your latest posts title setting
	$wp_customize->add_setting(	
		'lawman_your_latest_posts_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'Blogs', 'lawman' ),
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'lawman_your_latest_posts_title',
		array(
			'section'		=> 'static_front_page',
			'label'			=> esc_html__( 'Title:', 'lawman' ),
			'active_callback' => 'lawman_is_latest_posts'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'lawman_your_latest_posts_title', 
		array(
	        'selector'            => '.home.blog #page-header .page-title',
			'render_callback'     => 'lawman_your_latest_posts_partial_title',
    	) 
    );

	/**
	 * 
	 * Front Section
	 * 
	 */ 

	// Home sections panel
	$wp_customize->add_panel(
		'lawman_home_panel',
		array(
			'title' => esc_html__( 'Homepage Options', 'lawman' ),
			'priority' => 105
		)
	);

    //top-bar
    require get_parent_theme_file_path( '/inc/customizer/top-bar.php' );

    //slider
    require get_parent_theme_file_path( '/inc/customizer/slider.php' );

    //main services
    require get_parent_theme_file_path( '/inc/customizer/main-service.php' );

    //about
	require get_parent_theme_file_path( '/inc/customizer/about-us.php' );

    //service
	require get_parent_theme_file_path( '/inc/customizer/service.php' );

    //cta
	require get_parent_theme_file_path( '/inc/customizer/cta.php' );

	//team
	require get_parent_theme_file_path( '/inc/customizer/team.php' );

	//related
	require get_parent_theme_file_path( '/inc/customizer/related.php' );

	// Theme Options
	require get_parent_theme_file_path( '/inc/customizer/theme-option.php' );
}
add_action( 'customize_register', 'lawman_customize_register' );


// Sanitize Callback
require get_parent_theme_file_path( '/inc/customizer/sanitize-callback.php' );

// active Callback
require get_parent_theme_file_path( '/inc/customizer/active-callback.php' );

// Partial Refresh
require get_parent_theme_file_path( '/inc/customizer/partial-refresh.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lawman_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lawman_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lawman_customize_preview_js() {
	wp_enqueue_script( 'lawman-blog-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'lawman_customize_preview_js' );

/**
 * Binds JS handlers for Customizer controls.
 */
function lawman_customize_control_js() {


	wp_enqueue_style( 'lawman-blog-customize-style', get_theme_file_uri( '/assets/css/customize-controls.css' ), array(), '20151215' );

	wp_enqueue_script( 'lawman-blog-customize-control', get_theme_file_uri( '/assets/js/customize-control.js' ), array( 'jquery', 'customize-controls' ), '20151215', true );
	$localized_data = array( 
		'refresh_msg' => esc_html__( 'Refresh the page after Save and Publish.', 'lawman' ),
		'reset_msg' => esc_html__( 'Warning!!! This will reset all the settings. Refresh the page after Save and Publish to reset all.', 'lawman' ),
	);

	wp_localize_script( 'lawman-blog-customize-control', 'localized_data', $localized_data );
}
add_action( 'customize_controls_enqueue_scripts', 'lawman_customize_control_js' );
