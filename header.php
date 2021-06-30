<!DOCTYPE html>
<!-- ----言語設定の書き換え ---- -->
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ----title削除---- -->
    <meta name="description" content="RaiseTech課題~コーディングからWordPress化の一連の流れを実践~">
    <!-- ----ファビコン とりあえずなしで---- -->
    <!-- ----css, javascript削除---- -->
    <!-- ----head情報の書き換え / </head>直前に追加---- -->
    <?php wp_head(); ?>
</head>

<body>
    <div class="l-grid">
        <header class="l-header">
            <button class="l-header__btn c-btn__menu">Menu</button>
            <h1 class="l-header__ttl"><a href="<?php echo esc_url(home_url('/')); ?>"
                    class="p-ttl"><?php bloginfo('name'); ?></a></h1>

            <!-- ----検索フォームのテンプレート化 -> searchform.php---- -->
            <?php get_search_form(); ?>

        </header>
        <!-- /.l-header -->