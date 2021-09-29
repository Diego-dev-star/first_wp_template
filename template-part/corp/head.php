<header class="header_area" id="header">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <nav class="h-100 navbar navbar-expand-lg align-items-center">
                    <a class="navbar-brand" href="<?php echo pll_home_url()?>"><?php _e('Blessed-firm'); ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fancyNav" aria-controls="fancyNav" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
                    <div id="fancyNav" class="navbar-collapse collapse">
                        <?php wp_nav_menu( [
                            'theme_location'  => 'navigation',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'navbar-nav ml-auto main-nav',
                            'menu_id'         => 'main-menu',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'depth'           => 0,
                            'walker'          => '',
                        ] );
                        ?>

                        <!-- Search & Shop Btn Area -->

                        <div class="fancy-search-and-shop-area">
                            <a id="search-btn" href="#"><i class="icon_search" aria-hidden="true"></i></a>

                            <a id="shop-btn" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php //$flags = pll_the_languages( array( 'show_flags' => 1 ,'show_names' => 1) );?>
                                <?php echo pll_current_language()?>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-right lang">
                                <?php pll_the_languages( array( 'show_flags' => 1,'show_names' => 1,  ) ); ?>
                            </ul>

                        </div>
                    </div>

                </nav>
            </div>
        </div>
    </div>
</header>
<div class="fancy-hero-area bg-img bg-overlay animated-img"
     style="background-image: url(<?php echo get_theme_mod( 'true_corporate_image' )?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="fancy-hero-content text-center">
                    <!-- Video Overview -->
                    <div class="video-overview">
                        <a href="<?php echo get_theme_mod('true_youtube-corporate');?>" class="video--play--btn">
                            <i class="fa fa-play" aria-hidden="true"></i><?php _e('Watch The Overview')?>
                        </a>
                    </div>
                    <h2 class="white"><?php echo get_bloginfo( 'description' ); ?></h2>
                    <a href="<?php echo pll_home_url(). '/ru/2020/01/30/about/'?>" class="btn fancy-btn fancy-active"><?php _e('About Us')?></a>
                    <a href="#" class="btn fancy-btn"><?php _e('Get Your job');?></a>
                </div>
            </div>
        </div>
    </div>
</div>
