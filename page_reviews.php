<?php
/*
Template Name: reviews
*/

?>
<?php get_header(); ?>

<body>


<?php get_template_part('template-part/allpagehead'); ?>


<section class="single_blog_area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="row no-gutters">
                    <!-- Single rewiev Post -->
                    <div class="col-10 col-sm-11">
                        <h2><?php the_title() ?></h2>
                        <?php comments_template(); ?>
                    </div>

                    <div class="col-10 col-sm-11 rew-page">
                        <h2><?php _e('All rewievs') ?></h2>
	                    <?php wp_list_comments('type=comment&callback=blessed_comment')?>
                    </div>
                </div>


            </div>

            <?php get_template_part('template-part/sidebar'); ?>
        </div>
</section>


<?php get_footer() ?>
</body>