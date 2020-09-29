<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * topbar
 */

$wp_customize->add_section(
	'lawman_topbar',
	array(
		'title' => esc_html__( 'Top bar', 'lawman' ),
		'panel' => 'lawman_home_panel',
	)
);

// topbar enable settings
$wp_customize->add_setting(
	'lawman_topbar',
	array(
		'sanitize_callback' => 'lawman_sanitize_checkbox',
		'default' => false,
	)
);

$wp_customize->add_control(
	'lawman_topbar',
	array(
		'section'		=> 'lawman_topbar',
		'label'			=> esc_html__( 'Enable Topbar', 'lawman' ),
		'type'			=> 'checkbox',
	)
);

$wp_customize->add_setting(
	'lawman_topbar_social_menu',
	array(
		'sanitize_callback' => 'lawman_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'lawman_topbar_social_menu',
	array(
		'section'		=> 'lawman_topbar',
		'label'			=> esc_html__( 'Enable Social Menu', 'lawman' ),
		'type'			=> 'checkbox',
	)
);


$wp_customize->add_setting(
		'lawman_topbar_location',
		array(	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

$wp_customize->add_control(
	'lawman_topbar_location',
	array(
	'label'       => __('Enter Location ', 'lawman'),  
	'section'     => 'lawman_topbar',   		
	'type'        => 'text'
	)
);

$wp_customize->add_setting(
		'lawman_topbar_contact',
		array(	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

$wp_customize->add_control(
	'lawman_topbar_contact',
	array(
	'label'       => __('Enter contact No. ', 'lawman'),  
	'section'     => 'lawman_topbar',   		
	'type'        => 'text'
	)
);

