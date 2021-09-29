
<!-- ***** Footer Area Start ***** -->
<footer class="fancy-footer-area fancy-bg-dark">
    <div class="footer-content section-padding-80-50">
        <div class="container">
            <div class="row">
                <!-- Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <h6><?php _e('Our Newsletter');?></h6>
                        <p><?php _e('Subscribe to our mailing list to get the updates to your email inbox.')?></p>
                         <?php echo do_shortcode('[email-subscribers-form id="1"]')?>
                        <div class="footer-social-widegt d-flex align-items-center">
                           <a href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=[TITLE]&p%5Bsummary%5D=[TEXT]&p%5Burl%5D=[LINK]&p%5Bimages%5D%5B0%5D=[IMAGE]" target="_blank" onclick="return Share.me(this);" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://vk.com/share.php?url=[LINK]" target="_blank" onclick="return Share.me(this);" class="vk"><i class="fa fa-vk" aria-hidden="true"></i></a>
                            <a href="https://plus.google.com/share?url=[LINK]" target="_blank" onclick="return Share.me(this);" class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://www.pinterest.com/pin/create/bookmarklet/?description=<?=get_the_title($id)?>&url=[LINK]" target="_blank" onclick="return Share.me(this);" class="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <h6><?php _e('Our news');?></h6>
                        <?php
                        // VARS
                        $posts = get_posts( array(
                            'numberposts' => 3,
                            'category'    => 0,
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'include'     => array(),
                            'exclude'     => array(),
                            'meta_key'    => '',
                            'meta_value'  =>'',
                            'post_type'   => 'post',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );
                        wp_reset_postdata();?>

                        <div class="single-tweet">
                            <?php foreach( $posts as $post ){
                            setup_postdata($post);?>
                            <a href="<?php the_permalink();?>"><i class="far fa-comment-alt"></i><?php the_title();?> </a>
                            <span><?php the_date('j F Y');?></span>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <!-- Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <h6><?php _e('Categories')?></h6>
                        <nav>
                            <ul>
                            <?php $all_categories = get_categories('hide_empty=0');
                            $category_link_array = array();
                            foreach( $all_categories as $single_cat ){
                            $category_link_array[] = '<li><a href="' . get_category_link($single_cat->term_id) . '"><i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . $single_cat->name . '</a></li>';
                            }
                            echo implode($category_link_array);
                            ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <h6><?php _e('Contact Us');?></h6>
                        <p><?php echo get_theme_mod('true_display_phone');?>
                            <br><?php echo get_theme_mod('true_display_phone_2');?>
                            <br><?php echo get_theme_mod('true_display_email');?>
                        </p>
                        <p><?php echo get_theme_mod('true_display_street');?> <br><?php echo get_theme_mod('true_display_city');?></p>
                        <p><?php _e('Open hours');?>: <?php echo get_theme_mod('true_display_time');?>
                        <?php echo get_theme_mod('true_display_day');?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Copywrite -->
    <div class="footer-copywrite-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="copywrite-content h-100 d-flex align-items-center justify-content-between">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                &copy <?php echo get_theme_mod('true_footer_copyright_text')?>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                        <!-- Footer Nav -->
                        <!-- Modal -->


                        <div class="footer-nav">
                            <?php wp_nav_menu( [
                                    'theme_location'  => 'footer',
                                    'menu'            => '',
                                    'container'       => 'nav',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'depth'           => 0,
                                    'walker'          => '',
                                ] );?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a id="scrollUp" class="viber" href="viber://chat?number=<?php phone_rand()?>"> <i class="fa fa-phone"" aria-hidden="true"></i></a>
    </div>
</footer>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0">
            <?php $the_query = new WP_Query('p=156'); ?>
            <!-- Modal Header -->
            <?php while  ($the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="modal-header">
               <h2><?php the_title(); ?></h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                    <?php the_content(); ?>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata();?>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script>
        Share = {
            me : function(el){
                Share.popup(el.href);
                return false;
            },

            popup: function(url) {
                window.open(url,'','toolbar=0,status=0,width=626,height=436');
            }
        };
</script>
<script src="<?php echo get_template_directory_uri().'/js/jquery/jquery-2.2.4.min.js'?>"></script>
<!-- Popper js -->
<script src="<?php echo get_template_directory_uri(). "/js/bootstrap/popper.min.js"?>"></script>
<!-- Bootstrap-4 js -->
<script src="<?php echo get_template_directory_uri(). "/js/bootstrap/bootstrap.min.js"?>"></script>
<!-- All Plugins js -->
<script src="<?php echo get_template_directory_uri(). '/js/others/plugins.js'?>"></script>
<!-- Active JS -->
<script src="<?php echo get_template_directory_uri(). "/js/active.js"?>"></script>
<script src="<?php echo get_template_directory_uri(). "/js/modal.js"?>"></script>
<?php wp_footer()?>

<!-- ***** Footer Area End ***** -->
