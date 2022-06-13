$('a[href="' + window.location.href.split('?')[0] + '"] div,a[href="' + window.location.href.split('?')[0] + '"],a[href="' + window.location.href + '"] div,a[href="' + window.location.href + '"]').addClass('active');
setTimeout(function () {
    $('.main').css({
        'opacity': '1'
    });
    $('.faq').css({
        'opacity': '1'
    });
    $('.loading-overlay').fadeOut(200);
}, 1200);