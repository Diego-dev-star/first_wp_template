<?php $the_query = new WP_Query('p=359'); ?>
<?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
<div class="col-12 col-lg-6">
    <div class="about-us-text">
        <h2><?php the_title(); ?></h2>
        <?php the_excerpt(); ?>
        <a href="<?php echo get_permalink()?>" class="btn fancy-btn fancy-dark"><?php _e('Read more')?></a>
    </div>
</div>

<div class="col-12 col-lg-6 col-xl-5 ml-xl-auto">
    <div class="about-us-thumb wow fadeInUp" data-wow-delay="0.5s">
        <?php echo get_the_post_thumbnail();?>

    </div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata();?>