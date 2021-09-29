<?php
/**
 * Created by PhpStorm.
 * User: mlata
 * Date: 17.02.2020
 * Time: 9:38
 */
/*
Template Name: Corporate template
*/

?>
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

<?php get_template_part('template-part/corp/head');?>
<section class="fancy-about-us-area bg-gray">
    <div class="container">
        <div class="row">
            <?php get_template_part('template-part/corp/weare');?>
        </div>
    </div>
</section>

<!-- ***** About Us Area Start ***** -->
<section class="fancy-about-us-area bg-gray">
    <div class="container">
        <div class="row">
            <?php get_template_part('template-part/corp/about');?>
        </div>
    </div>
</section>
<!-- ***** About Us Area End ***** -->
<section class="fancy-services-area bg-img bg-overlay section-padding-100-70"
         style="background-image: url(<?php echo get_theme_mod('true_display_work');?>)">
    <?php get_template_part('template-part/corp/work')?>

</section>
<!-- ***** Skills Area Start ***** -->
<section class="fancy-skills-area section-padding-200">
    <?php get_template_part('template-part/corp/service')?>
</section>
<!-- ***** Skills Area End ***** -->

<!-- ***** Service Area Start ***** -->


<section class="fancy-cta-area bg-img bg-overlay section-padding-100"
         style="background-image: url(<?php echo get_theme_mod('true_display_disqus_image');?>">
    <div class="container">
        <div class="row">
            <?php get_template_part('template-part/corp/with')?>
        </div>
    </div>
</section>


<?php get_footer()?>




</body>
