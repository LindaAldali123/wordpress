<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * service section
 */

$wp_customize->add_section(
	'lawman_main_service',
	array(
		'title' => esc_html__( 'Main Service', 'lawman' ),
		'panel' => 'lawman_home_panel',
	)
);


// service enable settings
$wp_customize->add_setting(
	'lawman_main_service',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'lawman_main_service',
	array(
		'section'		=> 'lawman_main_service',
		'label'			=> esc_html__( 'Content type:', 'lawman' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'lawman' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'lawman' ),
				'page' => esc_html__( 'Page', 'lawman' ),

		 	)
	)
);


for ($i=1; $i <= 3 ; $i++) { 

	$wp_customize->add_setting(
		'lawman_main_service_title_'.$i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'Book An', 'lawman' ),
			'transport'	=> 'refresh',
		)
	);
	
	$wp_customize->add_control(
		'lawman_main_service_title_'.$i,
		array(
			'section'		=> 'lawman_main_service',
			'label'			=> esc_html__( 'Title:', 'lawman' ) .$i,
		)
	);

	$wp_customize->add_setting(
		'lawman_main_service_icons_' . $i,
		array(	
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> 'newspaper',
		)
	);

	$wp_customize->add_control(
		'lawman_main_service_icons_' . $i,
		array(
		'label'       => __('Icon ', 'lawman'). $i,
		'description' => sprintf( __('Please input icon as eg: newspaper. Find Font-awesome icons %1$shere%2$s', 'lawman'), '<a href="' . esc_url( 'https://fontawesome.com/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'lawman_main_service',   	
		'type'        => 'text',
		)
	);

	// service page setting
	$wp_customize->add_setting(
		'lawman_main_service_page_'.$i,
		array(
			'sanitize_callback' => 'lawman_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'lawman_main_service_page_'.$i,
		array(
			'section'		=> 'lawman_main_service',
			'label'			=> esc_html__( 'Page ', 'lawman' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'lawman_if_main_service_page'
		)
	);
}

