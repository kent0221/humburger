<?php
/**デバッグ対応（以下、コメント欄がないことによるエラー）
 * 推奨: このテーマは標準的なアバター関数をサポートしていないようです。
 * 推奨: このテーマにはコメントのページ送り用のコードが含まれていません。
 *
 */
?>
<!--コメント欄  -->
<div id="comments" class="p-comments">
    <?php if (have_comments()): ?>
    <h3 class="p-comments__ttl">コメント欄</h3>
    <ul class="p-comments__list">
        <?php wp_list_comments('avatae_size=60') ?>
    </ul>
    <?php endif; ?>

    <!-- フォーム欄 -->
    <?php
    comment_form(array(
        'title_reply'=>'コメントする',
        'label_submit'=>'送信する',
    ));
    ?>
    <!-- コメント欄のページ送り -->
    <?php
    if (get_comment_pages_count() > 1):
        echo '<div class="p-comments__pagenation">';
        paginate_comments_links();
        echo '</div>';
    endif;
    ?>

</div>