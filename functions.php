<?php
// テーマ基本設定
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'global' => 'グローバルメニュー',
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'controllerlab-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Orbitron:wght@400..900&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'controllerlab-style',
        get_template_directory_uri() . '/css/style.css',
        [],
        filemtime(get_template_directory() . '/css/style.css')
    );

    wp_enqueue_script(
        'controller-main',
        get_theme_file_uri('/js/main.js'),
        [],
        filemtime(get_theme_file_path('/js/main.js')),
        true
    );

    add_filter('script_loader_tag', function ($tag, $handle, $src) {
        if ($handle !== 'controller-main') return $tag;

        return sprintf(
            '<script type="module" src="%s"></script>' . "\n",
            esc_url($src)
        );
    }, 10, 3);
});
