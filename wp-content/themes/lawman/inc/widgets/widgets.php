<?php
/**
 * Moral Themes widgets inclusion
 *
 * This is the template that includes all custom widgets of Lawman
 *
 * @package Moral Themes
 * @subpackage Lawman
 * @since Lawman 1.0.0
 */


/*
 * Add Latest Posts widget
 */

require get_template_directory() . '/inc/widgets/social-link-widget.php';



/**
 * Register widgets
 */
function lawman_register_widgets() {

	register_widget( 'lawman_Social_Link' );



}
add_action( 'widgets_init', 'lawman_register_widgets' );