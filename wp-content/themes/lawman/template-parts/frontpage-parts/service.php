<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$service = get_theme_mod( 'lawman_service', 'disable' );
$service_num = get_theme_mod( 'lawman_service_num', 4 ); 
$home_layout = get_theme_mod( 'lawman_homepage_layout', 'first-design' ) ;

// Bail if the section is disabled.
if ( 'disable' === $service ) {
    return;
}

$content_details = lawman_get_section_content( 'service', $service, $service_num );

?>
<div id="our-services" class="relative page-section no-padding-bottom same-background" style="background-image: url('<?php echo esc_url( get_theme_mod('lawman_service_image_2' ) ); ?>');">
    <div class="wrapper">
        <article class="has-post-thumbnail">
            <?php if( !empty( get_theme_mod('lawman_service_image_1') ) ) : ?>
                <div class="featured-image">
                    <img src="<?php  echo esc_url( get_theme_mod('lawman_service_image_1') ); ?>" alt="our-service-image.jpg">
                </div><!-- .featured-image -->
            <?php endif; ?>
            <div class="entry-container">
                <div class="section-header">
                    <p class="section-subtitle"><?php echo esc_html(get_theme_mod('lawman_service_sub_title',__('Our Services','lawman'))); ?></p>
                    <h2 class="section-title"><?php echo esc_html(get_theme_mod('lawman_service_title',__('We Are Here To Help You Grow','lawman'))); ?></h2>
                </div><!-- .section-header -->

                <div class="col-2 clear">
                <div class="hentry">

                        <?php foreach($content_details as $i => $content ): ?>

                        <article>
                            <div class="service-item-wrapper">
                                <div class="service-icon">
                                <i class="fas fa-<?php echo esc_attr(get_theme_mod('lawman_service_icons_'.($i+1).'', 'newspaper')) ;?> fa-3x"></i>
                    
                                </div>
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo $content['title']; ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( wp_trim_words( $content['content'], get_theme_mod( 'lawman_slider_exerpt', 30 ) )  ) ; ?></p>
                                </div><!-- .entry-content -->
                            </div><!-- .service-item-wrapper -->
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div><!-- .col-3 -->
            </div>
        </article>
    </div><!-- .wrapper -->
</div><!-- #our-services -->