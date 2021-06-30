<!-- ----ヘッダーのテンプレート化 -> header.php---- -->
<?php get_header(); ?>

<main class="l-main">
    <section class="l-main__hero p-hero c-mainvisual__front">
        <div class="c-ttl">
            <h2 class="c-ttl__hero">ダミーサイト</h2>
        </div>
    </section>

    <div class="l-main__wrap">

        <section class="l-main__contents-front">
            <a href="/page.html" class="p-content p-content--takeout c-content">
                <div class="c-content__ttl">
                    <h2>Take Out</h2>
                    <span></span>
                </div>
                <div class="c-content__topic01">
                    <h3 class="c-content__subTtl">Take Out</h3>
                    <p class="p-content__desc">
                        当店のテイクアウトで利用できる商品を掲載しています
                    </p>
                </div>
                <div class="c-content__topic02">
                    <h3 class="c-content__subTtl">Take Out</h3>
                    <p class="p-content__desc">
                        当店のテイクアウトで利用できる商品を掲載しています
                    </p>
                </div>
            </a>
            <a href="page.html" class="p-content p-content--eatin c-content">
                <div class="c-content__ttl">
                    <h2>Eat In</h2>
                    <span></span>
                </div>
                <div class="c-content__topic01">
                    <h3 class="c-content__subTtl">Eat In</h3>
                    <p class="p-content__desc">
                        当店のテイクアウトで利用できる商品を掲載しています
                    </p>
                </div>
                <div class="c-content__topic02">
                    <h3 class="c-content__subTtl">Eat In</h3>
                    <p class="p-content__desc">
                        当店のテイクアウトで利用できる商品を掲載しています
                    </p>
                </div>
            </a>
        </section>

        <section class="l-main__map">
            <div class="p-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3353.474499995109!2d130.7036448147965!3d32.80619038980534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3540f40e023aca59%3A0x5e8b66c876cde430!2z54aK5pys5Z-O!5e0!3m2!1sja!2sjp!4v1624586695012!5m2!1sja!2sjp"
                    width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <div class="p-map__layer"></div>
                <div class="p-map__info">
                    <h2 class="p-map__ttl">見出しが入ります</h2>
                    <span></span>
                    <p class="p-map__desc">
                        テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                    </p>
                </div>
            </div>
        </section>

    </div>
</main>
<!-- /.l-main -->

<!-- ----サイドバーのテンプレート化 -> sidebar.php---- -->
<?php get_sidebar(); ?>

<!-- ----フッターのテンプレート化 -> footer.php---- -->
<?php get_footer(); ?>