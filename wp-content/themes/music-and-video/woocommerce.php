<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * WooCommerce template file.
 *
**/
get_header(); ?>
<div class="woo-page">
	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
		
			<article id="post-<?php the_ID(); ?>">

				<?php woocommerce_content(); ?>
						
			</article>
		
		</main><!-- #main -->
		
	</div><!-- #primary -->
</div>	
<?php 
get_sidebar();
get_footer();
