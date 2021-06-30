<?php
// :::::::: WordPress機能追加 ::::::::
// ---- ナビゲーションメニュー編集 ----//
add_theme_support('menus');

// ---- タイトル出力 ----//
add_theme_support('title-tag');

// --- アイキャッチ画像追加 ---//


// --- フィードの設定 ---//


// :::::::: header.php ::::::::
// --- 条件分岐を使ってheadのタイトル出力 ---//
function humburger_title($title)
{
    if (is_front_page() && is_home()) {
        $title = get_bloginfo('namespace', 'display');
    } elseif (is_singular()) {
        $title = sible_post_title('', false);
    }
    return $title;
}
add_filter('pre_get_document_title', 'humburger_title');

// --- css, JavaScript読み込み ---//

function humburger_script()
{
    // google font: roboto
    wp_enqueue_style('roboto', '//fonts.googleapis.com/css2?family=Roboto&display=swap', array());
    
    // google font: m-plus
    wp_enqueue_style('m-plus', '//fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap', array());
    
    // fontawesome
    wp_enqueue_style('fontawesome', '//kit.fontawesome.com/0a11659270.js', array());
    
    // 自作css
    wp_enqueue_style('humburger', get_template_directory_uri().'/css/humburger.css', array());
    
    // スタイルシート
    wp_enqueue_style('humburger', get_template_directory_uri().'/style.css', array());
    
    // jQuery
    wp_enqueue_script('jQuery', get_template_directory_uri().'/js/jquery.min.js', array(), true);

    // 自作js
    wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array(), true);
}
add_action('wp_enqueue_scripts', 'humburger_script');



// :::::::: functions.php ::::::::

// :::::::: sidebar.php ::::::::
// --- widget機能追加項目は以下に記述 ---//