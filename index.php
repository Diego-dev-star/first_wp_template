<?php get_header();?>

<body>
<div id="preloader">
    <div class="loader">
        <span class="inner1"></span>
        <span class="inner2"></span>
        <span class="inner3"></span>
    </div>
</div>

<div class="fancy-search-form d-flex align-items-center">
    <div class="container-fluid">
        <div class="row">
            <?php echo get_search_form()?>
        </div>
    </div>
</div>

<?php get_template_part('template-part/truehead');?>
<section class="fancy-about-us-area bg-gray">
    <div class="container">
        <div class="row">
            <?php get_template_part('template-part/mainpage/weare');?>
        </div>
        </div>
</section>

<!-- ***** About Us Area Start ***** -->
<section class="fancy-about-us-area bg-gray">
    <div class="container">
        <div class="row">
        <?php get_template_part('template-part/mainpage/about');?>
        </div>
    </div>
</section>
<!-- ***** About Us Area End ***** -->

<!-- ***** Skills Area Start ***** -->
<section class="fancy-skills-area section-padding-200">
<?php get_template_part('template-part/mainpage/service')?>
</section>
<!-- ***** Skills Area End ***** -->

<!-- ***** Service Area Start ***** -->
<section class="fancy-services-area bg-img bg-overlay section-padding-100-70"
         style="background-image: url(<?php echo get_theme_mod('true_display_work');?>)">
    <?php get_template_part('template-part/mainpage/work')?>

</section>
<!-- ***** Service Area End ***** -->
<section class="fancy-testimonials-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php get_template_part('template-part/mainpage/reviews')?>
            </div>
        </div>
    </div>
</section>

<section class="fancy-cta-area bg-img bg-overlay section-padding-100"
         style="background-image: url(<?php echo get_theme_mod('true_display_disqus_image');?>">
    <div class="container">
        <div class="row">
            <?php get_template_part('template-part/mainpage/with')?>
        </div>
    </div>
</section>
<section class="fancy-blog-area section-padding-100-70">
    <div class="container">
        <?php get_template_part('template-part/mainpage/news')?>
    </div>
</section>

<?php get_footer()?>




</body>