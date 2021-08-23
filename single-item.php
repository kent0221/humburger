<!-- ----ヘッダーのテンプレート化 -> header.php---- -->
<?php get_header(); ?>

<main class="l-main">
    <?php
if (have_posts()):
    while (have_posts()):the_post();
?>
    <!-- カスタムフィールドの値取得 -->
    <?php
$price = get_post_meta(get_the_ID(), '価格', true);
$allergies = get_post_meta(get_the_ID(), 'アレルギー', true);
 ?>


    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="l-main__wrap">
            <section class="p-custom-item">
                <?php the_post_thumbnail('full', array('class'=>'p-custom-item__thumb')); ?>
                <div class="p-custom-item__info">
                    <h1 class="p-custom-item__ttl"><?php the_title(); ?></h1>
                    <p class="p-custom-item__desc">価格：<?php echo $price; ?>円</p>
                    <p class="p-custom-item__desc">アレルギー：<?php echo $allergies; ?></p>
                </div>
            </section>

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