<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-heading heading-white text-center">
                <h2><?php echo get_theme_mod('true_display_work_title');?></h2>
                <p><?php echo get_theme_mod('true_display_work_slogan');?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Single Service -->
        <?php if ( function_exists('dynamic_sidebar') )
            dynamic_sidebar('homepage-service');
        ?>

        </div>
    </div>

