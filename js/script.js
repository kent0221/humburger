// ::::サイドバーの挙動::::

// Menuボタンを押すとサイドバーがフェードイン
$(function () {
    $('.c-btn__menu').click(function () {
        $('.l-grid__fixed, .l-sidebar').toggleClass('is-open');
        $('.l-sidebar').fadeIn(500);
    });
});

// バツボタン押すとサイドバーがフェードアウト
$(function () {
    $('.c-btn__close').click(function () {
        $('.l-grid__fixed, .l-sidebar').toggleClass('is-open');
        $('.l-sidebar').fadeOut(500);
    });

});