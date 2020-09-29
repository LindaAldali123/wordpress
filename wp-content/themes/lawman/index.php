<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */

get_header(); ?>
	<div id="inner-content-wrapper" class="page-section">
        <div class="wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div class="archive-blog-wrapper list-layout clear <?php echo ( get_theme_mod( 'lawman_archive_sidebar') == 'no' ) ? 'col-3' : ''; ?>">

						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php  
								$breadcrumb_enable = get_theme_mod( 'lawman_breadcrumb_enable', true );
								if ( $breadcrumb_enable ) : 
								    ?>
								    <div id="breadcrumb-list">
								        <div class="wrapper">
								            <?php echo lawman_breadcrumb( array( 'show_on_front'   => false, 'show_browse' => false ) ); ?>
								        </div><!-- .wrapper -->
								    </div><!-- #breadcrumb-list -->
								<?php endif; ?>

							<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							wp_reset_postdata();


						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div>
					<?php lawman_posts_pagination(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!-- .wrapper -->
    </div><!-- #inner-content-wrapper-->
<?php
get_footer();
