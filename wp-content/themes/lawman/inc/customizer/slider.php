<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * Posts Slider section
 */

$wp_customize->add_section(
	'lawman_slider',
	array(
		'title' => esc_html__( 'Slider', 'lawman' ),
		'panel' => 'lawman_home_panel',
	)
);


// slider enable settings
$wp_customize->add_setting(
	'lawman_slider',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'lawman_slider',
	array(
		'section'		=> 'lawman_slider',
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
	'lawman_slider_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Free Consultation', 'lawman' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'lawman_slider_btn_title',
	array(
		'section'		=> 'lawman_slider',
		'label'			=> esc_html__( 'Btn Title:', 'lawman' ),
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'lawman_slider_btn_title', 
	array(
        'selector'            => '#featured-slider .read-more a',
		'render_callback'     => 'lawman_slider_partial_btn_title',
	) 
);



for ($i=1; $i <= 3 ; $i++) { 
	// slider page setting
	$wp_customize->add_setting(
		'lawman_slider_page_'.$i,
		array(
			'sanitize_callback' => 'lawman_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'lawman_slider_page_'.$i,
		array(
			'section'		=> 'lawman_slider',
			'label'			=> esc_html__( 'Page ', 'lawman' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'lawman_if_slider_page'
		)
	);
}
