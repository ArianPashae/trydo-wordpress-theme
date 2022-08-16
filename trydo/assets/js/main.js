/*------------------------------------------------
Trydo - Creative Agency WordPress Theme
All Main Js init here
--------------------------------------------------*/

(function (window, document, $, undefined) {
    'use strict';

    var trydo = {
        t: function (e) {
            trydo.s();
            trydo.methods()
        },

        s: function (e) {
            this._window = $(window),
			this._document = $(document),
			this._body = $('body'),
            this._html = $('html')
        },

        methods: function (e) {
            trydo.wowinit();
            trydo.feature();
            trydo.scrollup();
            trydo.preloaderInit();
            trydo.mobileMenu();
            trydo.addLastMenuClass();
            trydo.slickyHeader();
            trydo.counterUpInit();
            trydo._slickactivation();
            trydo._clickDoc();
        },

        wowinit: function () {
            new WOW().init();
        },

        counterUpInit: function () {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },

        feature: function () {
            feather.replace()
        },

        scrollup: function () {
            if($("body").hasClass("active-scroll-to-top")){
                $.scrollUp({
                    scrollText: '<i class="feather-arrow-up"></i>',
                    easingType: 'linear',
                    scrollSpeed: 900,
                    animation: 'slide'
                });
            }
        },
        
        preloaderInit: function(){
            trydo._window.on('load', function () {
                $('.preloader').fadeOut('slow', function () {
                    $(this).remove();
                });
            });
        },

        mobileMenu: function (e) {

            $('.humberger-menu').on('click', function (e) {
                e.preventDefault();
                $('.header-wrapper').addClass('menu-open');
                $('body').addClass('body-overlay');
                // $('html').css({ overflow: "hidden" })
            });
            $('.close-menu, .full-overlay').on('click', function (e) {
                e.preventDefault();
                $('.header-wrapper').removeClass('menu-open');
                $('body').removeClass('body-overlay');
                $('.has-droupdown > a').removeClass('open').siblings('.submenu').removeClass('active').slideUp('400');
                // $('html').css({
                //     overflow: ""
                // });
            });

            var screenWidth = $(window).width();
            if( screenWidth < 992){
                $('.has-droupdown > a').on('click', function (e) {
                    e.preventDefault();
                    $(this).siblings('.submenu').slideToggle('400');
                    $(this).toggleClass('open').siblings('.submenu').toggleClass('active')
                });
            }

        },

        slickyHeader: function (e) {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 250) {
                    $('.header--sticky').addClass('sticky')
                } else {
                    $('.header--sticky').removeClass('sticky')
                }
            })
        },

        addLastMenuClass: function () {
            $('nav.mainmenunav > ul > li').slice(-4).addClass('last-elements');
        },

        _slickactivation: function (e) {
            $('.trydo-carousel-gallery').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
            });
            $('.rn-arrow-activation').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        },

        _clickDoc: function (e) {
            var smothscroll, onepageClick
            smothscroll = function (e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, 500);
            };

            onepageClick = function (e) {
                e.preventDefault();
                $('.header-wrapper').removeClass('menu-open');
                $('body').removeClass('body-overlay');
            };

            trydo._document
            .on('click', '.smoth-animation', smothscroll)
            .on('click', '.trydo-active-onepage-navigation .header-area .mainmenu > li > .nav-link, .trydo-active-onepage-navigation .header-area .mainmenu > li .submenu li .nav-link', onepageClick)
        },

    }
    trydo.t()
})(window, document, jQuery);








