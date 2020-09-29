<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */


// Get the content type.
$related = get_theme_mod( 'lawman_related', 'disable' );

// Bail if the section is disabled.
if ( 'disable' === $related ) {
    return;
}

$content_detail = lawman_get_section_content( 'related', $related, 6 );

?>

<div id="related-posts" class="page-section same-background">
    <div class="wrapper">
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'lawman_related_title',  __( 'You May Also Like...', 'lawman' ) ) ) ?></h2>

        </div><!-- .section-header -->
        <div class="featured-post-wrapper col-3 clear"> 
        <?php foreach ($content_detail as $content): ?>

            <article class="has-post-thumbnail">

                    <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'], 'medium_large' ) ) ; ?>');">
                        <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <?php the_category( '', '', $content['id'] ); ?>

                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                        </header>

                        <div class="entry-content">
                            <p><?php echo wp_kses_post( wp_trim_words( $content['content'], get_theme_mod( 'lawman_related_exerpt', 30) )  ) ; ?></p>
                        </div>

                        <div class="entry-meta">
                            <?php lawman_posted_on( $content['id'] ) ; ?>
                        </div><!-- .entry-meta -->
                    </div><!-- .entry-container -->

            </article>
            <?php endforeach;?>

        </div><!-- .col-3 -->
    </div><!-- .wrapper -->
</div><!-- .related-posts -->