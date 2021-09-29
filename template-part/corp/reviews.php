<?php
/**
 * Created by PhpStorm.
 * User: mlata
 * Date: 18.12.2019
 * Time: 10:37
 */

?>
<!-- ***** Testimonials Area Start ***** -->

                <div class="testimonials-slides owl-carousel">
                    <!-- Single Testimonial -->
                    <?php foreach (get_comments() as $comment): ?>
                        <?php if ($comment->comment_approved == '1') : ?>
                    <div class="single-testimonial d-md-flex align-items-center">
                        <!-- Testimonial Thumb -->
                        <div class="testimonial-thumbnail">
                            <?php echo get_avatar($small);?>
                        </div>
                        <!-- Content -->
                        <div class="testimonilas-content">
                            <span class="playfair-font quote">“</span>
                            <h5><?php echo $comment->comment_content; ?> </h5>
                            <h6><?php echo $comment->comment_author; ?> -<span><?php echo $comment->comment_date;?></span></h6>
                        </div>
                    </div>
                            <?php endif;?>
                    <?php endforeach; ?>
                    <!-- Single Testimonial -->
                </div>

<!-- ***** Testimonials Area End ***** -->
