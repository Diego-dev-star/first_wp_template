<?php
function blessed_scripts()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('jobpage', get_template_directory_uri() . '/css/job.css');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive/responsive.css');
}

add_action('after_setup_theme', 'lang_theme');
function lang_theme(){
    load_theme_textdomain('blessed', get_template_directory(). '/language');
}
function the_ajax_filter()
{
    wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/js/ajax.js');
}

function my_ajax_filter_search_scripts()
{
    wp_enqueue_script('my_ajax_filter_search', get_stylesheet_directory_uri() . '/script.js', array(), '1.0', true);
    wp_localize_script('my_ajax_filter_search', 'ajax_url', admin_url('admin-ajax.php'));
}

add_theme_support('custom-logo');

add_filter('excerpt_more', function ($more) {
    return '';
});
add_filter('excerpt_length', function () {
    return 20;
});

add_action('wp_enqueue_scripts', 'blessed_scripts');
//resizes
add_action('after_setup_theme', 'blessed_news');
function blessed_news()
{
    add_image_size('homepage-news', 290, 200, true); // (cropped)
}

//filtres
add_theme_support('menus');
add_filter('show_admin_bar', '__return_false');

include_once 'customizer.php';
//menu
add_theme_support('post-thumbnails');

add_action('after_setup_theme', 'blessed_register_nav_menu');
function blessed_register_nav_menu()
{
    register_nav_menu('navigation', 'main-menu');
}

add_action('after_setup_theme', 'blessed_register_footer_menu');
function blessed_register_footer_menu()
{
    register_nav_menu('footer', 'footer-menu');
}


// file version
function blessed_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

add_filter('style_loader_src', 'blessed_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'blessed_remove_wp_ver_css_js', 9999);

//widget mainpage
add_theme_support('widgets');


function register_my_widgets()
{
    register_sidebar(
        array(
            'name' => 'Первая секция на главной странице',
            'id' => 'homepage-sidebar',
            'description' => 'Первая секция на главной',
            'before_widget' => ' <div class="col-12 col-md-4">',
            'after_widget' => '</div>',
            //'before_title' => '<h5><i class="'.$icons[$arr].'" aria-hidden="true"></i> ',
            'after_title' => '</h5>',
        ));
}

add_action('widgets_init', 'register_my_widgets');
function register_corp_widgets()
{
    register_sidebar(
        array(
            'name' => 'Первая секция на корпоративной странице',
            'id' => 'corp-sidebar',
            'description' => 'Первая секция на главной',
            'before_widget' => ' <div class="col-12 col-md-4">',
            'after_widget' => '</div>',
            //'before_title' => '<h5><i class="'.$icons[$arr].'" aria-hidden="true"></i> ',
            'after_title' => '</h5>',
        ));
}

add_action('widgets_init', 'register_corp_widgets');
function register_my_img()
{
    register_sidebar(
        array(
            'name' => 'картинка для "skils"',
            'id' => 'homepage-img',
            'description' => 'Вставить картинку',
            'before_widget' => '',
            'after_widget' => '',
            // 'before_title' => '<h5><i class="'.$icons[0].'" aria-hidden="true"></i> ',
            'before_title' => '<h5> ',
            'after_title' => '</h5>',
        ));
}

add_action('widgets_init', 'register_my_img');

function register_corp_img()
{
    register_sidebar(
        array(
            'name' => 'корпаративная картинка для "skils" ',
            'id' => 'corp-img',
            'description' => 'Вставить картинку',
            'before_widget' => '',
            'after_widget' => '',
            // 'before_title' => '<h5><i class="'.$icons[0].'" aria-hidden="true"></i> ',
            'before_title' => '<h5> ',
            'after_title' => '</h5>',
        ));
}

add_action('widgets_init', 'register_corp_img');
function register_my_html()
{
    register_sidebar(
        array(
            'name' => 'Skills Элемент',
            'id' => 'homepage-html',
            'description' => 'Вставить картинку',
            'before_widget' => ' <div class="col-12 col-md-6 col-xl-5 ml-auto">',
            'after_widget' => '</div>',
            'before_title' => '<h5> ',
            'after_title' => '</h5>',
        ));
}

add_action('widgets_init', 'register_my_html');

function register_corp_html()
{
    register_sidebar(
        array(
            'name' => 'corp Skills Элемент',
            'id' => 'corp-html',
            'description' => 'Встать элемент',
            'before_widget' => ' <div class="col-12 col-md-6 col-xl-5 ml-auto">',
            'after_widget' => '</div>',
            'before_title' => '<h5> ',
            'after_title' => '</h5>',
        ));
}

add_action('widgets_init', 'register_corp_html');


add_action('widgets_init', 'register_my_widgets_service');
function register_my_widgets_service()
{
    register_sidebar(
        array(
            'name' => 'Cекция сервис',
            'id' => 'homepage-service',
            'description' => 'Секция под блоки описания сервиса.',
            'before_widget' => '<div class="col-12 col-md-4"><div class="single-service-area text-center wow fadeInUp" data-wow-delay="' . $i . 's">',
            'after_widget' => '</div></div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));


}

function blessed_recent_comments($args = array())
{
    global $wpdb;

    $def = array(
        'limit' => 10, // сколько комментов выводить.
        'ex' => 45, // n символов. Обрезка текста комментария.
        'term' => '', // id категорий/меток. Включить(5,12,35) или исключить(-5,-12,-35) категории. По дефолту - из всех категорий.
        'gravatar' => '', // Размер иконки в px. Показывать иконку gravatar. '' - не показывать.
        'user' => '', // id юзеров. Включить(5,12,35) или исключить(-5,-12,-35) комменты юзеров. По дефолту - все юзеры.
        'echo' => 1,  // выводить на экран (1) или возвращать (0).
        'comm_type' => '', // название типа комментария
        'meta_query' => '', // WP_Meta_Query
        'meta_key' => '', // WP_Meta_Query
        'meta_value' => '', // WP_Meta_Query
        'url_patt' => '', // оптимизация ссылки на коммент. Пр: '%s?comments#comment-%d' плейсхолдеры будут заменены на $post->guid и $comment->comment_ID
    );

    $args = wp_parse_args($args, $def);
    extract($args);

    $AND = '';

    // ЗАПИСИ
    if ($term) {
        $cats = explode(',', $term);
        $cats = array_map('intval', $cats);

        $CAT_IN = ($cats[key($cats)] > 0); // из категорий или нет

        $cats = array_map('absint', $cats); // уберем минусы
        $AND_term_id = 'AND term_id IN (' . implode(',', $cats) . ')';

        $posts_sql = "SELECT object_id FROM $wpdb->term_relationships rel LEFT JOIN $wpdb->term_taxonomy tax ON (rel.term_taxonomy_id = tax.term_taxonomy_id) WHERE 1 $AND_term_id ";

        $AND .= ' AND comment_post_ID ' . ($CAT_IN ? 'IN' : 'NOT IN') . ' (' . $posts_sql . ')';
    }

    // ЮЗЕРЫ
    if ($user) {
        $users = explode(',', $user);
        $users = array_map('intval', $users);

        $USER_IN = ($users[key($users)] > 0);

        $users = array_map('absint', $users);

        $AND .= ' AND user_id ' . ($USER_IN ? 'IN' : 'NOT IN') . ' (' . implode(',', $users) . ')';
    }

    // WP_Meta_Query
    $META_JOIN = '';
    if ($meta_query || $meta_key || $meta_value) {
        $mq = new WP_Meta_Query($args);
        $mq->parse_query_vars($args);
        if ($mq->queries) {
            $mq_sql = $mq->get_sql('comment', $wpdb->comments, 'comment_ID');
            $META_JOIN = $mq_sql['join'];
            $AND .= $mq_sql['where'];
        }
    }

    $sql = $wpdb->prepare("SELECT * FROM $wpdb->comments LEFT JOIN $wpdb->posts ON (ID = comment_post_ID ) $META_JOIN
	WHERE comment_approved = '1' AND comment_type = %s $AND ORDER BY comment_date_gmt DESC LIMIT %d", $comm_type, $limit);

    //die( $sql );
    $results = $wpdb->get_results($sql);

    if (!$results) return 'Комментариев нет.';

    // HTML
    $out = $grava = '';
    foreach ($results as $comm) {
        if ($gravatar)
            $grava = get_avatar($comm->comment_author_email, $gravatar);

        $comtext = strip_tags($comm->comment_content);
        $com_url = $url_patt ? sprintf($url_patt, $comm->guid, $comm->comment_ID) : get_comment_link($comm->comment_ID);

        $out .= '
		<div class="single-testimonial d-md-flex align-items-center">
		                <div class="testimonial-thumbnail">
                           ' . $grava . '
                        </div>
                        <div class="testimonilas-content">
                            <span class="playfair-font quote">“</span>
                            <h5>' . $comtext . '</h5>
                            <h6>' . strip_tags($comm->comment_author) . ' -<span>' . esc_attr($comm->post_date) . '</span></h6>
                        </div>
		
		
		</div>';
    }

    if ($echo)
        return print $out;
    return $out;
}

function blessed_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="review">
            <?php echo get_avatar($comment, 60); ?>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php echo _e('Your comment is awaiting moderation.') ?></em>
                <br/>
            <?php elseif ($comment->comment_approved == '1'): ?>
                <div class="text-comment">
                    <?php comment_text() ?>
                    <div class="element">
                        <span class="r-date"><i class="fa fa-comment"></i> <?php echo get_comment_date() ?></span>
                        <figure>|</figure>
                        <span class="r-time"><i class="fa fa-clock-o"></i> <?php echo get_comment_time(); ?></span>
                        <figure>|</figure>
                        <span class="r-time"><i class="fa fa-user"></i> <?php echo get_comment_author(); ?></span>

                    </div>
                </div>
            <?php endif; ?>
        </div>

    </li>
<?php }


add_filter('footer-menu_link_attributes', 'my_menu_atts', 10, 3);
function footer_menu_atts($atts, $item, $args)
{
    // Provide the id of the targeted menu item
    $menu_target = 123;

    // inspect $item

    if ($item->ID == $menu_target) {
        // original post used a comma after 'modal' but this caused a 500 error as is mentioned in the OP's reply
        $atts['data-toggle'] = 'modal';
        $atts['data-target'] = '#myModal';
    }
    return $atts;
}

function _remove_script_version($src)
{
    return add_query_arg('ver', false, $src);
}

add_filter('script_loader_src', '_remove_script_version', 15, 1);
add_filter('style_loader_src', '_remove_script_version', 15, 1);

//new category page
include_once 'workfunc.php';
//post views

function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// custom fields
function true_custom_fields()
{
    add_post_type_support('job', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}

add_action('init', 'true_custom_fields');
add_image_size('job', 340, 340, true);


function phone_rand()
{
    $arr = array(
        "a" => "+48730051933",
        "b" => "+48570701735",
        "c" => "+48450111430",
        "d" => "+48731114903"
    );

// Use array_rand function to returns random key
    $key = array_rand($arr);

// Display the random array element
    echo $arr[$key];

}


