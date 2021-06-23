// ::::サイドバーの挙動::::

// Menuボタンを押すとサイドバーがフェードイン
$(function () {
    $('.c-btn__menu').click(function () {
        $('.l-sidebar').toggleClass('is-open');
        $('.l-sidebar').fadeIn(200);
    });
});

// バツボタン押すとサイドバーがフェードアウト
$(function () {
    $('.c-btn__close').click(function () {
        $('.l-sidebar').toggleClass('is-open');
        $('.l-sidebar').fadeOut(200);
    });

});