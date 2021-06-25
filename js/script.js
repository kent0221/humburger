// ::::サイドバーの挙動::::

// Menuボタンを押すとサイドバーがフェードイン
$(function () {
    $('.c-btn__menu').click(function () {
        $('.l-grid, .l-sidebar').toggleClass('is-open');
        $('.l-sidebar').fadeIn(250);
    });
});

// バツボタン押すとサイドバーがフェードアウト
$(function () {
    $('.c-btn__close').click(function () {
        $('.l-sidebar').fadeOut(250);
        $('.l-grid').toggleClass('is-open');
        setTimeout(() => {
            $('.l-sidebar').toggleClass('is-open');
        }, 500);
    });

});