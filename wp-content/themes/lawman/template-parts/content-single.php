<?php
/**
 * Template part for displaying content  in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>
	<?php
	$lawman_enable_single_featured_img = get_theme_mod( 'lawman_enable_single_featured_img', true );
	if ( has_post_thumbnail() && $lawman_enable_single_featured_img ) : ?>
		<div class="featured-image">
	        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</div><!-- .featured-post-image -->
	<?php endif; ?>

	<div class="entry-container">
		<div class="entry-meta">
		<?php
			lawman_cats();
		    $single_date_enable = get_theme_mod( 'lawman_enable_single_date', true );
			if ( $single_date_enable ) {
	    		lawman_posted_on();
	    	}
	    ?>
		</div><!-- .entry-meta -->
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</header>
	    <div class="entry-content">
	        <?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lawman' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lawman' ),
				'after'  => '</div>',
			) );
			?>
	    </div><!-- .entry-content -->
	    <?php
	    lawman_tags();
	    $single_author_enable = get_theme_mod( 'lawman_enable_single_author', true );
	    if ( $single_author_enable ) {
	    	lawman_post_author();
	    } ?>
	</div><!-- .entry-container -->

</article>