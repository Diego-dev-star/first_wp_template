<?php
/**
 * Created by PhpStorm.
 * User: mlata
 * Date: 18.12.2019
 * Time: 15:48
 */ ?>

<div class="row">
    <div class="col-12">
        <div class="section-heading text-center">
            <h2><?php _e('Latest News')?></h2>
            <p><?php _e('We Are A Creative Digital Agency. Focused on Growing Brands Online')?></p>
        </div>
    </div>
</div>

<div class="row">
    <!-- Single Blog -->

   <?php  $the_query = new WP_Query( array(
       'category'         => 0,
       'posts_per_page' => 3,
   ));?>

    <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="col-12 col-md-4">
        <div class="single-blog-area wow fadeInUp" data-wow-delay="0.5s">
            <img src="<?php the_post_thumbnail_url( 'homepage-news');?>" alt="<?php the_title()?>" style="min-height: 195px; max-height: 195px">
            <div class="blog-content">
                <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                <p><?php the_excerpt();?></p>
                <a href="<?php the_permalink();?>"><?php _e('Learn more');?></a>
            </div>
        </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif;?>
