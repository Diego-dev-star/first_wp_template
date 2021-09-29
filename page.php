<?php
/**
 * Created by PhpStorm.
 * User: mlata
 * Date: 05.02.2020
 * Time: 13:27
 */?>
<?php
get_header();

?>
<?php get_template_part('template-part/allpagehead');?>
<section class="single_blog_area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="row no-gutters">
                    <!-- Single Post -->
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                        <div class="col-10 col-sm-11">
                            <div class="single-post marg-50">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <?php the_post_thumbnail()?>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content ">
                                    <h4><?php the_title();?></h4>
                                    <?php the_excerpt(); ?>
                                    <div class="post-panel">
                                        <a class="btn fancy-btn fancy-active" href="<?php the_permalink();?>">
                                            <i class="fa fa-eye"></i> <?php _e('Read more')?>
                                        </a>
                                    </div>

                                    <!-- blockquote -->
                                </div>
                            </div>
                        </div>

                    <?php endwhile; else: ?>
                        <div class="single-post marg-50">
                            <div class="post-thumb" style="text-align: center;">
                                <img src="<?php echo get_template_directory_uri(). '/nocontent.png';?>" />
                            </div>
                            <div class="post-content ">
                                <blockquote class="fancy-blockquote">
                                    <span class="quote playfair-font">“</span>
                                    <h5 class="mb-4">
                                        <p><?php _e('no content');?></p>
                                        <p><?php _e('try agin');?></p>
                                    </h5>
                            </div>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php get_template_part('template-part/sidebar'); ?>
        </div>


    </div>
</section>

<?php get_footer();?>
