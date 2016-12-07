
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
