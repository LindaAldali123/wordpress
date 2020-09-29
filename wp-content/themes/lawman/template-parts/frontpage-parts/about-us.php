<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$about = get_theme_mod( 'lawman_about', 'disable' );

// Bail if the section is disabled.
if ( 'disable' === $about ) {
    return;
}
$content_details = lawman_get_section_content( 'about', $about, 1 );

?>
<div id="about-us" class="page-section clear">
    <div class="wrapper">
        <?php foreach($content_details as $content):?>
        <article class="has-post-thumbnail">
            <div class="featured-image" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($content['id'], 'medium_large')); ?>');">
                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link"></a>
            </div><!-- .featured-image -->

            <div class="entry-container">
                 <div class="section-header">
                    <h2 class="section-title">
                        <?php echo esc_html( $content['title'] ) ; ?>
                    </h2>
                </div><!-- .section-header -->
                <div class="entry-content">

                    <p><?php echo esc_html( wp_trim_words( $content['content'], get_theme_mod( 'lawman_about_exerpt', 30 ) )  ) ; ?></p>

                    <?php if ( !empty( get_theme_mod( 'lawman_about_btn_title', __( 'About Us', 'lawman' ) ) ) ): ?>
                    <div class="read-more">
                        <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn">
                            <?php echo esc_html( get_theme_mod( 'lawman_about_btn_title', __( 'View Full Stories', 'lawman' ) ) ) ; ?>
                        </a>
                    </div><!-- .read-more -->
                    <?php endif; ?>

                </div><!-- .entry-content -->
            </div><!-- .entry-container -->
        </article>
        <?php endforeach; ?>
    </div><!-- .wrapper -->
</div><!-- #about -->