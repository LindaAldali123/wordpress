<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * advance setting
 */

$wp_customize->add_panel(
	'lawman_general_panel',
	array(
		'title' => esc_html__( 'Theme Options', 'lawman' ),
		'priority' => 107
	)
);

/**
 * General settings
 */
// General settings
$wp_customize->add_section(
	'lawman_general_section',
	array(
		'title' => esc_html__( 'General', 'lawman' ),
		'panel' => 'lawman_general_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'lawman_breadcrumb_enable',
	array(
		'sanitize_callback' => 'lawman_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'lawman_breadcrumb_enable',
	array(
		'section'		=> 'lawman_general_section',
		'label'			=> esc_html__( 'Enable breadcrumb.', 'lawman' ),
		'type'			=> 'checkbox',
	)
);

// Backtop enable setting
$wp_customize->add_setting(
	'lawman_back_to_top_enable',
	array(
		'sanitize_callback' => 'lawman_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'lawman_back_to_top_enable',
	array(
		'section'		=> 'lawman_general_section',
		'label'			=> esc_html__( 'Enable Scroll up.', 'lawman' ),
		'type'			=> 'checkbox',
	)
);

/**
 * Global Layout
 */
// Global Layout
$wp_customize->add_section(
	'lawman_global_layout',
	array(
		'title' => esc_html__( 'Global Layout', 'lawman' ),
		'panel' => 'lawman_general_panel',
	)
);

// Global site layout setting
$wp_customize->add_setting(
	'lawman_site_layout',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'wide',
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'lawman_site_layout',
	array(
		'section'		=> 'lawman_global_layout',
		'label'			=> esc_html__( 'Site layout', 'lawman' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'boxed' => esc_html__( 'Boxed', 'lawman' ), 
			'wide' => esc_html__( 'Wide', 'lawman' ),  
		),
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'lawman_archive_sidebar',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'lawman_archive_sidebar',
	array(
		'section'		=> 'lawman_global_layout',
		'label'			=> esc_html__( 'Archive Sidebar', 'lawman' ),
		'description'			=> esc_html__( 'This option works on all archive pages like: 404, search, date, category, "Your latest posts" and so on.', 'lawman' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'lawman' ), 
			'no' => esc_html__( 'No Sidebar', 'lawman' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'lawman_global_page_layout',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'lawman_global_page_layout',
	array(
		'section'		=> 'lawman_global_layout',
		'label'			=> esc_html__( 'Global page sidebar', 'lawman' ),
		'description'			=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'lawman' ),
		'type'			=> 'radio',
		'choices'		=> array(  
			'right' => esc_html__( 'Right', 'lawman' ), 
			'no' => esc_html__( 'No Sidebar', 'lawman' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'lawman_global_post_layout',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'lawman_global_post_layout',
	array(
		'section'		=> 'lawman_global_layout',
		'label'			=> esc_html__( 'Global post sidebar', 'lawman' ),
		'description'			=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'lawman' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'lawman' ), 
			'no' => esc_html__( 'No Sidebar', 'lawman' ), 
		),
	)
);

/**
 * Blog/Archive section 
 */
// Blog/Archive section 
$wp_customize->add_section(
	'lawman_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog', 'lawman' ),
		'description' => esc_html__( 'Settings for archive pages including blog page too.', 'lawman' ),
		'panel' => 'lawman_general_panel',
	)
);

// Archive excerpt length setting
$wp_customize->add_setting(
	'lawman_archive_excerpt_length',
	array(
		'sanitize_callback' => 'lawman_sanitize_number_range',
		'default' => 20,
	)
);

$wp_customize->add_control(
	'lawman_archive_excerpt_length',
	array(
		'section'		=> 'lawman_archive_settings',
		'label'			=> esc_html__( 'Excerpt more length:', 'lawman' ),
		'type'			=> 'number',
		'input_attrs'   => array( 'min' => 5 ),
	)
);



// Pagination type setting
$wp_customize->add_setting(
	'lawman_archive_pagination_type',
	array(
		'sanitize_callback' => 'lawman_sanitize_select',
		'default' => 'numeric',
	)
);

$wp_customize->add_control(
	'lawman_archive_pagination_type',
	array(
		'section'		=> 'lawman_archive_settings',
		'label'			=> esc_html__( 'Pagination type:', 'lawman' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable' => esc_html__( '--Disable--', 'lawman' ),
			'numeric' => esc_html__( 'Numeric', 'lawman' ),
			'older_newer' => esc_html__( 'Older / Newer', 'lawman' ),
		),
	)
);

/**
 * Reset all settings
 */
// Reset settings section
$wp_customize->add_section(
	'lawman_reset_sections',
	array(
		'title' => esc_html__( 'Reset all', 'lawman' ),
		'description' => esc_html__( 'Reset all settings to default.', 'lawman' ),
		'panel' => 'lawman_general_panel',
	)
);

// Reset sortable order setting
$wp_customize->add_setting(
	'lawman_reset_settings',
	array(
		'sanitize_callback' => 'lawman_sanitize_checkbox',
		'default' => false,
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'lawman_reset_settings',
	array(
		'section'		=> 'lawman_reset_sections',
		'label'			=> esc_html__( 'Reset all settings?', 'lawman' ),
		'type'			=> 'checkbox',
	)
);

/**
 *
 *
 * Footer copyright
 *
 *
 */
// Footer copyright
$wp_customize->add_section(
	'lawman_footer_section',
	array(
		'title' => esc_html__( 'Footer', 'lawman' ),
		'priority' => 106,
		'panel' => 'lawman_general_panel',
	)
);


// Footer text enable setting
$wp_customize->add_setting(
	'lawman_enable_footer_text',
	array(
		'sanitize_callback' => 'lawman_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'lawman_enable_footer_text',
	array(
		'section'		=> 'lawman_footer_section',
		'label'			=> esc_html__( 'Enable footer text.', 'lawman' ),
		'type'			=> 'checkbox',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'lawman_copyright_txt',
	array(
		'sanitize_callback' => 'lawman_sanitize_html',
		'default' => $default['lawman_copyright_txt'],
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'lawman_copyright_txt',
	array(
		'section'		=> 'lawman_footer_section',
		'label'			=> esc_html__( 'Copyright text:', 'lawman' ),
		'type'			=> 'textarea',
		'active_callback' => 'lawman_if_footer_text_enable',
	)
);

$wp_customize->add_setting(
	'lawman_power_by_txt',
	array(
		'sanitize_callback' => 'lawman_sanitize_html',
		'default' => $default['lawman_power_by_txt'],
		'transport'	=> 'postMessage',
	)	
);

$wp_customize->add_control(
	'lawman_power_by_txt',
	array(
		'section'		=> 'lawman_footer_section',
		'label'			=> esc_html__( 'Power by text:', 'lawman' ),
		'type'			=> 'textarea',
		'active_callback' => 'lawman_if_footer_text_enable',
	)
);
