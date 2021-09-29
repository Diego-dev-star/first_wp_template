<?php
/**
 * Created by PhpStorm.
 * User: mlata
 * Date: 08.07.2020
 * Time: 16:30
 */
get_header();
global $post_id;
$categories_id = get_terms( array(
        'taxonomy'      => array( 'job_category' ), // название таксономии с WP 4.5
        'orderby'       => 'id',
        'order'         => 'ASC',
        'name'          => $post_id,    // str/arr поле name для получения термина по нему. C 4.2.

));
$category = get_cat_name($categories_id);


?>
<?php get_template_part('template-part/allpagehead');?>



<section class="single_blog_area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row no-gutters">
                    <!-- Single Post Share Info -->
                    <div class="col-2 col-sm-1">
                        <div class="single-post-share-info">
                            <a href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=[<?php the_title() ?>]&p%5Bsummary%5D=[<?php the_excerpt() ?>]&p%5Burl%5D=[<?php the_permalink()?>]&p%5Bimages%5D%5B0%5D=[<?php the_post_thumbnail_url() ?>]" target="_blank" onclick="return Share.me(this);"
                               class=" facebook" name="fb_share">
                                <i class="fa fa-facebook" aria-hidden="true"></i></a>

                            <a href="https://vk.com/share.php?url=<?php the_permalink() ?>" target="_blank"
                               onclick="return Share.me(this);" class="vk"><i class="fa fa-vk"
                                                                              aria-hidden="true"></i></a>
                            <a href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank"
                               onclick="return Share.me(this);" class="googleplus"><i class="fa fa-google-plus"
                                                                                      aria-hidden="true"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://www.pinterest.com/pin/create/bookmarklet/?description=<?php get_the_title($id) ?>&url=<?php the_permalink() ?>"
                               target="_blank" onclick="return Share.me(this);" class="pinterest"><i
                                    class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Post -->
                    <div class="col-10 col-sm-11">
                        <?php
                        while (have_posts()) :
                            the_post(); ?>
                            <div class="single-post">
                                <div class="row">
                                <!-- Post Thumb -->
                                <div class="post-thumb col-6">
                                    <?php
                                    $images = get_field('photo');
                                    if( $images ): ?>
                                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php if ( has_post_thumbnail() ) :?>
                                            <div class="carousel-item active">
                                                <div class="photo-post"
                                                     style="background: url(<?php the_post_thumbnail_url()?>); width: 100%; height:550px; background-size:cover; " ></div>
                                            </div>
                                            <?php endif;?>
                                            <?php foreach ($images as $image):?>
                                                <div class="carousel-item">
                                                    <div class="photo-thumbs" style="background:url(<?php echo $image?>);  width: 100%; height:540px; background-size:cover;" data-target="#carouselExampleIndicators" data-slide-to="0"></div>
                                                </div>
                                            <?php endforeach;?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        <div class="container pt-4 pb-5">
                                            <div class="row carousel-indicators carousel-custom">
                                                <?php foreach ($images as $image):?>
                                                <div class="col-md-4 item">
                                                    <div class="photo-ol"
                                                         style="background:url(<?php echo $image?>);  width: 100%; height:100px; background-size:cover;"></div>
                                                </div>


                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ($images == null):?>
                                    <img src="<?php the_post_thumbnail_url()?>">
                                    <?php endif;?>
                                </div>

                                    <!-- Post Content -->
                                <div class="post-content col-6">
                                    <h2><?php the_title()?></h2>
                                    <div class="line"></div>
                                    <div class="job-items sing">
                                        <div class="city"><i class="fa fa-building"></i><?php echo get_post_meta( $post->ID, 'city', true );?></div>
                                        <div class="job-cat"><i class="fa fa-briefcase"></i><?php echo $categories_id[0]->name?></div>
                                        <div class="date"><i class="fa fa-calendar"></i><?php the_date('M d')?></div>
                                        <div class="view"><i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></div>
                                        <div class="view"><i class="fa fa-users"></i><?php the_field('sex'); ?></div>
                                </div>
                                    <?php the_content() ?>


                                </div>

                            </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
            </div>
        </div>
    </div>
</section>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php get_footer() ?>




<?php get_footer()?>
