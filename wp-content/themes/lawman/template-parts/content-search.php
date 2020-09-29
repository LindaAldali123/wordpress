<?php
/**
 * Template part for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */

?>

<?php
$archive_img_enable = get_theme_mod( 'lawman_enable_archive_featured_img', true );
 if (has_post_thumbnail() && $archive_img_enable) {
	$classes ='has-post-thumbnail';
} else {
	$classes ='no-post-thumbnail';
}?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="<?php echo esc_attr($classes); ?>">
	<?php
	$archive_img_enable = get_theme_mod( 'lawman_enable_archive_featured_img', true );
	$img_url = '';
	if ( has_post_thumbnail() && $archive_img_enable ) :
		$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	?>
		<div class="featured-image" style="background-image: url('<?php echo esc_url( $img_url ); ?>');">
			<?php
			if ( ! empty( $img_url ) ) : ?>
		    	<a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
			<?php endif; ?>
		</div><!-- .featured-image -->
	<?php	
	endif;
	?>
		
		<div class="entry-container">
		<?php
			$archive_date_enable = get_theme_mod( 'lawman_enable_archive_date', true );
			$archive_category_enable = get_theme_mod( 'lawman_enable_archive_cat', true );
		?>
			   
	        <?php
			if ( $archive_category_enable ) {
				the_category('', '');
			}
			?>
	        <header class="entry-header">
	            <?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
	        </header>
	        <div class="entry-content">
	            <?php
					$archive_content_type = get_theme_mod( 'lawman_enable_archive_content_type', 'excerpt' );
					if ( 'excerpt' === $archive_content_type ) {
						the_excerpt();
						?>
					<?php
					} else {
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
					}
				?>
	       </div><!-- .entry-content -->
        	
	    <div class="entry-meta">
	    	<?php
	    		if ( $archive_date_enable ) {
					lawman_posted_on();
				}
	    	?>
	    </div>
</article><!-- #post-<?php the_ID(); ?> -->
