<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * service section
 */

$wp_customize->add_section(
	'lawman_service',
	array(
		'title' => esc_html__( 'Service', 'lawman' ),
		'panel' => 'lawman_home_panel',
	)
);

// service enable settings
$wp_customize->add_setting(
	'lawman_service',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'lawman_service',
	array(
		'section'		=> 'lawman_service',
		'label'			=> esc_html__( 'Content type:', 'lawman' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'lawman' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'lawman' ),
				'page' => esc_html__( 'Page', 'lawman' ),
		 	)
	)
);

$wp_customize->add_setting(
	'lawman_service_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'We Are Here To Help You Grow', 'lawman' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'lawman_service_title',
	array(
		'section'		=> 'lawman_service',
		'label'			=> esc_html__( 'Title:', 'lawman' ),
	)
);

$wp_customize->selective_refresh->add_partial( 
	'lawman_service_title', 
	array(
        'selector'            => '#our-services .section-title',
		'render_callback'     => 'lawman_service_partial_title',
	) 
);

for ($i=1; $i <= 4 ; $i++) { 

	$wp_customize->add_setting(
		'lawman_service_icons_' . $i,
		array(	
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> 'newspaper',
		)
	);

	$wp_customize->add_control(
		'lawman_service_icons_' . $i,
		array(
		'label'       => __('Icon ', 'lawman'). $i,
		'description' => sprintf( __('Please input icon as eg: newspaper. Find Font-awesome icons %1$shere%2$s', 'lawman'), '<a href="' . esc_url( 'https://fontawesome.com/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'lawman_service',   	
		'type'        => 'text',
		)
	);

	// service page setting
	$wp_customize->add_setting(
		'lawman_service_page_'.$i,
		array(
			'sanitize_callback' => 'lawman_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'lawman_service_page_'.$i,
		array(
			'section'		=> 'lawman_service',
			'label'			=> esc_html__( 'Page ', 'lawman' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'lawman_if_service_page'
		)
	);
}

$wp_customize->add_setting( 'lawman_service_image_1', array(
	'sanitize_callback' => 'lawman_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lawman_service_image_1',
		array(
		'label'       		=> esc_html__( 'Image', 'lawman' ),
		'description' 		=> esc_html__( 'Recommended Image with no background ', 'lawman' ),
		'section'     		=> 'lawman_service',
) ) );

$wp_customize->add_setting( 'lawman_service_image_2', array(
	'sanitize_callback' => 'lawman_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lawman_service_image_2',
		array(
		'label'       		=> esc_html__( 'Background Image', 'lawman' ),
		'section'     		=> 'lawman_service',
) ) );

