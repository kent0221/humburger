<!-- ----ヘッダーのテンプレート化 -> header.php---- -->
<?php get_header(); ?>

<main class="l-main">
    <section class="p-hero p-hero--archive c-mainvisual__archive">
        <div class="c-ttl">
            <h2 class="c-ttl__hero">Search:
                <span class="c-ttl__hero--sub">
                    <?php
                    $keyword = get_search_query();
                    if (isset($keyword) && empty($keyword)) {
                        echo '検索キーワードが未入力です';
                    } else {
                        echo $keyword.' (検索結果 '.$wp_query->found_posts.'件)';
                    }
                    ?>
                </span>
            </h2>
        </div>
    </section>

    <div class="l-main__wrap">

        <section class="p-post p-post--archive">
            <h2 class="p-post__ttl">小見出しが入ります</h2>
            <p class="p-post__desc">
                テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            </p>

            <?php
            if (have_posts()):
                while (have_posts()):the_post();
            ?>

            <div id="<?php the_ID(); ?>" <?php post_class('c-card'); ?>>
                <?php the_post_thumbnail('full', array('class' => 'c-card__eyecatch')); ?>

                <div class="c-card__wrap">
                    <dl class="c-card__ttl">
                        <?php the_title(); ?>
                        <?php the_excerpt(); ?>
                    </dl>
                    <button class="c-btn__card"><a href="<?php the_permalink(); ?>">詳しく見る</a></button>
                </div>
            </div>

            <?php
            endwhile;
             else:
            ?>
            <p class="l-main__noresult">表示できる記事がありません。</p>
            <?php
            endif;
            ?>

        </section>

        <div class="l-main__pagenation mobile">
            <nav class="p-pagenation">
                <?php previous_posts_link('&laquo; 前へ'); ?>
                <span></span>
                <?php next_posts_link('&raquo; 次へ'); ?>
            </nav>
        </div>

        <div class="l-main__pagenation tab">
            <p class="p-pagenation__count">
                page <?php echo max(1, get_query_var('paged')); ?>/<?php echo $wp_query->max_num_pages; ?>
            </p>
            <?php
             if (function_exists('the_pagenation')) {
                 the_pagenation();
             };
             ?>
        </div>

    </div>

</main>

<!-- ----サイドバーのテンプレート化 -> sidebar.php---- -->
<?php get_sidebar(); ?>

<!-- ----フッターのテンプレート化 -> footer.php---- -->
<?php get_footer(); ?>