<?php get_header(); ?>
<?php get_template_part('template-part/allpagehead'); ?>

<section class="single_blog_area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
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
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <?php the_post_thumbnail() ?>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <?php the_content() ?>
                                </div>

                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php get_template_part('template-part/sidebar'); ?>
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

