$(document).ready(function () {
    $('.hamburger').click(function () {
        $('.hamburger').toggleClass('active');
        $('.menu').slideToggle('slow');
    })
});