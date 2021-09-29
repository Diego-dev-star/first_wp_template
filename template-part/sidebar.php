<?php
// VARS
$posts = get_posts( array(
    'numberposts' => 5,
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
wp_reset_postdata(); // сброс

$categories = get_categories( array(
    'taxonomy'     => 'category',
    'type'         => 'post',
    'child_of'     => 0,
    'parent'       => '',
    'orderby'      => 'name',
    'order'        => 'ASC',
    'hide_empty'   => 1,
    'hierarchical' => 1,
    'exclude'      => '',
    'include'      => '',
    'number'       => 0,
    'pad_counts'   => false,

) );

?>

<!-- ****** Blog Sidebar ****** -->
<div class="col-10 col-lg-3">
    <div class="blog-sidebar">
        <!-- Single Widget Area -->
        <div class="single-widget-area popular-post-widget">
            <div class="widget-title">
                <h5><?php _e('Recent News');?></h5>
            </div>
            <!-- Single Popular Post -->
            <div class="single-populer-post">
                <?php foreach( $posts as $post ){
                setup_postdata($post);?>
                <div class="post-contents">
                    <a href="<?php the_permalink();?>">
                        <h6><?php the_title();?></h6>
                    </a>
                    <a class="post-date" href="#"><?php the_date('j F Y');?></a>
                </div>

            <?php }?>
            </div>


        <!-- Single Widget Area -->
        <div class="single-widget-area categories-widget mt-5">
        <?php if( $categories ){ ?>


            <div class="widget-title">
                <h5><?php _e('Categories');?></h5>
            </div>

            <ul>
                <?php $all_categories = get_categories('hide_empty=0');
                $category_link_array = array();
                foreach( $all_categories as $single_cat ){
                    $category_link_array[] = '<li><a href="' . get_category_link($single_cat->term_id) . '"><i class="fa fa-circle" aria-hidden="true"></i>' . $single_cat->name . '</a></li>';
                }
                echo implode('', $category_link_array);
                ?>
            </ul>

        <?php }?>
        </div>
        <!-- Single Widget Area -->
        <div class="single-widget-area tags-widget mt-5">
            <div class="widget-title">
                <h5><?php _e('Popular Tags');?></h5>
            </div>
            <?php $tags = get_tags();
                foreach ( $tags as $tag ) {
                $tag_link = get_tag_link( $tag->term_id );

                $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' >";
                    $html .= "{$tag->name}</a> ";
                }
            echo $html;
            ?>
        </div>
