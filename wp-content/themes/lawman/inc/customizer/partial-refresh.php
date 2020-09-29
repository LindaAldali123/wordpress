<?php
/**
 * Moral Theme 
 *
 * @package Moral
 * partial refresh
 * 
 */



function lawman_slider_partial_btn_title() {
	return esc_html( get_theme_mod( 'lawman_slider_btn_title' ) );
}


/**
 * Selective refresh for service Section.
 */
function lawman_service_partial_title() {
	return esc_html( get_theme_mod( 'lawman_service_title' ) );
}



function lawman_about_partial_btn_title() {
	return esc_html( get_theme_mod( 'lawman_about_btn_title' ) );
}


/**
 * Selective refresh for related Section.
 */
function lawman_related_partial_title() {
	return esc_html( get_theme_mod( 'lawman_related_title' ) );
}

/**
 * Selective refresh for team Section.
 */
function lawman_team_partial_title() {
	return esc_html( get_theme_mod( 'lawman_team_title' ) );
}


function lawman_cta_partial_btn_title() {
	return esc_html( get_theme_mod( 'lawman_cta_btn_title' ) );
}