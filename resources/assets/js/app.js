
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

$(document).on('change', '.new_product_image input:file', function() {
    var file = this.files[0];
    $(".btn-txt").html(file.name);
});

$(document).on('click', 'ul.pagination li a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    $.ajax({
        url: 'paginated_products/?page=' + page
    }).done(function (data) {
        var view = data[0];
        var links = data[1];
        $('.products').html(view);
        $('.pag').html(links);
        location.hash = page;
    });
});

$(document).on('click', 'a.login-link', function (e) {
    e.preventDefault();
    var $loginLink = $(this);
    var $offset = $loginLink.offset();
    var $loginPopup = $('.login-popup');
    var $height = $loginLink.outerHeight();
    var $width = $loginPopup.outerWidth();
    console.log($(this).offset());
    $loginPopup.css({
        position: "absolute",
        top: ($offset.top + $height + 5) + "px",
        left: ($offset.left - $width/2) + "px"
    }).slideToggle(200);
});

$(window).scroll(function() {
    var $scroller = $('#scroller');
    var $loginPopup = $('.login-popup');
    var $loginLink = $('a.login-link');
    if ($(window).scrollTop() > 200) {
        $scroller.addClass('stuck');
        $loginPopup.css({
            top: ($loginLink.offset().top + $loginLink.outerHeight() + 5) + "px"
        })
    } else {
        $scroller.removeClass('stuck');
        $loginPopup.css({
            top: ($loginLink.offset().top + $loginLink.outerHeight() + 5) + "px"
        })
    }
});

$(document).bind(
    'touchmove',
    function(e) {
        e.preventDefault();
    }
);