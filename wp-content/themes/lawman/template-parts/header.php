<header id="masthead" class="site-header" role="banner">
    <div class="wrapper">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo">
                <?php the_custom_logo(); ?>
            </div><!-- .site-logo -->
            <?php endif; ?>
            <?php if ( get_theme_mod( 'lawman_header_text_display', true ) == true ): ?>
            <div id="site-identity">
                <?php
                if ( is_front_page() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php
                endif; ?>
            </div><!-- .site-identity -->
            <?php endif; ?>

        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'lawman'); ?>">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <svg viewBox="0 0 40 40" class="icon-menu">
                    <g>
                        <rect y="7" width="40" height="2" />
                        <rect y="19" width="40" height="2" />
                        <rect y="31" width="40" height="2" />
                    </g>
                </svg>
                <svg viewBox="0 0 612 612" class="icon-close">
                    <polygon points="612,36.004 576.521,0.603 306,270.608 35.478,0.603 0,36.004 270.522,306.011 0,575.997 35.478,611.397 
                306,341.411 576.521,611.397 612,575.997 341.459,306.011" />
                </svg>
            </button>
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <?php
                wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'menu nav-menu',                    
            ) );
            ?>

            <?php elseif( current_user_can( 'edit_theme_options' ) ): ?>
            <ul id="primary-menu" class="menu nav-menu">
                <li>
                    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php echo esc_html__( 'Add a menu', 'lawman' );?></a>
                </li>
            </ul>
            <?php endif; ?>
        </nav>
    </div><!--wrapper -->
    
</header><!-- #masthead -->