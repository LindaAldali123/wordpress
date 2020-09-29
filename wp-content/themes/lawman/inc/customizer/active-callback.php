<?php
/**
 * Moral Theme 
 *
 * @package Moral
 * active callbacks.
 * 
 */


/**
 * Check if the slider is page
 */
function lawman_if_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'lawman_slider' )->value();
}




/**
 * Check if the main_service is page
 */
function lawman_if_main_service_page( $control ) {
	return 'page' === $control->manager->get_setting( 'lawman_main_service' )->value();
}





function lawman_if_about_page( $control ) {
	return 'page' === $control->manager->get_setting( 'lawman_about' )->value();
}



/**
 * Check if the service is page
 */
function lawman_if_service_page( $control ) {
	return 'page' === $control->manager->get_setting( 'lawman_service' )->value();
}


/**
 * Check if the team is page
 */
function lawman_if_team_page( $control ) {
	return 'page' === $control->manager->get_setting( 'lawman_team' )->value();
}


/**
 * Check if the blog is post
 */
function lawman_if_related_post( $control ) {
	return 'post' === $control->manager->get_setting( 'lawman_related' )->value();
}

/**
 * Check if the blog is cat
 */
function lawman_if_related_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'lawman_related' )->value();
}

/**
 * Check if the cta is post
 */


function lawman_if_cta_page( $control ) {
	return 'page' === $control->manager->get_setting( 'lawman_cta' )->value();
}


/**
 * Check if the footer text is enabled
 */
function lawman_if_footer_text_enable( $control ) {
	return $control->manager->get_setting( 'lawman_enable_footer_text' )->value();
}
