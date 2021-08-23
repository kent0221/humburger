<!-- ----ヘッダーのテンプレート化 -> header.php---- -->
<?php get_header(); ?>

<main class="l-main">
    <?php
if (have_posts()):
    while (have_posts()):the_post();
?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="l-main__hero p-hero p-hero--single c-mainvisual__single">
            <div class="c-ttl">
                <h1 class="c-ttl__hero"><?php the_title(); ?></h1>
            </div>
        </section>

        <div class="l-main__wrap">

            <section class="l-main__contents p-article">

                <?php the_content() ;?>
                <?php wp_link_pages(); ?>

            </section>

            <div class="p-comments--wrap">
                <?php comments_template(); ?>

            </div>

        </div>
    </div>


    <?php
    endwhile;
    else:
    ?>
    <p class="l-main__noresult">表示する記事がありません。</p>

    <?php
    endif;
    ?>


</main>
<!-- /.l-main -->

<!-- ----サイドバーのテンプレート化 -> sidebar.php---- -->
<?php get_sidebar(); ?>

<!-- ----フッターのテンプレート化 -> footer.php---- -->
<?php get_footer(); ?>