<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Moral
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lawman' ); ?></a>
    
    <div class="menu-overlay"></div>
    <div id="header-menu">
    <?php if ( get_theme_mod( 'lawman_topbar' ) == true ): ?>
        <div id="top-bar" class="relative">
        <button class="top-menu-toggle"><?php echo lawman_get_svg( array( 'icon' => 'up', 'class'=>'dropdown-icon' ));
        echo lawman_get_svg( array( 'icon' => 'down', 'class'=>'dropdown-icon' )); ?> </button>

            <div class="wrapper">
                <div class="col-2 clear">
                    <div class="hentry">
                        <ul class="contact-info clear">
                        <?php if(!empty(get_theme_mod('lawman_topbar_location'))) : ?>
                            <li>
                                <?php echo lawman_get_svg( array( 'icon' => 'location' )); ?>
                                <span><?php echo esc_html( get_theme_mod('lawman_topbar_location') ) ; ?></span>
                            </li>
                        <?php endif; ?>

                        <?php if(!empty(get_theme_mod('lawman_topbar_contact'))) : ?>
                            <li><a href="tel:<?php echo esc_attr( get_theme_mod('lawman_topbar_contact') )?>">
                                <?php echo lawman_get_svg( array( 'icon' => 'phone' )); ?>
                                <span><?php echo esc_html( get_theme_mod('lawman_topbar_contact') ) ; ?></span></a>
                            </li>
                        <?php endif; ?>
                        
                        </ul><!-- .contact-info -->
                    </div><!-- .hentry -->

                    <div class="hentry">
                    <?php 
                    if ( get_theme_mod( 'lawman_topbar_social_menu', true )) {
                        if ( has_nav_menu( 'social' ) ) :
                        wp_nav_menu( array(
                            'theme_location'  => 'social',
                            'menu_class'      => 'social-icons',
                            'container'       => 'div',
                            'container_class' => 'secondary-menu',
                            'depth'           => 1,
                            'echo'            => true,
                            'link_before'     => '<span class="screen-reader-text">',
                            'link_after'      => '</span>',
                        ));
                    endif;
                    } ?>
                    </div><!-- .hentry -->
                </div><!-- .col-2 -->
            </div><!-- .wrapper -->
        </div><!-- #top-bar -->
        <?php endif ?>
        <?php get_template_part( 'template-parts/header' );  ?>
    </div><!-- #header menu -->

    
	<div id="content" class="site-content">
