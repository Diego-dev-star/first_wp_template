<?php

function true_customizer_init( $wp_customize ) {

    $true_transport = 'postMessage'; // описание этой переменной чуть ниже
        // Фоновое изображение
    $wp_customize->add_section(
        'true_background_image', // id секции, должен прописываться во всех настройках, которые в неё попадают
        array(
            'title'     => 'Фон сайта',
            'priority'  => 701, // приоритет расположения относительно других секций
            'description' => 'Картинка для header сайта' // описание не обязательное
        )
    );
    $wp_customize->add_setting(
        'true_background_image',
        array(
            'default'      => '', // по умолчанию - фоновое изображение не установлено
            'transport'    => $true_transport
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'true_background_image',
            array(
                'label'    => 'Фон сайта',
                'settings' => 'true_background_image',
                'section'  => 'true_background_image'
            )
        )
    );
    $wp_customize->add_setting(
        'true_youtube-link', // id
        array(
            'default'            => 'youtube.com', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_youtube-link', // id
        array(
            'section'  => 'true_background_image', // id секции
            'label'    => 'Ccылка на видео',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_section(
        'true_display_contact', // id секции, должен прописываться во всех настройках, которые в неё попадают
        array(
            'title'     => 'Контакты',
            'priority'  => 401, // приоритет расположения относительно других секций
            'description' => 'Заполнить контакты' // описание не обязательное
        )
    );
    $wp_customize->add_setting(
        'true_display_phone', // id
        array(
            'default'            => '+48 111-111-111', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_phone', // id
        array(
            'section'  => 'true_display_contact', // id секции
            'label'    => 'Телефон',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_phone_2', // id
        array(
            'default'            => '+48 111-111-111', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_phone_2', // id
        array(
            'section'  => 'true_display_contact', // id секции
            'label'    => 'Телефон-2',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_email', // id
        array(
            'default'            => 'Blessed@blessed-firm.com', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_email', // id
        array(
            'section'  => 'true_display_contact', // id секции
            'label'    => 'E-mail',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_city', // id
        array(
            'default'            => 'Blessed@blessed-firm.com', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_city', // id
        array(
            'section'  => 'true_display_contact', // id секции
            'label'    => 'Город',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_street', // id
        array(
            'default'            => 'Marynarska 21', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_street', // id
        array(
            'section'  => 'true_display_contact', // id секции
            'label'    => 'Адрес',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_time', // id
        array(
            'default'            => '00: 00 -24 :00', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_time', // id
        array(
            'section'  => 'true_display_contact', // id секции
            'label'    => 'Время работы',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_day', // id
        array(
            'default'            => 'пн-пт', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_day', // id
        array(
            'section'  => 'true_display_contact', // id секции
            'label'    => 'дни работы',
            'type'     => 'text' // текстовое поле
        )
    );

    // Добавляем собственную секцию настроек
    $wp_customize->add_section(
        'mainpage_section1', // id секции, должен прописываться во всех настройках, которые в неё попадают
        array(
            'title'     => 'Отображение главной',
            'priority'  => 201, // приоритет расположения относительно других секций
            'description' => 'Настройте внешний вид вашего сайта' // описание не обязательное
        )
    );

    $wp_customize->add_section(
        'true_display_work', // id секции, должен прописываться во всех настройках, которые в неё попадают
        array(
            'title'     => 'Настройка секции работа с нами',
            'priority'  => 501, // приоритет расположения относительно других секций
            'description' => 'Work with widget' // описание не обязательное
        )
    );
    $wp_customize->add_setting(
        'true_display_work', // id
            array(
                'default'      => '', // по умолчанию - фоновое изображение не установлено
                'transport'    => $true_transport
            )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'true_display_work',
            array(
                'label'    => 'Фон секции',
                'settings' => 'true_display_work',
                'section'  => 'true_display_work'
            )
        )
    );

    $wp_customize->add_setting(
        'true_display_work_title', // id
        array(
            'default'            => 'Заголовок секции', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_work_title', // id
        array(
            'section'  => 'true_display_work', // id секции
            'label'    => 'Заголовок',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_work_title', // id
        array(
            'default'            => 'Слоган', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_work_title', // id
        array(
            'section'  => 'true_display_work', // id секции
            'label'    => 'Заголовок',
            'type'     => 'text' // текстовое поле
        )
    );

    $wp_customize->add_control(
        'true_display_work_title', // id
        array(
            'section'  => 'true_display_work', // id секции
            'label'    => 'Заголовок',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_work_slogan', // id
        array(
            'default'            => 'Слоган', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_work_slogan', // id
        array(
            'section'  => 'true_display_work', // id секции
            'label'    => 'Слоган',
            'type'     => 'text' // текстовое поле
        )
    );


    //
    $wp_customize->add_section(
        'true_display_disqus', // id секции, должен прописываться во всех настройках, которые в неё попадают
        array(
            'title'     => 'Настройка секции обсудить контракт',
            'priority'  => 601, // приоритет расположения относительно других секций
            'description' => 'Work with us' // описание не обязательное
        )
    );
    $wp_customize->add_setting(
        'true_display_disqus_image', // id
        array(
            'default'      => '', // по умолчанию - фоновое изображение не установлено
            'transport'    => $true_transport
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'true_display_disqus',
            array(
                'label'    => 'Фон секции',
                'settings' => 'true_display_disqus_image',
                'section'  => 'true_display_disqus'
            )
        )
    );
    $wp_customize->add_setting(
        'true_display_disqus_title', // id
        array(
            'default'            => 'Заголовок', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_disqus_title', // id
        array(
            'section'  => 'true_display_disqus', // id секции
            'label'    => 'Заголовок',
            'type'     => 'text' // текстовое поле
        )
    );
    $wp_customize->add_setting(
        'true_display_disqus_text', // id
        array(
            'default'            => 'Текст', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_disqus_text', // id
        array(
            'section'  => 'true_display_disqus', // id секции
            'label'    => 'Текст',
            'type'     => 'text' // текстовое поле
        )
    );


    //corporate page
    $wp_customize->add_section(
        'true_corporate_image', // id секции, должен прописываться во всех настройках, которые в неё попадают
        array(
            'title'     => 'Корпоративная',
            'priority'  => 801, // приоритет расположения относительно других секций
            'description' => 'Картинка для header сайта' // описание не обязательное
        )
    );
    $wp_customize->add_setting(
        'true_corporate_image',
        array(
            'default'      => '', // по умолчанию - фоновое изображение не установлено
            'transport'    => $true_transport
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'true_corporate_image',
            array(
                'label'    => 'Header(Corporate)',
                'settings' => 'true_corporate_image',
                'section'  => 'true_corporate_image'
            )
        )
    );
    $wp_customize->add_setting(
        'true_youtube-corporate', // id
        array(
            'default'            => 'youtube.com', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_youtube-corporate', // id
        array(
            'section'  => 'true_corporate_image', // id секции
            'label'    => 'Корпоротивный youtube',
            'type'     => 'text' // текстовое поле
        )
    );
}

add_action( 'customize_register', 'true_customizer_init' );

/*
 * Функция обработки текстовых значений, перед их сохранением в базу
 */
function true_sanitize_copyright( $value ) {
    return strip_tags( stripslashes( $value ) ); // обрезаем слеши и HTML-теги
}
//more custumize
//include_once get_theme_file_path( 'inc/class-kirki-installer-section.php' );


