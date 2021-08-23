<!-- ----ヘッダーのテンプレート化 -> header.php---- -->
<?php get_header(); ?>

<main class="l-main">

    <?php
if (have_posts()):
    while (have_posts()):the_post();
?>

    <section class="l-main__hero p-hero c-mainvisual__page">
        <div class="c-ttl">
            <h1 class="c-ttl__hero"><?php the_title(); ?></h1>
        </div>
    </section>

    <div class="l-main__wrap">

        <section class="l-main__contents p-article">
            <?php the_content(); ?>
        </section>

    </div>

    <?php
endwhile;
else:
?>
    <p class="l-main__noresult">表示する記事がありません</p>
    <?php
endif;
?>

</main>
<!-- /.l-main -->


<!-- ----サイドバーのテンプレート化 -> sidebar.php---- -->
<?php get_sidebar(); ?>

<!-- ----フッターのテンプレート化 -> footer.php---- -->
<?php get_footer(); ?>




<!-- 以下、元のソースコード -----


    <main class="l-main">
    <section class="l-main__hero p-hero c-mainvisual__page">
        <div class="c-ttl">
            <h1 class="c-ttl__hero">ショップについて</h1>
        </div>
    </section>

    <div class="l-main__wrap">

        <section class="l-main__contents p-article">
            <h2 class="p-article__ttl">見出し h2</h2>
            <p class="p-article__desc">
                Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。Pタグテキスト。
            </p>
            <h3 class="p-article__subttl">見出し h3</h3>
            <h4 class="c-ttl__sub">見出し h4</h4>
            <h3 class="c-ttl__sub">見出し h3</h3>
            <h4 class="c-ttl__sub">見出し h4</h4>
            <h5 class="c-ttl__sub">見出し h5</h5>
            <h6 class="c-ttl__sub">見出し h6</h6>

            <blockquote class="p-blockquote">
                <div class="p-blockquote__wrap">
                    <p class="p-blockquote__txt">
                        Blockquote
                        引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ引用タグ
                    </p>
                    <p class="p-blockquote__link">
                        出典元：
                        <a href="/archive.html">○○○○○○○○○○○○</a>
                    </p>
                </div>
            </blockquote>

            <div class="p-eyecatch">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー" class="p-eyecatch__cover">


                <div class="p-eyecatch__flex">
                    <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                    <p>
                        テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                        テキストが入ります
                        テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                        テキストが入ります
                        テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                        テキストが入ります
                        テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                        テキストが入ります
                        テキストが入ります テキストが入ります
                    </p>
                </div>
                <div class="p-eyecatch__flex">
                    <p>
                        テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                        テキストが入ります
                        テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                        テキストが入ります
                        テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                        テキストが入ります
                        テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります テキストが入ります
                        テキストが入ります
                        テキストが入ります テキストが入ります
                    </p>
                    <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                </div>
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー" class="p-eyecatch__contain">
            </div>

            <div class="p-grid">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
                <img src="/img/eyecatch/cooked-foods-750073-2.png" alt="ハンバーガー">
            </div>

            <div class="p-list">
                <ol class="p-list__ol">
                    <li>1. リストリストリスト</li>
                    <li>2. リストリストリスト
                        <ol class="p-list__ol-child">
                            <li>1. リスト2リスト2リスト2</li>
                            <li>2. リスト2リスト2リスト2</li>
                        </ol>
                    </li>
                    <li>1. リストリストリスト</li>
                    <li>2. リストリストリスト</li>
                </ol>

                <ul class="p-list__ul">
                    <li>リストリストリスト</li>
                    <li>リストリストリスト
                        <ul class="p-list__ul-child">
                            <li>リスト2リスト2リスト2</li>
                            <li>リスト2リスト2リスト2</li>
                        </ul>
                    </li>
                    <li>リストリストリスト</li>
                    <li>リストリストリスト</li>
                </ul>
            </div>

            <div class="p-code">
                <div class="p-code__wrap">
                    <pre>
<code>
&lt;html&gt;
    &lt;head&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
</pre>
                </div>
            </div>

            <table class="p-table">
                <tbody>
                    <tr>
                        <th class="p-table__left">テーブル</th>
                        <th class="p-table__right">テーブル</th>
                    </tr>
                    <tr>
                        <td>テーブル</td>
                        <td>テーブル</td>
                    </tr>
                    <tr>
                        <td>テーブル</td>
                        <td>テーブル</td>
                    </tr>
                    <tr>
                        <td>テーブル</td>
                        <td>テーブル</td>
                    </tr>
                </tbody>
            </table>

            <buttom class="p-btn">
                <input type="submit" class="p-submit" value="ボタン">
            </buttom>

            <p class="p-txt">
                boldboldboldboldboldboldbold
            </p>

        </section>

    </div>

</main>

<aside class="l-sidebar">
    <div class="l-sidebar__btn c-btn__close">
        <span></span>
        <span></span>
    </div>

    <h2 class="l-sidebar__ttl p-ttl__sidebar"> Menu</h2>


    <ul class="l-sidebar__gmenu p-gmenu">

        <li class="p-gmenu__item">
            <a href="/archive.html">バーガー</a>
            <ul class="c-menu">
                <li class="c-menu__item"><a href="/archive.html">ハンバーガー</a></li>
                <li class="c-menu__item"><a href="/archive.html">チーズバーガー</a></li>
                <li class="c-menu__item"><a href="/archive.html">テリヤキバーガー</a></li>
                <li class="c-menu__item"><a href="/archive.html">アボガドバーガー</a></li>
                <li class="c-menu__item"><a href="/archive.html">フィッシュバーガー</a></li>
                <li class="c-menu__item"><a href="/archive.html">ベーコンバーガー</a></li>
                <li class="c-menu__item"><a href="/archive.html">チキンバーガー</a></li>
            </ul>
        </li>

        <li class="p-gmenu__item">
            <a href="/archive.html">サイド</a>
            <ul class="c-menu">
                <li class="c-menu__item"><a href="/archive.html">ポテト</a></li>
                <li class="c-menu__item"><a href="/archive.html">サラダ</a></li>
                <li class="c-menu__item"><a href="/archive.html">ナゲット</a></li>
                <li class="c-menu__item"><a href="/archive.html">コーン</a></li>
            </ul>
        </li>

        <li class="p-gmenu__item">
            <a href="/archive.html">ドリンク</a>
            <ul class="c-menu">
                <li class="c-menu__item"><a href="/archive.html">コーラ</a></li>
                <li class="c-menu__item"><a href="/archive.html">ファンタ</a></li>
                <li class="c-menu__item"><a href="/archive.html">オレンジ</a></li>
                <li class="c-menu__item"><a href="/archive.html">アップル</a></li>
                <li class="c-menu__item"><a href="/archive.html">紅茶（Ice / Hot）</a></li>
                <li class="c-menu__item"><a href="/archive.html">コーヒー（Ice / Hot）</a></li>
            </ul>
        </li>
    </ul>
</aside>

<fotter class="l-footer">
    <p class="l-footer__info">ショップ情報 | ヒストリー</p>
    <p class="l-footer__copyright"><small>Copyright: RaiseTech</small></p>
</fotter>


</div>

<script src="./js/jquery.min.js"></script>
<script src="./js/script.js"></script>
</body>

</html> -->