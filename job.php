<?php
/**
 * Created by PhpStorm.
 * User: mlata
 * Date: 03.07.2020
 * Time: 13:33
 */

/*
Template Name: Job work template
*/
get_header();
?>

<?php get_template_part('template-part/allpagehead'); ?>
<section class="single_blog_area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="col-12">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <h4><?php _e('Сортировать:');
                                the_title() ?></h4
                            <p><?php _e('Вакансия для тебя') ?></p>
                        </div>
                        <?php// the_custom_job_front() ?>

                    </div>
                </div>
                <div class="row no-gutters">
                    <?php
                    $categories = get_categories(array(
                        'type' => 'post',
                        'child_of' => 0,
                        'parent' => '',
                        'orderby' => 'ID',
                        'order' => 'ASC',
                        'hide_empty' => 0,
                        'hierarchical' => 1,
                        'exclude' => '',
                        'include' => '',
                        'number' => '',
                        'taxonomy' => 'job_category',
                        'pad_counts' => false));
                    foreach ($categories as $category) {
                        $cat = $category->cat_ID;

                        $args = array(
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'job_category',
                                    'field' => 'id',
                                    'terms' => $cat,
                                )
                            ),
                            'post_type' => 'job',
                            'posts_per_page' => -1
                        );
                        $posts = get_posts($args);
                        if ($posts) {
                            foreach ($posts as $post) :
                                setup_postdata($post);?>
                    <div id="job-<?php echo $category->cat_ID ?>" class="job-post">
                        <div class="row">
                            <div class="col-lg-4 col-ld-6">
                                <div class="photo-cont">
                                    <div class="job-photo"
                                         style="background: url(<?php echo get_the_post_thumbnail_url() ?>)center center;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-ld-6">
                                <h4 class="title custom"><?php the_title(); ?> <?php $hot = get_field('hot');
                                    if ($hot == true):?>
                                        <span class="hot"><i class="fa fa-fire" aria-hidden="true"></i></span>

                                    <?php elseif ($hot == false): ?>
                                        <?php echo ''; ?>
                                    <?php endif; ?>
                                </h4>
                                <div class="job-text">
                                    <?php the_excerpt() ?>
                                </div>
                                <div class="line"></div>
                                <div class="job-items">
                                    <div class="city"><i
                                                class="fa fa-building"></i><?php echo get_post_meta($post->ID, 'city', true); ?>
                                    </div>
                                    <div class="job-cat"><i class="fa fa-briefcase"></i><?php echo $category->cat_name; ?>
                                    </div>
                                    <div class="date"><i class="fa fa-calendar"></i><?php the_date('M d') ?></div>
                                    <div class="view"><i
                                                class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?>
                                    </div>
                                </div>
                                <a href="<?php the_permalink() ?>" class="job-btn"><?php _e('read more'); ?></a>

                            </div>
                        </div>
                    </div>
                            <?php endforeach;?>

                        <?php }?>
                   <?php } ?>
                    <!-- Single Post -->

                </div>

                <?php wp_reset_query(); ?>
            </div>
            <?php get_template_part('template-part/sidebar'); ?>
        </div>

</section>

<?php get_footer(); ?>
