<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */


// Get the content type.
$cta = get_theme_mod( 'lawman_cta', 'disable' );


// Bail if the section is disabled.
if ( 'disable' === $cta ) {
    return;
}

$content_detail = lawman_get_section_content( 'cta', $cta, 1 );

?>

<?php foreach ($content_detail as $content): ?>

<div id="cta" class="page-section"  style="background-image: url('<?php echo esc_url( get_theme_mod('lawman_cta_background_image') ); ?>');">
    <div class="wrapper">
        <article class="has-post-thumbnail">
            <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'], 'medium_large' ) ) ?>');">
                <a href="<?php echo esc_url( $content['url'] ) ?>" class="post-thumbnail-link"></a>
            </div><!-- .featured-image -->

            <div class="entry-container">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                </div><!-- .section-header -->
                <div class="entry-content">
                    <p>
                        <?php echo esc_html( wp_trim_words( $content['content'], get_theme_mod( 'lawman_cta_exerpt', 50) )  ) ; ?>
                    </p>

                    <?php if ( !empty( get_theme_mod( 'lawman_cta_btn_title', __('Make an Appointment','lawman') ) ) ): ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ) ?>" class="btn">
                                <?php echo esc_html( get_theme_mod( 'lawman_cta_btn_title', __('Make an Appointment','lawman') ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?> 
                </div><!-- .entry-content -->
            </div><!-- .entry-container -->
        </article>
    </div><!-- .wrapper -->
</div><!-- #cta -->
<?php endforeach; ?>
