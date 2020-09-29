<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * related section
 */

$wp_customize->add_section(
	'lawman_related',
	array(
		'title' => esc_html__( 'Related', 'lawman' ),
		'panel' => 'lawman_home_panel',
	)
);


// blog enable settings
$wp_customize->add_setting(
	'lawman_related',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'lawman_related',
	array(
		'section'		=> 'lawman_related',
		'label'			=> esc_html__( 'Content type:', 'lawman' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'lawman' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'lawman' ),
				'post' => esc_html__( 'Post', 'lawman' ),
				'cat' => esc_html__( 'Category', 'lawman' ),
		 	)
	)
);


$wp_customize->add_setting(
	'lawman_related_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'You May Also Like...', 'lawman' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'lawman_related_title',
	array(
		'section'		=> 'lawman_related',
		'label'			=> esc_html__( 'Title:', 'lawman' ),
	)
);

$wp_customize->selective_refresh->add_partial( 
	'lawman_related_title', 
	array(
        'selector'            => '#related-posts .section-title',
		'render_callback'     => 'lawman_related_partial_title',
	) 
);




for ($i=1; $i <= 6 ; $i++) { 
	// blog post setting
	$wp_customize->add_setting(
		'lawman_related_post_'.$i,
		array(
			'sanitize_callback' => 'lawman_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'lawman_related_post_'.$i,
		array(
			'section'		=> 'lawman_related',
			'label'			=> esc_html__( 'Post ', 'lawman' ).$i,
			'active_callback' => 'lawman_if_related_post',
			'type'			=> 'select',
			'choices'		=> lawman_get_post_choices(),
		)
	);

}

// blog category setting
$wp_customize->add_setting(
	'lawman_related_cat',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
	)
);

$wp_customize->add_control(
	'lawman_related_cat',
	array(
		'section'		=> 'lawman_related',
		'label'			=> esc_html__( 'Category:', 'lawman' ),
		'active_callback' => 'lawman_if_related_cat',
		'type'			=> 'select',
		'choices'		=> lawman_get_post_cat_choices(),
	)
);

