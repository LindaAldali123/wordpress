<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$slider = get_theme_mod( 'lawman_slider', 'disable' );

// Bail if the section is disabled.
if ( 'disable' === $slider ) {
	return;
}

$content_details = lawman_get_section_content( 'slider', $slider, 3 );
?>


<div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>
    <?php foreach($content_details as $content ): ?>
    <article style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url($content['id'],'full')); ?>');">
        <div class="overlay"></div>
        <div class="wrapper">
            <div class="featured-content-wrapper">
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo $content['title']; ?></a></h2>
                </header>

                <div class="entry-content">
                    <p><?php echo esc_html( wp_trim_words( $content['content'], get_theme_mod( 'lawman_slider_exerpt', 30 ) )  ) ; ?></p>
                </div><!-- .entry-content-->

                <div class="read-more">
                    <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html(get_theme_mod('lawman_slider_btn_title', __('Free Consultation','lawman')));?></a>
                </div><!-- .read-more -->
            </div><!-- .featured-content-wrapper -->
        </div><!-- .wrapper -->
    </article>
    <?php endforeach; ?>
</div><!-- #featured-slider -->
