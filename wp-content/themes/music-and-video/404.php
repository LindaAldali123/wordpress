<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>
	<div class="content-area">

			<section class="error-404 not-found">
				<header class="page-header"> </header><!-- .page-header -->
				<p><?php esc_html_e( 'Error 404', 'music-and-video' ); ?></p>
				<div class="page-content">
					<p class="cont-404"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'music-and-video' ); ?></p>
					<?php get_search_form( 'search-form' ); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

	</div><!-- #primary -->
<?php
get_footer();
