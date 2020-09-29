<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * Header panel
 */

// Header section
$wp_customize->add_section(
	'lawman_header_section',
	array(
		'title' => esc_html__( 'Header', 'lawman' ),
		'panel' => 'lawman_general_panel',
	)
);

// Header menu sticky enable settings
$wp_customize->add_setting(
	'lawman_make_menu_sticky',
	array(
		'sanitize_callback' => 'lawman_sanitize_checkbox',
		'default' => false
	)
);

$wp_customize->add_control(
	'lawman_make_menu_sticky',
	array(
		'section'		=> 'lawman_header_section',
		'label'			=> esc_html__( 'Make menu sticky.', 'lawman' ),
		'type'			=> 'checkbox',
	)
);
