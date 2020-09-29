<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * Posts Slider section
 */

$wp_customize->add_section(
	'lawman_team',
	array(
		'title' => esc_html__( 'Team', 'lawman' ),
		'panel' => 'lawman_home_panel',
	)
);


// team enable settings
$wp_customize->add_setting(
	'lawman_team',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'lawman_team',
	array(
		'section'		=> 'lawman_team',
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
	'lawman_team_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Meet Our Expert Attorneys', 'lawman'),
	)
);

$wp_customize->add_control(
	'lawman_team_title',
	array(
		'section'		=> 'lawman_team',
		'label'			=> esc_html__( 'Section Title:', 'lawman' ),
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'lawman_team_title', 
	array(
        'selector'            => '#team .section-header h2',
		'render_callback'     => 'lawman_team_partial_title',
	) 
);




for ($i=1; $i <= 4 ; $i++) { 

	// team page setting
	$wp_customize->add_setting(
		'lawman_team_page_'.$i,
		array(
			'sanitize_callback' => 'lawman_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'lawman_team_page_'.$i,
		array(
			'section'		=> 'lawman_team',
			'label'			=> esc_html__( 'Page ', 'lawman' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'lawman_if_team_page'
		)
	);
}



