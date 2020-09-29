<?php
/**
 * The template for displaying attachments
 *
 */
get_header();
?>

	<div id="content-center">

		<div id="primary" class="content-area">

			<main id="main" class="site-main app-post" role="main">
				<article>
					<?php
					while ( have_posts() ) :
						the_post();
						?>
					<header>
						<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
					</header>
						<?php
						echo wp_get_attachment_image( get_the_ID() );
						the_content();
					endwhile; // End of the loop.
					?>
				</article>
				<!--
				<div class="postnav">
					<div class="nav-previous"><span class="meta-nav"><i class="fa fa-caret-left"></i></span>
						<?php previous_image_link( '%link', __( ' Previous', 'music-and-video' ) ); ?>
					</div>
					<div class="nav-next">
						<?php next_image_link( '%link', __( 'Next ', 'music-and-video' ) ); ?>
						<span class="meta-nav"><i class="fa fa-caret-right"></i></span>
					</div>
				</div>
				-->				
			</main><!-- #main -->

		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>

<?php
get_footer();
