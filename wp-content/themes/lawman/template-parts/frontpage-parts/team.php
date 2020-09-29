<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$team = get_theme_mod( 'lawman_team', 'disable' );

// Bail if the section is disabled.
if ( 'disable' === $team ) {
	return;
}

$content_details = lawman_get_section_content( 'team', $team, 4 );

?>

<div id="team" class="page-section no-padding-bottom">
    <div class="wrapper">
        <div class="section-header-wrapper">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('lawman_team_title',__('Meet Our Expert Attorneys','lawman'))); ?></h2>
            </div><!-- .section-header -->
        </div>
        <div class="team-wrapper col-4 clear">
            <?php foreach ($content_details as $content): ?>

            <article class="hentry">
                <div class="team-item-wrapper">
                    <div class="featured-image" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url($content['id'],'medium_large')); ?>')">
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo $content['title']; ?></a></h2>
                        </header>
                    </div><!-- .entry-container -->
                </div><!-- .team-item-wrapper -->
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>
