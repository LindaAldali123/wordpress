<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Moral Themes
 *
 * @package Moral Themes
 * @subpackage Lawman
 * @since Lawman 1.0.0
 */

function lawman_ctdi_plugin_page_setup( $default_settings ) {
    $default_settings['menu_title']  = esc_html__( 'Moral Theme Demo Import' , 'lawman' );

    return $default_settings;
}
add_filter( 'cp-ctdi/plugin_page_setup', 'lawman_ctdi_plugin_page_setup' );


function lawman_ctdi_plugin_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Lawman  Theme.', 'lawman' ),
    esc_url( 'https://moralthemes.com/download/lawman' ), esc_html__( 'Click here for Demo File download', 'lawman' ) );
    return $default_text;
}
add_filter( 'cp-ctdi/plugin_intro_text', 'lawman_ctdi_plugin_intro_text' );

