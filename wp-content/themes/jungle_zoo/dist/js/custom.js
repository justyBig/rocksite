// This document ready syntax supports use of the $ alias in jQuery no conflict mode. See README.md for more info and alternatives.
jQuery( document ).ready( function( $ ) {


    // Homepage Fade Slider
    $('.hero-fade-slider').slick({
        arrows: false,
        accessibility: false,
        fade: true,
        speed: 1000,
        autoplaySpeed: 2500,
        autoplay: true,
        slidesToShow: 1
    });
    // function fadeSlide() {
    //     $('.fade-slide').each(function () {
    //         var winWdth = $(window).width();
    //         if (winWdth < 480) {
    //             var slideHght = winWdth * 1.46;
    //         } else if (winWdth < 769) {
    //             var slideHght = winWdth * .59;
    //         } else {
    //             var slideHght = winWdth * .35;
    //         }
    //
    //         $(this).width(winWdth).height(slideHght);
    //     });
    // }
    //
    // fadeSlide();
    // $(window).resize(function () {
    //     fadeSlide();
    // });

} ); // end no-conflict document ready
