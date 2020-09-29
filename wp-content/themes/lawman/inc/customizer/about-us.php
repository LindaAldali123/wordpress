<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * about section
 */
$wp_customize->add_section(
	'lawman_about',
	array(
		'title' => esc_html__( 'About Post', 'lawman' ),
		'panel' => 'lawman_home_panel',
	)
);

// about enable settings
$wp_customize->add_setting(
	'lawman_about',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'lawman_about',
	array(
		'section'		=> 'lawman_about',
		'label'			=> esc_html__( 'Content type:', 'lawman' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'lawman' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'lawman' ),
				'page' => esc_html__( 'Page', 'lawman' ),
		 	)
	)
);


$wp_customize->add_setting(
	'lawman_about_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'View Full Stories', 'lawman' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'lawman_about_btn_title',
	array(
		'section'		=> 'lawman_about',
		'label'			=> esc_html__( 'Btn Title:', 'lawman' ),
		'active_callback' => 'lawman_if_about_page'
	)
);

$wp_customize->selective_refresh->add_partial( 
	'lawman_about_btn_title', 
	array(
        'selector'            => '#about-us .read-more a',
		'render_callback'     => 'lawman_about_partial_btn_title',
	) 
);


// about page setting
$wp_customize->add_setting(
	'lawman_about_page_1',
	array(
		'sanitize_callback' => 'lawman_sanitize_dropdown_pages',
		'default' => 0,
	)
);

$wp_customize->add_control(
	'lawman_about_page_1',
	array(
		'section'		=> 'lawman_about',
		'label'			=> esc_html__( 'Page ', 'lawman' ),
		'type'			=> 'dropdown-pages',
		'active_callback' => 'lawman_if_about_page'
	)
);

