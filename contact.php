<?php
/*
Template Name: contact
*/
?>
<?php get_header()?>

<?php get_template_part('template-part/allpagehead');?>

<div class="fancy-contact-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Google Map -->
                <h2 style="text-align: center"><?php _e('Address')?></h2>
                <?php echo do_shortcode('[yamap center="52.179416, 20.996206" height="35rem" zoom="13" type="yandex#map" controls="trafficControl;geolocationControl;routeButtonControl"][yaplacemark coord="52.179416, 20.996206" icon="islands#redCircleDotIcon" color="#7b59fe" name="Blassed-firm"][/yamap]')?>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <!-- Contact Details -->
                <div class="contact-details-area">
                    <div class="section-heading">
                        <h2><?php the_title()?></h2>
                        <?php echo the_excerpt();?>
                    </div>
                    <p><?php echo get_theme_mod('true_display_phone');?><br> <?php echo get_theme_mod('true_display_email');?>
                    </p>
                    <p><?php echo get_theme_mod('true_display_street');?> <br> <?php echo get_theme_mod('true_display_city');?></p>
                    <p><?php _e('Open hours');?>: <?php echo get_theme_mod('true_display_time');?>
	                    <?php echo get_theme_mod('true_display_day');?></p>
                </div>
                <!-- Follow Us -->
                <div class="follow-us-area">
                    <h2><?php _e('Follow Us :');?></h2>
                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <!-- Contact Form -->
                <div class="contact-form-area">
                    <div class="section-heading">
                        <h2><?php _e( 'Get In Touch With Us!')?></h2>
                        <p><?php _e( 'Fill out the form below to recieve a free and confidential.')?></p>
                    </div>
                    <div class="contact-form">
                        <form action="<?php get_template_directory_uri(). '/mailer/mail.php'?>" enctype="text/plain" method="post">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="<?php _e('Name' )?>" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="<?php _e('E-mail' )?>" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="company" id="company" placeholder="<?php _e('company' )?>" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="<?php _e('message' )?>" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Single Input Area -->
                                    <div class="col-12">
                                        <button type="submit" class="btn fancy-btn fancy-dark bg-transparent"><?php _e('Send message');?></button>
                                    </div>
                            </div>
                        </form>
                    </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>

