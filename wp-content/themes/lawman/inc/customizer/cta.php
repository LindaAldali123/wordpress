<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * cta section
 */
$wp_customize->add_section(
	'lawman_cta',
	array(
		'title' => esc_html__( 'CTA', 'lawman' ),
		'panel' => 'lawman_home_panel',
	)
);


// cta enable settings
$wp_customize->add_setting(
	'lawman_cta',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'lawman_cta',
	array(
		'section'		=> 'lawman_cta',
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
	'lawman_cta_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Call To Action', 'lawman' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'lawman_cta_btn_title',
	array(
		'section'		=> 'lawman_cta',
		'label'			=> esc_html__( 'Btn Title:', 'lawman' ),
	)
);

$wp_customize->selective_refresh->add_partial( 
	'lawman_cta_btn_title', 
	array(
        'selector'            => '#cta .section-btn_title',
		'render_callback'     => 'lawman_cta_partial_btn_title',
	) 
);


// cta page setting
$wp_customize->add_setting(
	'lawman_cta_page_1',
	array(
		'sanitize_callback' => 'lawman_sanitize_dropdown_pages',
		'default' => 0,
	)
);

$wp_customize->add_control(
	'lawman_cta_page_1',
	array(
		'section'		=> 'lawman_cta',
		'label'			=> esc_html__( 'Page ', 'lawman' ),
		'type'			=> 'dropdown-pages',
		'active_callback' => 'lawman_if_cta_page'
	)
);

