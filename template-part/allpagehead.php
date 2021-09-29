<div id="preloader">
    <div class="loader">
        <span class="inner1"></span>
        <span class="inner2"></span>
        <span class="inner3"></span>
    </div>
</div>

<!-- Search Form Area -->
<div class="fancy-search-form d-flex align-items-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Form -->
                <?php get_search_form()?>
            </div>
        </div>
    </div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header_area" id="header">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <nav class="h-100 navbar navbar-expand-lg align-items-center">
                    <a class="navbar-brand logo" href="<?php echo pll_home_url()?>"><?php the_custom_logo()?></a>
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
<!-- ***** Header Area End ***** -->
<!-- ***** Breadcumb Area Start ***** -->
<div class="fancy-breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_theme_mod( 'true_background_image' )?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content text-center">
                    <?php if( is_category() )?>
                    <h2><?php echo get_queried_object()->name;?></h2>
                    <nav>
                        <?php echo do_shortcode('[flexy_breadcrumb]')?>
                    </nav>
                    </div>
                    <!-- Breadcumb -->
                    <nav>
                        <?php if ( function_exists( 'blessed_breadcrumbs' ) ) blessed_breadcrumbs(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Breadcumb Area End ***** -->