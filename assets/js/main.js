$(function() {

    "use strict";

    //===== Prealoder

    $(window).on('load', function(event) {
        $('.preloader').delay(500).fadeOut(500);
    });


    //===== Search

    $('#search').on('click', function(){
        $(".search-box").fadeIn(600);
    });
    $('.closebtn').on('click', function(){
        $(".search-box").fadeOut(600);
    });


    //===== Sticky

    $(window).on('scroll', function(event) {
        var scroll = $(window).scrollTop();
        if (scroll < 245) {
            $(".navigation").removeClass("sticky");
            $(".navigation-3 img").attr("src", "images/logo-2.png");
        } else{
            $(".navigation").addClass("sticky");
            $(".navigation-3 img").attr("src", "images/logo.png");
        }
    });


    //===== Mobile Menu

    $(".navbar-toggler").on('click', function() {
        $(this).toggleClass("active");
    });

    var subMenu = $('.sub-menu-bar .navbar-nav .sub-menu');

    if(subMenu.length) {
        subMenu.parent('li').children('a').append(function () {
            return '<button class="sub-nav-toggler"> <i class="fa fa-chevron-down"></i> </button>';
        });

        var subMenuToggler = $('.sub-menu-bar .navbar-nav .sub-nav-toggler');

        subMenuToggler.on('click', function() {
            $(this).parent().parent().children('.sub-menu').slideToggle();
            return false
        });

    }

    //===== Slick Category Slied

    $('.category-slied').slick({
        dots: false,
        infinite: true,
        speed: 800,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: true,
        prevArrow:'<span class="prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
        responsive: [
        {
          breakpoint: 922,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
        ]
    });

    //===== Back to top

    // Show or hide the sticky footer button
    $(window).on('scroll', function(event) {
        if($(this).scrollTop() > 600){
            $('.back-to-top').fadeIn(200)
        } else{
            $('.back-to-top').fadeOut(200)
        }
    });


    //Animate the scroll to yop
    $('.back-to-top').on('click', function(event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });
    $("input#keyword").keyup(function() {
      if ($(this).val().length > 2) {
        $("#datafetch").show();
      } else {
        $("#datafetch").hide();
      }
    });


});
setTimeout(function(){
    $('[data-src]').each(function(){
        $(this).attr('src',
            $(this).data('src'));
        $(this).removeAttr('data-src')
    })
}, 2500);
setTimeout(function(){
    $('[data-source]').each(function(){
        $(this).attr('style',
            $(this).data('source'));
        $(this).removeAttr('data-source')
    })
}, 2500);

    $(window).on('scroll', function () { if ($(this).scrollTop() > 10) { $('[data-src]').each(function () { $(this).attr('src', $(this).data('src')); $(this).removeAttr('data-src') }) } });
    $(window).on('scroll', function () { if ($(this).scrollTop() > 10) { $('[data-source]').each(function () { $(this).attr('style', $(this).data('source')); $(this).removeAttr('data-source') }) } });
