<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$main_service = get_theme_mod( 'lawman_main_service', 'disable' );

// Bail if the section is disabled.
if ( 'disable' === $main_service ) {
    return;
}

$content_details = lawman_get_section_content( 'main_service', $main_service, 3 ); ?>

<div id="main-services">
    <div class="wrapper">
        <div class="main-services-wrapper col-3 clear">
        <?php foreach($content_details as $i => $content ): ?>
            <article class="hentry">
                <div class="icon-container">
                    <i class="fas fa-<?php echo esc_attr(get_theme_mod('lawman_main_service_icons_'.($i+1).'', 'newspaper')) ;?> fa-3x"></i>
                </div><!-- .icon-container -->
                <header class="entry-header">
                        <span><?php echo esc_html( get_theme_mod('lawman_main_service_title_'.($i+1).'', __('Book An', 'lawman')) ) ;?></span>
                        <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo $content['title']; ?></a></h2>
                </header>

            </article><!-- .hentry -->
        <?php endforeach ; ?>
        </div>
    </div><!-- .wrapper -->
</div><!-- #main-services -->
        