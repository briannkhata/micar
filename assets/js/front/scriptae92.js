$(document).ready(function() {
    'use strict';



    // fixing issue of stiky bar when reload
    $(this).scrollTop(0);

    /**
     * Navbar-Toggle In Mobile View
     **/

    $(".toggle-nav-btn i").on("click", function() {
        $(".sidenav").toggleClass("toggle-nav");
    });
    $(".closebtn i").on("click", function() {
        $(".sidenav").removeClass("toggle-nav");
    });

    /**
     * OzCar Buy Online button hide car details
     **/
    //    $(".hideCarDetails").click(function(e) {
    //        e.preventDefault();
    //        $(this).children().toggleClass("activeOnLine").parents(".moreInfo").children(".ulInfoCar").toggle();
    //    });



    /*
            $(window).on('load', function() {
            $(".hideCarDetails2").click(function(e) {
                e.preventDefault();
                $(this).children().toggleClass("activeOnLine").parents(".moreInfo").children(".ulInfoCar").toggleClass("showLastItem");
            });
    });

                    $(".hideCarDetails").click(function(e) {
                e.preventDefault();

                var $this = $(this);
                $this.toggleClass('hideCarDetails');
                if($this.hasClass('hideCarDetails')){
                    $this.text('Reduce').next().toggleClass("activeOnLine").parents(".moreInfo").children(".ulInfoCar").removeClass("ulInfoCar2");
                } else {
                    $this.text('Expand').next().toggleClass("activeOnLine").parents(".moreInfo").children(".ulInfoCar").addClass("ulInfoCar2");
                }

            });

    */
    /**
    /**
     * chat popup overLay adn select
     **/

    $(".headChat").click(function() {
        $(".bodyChat").slideToggle();
        $(this).parent().prev(".chatOverlay").toggle();
    });
    $(".chatOverlay").click(function() {
        $(this).next(".chatNow").find(".bodyChat").animate({
            opacity: 'hide',
            height: 'hide'
        }, 'slow');
        $(this).toggle();

    });
    $(".openSelectPop").click(function() {
        $(".selectSearchPopup").fadeToggle();
        $(".chatOverlaySelect").fadeToggle();

        $(".closePopSelect").one('click', function() {
            $(".selectSearchPopup").fadeOut();
            $(".chatOverlaySelect").fadeOut();
        });
    });
    $('.chatOverlaySelect').click(function() {
        $(".selectSearchPopup").fadeOut();
        $(".chatOverlaySelect").fadeOut();
    });
    $('.CloseBtnSelect').click(function() {
        $(this).parents('.selectSearchPopup').fadeOut()
    });

    /**
     * fixed Header sticky
     **/
    $(window).scroll(function() {

        if ($(this).scrollTop() > 40) {
            $('header.fixedHeader').addClass("sticky");
        } else {
            $('header.fixedHeader').removeClass("sticky");
        }
        //        var div_top = $('.sideBanner').offset().top;
        //        if ($(this).scrollTop() > 860) {
        //            console.log($(this).scrollTop())
        //            $('.sideBanner').addClass("sticky");
        //        } else {
        //            $('.sideBanner').removeClass("sticky");
        //        }

    });

    //    function sticky_relocate() {
    //        var window_top = $(window).scrollTop();
    //        var div_top = $('.sideBanner').offset().top;
    //        if (window_top > div_top) {
    //            $('.sideBanner').addClass('sticky');
    //        } else {
    //            $('.sideBanner').removeClass('sticky');
    //        }
    //    }
    //
    //    $(function () {
    //        $(window).scroll(sticky_relocate);
    //        sticky_relocate();
    //    });


    /*
     *** start adding js for section Tabs
     */
    function Tabs() {
        var bindAll = function() {
            var menuElements = document.querySelectorAll('[data-tab]');
            for (var i = 0; i < menuElements.length; i++) {
                menuElements[i].addEventListener('click', change, false);
            }
        }

        var clear = function() {
            var menuElements = document.querySelectorAll('[data-tab]');
            for (var i = 0; i < menuElements.length; i++) {
                menuElements[i].classList.remove('active');
                var id = menuElements[i].getAttribute('data-tab');
                document.getElementById(id).classList.remove('active');
            }
        }

        var change = function(e) {
            e.preventDefault();
            clear();
            e.target.classList.add('active');
            var id = e.currentTarget.getAttribute('data-tab');
            document.getElementById(id).classList.add('active');
            //            document.getElementById("chatOverlay").classList.toggle('fireOverLay');

        }

        bindAll();
    }

    var connectTabs = new Tabs();


    $(".b-nav-tab2").click(function() {
        $("#chatOverlay").addClass("fireOverLay");
        $(".tabsSection").addClass("opacityTabs");
        let hasActiv = $(this).hasClass("active")
        if (hasActiv === true) {
            $(this).parent().addClass("BGbtn").siblings().removeClass("BGbtn")
        }
    })


    $("#chatOverlay").click(function() {
        $(this).removeClass();
        $(".tabsSection").removeClass("opacityTabs");
        $(this).siblings(".col-md-12").find(".b-tab").removeClass('active');
        $(this).siblings(".col-md-4").find(".b-nav-tab").removeClass('active');
        $(this).siblings(".col-md-4").removeClass("BGbtn")
            //        $(this).siblings().find("a").removeClass('active')

    });

    /*
     *** start adding js banner tabs
     */
    $('.tab').on('click', function(e) {
        e.preventDefault();
        $('.tab, .panel').removeClass('active');
        $(this).add('#' + $(this).attr('id').replace(/\s*tab\s*/, 'panel')).addClass('active');
        $(this).focus();
    });


    /*
     *** start adding js DropdownHome
     */
    $('.DropdownHome').click(function() {
        $(this).next(".DropdownContent").slideToggle()
    });


    /*
     *** start adding js for owlcarousel2
     */
    $('.owl-carousel1').owlCarousel({
        loop: false,
        margin: 19,
        nav: true,
        navText: ['<img alt="" src="/img/front/Owl-chevron-left1 (2).png">', '<img alt="" src="/img/front/Owl-chevron-left1 (1).png">'],

        responsive: {
            0: {
                // items: 1.4,
                items: 1,
                stagePadding: 40,
                margin: 10
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
    $('.owl-carousel2').owlCarousel({
        loop: true,
        margin: 19,
        nav: true,
        navText: ['<img alt="" src="/img/front/Owl-chevron-left1 (2).png">', '<img alt="" src="/img/front/Owl-chevron-left1 (1).png">'],
        responsive: {
            0: {
                items: 2.1,
                margin: 10

            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
    $('.owl-carouselK').owlCarousel({
        loop: true,
        margin: 19,
        nav: true,
        //         navText: ['<img alt="" src="/img/front/Owl-chevron-left1 (2).png">','<img alt="" src="/img/front/Owl-chevron-left1 (1).png">'],
        navText: ['<img alt="" src="/img/front/OzclubArrow2.png">', '<img alt="" src="/img/front/OzclubArrow1.png">'],
        responsive: {
            0: {
                items: 2,
                margin: 9

            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })

    $('.owl-carouselOc').owlCarousel({
        loop: true,
        margin: 19,
        nav: true,
        navText: ['<img alt="" src="/img/front/OzclubArrow2.png">', '<img alt="" src="/img/front/OzclubArrow1.png">'],
        responsive: {
            0: {
                items: 2,
                margin: 9

            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
    
    $('.owl-carousedealer').owlCarousel({
        loop: true,
        margin: 19,
        nav: true,
        navText: ['<img alt="" src="/img/front/OzclubArrow2.png">', '<img alt="" src="/img/front/OzclubArrow1.png">'],
        responsive: {
            0: {
                items: 2,
                margin: 9

            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })

    $('.owl-carousel3').owlCarousel({
        loop: false,
        margin: 15,
        nav: true,
        navText: ['<img alt="" src="/img/front/Owl-chevron-left1 (2).png">', '<img alt="" src="/img/front/Owl-chevron-left1 (1).png">'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
    $('.owl-carouselBanner').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ['<i class="fa" aria-hidden="true"><img src="/img/front/chevron-left.png" alt=""></i>', '<i class="fa" aria-hidden="true"><img src="/img/front/chevron-right.png" alt=""></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })



    var synconeimage = $("#syncone");
    var synctwo = $("#synctwo");
    //var totalslides = 10;
    var sync1 = $("#syncone");
    var sync2 = $("#synctwo");
    var slidesPerPage = 3.5; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1.owlCarousel({
        // items : 1,
        // slideSpeed : 2000,
        // nav: true,
        // autoplay: false,
        // dots: true,
        // loop: true,
        // responsiveRefreshRate : 200,
        // navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
        // dotsEach: 3,
        dotsEach: false,

        loop: true,
        margin: 10,
        nav: true,
        //    Default: 'owl-dots',
        // XD old with dots
        // navText: ['<i class="fa" aria-hidden="true"><img src="/img/front/caret-left.png" alt=""></i>', '<i class="fa" aria-hidden="true"><img src="/img/front/caret-right.png" alt=""></i>'],
        // XD new without dots
        navText: ['<img alt="" src="/img/front/Owl-chevron-left1 (2).png">', '<img alt="" src="/img/front/Owl-chevron-left1 (1).png">'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
        // })
        //stop adding dots inside arrows
    }).on('changed.owl.carousel', syncPosition);
    sync1.find(".owl-dots").insertAfter(sync1.find(".owl-prev"));

    sync2
        .on('initialized.owl.carousel', function() {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            // loop:true,

            margin: 19,
            items: slidesPerPage,
            dots: false,
            nav: false,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100



        }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }


        //end block

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });









    // $('.owl-sliderShow').owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     nav: true,
    //     //    Default: 'owl-dots',
    //     navText: ['<i class="fa" aria-hidden="true"><img src="/img/front/caret-left.png" alt=""></i>', '<i class="fa" aria-hidden="true"><img src="/img/front/caret-right.png" alt=""></i>'],
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         600: {
    //             items: 1
    //         },
    //         1000: {
    //             items: 1
    //         }
    //     }
    // })
    // $('.owl-sliderShowGallery').owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     nav: true,
    //     responsive: {
    //         0: {
    //             items: 3.5
    //         },
    //         600: {
    //             items: 3.5
    //         },
    //         1000: {
    //             items: 3.5
    //         }
    //     }
    // })


    /*
        ionRangeSlider
    */
    if ($('#Condition').length) {
        $("#Condition").ionRangeSlider({
            min: 1,
            max: 10,
            onStart: function(data) {
                $('.Condition').find('.irs-slider.single').html(data.from);
                $('.Condition').find('.irs-single').remove();

            },
            onChange: function(data) {
                $('.Condition').find('.irs-slider.single').html(data.from);
                $('.Condition').find('.irs-single').remove();
            }
        });
    }
    if ($('#mechanical_faults').length) {
        $("#mechanical_faults").ionRangeSlider({
            min: 0,
            max: 3000,
            step: 50,
            onStart: function(data) {

                $('.mechanical_faults').find('.irs-slider.single').html(data.from);
                $('.mechanical_faults').find('.irs-single').remove();
            },
            onChange: function(data) {
                $('.mechanical_faults').find('.irs-slider.single').html(data.from);
                $('.mechanical_faults').find('.irs-single').remove();
            }
        });
    }
    if ($('#cost_of_cosmetic_repair').length) {
        $("#cost_of_cosmetic_repair").ionRangeSlider({
            min: 0,
            max: 3000,
            step: 250,
            onStart: function(data) {
                $('.cost_of_cosmetic_repair').find('.irs-slider.single').html(data.from);
                $('.cost_of_cosmetic_repair').find('.irs-single').remove();
            },
            onChange: function(data) {
                $('.cost_of_cosmetic_repair').find('.irs-slider.single').html(data.from);
                $('.cost_of_cosmetic_repair').find('.irs-single').remove();
            }
        });
    }

    if ($('#rate-serv').length) {
        $("#rate-serv").ionRangeSlider({
            min: 1,
            max: 10,
            onStart: function(data) {
                $('#rate-serv').parent().find('.irs-slider.single').html(data.from);
                $('.irs-single').remove();
            },
            onChange: function(data) {
                $('#rate-serv').parent().find('.irs-slider.single').html(data.from);
                $('.irs-single').remove();
            }
        });
    }

    if ($('#rate-car').length) {
        $("#rate-car").ionRangeSlider({
            min: 1,
            max: 10,
            onStart: function(data) {
                $('#rate-car').parent().find('.irs-slider.single').html(data.from);
                $('.irs-single').remove();
            },
            onChange: function(data) {
                $('#rate-car').parent().find('.irs-slider.single').html(data.from);
                $('.irs-single').remove();
            }
        });
    }
    if ($('#menu-desktop-items').length && $('#menu-desktop-items').hasClass("menu-desktop-items-auaction")) {
        $("#menu-mobile-items").html('<li><p>Menu</p></li>' + $('#menu-desktop-items').html()+'<li><a href="/auction/logout" style="padding-right: 30px;"><i class="fa fa-lock"></i> &nbsp;&nbsp;Logout</a></li>');        
    }else{
        // $("#menu-mobile-items").html('<li><p>Menu</p></li><li><a href="#" data-remodal-target="modal"><img alt="" src="/img/user.png" /> OzClub login </a></li><li><a href="/seller/login"><img alt="" src="/img/user.png" /> Seller login </a></li>'+$('#menu-desktop-items').html());
        $("#menu-mobile-items").html('<li><p>Menu</p></li><li><a href="/oz-club"><img alt="" src="/img/user.png" /> OzClub login </a></li>' + $('#menu-desktop-items').html());        
    }

});
$(document).ready(function() {
    var listItems = $("#menu-desktop-items li");
    listItems.each(function(idx, li) {
        var menu_item = $(li).find('a').attr("href");
        if (menu_item == window.location.pathname) {
            $(li).find('a').addClass("active");
        } else {
            $(li).find('a').removeClass("active");
        }
    });
});


function notification(type = 'info', text = 'Thank You', title = false, url = false, url_text = false) {

    $('.showHideSuccess').show();

    $('.backPopupButton').hide();
    $('.backPopupButton').attr('href', '');
    // var title;

    $('.showHideSuccess').attr('src', '/img/carCare/' + type + '.png');
    if (!title) {
        if (type == 'success') {
            title = 'Thank You';
        } else if (type == 'errors') {
            title = 'Sorry';
        } else {
            title = 'Information';
        }
    }
    if (url) {

        $('.backPopupButton').show();
        $('.backPopupButton').attr('href', url);

        $('.backPopupButton').html('Back');
        if (url_text)
            $('.backPopupButton').html(url_text);
        // var title;
    }
    $(document).ready(function() {
        $('#FlashMessagePop .CDhead h2').html(title);
        $('#FlashMessagePop .CDbody p').html(text);
        //    $('#modalImage').prop('src', data.image);
        //    $('#finderUrl').prop('href', data.url);
        //    if (data.url) {
        //        carfinderurl = data.url;
        //    }
        if ($('[data-remodal-id=FlashMessagePop]').length) {
            var FlashMessagePop = $('[data-remodal-id=FlashMessagePop]').remodal();
            FlashMessagePop.open();
        }
    });
}