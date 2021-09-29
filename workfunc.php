<?php
//registr job taxsonomy template
add_filter( 'template_include', 'job_taxonomy_template' );
function job_taxonomy_template( $template  ){
       if (is_tax('job')){
           $template = dirname(__FILE__).'/single-job.php';
       }
       return $template;
};
//end register

function work_data_title(){
    $args = array();
    register_post_type( 'job', $args );
}

add_action( 'init', 'work_data_title' );


function work_data_desc () {
    $args = array(
        "label" => __( "Вакансии", "job" ),
        "labels" => array(
            "name" => __( "Вакансии", "job" ),
            "singular_name" => __( "Вакансия", "" ),
            "featured_image" => __( "Фото вакансии", "" ),
            "set_featured_image" => __( "Загрузить фото вакансии", "" ),
            "remove_featured_image" => __( "Удалить фото вакансии", "" ),
            "use_featured_image" => __( "Использовать фото", "" ),
        ),
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "job", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail" ),
        "taxonomies" => array( "job" ),
    );
    register_post_type( "job", $args );
}
add_action( 'init', 'work_data_desc' );

function work_updated_messages( $messages ) {
    global $post, $post_ID;
    $messages['job'] = array(
        0 => '',
        1 => sprintf( __('Вакансия обновлена. <a href="%s">Посмотреть</a>'), esc_url( get_permalink($post_ID) ) ),
        2 => __('Пользовательские поля обновлены.'),
        3 => __('Пользовательские поля обновлены.'),
        4 => __('Вакансия  обновлена.'),
        5 => isset($_GET['revision']) ? sprintf( __('Product restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Вакансия обновлена <a href="%s">Посмотреть</a>'), esc_url( get_permalink($post_ID) ) ),
        7 => __('вакансия сохранена.'),
        8 => sprintf( __('Вакансия отправлена. <a target="_blank" href="%s">Посмотреть</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Вакансия запланирована на: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Посмотреть</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('Product draft updated. <a target="_blank" href="%s">Посмотреть</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );
    return $messages;
}
add_filter( 'post_updated_messages', 'work_updated_messages' );
function my_contextual_help( $contextual_help, $screen_id, $screen ) {
    if ( 'edit-job' == $screen->id ) {

        $contextual_help = '<h2>Вакансии</h2>
        <p>В этом  разделе находится архив вакансий</p>
';

    } elseif ( 'job' == $screen->id ) {

        $contextual_help = '<h2>Создание/редактирование Вакансии</h2>
      <p>Эта страница позволяет создать вакансию или отредактировать уже имеющиеся данные о нем. Пожалуйста, не забудьте заполнить  дополнительные поля.</p>';

    }
    return $contextual_help;
    echo $screen->id;
}
add_action( 'contextual_help', 'my_contextual_help', 10, 3 );
function job_taxonomies() {
    $labels = array(
        'name'              => _x( 'Категории вакансий', 'taxonomy general name' ),
        'singular_name'     => _x( 'Категория вакансии', 'taxonomy singular name' ),
        'search_items'      => __( 'Найти категорию вакансий' ),
        'all_items'         => __( 'Все категории вакансий' ),
        'parent_item'       => __( 'Родительская категория вакансии' ),
        'parent_item_colon' => __( 'Родительская категория вакансий:' ),
        'edit_item'         => __( 'Редактировать категорию продуктов' ),
        'update_item'       => __( 'Обновить категорию вакансий' ),
        'add_new_item'      => __( 'Добавить новую категорию вакансий' ),
        'new_item_name'     => __( 'Новая категория вакансий' ),
        'menu_name'         => __( 'Категории вакансий' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'job_category', 'job', $args );
}
add_action( 'init', 'job_taxonomies', 0 );




//получение значения категорий


function the_custom_job_front(){?>

    <div id="my-ajax-filter-search">
        <?php $terms = get_terms(array('taxonomy' => 'job_category', 'orderby' => 'name')); ?>
<form class="filter-container" action="" method="POST" id="filter">
    <select name="categoryfilter" id="category" class="form-control filter-form">
        <option value=""><?php echo _e('Select category job'); ?></option>
        <?php foreach ($terms as $term) : ?>
            <option value="<?php echo $term->name?>"><?php echo $term->name;?></option>
        <?php endforeach;?>
    </select>
    <?php $field_city = get_field('city');?>
    <select name="cityfilter" id="city" class="form-control filter-form">
        <option value=""><?php echo _e('Select city'); ?></option>

        <?php foreach ($field_city as $item):?>
        <option value="<?php echo $item ?>"><?php echo $item ?></option>
        <?php endforeach;?>

    </select>

    <?php $field_sex = get_field('sex'); ?>
    <select name="sexfilter" id="sex" class="form-control filter-form">
        <option value=""><?php _e('Select you sex');?></option>
        <?php foreach ($field_sex as $sex):?>
        <option value="<?php echo $sex ?>"><?php echo $sex; ?></option>
        <?php endforeach;?>
    </select>




    <button class="btn fancy-btn fancy-active two"><?php _e('Фильтровать'); ?></button>
    <input type="hidden" name="action" value="myfilter">
    </form>
    </div>
        <?php } ?>
<?php
add_action('wp_ajax_my_ajax_filter_search', 'my_ajax_filter_search_callback');
add_action('wp_ajax_nopriv_my_ajax_filter_search', 'my_ajax_filter_search_callback');

function my_ajax_filter_search_callback() {

    header("Content-Type: application/json");

    $meta_query = array('relation' => 'AND');

    if(isset($_GET['category'])) {
        $category = sanitize_text_field( $_GET['category'] );
        $meta_query[] = array(
            'key' => 'category',
            'value' => $category,
            'compare' => '='
        );
    }

    if(isset($_GET['city'])) {
        $city = sanitize_text_field( $_GET['city'] );
        $meta_query[] = array(
            'key' => 'city',
            'value' => $city,
            'compare' => '>='
        );
    }

    if(isset($_GET['language'])) {
        $sex = sanitize_text_field( $_GET['sex'] );
        $meta_query[] = array(
            'key' => 'sex',
            'value' => $sex,
            'compare' => '='
        );
    }

    $tax_query = array();


    $args = array(
        'post_type' => 'job',
        'posts_per_page' => -1,
        'meta_query' => $meta_query,
        'tax_query' => $tax_query
    );

    if(isset($_GET['search'])) {
        $search = sanitize_text_field( $_GET['search'] );
        $search_query = new WP_Query( array(
            'post_type' => 'movie',
            'posts_per_page' => -1,
            'meta_query' => $meta_query,
            'tax_query' => $tax_query,
            's' => $search
        ) );
    } else {
        $search_query = new WP_Query( $args );
    }

    if ( $search_query->have_posts() ) {

        $result = array();

        while ( $search_query->have_posts() ) {
            $search_query->the_post();

            $cats = strip_tags( get_the_category_list(", ") );
            $result[] = array(
                "id" => get_the_ID(),
                "title" => get_the_title(),
                "content" => get_the_content(),
                "permalink" => get_permalink(),
                "year" => get_field('year'),
                "rating" => get_field('rating'),
                "director" => get_field('director'),
                "language" => get_field('language'),
                "genre" => $cats,
                "poster" => wp_get_attachment_url(get_post_thumbnail_id($post->ID),'full')
            );
        }
        wp_reset_query();

        echo json_encode($result);

    } else {
        // no posts found
    }
    wp_die();

    }
    function categoty_custom(){
        $categories = get_the_category();
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach( $categories as $category ) {
                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
            }
            echo trim( $output, $separator );
        }
    }