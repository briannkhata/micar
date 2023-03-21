<!DOCTYPE html>
<html>

<head>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5TC6XC6');
    </script>
    <!-- End Google Tag Manager -->
    <!-- 
    Start of global snippet: Please do not remove
    Place this snippet between the <head> and </head> tags on every page of your site.
    -->
    <!-- Global site tag (gtag.js) - Google Marketing Platform -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=DC-12154588"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'DC-12154588');
    </script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MiCar | Car Details </title>
    <link href="/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <meta name="keywords" content="Ozcar" />
    <meta name="description" content="Ozcar" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.550/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.550/pdf.worker.min.js"></script>


    <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/front/JQueryV3.js"></script>
    <script src="<?=base_url();?>assets/js/toastr.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.validate.js"></script>
    <script src="<?=base_url();?>assets/js/front/Accordion.js"></script>
    <script src="<?=base_url();?>assets/js/front/remodal.min.js"></script>
    <script src="<?=base_url();?>assets/js/overlay.js?v=3"></script>
    <script src="<?=base_url();?>assets/js/script.js"></script>
    <script src="<?=base_url();?>assets/js/front/script.js?v=1679315043"></script>
    <script src="<?=base_url();?>assets/js/new_js/ion.rangeSlider.js"></script>
    <script src="<?=base_url();?>assets/js/front/owl.carouse.min.js"></script>

    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/all.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/remodal.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/remodal-default-theme.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/normalize.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/ozGrid.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/toastr.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/style.css?v=1679315043" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/style2.css?v=151679315043" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/owl.theme.default.min.css" />

    <script type="text/javascript">
    var BASE_URL = 'https://www.ozcar.com.au/';
    var font_awesome_url = 'http://www.ozcar.com.au/fa/css/font-awesome.min';
    var _csrfToken =
        'T3iub1mKFc8F0igVmQnS79iR7u6C0Ip9vysQzyIt/PoyocMwP9JZeMQsjY4JL2WSTy0EUPI7X6GBpdRrNleiBbOQKSP5xYK6vandiuDhsk+MHnb8FxXFnAbH9lFd5mpA8Bvuu2xKBKsuHzMxxgs7lA==';

    $.ajaxSetup({
        beforeSend: function(xhr, settings) {
            if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type) && !this.crossDomain) {
                xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
            }
        }
    });
    </script>

    <script>
    //Added for pdf
    $(function() {
        let pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null;

        if ($('#pdf-canvas').length > 0) {
            const scale = 2.0,
                canvas = document.getElementById('pdf-canvas'),
                pnum = document.getElementById('page-num')
            ctx = canvas.getContext('2d');

            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */
            function renderPage(num) {
                pageRendering = true;

                // Using promise to fetch the page
                pdfDoc.getPage(num).then(function(page) {
                    const page_viewport = page.getViewport(scale);
                    canvas.height = page_viewport.height;
                    canvas.width = page_viewport.width;

                    // Render PDF page into canvas context
                    const renderContext = {
                        canvasContext: ctx,
                        viewport: page_viewport
                    };
                    const renderTask = page.render(renderContext);

                    // Wait for rendering to finish
                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            // New page rendering is pending
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });

                // Update page counters
                $(pnum).text(num);
            }
        }

        /**
         * If another page rendering in progress, waits until the rendering is
         * finised. Otherwise, executes rendering immediately.
         */
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        /**
         * Displays previous page.
         */
        $(".carousel-control-prev").click(function() {
            if (pageNum > 1) {
                pageNum--;
                queueRenderPage(pageNum);
            }
        });

        /**
         * Displays next page.
         */
        $(".carousel-control-next").click(function() {
            if (pageNum < pdfDoc.numPages) {
                pageNum++;
                queueRenderPage(pageNum);
            }
        });

        /**
         * Asynchronously downloads PDF.
         */
        (function() {

            if ($('#pdf-canvas').length > 0) {
                const url = $('#pdf-canvas').data("file");
                pdfjsLib.getDocument(url).then(function(pdfDoc_) {
                    pdfDoc = pdfDoc_;
                    $("#page-count").text(pdfDoc.numPages);

                    // Initial/first page rendering
                    renderPage(pageNum);
                });
            }
        })();
    });
    ///Added for PDF

    $(function() {
        $('nav#navside').prepend($('#login-user-mobile'));

        if (document.location.hash == "#login") {
            var inst = $('[data-remodal-id=modal]').remodal();
            inst.open();
        }
        if (document.location.hash == "#forget_password") {
            var inst = $('[data-remodal-id=forget_password]').remodal();
            inst.open();
        }
        $('a[href="#registerbox"]').on('click', function() {
            var inst = $('[data-remodal-id=registerbox]').remodal();
            inst.open();
            return false;
        });
    });

    $(function() {
        $('a[href="#forget_password"]').on('click', function() {

            var inst1 = $('[data-remodal-id=registerbox]').remodal();
            inst1.close();
            // var inst0 = $('[data-remodal-id=sellerlogin]').remodal();
            // inst0.close();

            var inst = $('[data-remodal-id=forget_password]').remodal();
            inst.open();

            return false;
        });
    });

    </script>


    <link rel="canonical" href="https://www.ozcar.com.au/cars/view/525020/Mazda%20Bt-50%20Xt%20%284x2%29%202017" />

    <!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '807918252600201');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=807918252600201&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
</head>


<body class="">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TC6XC6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
        </noscript>

    <script>
    gtag('event', 'conversion', {
        'allow_custom_scripts': true,
        'send_to': 'DC-12154588/dk-oz0/rmktg0+standard'
    });
    </script>
    <noscript>
        <img src="https://ad.doubleclick.net/ddm/activity/src=12154588;type=dk-oz0;cat=rmktg0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=${GDPR};gdpr_consent=${GDPR_CONSENT_755};ord=1186194168?"
            width="1" height="1" alt="" />
    </noscript>
    <!-- End of event snippet: Please do not remove -->
    <div class="blockUI-loader blockOverlay-loader"></div>
    <div class="blockUI-loader blockMsg-loader blockMsg-loader-new">
        <img class="hidden-xsS" src="<?=base_url();?>assets/webroot/css/new_css/1ea71_Loading_GIF_white.gif?v=10"
            alt="">
        <img class="hidden-md hidden-lg hidden-sm"
            src="<?=base_url();?>assets/webroot/css/new_css/1ea71_Loading_GIF_white.gif" alt="">
    </div>

    <style>
    .blockOverlay-loader {
        z-index: 1000;
        border: medium none;
        margin: 0px;
        padding: 0px;
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        background-color: rgb(255, 255, 255);
        opacity: 0.6;
        cursor: wait;
        position: fixed;
    }

    .blockMsg-loader {
        z-index: 1001;
        display: block;
        position: fixed;
        margin: 0px;
        width: 50%;
        top: 40%;
        transform: translatey(-50px);
        left: 25%;
        text-align: center;
        color: rgb(0, 0, 0);
        border: 0px solid #fff;
        cursor: wait;
    }

    .blockUI-loader {
        display: none;
    }
    </style>
    <!--**************************************************************************************************-->

   
    <div class="Pagescontainer">

        <div class="">

            <section class="navbar">
                <div class="container">
                    <div class="row">
                        <div class="parent-of-overflow">
                            <div class="links-parent">
                                <div class="col-xs-3 hidden-sm show-xs">
                                    <div class="toggle-nav-btn hidden-lg show-xs"><i aria-hidden="true"
                                            class="fa {C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}"><img
                                                alt="" src="<?=base_url();?>assets/img/barsHumb.png" /> </i></div>
    
                                </div>

                                <div class="logoMobile hidden-sm show-xs col-xs-6 "><a href="/">
                                    <img alt="" src="<?=base_url();?>assets/webroot/filebrowser/upload/images/Ozcar_Logo.jpg" /></a></div>

                                <header class="fixedHeader">
                                    <div class="container ">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="logoHeadr"><a href="/"><img alt=""
                                                            src="<?=base_url();?>assets/webroot/filebrowser/upload/images/Ozcar_Logo.jpg" /></a>
                                                </div>
                                            </div>

                                            <div class="col-md-20">
                                                <div class="links main-1-background">
                                                    <ul id="menu-desktop-items">
                                                        <li><a href="<?=base_url();?>"
                                                                style="padding-right: 20px;">Home</a></li>
                                                        <li><a href="<?=base_url();?>Home/about"
                                                                style="padding-right: 20px;">About Us</a></li>
                                                        <li><a href="<?=base_url();?>Home/signup"
                                                                style="padding-right: 30px;">Contact Us</a></li>
                                                        <li><a href="<?=base_url();?>Home/signup">Create Account </a></li>
                                                        <li><a href="<?=base_url();?>Home/login"> Sign In</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </header>

                                <div class="mobile-navbar hidden-sm show-xs col-xs-3 links">
                                    <div class="searchMob">
                                    </div>
            
                                    <div class="sidenav" id="mySidenav">
                                        <div class="links-anc"><span class="closebtn" href="#" id="closeNav"><i
                                                    aria-hidden="true"
                                                    class="fa {C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}<!--fa-times-->"><img
                                                        alt="" src="<?=base_url();?>assets/img/closeMenu.png" /> </i> </span>
                                            <div class="overLayForClose">&nbsp;</div>
                                            <ul id="menu-mobile-items">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Section Row-->
                </div>
                <!--End Section Container-->
            </section>


            <div class="HeadOfficeForm">
                <div class="container">
                    <div class="col-md-12">
                        <div class="smallBanner">
                            <a href="https://www.ozcar.com.au/banners/view/MjU=" target="_blank">
                                <img alt=""
                                    src="<?=base_url();?>assets/img/clickableBanners//2022/11/636326ec68ac6_ozcar1291-ozclub-banner-06c.gif"
                                    style="width: 1170px; height: 305px;" />
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- start Why join the team section -->





            <!-- start Why join the team section -->
      





            <script type="application/javascript">
            $(document).ready(function() {
                $('.RowColumnSlider_21').click(function() {
                        $(this).toggleClass('toShow').parent().siblings(".col-md-3").children().removeClass(
                        'toShow')
                    $($(this).data('id')).toggle('toShow').parent().siblings(".col-md-12").children()
                        .hide()
                    if (window.matchMedia('(max-width: 767px)').matches) {
                       } else {
                    }

                });

                $(".EnquireNow").click(function() {
                    if ($('.moreInformation').length) {
                        $("html, body").animate({
                            scrollTop: $('.moreInformation').offset().top
                        }, "slow");
                    }

                });

            });
            </script>
        </div>

    </div>




    <style>
    #synctwo .item {

        cursor: pointer;
    }

    .remodal {
        max-width: 1100px;
    }

    .ic_modal-header {
        padding: 30px 25px;
        background-color:
            #005baa;
        color:
            white;
    }

    .active-details {
        border-radius: 4px !important;
        border: 1px solid #0060B4 !important;
        margin-right: 10px !important;
        color: #0060B4 !important;
        background: #FFF !important;
    }

    .hidden-details {
        border: none !important;
        border-radius: 4px !important;
        background: #F0F0F0 !important;
        /* background: #0061b4 !important; */
        color: #707070 !important;

    }

    .blockUI-loader {
        display: block;
    }

    .blockUI-loader>img {
        width: 150px;
    }

    .blockOverlay-loader {
        opacity: 0.9;
    }

    @media(min-width:992px) {
        .special-enquiry-field {
            height: 70px;
        }
    }

    @media(max-width:992px) {
        .special-enquiry-field {
            padding-bottom: 0px !important;
        }
    }

    /*@media (max-width:568px) {
         .VideoRequestPopup{
              height: 60px !important;
          }
    }*/
    /*temporary added for instagram(disabled) by rezwan*/

    .SocialSection .SocialBox .boxSo {
        border: none !important;
    }

    @media (min-width: 1200px) {
        .SocialSection .SocialBox .boxSo {
            padding: unset !important;
            margin-bottom: -50px !important;
        }

        .container300v250 {
            top: -555px !important;
        }
    }
    </style>
    <!-- start breadcrumb section -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li> Search Results.</li>
                        <li>| MAZDA BT-50 XT (4x2) 2017</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- start car slider -->
    <div class="carSlider">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="titleCar">
                        <h2>MAZDA BT-50 XT (4x2) 2017</h2>
                    </div>
                </div>

                <div class="col-md-7 infoCarLeft">
                    <div class="sliderShow zoom-fig-fix">
                        <div class="visible-xs">
                            <div class="countImg">
                                <img src="<?=base_url();?>assets/img/front/camera(2).png" alt="">
                                <span>8</span>
                            </div>
                        </div>
                        <!-- BuyOnlineWithBorder -->
                        <div class="BuyOnline">
                            <span>BUY ONLINE</span>
                            <p style="line-height: 0.9;">
                                SAVE
                                <sup style="font-size: 18px;">$</sup>1,453
                            </p>
                        </div>

                        <div class="app-figure sssss" id="zoom-fig">
                            <a data-options="cssClass: mz-show-arrows;zoomWidth:480px; zoomHeight:450px" id="Zoom-1"
                                class="MagicZoom" title="MAZDA BT-50 XT (4x2) 2017"
                                href="<?=base_url();?>assets/img/dsc00024.jpg"
                                data-image="<?=base_url();?>assets/img/dsc00024.jpg">
                                <img src="<?=base_url();?>assets/img/dsc00024.jpg" srcset="<?=base_url();?>assets/img/dsc00024.jpg?2x" alt="" />
                            </a>
                        </div>

                        <div class="owl-carousel owl-theme owl-sliderShowGallery hidden-xs" id="synctwo1">
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00024.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00024.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00024.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00024.jpg" />
                                </a>
                            </div>


                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00025.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00025.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00025.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00025.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00026.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00026.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00026.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00026.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00027.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00027.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00027.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00027.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00028.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00028.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00028.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00028.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00029.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00029.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00029.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00029.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00030.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00030.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00030.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00030.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00031.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00031.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00031.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00031.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00032.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00032.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00032.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00032.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00033.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00033.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00033.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00033.jpg" />
                                </a>
                            </div>
                            <div class="item">
                                <a data-zoom-id="Zoom-1" href="<?=base_url();?>assets/img/dsc00034.jpg"
                                    data-image="<?=base_url();?>assets/img/dsc00034.jpg">
                                    <img class="imageSlide" srcset="MAZDA BT-50 XT (4x2) 2017?2x"
                                        src="<?=base_url();?>assets/img/dsc00034.jpg"
                                        src="MAZDA BT-50 XT (4x2) 2017"
                                        src="<?=base_url();?>assets/img/dsc00034.jpg" />
                                </a>
                            </div>
                        </div>

                    </div>
                </div><!-- end col 7 -->
                <div class="col-md-5 infoCarColRight infoCarColRight2">
                    <div class="titleCar view-car-phone">
                        <h2><a href="tel:136922">Ph 136922</a></h2>
                    </div>
                    <div class="boxPrice">
                        <div class="boxP">
                            <p>
                                <span class="font-light">Regular price</span>
                                <span class="font18Bold">$31,990</span>

                            </p>
                            <p>
                                <span class="fontBold OZCLU">
                                    <span class="OZCLUB"> <span>oz</span> <span>Club</span></span>
                                    <span style="font-family: focobold">price</span>
                                    <span class="onHover OZCLU">
                                        <span class="OZCLUB"> <span>Oz</span> <span>Club</span></span>
                                        <span class="testOnHver">
                                            you can save thousands with OzClub pricing
                                        </span>
                                        <span class="testOnHverBGred">
                                            you could win a <strong>Wanderer tent</strong>
                                        </span>
                                        <a href="/ozclub#ozclub-register">Click to sign up</a>
                                    </span>
                                </span>
                                <span class="font28BoldBlue">$28,762</span>
                            </p>

                            <p class="borderDot ">
                                <span class="fontBold">Save #000's Buy Online</span>
                                <span class="fontBold dispalyNone">$27,309</span>
                                <!-- Buy now -->
                                <a class="BtnLite changeTextTOBuyOnline"
                                    href="<?=base_url();?>assets/orders/buy/525020/MAZDA%20BT-50%20XT%20%284x2%29%202017">GET BUY ONLINE
                                    PRICE</a>
                            </p>

                            <div class="boxP textCenter clearMarNDBorder VideoRequestBox">
                                <a class="MainBtn VideoRequestPopup" data-remodal-target="live-video-request"
                                    href="#">Request a Live Video Presentation</a>
                            </div>


                        </div>
                        <div class="boxP newStyle">


                            <input type="hidden" id="dis_car_amt" value="29307" />
                            <p>
                                <span class="fontBold">Get it on finance</span>
                                <span class="font22Bold" id="emi_value"></span>
                            </p>
                            <p>
                                <span>Rate</span>
                                <span class="font22Reg ic_cs_rate">8.99%</span>
                            </p>
                            <p>
                                <span>Comparison rate</span>
                                <span class="font22Reg ic_cs_rate">10.57%</span>
                            </p>
                            <p class="font12Lite"><a href="/content/finance-disclaimer">See Disclaimer</a></p>
                        </div>
                        <div class="boxP boxOfIcons">
                            <p>
                                <span>
                                    <img src="<?=base_url();?>assets/img/front/calendar.png" alt="">
                                    2017 </span>
                                <span>
                                    <img src="<?=base_url();?>assets/img/front/tachometer.png" alt="">
                                    7.6Lt/100km </span>
                            </p>
                            <p>
                                <span>
                                    <img src="<?=base_url();?>assets/img/front/steering-wheel.png" alt="">
                                    6SP MANUAL </span>
                                <span>
                                    <img src="<?=base_url();?>assets/img/front/tint.png" alt="">
                                    GREY </span>
                            </p>
                        </div>
                        <div class="boxP textCenter clearMarNDBorder">
                            <a class="MainBtn MainBtnProduct" data-remodal-target="ask-box" href="#">Enquire now</a>
                        </div>
                        <div class="boxP buttons">
                            <p>

                                <a class="BtnGray" onclick="check_trade_in()" href="javascript:void(0)">Instant trade-in
                                    price</a>

                                <a class="BtnGray" onclick="check_credit()" href="/content/new-finance">Free credit
                                    check</a>
                            </p>
                        </div>
                    </div><!-- end first box of price -->
                </div><!-- end col 5 -->
                <div class="col-md-7">
                    <div class="infoCarLeft">
                        <div class="slider">


                        </div>
                    </div><!-- end slider -->
                    <div class="moreInfo">
                        <div class="btns">
                            <a href="#" id="specifications" class="active-details">Specs</a>
                            <a href="#" id="extras" class="hidden-details">Extras</a>
                            <a href="#" id="stockSearchDetail" class="hidden-details">Details</a>
                        </div>

                        <div class="ulInfoCar stockSearchDetail">
                            <ul>
                                <li>
                                    <span>Make/Model</span>
                                    <span><strong class="semibold">Mazda Bt-50</strong></span>
                                </li>
                                <li>
                                    <span>Year</span>
                                    <span>2017</span>
                                </li>
                                <li>
                                    <span>Series</span>
                                    <span>XT (4x2)</span>
                                </li>
                                <li>
                                    <span>Body</span>
                                    <span>C/chas</span>
                                </li>
                                <li>
                                    <span>Engine</span>
                                    <span>2.2l 4cyl Dsl-turbo</span>
                                </li>
                                <li>
                                    <span>Kms</span>
                                    <span><strong class="semibold">117,923 KMs</strong></span>
                                </li>
                                <li>
                                    <span><a href="https://www.ozcar.com.au/content/vehicle-warranty-plan"
                                            target="_blank">Warranty (Remaining):</a></span>
                                    <span>
                                        <strong class="semibold">
                                            36 Months </strong>
                                    </span>
                                </li>
                                <li>
                                    <span><a href="https://www.ozcar.com.au/content/australian-wide-roadside-assistance"
                                            target="_blank">Roadside Assistance:</a></span>
                                    <span>
                                        <strong class="semibold">
                                            12 Months </strong>
                                    </span>
                                </li>
                                <li>
                                    <span><a href="https://www.ozcar.com.au/content/car-service" target="_blank">Service
                                            cost:</a></span>
                                    <span>
                                        <strong class="semibold">
                                            $167 </strong>
                                    </span>
                                </li>
                                <li>
                                    <span>Price</span>
                                    <span><strong class="semibold"><span
                                                class='offer'>$31,990</span><span><span><span>Oz</span>
                                                    <span>Club</span></span>
                                                $28,762
                                            </span> </strong></span>
                                </li>
                            </ul>

                        </div>
                        <div class="ulInfoCar specifications">
                            <ul>
                                <li>
                                    <span>Build date</span>
                                    <span>7/1/17</span>
                                </li>
                                <li>
                                    <span>Compliance date</span>
                                    <span>8/1/17</span>
                                </li>
                                <li>
                                    <span>Year</span>
                                    <span>2017</span>
                                </li>
                                <li>
                                    <span>Make</span>
                                    <span>Mazda</span>
                                </li>
                                <li>
                                    <span>Model</span>
                                    <span>Bt-50</span>
                                </li>
                                <li>
                                    <span>Series</span>
                                    <span>XT (4x2)</span>
                                </li>
                                <li>
                                    <span>Body</span>
                                    <span>C/chas</span>
                                </li>
                                <li>
                                    <span>Colour</span>
                                    <span>Grey</span>
                                </li>
                                <li>
                                    <span>Transmission</span>
                                    <span>6SP MANUAL</span>
                                </li>
                                <li>
                                    <span>Kms</span>
                                    <span>117,923</span>
                                </li>
                                <li>
                                    <span>Engine</span>
                                    <span>2.2l 4cyl Dsl-turbo</span>
                                </li>
                                <li>
                                    <span>Fuel type</span>
                                    <span>Diesel</span>
                                </li>
                                <li>
                                    <span>Fuel consumption</span>
                                    <span>7.6Lt/100km</span>
                                </li>
                                <li>
                                    <span>Ancap Rating</span>
                                    <span>4</span>
                                </li>
                                <li>
                                    <span>Warranty (Remaining)</span>
                                    <span>
                                        36 Months </span>
                                </li>
                                <li>
                                    <span>Owners manual</span>
                                    <span>
                                        N </span>
                                </li>
                                <li>
                                    <span>Service history</span>
                                    <span>
                                        N </span>
                                </li>
                                <li>
                                    <span>Next service due</span>
                                    <span>
                                        8/10/23 </span>
                                </li>
                                <li>
                                    <span>Towing braked</span>
                                    <span>2500</span>
                                </li>
                                <li>
                                    <span>Turning circle</span>
                                    <span>12.4</span>
                                </li>
                                <li>
                                    <span>Country of manufacture</span>
                                    <span>Thailand</span>
                                </li>
                                <li>
                                    <span>Rego No</span>
                                    <span>CM41TO</span>
                                </li>
                                <li>
                                    <span>Rego Exp</span>
                                    <span>8/31/23</span>
                                </li>
                                <li>
                                    <span>Stock</span>
                                    <span>525020</span>
                                </li>
                                <li>
                                    <span>Dealership</span>
                                    <span>
                                        Tamworth </span>
                                </li>
                            </ul>

                        </div>
                        <div class="ulInfoCar extras">
                            <ul>
                                <li> <span>12 Volt Power Outlet</span>
                                    <span>Dual Front Airbag Package</span>
                                </li>
                                <li> <span>Anti-lock Braking</span>
                                    <span>Air Conditioning</span>
                                </li>
                                <li> <span>Antenna - Roof-mounted Bee-sting type</span>
                                    <span>Adjustable Steering Wheel - Tilt Only</span>
                                </li>
                                <li> <span>AUX/USB Input Socket</span>
                                    <span>Brake Assist</span>
                                </li>
                                <li> <span>Body Coloured Front Bumper</span>
                                    <span>Cruise Control</span>
                                </li>
                                <li> <span>Cup Holders - Front Seats</span>
                                    <span>Central Locking Remote Control</span>
                                </li>
                                <li> <span>Cloth Trim</span>
                                    <span>Digital Clock</span>
                                </li>
                                <li> <span>Driver Foot Rest</span>
                                    <span>Door Pockets - Front Seat</span>
                                </li>
                                <li> <span>Dynamic Stability Control</span>
                                    <span>Electronic Brake Force Distribution</span>
                                </li>
                                <li> <span>Emergency Stop Signal</span>
                                    <span>Head Airbags</span>
                                </li>
                                <li> <span>Headrests - Adjustable Front Seats</span>
                                    <span>Hill Holder</span>
                                </li>
                                <li> <span>Halogen Headlights</span>
                                    <span>Illuminated - Entry/Exit with Delayed Fade</span>
                                </li>
                                <li> <span>Illuminated Glove Box Compartment</span>
                                    <span>Instrument Panel Light Dimmer</span>
                                </li>
                                <li> <span>Engine Immobiliser</span>
                                    <span>Intermittent Wipers - Variable</span>
                                </li>
                                <li> <span>Lockable Fuel Filler Cap/Lid</span>
                                    <span>Low Fuel Warning</span>
                                </li>
                                <li> <span>Lockable Glove Box Compartment</span>
                                    <span>Mud Flaps - Front</span>
                                </li>
                                <li> <span>MP3 Compatible Audio/CD Player</span>
                                    <span>Mobile Phone Connectivity</span>
                                </li>
                                <li> <span>Map/Reading Lights - Front</span>
                                    <span>Power Mirrors</span>
                                </li>
                                <li> <span>Power Steering</span>
                                    <span>Power Windows</span>
                                </li>
                                <li> <span>Radio CD with 4 Speakers</span>
                                    <span>Rear Window Demister</span>
                                </li>
                                <li> <span>Seatbelts - Load Limiters Front Seats</span>
                                    <span>Seatbelts - Lap/Sash for All Seats</span>
                                </li>
                                <li> <span>Seatbelts - Pre-tensioners Front Seats</span>
                                    <span>Side Door Impact Beams</span>
                                </li>
                                <li> <span>Sunglass Holder</span>
                                    <span>Steering Wheel-mounted Audio Controls</span>
                                </li>
                                <li> <span>Spare Wheel - Space Saver/Temporary</span>
                                    <span>Trip Computer</span>
                                </li>
                                <li> <span>Traction Control System</span>
                                    <span>Trailer Stability Control</span>
                                </li>
                                <li> <span>Tinted Windows</span>
                                    <span>Vinyl Floor Covering</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end col 7 -->
                <div class="col-md-5">
                    <div class="infoCarColRight showSocialSection">


                        <div id="fb-root"></div>
                        <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src =
                                "https://connect.facebook.net/en_US/all.js#xfbml=1&version=v9.0&appId=222558461514567&autoLogAppEvents=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                        </script>


                        <!-- / social media widget -->
                        <div class="SocialSection hidden-xs">
                           

                            <script type="application/javascript">
                            var dur = 10 * 1000;
                            $('.owl-class-2').owlCarousel({
                                loop: false,
                                margin: 10,
                                autoplay: false,
                                autoplayTimeout: dur,
                                autoplayHoverPause: true,
                                nav: true,
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
                            $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
                            $(".owl-next").html('<i class="fa fa-chevron-right"></i>');
                    
                            </script>
                </div>
                        <style>
                        #instafeed {
                            padding: 0;
                            margin: 0;
                        }

                        #instafeed li {
                            float: left;
                            width: 48%;
                            padding: 0;
                            list-style: none;
                            margin: 1%
                        }

                        #instafeed li img {
                            width: 100%;
                        }
                        </style>
                        <script src="<?=base_url();?>assets/js/jquery-3.4.1.min.js"></script>

                        <script src="<?=base_url();?>assets/js/front/jquery.instagramFeed.min.js"></script>
                        <script>
                        var reload = 1;
                        var images_data = [];
                        console.log(reload);
                        console.log(images_data);
                        $.noConflict();
                        // reload = 1; 
                        (function($) {



                            if (reload == 1) {
                                $.instagramFeed({
                                    'username': 'ozcarcustoms',
                                    'container': "#instafeed",
                                    'display_profile': false,
                                    'display_biography': false,
                                    'display_gallery': true,
                                    'callback': function(data) {
                                        result = data.edge_owner_to_timeline_media.edges;
                                        cacheImages(result);
                                        console.log(result);
                                    },
                                    'styling': true,
                                    'items': 4,
                                    'items_per_row': 2,
                                    'margin': 1,
                                    'lazy_load': true,
                                    'on_error': console.error
                                });
                            } else {

                                var htmlImages = '<div class="instagram_gallery">';

                                for (i = 0; i < images_data.length; i++) {
                                    if (i == 4)
                                        break;
                                    htmlImages += `<a href="https://www.instagram.com/p/` + images_data[i]
                                        .shortcode + `" class="instagram-sidecar" rel="noopener" target="_blank">
                            <img loading="lazy" src="` + images_data[i].thumb + `" style="margin:1% 1%;width:48%;float:left;">
                        </a>`;
                                }

                                htmlImages += '</div>';
                                console.log(htmlImages);
                                $('#instafeed').html(htmlImages);
                            }
                        })(jQuery);

                        function cacheImages(item) {
                            console.log(item);
                            $.ajax({
                                type: "POST",
                                url: "/cars/cache-inst",
                                data: {
                                    'images': item,
                                },
                                dataType: 'json',
                                headers: {
                                    "Authorization": _csrfToken
                                }
                            }).done(function(data) {
                                console.log('Images cached successfuly');
                            });
                        };                      
                        </script>                      

                    </div><!-- end container for right box -->
                </div>




                <!-- end col 5 -->
                <div class="clearFix"></div>
                <!-- start recently_cars slider -->
          
        
                <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/page.css">

                <script type="text/javascript">
                function mga_makes_callback() {
                    console.log('makes are now visible on the page');
                };

                function mga_models_callback() {
                    console.log('models are now visible on the page');
                };

                function mga_listing_callback() {
                    console.log('a story list is now visible on the page');
                };

                function mga_content_callback() {
                    console.log('a story itself is now visible on the page');
                };
                </script>

                <script type="text/javascript" src="https://words.goauto.com.au/mga_objects_ssl.js"></script>
                <style>
                .loginOz.trade_in_price {
                    max-width: 877px !important;
                }
                </style>
                <div class="remodal loginOz trade_in_price" data-remodal-id="ReviewPopup" id="ReviewPopup"
                    data-remodal-options="hashTracking: false, closeOnOutsideClick: true">


                    <body>
                        <script type="text/javascript">
                        mga_initilizer({
                            'key': "c1350ab610783c1350ea610783c13512",
                            'extra': "Multiple:nav_std:OzCar:ozcar.com.au/",
                            "make": 'MAZDA',
                            "model": 'BT-50'
                        });
                        //  mga_initilizer({'key': "c1350ab610783c1350ea610783c13512", 'extra': "Multiple:nav_std:OzCar:ozcar.com.au/", "make": 'Audi', "model": 'Q3', "year": 2016, "month": 12, "count": 14});
                        </script>
                        <div style="float:left; width:800px; padding:10px; border:1px solid green;">
                            <script type="text/javascript">
                            mga_content();
                            </script>
                        </div>

                        <script defer
                            src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
                            integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
                            data-cf-beacon='{"rayId":"7aadee05dc7d9cfe","token":"ab13979526cf4ff29e270763a7948dc9","version":"2023.2.0","si":100}'
                            crossorigin="anonymous"></script>
                    </body>

                    <button data-remodal-action="close" class="remodal-close"></button>

                </div>



            </div>
        </div>
    </div>
    <!-- end car slider -->

    <!-- The Modal -->
  



    <style>
    @media (max-width:767px) {
        .BG {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .fullVid {
            position: absolute;
            top: 20%;
        }

        .fullVid,
        .modal {
            background: unset;
        }

        .fullVid .modal-content {
            padding: 0;
        }

        .fullVid .modal-content .semibold.m-b-xs {
            display: none
        }

        .fullVid .cars-slider .item {
            border: 0px solid #fff;
        }

        .fullVid .close-modal.blue-close {
            right: 9px;
            top: 15px;
        }
    }

    #videoPlay {
        max-width: 850px !important;
    }
    </style>

  
    <script type="text/javascript">
    $(document).ready(function() {
        //                $('.fullVid ').parent().css({"background-color": "rgba(0, 0, 0, 0.5)"})
        $('.fullVid ').parent().addClass('BG');
    });
    $(document).on('closed', '#videoPreview', function(e) {
        // Reason: 'confirmation', 'cancellation'
        document.getElementById('demo').pause();
    });
    $('.stopVideo').on('click', function() {
        document.getElementById('demo').pause();
        return true;
    });
    </script>
    <!-- start remodal sections  -->

    <div class="remodal EnquireNow comfirmDetails successModal" data-remodal-id="ask-box"
        data-remodal-options="hashTracking: false, closeOnOutsideClick">

        <div class="CDhead">
            <h2>ASK US ABOUT THIS CAR</h2>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div><!-- end head  -->
        <div class="CDbody">
            <form method="post" accept-charset="utf-8" class="EnquireForm" id="EnquireNowForm" role="form"
                action="/enquiries/saveAjax/customer-relations">
                <div style="display:none;"><input type="hidden" name="_csrfToken" autocomplete="off"
                        value="T3iub1mKFc8F0igVmQnS79iR7u6C0Ip9vysQzyIt/PoyocMwP9JZeMQsjY4JL2WSTy0EUPI7X6GBpdRrNleiBbOQKSP5xYK6vandiuDhsk+MHnb8FxXFnAbH9lFd5mpA8Bvuu2xKBKsuHzMxxgs7lA==" />
                </div>
                <input type="hidden" name="referer" id="referer" class="form-control"
                    value="/cars/view/525020/Mazda%20Bt-50%20Xt%20%284x2%29%202017" /> <input type="hidden" name="type"
                    id="type" class="form-control" value="customer_relations" />
                <div class="moreInfo">
                    <div class="ask-box">
                        <input type="hidden" name="car_stock_number" id="car-stock-number" class="form-control"
                            value="525020" />
                        <div class="col-md-6">
                            <div class="input text"><input type="text" name="fname" placeholder="First Name"
                                    class="required form-control" id="fname" aria-label="First Name" value="" /></div>
                        </div>
                        <div class="col-md-6">
                            <div class="input text special-enquiry-field"></div>

                        </div>
                        <div class="col-md-6">
                            <div class="input text"><input type="text" name="email" placeholder="Email address"
                                    class=" email required form-control" id="email" aria-label="Email address"
                                    value="" /></div>
                        </div>
                        <div class="col-md-6">
                            <div class="input text"><input type="text" name="tel" placeholder="Mobile phone"
                                    class="required number form-control" minlength="10" maxlength="13" id="tel"
                                    aria-label="Mobile phone" value="" /></div>
                        </div>
                        <div class="col-md-6">
                            <div class="input text"><input type="text" name="postcode" placeholder="Postcode"
                                    class="required number form-control" minlength="4" maxlength="4" id="798518337"
                                    aria-label="Postcode" value="" /></div>
                        </div>
                        <div class="col-md-6">
                            <div class="input text captcha clearFix securityCode">


                                <img src="/image.jpg?code=710464" class="SecurImage" id="1853336410" alt="" />
                                <div class="input text"><input type="text" name="security_code"
                                        placeholder="Security Code" class="required form-control" id="security-code"
                                        aria-label="Security Code" /></div>
                            </div>
                        </div>
                        <div class="col-md-12 Comments">

                            <textarea name="desc" placeholder="Comments" class="required form-control"
                                rows="3"></textarea>
                        </div>


                        <div class="col-md-12">

                           
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="buttonsS">
                        <button class="MainBtn" type="submit" id="SubmitButton2">Enquire now</button>
                    </div>
                </div>
                <div class="col-md-12">
            </form>
        </div>
     
    </div><!-- end body  -->

    </div>
    </div>


    </div>


    <!-- start list your car sextion 2  -->
    <script src="<?=base_url();?>assets/js/new_js/jquery.validate.js"></script>
    <script type="text/javascript">
    var type = 'view';
    var models = {
        "ALFA ROMEO": {
            "STELVIO": "STELVIO",
            "147": "147",
            "156": "156",
            "159": "159",
            "166": "166",
            "164": "164",
            "75": "75",
            "90": "90",
            "ALFETTA": "ALFETTA",
            "33": "33",
            "ALFASUD": "ALFASUD",
            "BERLINA": "BERLINA",
            "BRERA": "BRERA",
            "GIULIA": "GIULIA",
            "GIULIETTA": "GIULIETTA",
            "GT": "GT",
            "GTV": "GTV",
            "MONTREAL": "MONTREAL",
            "SPIDER": "SPIDER",
            "SPRINT": "SPRINT",
            "4C": "4C",
            "MITO": "MITO"
        },
        "AUDI": {
            "A6": "A6",
            "Q2": "Q2",
            "Q3": "Q3",
            "Q5": "Q5",
            "Q7": "Q7",
            "RS Q3": "RS Q3",
            "SQ5 PLUS": "SQ5 PLUS",
            "SQ5": "SQ5",
            "SQ7": "SQ7",
            "5+5": "5+5",
            "5E": "5E",
            "80": "80",
            "90": "90",
            "100": "100",
            "200": "200",
            "A3": "A3",
            "A4": "A4",
            "A5": "A5",
            "A8": "A8",
            "CABRIOLET": "CABRIOLET",
            "FOX": "FOX",
            "R8": "R8",
            "RS4": "RS4",
            "RS6": "RS6",
            "S2": "S2",
            "S3": "S3",
            "S4": "S4",
            "S5": "S5",
            "S6": "S6",
            "S8": "S8",
            "TT": "TT",
            "V8 QUATTRO": "V8 QUATTRO",
            "ALLROAD QUATTRO": "ALLROAD QUATTRO",
            "A1": "A1",
            "A7": "A7",
            "RS3": "RS3",
            "RS5": "RS5",
            "RS7": "RS7",
            "S1": "S1",
            "S7": "S7",
            "Q8": "Q8",
            "SQ8": "SQ8",
            "RS 4": "RS 4",
            "RS 5": "RS 5",
            "RS 6": "RS 6",
            "RS 3": "RS 3",
            "RS 7": "RS 7",
            "e-tron": "e-tron",
            "RS Q8": "RS Q8",
            "SQ2": "SQ2",
            "e-TRON": "e-TRON"
        },
        "BENTLEY": {
            "BENTAYGA": "BENTAYGA",
            "ARNAGE": "ARNAGE",
            "AZURE": "AZURE",
            "BROOKLANDS": "BROOKLANDS",
            "CONTINENTAL": "CONTINENTAL",
            "CORNICHE": "CORNICHE",
            "EIGHT": "EIGHT",
            "MULSANNE": "MULSANNE",
            "S2": "S2",
            "S3": "S3",
            "T SERIES": "T SERIES",
            "TURBO": "TURBO",
            "FLYING SPUR": "FLYING SPUR",
            "MULSANNE SPEED": "MULSANNE SPEED"
        },
        "BMW": {
            "X1": "X1",
            "X2": "X2",
            "X3": "X3",
            "X4": "X4",
            "X5": "X5",
            "X6": "X6",
            "1": "1",
            "3": "3",
            "5": "5",
            "6": "6",
            "7": "7",
            "8": "8",
            "M": "M",
            "L7": "L7",
            "M3": "M3",
            "M5": "M5",
            "M6": "M6",
            "Z3": "Z3",
            "Z4": "Z4",
            "16": "16",
            "18": "18",
            "20": "20",
            "25": "25",
            "28": "28",
            "3.3L": "3.3L",
            "3.0": "3.0",
            "2": "2",
            "4": "4",
            "i3": "i3",
            "i8": "i8",
            "M2": "M2",
            "M4": "M4",
            "M7": "M7",
            "X7": "X7",
            "M8": "M8",
            "iX": "iX",
            "iX3": "iX3",
            "i4": "i4",
            "i7": "i7",
            "iX1": "iX1"
        },
        "CHERY": {
            "J11": "J11",
            "J1": "J1",
            "J3": "J3",
            "OMODA5": "OMODA5"
        },
        "CITROEN": {
            "C3": "C3",
            "C4": "C4",
            "BERLINGO II": "BERLINGO II",
            "BERLINGO": "BERLINGO",
            "C4 CACTUS": "C4 CACTUS",
            "DISPATCH": "DISPATCH",
            "D": "D",
            "G": "G",
            "AX": "AX",
            "BX": "BX",
            "C2": "C2",
            "C5": "C5",
            "C6": "C6",
            "CX": "CX",
            "DS": "DS",
            "GS": "GS",
            "ID": "ID",
            "XANTIA": "XANTIA",
            "XM": "XM",
            "XSARA": "XSARA",
            "C4 PICASSO": "C4 PICASSO",
            "C4 GRAND PICASSO": "C4 GRAND PICASSO",
            "DS3": "DS3",
            "DS4": "DS4",
            "DS5": "DS5",
            "GRAND C4": "GRAND C4",
            "C3 AIRCROSS": "C3 AIRCROSS",
            "C5 AIRCROSS": "C5 AIRCROSS",
            "C5X": "C5X"
        },
        "DODGE": {
            "JOURNEY": "JOURNEY",
            "NITRO": "NITRO",
            "AVENGER": "AVENGER",
            "CALIBER": "CALIBER",
            "PHOENIX": "PHOENIX"
        },
        "FIAT": {
            "500X": "500X",
            "DOBLO": "DOBLO",
            "FREEMONT": "FREEMONT",
            "SCUDO": "SCUDO",
            "1100": "1100",
            "124": "124",
            "125": "125",
            "127": "127",
            "128": "128",
            "130": "130",
            "131": "131",
            "132": "132",
            "1500": "1500",
            "1800": "1800",
            "2100": "2100",
            "2300": "2300",
            "500": "500",
            "600": "600",
            "850": "850",
            "ARGENTA": "ARGENTA",
            "CROMA": "CROMA",
            "PANORAMA": "PANORAMA",
            "PUNTO": "PUNTO",
            "REGATA": "REGATA",
            "RITMO": "RITMO",
            "SUPERBRAVA": "SUPERBRAVA",
            "X1\/9": "X1\/9",
            "PANDA": "PANDA",
            "500C": "500C"
        },
        "FORD": {
            "ECOSPORT": "ECOSPORT",
            "ESCAPE": "ESCAPE",
            "EVEREST": "EVEREST",
            "FALCON": "FALCON",
            "FPV": "FPV",
            "KUGA": "KUGA",
            "RANGER": "RANGER",
            "TERRITORY": "TERRITORY",
            "TRANSIT": "TRANSIT",
            "TRANSIT CUSTOM": "TRANSIT CUSTOM",
            "KA": "KA",
            "ANGLIA": "ANGLIA",
            "CAPRI": "CAPRI",
            "COUGAR": "COUGAR",
            "COBRA": "COBRA",
            "CONSUL": "CONSUL",
            "CORSAIR": "CORSAIR",
            "CORTINA": "CORTINA",
            "ESCORT": "ESCORT",
            "FAIRLANE": "FAIRLANE",
            "FESTIVA": "FESTIVA",
            "FIESTA": "FIESTA",
            "FAIRMONT": "FAIRMONT",
            "FOCUS": "FOCUS",
            "FUTURA": "FUTURA",
            "G6": "G6",
            "GALAXIE": "GALAXIE",
            "LANDAU": "LANDAU",
            "LASER": "LASER",
            "LTD": "LTD",
            "METEOR": "METEOR",
            "MONDEO": "MONDEO",
            "MUSTANG": "MUSTANG",
            "PREFECT": "PREFECT",
            "PROBE": "PROBE",
            "SPECTRON": "SPECTRON",
            "TAURUS": "TAURUS",
            "TE50": "TE50",
            "TELSTAR": "TELSTAR",
            "TL50": "TL50",
            "TS50": "TS50",
            "ZEPHYR": "ZEPHYR",
            "ZODIAC": "ZODIAC",
            "BRONCO": "BRONCO",
            "COURIER": "COURIER",
            "ECONOVAN": "ECONOVAN",
            "EXPLORER": "EXPLORER",
            "F100": "F100",
            "F150": "F150",
            "F250": "F250",
            "F350": "F350",
            "MAVERICK": "MAVERICK",
            "RAIDER": "RAIDER",
            "ENDURA": "ENDURA",
            "PUMA": "PUMA"
        },
        "FOTON": {
            "TUNLAND": "TUNLAND",
            "VIEW CS2": "VIEW CS2",
            "SAUVANA": "SAUVANA"
        },
        "GREAT WALL": {
            "SA220": "SA220",
            "STEED": "STEED",
            "V200": "V200",
            "V240": "V240",
            "X200": "X200",
            "X240": "X240"
        },
        "HAVAL": {
            "H2": "H2",
            "H6": "H6",
            "H8": "H8",
            "H9": "H9"
        },
        "HUMMER": {
            "H3": "H3"
        },
        "HOLDEN": {
            "ADVENTRA": "ADVENTRA",
            "CAPTIVA": "CAPTIVA",
            "COMBO": "COMBO",
            "COLORADO 7": "COLORADO 7",
            "COLORADO": "COLORADO",
            "COMMODORE": "COMMODORE",
            "EQUINOX": "EQUINOX",
            "TRAILBLAZER": "TRAILBLAZER",
            "TRAX": "TRAX",
            "UTE": "UTE",
            "SS": "SS",
            "APOLLO": "APOLLO",
            "ASTRA": "ASTRA",
            "BARINA": "BARINA",
            "BELMONT": "BELMONT",
            "BERLINA": "BERLINA",
            "BROUGHAM": "BROUGHAM",
            "CALAIS": "CALAIS",
            "CAMIRA": "CAMIRA",
            "CAPRICE": "CAPRICE",
            "CALIBRA": "CALIBRA",
            "EPICA": "EPICA",
            "GEMINI": "GEMINI",
            "KINGSWOOD": "KINGSWOOD",
            "MONARO": "MONARO",
            "NOVA": "NOVA",
            "PIAZZA": "PIAZZA",
            "PREMIER": "PREMIER",
            "SHUTTLE": "SHUTTLE",
            "SPECIAL": "SPECIAL",
            "STATESMAN": "STATESMAN",
            "STANDARD": "STANDARD",
            "SUNBIRD": "SUNBIRD",
            "TIGRA": "TIGRA",
            "TORANA": "TORANA",
            "VECTRA": "VECTRA",
            "VIVA": "VIVA",
            "ZAFIRA": "ZAFIRA",
            "HOLDEN": "HOLDEN",
            "CREWMAN": "CREWMAN",
            "CRUZE": "CRUZE",
            "DROVER": "DROVER",
            "FRONTERA": "FRONTERA",
            "ISUZU": "ISUZU",
            "JACKAROO": "JACKAROO",
            "RODEO": "RODEO",
            "SANDMAN": "SANDMAN",
            "SCURRY": "SCURRY",
            "SUBURBAN": "SUBURBAN",
            "BARINA SPARK": "BARINA SPARK",
            "CASCADA": "CASCADA",
            "INSIGNIA": "INSIGNIA",
            "MALIBU": "MALIBU",
            "SPARK": "SPARK",
            "VOLT": "VOLT",
            "ACADIA": "ACADIA"
        },
        "HONDA": {
            "CR-V": "CR-V",
            "HR-V": "HR-V",
            "Z": "Z",
            "1300": "1300",
            "600": "600",
            "ACCORD": "ACCORD",
            "CIVIC": "CIVIC",
            "CONCERTO": "CONCERTO",
            "CRX": "CRX",
            "INSIGHT": "INSIGHT",
            "INTEGRA": "INTEGRA",
            "JAZZ": "JAZZ",
            "LEGEND": "LEGEND",
            "LIFE": "LIFE",
            "N360": "N360",
            "NSX": "NSX",
            "ODYSSEY (7 SEAT)": "ODYSSEY (7 SEAT)",
            "ODYSSEY": "ODYSSEY",
            "ODYSSEY (6 SEAT)": "ODYSSEY (6 SEAT)",
            "PRELUDE": "PRELUDE",
            "S2000": "S2000",
            "S600": "S600",
            "S800": "S800",
            "ACTY": "ACTY",
            "CITY": "CITY",
            "MDX": "MDX",
            "CR-Z": "CR-Z"
        },
        "HSV": {
            "COLORADO": "COLORADO",
            "GTSR MALOO": "GTSR MALOO",
            "GTS": "GTS",
            "MALOO": "MALOO",
            "SV": "SV",
            "ASTRA SV 1800": "ASTRA SV 1800",
            "CALAIS": "CALAIS",
            "CAPRICE": "CAPRICE",
            "CLUBSPORT": "CLUBSPORT",
            "COMMODORE": "COMMODORE",
            "COUPE": "COUPE",
            "GRANGE": "GRANGE",
            "MANTA": "MANTA",
            "SENATOR": "SENATOR",
            "SPORT": "SPORT",
            "STATESMAN": "STATESMAN",
            "SV300": "SV300",
            "SV6000": "SV6000",
            "VXR": "VXR",
            "W427": "W427",
            "XU6": "XU6",
            "XU8": "XU8",
            "AVALANCHE": "AVALANCHE",
            "JACKAROO": "JACKAROO",
            "LS": "LS",
            "GTSR": "GTSR",
            "GTSR W1": "GTSR W1"
        },
        "HYUNDAI": {
            "iLOAD": "iLOAD",
            "iX35": "iX35",
            "KONA": "KONA",
            "SANTA FE": "SANTA FE",
            "TUCSON": "TUCSON",
            "S": "S",
            "COUPE FX": "COUPE FX",
            "COUPE SX": "COUPE SX",
            "ACCENT": "ACCENT",
            "ELANTRA": "ELANTRA",
            "ELANTRA LAVITA": "ELANTRA LAVITA",
            "EXCEL": "EXCEL",
            "GETZ": "GETZ",
            "GRANDEUR": "GRANDEUR",
            "i30": "i30",
            "iMAX": "iMAX",
            "LANTRA": "LANTRA",
            "COUPE SFX": "COUPE SFX",
            "SONATA": "SONATA",
            "TIBURON": "TIBURON",
            "TRAJET": "TRAJET",
            "TERRACAN": "TERRACAN",
            "GENESIS": "GENESIS",
            "i20": "i20",
            "i40": "i40",
            "i45": "i45",
            "VELOSTER": "VELOSTER",
            "IONIQ": "IONIQ",
            "VENUE": "VENUE",
            "PALISADE": "PALISADE",
            "NEXO": "NEXO",
            "STARIA": "STARIA",
            "IONIQ 5": "IONIQ 5",
            "IONIQ 6": "IONIQ 6"
        },
        "INFINITI": {
            "FX": "FX",
            "Q30": "Q30",
            "QX30": "QX30",
            "QX70": "QX70",
            "QX80": "QX80",
            "M": "M",
            "G37": "G37",
            "Q50": "Q50",
            "Q60": "Q60",
            "Q70": "Q70"
        },
        "ISUZU": {
            "D-MAX": "D-MAX",
            "MU-X": "MU-X",
            "BELLETT": "BELLETT",
            "FLORIAN": "FLORIAN"
        },
        "JAGUAR": {
            "E-PACE": "E-PACE",
            "F-PACE": "F-PACE",
            "I-PACE": "I-PACE",
            "XF": "XF",
            "XJ": "XJ",
            "XK": "XK",
            "240": "240",
            "340": "340",
            "420": "420",
            "E TYPE": "E TYPE",
            "MAJESTIC": "MAJESTIC",
            "MK II": "MK II",
            "MK IX": "MK IX",
            "MK X": "MK X",
            "SOVEREIGN": "SOVEREIGN",
            "S TYPE": "S TYPE",
            "V12": "V12",
            "VANDEN PLAS": "VANDEN PLAS",
            "XJ12": "XJ12",
            "XJ6": "XJ6",
            "XJ8": "XJ8",
            "XJSC": "XJSC",
            "XJR": "XJR",
            "XJS": "XJS",
            "XK8": "XK8",
            "XKR": "XKR",
            "X TYPE": "X TYPE",
            "XE": "XE",
            "F-TYPE": "F-TYPE"
        },
        "JEEP": {
            "CHEROKEE": "CHEROKEE",
            "COMPASS": "COMPASS",
            "COMMANDER": "COMMANDER",
            "GRAND CHEROKEE": "GRAND CHEROKEE",
            "PATRIOT": "PATRIOT",
            "RENEGADE": "RENEGADE",
            "WRANGLER": "WRANGLER",
            "WRANGLER UNLIMITED": "WRANGLER UNLIMITED",
            "CJ5": "CJ5",
            "CJ6": "CJ6",
            "CJ7": "CJ7",
            "CJ8": "CJ8",
            "J10": "J10",
            "J20": "J20",
            "LAREDO": "LAREDO",
            "GLADIATOR": "GLADIATOR",
            "GRAND CHEROKEE L": "GRAND CHEROKEE L"
        },
        "JMC": {
            "VIGUS": "VIGUS"
        },
        "KIA": {
            "K2900": "K2900",
            "SORENTO": "SORENTO",
            "SPORTAGE": "SPORTAGE",
            "CARENS": "CARENS",
            "CARNIVAL": "CARNIVAL",
            "CERATO": "CERATO",
            "CREDOS": "CREDOS",
            "GRAND CARNIVAL": "GRAND CARNIVAL",
            "MAGENTIS": "MAGENTIS",
            "MENTOR": "MENTOR",
            "OPTIMA": "OPTIMA",
            "RONDO": "RONDO",
            "RIO": "RIO",
            "SHUMA": "SHUMA",
            "SPECTRA": "SPECTRA",
            "CERES": "CERES",
            "K2700": "K2700",
            "PREGIO": "PREGIO",
            "PICANTO": "PICANTO",
            "PRO CEE`D": "PRO CEE`D",
            "SOUL": "SOUL",
            "STINGER": "STINGER",
            "SELTOS": "SELTOS",
            "STONIC": "STONIC",
            "NIRO": "NIRO",
            "EV6": "EV6"
        },
        "BYD": {
            "T3": "T3",
            "e6": "e6",
            "ATTO 3": "ATTO 3"
        },
        "LAMBORGHINI": {
            "URUS": "URUS",
            "350": "350",
            "400": "400",
            "COUNTACH": "COUNTACH",
            "DIABLO": "DIABLO",
            "ESPADA": "ESPADA",
            "GALLARDO": "GALLARDO",
            "ISLERO": "ISLERO",
            "JALPA": "JALPA",
            "JARAMA": "JARAMA",
            "MIURA": "MIURA",
            "MURCIELAGO": "MURCIELAGO",
            "SILHOUETTE": "SILHOUETTE",
            "URRACO": "URRACO",
            "AVENTADOR": "AVENTADOR",
            "HURACAN": "HURACAN"
        },
        "LDV": {
            "D90": "D90",
            "G10": "G10",
            "T60": "T60",
            "V80": "V80",
            "G10+": "G10+",
            "eT60": "eT60",
            "MIFA 9": "MIFA 9",
            "MIFA": "MIFA"
        },
        "LEXUS": {
            "LX570": "LX570",
            "LX450d": "LX450d",
            "NX300": "NX300",
            "NX200t": "NX200t",
            "NX300h": "NX300h",
            "RX200t": "RX200t",
            "RX270": "RX270",
            "RX350": "RX350",
            "RX350L": "RX350L",
            "RX450hL": "RX450hL",
            "RX400h": "RX400h",
            "RX450h": "RX450h",
            "RX300": "RX300",
            "ES300": "ES300",
            "GS460": "GS460",
            "GS450h": "GS450h",
            "GS300": "GS300",
            "GS430": "GS430",
            "IS200": "IS200",
            "IS300": "IS300",
            "IS250": "IS250",
            "IS F": "IS F",
            "LS430": "LS430",
            "LS460": "LS460",
            "LS400": "LS400",
            "LS600hL": "LS600hL",
            "SC430": "SC430",
            "LX470": "LX470",
            "RX330": "RX330",
            "CT 200h. HYBRID": "CT 200h. HYBRID",
            "GS350": "GS350",
            "GS300h": "GS300h",
            "GS200t": "GS200t",
            "GS250": "GS250",
            "GS-F": "GS-F",
            "IS200t": "IS200t",
            "IS350": "IS350",
            "IS250C": "IS250C",
            "IS300h": "IS300h",
            "LS 500": "LS 500",
            "LS 500h (HYBRID)": "LS 500h (HYBRID)",
            "LC500": "LC500",
            "LC500h (HYBRID)": "LC500h (HYBRID)",
            "LFA": "LFA",
            "LS600h": "LS600h",
            "RC300": "RC300",
            "RC200t": "RC200t",
            "RC350": "RC350",
            "RC F": "RC F",
            "ES350": "ES350",
            "ES300h": "ES300h",
            "UX200": "UX200",
            "UX250h": "UX250h",
            "LC 500": "LC 500",
            "LC 500h (HYBRID)": "LC 500h (HYBRID)",
            "LS500": "LS500",
            "LS500h (HYBRID)": "LS500h (HYBRID)",
            "LC500h": "LC500h",
            "ES250": "ES250",
            "UX300E": "UX300E",
            "NX250": "NX250",
            "NX350": "NX350",
            "NX350h": "NX350h",
            "NX450h+": "NX450h+",
            "LX500d": "LX500d",
            "LX600": "LX600",
            "RX350h": "RX350h",
            "RX500h": "RX500h"
        },
        "LAND ROVER": {
            "DEFENDER": "DEFENDER",
            "DISCOVERY 3": "DISCOVERY 3",
            "DISCOVERY 4": "DISCOVERY 4",
            "DISCOVERY": "DISCOVERY",
            "DISCOVERY SPORT": "DISCOVERY SPORT",
            "FREELANDER 2": "FREELANDER 2",
            "3.5": "3.5",
            "3.9": "3.9",
            "(4x4)": "(4x4)",
            "FREELANDER": "FREELANDER",
            "ONE TEN": "ONE TEN",
            "RANGE ROVER EVOQUE": "RANGE ROVER EVOQUE",
            "RANGE ROVER SPORT": "RANGE ROVER SPORT",
            "RANGE ROVER VELAR": "RANGE ROVER VELAR",
            "RANGE ROVER AUTOBIOGRAPH": "RANGE ROVER AUTOBIOGRAPH",
            "RANGE ROVER VOGUE": "RANGE ROVER VOGUE",
            "RANGE ROVER FIFTY": "RANGE ROVER FIFTY",
            "RANGE ROVER WESTMINSTER": "RANGE ROVER WESTMINSTER",
            "RANGE ROVER": "RANGE ROVER"
        },
        "MAHINDRA": {
            "GENIO": "GENIO",
            "PIK-UP": "PIK-UP",
            "XUV500": "XUV500",
            "BUSHRANGER": "BUSHRANGER",
            "STOCKMAN": "STOCKMAN"
        },
        "MASERATI": {
            "LEVANTE": "LEVANTE",
            "222": "222",
            "228": "228",
            "430": "430",
            "BITURBO": "BITURBO",
            "BORA": "BORA",
            "COUPE": "COUPE",
            "GHIBLI": "GHIBLI",
            "GRANSPORT": "GRANSPORT",
            "GRANTURISMO": "GRANTURISMO",
            "INDY": "INDY",
            "3200": "3200",
            "3500": "3500",
            "5000": "5000",
            "KARIF": "KARIF",
            "KHAMSIN": "KHAMSIN",
            "KYALAMI": "KYALAMI",
            "MERAK": "MERAK",
            "MEXICO": "MEXICO",
            "MISTRAL": "MISTRAL",
            "QUATTROPORTE": "QUATTROPORTE",
            "SEBRING": "SEBRING",
            "SHAMAL": "SHAMAL",
            "SPYDER": "SPYDER",
            "GRANCABRIO": "GRANCABRIO",
            "MC20": "MC20"
        },
        "MAZDA": {
            "BT-50": "BT-50",
            "CX-3": "CX-3",
            "CX-5": "CX-5",
            "CX-7": "CX-7",
            "CX-8": "CX-8",
            "CX-9": "CX-9",
            "MAZDA2": "MAZDA2",
            "MAZDA6": "MAZDA6",
            "121": "121",
            "323": "323",
            "600": "600",
            "626": "626",
            "800": "800",
            "808": "808",
            "929": "929",
            "CAPELLA": "CAPELLA",
            "EUNOS": "EUNOS",
            "1000": "1000",
            "1200": "1200",
            "1300": "1300",
            "1500": "1500",
            "1600": "1600",
            "1800": "1800",
            "MAZDA3": "MAZDA3",
            "MILLENIA": "MILLENIA",
            "MPV": "MPV",
            "MX-5": "MX-5",
            "MX6": "MX6",
            "PREMACY": "PREMACY",
            "R100": "R100",
            "RX4": "RX4",
            "RX5": "RX5",
            "RX7": "RX7",
            "RX-8": "RX-8",
            "SAVANNA": "SAVANNA",
            "TRAVELLER": "TRAVELLER",
            "B1500": "B1500",
            "B1600": "B1600",
            "B1800": "B1800",
            "B2000": "B2000",
            "B2200": "B2200",
            "B2500": "B2500",
            "B2600": "B2600",
            "B4000": "B4000",
            "E1300": "E1300",
            "E1400": "E1400",
            "E1600": "E1600",
            "E1800": "E1800",
            "E2000": "E2000",
            "E2200": "E2200",
            "E2500": "E2500",
            "E3000": "E3000",
            "E4100": "E4100",
            "F1000": "F1000",
            "TRIBUTE": "TRIBUTE",
            "CX-30": "CX-30",
            "MX-30": "MX-30",
            "CX-60": "CX-60"
        },
        "MERCEDES-AMG": {
            "G": "G",
            "GLA": "GLA",
            "GLC": "GLC",
            "GLE": "GLE",
            "GLS": "GLS",
            "A45": "A45",
            "C": "C",
            "CLA": "CLA",
            "CLS": "CLS",
            "E": "E",
            "GT": "GT",
            "S63": "S63",
            "S65": "S65",
            "SL": "SL",
            "SLC": "SLC",
            "SLK": "SLK",
            "A35": "A35",
            "GLB": "GLB",
            "EQS": "EQS"
        },
        "MERCEDES-BENZ": {
            "G": "G",
            "GL": "GL",
            "GLA": "GLA",
            "GLC": "GLC",
            "GLE": "GLE",
            "GLS": "GLS",
            "ML": "ML",
            "R": "R",
            "VITO": "VITO",
            "X": "X",
            "180": "180",
            "190": "190",
            "200": "200",
            "200D": "200D",
            "220": "220",
            "220D": "220D",
            "230": "230",
            "240": "240",
            "250": "250",
            "260": "260",
            "280": "280",
            "300": "300",
            "320": "320",
            "350": "350",
            "380": "380",
            "400": "400",
            "420": "420",
            "450": "450",
            "500": "500",
            "560": "560",
            "600": "600",
            "A140": "A140",
            "A150": "A150",
            "A160": "A160",
            "A170": "A170",
            "A180": "A180",
            "A190": "A190",
            "A200": "A200",
            "B180": "B180",
            "B200": "B200",
            "C180": "C180",
            "C200": "C200",
            "C220": "C220",
            "C230": "C230",
            "C240": "C240",
            "C250": "C250",
            "C280": "C280",
            "C320": "C320",
            "C350": "C350",
            "C36": "C36",
            "C32": "C32",
            "C43": "C43",
            "C55": "C55",
            "C63": "C63",
            "CLK240": "CLK240",
            "CLK500": "CLK500",
            "CLK200": "CLK200",
            "CLK320": "CLK320",
            "CLK430": "CLK430",
            "CL500": "CL500",
            "CL600": "CL600",
            "CLK55": "CLK55",
            "CLK63": "CLK63",
            "CLK280": "CLK280",
            "CLK350": "CLK350",
            "CL": "CL",
            "CLK230": "CLK230",
            "CLS": "CLS",
            "E200K": "E200K",
            "E220": "E220",
            "E230": "E230",
            "E240": "E240",
            "E270": "E270",
            "E280": "E280",
            "E300": "E300",
            "E320": "E320",
            "E350": "E350",
            "E36": "E36",
            "E430": "E430",
            "E500": "E500",
            "E55": "E55",
            "E63": "E63",
            "SLK230": "SLK230",
            "SL320": "SL320",
            "CLC": "CLC",
            "CLK200K": "CLK200K",
            "S280": "S280",
            "S320": "S320",
            "S350": "S350",
            "S420": "S420",
            "S430": "S430",
            "S500": "S500",
            "S55": "S55",
            "S600": "S600",
            "S63": "S63",
            "S65": "S65",
            "SLK200": "SLK200",
            "SLK320": "SLK320",
            "SL280": "SL280",
            "SL350": "SL350",
            "SL500": "SL500",
            "SL600": "SL600",
            "SL": "SL",
            "SLK": "SLK",
            "VIANO": "VIANO",
            "MB": "MB",
            "A250": "A250",
            "A45": "A45",
            "B250": "B250",
            "C300": "C300",
            "E250": "E250",
            "E200": "E200",
            "E250D": "E250D",
            "E400": "E400",
            "CLA": "CLA",
            "MARCO POLO ACTIVITY": "MARCO POLO ACTIVITY",
            "S300": "S300",
            "S400": "S400",
            "S450": "S450",
            "S560": "S560",
            "SLC": "SLC",
            "SLS": "SLS",
            "V": "V",
            "VALENTE": "VALENTE",
            "E450": "E450",
            "EQC": "EQC",
            "GLB": "GLB",
            "EQA": "EQA",
            "S450L": "S450L",
            "S580L": "S580L",
            "MARCO POLO HORIZON": "MARCO POLO HORIZON",
            "EQB": "EQB",
            "eVITO": "eVITO",
            "EQV": "EQV"
        },
        "M.G.": {
            "GS": "GS",
            "ZS": "ZS",
            "MAGNETTE": "MAGNETTE",
            "MGA": "MGA",
            "MGB": "MGB",
            "MGF": "MGF",
            "MIDGET": "MIDGET",
            "TF": "TF",
            "ZR": "ZR",
            "ZT+": "ZT+",
            "ZT": "ZT",
            "ZT-T+": "ZT-T+",
            "ZT-T": "ZT-T",
            "3": "3",
            "6 PLUS": "6 PLUS",
            "MG6": "MG6",
            "MG3 AUTO": "MG3 AUTO",
            "MG6 PLUS": "MG6 PLUS"
        },
        "MINI": {
            "COUNTRYMAN": "COUNTRYMAN",
            "COOPER": "COOPER",
            "3D HATCH": "3D HATCH",
            "5D HATCH": "5D HATCH",
            "CLUBMAN": "CLUBMAN",
            "CONVERTIBLE": "CONVERTIBLE",
            "ONE": "ONE",
            "RAY": "RAY"
        },
        "MITSUBISHI": {
            "ASX": "ASX",
            "CHALLENGER": "CHALLENGER",
            "ECLIPSE CROSS": "ECLIPSE CROSS",
            "EXPRESS": "EXPRESS",
            "OUTLANDER": "OUTLANDER",
            "PAJERO": "PAJERO",
            "PAJERO SPORT": "PAJERO SPORT",
            "TRITON": "TRITON",
            "380": "380",
            "COLT": "COLT",
            "CORDIA": "CORDIA",
            "GALANT": "GALANT",
            "GRANDIS": "GRANDIS",
            "3000": "3000",
            "LANCER": "LANCER",
            "MAGNA": "MAGNA",
            "MIRAGE": "MIRAGE",
            "NIMBUS": "NIMBUS",
            "SIGMA": "SIGMA",
            "STARION": "STARION",
            "STARWAGON": "STARWAGON",
            "VERADA": "VERADA",
            "D50": "D50",
            "L200": "L200",
            "L300": "L300",
            "i-MiEV": "i-MiEV"
        },
        "NISSAN": {
            "DUALIS": "DUALIS",
            "JUKE": "JUKE",
            "MURANO": "MURANO",
            "NAVARA": "NAVARA",
            "PATROL": "PATROL",
            "PATHFINDER": "PATHFINDER",
            "QASHQAI": "QASHQAI",
            "X-TRAIL": "X-TRAIL",
            "200": "200",
            "280": "280",
            "300": "300",
            "350Z": "350Z",
            "BLUEBIRD": "BLUEBIRD",
            "CEDRIC": "CEDRIC",
            "EXA": "EXA",
            "GAZELLE": "GAZELLE",
            "GT-R": "GT-R",
            "INFINITI": "INFINITI",
            "MAXIMA": "MAXIMA",
            "MICRA": "MICRA",
            "NOMAD": "NOMAD",
            "NX": "NX",
            "NX-R": "NX-R",
            "PINTARA": "PINTARA",
            "PRAIRIE": "PRAIRIE",
            "PULSAR": "PULSAR",
            "SERENA": "SERENA",
            "SKYLINE": "SKYLINE",
            "STANZA": "STANZA",
            "TIIDA": "TIIDA",
            "V30": "V30",
            "VANETTE": "VANETTE",
            "120Y": "120Y",
            "720": "720",
            "C20": "C20",
            "CABSTAR": "CABSTAR",
            "E20": "E20",
            "HOMER": "HOMER",
            "SUNNY": "SUNNY",
            "TERRANO II": "TERRANO II",
            "URVAN": "URVAN",
            "THE UTE": "THE UTE",
            "370Z": "370Z",
            "ALMERA": "ALMERA",
            "ALTIMA": "ALTIMA",
            "LEAF": "LEAF",
            "Z": "Z"
        },
        "PEUGEOT": {
            "2008": "2008",
            "3008": "3008",
            "4007": "4007",
            "4008": "4008",
            "5008": "5008",
            "EXPERT": "EXPERT",
            "PARTNER": "PARTNER",
            "205": "205",
            "206": "206",
            "207": "207",
            "306": "306",
            "307": "307",
            "308": "308",
            "403": "403",
            "404": "404",
            "405": "405",
            "406": "406",
            "407": "407",
            "504": "504",
            "505": "505",
            "604": "604",
            "605": "605",
            "607": "607",
            "208": "208",
            "508": "508",
            "RCZ": "RCZ",
            "BOXER": "BOXER"
        },
        "PORSCHE": {
            "CAYENNE": "CAYENNE",
            "MACAN": "MACAN",
            "356": "356",
            "911": "911",
            "912": "912",
            "924": "924",
            "928": "928",
            "930": "930",
            "944": "944",
            "968": "968",
            "BOXSTER": "BOXSTER",
            "CAYMAN": "CAYMAN",
            "718": "718",
            "PANAMERA": "PANAMERA",
            "TAYCAN": "TAYCAN"
        },
        "PROTON": {
            "JUMBUCK": "JUMBUCK",
            "GEN.2": "GEN.2",
            "M21": "M21",
            "PERSONA": "PERSONA",
            "SATRIA": "SATRIA",
            "SAVVY": "SAVVY",
            "WAJA": "WAJA",
            "WIRA": "WIRA",
            "EXORA": "EXORA",
            "PREVE": "PREVE",
            "S16": "S16",
            "S16 FLX": "S16 FLX",
            "SATRIA-NEO": "SATRIA-NEO",
            "SUPRIMA S": "SUPRIMA S"
        },
        "RANGE ROVER": {
            "EVOQUE": "EVOQUE",
            "RANGE ROVER": "RANGE ROVER",
            "VELAR": "VELAR",
            "HIGHLINE": "HIGHLINE",
            "LAUNCH PACK": "LAUNCH PACK"
        },
        "RAM": {
            "1500": "1500"
        },
        "RENAULT": {
            "CAPTUR": "CAPTUR",
            "KANGOO": "KANGOO",
            "KOLEOS": "KOLEOS",
            "TRAFIC": "TRAFIC",
            "1.4": "1.4",
            "10": "10",
            "12": "12",
            "15": "15",
            "16": "16",
            "17": "17",
            "18": "18",
            "19": "19",
            "20": "20",
            "21": "21",
            "25": "25",
            "CARAVELLE": "CARAVELLE",
            "CLIO": "CLIO",
            "DAUPHINE": "DAUPHINE",
            "FLORIDE": "FLORIDE",
            "FUEGO": "FUEGO",
            "GRAND SCENIC II": "GRAND SCENIC II",
            "LAGUNA": "LAGUNA",
            "MEGANE": "MEGANE",
            "R25": "R25",
            "R4": "R4",
            "R8": "R8",
            "SCENIC": "SCENIC",
            "SCENIC II": "SCENIC II",
            "VIRAGE": "VIRAGE",
            "FLUENCE": "FLUENCE",
            "LATITUDE": "LATITUDE",
            "ZOE": "ZOE",
            "KADJAR": "KADJAR",
            "ARKANA": "ARKANA"
        },
        "SKODA": {
            "YETI": "YETI",
            "KAROQ": "KAROQ",
            "KODIAQ": "KODIAQ",
            "OCTAVIA": "OCTAVIA",
            "1000": "1000",
            "120": "120",
            "ROOMSTER": "ROOMSTER",
            "S100": "S100",
            "S110": "S110",
            "FABIA": "FABIA",
            "RAPID SPACEBACK": "RAPID SPACEBACK",
            "SUPERB": "SUPERB",
            "KAMIQ": "KAMIQ",
            "SCALA": "SCALA"
        },
        "SSANGYONG": {
            "ACTYON SPORTS": "ACTYON SPORTS",
            "ACTYON": "ACTYON",
            "KORANDO": "KORANDO",
            "KYRON": "KYRON",
            "REXTON": "REXTON",
            "REXTON II": "REXTON II",
            "CHAIRMAN": "CHAIRMAN",
            "STAVIC": "STAVIC",
            "MUSSO": "MUSSO",
            "TIVOLI": "TIVOLI",
            "TIVOLI XLV": "TIVOLI XLV",
            "MUSSO XLV": "MUSSO XLV"
        },
        "SUBARU": {
            "FORESTER": "FORESTER",
            "OUTBACK": "OUTBACK",
            "TRIBECA": "TRIBECA",
            "XV": "XV",
            "1400": "1400",
            "DL": "DL",
            "FF-1": "FF-1",
            "FIORI": "FIORI",
            "GF": "GF",
            "GL": "GL",
            "IMPREZA": "IMPREZA",
            "LEONE": "LEONE",
            "LIBERTY": "LIBERTY",
            "RX": "RX",
            "SHERPA": "SHERPA",
            "SKIWAGON": "SKIWAGON",
            "SPORTSWAGON": "SPORTSWAGON",
            "SUMMERWAGON": "SUMMERWAGON",
            "SVX": "SVX",
            "XT": "XT",
            "BRUMBY": "BRUMBY",
            "BRZ": "BRZ",
            "LEVORG": "LEVORG",
            "WRX": "WRX",
            "CROSSTREK": "CROSSTREK"
        },
        "SUZUKI": {
            "APV": "APV",
            "GRAND VITARA": "GRAND VITARA",
            "IGNIS": "IGNIS",
            "JIMNY": "JIMNY",
            "S-CROSS": "S-CROSS",
            "VITARA": "VITARA",
            "ALTO": "ALTO",
            "BALENO": "BALENO",
            "LIANA": "LIANA",
            "R+": "R+",
            "SWIFT": "SWIFT",
            "SX4": "SX4",
            "LJ50": "LJ50",
            "CARRY": "CARRY",
            "HATCH": "HATCH",
            "LJ81K": "LJ81K",
            "LJ80": "LJ80",
            "MIGHTY BOY": "MIGHTY BOY",
            "ST10S": "ST10S",
            "ST20K": "ST20K",
            "ST80K": "ST80K",
            "SIERRA": "SIERRA",
            "SK410": "SK410",
            "ST90V": "ST90V",
            "SUPER": "SUPER",
            "X-90": "X-90",
            "XL-7": "XL-7",
            "CELERIO": "CELERIO",
            "KIZASHI": "KIZASHI"
        },
        "TATA": {
            "XENON": "XENON",
            "SAFARI": "SAFARI",
            "TELCOLINE": "TELCOLINE"
        },
        "TESLA": {
            "MODEL X": "MODEL X",
            "MODEL S": "MODEL S",
            "MODEL 3": "MODEL 3",
            "MODEL Y": "MODEL Y"
        },
        "TOYOTA": {
            "C-HR": "C-HR",
            "FJ CRUISER": "FJ CRUISER",
            "FORTUNER": "FORTUNER",
            "HIACE": "HIACE",
            "HILUX": "HILUX",
            "KLUGER": "KLUGER",
            "LANDCRUISER": "LANDCRUISER",
            "RAV4": "RAV4",
            "TRD": "TRD",
            "2000": "2000",
            "700": "700",
            "AURION": "AURION",
            "AVALON": "AVALON",
            "AVENSIS": "AVENSIS",
            "CAMRY": "CAMRY",
            "CELICA": "CELICA",
            "COROLLA": "COROLLA",
            "CORONA": "CORONA",
            "CROWN": "CROWN",
            "CRESSIDA": "CRESSIDA",
            "ECHO": "ECHO",
            "LEXCEN": "LEXCEN",
            "LITE ACE": "LITE ACE",
            "MR2": "MR2",
            "PASEO": "PASEO",
            "PRIUS": "PRIUS",
            "SPACIA": "SPACIA",
            "SPRINTER": "SPRINTER",
            "STARLET": "STARLET",
            "SUPRA": "SUPRA",
            "T-18": "T-18",
            "TARAGO": "TARAGO",
            "TERCEL": "TERCEL",
            "TIARA": "TIARA",
            "VIENTA": "VIENTA",
            "YARIS": "YARIS",
            "4 RUNNER": "4 RUNNER",
            "BLIZZARD": "BLIZZARD",
            "BUNDERA": "BUNDERA",
            "DYNA": "DYNA",
            "STOUT": "STOUT",
            "TOYOACE": "TOYOACE",
            "TOWNACE": "TOWNACE",
            "86": "86",
            "PRIUS-C": "PRIUS-C",
            "PRIUS V": "PRIUS V",
            "RUKUS": "RUKUS",
            "GRANVIA": "GRANVIA",
            "LANDCRUISER 70 SERIES": "LANDCRUISER 70 SERIES",
            "LANDCRUISER PRADO": "LANDCRUISER PRADO",
            "GR YARIS": "GR YARIS",
            "YARIS CROSS": "YARIS CROSS",
            "COROLLA CROSS": "COROLLA CROSS",
            "GR86": "GR86",
            "MIRAI": "MIRAI"
        },
        "VOLVO": {
            "XC40": "XC40",
            "XC60": "XC60",
            "XC70": "XC70",
            "XC90": "XC90",
            "1": "1",
            "2": "2",
            "3": "3",
            "4": "4",
            "7": "7",
            "8": "8",
            "9": "9",
            "C30": "C30",
            "C70": "C70",
            "P 1800": "P 1800",
            "S40": "S40",
            "S60": "S60",
            "S70": "S70",
            "S80": "S80",
            "S90": "S90",
            "V40": "V40",
            "V50": "V50",
            "V70": "V70",
            "V90": "V90",
            "CROSS COUNTRY": "CROSS COUNTRY",
            "V60": "V60",
            "C40": "C40"
        },
        "VOLKSWAGEN": {
            "AMAROK": "AMAROK",
            "CADDY": "CADDY",
            "CITIVAN": "CITIVAN",
            "GOLF": "GOLF",
            "TIGUAN": "TIGUAN",
            "TOUAREG": "TOUAREG",
            "TRANSPORTER": "TRANSPORTER",
            "1200": "1200",
            "1300": "1300",
            "1500": "1500",
            "1600": "1600",
            "1.6L": "1.6L",
            "BEETLE": "BEETLE",
            "BORA": "BORA",
            "CARAVELLE": "CARAVELLE",
            "EOS": "EOS",
            "JETTA": "JETTA",
            "KARMANN": "KARMANN",
            "KOMBI": "KOMBI",
            "MICRO": "MICRO",
            "MULTIVAN": "MULTIVAN",
            "PASSAT": "PASSAT",
            "POLO": "POLO",
            "VENTO": "VENTO",
            "": "",
            "TRANSPORTER KOMBI": "TRANSPORTER KOMBI",
            "T4": "T4",
            "ARTEON": "ARTEON",
            "CC": "CC",
            "PASSAT CC": "PASSAT CC",
            "SCIROCCO": "SCIROCCO",
            "UP!": "UP!",
            "T-CROSS": "T-CROSS",
            "T-ROC": "T-ROC",
            "CALIFORNIA": "CALIFORNIA",
            "CADDY 5": "CADDY 5"
        },
        "ZX AUTO": {
            "GRAND TIGER": "GRAND TIGER"
        },
        "ARMSTRONG SIDDELEY": {
            "STAR SAPPHIRE": "STAR SAPPHIRE"
        },
        "ASTON MARTIN": {
            "V8": "V8",
            "DB4": "DB4",
            "DB5": "DB5",
            "DB6": "DB6",
            "DB7": "DB7",
            "DB9": "DB9",
            "DBS": "DBS",
            "AM": "AM",
            "LAGONDA": "LAGONDA",
            "V12": "V12",
            "VANTAGE": "VANTAGE",
            "VOLANTE": "VOLANTE",
            "DB11": "DB11",
            "RAPIDE": "RAPIDE",
            "VANQUISH": "VANQUISH",
            "VIRAGE": "VIRAGE",
            "DBX": "DBX"
        },
        "AUSTIN HEALEY": {
            "3000": "3000",
            "SPRITE": "SPRITE"
        },
        "AUSTIN": {
            "1800": "1800",
            "A 40": "A 40",
            "A 60": "A 60",
            "A 99": "A 99",
            "FREEWAY": "FREEWAY",
            "KIMBERLEY": "KIMBERLEY",
            "LANCER": "LANCER",
            "TASMAN": "TASMAN"
        },
        "BERTONE": {
            "X1\/9": "X1\/9"
        },
        "BOLWELL": {
            "NAGARI": "NAGARI"
        },
        "BORGWARD": {
            "ISABELLA": "ISABELLA"
        },
        "BUICK": {
            "ELECTRA": "ELECTRA",
            "RIVIERA": "RIVIERA"
        },
        "CADILLAC": {
            "DE VILLE": "DE VILLE"
        },
        "CATERHAM": {
            "SEVEN": "SEVEN",
            "SUPER 7": "SUPER 7"
        },
        "CHEVROLET": {
            "BEL AIR": "BEL AIR",
            "CAMARO": "CAMARO",
            "CORVETTE": "CORVETTE",
            "IMPALA": "IMPALA",
            "C20": "C20",
            "C30": "C30",
            "SILVERADO": "SILVERADO"
        },
        "CHRYSLER": {
            "300C": "300C",
            "CENTURA": "CENTURA",
            "CHARGER": "CHARGER",
            "CHRYSLER": "CHRYSLER",
            "CROSSFIRE": "CROSSFIRE",
            "GALANT": "GALANT",
            "GRAND VOYAGER": "GRAND VOYAGER",
            "LANCER": "LANCER",
            "NEON": "NEON",
            "PT CRUISER": "PT CRUISER",
            "REGAL": "REGAL",
            "ROYAL": "ROYAL",
            "SEBRING": "SEBRING",
            "VALIANT": "VALIANT",
            "VIPER": "VIPER",
            "VOYAGER": "VOYAGER",
            "750KG": "750KG",
            "DODGE": "DODGE",
            "300": "300"
        },
        "CORSA SPECIALIZED VEHI": {
            "LA CLASSE": "LA CLASSE",
            "STRADA": "STRADA",
            "VOLANTI": "VOLANTI",
            "BULLET": "BULLET"
        },
        "DAEWOO": {
            "1.5i": "1.5i",
            "CIELO": "CIELO",
            "ESPERO": "ESPERO",
            "KALOS": "KALOS",
            "LACETTI": "LACETTI",
            "LANOS": "LANOS",
            "LEGANZA": "LEGANZA",
            "MATIZ": "MATIZ",
            "NUBIRA": "NUBIRA",
            "TACUMA": "TACUMA",
            "KORANDO": "KORANDO",
            "MUSSO": "MUSSO"
        },
        "DAIHATSU": {
            "360X": "360X",
            "APPLAUSE": "APPLAUSE",
            "CHARADE": "CHARADE",
            "COMPAGNO": "COMPAGNO",
            "COPEN": "COPEN",
            "CUORE": "CUORE",
            "1000": "1000",
            "MIRA": "MIRA",
            "MOVE": "MOVE",
            "PYZAR": "PYZAR",
            "SIRION": "SIRION",
            "YRV": "YRV",
            "CC": "CC",
            "F20": "F20",
            "F25": "F25",
            "F50": "F50",
            "F55": "F55",
            "F60": "F60",
            "F65": "F65",
            "FEROZA": "FEROZA",
            "HANDI": "HANDI",
            "HI-JET": "HI-JET",
            "ROCKY": "ROCKY",
            "S60": "S60",
            "S65": "S65",
            "TERIOS": "TERIOS"
        },
        "DAIMLER": {
            "V8": "V8",
            "250": "250",
            "2.5 LITRE": "2.5 LITRE",
            "DOUBLE SIX": "DOUBLE SIX",
            "SIX": "SIX",
            "SOVEREIGN": "SOVEREIGN",
            "SP250": "SP250",
            "SUPER V8": "SUPER V8",
            "VANDEN PLAS": "VANDEN PLAS"
        },
        "DATSUN": {
            "1000": "1000",
            "1200": "1200",
            "120Y": "120Y",
            "1300": "1300",
            "1600": "1600",
            "180B": "180B",
            "2000": "2000",
            "200B": "200B",
            "2300": "2300",
            "2400": "2400",
            "240C": "240C",
            "240K": "240K",
            "240Z": "240Z",
            "260C": "260C",
            "260Z": "260Z",
            "280C": "280C",
            "BLUEBIRD": "BLUEBIRD",
            "FAIRLADY": "FAIRLADY",
            "GT": "GT",
            "SILVIA": "SILVIA",
            "SUNNY": "SUNNY",
            "520": "520",
            "620": "620",
            "PATROL": "PATROL"
        },
        "DE TOMASO": {
            "DEAUVILLE": "DEAUVILLE",
            "LONGCHAMP": "LONGCHAMP",
            "MANGUSTA": "MANGUSTA",
            "PANTERA": "PANTERA"
        },
        "EUNOS": {
            "30": "30",
            "500": "500",
            "800": "800"
        },
        "FERRARI": {
            "275": "275",
            "308": "308",
            "328": "328",
            "330": "330",
            "348": "348",
            "360": "360",
            "365": "365",
            "400": "400",
            "456": "456",
            "500": "500",
            "512": "512",
            "550": "550",
            "575M": "575M",
            "599": "599",
            "612": "612",
            "DINO": "DINO",
            "F355": "F355",
            "F430": "F430",
            "F50": "F50",
            "F512M": "F512M",
            "MONDIAL": "MONDIAL",
            "SUPERAMERICA": "SUPERAMERICA",
            "FF": "FF",
            "458": "458",
            "488": "488",
            "812": "812",
            "CALIFORNIA": "CALIFORNIA",
            "F12": "F12",
            "GTC4": "GTC4",
            "PORTOFINO": "PORTOFINO",
            "ROMA": "ROMA",
            "F8": "F8"
        },
        "FSM": {
            "NIKI": "NIKI"
        },
        "GIOCATTOLO": {
            "GROUP": "GROUP"
        },
        "GJM": {
            "TAIPAN": "TAIPAN"
        },
        "GOGGOMOBIL": {
            "DART": "DART",
            "T 300": "T 300",
            "T 400": "T 400"
        },
        "HOLDEN HDT": {
            "CALAIS": "CALAIS",
            "COMMODORE": "COMMODORE",
            "COMMODORE SS": "COMMODORE SS",
            "HDT\/COMMODORE": "HDT\/COMMODORE"
        },
        "HILLMAN": {
            "ARROW": "ARROW",
            "GAZELLE": "GAZELLE",
            "HUSTLER": "HUSTLER",
            "HUNTER": "HUNTER",
            "HUSKY": "HUSKY",
            "IMP": "IMP",
            "MINX": "MINX",
            "SUPER MINX": "SUPER MINX"
        },
        "HINO": {
            "CONTESSA": "CONTESSA"
        },
        "HUMBER": {
            "HAWK": "HAWK",
            "SUPER SNIPE": "SUPER SNIPE",
            "VOGUE": "VOGUE"
        },
        "ISO": {
            "FIDIA": "FIDIA",
            "GRIFO": "GRIFO",
            "LELE": "LELE",
            "RIVOLTA": "RIVOLTA"
        },
        "JENSEN": {
            "INTERCEPTOR": "INTERCEPTOR",
            "JENSEN HEALEY": "JENSEN HEALEY"
        },
        "LADA": {
            "CEVARO": "CEVARO",
            "SABLE": "SABLE",
            "SAMARA": "SAMARA",
            "VOLANTE": "VOLANTE",
            "BUSHMAN": "BUSHMAN",
            "NIVA": "NIVA"
        },
        "LANCIA": {
            "BETA": "BETA",
            "FLAMINIA": "FLAMINIA",
            "FLAVIA": "FLAVIA",
            "FULVIA": "FULVIA"
        },
        "LEYLAND": {
            "MARINA": "MARINA",
            "MINI": "MINI",
            "P76": "P76",
            "TARGA": "TARGA",
            "MOKE": "MOKE"
        },
        "LOTUS": {
            "ELAN": "ELAN",
            "ELITE": "ELITE",
            "ELISE": "ELISE",
            "ESPRIT": "ESPRIT",
            "EUROPA": "EUROPA",
            "EXCEL": "EXCEL",
            "EXIGE": "EXIGE",
            "LOTUS": "LOTUS",
            "SUPER SEVEN": "SUPER SEVEN",
            "EVORA": "EVORA",
            "EMIRA": "EMIRA"
        },
        "MAYBACH": {
            "57": "57",
            "62": "62"
        },
        "MORGAN": {
            "4\/4": "4\/4",
            "PLUS 8": "PLUS 8",
            "PLUS": "PLUS",
            "3 WHEELER": "3 WHEELER",
            "AERO COUPE": "AERO COUPE",
            "AERO SUPERSPORTS": "AERO SUPERSPORTS",
            "PLUS 4": "PLUS 4",
            "ROADSTER": "ROADSTER"
        },
        "MORRIS": {
            "1100": "1100",
            "1300": "1300",
            "1500": "1500",
            "850": "850",
            "ELITE": "ELITE",
            "MAJOR": "MAJOR",
            "MARSHALL": "MARSHALL",
            "MINI": "MINI",
            "MINOR": "MINOR",
            "OXFORD": "OXFORD"
        },
        "N.S.U.": {
            "PRINZ": "PRINZ",
            "Ro 80": "Ro 80"
        },
        "NISSAN SPECIAL VEHICLE": {
            "SKYLINE": "SKYLINE"
        },
        "PANTHER": {
            "KALLISTA": "KALLISTA"
        },
        "PONTIAC": {
            "FIREBIRD": "FIREBIRD",
            "LAURENTIAN": "LAURENTIAN",
            "PARISIENNE": "PARISIENNE"
        },
        "PRINCE\/PMC": {
            "A200": "A200",
            "GLORIA": "GLORIA",
            "SKYLINE": "SKYLINE"
        },
        "RAMBLER": {
            "AMBASSADOR": "AMBASSADOR",
            "AMERICAN": "AMERICAN",
            "CLASSIC": "CLASSIC",
            "HORNET": "HORNET",
            "JAVELIN": "JAVELIN",
            "MATADOR": "MATADOR",
            "REBEL": "REBEL"
        },
        "ROLLS-ROYCE": {
            "CAMARGUE": "CAMARGUE",
            "CORNICHE": "CORNICHE",
            "FLYING SPUR": "FLYING SPUR",
            "MULLINER": "MULLINER",
            "PARK WARD": "PARK WARD",
            "PHANTOM": "PHANTOM",
            "SILVER": "SILVER",
            "DAWN": "DAWN",
            "GHOST": "GHOST",
            "WRAITH": "WRAITH",
            "CULLINAN": "CULLINAN"
        },
        "ROVER": {
            "75": "75",
            "2000": "2000",
            "3.5 LITRE": "3.5 LITRE",
            "3 LITRE": "3 LITRE",
            "416i": "416i",
            "825": "825",
            "827": "827",
            "3500": "3500",
            "QUINTET": "QUINTET"
        },
        "SAAB": {
            "9-3": "9-3",
            "9-5": "9-5",
            "900": "900",
            "99": "99",
            "9000": "9000",
            "TURBO X": "TURBO X"
        },
        "SEAT": {
            "CORDOBA": "CORDOBA",
            "IBIZA": "IBIZA",
            "TOLEDO": "TOLEDO"
        },
        "SIMCA": {
            "ARONDE": "ARONDE",
            "VEDETTE": "VEDETTE"
        },
        "SINGER": {
            "GAZELLE": "GAZELLE"
        },
        "SMART": {
            "CABRIO": "CABRIO",
            "CITY COUPE": "CITY COUPE",
            "FORFOUR": "FORFOUR",
            "FORTWO": "FORTWO",
            "ROADSTER": "ROADSTER"
        },
        "STANDARD": {
            "VANGUARD": "VANGUARD"
        },
        "STUDEBAKER": {
            "GRAN": "GRAN",
            "HAWK": "HAWK",
            "LARK": "LARK"
        },
        "SUNBEAM": {
            "ALPINE": "ALPINE",
            "RAPIER": "RAPIER"
        },
        "TD 2000": {
            "TD 2000": "TD 2000"
        },
        "TRIUMPH": {
            "TR": "TR",
            "12\/50": "12\/50",
            "2.5": "2.5",
            "2000": "2000",
            "2500": "2500",
            "DOLOMITE": "DOLOMITE",
            "GT6": "GT6",
            "HERALD": "HERALD",
            "SPITFIRE": "SPITFIRE",
            "STAG": "STAG"
        },
        "TVR": {
            "3000": "3000",
            "CERBERA": "CERBERA",
            "CHIMAERA": "CHIMAERA",
            "GRIFFITH": "GRIFFITH"
        },
        "VANDEN PLAS": {
            "PRINCESS": "PRINCESS"
        },
        "VAUXHALL": {
            "CRESTA": "CRESTA",
            "VELOX": "VELOX",
            "VICTOR": "VICTOR",
            "VIVA": "VIVA",
            "VX4": "VX4"
        },
        "VESPA": {
            "400": "400"
        },
        "WOLSELEY": {
            "15\/60": "15\/60",
            "24\/80": "24\/80",
            "6\/110": "6\/110",
            "6\/99": "6\/99"
        },
        "ZETA": {
            "ZETA": "ZETA"
        },
        "ASIA": {
            "ROCSTA": "ROCSTA"
        },
        "BEDFORD": {
            "CFL": "CFL",
            "CFS": "CFS"
        },
        "INTERNATIONAL": {
            "SCOUT": "SCOUT"
        },
        "ABARTH": {
            "124": "124",
            "500": "500",
            "595": "595",
            "595C": "595C",
            "695": "695",
            "695C": "695C"
        },
        "BMW ALPINA": {
            "B3": "B3",
            "B4": "B4",
            "B7": "B7",
            "XD3": "XD3",
            "B5": "B5",
            "XB7": "XB7",
            "B8": "B8"
        },
        "GEELY": {
            "MK": "MK"
        },
        "McLAREN": {
            "540C": "540C",
            "570S": "570S",
            "650S": "650S",
            "720S": "720S",
            "MP4-12C": "MP4-12C",
            "600LT": "600LT",
            "GT": "GT",
            "570GT": "570GT"
        },
        "MERCEDES-MAYBACH": {
            "S": "S",
            "GLS": "GLS",
            "S600": "S600",
            "S650": "S650",
            "S680": "S680"
        },
        "OPEL": {
            "ASTRA": "ASTRA",
            "CORSA": "CORSA",
            "INSIGNIA": "INSIGNIA",
            "ZAFIRA": "ZAFIRA"
        },
        "ALPINE": {
            "A110": "A110",
            "110": "110"
        },
        "MG": {
            "GS": "GS",
            "ZS": "ZS",
            "MAGNETTE": "MAGNETTE",
            "MGA": "MGA",
            "MGB": "MGB",
            "MGF": "MGF",
            "MIDGET": "MIDGET",
            "TF": "TF",
            "ZR": "ZR",
            "ZT+": "ZT+",
            "ZT": "ZT",
            "ZT-T+": "ZT-T+",
            "ZT-T": "ZT-T",
            "MG3 AUTO": "MG3 AUTO",
            "MG6 PLUS": "MG6 PLUS",
            "MG6": "MG6",
            "HS": "HS",
            "ZST": "ZST",
            "ZS EV": "ZS EV",
            "HS +EV": "HS +EV"
        },
        "GENESIS": {
            "G80": "G80",
            "G70": "G70",
            "GV80": "GV80",
            "GV70": "GV70",
            "GV60": "GV60"
        },
        "GWM": {
            "UTE": "UTE",
            "HAVAL H6": "HAVAL H6",
            "HAVAL JOLION": "HAVAL JOLION",
            "STEED": "STEED",
            "HAVAL H6GT": "HAVAL H6GT",
            "TANK 300": "TANK 300"
        },
        "POLESTAR": {
            "2": "2",
            "3": "3"
        },
        "CUPRA": {
            "ATECA": "ATECA",
            "FORMENTOR": "FORMENTOR",
            "LEON": "LEON",
            "BORN": "BORN"
        },
        "INEOS": {
            "GRENADIER": "GRENADIER"
        }
    };
    var serieses = {
        "STELVIO": {
            "949 MY18": "949 MY18",
            "952": "952",
            "949": "949",
            "SERIES 2 MY21": "SERIES 2 MY21",
            "SERIES 1 MY20": "SERIES 1 MY20",
            "SERIES 3 MY22": "SERIES 3 MY22"
        },
        "A6": {
            "4F MY09": "4F MY09",
            "4F": "4F",
            "4B": "4B",
            "4F MY06 UPGRADE": "4F MY06 UPGRADE",
            "4F MY06 UPGARDE": "4F MY06 UPGARDE",
            "4GC MY17": "4GC MY17",
            "4GC MY18": "4GC MY18",
            "4GL MY18": "4GL MY18",
            "4GL MY15": "4GL MY15",
            "4GL MY16": "4GL MY16",
            "4GL MY17": "4GL MY17",
            "4GL MY14": "4GL MY14",
            "4GL": "4GL",
            "4GL MY13": "4GL MY13",
            "4GH MY15": "4GH MY15",
            "4GH MY16": "4GH MY16",
            "4GH MY17": "4GH MY17",
            "4GH MY18": "4GH MY18",
            "4GH MY14": "4GH MY14",
            "4GH": "4GH",
            "C8 MY19": "C8 MY19",
            "4A MY20": "4A MY20",
            "4F MY10": "4F MY10",
            "4F MY11": "4F MY11",
            "4GL MY11": "4GL MY11",
            "4A MY21": "4A MY21",
            "4A MY21A": "4A MY21A",
            "4A MY22": "4A MY22",
            "4A MY22A": "4A MY22A",
            "4A MY23": "4A MY23"
        },
        "Q2": {
            "GA MY18": "GA MY18",
            "GA": "GA",
            "GA MY19": "GA MY19",
            "GA MY20BE": "GA MY20BE",
            "GA MY20": "GA MY20",
            "3Y MY21": "3Y MY21",
            "3Y MY22": "3Y MY22",
            "GA MY22A": "GA MY22A",
            "GY MY22A": "GY MY22A",
            "GA MY23": "GA MY23"
        },
        "Q3": {
            "8U MY14": "8U MY14",
            "8U MY15": "8U MY15",
            "8U MY17": "8U MY17",
            "8U MY18": "8U MY18",
            "8U": "8U",
            "8U MY16": "8U MY16",
            "F3 MY20": "F3 MY20",
            "F3 MY21": "F3 MY21",
            "F3 MY22": "F3 MY22",
            "F3 MY22A": "F3 MY22A",
            "F3 MY23": "F3 MY23"
        },
        "Q5": {
            "8R MY10": "8R MY10",
            "8R MY11": "8R MY11",
            "8R MY12": "8R MY12",
            "8R MY13": "8R MY13",
            "8R MY14": "8R MY14",
            "8R MY15": "8R MY15",
            "8R MY16": "8R MY16",
            "8R MY17": "8R MY17",
            "8R MY16 UPGRADE": "8R MY16 UPGRADE",
            "8R": "8R",
            "FY MY18": "FY MY18",
            "FY MY17": "FY MY17",
            "FY MY19": "FY MY19",
            "FY MY19A": "FY MY19A",
            "FY MY20": "FY MY20",
            "FY MY21": "FY MY21",
            "FY MY22": "FY MY22",
            "FY MY22A": "FY MY22A",
            "FY MY22SA": "FY MY22SA",
            "FY MY22B": "FY MY22B",
            "FY MY22LA": "FY MY22LA",
            "FY MY23": "FY MY23"
        },
        "Q7": {
            "MY09 UPGRADE": "MY09 UPGRADE",
            "MY10 UPGRADE": "MY10 UPGRADE",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "4M MY17": "4M MY17",
            "4M MY18": "4M MY18",
            "4M": "4M",
            "MY07 UPGRADE": "MY07 UPGRADE",
            "MY08 UPGRADE": "MY08 UPGRADE",
            "4M MY19": "4M MY19",
            "4M MY20": "4M MY20",
            "MY18": "MY18",
            "4M MY21": "4M MY21",
            "4M MY22": "4M MY22",
            "4M MY22A": "4M MY22A",
            "4M MY23": "4M MY23"
        },
        "RS Q3": {
            "8U MY17": "8U MY17",
            "8U MY14": "8U MY14",
            "8U MY15": "8U MY15",
            "8U MY16": "8U MY16",
            "8U MY18": "8U MY18",
            "F3 MY20": "F3 MY20",
            "F3 MY21": "F3 MY21",
            "F3 MY22": "F3 MY22",
            "F3 MY22A": "F3 MY22A",
            "F3 MY23": "F3 MY23"
        },
        "SQ5 PLUS": {
            "8R MY16": "8R MY16",
            "8R MY17": "8R MY17"
        },
        "SQ5": {
            "8R MY14": "8R MY14",
            "8R MY15": "8R MY15",
            "8R MY16": "8R MY16",
            "8R MY16 UPGRADE": "8R MY16 UPGRADE",
            "8R MY17": "8R MY17",
            "8R": "8R",
            "FY MY17": "FY MY17",
            "FY MY18": "FY MY18",
            "FY MY19": "FY MY19",
            "FY MY19A": "FY MY19A",
            "FY MY20": "FY MY20",
            "FY MY21": "FY MY21",
            "FY MY22": "FY MY22",
            "FY MY22A": "FY MY22A",
            "FY MY22B": "FY MY22B",
            "FY MY23": "FY MY23"
        },
        "SQ7": {
            "4M": "4M",
            "4M MY18": "4M MY18",
            "4M MY19": "4M MY19",
            "4M MY20": "4M MY20",
            "4M MY21": "4M MY21",
            "4M MY22": "4M MY22",
            "4M MY22A": "4M MY22A",
            "4M MY23": "4M MY23"
        },
        "BENTAYGA": {
            "MY17": "MY17",
            "MY18": "MY18",
            "MY19": "MY19",
            "4V MY22": "4V MY22",
            "MY20": "MY20",
            "MY21": "MY21"
        },
        "X1": {
            "E84 MY13": "E84 MY13",
            "E84 MY14": "E84 MY14",
            "E84 MY14 UPGRADE": "E84 MY14 UPGRADE",
            "E84 MY15": "E84 MY15",
            "F48 MY17": "F48 MY17",
            "F48 MY18": "F48 MY18",
            "F48": "F48",
            "E84 MY11": "E84 MY11",
            "E84": "E84",
            "F48 MY19": "F48 MY19",
            "F48 LCI": "F48 LCI",
            "U11": "U11"
        },
        "X2": {
            "F39 MY18": "F39 MY18",
            "F39 MY19": "F39 MY19",
            "F39": "F39"
        },
        "X3": {
            "F25 MY13": "F25 MY13",
            "F25 MY14": "F25 MY14",
            "F25 MY15": "F25 MY15",
            "F25 MY16": "F25 MY16",
            "F25 MY17": "F25 MY17",
            "G01": "G01",
            "G01 MY18.5": "G01 MY18.5",
            "F25": "F25",
            "F25 MY17 UPDATE": "F25 MY17 UPDATE",
            "E83 MY09": "E83 MY09",
            "E83 MY05 UPGRADE": "E83 MY05 UPGRADE",
            "E83": "E83",
            "E83 MY07": "E83 MY07",
            "F97": "F97"
        },
        "X4": {
            "F26": "F26",
            "F26 MY15": "F26 MY15",
            "F26 MY16": "F26 MY16",
            "G02 MY19": "G02 MY19",
            "F98": "F98",
            "G02": "G02",
            "G02 LCI": "G02 LCI"
        },
        "X5": {
            "E70 MY09": "E70 MY09",
            "E70 MY10": "E70 MY10",
            "E70 MY12 UPGRADE": "E70 MY12 UPGRADE",
            "F85": "F85",
            "F85 MY16": "F85 MY16",
            "F15 MY18": "F15 MY18",
            "E70 MY12": "E70 MY12",
            "F15": "F15",
            "F15 MY14": "F15 MY14",
            "F15 MY15": "F15 MY15",
            "F15 MY16": "F15 MY16",
            "E70": "E70",
            "E53 MY06 UPGRADE": "E53 MY06 UPGRADE",
            "E53 MY06 UPGRADE 2": "E53 MY06 UPGRADE 2",
            "E53": "E53",
            "G05 MY19": "G05 MY19",
            "G05": "G05",
            "F95": "F95"
        },
        "X6": {
            "E71 MY11": "E71 MY11",
            "E71 MY12": "E71 MY12",
            "F86": "F86",
            "F86 MY16": "F86 MY16",
            "E71": "E71",
            "E71 MY14": "E71 MY14",
            "F16": "F16",
            "F16 MY16": "F16 MY16",
            "F16 MY18": "F16 MY18",
            "F16 MY19": "F16 MY19",
            "G06": "G06",
            "F96": "F96"
        },
        "J11": {
            "T1X MY14": "T1X MY14",
            "T1X": "T1X"
        },
        "C3": {
            "B618": "B618",
            "B618 MY18": "B618 MY18",
            "MY08": "MY08",
            "MY06": "MY06",
            "A5 MY14": "A5 MY14",
            "A5": "A5",
            "A5 MY12": "A5 MY12",
            "MY18": "MY18",
            "MY18 LAUNCH EDITION": "MY18 LAUNCH EDITION",
            "B618 MY19": "B618 MY19",
            "B618 MY20": "B618 MY20",
            "B618 MY21": "B618 MY21",
            "B618 MY22": "B618 MY22"
        },
        "C4": {
            "1CM": "1CM",
            "1CM MY13": "1CM MY13",
            "B7 MY13": "B7 MY13",
            "B7": "B7",
            "MY09": "MY09",
            "B7 MY15": "B7 MY15",
            "B7 MY14": "B7 MY14",
            "C41 MY22": "C41 MY22"
        },
        "BERLINGO II": {
            "M59": "M59"
        },
        "BERLINGO": {
            "B9C MY12": "B9C MY12",
            "B9C MY13": "B9C MY13",
            "B9C MY14": "B9C MY14",
            "B9C MY15": "B9C MY15",
            "B9C MY16": "B9C MY16",
            "B9C": "B9C",
            "B9C MY17": "B9C MY17",
            "MY18": "MY18"
        },
        "C4 CACTUS": {
            "MY16": "MY16",
            "MY18": "MY18",
            "MY18 UPDATE": "MY18 UPDATE"
        },
        "DISPATCH": {
            "G9C": "G9C",
            "K0 MY18": "K0 MY18"
        },
        "JOURNEY": {
            "JC MY15": "JC MY15",
            "JC MY16": "JC MY16",
            "JC MY12": "JC MY12",
            "JC MY13": "JC MY13",
            "JC MY14": "JC MY14",
            "JC": "JC",
            "JC MY10": "JC MY10",
            "JC MY09": "JC MY09"
        },
        "NITRO": {
            "KA MY10": "KA MY10",
            "KA MY08": "KA MY08",
            "KA": "KA"
        },
        "500X": {
            "SERIES 2 MY18": "SERIES 2 MY18"
        },
        "FREEMONT": {
            "JF MY15": "JF MY15",
            "JF": "JF"
        },
        "SCUDO": {
            "MY13": "MY13"
        },
        "ECOSPORT": {
            "BL MY18": "BL MY18",
            "BK": "BK",
            "BL MY18.75": "BL MY18.75",
            "BL MY19.25": "BL MY19.25",
            "BL MY20": "BL MY20"
        },
        "ESCAPE": {
            "ZD": "ZD",
            "ZG MY18": "ZG MY18",
            "ZG MY18.5": "ZG MY18.5",
            "ZG": "ZG",
            "BA": "BA",
            "ZA": "ZA",
            "ZB": "ZB",
            "ZC": "ZC",
            "ZG MY18.75": "ZG MY18.75",
            "ZG MY19.25": "ZG MY19.25",
            "ZG MY19.75": "ZG MY19.75",
            "ZG MY20.75": "ZG MY20.75",
            "ZG MY21.25": "ZG MY21.25",
            "ZH MY20.75": "ZH MY20.75",
            "ZH MY21.25": "ZH MY21.25",
            "ZH MY21.5": "ZH MY21.5",
            "ZH MY22": "ZH MY22",
            "ZH MY23.25": "ZH MY23.25"
        },
        "EVEREST": {
            "UA MY18": "UA MY18",
            "UA MY17.5": "UA MY17.5",
            "UA II MY19": "UA II MY19",
            "UA": "UA",
            "UA MY17": "UA MY17",
            "UA II MY19.75": "UA II MY19.75",
            "UA II MY20.25": "UA II MY20.25",
            "UA II MY20.75": "UA II MY20.75",
            "UA II MY21.25": "UA II MY21.25",
            "UA II MY21.75": "UA II MY21.75",
            "MY22": "MY22",
            "UB MY22": "UB MY22"
        },
        "FALCON": {
            "FG X": "FG X",
            "FG": "FG",
            "FG UPGRADE": "FG UPGRADE",
            "FG MK2": "FG MK2",
            "XA": "XA",
            "XB": "XB",
            "XC": "XC",
            "XK": "XK",
            "XL": "XL",
            "XM": "XM",
            "XP": "XP",
            "XR": "XR",
            "XT": "XT",
            "XW": "XW",
            "XY": "XY",
            "EA": "EA",
            "EAII": "EAII",
            "EB": "EB",
            "EBII": "EBII",
            "EL": "EL",
            "AU": "AU",
            "AUII": "AUII",
            "EFII": "EFII",
            "BA MKII": "BA MKII",
            "BA": "BA",
            "BF MKII": "BF MKII",
            "XD": "XD",
            "AUIII": "AUIII",
            "BF": "BF",
            "EF": "EF",
            "ED": "ED",
            "BF MKII 07 UPGRADE": "BF MKII 07 UPGRADE",
            "XE": "XE",
            "XF": "XF",
            "EL (185kw)": "EL (185kw)",
            "BF MKIII": "BF MKIII",
            "XH": "XH",
            "XHII": "XHII",
            "XG": "XG"
        },
        "FPV": {
            "FG MY11": "FG MY11",
            "FG": "FG",
            "FG MK2": "FG MK2",
            "SY": "SY",
            "BF MKII": "BF MKII",
            "BF MKII 08 UPGRADE": "BF MKII 08 UPGRADE",
            "BA MKII": "BA MKII",
            "BF": "BF",
            "BA": "BA"
        },
        "KUGA": {
            "TF MK 2": "TF MK 2",
            "TF": "TF",
            "TE": "TE"
        },
        "RANGER": {
            "PX MKII MY18": "PX MKII MY18",
            "PX MKII MY17": "PX MKII MY17",
            "PK": "PK",
            "PJ 07 UPGRADE": "PJ 07 UPGRADE",
            "PX MKII": "PX MKII",
            "PX MKIII MY19": "PX MKIII MY19",
            "PX MKII MY17 UPDATE": "PX MKII MY17 UPDATE",
            "PX": "PX",
            "PJ": "PJ",
            "PX MKIII MY19.75": "PX MKIII MY19.75",
            "PK MKIII MY19.75": "PK MKIII MY19.75",
            "PX MKIII MY20.25": "PX MKIII MY20.25",
            "PX MKIII MY20.75": "PX MKIII MY20.75",
            "PX MKIII MY21.25": "PX MKIII MY21.25",
            "PX MKIII MY21.75": "PX MKIII MY21.75",
            "MY22": "MY22",
            "PY MY22": "PY MY22"
        },
        "TERRITORY": {
            "SY MKII": "SY MKII",
            "SY MY07 UPGRADE": "SY MY07 UPGRADE",
            "SY": "SY",
            "SZ": "SZ",
            "SZ MK2": "SZ MK2",
            "SX": "SX"
        },
        "TRANSIT": {
            "VM MY12 UPDATE": "VM MY12 UPDATE",
            "VM MY08": "VM MY08",
            "VO": "VO",
            "VO MY17.25": "VO MY17.25",
            "VO MY16": "VO MY16",
            "VM": "VM",
            "VM MY10": "VM MY10",
            "100": "100",
            "125": "125",
            "115": "115",
            "175": "175",
            "VG": "VG",
            "VF": "VF",
            "VH": "VH",
            "VJ": "VJ",
            "VM MY16": "VM MY16",
            "VO MY14.5": "VO MY14.5",
            "VO MY16.75": "VO MY16.75",
            "VO MY17.75": "VO MY17.75",
            "VO MY18.5": "VO MY18.5"
        },
        "TRANSIT CUSTOM": {
            "VN MY17.25": "VN MY17.25",
            "VN": "VN",
            "VN MY18.5": "VN MY18.5",
            "VN MY16.00": "VN MY16.00",
            "VN MY17.75": "VN MY17.75",
            "VN MY15.50": "VN MY15.50",
            "VN MY16.75": "VN MY16.75",
            "VN MY18.50": "VN MY18.50",
            "VN MY18.75": "VN MY18.75",
            "VN MY19.75": "VN MY19.75",
            "VN MY20.5": "VN MY20.5",
            "VN MY21": "VN MY21",
            "VN MY21.25": "VN MY21.25",
            "VN MY21.75": "VN MY21.75",
            "VN MY22.5": "VN MY22.5",
            "VN MY22.75": "VN MY22.75"
        },
        "TUNLAND": {
            "P201 MY15": "P201 MY15",
            "P201 MY16": "P201 MY16",
            "P201 MY14": "P201 MY14",
            "P201 MY17": "P201 MY17",
            "P201": "P201"
        },
        "VIEW CS2": {
            "K1 MD2": "K1 MD2",
            "K1 NA": "K1 NA"
        },
        "SA220": {
            "CC": "CC"
        },
        "STEED": {
            "NBP": "NBP",
            "K2": "K2"
        },
        "V200": {
            "K2": "K2"
        },
        "V240": {
            "K2 MY11": "K2 MY11",
            "K2": "K2"
        },
        "X200": {
            "CC6461KY MY11": "CC6461KY MY11"
        },
        "X240": {
            "CC6461KY MY11": "CC6461KY MY11",
            "CC6461KY": "CC6461KY"
        },
        "H6": {
            "MKY": "MKY"
        },
        "H9": {
            "MY18": "MY18",
            "MY19": "MY19"
        },
        "ADVENTRA": {
            "VZ MY06 UPGRADE": "VZ MY06 UPGRADE",
            "VZ": "VZ",
            "VZ MY06": "VZ MY06",
            "VYII": "VYII"
        },
        "CAPTIVA": {
            "CG MY12": "CG MY12",
            "CG MY10": "CG MY10",
            "CG SERIES II": "CG SERIES II",
            "CG MY13": "CG MY13",
            "CG MY14": "CG MY14",
            "CG MY15": "CG MY15",
            "CG MY16": "CG MY16",
            "CG MY17": "CG MY17",
            "CG MY18": "CG MY18",
            "CG MY09.5": "CG MY09.5",
            "CG MY09": "CG MY09",
            "CG MY08": "CG MY08",
            "CG": "CG"
        },
        "COMBO": {
            "XC MY10": "XC MY10",
            "XC MY11": "XC MY11",
            "XC MY08.5": "XC MY08.5",
            "SB": "SB",
            "XC MY05": "XC MY05",
            "XC MY06": "XC MY06",
            "XC MY07": "XC MY07",
            "XC MY08": "XC MY08",
            "XC": "XC"
        },
        "COLORADO 7": {
            "RG MY14": "RG MY14",
            "RG MY15": "RG MY15",
            "RG MY16": "RG MY16",
            "RG": "RG"
        },
        "COLORADO": {
            "RG MY19": "RG MY19",
            "RC MY10.5": "RC MY10.5",
            "RC MY09": "RC MY09",
            "RC MY10": "RC MY10",
            "RC MY11": "RC MY11",
            "RG MY14": "RG MY14",
            "RG MY15": "RG MY15",
            "RG MY16": "RG MY16",
            "RG": "RG",
            "RG MY17": "RG MY17",
            "RG MY18": "RG MY18",
            "RC": "RC",
            "82C43 MY19": "82C43 MY19",
            "RG MY20": "RG MY20",
            "82C43 MY20": "82C43 MY20"
        },
        "COMMODORE": {
            "VE II MY12.5": "VE II MY12.5",
            "VE II MY12": "VE II MY12",
            "VE MY10": "VE MY10",
            "VE MY09.5": "VE MY09.5",
            "VE II": "VE II",
            "VL": "VL",
            "VB": "VB",
            "VC": "VC",
            "VT": "VT",
            "VR": "VR",
            "VRII": "VRII",
            "VS": "VS",
            "VSII": "VSII",
            "VTII": "VTII",
            "VX": "VX",
            "VY": "VY",
            "VZ": "VZ",
            "VXII": "VXII",
            "VYII": "VYII",
            "VZ MY06": "VZ MY06",
            "VZ MY06 UPGRADE": "VZ MY06 UPGRADE",
            "VH": "VH",
            "VK": "VK",
            "VN": "VN",
            "VP": "VP",
            "VPII": "VPII",
            "VE MY08": "VE MY08",
            "VE": "VE",
            "VZ MY05": "VZ MY05",
            "VE MY09": "VE MY09",
            "VZ 05 UPGRADE": "VZ 05 UPGRADE",
            "VG": "VG",
            "VSIII": "VSIII",
            "VUII": "VUII",
            "VU": "VU",
            "ZB": "ZB",
            "VF MY15": "VF MY15",
            "VF MY14": "VF MY14",
            "VF II": "VF II",
            "VF II MY17": "VF II MY17",
            "VF": "VF",
            "VFII MY16": "VFII MY16",
            "ZB MY19.5": "ZB MY19.5"
        },
        "EQUINOX": {
            "EQ MY18": "EQ MY18",
            "EQ MY20": "EQ MY20"
        },
        "TRAILBLAZER": {
            "RG MY18": "RG MY18",
            "RG MY17": "RG MY17",
            "RG MY19": "RG MY19",
            "RG MY20": "RG MY20"
        },
        "TRAX": {
            "TJ MY18": "TJ MY18",
            "TJ MY15": "TJ MY15",
            "TJ": "TJ",
            "TJ MY16": "TJ MY16",
            "TJ MY17": "TJ MY17",
            "TJ MY19": "TJ MY19",
            "TJ MY20": "TJ MY20"
        },
        "UTE": {
            "VF II": "VF II",
            "VF MY15": "VF MY15",
            "VF II MY17": "VF II MY17",
            "VF": "VF",
            "VFII MY16": "VFII MY16"
        },
        "CR-V": {
            "MY07": "MY07",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY18": "MY18",
            "30 SERIES 2": "30 SERIES 2",
            "30 MY14": "30 MY14",
            "30 SERIES 2 MY17": "30 SERIES 2 MY17",
            "30 MY15": "30 MY15",
            "30": "30",
            "MY02": "MY02",
            "MY03": "MY03",
            "MY04": "MY04",
            "2005 UPGRADE": "2005 UPGRADE",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22",
            "MY23": "MY23"
        },
        "HR-V": {
            "MY17": "MY17",
            "MY18": "MY18",
            "MY16": "MY16",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "GTSR MALOO": {
            "GEN F2": "GEN F2"
        },
        "GTS": {
            "GEN F MY15": "GEN F MY15",
            "VP": "VP",
            "VR": "VR",
            "VS": "VS",
            "VSII": "VSII",
            "VT": "VT",
            "VTII": "VTII",
            "E SERIES MY08 UPGRA": "E SERIES MY08 UPGRA",
            "E SERIES": "E SERIES",
            "VX": "VX",
            "YII": "YII",
            "Y-SERIES": "Y-SERIES",
            "E3 MY12": "E3 MY12",
            "E2 SERIES": "E2 SERIES",
            "E3": "E3",
            "GEN F2": "GEN F2",
            "GEN F": "GEN F",
            "E3 MY12.5": "E3 MY12.5"
        },
        "MALOO": {
            "GEN F MY15": "GEN F MY15",
            "E3 MY12.5": "E3 MY12.5",
            "GEN F": "GEN F",
            "E2 SERIES": "E2 SERIES",
            "E3": "E3",
            "V3 MY12": "V3 MY12",
            "E SERIES MY08 UPGRA": "E SERIES MY08 UPGRA",
            "GEN F2": "GEN F2",
            "GEN-F2": "GEN-F2",
            "VR": "VR",
            "VS": "VS",
            "VSII": "VSII",
            "VSIII": "VSIII",
            "VUII": "VUII",
            "VU": "VU",
            "YII": "YII",
            "Y-SERIES": "Y-SERIES",
            "Z SERIES": "Z SERIES",
            "E SERIES": "E SERIES",
            "VG": "VG",
            "VP": "VP"
        },
        "iLOAD": {
            "TQ MY11": "TQ MY11",
            "TQ MY13": "TQ MY13",
            "TQ MY14": "TQ MY14",
            "TQ MY15": "TQ MY15",
            "TQ SERIES II (TQ3)": "TQ SERIES II (TQ3)",
            "TQ": "TQ",
            "TQ4 MY19": "TQ4 MY19",
            "TQ4 MY20": "TQ4 MY20",
            "TQ4 MY21": "TQ4 MY21"
        },
        "iX35": {
            "LM MY11": "LM MY11",
            "LM MY13": "LM MY13",
            "LM SERIES II": "LM SERIES II",
            "LM": "LM"
        },
        "KONA": {
            "OS": "OS",
            "OS.2 MY19": "OS.2 MY19",
            "0S.2 WG": "0S.2 WG",
            "OS.3": "OS.3",
            "OS.3 MY20": "OS.3 MY20",
            "0S.3 MY20": "0S.3 MY20",
            "OSEV.2 MY20": "OSEV.2 MY20",
            "OS.V4 MY21": "OS.V4 MY21",
            "0S.V4 MY21": "0S.V4 MY21",
            "OS.V4 MY22": "OS.V4 MY22",
            "OS.V4 MY23": "OS.V4 MY23",
            "OS.V5 MY23": "OS.V5 MY23"
        },
        "SANTA FE": {
            "DM SERIES II (DM3)": "DM SERIES II (DM3)",
            "DM MY15": "DM MY15",
            "DM SERIES II (DM3)M": "DM SERIES II (DM3)M",
            "DM5 MY18": "DM5 MY18",
            "DM SER II (DM3) UPD": "DM SER II (DM3) UPD",
            "DM": "DM",
            "TM": "TM",
            "DM SER II (DM3)": "DM SER II (DM3)",
            "CM MY10": "CM MY10",
            "CM MY12": "CM MY12",
            "CM MY09 UPGRADE": "CM MY09 UPGRADE",
            "CM": "CM",
            "05 UPDATE": "05 UPDATE",
            "CM MY07": "CM MY07",
            "CM MY07 UPGRADE": "CM MY07 UPGRADE",
            "CM MY08 UPGRADE": "CM MY08 UPGRADE",
            "TM.2": "TM.2",
            "TM.2 MY20": "TM.2 MY20",
            "TM.V3 MY21": "TM.V3 MY21",
            "TM.V3 MY22": "TM.V3 MY22",
            "TM.V4 MY22": "TM.V4 MY22",
            "TM.V4 MY23": "TM.V4 MY23"
        },
        "TUCSON": {
            "TL": "TL",
            "TLE": "TLE",
            "TL UPGRADE": "TL UPGRADE",
            "TL2 MY18": "TL2 MY18",
            "TL3 MY19": "TL3 MY19",
            "TL MY18": "TL MY18",
            "08 UPGRADE": "08 UPGRADE",
            "TLE2 MY18": "TLE2 MY18",
            "TL2": "TL2",
            "MY06 UPGRADE": "MY06 UPGRADE",
            "MY07": "MY07",
            "TLe3 MY19": "TLe3 MY19",
            "TL4 MY20": "TL4 MY20",
            "TL3 MY20": "TL3 MY20",
            "TL4 MY21": "TL4 MY21",
            "TL3 MY21": "TL3 MY21",
            "NX4.V1 MY22": "NX4.V1 MY22",
            "MY09": "MY09",
            "NX4.V2 MY23": "NX4.V2 MY23"
        },
        "FX": {
            "S51": "S51"
        },
        "Q30": {
            "H15": "H15",
            "H15 MY19": "H15 MY19"
        },
        "QX30": {
            "H15": "H15",
            "H15 MY19": "H15 MY19"
        },
        "QX80": {
            "Z62": "Z62",
            "Z62 MY18": "Z62 MY18",
            "Z62 MY19": "Z62 MY19"
        },
        "D-MAX": {
            "TF MY10": "TF MY10",
            "TF MY12": "TF MY12",
            "TF MY14": "TF MY14",
            "TF MY15": "TF MY15",
            "TF MY17": "TF MY17",
            "TF MY18": "TF MY18",
            "TF MY15.5": "TF MY15.5",
            "TF": "TF",
            "TF MY19": "TF MY19",
            "TF MY21": "TF MY21",
            "RG MY21": "RG MY21",
            "RG MY22": "RG MY22",
            "RG1 MY22.75": "RG1 MY22.75",
            "RG1 MY23": "RG1 MY23"
        },
        "MU-X": {
            "UC MY15": "UC MY15",
            "UC MY16.5": "UC MY16.5",
            "UC MY17": "UC MY17",
            "UC MY18": "UC MY18",
            "UC MY15.5": "UC MY15.5",
            "UC": "UC",
            "UC MY19": "UC MY19",
            "RJ MY21": "RJ MY21",
            "RJ MY22": "RJ MY22",
            "RJ5 MY22.75": "RJ5 MY22.75",
            "RJ5 MY23": "RJ5 MY23"
        },
        "E-PACE": {
            "X540 MY18": "X540 MY18",
            "X540 MY19": "X540 MY19",
            "X540 MY20": "X540 MY20",
            "X540 MY21": "X540 MY21",
            "X540 MY22": "X540 MY22",
            "X540 MY23": "X540 MY23"
        },
        "F-PACE": {
            "MY18": "MY18",
            "MY17": "MY17",
            "X761 MY18 UPDATE": "X761 MY18 UPDATE",
            "X761 MY19": "X761 MY19",
            "X761 MY20": "X761 MY20",
            "X761 MY21": "X761 MY21",
            "X761 MY21.25": "X761 MY21.25",
            "X761 MY22": "X761 MY22",
            "X761 MY23": "X761 MY23"
        },
        "I-PACE": {
            "X590 MY19": "X590 MY19",
            "MY19 UPDATE": "MY19 UPDATE",
            "X590 MY20": "X590 MY20",
            "X590 MY21": "X590 MY21",
            "X590 MY22": "X590 MY22",
            "X590 MY23": "X590 MY23",
            "X152 MY24": "X152 MY24"
        },
        "CHEROKEE": {
            "JK MY16": "JK MY16",
            "KL MY15": "KL MY15",
            "KL MY16": "KL MY16",
            "KK MY12": "KK MY12",
            "KL MY17": "KL MY17",
            "KL MY18": "KL MY18",
            "KL": "KL",
            "KK": "KK",
            "XJ": "XJ",
            "KJ": "KJ",
            "KJ MY05 UPGRADE": "KJ MY05 UPGRADE",
            "KJ MY05 UPGRADE II": "KJ MY05 UPGRADE II",
            "KL MY19": "KL MY19",
            "KL MY20": "KL MY20",
            "KL MY21": "KL MY21",
            "KL MY22": "KL MY22"
        },
        "COMPASS": {
            "MK MY14": "MK MY14",
            "MK MY15": "MK MY15",
            "MK MY12": "MK MY12",
            "MK MY16": "MK MY16",
            "M6 MY18": "M6 MY18",
            "MK": "MK",
            "M6 MY20": "M6 MY20",
            "M6 MY21": "M6 MY21",
            "M6 MY22": "M6 MY22",
            "M6 MY23": "M6 MY23"
        },
        "COMMANDER": {
            "XH": "XH"
        },
        "GRAND CHEROKEE": {
            "WK MY16": "WK MY16",
            "WK MY14": "WK MY14",
            "WK MY15": "WK MY15",
            "WK MY17": "WK MY17",
            "MY18": "MY18",
            "WK MY12": "WK MY12",
            "WK MY13": "WK MY13",
            "WK MY18": "WK MY18",
            "WH MY08": "WH MY08",
            "WK": "WK",
            "WH": "WH",
            "WG": "WG",
            "WJ": "WJ",
            "ZG": "ZG",
            "WK MY19": "WK MY19",
            "WK MY19 UPDATE": "WK MY19 UPDATE",
            "WK MY20": "WK MY20",
            "WK MY21": "WK MY21",
            "WL MY21": "WL MY21",
            "WL MY22": "WL MY22"
        },
        "PATRIOT": {
            "MK MY14": "MK MY14",
            "MK MY15": "MK MY15",
            "MK MY12": "MK MY12",
            "MK MY16": "MK MY16",
            "MK MY11": "MK MY11",
            "MK MY09": "MK MY09",
            "MK": "MK"
        },
        "RENEGADE": {
            "BU MY16": "BU MY16",
            "BU MY17": "BU MY17",
            "BU": "BU"
        },
        "WRANGLER": {
            "JK MY16": "JK MY16",
            "JK MY14": "JK MY14",
            "JK MY15": "JK MY15",
            "JK MY13": "JK MY13",
            "JK MY18": "JK MY18",
            "JK MY17": "JK MY17",
            "JK MY08": "JK MY08",
            "JK MY09": "JK MY09",
            "JK MY11": "JK MY11",
            "JK MY12": "JK MY12",
            "TJ": "TJ",
            "JK": "JK",
            "JL MY19": "JL MY19",
            "JL MY20": "JL MY20",
            "JL MY21": "JL MY21",
            "JL MY21 V2": "JL MY21 V2",
            "JL MY22": "JL MY22",
            "JL MY23": "JL MY23"
        },
        "WRANGLER UNLIMITED": {
            "JK MY16": "JK MY16",
            "JK MY14": "JK MY14",
            "JK MY15": "JK MY15",
            "JK MY13": "JK MY13",
            "JK MY18": "JK MY18",
            "JK MY17": "JK MY17",
            "JK MY08": "JK MY08",
            "JK MY09": "JK MY09",
            "JK MY11": "JK MY11",
            "JK MY12": "JK MY12",
            "JK": "JK",
            "JL MY19": "JL MY19",
            "JL MY18": "JL MY18",
            "JL MY20": "JL MY20",
            "JL MY21": "JL MY21",
            "JL MY21 V2": "JL MY21 V2",
            "JL MY22": "JL MY22",
            "JL MY23": "JL MY23"
        },
        "K2900": {
            "PU3 MY10": "PU3 MY10",
            "PU3": "PU3"
        },
        "SORENTO": {
            "BL": "BL",
            "UM MY17": "UM MY17",
            "UM MY18": "UM MY18",
            "UM MY19": "UM MY19",
            "XM MY13": "XM MY13",
            "XM MY14": "XM MY14",
            "UM MY16": "UM MY16",
            "UM": "UM",
            "XM MY11": "XM MY11",
            "XM MY12": "XM MY12",
            "XM": "XM",
            "BL 05 UPGRADE": "BL 05 UPGRADE",
            "UM PE MY20": "UM PE MY20",
            "UM MY20": "UM MY20",
            "MQ4 MY21": "MQ4 MY21",
            "MQ4 MY22": "MQ4 MY22",
            "MQ4 MY22 UPDATE": "MQ4 MY22 UPDATE",
            "MQ4 MY23": "MQ4 MY23"
        },
        "SPORTAGE": {
            "QL MY18": "QL MY18",
            "KM MY10": "KM MY10",
            "KM": "KM",
            "QL MY17": "QL MY17",
            "QL MY19": "QL MY19",
            "SL MY12": "SL MY12",
            "SL MY13": "SL MY13",
            "SL SERIES 2 MY14": "SL SERIES 2 MY14",
            "SL SERIES 2 MY15": "SL SERIES 2 MY15",
            "QL": "QL",
            "SL SERIES 2": "SL SERIES 2",
            "SL": "SL",
            "MY01": "MY01",
            "QL MY16": "QL MY16",
            "QL MY20": "QL MY20",
            "QL MY21": "QL MY21",
            "QL PE MY21": "QL PE MY21",
            "NQ5 MY22": "NQ5 MY22",
            "NQ5 MY23": "NQ5 MY23",
            "NQ5 MY23 UPDATE": "NQ5 MY23 UPDATE"
        },
        "URUS": {
            "636 MY19": "636 MY19"
        },
        "G10": {
            "SV7C": "SV7C",
            "SV7A": "SV7A",
            "SV7C MY20": "SV7C MY20",
            "SV7A MY20": "SV7A MY20",
            "SV7C MY21": "SV7C MY21",
            "SV7A MY21": "SV7A MY21"
        },
        "T60": {
            "MY18": "MY18",
            "MY17": "MY17",
            "SKC8": "SKC8",
            "SK8C": "SK8C",
            "SKC8 MY20": "SKC8 MY20",
            "SKC8 MY21": "SKC8 MY21",
            "SKC8 MY22": "SKC8 MY22",
            "SKC8 MY23": "SKC8 MY23"
        },
        "V80": {
            "K1": "K1",
            "K1 MY17": "K1 MY17",
            "K1 MY19": "K1 MY19",
            "K1 MY20": "K1 MY20",
            "K1 MY21": "K1 MY21"
        },
        "LX570": {
            "URJ201R MY12": "URJ201R MY12",
            "URJ201R FACELIFT": "URJ201R FACELIFT",
            "URJ201R": "URJ201R",
            "URJ201R MY10": "URJ201R MY10"
        },
        "LX450d": {
            "VDJ201R": "VDJ201R"
        },
        "NX300": {
            "AGZ15R MY17": "AGZ15R MY17",
            "AGZ10R MY17": "AGZ10R MY17",
            "AGZ15R": "AGZ15R",
            "AGZ10R": "AGZ10R"
        },
        "NX200t": {
            "AGZ15R": "AGZ15R",
            "AGZ10R": "AGZ10R"
        },
        "NX300h": {
            "AYZ10R MY17 FACELIF": "AYZ10R MY17 FACELIF",
            "AYZ15R": "AYZ15R",
            "AYZ15R MY17 FACELIF": "AYZ15R MY17 FACELIF",
            "AYZ10R": "AYZ10R"
        },
        "RX200t": {
            "AGL20R MY17": "AGL20R MY17",
            "AGL20R": "AGL20R"
        },
        "RX270": {
            "AGL10R MY12": "AGL10R MY12",
            "AGL10R MY15": "AGL10R MY15",
            "AGL10R": "AGL10R"
        },
        "RX350": {
            "GGL25R": "GGL25R",
            "GGL15R MY12": "GGL15R MY12",
            "GGL15R MY15": "GGL15R MY15",
            "GGL25R MY17": "GGL25R MY17",
            "GGL25R MY18": "GGL25R MY18",
            "GGL15R 11 UPGRADE": "GGL15R 11 UPGRADE",
            "GGL15R": "GGL15R",
            "GSU35R 07 UPGRADE": "GSU35R 07 UPGRADE",
            "GSU35R": "GSU35R",
            "GSU35R 06 UPGRADE": "GSU35R 06 UPGRADE",
            "TALA15R": "TALA15R"
        },
        "RX350L": {
            "GGL25R MY18": "GGL25R MY18",
            "GGL26R MY18": "GGL26R MY18",
            "GGL26R": "GGL26R"
        },
        "RX450hL": {
            "GYL25R MY18": "GYL25R MY18",
            "GYL26R MY18": "GYL26R MY18",
            "GYL26R": "GYL26R"
        },
        "RX400h": {
            "MHU38R": "MHU38R"
        },
        "RX450h": {
            "GYL25R": "GYL25R",
            "GYL25R MY17": "GYL25R MY17",
            "GYL25R MY18": "GYL25R MY18",
            "GYL15R MY12": "GYL15R MY12",
            "GGL15R MY15": "GGL15R MY15",
            "GYL15R 11 UPGRADE": "GYL15R 11 UPGRADE",
            "GYL15R": "GYL15R"
        },
        "RX300": {
            "AGL20R": "AGL20R",
            "AGL20R MY18": "AGL20R MY18"
        },
        "DEFENDER": {
            "MY09": "MY09",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY05": "MY05",
            "L663 MY20": "L663 MY20",
            "L663 MY20.5": "L663 MY20.5",
            "L663 MY21": "L663 MY21",
            "L663 MY22": "L663 MY22",
            "L663 MY23": "L663 MY23",
            "L663 MY23.5": "L663 MY23.5"
        },
        "DISCOVERY 3": {
            "MY09": "MY09",
            "MY06 UPGRADE": "MY06 UPGRADE",
            "MY08": "MY08"
        },
        "DISCOVERY 4": {
            "MY10": "MY10",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY13": "MY13"
        },
        "DISCOVERY": {
            "MY14": "MY14",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY18": "MY18",
            "MY17": "MY17",
            "LC MY16.5": "LC MY16.5",
            "SERIES II": "SERIES II",
            "L462 MY19": "L462 MY19",
            "L462 MY20": "L462 MY20",
            "L462 MY21": "L462 MY21",
            "L462 MY22": "L462 MY22",
            "L462 MY23": "L462 MY23",
            "L462 MY23.5": "L462 MY23.5"
        },
        "DISCOVERY SPORT": {
            "LC MY18": "LC MY18",
            "LC MY17": "LC MY17",
            "LC": "LC",
            "LC MY16": "LC MY16",
            "LC MY16.5": "LC MY16.5",
            "L550 MY19": "L550 MY19",
            "L550 MY20": "L550 MY20",
            "L550 MY20.5": "L550 MY20.5",
            "L550 MY18": "L550 MY18",
            "L550 MY21": "L550 MY21",
            "L550 MY22": "L550 MY22",
            "L550 MY23": "L550 MY23"
        },
        "FREELANDER 2": {
            "LF MY11": "LF MY11",
            "LF MY12": "LF MY12",
            "LF MY09": "LF MY09",
            "LF MY10": "LF MY10",
            "LF MY13": "LF MY13",
            "LF MY14": "LF MY14",
            "LF MY15": "LF MY15",
            "LF MY08": "LF MY08",
            "LF": "LF"
        },
        "PIK-UP": {
            "S5 09 UPGRADE": "S5 09 UPGRADE",
            "S5 11 UPGRADE": "S5 11 UPGRADE",
            "S5": "S5",
            "S6 MY18": "S6 MY18",
            "S10 MY18": "S10 MY18",
            "S6": "S6",
            "S10": "S10",
            "MY20": "MY20",
            "S10+ MY20": "S10+ MY20",
            "MY21": "MY21",
            "MY22.5": "MY22.5",
            "MY23": "MY23"
        },
        "XUV500": {
            "MY16": "MY16"
        },
        "LEVANTE": {
            "M161 MY17": "M161 MY17",
            "M161 MY18": "M161 MY18",
            "M161 MY19": "M161 MY19",
            "M161 MY19 UPDATE": "M161 MY19 UPDATE",
            "M161 MY20": "M161 MY20",
            "M161 MY21": "M161 MY21",
            "M161 MY22": "M161 MY22"
        },
        "BT-50": {
            "08 UPGRADE": "08 UPGRADE",
            "09 UPGRADE": "09 UPGRADE",
            "MY13": "MY13",
            "MY16": "MY16",
            "MY17 UPDATE": "MY17 UPDATE",
            "MY18": "MY18",
            "B30B": "B30B",
            "B30C": "B30C",
            "B19C": "B19C",
            "B30D": "B30D",
            "B19D": "B19D",
            "B30E": "B30E",
            "B19E": "B19E"
        },
        "CX-3": {
            "DK MY17.5": "DK MY17.5",
            "DK": "DK",
            "DK MY19": "DK MY19",
            "CX3E": "CX3E",
            "CX3F": "CX3F",
            "CX3G": "CX3G",
            "CX3H": "CX3H"
        },
        "CX-5": {
            "MY18 (KF SERIES 2)": "MY18 (KF SERIES 2)",
            "MY13": "MY13",
            "MY13 UPGRADE": "MY13 UPGRADE",
            "MY15": "MY15",
            "MY17": "MY17",
            "MY17.5 (KF SERIES 2": "MY17.5 (KF SERIES 2",
            "MY19 (KF SERIES 2)": "MY19 (KF SERIES 2)",
            "CX-5J": "CX-5J",
            "CX5J": "CX5J",
            "CX5K": "CX5K",
            "CX5L": "CX5L",
            "CX5M": "CX5M"
        },
        "CX-7": {
            "ER MY10": "ER MY10",
            "ER": "ER"
        },
        "CX-8": {
            "KG MY18": "KG MY18",
            "KG B": "KG B",
            "CX8C": "CX8C",
            "CX8D": "CX8D"
        },
        "CX-9": {
            "MY18": "MY18",
            "MY16": "MY16",
            "10 UPGRADE": "10 UPGRADE",
            "MY13": "MY13",
            "MY14": "MY14",
            "09 UPGRADE": "09 UPGRADE",
            "MY19": "MY19",
            "K": "K",
            "CX9L": "CX9L",
            "CX9M": "CX9M"
        },
        "G": {
            "463 MY16": "463 MY16",
            "463 MY17.5": "463 MY17.5",
            "463": "463",
            "463 MY13": "463 MY13",
            "463 MY15": "463 MY15",
            "MY17": "MY17",
            "MY17.5": "MY17.5",
            "464 MY19": "464 MY19",
            "463 MY18": "463 MY18",
            "463 MY17": "463 MY17",
            "464 MY20": "464 MY20",
            "463 MY20": "463 MY20",
            "463 MY21": "463 MY21",
            "W463 X20": "W463 X20",
            "W463 X21": "W463 X21"
        },
        "GLA": {
            "X156 MY16": "X156 MY16",
            "X156 MY17": "X156 MY17",
            "X156 MY17.5": "X156 MY17.5",
            "X156 MY18": "X156 MY18",
            "X156 MY18.5": "X156 MY18.5",
            "X156": "X156",
            "X156 MY15": "X156 MY15",
            "X156 MY19": "X156 MY19",
            "X156 MY20": "X156 MY20",
            "H247 MY21": "H247 MY21",
            "H247 MY21.5": "H247 MY21.5",
            "H247 MY22": "H247 MY22",
            "H247 MY22.5": "H247 MY22.5",
            "H247 MY23": "H247 MY23",
            "H247 MY23.5": "H247 MY23.5"
        },
        "GLC": {
            "253 MY17": "253 MY17",
            "253 MY17.5": "253 MY17.5",
            "253 MY18": "253 MY18",
            "253": "253",
            "253 MY19": "253 MY19",
            "X253 MY19.5": "X253 MY19.5",
            "X253 MY20": "X253 MY20",
            "C253 MY20": "C253 MY20",
            "X253 MY20.5": "X253 MY20.5",
            "X253 MY21": "X253 MY21",
            "C253 MY21": "C253 MY21",
            "C253 MY20.5": "C253 MY20.5",
            "X253 MY22": "X253 MY22",
            "C253 MY22": "C253 MY22",
            "C253 MY23": "C253 MY23",
            "C253 MY23.5": "C253 MY23.5"
        },
        "GLE": {
            "292 MY17.5": "292 MY17.5",
            "292 MY18": "292 MY18",
            "166 MY17.5": "166 MY17.5",
            "166 MY17": "166 MY17",
            "292 MY17": "292 MY17",
            "292": "292",
            "166": "166",
            "V167 MY19": "V167 MY19",
            "V167 MY20.5": "V167 MY20.5",
            "C167 MY21": "C167 MY21",
            "V167 MY21": "V167 MY21",
            "V167 MY21.5": "V167 MY21.5",
            "C167 MY21.5": "C167 MY21.5",
            "C167 MY22": "C167 MY22",
            "V167 MY22": "V167 MY22",
            "C167 MY22.5": "C167 MY22.5",
            "V167 MY22.5": "V167 MY22.5",
            "C167 MY23": "C167 MY23",
            "V167 MY23": "V167 MY23"
        },
        "GLS": {
            "X166": "X166",
            "X166 MY17": "X166 MY17",
            "X166 MY18": "X166 MY18",
            "X167": "X167",
            "X167 MY20.5": "X167 MY20.5",
            "X167 MY21.5": "X167 MY21.5",
            "X167 MY21": "X167 MY21",
            "X167 MY22": "X167 MY22",
            "X167 MY22.5": "X167 MY22.5",
            "X167 MY23": "X167 MY23"
        },
        "GL": {
            "164": "164",
            "164 MY10": "164 MY10",
            "164 MY11": "164 MY11",
            "X166": "X166",
            "X166 MY14": "X166 MY14",
            "X166 MY15": "X166 MY15"
        },
        "ML": {
            "W164 09 UPGRADE": "W164 09 UPGRADE",
            "164 MY11": "164 MY11",
            "W164 08 UPGRADE": "W164 08 UPGRADE",
            "166 MY14": "166 MY14",
            "166 MY15": "166 MY15",
            "166": "166",
            "W163": "W163",
            "W164 07 UPGRADE": "W164 07 UPGRADE",
            "W164": "W164"
        },
        "R": {
            "251 MY08": "251 MY08",
            "251 MY11": "251 MY11",
            "251 MY10 UPGRADE": "251 MY10 UPGRADE",
            "251 MY10": "251 MY10",
            "251 MY12": "251 MY12",
            "251": "251"
        },
        "VITO": {
            "MY11": "MY11",
            "MY13": "MY13",
            "MY14": "MY14",
            "447": "447",
            "MY08": "MY08",
            "MY09": "MY09",
            "MY10": "MY10",
            "639 MY07": "639 MY07",
            "447 MY20": "447 MY20",
            "447 MY21": "447 MY21",
            "447 MY22": "447 MY22"
        },
        "X": {
            "470": "470"
        },
        "GS": {
            "UPDATE": "UPDATE",
            "MY17.5": "MY17.5",
            "MY18": "MY18"
        },
        "ZS": {
            "MY17": "MY17",
            "MY19": "MY19",
            "MY20": "MY20",
            "AZS1 MY20": "AZS1 MY20",
            "AZS1 MY21": "AZS1 MY21",
            "AZS1 MY22": "AZS1 MY22"
        },
        "COUNTRYMAN": {
            "F60 MY17": "F60 MY17",
            "F60 MY18": "F60 MY18",
            "F60 MY19": "F60 MY19",
            "F60 UPDATE": "F60 UPDATE",
            "F60": "F60"
        },
        "COOPER": {
            "R60 MY15": "R60 MY15",
            "R60 MY12": "R60 MY12",
            "R60": "R60",
            "R60 MY13": "R60 MY13",
            "R60 MY14": "R60 MY14",
            "R50": "R50",
            "R56": "R56",
            "R53": "R53",
            "R53 UPGRADE": "R53 UPGRADE",
            "R53 UPGRADE II": "R53 UPGRADE II",
            "R52": "R52",
            "R55": "R55",
            "R56 MY12": "R56 MY12",
            "R56 MY13": "R56 MY13",
            "F55": "F55",
            "F56": "F56",
            "R58": "R58",
            "R59": "R59",
            "R56 MY11": "R56 MY11",
            "R58 MY13": "R58 MY13",
            "R58 MY14": "R58 MY14",
            "R59 MY13": "R59 MY13",
            "R59 MY14": "R59 MY14",
            "F57": "F57",
            "R57 MY12": "R57 MY12",
            "R57 MY13": "R57 MY13",
            "R57 MY14": "R57 MY14",
            "R57 MY11": "R57 MY11",
            "R57": "R57",
            "R55 MY12": "R55 MY12",
            "R55 MY11": "R55 MY11",
            "F54": "F54",
            "R55 MY13": "R55 MY13",
            "R55 MY14": "R55 MY14",
            "R61": "R61",
            "R61 MY15": "R61 MY15",
            "R61 MY14": "R61 MY14"
        },
        "ASX": {
            "XA MY12": "XA MY12",
            "XB MY13": "XB MY13",
            "XB MY14": "XB MY14",
            "XA": "XA",
            "XB MY15": "XB MY15",
            "XC MY17": "XC MY17",
            "XC MY18": "XC MY18",
            "XB MY15.5": "XB MY15.5",
            "XC MY19": "XC MY19",
            "XD MY20": "XD MY20",
            "XD MY21": "XD MY21",
            "XD MY22": "XD MY22",
            "XD MY23": "XD MY23"
        },
        "CHALLENGER": {
            "PB MY11": "PB MY11",
            "PB MY12": "PB MY12",
            "PB MY13": "PB MY13",
            "PC MY14": "PC MY14",
            "PB": "PB",
            "PA": "PA",
            "PA-MY01": "PA-MY01",
            "PA-MY03": "PA-MY03",
            "PA-MY04": "PA-MY04",
            "PA-MY05": "PA-MY05",
            "PA-MY06": "PA-MY06",
            "PA MY03": "PA MY03"
        },
        "ECLIPSE CROSS": {
            "YA": "YA",
            "YA MY18": "YA MY18",
            "YA MY19": "YA MY19",
            "YA MY20": "YA MY20",
            "YB MY21": "YB MY21",
            "YB MY22": "YB MY22"
        },
        "EXPRESS": {
            "SJ MY12": "SJ MY12",
            "SJ MY09": "SJ MY09",
            "SJ MY10": "SJ MY10",
            "SJ MY11": "SJ MY11",
            "WA": "WA",
            "WA-MY05": "WA-MY05",
            "WA MY06": "WA MY06",
            "WA-MY04": "WA-MY04",
            "SF": "SF",
            "SG": "SG",
            "SH": "SH",
            "SJ": "SJ",
            "SJ00": "SJ00",
            "SJ-MY03": "SJ-MY03",
            "SJ-MY05": "SJ-MY05",
            "SJ MY06": "SJ MY06",
            "SJ MY07": "SJ MY07",
            "SJ MY04": "SJ MY04",
            "SJ (8V)": "SJ (8V)",
            "SJ-MY04": "SJ-MY04",
            "SN MY21": "SN MY21",
            "SN MY22": "SN MY22",
            "SM MY22": "SM MY22"
        },
        "OUTLANDER": {
            "ZG MY09": "ZG MY09",
            "ZH MY12": "ZH MY12",
            "ZH MY10": "ZH MY10",
            "ZH MY11": "ZH MY11",
            "ZJ MY14": "ZJ MY14",
            "ZJ MY14.5": "ZJ MY14.5",
            "ZJ": "ZJ",
            "ZK MY16": "ZK MY16",
            "ZK MY17": "ZK MY17",
            "ZK MY18": "ZK MY18",
            "ZL MY19": "ZL MY19",
            "ZL MY18.5": "ZL MY18.5",
            "ZG MY08": "ZG MY08",
            "ZF MY07": "ZF MY07",
            "ZF MY06": "ZF MY06",
            "ZE": "ZE",
            "ZF": "ZF",
            "ZG": "ZG",
            "ZL MY20": "ZL MY20",
            "ZL MY21": "ZL MY21",
            "ZM MY22": "ZM MY22",
            "ZM MY22.5": "ZM MY22.5",
            "ZM MY23": "ZM MY23"
        },
        "PAJERO": {
            "NS": "NS",
            "NT": "NT",
            "NT MY10": "NT MY10",
            "NW MY12": "NW MY12",
            "NW MY13": "NW MY13",
            "NW MY14": "NW MY14",
            "NX MY15": "NX MY15",
            "NX MY16": "NX MY16",
            "NX MY17": "NX MY17",
            "NX MY18": "NX MY18",
            "NT MY11": "NT MY11",
            "NT MY11 SERIES II": "NT MY11 SERIES II",
            "NA": "NA",
            "NB": "NB",
            "NC": "NC",
            "ND": "ND",
            "NE": "NE",
            "NF": "NF",
            "NG": "NG",
            "NM": "NM",
            "NP": "NP",
            "NP MY06": "NP MY06",
            "NH": "NH",
            "NJ": "NJ",
            "NK": "NK",
            "NL": "NL",
            "NP MY05": "NP MY05",
            "QA": "QA",
            "NX MY19": "NX MY19",
            "NX MY20": "NX MY20",
            "NX MY21": "NX MY21",
            "NX MY22": "NX MY22"
        },
        "PAJERO SPORT": {
            "QE": "QE",
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "QE MY19": "QE MY19",
            "QF MY20": "QF MY20",
            "QF MY21": "QF MY21",
            "QF MY22": "QF MY22",
            "QF MY23": "QF MY23"
        },
        "TRITON": {
            "MN MY11": "MN MY11",
            "MQ MY16": "MQ MY16",
            "MQ MY16 UPGRADE": "MQ MY16 UPGRADE",
            "MQ MY17": "MQ MY17",
            "MQ MY18": "MQ MY18",
            "MN MY12": "MN MY12",
            "MN MY13": "MN MY13",
            "MN MY14": "MN MY14",
            "MN MY14 UPDATE": "MN MY14 UPDATE",
            "MN MY15": "MN MY15",
            "ML MY09": "ML MY09",
            "MN MY10": "MN MY10",
            "MJ": "MJ",
            "ME": "ME",
            "MF": "MF",
            "MH": "MH",
            "MK": "MK",
            "MK MY03": "MK MY03",
            "MK MY04": "MK MY04",
            "MK MY05": "MK MY05",
            "MK MY06": "MK MY06",
            "ML MY08": "ML MY08",
            "ML": "ML",
            "MG": "MG",
            "MR MY19": "MR MY19",
            "MR MY20": "MR MY20",
            "MY20": "MY20",
            "MR MY21": "MR MY21",
            "MR MY22": "MR MY22",
            "MR MY22.5": "MR MY22.5",
            "MR MY23": "MR MY23"
        },
        "DUALIS": {
            "J10 MY13": "J10 MY13",
            "J10 SERIES 3": "J10 SERIES 3",
            "J10 SERIES II": "J10 SERIES II",
            "J10 MY10": "J10 MY10",
            "J10": "J10"
        },
        "JUKE": {
            "F15 SERIES 2": "F15 SERIES 2",
            "F15": "F15",
            "F15 MY18": "F15 MY18",
            "F16": "F16",
            "F16 MY21": "F16 MY21",
            "F16 MY23": "F16 MY23"
        },
        "MURANO": {
            "Z51 MY10": "Z51 MY10",
            "Z51 MY12": "Z51 MY12",
            "Z51 MY14": "Z51 MY14",
            "Z51": "Z51",
            "Z50": "Z50"
        },
        "NAVARA": {
            "D40 MY12": "D40 MY12",
            "NP300 D23": "NP300 D23",
            "D23 SERIES II": "D23 SERIES II",
            "D22 SERIES 5": "D22 SERIES 5",
            "D22 MY08": "D22 MY08",
            "D23 SERIES III MY18": "D23 SERIES III MY18",
            "D40 MY11": "D40 MY11",
            "D40 MY13": "D40 MY13",
            "D40": "D40",
            "D40 MY12 UPGRADE": "D40 MY12 UPGRADE",
            "D23": "D23",
            "D40 SERIES 4": "D40 SERIES 4",
            "D22": "D22",
            "D22 SERIES 2": "D22 SERIES 2",
            "SGD21": "SGD21",
            "HGD21": "HGD21",
            "KA24E": "KA24E",
            "VG30E": "VG30E",
            "SMD21": "SMD21",
            "D23 SERIES 4 MY19": "D23 SERIES 4 MY19",
            "D23 SERIES 4 MY20": "D23 SERIES 4 MY20",
            "D23 MY21": "D23 MY21",
            "D23 MY21.5": "D23 MY21.5",
            "D23 MY22": "D23 MY22",
            "D23 MY22.5": "D23 MY22.5",
            "D23 MY22.6": "D23 MY22.6",
            "D23 MY23": "D23 MY23"
        },
        "PATROL": {
            "GU SERIES 10": "GU SERIES 10",
            "MY11 UPGRADE": "MY11 UPGRADE",
            "MY14": "MY14",
            "GU VI": "GU VI",
            "GU VII": "GU VII",
            "GU VIII": "GU VIII",
            "GU SERIES 9": "GU SERIES 9",
            "GU MY08": "GU MY08",
            "Y62 SERIES 2": "Y62 SERIES 2",
            "Y62 SERIES 3": "Y62 SERIES 3",
            "Y62 SERIES 3 UPDATE": "Y62 SERIES 3 UPDATE",
            "Y62 SERIES 4 MY18": "Y62 SERIES 4 MY18",
            "Y62": "Y62",
            "GU": "GU",
            "GQ": "GQ",
            "GU IV MY07": "GU IV MY07",
            "GU II": "GU II",
            "GU III": "GU III",
            "GU IV": "GU IV",
            "GU IV MY06": "GU IV MY06",
            "Y62 SERIES 5 MY20": "Y62 SERIES 5 MY20",
            "Y62 SERIES 5 MY21": "Y62 SERIES 5 MY21",
            "Y62 SERIES 5 MY22": "Y62 SERIES 5 MY22"
        },
        "PATHFINDER": {
            "R51 SERIES4": "R51 SERIES4",
            "R52 MY15": "R52 MY15",
            "R52 MY15 UPGRADE": "R52 MY15 UPGRADE",
            "R52 MY17 SERIES 2": "R52 MY17 SERIES 2",
            "R52": "R52",
            "R51 08 UPGRADE": "R51 08 UPGRADE",
            "R51 SERIES 4": "R51 SERIES 4",
            "R51 MY07": "R51 MY07",
            "R51": "R51",
            "WNYD21": "WNYD21",
            "VG33E": "VG33E",
            "MY03": "MY03",
            "MY19": "MY19",
            "R52 MY19": "R52 MY19",
            "R52 MY19 SERIES III": "R52 MY19 SERIES III",
            "R53 MY22": "R53 MY22"
        },
        "QASHQAI": {
            "J11 MY18": "J11 MY18",
            "J11": "J11",
            "MY20": "MY20",
            "J12 MY23": "J12 MY23"
        },
        "X-TRAIL": {
            "T32 SERIES 2": "T32 SERIES 2",
            "T31": "T31",
            "T31 SERIES 5": "T31 SERIES 5",
            "T32": "T32",
            "T31 MY11": "T31 MY11",
            "T31 MY 10": "T31 MY 10",
            "T31 MY10": "T31 MY10",
            "T30 MY06": "T30 MY06",
            "T30": "T30",
            "T30 MY04": "T30 MY04",
            "T32 SERIES 2 MY20": "T32 SERIES 2 MY20",
            "T32 MY20": "T32 MY20",
            "T32 MY21": "T32 MY21",
            "T32 MY22": "T32 MY22",
            "T33 MY23": "T33 MY23"
        },
        "2008": {
            "MY17": "MY17",
            "MY18": "MY18",
            "MY17 UPDATE": "MY17 UPDATE",
            "MY18.5": "MY18.5",
            "P24 MY21": "P24 MY21",
            "P24 MY22": "P24 MY22"
        },
        "3008": {
            "P84": "P84",
            "P84 MY18": "P84 MY18",
            "P84 MY18.5": "P84 MY18.5",
            "MY18": "MY18",
            "MY12": "MY12",
            "MY15": "MY15",
            "MY11": "MY11",
            "P84 MY19": "P84 MY19",
            "P84 MY20": "P84 MY20",
            "P84 MY21": "P84 MY21",
            "P84 MY22": "P84 MY22"
        },
        "4008": {
            "MY14 UPGRADE": "MY14 UPGRADE",
            "MY15": "MY15",
            "MY17": "MY17"
        },
        "5008": {
            "P87 MY18": "P87 MY18",
            "P87 MY18.5": "P87 MY18.5",
            "P87 MY19": "P87 MY19",
            "P87 MY20": "P87 MY20",
            "P87 MY21": "P87 MY21",
            "P87 MY22": "P87 MY22"
        },
        "EXPERT": {
            "G9P MY13": "G9P MY13",
            "G9P": "G9P",
            "MY19": "MY19",
            "K0 MY20": "K0 MY20",
            "K0 MY22": "K0 MY22"
        },
        "PARTNER": {
            "B9P UPDATE": "B9P UPDATE",
            "B9P": "B9P",
            "K9 MY19": "K9 MY19",
            "KP MY20": "KP MY20",
            "K9 MY21": "K9 MY21",
            "K9 MY22": "K9 MY22"
        },
        "CAYENNE": {
            "SERIES 2": "SERIES 2",
            "MY08": "MY08",
            "MY09": "MY09",
            "MY10": "MY10",
            "SERIES 2 MY12": "SERIES 2 MY12",
            "SERIES 2 MY13": "SERIES 2 MY13",
            "SERIES 2 MY14": "SERIES 2 MY14",
            "SERIES 2 MY15": "SERIES 2 MY15",
            "SERIES 2 MY16": "SERIES 2 MY16",
            "SERIES 2 MY17": "SERIES 2 MY17",
            "92A MY18": "92A MY18",
            "PO536 MY19": "PO536 MY19",
            "MY07": "MY07",
            "92A MY19": "92A MY19",
            "9YA MY19": "9YA MY19",
            "9YA MY20": "9YA MY20",
            "9YB MY20": "9YB MY20",
            "9YA MY21": "9YA MY21",
            "9YB MY21": "9YB MY21",
            "9Y MY21": "9Y MY21",
            "9YB MY22": "9YB MY22",
            "9YA MY22": "9YA MY22",
            "9YA MY23": "9YA MY23",
            "9YB MY23": "9YB MY23"
        },
        "MACAN": {
            "MY18": "MY18",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY17": "MY17",
            "95B MY18": "95B MY18",
            "95B MY19": "95B MY19",
            "95B MY20": "95B MY20",
            "95B MY21": "95B MY21",
            "95B MY22": "95B MY22",
            "95B MY23": "95B MY23"
        },
        "EVOQUE": {
            "LV MY16": "LV MY16",
            "LV MY17": "LV MY17",
            "LV MY16.5": "LV MY16.5",
            "LV MY18": "LV MY18",
            "LV MY13": "LV MY13",
            "LV MY14": "LV MY14",
            "LV MY15": "LV MY15",
            "LV": "LV",
            "L538 MY19": "L538 MY19"
        },
        "RANGE ROVER": {
            "MY11": "MY11",
            "LW MY16.5": "LW MY16.5",
            "LW MY16": "LW MY16",
            "LW MY15": "LW MY15",
            "LW MY15.5": "LW MY15.5",
            "LW MY17": "LW MY17",
            "LW": "LW",
            "MY10": "MY10",
            "MY12": "MY12",
            "MY13.5": "MY13.5",
            "LW MY18": "LW MY18",
            "LG MY15": "LG MY15",
            "LG MY15.5": "LG MY15.5",
            "LG MY16": "LG MY16",
            "LG MY16.5": "LG MY16.5",
            "LG MY17": "LG MY17",
            "LG MY14.5": "LG MY14.5",
            "LG": "LG",
            "MY09": "MY09",
            "LG MY18": "LG MY18",
            "MY08": "MY08",
            "MY07": "MY07",
            "L494 MY19": "L494 MY19",
            "L405 MY19": "L405 MY19",
            "LW MY19": "LW MY19",
            "LG MY19": "LG MY19",
            "L494 MY19.5": "L494 MY19.5",
            "L460 MY22": "L460 MY22",
            "L460 MY23": "L460 MY23"
        },
        "VELAR": {
            "MY18": "MY18",
            "L560 MY19": "L560 MY19",
            "L560 MY19.5": "L560 MY19.5"
        },
        "1500": {
            "MY18": "MY18",
            "MY19": "MY19",
            "MY20": "MY20",
            "DT MY21": "DT MY21",
            "DS MY21": "DS MY21",
            "DT MY22": "DT MY22",
            "DS MY22": "DS MY22"
        },
        "CAPTUR": {
            "J87": "J87",
            "J87 MY18": "J87 MY18",
            "J87 MY19": "J87 MY19",
            "XJB MY21": "XJB MY21",
            "XJB MY22": "XJB MY22"
        },
        "KANGOO": {
            "X61 MY17": "X61 MY17",
            "X61 MY17 UPDATE": "X61 MY17 UPDATE",
            "X61": "X61",
            "X61 MY14": "X61 MY14",
            "X76": "X76",
            "X61 MY18": "X61 MY18",
            "UPDATE": "UPDATE",
            "X61 MY19": "X61 MY19",
            "X61 MY20": "X61 MY20",
            "X61 MY21": "X61 MY21"
        },
        "KOLEOS": {
            "H45 PHASE III": "H45 PHASE III",
            "H45 MY15": "H45 MY15",
            "H45 PHASE II": "H45 PHASE II",
            "H45 MY10": "H45 MY10",
            "H45": "H45",
            "XZG MY17 UPDATE": "XZG MY17 UPDATE",
            "XZG MY18": "XZG MY18",
            "XZG MY18 UPDATE": "XZG MY18 UPDATE",
            "HZG MY17": "HZG MY17",
            "HZG MY18": "HZG MY18",
            "HZG MY18 UPDATE": "HZG MY18 UPDATE",
            "XZG": "XZG",
            "XZG MY19": "XZG MY19",
            "XZG MY20": "XZG MY20",
            "XZG MY21": "XZG MY21",
            "XZG MY22": "XZG MY22",
            "XZG MY23": "XZG MY23"
        },
        "TRAFIC": {
            "L2H1 MY11": "L2H1 MY11",
            "L2H1": "L2H1",
            "L1H1 MY11": "L1H1 MY11",
            "L1H1": "L1H1",
            "X82 MY17": "X82 MY17",
            "X82 MY17 UPDATE": "X82 MY17 UPDATE",
            "X82 MY18": "X82 MY18",
            "X82": "X82",
            "X82 MY19": "X82 MY19",
            "X82 MY20": "X82 MY20",
            "X82 MY21": "X82 MY21",
            "X82 MY22": "X82 MY22",
            "X82 MY23": "X82 MY23"
        },
        "YETI": {
            "5L MY13": "5L MY13",
            "5L": "5L",
            "NH MY15": "NH MY15",
            "5L MY16": "5L MY16",
            "5L MY17": "5L MY17",
            "5L MY14": "5L MY14",
            "5L MY15": "5L MY15"
        },
        "KAROQ": {
            "NU MY18": "NU MY18",
            "NU MY19": "NU MY19",
            "NU MY20": "NU MY20",
            "NU MY21": "NU MY21",
            "NU MY22": "NU MY22",
            "NU MY22 FACELIFT": "NU MY22 FACELIFT",
            "NU MY23": "NU MY23",
            "NU MY23.5": "NU MY23.5"
        },
        "KODIAQ": {
            "NS MY18": "NS MY18",
            "NS MY18.5": "NS MY18.5",
            "NS": "NS",
            "NS MY19": "NS MY19",
            "NS MY20": "NS MY20",
            "NS MY21": "NS MY21",
            "NS MY22": "NS MY22",
            "NS MY22 UPDATE": "NS MY22 UPDATE",
            "NS MY23": "NS MY23",
            "NS MY23.5": "NS MY23.5"
        },
        "OCTAVIA": {
            "1Z MY10": "1Z MY10",
            "1Z MY11": "1Z MY11",
            "1Z MY12": "1Z MY12",
            "NE MY15": "NE MY15",
            "NE MY16": "NE MY16",
            "NE MY17": "NE MY17",
            "1Z": "1Z",
            "NE MY18": "NE MY18",
            "NE MY18.5": "NE MY18.5",
            "1Z MY09": "1Z MY09",
            "NE": "NE",
            "1Z MY13": "1Z MY13",
            "NE MY19": "NE MY19",
            "NE MY20": "NE MY20",
            "NX MY21": "NX MY21",
            "NX MY22": "NX MY22",
            "NX MY22 UPDATE": "NX MY22 UPDATE",
            "NX MY23": "NX MY23",
            "NX MY23.5": "NX MY23.5"
        },
        "ACTYON SPORTS": {
            "Q100 MY08": "Q100 MY08",
            "Q100 MY12": "Q100 MY12",
            "Q100": "Q100"
        },
        "ACTYON": {
            "C100": "C100"
        },
        "KORANDO": {
            "C200 MY13": "C200 MY13",
            "C200 MY14": "C200 MY14",
            "C200 MY15": "C200 MY15",
            "C200": "C200",
            "C300 MY20": "C300 MY20",
            "C300 MY21": "C300 MY21",
            "C300 MY22": "C300 MY22",
            "C300 MY23": "C300 MY23"
        },
        "KYRON": {
            "D100 MY08 UPGRADE": "D100 MY08 UPGRADE",
            "D100 MY09": "D100 MY09",
            "D100": "D100",
            "D100 MY08": "D100 MY08"
        },
        "REXTON": {
            "Y200 MY15": "Y200 MY15",
            "Y200 MY07": "Y200 MY07",
            "Y200 MY07 UPGRADE": "Y200 MY07 UPGRADE",
            "Y200": "Y200",
            "Y400 MY19": "Y400 MY19",
            "Y400 MY20": "Y400 MY20",
            "Y450 MY21": "Y450 MY21",
            "Y450 MY22": "Y450 MY22",
            "Y450 MY23": "Y450 MY23"
        },
        "REXTON II": {
            "Y200 MY08": "Y200 MY08",
            "Y200 MY10 UPGRADE": "Y200 MY10 UPGRADE"
        },
        "FORESTER": {
            "MY09": "MY09",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY03": "MY03",
            "MY04": "MY04",
            "MY05": "MY05",
            "MY06": "MY06",
            "MY07": "MY07",
            "MY08": "MY08",
            "MY01": "MY01",
            "MY02": "MY02",
            "MY00": "MY00",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22",
            "MY23": "MY23"
        },
        "OUTBACK": {
            "MY10": "MY10",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY09": "MY09",
            "MY99": "MY99",
            "MY00": "MY00",
            "MY01": "MY01",
            "MY02": "MY02",
            "MY03": "MY03",
            "MY04": "MY04",
            "MY05": "MY05",
            "MY06": "MY06",
            "MY07": "MY07",
            "MY08": "MY08",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22",
            "MY23": "MY23"
        },
        "TRIBECA": {
            "MY09": "MY09",
            "MY11": "MY11",
            "MY10": "MY10",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY07": "MY07",
            "MY08": "MY08"
        },
        "XV": {
            "MY14": "MY14",
            "MY13": "MY13",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "APV": {
            "GD MY06 UPGRADE": "GD MY06 UPGRADE",
            "GD": "GD"
        },
        "GRAND VITARA": {
            "JT MY13": "JT MY13",
            "JT MY08 UPGRADE": "JT MY08 UPGRADE",
            "JT MY15": "JT MY15",
            "JT MY14": "JT MY14",
            "JT MY09": "JT MY09",
            "JT": "JT",
            "JT MY07 UPGRADE": "JT MY07 UPGRADE",
            "JB MY13": "JB MY13",
            "JB MY15": "JB MY15",
            "JB MY14": "JB MY14",
            "JB MY07 UPGRADE": "JB MY07 UPGRADE",
            "JB MY08 UPGRADE": "JB MY08 UPGRADE",
            "JB": "JB",
            "JB MY09": "JB MY09"
        },
        "IGNIS": {
            "MF": "MF",
            "MF SERIES II": "MF SERIES II",
            "MF SERIES II MY22": "MF SERIES II MY22"
        },
        "JIMNY": {
            "MY15": "MY15",
            "UPGRADE": "UPGRADE",
            "GJ": "GJ",
            "MY22": "MY22",
            "GJ MY22": "GJ MY22"
        },
        "S-CROSS": {
            "JY": "JY",
            "MY16": "MY16",
            "MY22": "MY22"
        },
        "VITARA": {
            "LY": "LY",
            "LY MY16": "LY MY16",
            "LIMITED EDITION": "LIMITED EDITION",
            "SERIES II": "SERIES II",
            "LY SERIES II MY22": "LY SERIES II MY22"
        },
        "XENON": {
            "MY15": "MY15",
            "MY17": "MY17"
        },
        "MODEL X": {
            "MY17": "MY17",
            "MY18": "MY18",
            "MY19": "MY19",
            "MY19 UPDATE": "MY19 UPDATE",
            "MY20": "MY20",
            "MY21": "MY21"
        },
        "C-HR": {
            "NGX10R UPDATE": "NGX10R UPDATE",
            "NGX10R": "NGX10R",
            "NGX50R UPDATE": "NGX50R UPDATE",
            "NGX50R": "NGX50R",
            "ZYX10R": "ZYX10R"
        },
        "FJ CRUISER": {
            "GSJ15R MY13 UPDATE": "GSJ15R MY13 UPDATE",
            "GSJ15R MY14": "GSJ15R MY14",
            "GSJ15R": "GSJ15R"
        },
        "FORTUNER": {
            "GUN156R": "GUN156R",
            "GUN156R MY18": "GUN156R MY18",
            "GUN156R MY19": "GUN156R MY19"
        },
        "HIACE": {
            "KDH223R MY16": "KDH223R MY16",
            "TRH223R MY12 UPGRAD": "TRH223R MY12 UPGRAD",
            "KDH223R MY14": "KDH223R MY14",
            "KDH223R MY12 UPGRAD": "KDH223R MY12 UPGRAD",
            "KDH223R MY15": "KDH223R MY15",
            "KDH223R MY11 UPGRAD": "KDH223R MY11 UPGRAD",
            "KDH223R MY07 UPGRAD": "KDH223R MY07 UPGRAD",
            "TRH223R MY14": "TRH223R MY14",
            "TRH223R MY15": "TRH223R MY15",
            "TRH223R MY16": "TRH223R MY16",
            "TRH223R MY11 UPGRAD": "TRH223R MY11 UPGRAD",
            "TRH223R MY07 UPGRAD": "TRH223R MY07 UPGRAD",
            "KDH201R MY15": "KDH201R MY15",
            "KDH201R MY16": "KDH201R MY16",
            "KDH201R MY12 UPGRAD": "KDH201R MY12 UPGRAD",
            "KDH201R MY14": "KDH201R MY14",
            "TRH201R MY12 UPGRAD": "TRH201R MY12 UPGRAD",
            "KDH201R MY11 UPGRAD": "KDH201R MY11 UPGRAD",
            "KDH201R MY07 UPGRAD": "KDH201R MY07 UPGRAD",
            "TRH201R MY14": "TRH201R MY14",
            "TRH201R MY15": "TRH201R MY15",
            "TRH201R MY16": "TRH201R MY16",
            "TRH201R MY11 UPGRAD": "TRH201R MY11 UPGRAD",
            "TRH201R MY07 UPGRAD": "TRH201R MY07 UPGRAD",
            "KDH221R MY12 UPGRAD": "KDH221R MY12 UPGRAD",
            "KDH221R MY14": "KDH221R MY14",
            "TRH221R MY12 UPGRAD": "TRH221R MY12 UPGRAD",
            "KDH221R MY15": "KDH221R MY15",
            "KDH221R MY16": "KDH221R MY16",
            "KDH221R MY11 UPGRAD": "KDH221R MY11 UPGRAD",
            "KDH221R MY07 UPGRAD": "KDH221R MY07 UPGRAD",
            "TRH221R MY14": "TRH221R MY14",
            "TRH221R MY15": "TRH221R MY15",
            "TRH221R MY16": "TRH221R MY16",
            "TRH221R MY11 UPGRAD": "TRH221R MY11 UPGRAD",
            "TRH221R MY07 UPGRAD": "TRH221R MY07 UPGRAD",
            "RH11": "RH11",
            "RZH103R": "RZH103R",
            "YH50": "YH50",
            "YH51": "YH51",
            "YH61": "YH61",
            "YH63": "YH63",
            "LH61": "LH61",
            "LH51": "LH51",
            "YH53": "YH53",
            "LH113R": "LH113R",
            "RZH113R": "RZH113R",
            "LH103R": "LH103R",
            "LH162R": "LH162R",
            "LH172R": "LH172R",
            "RZH125R": "RZH125R",
            "LH125R": "LH125R",
            "RZH125": "RZH125",
            "YH73": "YH73",
            "YH71": "YH71",
            "KDH222R": "KDH222R",
            "TRH223R": "TRH223R",
            "TRH223R MY07": "TRH223R MY07",
            "KDH223R MY07": "KDH223R MY07",
            "LH184R": "LH184R",
            "KDH200R": "KDH200R",
            "TRH201R": "TRH201R",
            "TRH201R MY07": "TRH201R MY07",
            "KDH201R MY07": "KDH201R MY07",
            "RCH12R": "RCH12R",
            "RCH22R": "RCH22R",
            "KDH220R": "KDH220R",
            "TRH221R": "TRH221R",
            "TRH221R MY07": "TRH221R MY07",
            "KDH221R MY07": "KDH221R MY07",
            "GDH322R": "GDH322R",
            "GDH300R": "GDH300R",
            "GRH300R": "GRH300R",
            "GDH320R": "GDH320R",
            "GRH320R": "GRH320R"
        },
        "HILUX": {
            "GUN126R MY17": "GUN126R MY17",
            "GUN126R MY19": "GUN126R MY19",
            "GUN126R": "GUN126R",
            "GGN125R": "GGN125R",
            "GGN25R MY12": "GGN25R MY12",
            "GGN25R 08 UPGRADE": "GGN25R 08 UPGRADE",
            "GGN25R 09 UPGRADE": "GGN25R 09 UPGRADE",
            "GGN25R MY11 UPGRADE": "GGN25R MY11 UPGRADE",
            "KUN26R MY12": "KUN26R MY12",
            "KUN26R MY14": "KUN26R MY14",
            "KUN26R 08 UPGRADE": "KUN26R 08 UPGRADE",
            "KUN26R 09 UPGRADE": "KUN26R 09 UPGRADE",
            "KUN26R MY11 UPGRADE": "KUN26R MY11 UPGRADE",
            "GUN123R": "GUN123R",
            "GGN120R": "GGN120R",
            "GGN15R MY12": "GGN15R MY12",
            "GGN15R MY14": "GGN15R MY14",
            "GGN15R 08 UPGRADE": "GGN15R 08 UPGRADE",
            "GGN15R 09 UPGRADE": "GGN15R 09 UPGRADE",
            "GGN15R MY11 UPGRADE": "GGN15R MY11 UPGRADE",
            "KUN16R MY12": "KUN16R MY12",
            "KUN16R MY14": "KUN16R MY14",
            "KUN16R 08 UPGRADE": "KUN16R 08 UPGRADE",
            "KUN16R 09 UPGRADE": "KUN16R 09 UPGRADE",
            "KUN16R MY11 UPGRADE": "KUN16R MY11 UPGRADE",
            "GGN25R MY14": "GGN25R MY14",
            "GUN136R": "GUN136R",
            "GUN136R MY17": "GUN136R MY17",
            "GUN125R": "GUN125R",
            "GUN125R MY17": "GUN125R MY17",
            "GUN125R MY19": "GUN125R MY19",
            "GUN135R MY17": "GUN135R MY17",
            "TGN121R": "TGN121R",
            "GUN122R": "GUN122R",
            "GUN122R MY17": "GUN122R MY17",
            "TGN121R MY17": "TGN121R MY17",
            "TGN16R MY12": "TGN16R MY12",
            "TGN16R MY14": "TGN16R MY14",
            "TGN16R 08 UPGRADE": "TGN16R 08 UPGRADE",
            "TGN16R 09 UPGRADE": "TGN16R 09 UPGRADE",
            "TGN16R MY11 UPGRADE": "TGN16R MY11 UPGRADE",
            "YN55": "YN55",
            "RZN154R": "RZN154R",
            "YN56": "YN56",
            "LN55": "LN55",
            "YN57": "YN57",
            "YN58": "YN58",
            "YN85R": "YN85R",
            "LN56": "LN56",
            "LN85": "LN85",
            "LN86R": "LN86R",
            "RN85R": "RN85R",
            "LN147R": "LN147R",
            "RZN149R": "RZN149R",
            "LN172R": "LN172R",
            "LN65": "LN65",
            "YN65": "YN65",
            "RZN174R": "RZN174R",
            "YN67": "YN67",
            "RZN169R": "RZN169R",
            "LN167R": "LN167R",
            "LN111R": "LN111R",
            "LN106R": "LN106R",
            "RN105R": "RN105R",
            "RN110R": "RN110R",
            "KZN165R": "KZN165R",
            "VZN172R": "VZN172R",
            "VZN167R": "VZN167R",
            "GGN25R": "GGN25R",
            "KUN26R": "KUN26R",
            "GGN25R 06 UPGRADE": "GGN25R 06 UPGRADE",
            "GGN25R 07 UPGRADE": "GGN25R 07 UPGRADE",
            "KUN26R 06 UPGRADE": "KUN26R 06 UPGRADE",
            "KUN26R 07 UPGRADE": "KUN26R 07 UPGRADE",
            "GGN15R": "GGN15R",
            "KUN16R": "KUN16R",
            "GGN15R 06 UPGRADE": "GGN15R 06 UPGRADE",
            "GGN15R 07 UPGRADE": "GGN15R 07 UPGRADE",
            "KUN16R 06 UPGRADE": "KUN16R 06 UPGRADE",
            "KUN16R 07 UPGRADE": "KUN16R 07 UPGRADE",
            "RN90R": "RN90R",
            "LN107R": "LN107R",
            "RN106R": "RN106R",
            "RZN147R": "RZN147R",
            "TGN16R": "TGN16R",
            "TGN16R 06 UPGRADE": "TGN16R 06 UPGRADE",
            "TGN16R 07 UPGRADE": "TGN16R 07 UPGRADE",
            "GUN136R MY19": "GUN136R MY19",
            "GUN135R MY19": "GUN135R MY19",
            "TGN121R MY19": "TGN121R MY19",
            "GUN122R MY19": "GUN122R MY19",
            "GUN126R MY19 UPGRAD": "GUN126R MY19 UPGRAD",
            "GUN136R MY19 UPGRAD": "GUN136R MY19 UPGRAD",
            "GUN125R MY19 UPGRAD": "GUN125R MY19 UPGRAD",
            "GUN135R MY19 UPGRAD": "GUN135R MY19 UPGRAD",
            "TGN121R MY19 UPGRAD": "TGN121R MY19 UPGRAD",
            "GUN126R FACELIFT": "GUN126R FACELIFT",
            "GUN136R FACELIFT": "GUN136R FACELIFT",
            "GUN125R FACELIFT": "GUN125R FACELIFT",
            "GUN135R FACELIFT": "GUN135R FACELIFT",
            "TGN121R FACELIFT": "TGN121R FACELIFT",
            "GUN135R": "GUN135R"
        },
        "KLUGER": {
            "GSU40R": "GSU40R",
            "GSU45R MY12": "GSU45R MY12",
            "GSU45R": "GSU45R",
            "GSU40R MY11 UPGRADE": "GSU40R MY11 UPGRADE",
            "GSU40R MY12": "GSU40R MY12",
            "GSU40R MY12 UPGRADE": "GSU40R MY12 UPGRADE",
            "GSU45R MY11 UPGRADE": "GSU45R MY11 UPGRADE",
            "GSU40R MY13 UPGRADE": "GSU40R MY13 UPGRADE",
            "GSU50R": "GSU50R",
            "GSU50R MY17": "GSU50R MY17",
            "GSU50R MY18": "GSU50R MY18",
            "GSU55R": "GSU55R",
            "GSU55R MY17": "GSU55R MY17",
            "GSU55R MY18": "GSU55R MY18",
            "GSU45R MY13 UPGRADE": "GSU45R MY13 UPGRADE",
            "MCU28R": "MCU28R",
            "MCU28R UPGRADE": "MCU28R UPGRADE",
            "GSU70R": "GSU70R",
            "GSU75R": "GSU75R",
            "AXUH78R": "AXUH78R",
            "TXUA70R": "TXUA70R",
            "TXUA75R": "TXUA75R"
        },
        "LANDCRUISER": {
            "UZJ200R 09 UPGRADE": "UZJ200R 09 UPGRADE",
            "VDJ200R 09 UPGRADE": "VDJ200R 09 UPGRADE",
            "VDJ200R MY13": "VDJ200R MY13",
            "UZJ200R": "UZJ200R",
            "VDJ200R": "VDJ200R",
            "VDJ200R MY17": "VDJ200R MY17",
            "VDJ200R MY12": "VDJ200R MY12",
            "LC70 VDJ78R MY17": "LC70 VDJ78R MY17",
            "LC70 VDJ76R MY17": "LC70 VDJ76R MY17",
            "URJ202R MY12": "URJ202R MY12",
            "URJ202R MY13": "URJ202R MY13",
            "VDJ76R MY12 UPDATE": "VDJ76R MY12 UPDATE",
            "VDJ76R MY18": "VDJ76R MY18",
            "URJ202R MY16": "URJ202R MY16",
            "VDJ200R MY16": "VDJ200R MY16",
            "VDJ78R MY12 UPDATE": "VDJ78R MY12 UPDATE",
            "VDJ79R MY12 UPDATE": "VDJ79R MY12 UPDATE",
            "LC70 VDJ79R MY17": "LC70 VDJ79R MY17",
            "VDJ79R MY18": "VDJ79R MY18",
            "VDJ76R": "VDJ76R",
            "VDJ76R 09 UPGRADE": "VDJ76R 09 UPGRADE",
            "VDJ78R": "VDJ78R",
            "VDJ79R": "VDJ79R",
            "VDJ79R 09 UPGRADE": "VDJ79R 09 UPGRADE",
            "VDJ78R 09 UPGRADE": "VDJ78R 09 UPGRADE",
            "VDJ78R MY18": "VDJ78R MY18",
            "GDJ150R": "GDJ150R",
            "KDJ150R MY14": "KDJ150R MY14",
            "KDJ150R MY15": "KDJ150R MY15",
            "GRJ150R 11 UPGRADE": "GRJ150R 11 UPGRADE",
            "KDJ150R 11 UPGRADE": "KDJ150R 11 UPGRADE",
            "KDJ120R 07 UPGRADE": "KDJ120R 07 UPGRADE",
            "GDJ150R MY16": "GDJ150R MY16",
            "GDJ150R MY17": "GDJ150R MY17",
            "GDJ150R MY18": "GDJ150R MY18",
            "GRJ150R MY14": "GRJ150R MY14",
            "GRJ150R": "GRJ150R",
            "GRJ150R MY16": "GRJ150R MY16",
            "GRJ120R 07 UPGRADE": "GRJ120R 07 UPGRADE",
            "KDJ150R": "KDJ150R",
            "KDJ155R 11 UPGRADE": "KDJ155R 11 UPGRADE",
            "KDJ155R": "KDJ155R",
            "FZJ78R": "FZJ78R",
            "HZJ78R": "HZJ78R",
            "HDJ78R": "HDJ78R",
            "FZJ79R": "FZJ79R",
            "FJ75R": "FJ75R",
            "FZJ105R": "FZJ105R",
            "HZJ105R": "HZJ105R",
            "HZJ79R": "HZJ79R",
            "HJ75RP": "HJ75RP",
            "HZJ75RP": "HZJ75RP",
            "HDJ79R": "HDJ79R",
            "HZJ105R UPGRADE": "HZJ105R UPGRADE",
            "FZJ75RP": "FZJ75RP",
            "FJ45RV": "FJ45RV",
            "FJ75RV": "FJ75RV",
            "FZJ75RV": "FZJ75RV",
            "HJ47RV": "HJ47RV",
            "HJ75RV": "HJ75RV",
            "HZJ75RV": "HZJ75RV",
            "3 SEATS": "3 SEATS",
            "6 SEATS": "6 SEATS",
            "HJ75RV-MRQ": "HJ75RV-MRQ",
            "HZJ75RV-MRQ": "HZJ75RV-MRQ",
            "BJ70": "BJ70",
            "FZJ80": "FZJ80",
            "HZJ80R": "HZJ80R",
            "FJ62RG": "FJ62RG",
            "HJ60RG": "HJ60RG",
            "HJ61RG": "HJ61RG",
            "HDJ100R UPGRADE": "HDJ100R UPGRADE",
            "HDJ100R UPGRADE II": "HDJ100R UPGRADE II",
            "HDJ100R": "HDJ100R",
            "UZJ100R": "UZJ100R",
            "UZJ100R UPGRADE": "UZJ100R UPGRADE",
            "UZJ100R UPGRADE II": "UZJ100R UPGRADE II",
            "HDJ79R MY06": "HDJ79R MY06",
            "KZJ95R": "KZJ95R",
            "RZJ95R": "RZJ95R",
            "VZJ95R": "VZJ95R",
            "GRJ120R MY07": "GRJ120R MY07",
            "KDJ120R MY07": "KDJ120R MY07",
            "GRJ120R": "GRJ120R",
            "KZJ120R": "KZJ120R",
            "RZJ120R": "RZJ120R",
            "FZJ80R": "FZJ80R",
            "FJ80": "FJ80",
            "URJ202R MY19": "URJ202R MY19",
            "VDJ200R MY19": "VDJ200R MY19",
            "URJ202R": "URJ202R",
            "FJA300R": "FJA300R"
        },
        "RAV4": {
            "ACA38R MY11": "ACA38R MY11",
            "ACA38R MY12": "ACA38R MY12",
            "ACA33R MY11": "ACA33R MY11",
            "ACA33R MY12": "ACA33R MY12",
            "ACA33R": "ACA33R",
            "ACA38R": "ACA38R",
            "GSA33R 08 UPGRADE": "GSA33R 08 UPGRADE",
            "ACA33R 08 UPGRADE": "ACA33R 08 UPGRADE",
            "ASA44R MY16": "ASA44R MY16",
            "ALA49R MY16": "ALA49R MY16",
            "ALA49R MY17": "ALA49R MY17",
            "ALA49R MY18": "ALA49R MY18",
            "ASA44R": "ASA44R",
            "ASA44R MY17": "ASA44R MY17",
            "ASA44R MY18": "ASA44R MY18",
            "ALA49R": "ALA49R",
            "ALA49R MY14 UPGRADE": "ALA49R MY14 UPGRADE",
            "ASA44R MY14 UPGRADE": "ASA44R MY14 UPGRADE",
            "ZSA42R MY16": "ZSA42R MY16",
            "ZSA42R MY17": "ZSA42R MY17",
            "ZSA42R MY18": "ZSA42R MY18",
            "ZSA42R": "ZSA42R",
            "ZSA42R MY14 UPGRADE": "ZSA42R MY14 UPGRADE",
            "ACA21R": "ACA21R",
            "GSA33R": "GSA33R",
            "ACA22R": "ACA22R",
            "ACA23R": "ACA23R",
            "ACA20R": "ACA20R",
            "SXA10R": "SXA10R",
            "SXA11R": "SXA11R",
            "AXAH52R": "AXAH52R",
            "AXAH54R": "AXAH54R",
            "MXAA52R": "MXAA52R",
            "AXAA54R": "AXAA54R"
        },
        "TRD": {
            "GGN25R 08 UPGRADE": "GGN25R 08 UPGRADE",
            "GSV40R": "GSV40R",
            "GGN25R": "GGN25R"
        },
        "XC40": {
            "XZ MY18": "XZ MY18",
            "XZ MY19": "XZ MY19",
            "536 MY18": "536 MY18",
            "536 MY19": "536 MY19",
            "536 MY20": "536 MY20",
            "536 MY21": "536 MY21",
            "536 MY22": "536 MY22",
            "536 MY23": "536 MY23",
            "536 MY23B": "536 MY23B"
        },
        "XC60": {
            "DZ MY11": "DZ MY11",
            "DZ MY12": "DZ MY12",
            "DZ MY13": "DZ MY13",
            "DZ MY10": "DZ MY10",
            "D MY18": "D MY18",
            "D MY19": "D MY19",
            "DZ MY14": "DZ MY14",
            "DZ MY15": "DZ MY15",
            "DZ MY16": "DZ MY16",
            "DZ MY17": "DZ MY17",
            "DZ": "DZ",
            "246 MY18": "246 MY18",
            "246 MY19": "246 MY19",
            "246 MY20": "246 MY20",
            "246 MY21": "246 MY21",
            "246 MY22": "246 MY22",
            "256 MY22": "256 MY22",
            "246 MY23": "246 MY23",
            "246 MY23B": "246 MY23B"
        },
        "XC70": {
            "BZ MY09": "BZ MY09",
            "BZ MY10": "BZ MY10",
            "BZ MY11": "BZ MY11",
            "BZ MY12": "BZ MY12",
            "BZ MY13": "BZ MY13",
            "BZ": "BZ",
            "BZ MY14": "BZ MY14",
            "BZ MY15": "BZ MY15",
            "BZ MY16": "BZ MY16",
            "05 UPGRADE": "05 UPGRADE",
            "MY06": "MY06",
            "05 UPGRADE II": "05 UPGRADE II"
        },
        "XC90": {
            "MY09": "MY09",
            "MY11": "MY11",
            "MY10": "MY10",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY07": "MY07",
            "256 MY16": "256 MY16",
            "256 MY17": "256 MY17",
            "256 MY18": "256 MY18",
            "256 MY19": "256 MY19",
            "05 UPGRADE": "05 UPGRADE",
            "MY06": "MY06",
            "256 MY20": "256 MY20",
            "256 MY21": "256 MY21",
            "256 MY22": "256 MY22",
            "256 MY23": "256 MY23",
            "256 MY23B": "256 MY23B"
        },
        "AMAROK": {
            "2H MY16": "2H MY16",
            "2H MY17": "2H MY17",
            "2H MY18": "2H MY18",
            "2H MY15": "2H MY15",
            "2H MY14": "2H MY14",
            "2H MY12": "2H MY12",
            "2H MY12.5": "2H MY12.5",
            "2H MY13": "2H MY13",
            "2H": "2H",
            "2H MY17.5": "2H MY17.5",
            "2H MY19": "2H MY19",
            "2H MY20": "2H MY20",
            "2H MY21": "2H MY21",
            "2H MY22": "2H MY22"
        },
        "CADDY": {
            "2K MY08": "2K MY08",
            "2K MY16": "2K MY16",
            "2K MY17": "2K MY17",
            "2K MY17.5": "2K MY17.5",
            "2K MY17.5 UPGRADE": "2K MY17.5 UPGRADE",
            "2K MY18": "2K MY18",
            "2K MY09": "2K MY09",
            "2K MY13": "2K MY13",
            "2K MY11": "2K MY11",
            "2K MY12": "2K MY12",
            "2K MY14": "2K MY14",
            "2K MY15": "2K MY15",
            "2K": "2K",
            "2K MY07": "2K MY07",
            "2K MY19": "2K MY19",
            "2K MY20": "2K MY20"
        },
        "CITIVAN": {
            "T5 MY08": "T5 MY08",
            "T5": "T5"
        },
        "GOLF": {
            "AU MY16": "AU MY16",
            "AU MY17": "AU MY17",
            "AU MY18 UPDATE": "AU MY18 UPDATE",
            "AU MY18": "AU MY18",
            "1K MY08 UPGRADE": "1K MY08 UPGRADE",
            "1K": "1K",
            "1K MY08 UPGRADE 2": "1K MY08 UPGRADE 2",
            "1K MY09": "1K MY09",
            "1J": "1J",
            "1K MY10": "1K MY10",
            "1K MY11": "1K MY11",
            "1K MY12": "1K MY12",
            "1K MY13": "1K MY13",
            "AU MY14": "AU MY14",
            "AU MY15": "AU MY15",
            "AU MY14.5": "AU MY14.5",
            "AU": "AU",
            "1K MY13.5": "1K MY13.5",
            "1K 6TH GEN": "1K 6TH GEN",
            "1C MY15": "1C MY15",
            "1C MY13": "1C MY13",
            "1C MY13.5": "1C MY13.5",
            "1C MY14": "1C MY14",
            "1C MY14.5": "1C MY14.5",
            "1C": "1C",
            "AU MY17.5": "AU MY17.5",
            "AU MY19": "AU MY19",
            "AU MY19 UPDATE": "AU MY19 UPDATE",
            "AU MY20": "AU MY20",
            "MARK 8 MY21": "MARK 8 MY21",
            "MARK 8 MY22": "MARK 8 MY22",
            "MARK 8 MY22.5": "MARK 8 MY22.5",
            "MARK 8 CD MY23": "MARK 8 CD MY23",
            "MARK 8 CG MY23": "MARK 8 CG MY23",
            "MARK 8 CD MY23 UPDA": "MARK 8 CD MY23 UPDA",
            "MARK 8 CG MY23 UPDA": "MARK 8 CG MY23 UPDA"
        },
        "TIGUAN": {
            "5NA": "5NA",
            "5NA MY18 UPDATE": "5NA MY18 UPDATE",
            "5NC MY12": "5NC MY12",
            "5NC MY13": "5NC MY13",
            "5NC MY13.5": "5NC MY13.5",
            "5NC MY15": "5NC MY15",
            "5NC MY16": "5NC MY16",
            "5NC MY14": "5NC MY14",
            "5NC MY14.5": "5NC MY14.5",
            "5NA MY18": "5NA MY18",
            "5NC MY09": "5NC MY09",
            "5NC MY10": "5NC MY10",
            "5NC MY11": "5NC MY11",
            "5NC": "5NC",
            "5NA MY19": "5NA MY19",
            "5NA MY19 UPDATE": "5NA MY19 UPDATE",
            "5NA MY20": "5NA MY20",
            "5NA MY21": "5NA MY21",
            "5NA MY22": "5NA MY22",
            "5NA MY22 UPDATE": "5NA MY22 UPDATE",
            "AX MY23": "AX MY23",
            "BJ MY23": "BJ MY23",
            "5NA MY23": "5NA MY23",
            "AX MY23 UPDATE": "AX MY23 UPDATE",
            "BJ MY23 UPDATE": "BJ MY23 UPDATE"
        },
        "TOUAREG": {
            "7P MY11": "7P MY11",
            "7P MY12": "7P MY12",
            "7P MY13": "7P MY13",
            "7P MY13.5": "7P MY13.5",
            "7P MY15": "7P MY15",
            "7P MY16": "7P MY16",
            "7P MY17": "7P MY17",
            "7P MY18": "7P MY18",
            "7P MY14": "7P MY14",
            "7P MY14.5": "7P MY14.5",
            "7L MY09 UPGRADE": "7L MY09 UPGRADE",
            "7L MY10": "7L MY10",
            "7L MY07 UPDATE": "7L MY07 UPDATE",
            "7L MY07": "7L MY07",
            "7L": "7L",
            "MY19": "MY19",
            "MY20": "MY20",
            "CR MY21": "CR MY21",
            "CR MY22": "CR MY22",
            "CR MY23": "CR MY23",
            "CR MY23 UPDATE": "CR MY23 UPDATE"
        },
        "TRANSPORTER": {
            "T5 MY10": "T5 MY10",
            "T5 MY08": "T5 MY08",
            "T6 MY18": "T6 MY18",
            "T5 MY12": "T5 MY12",
            "T5 MY13": "T5 MY13",
            "T5 MY14": "T5 MY14",
            "T5 MY15": "T5 MY15",
            "T6 MY16": "T6 MY16",
            "T6 MY17": "T6 MY17",
            "T4": "T4",
            "T5 MY07": "T5 MY07",
            "T5": "T5",
            "T6 MY19": "T6 MY19",
            "T6.1 MY21": "T6.1 MY21",
            "T6.1 MY22": "T6.1 MY22",
            "T6.1 MY23": "T6.1 MY23"
        },
        "147": {
            "FACELIFT": "FACELIFT",
            "MY06": "MY06"
        },
        "159": {
            "08 RELEASE": "08 RELEASE",
            "MY09": "MY09",
            "MY11": "MY11"
        },
        "166": {
            "MY04": "MY04",
            "MY03": "MY03",
            "MY02": "MY02"
        },
        "V8": {
            "MY09": "MY09",
            "MY10": "MY10",
            "MY13": "MY13",
            "MY15": "MY15",
            "MY17": "MY17",
            "MY17.5": "MY17.5",
            "MY19": "MY19",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY14": "MY14",
            "MY16": "MY16"
        },
        "DB9": {
            "MY08 UPGRADE": "MY08 UPGRADE",
            "MY13": "MY13",
            "MY15": "MY15"
        },
        "A3": {
            "8P": "8P",
            "8P MY09": "8P MY09",
            "8P MY06 UPGRADE": "8P MY06 UPGRADE",
            "8V MY17": "8V MY17",
            "8V MY18": "8V MY18",
            "8V MY15": "8V MY15",
            "8V MY16": "8V MY16",
            "8V": "8V",
            "8V MY14": "8V MY14",
            "8P MY11": "8P MY11",
            "8P MY12": "8P MY12",
            "8P MY13": "8P MY13",
            "8V MY19": "8V MY19",
            "8V MY20": "8V MY20",
            "8Y MY22": "8Y MY22",
            "8Y MY22A": "8Y MY22A",
            "8Y MY23": "8Y MY23"
        },
        "A4": {
            "MY99": "MY99",
            "B7": "B7",
            "B8 (8K)": "B8 (8K)",
            "B6": "B6",
            "B7 MY06 UPGRADE": "B7 MY06 UPGRADE",
            "F4 MY17 (B9)": "F4 MY17 (B9)",
            "F4 (B9)": "F4 (B9)",
            "B8 (8K) MY16": "B8 (8K) MY16",
            "F4 MY18 (B9)": "F4 MY18 (B9)",
            "B8 (8K) MY13": "B8 (8K) MY13",
            "B8 (8K) MY11": "B8 (8K) MY11",
            "B8 (8K) MY12": "B8 (8K) MY12",
            "B8 (8K) MY14": "B8 (8K) MY14",
            "B8 (8K) MY15": "B8 (8K) MY15",
            "MY16": "MY16",
            "8W MY19": "8W MY19",
            "8W MY20": "8W MY20",
            "8W MY21": "8W MY21",
            "8W MY22": "8W MY22",
            "8W MY22A": "8W MY22A",
            "8W MY23": "8W MY23"
        },
        "A5": {
            "8T": "8T",
            "8T MY13": "8T MY13",
            "8T MY14": "8T MY14",
            "8T MY15": "8T MY15",
            "8T MY16": "8T MY16",
            "8T MY12 UPGRADE": "8T MY12 UPGRADE",
            "F5 MY17": "F5 MY17",
            "F5 MY18": "F5 MY18",
            "8T MY11": "8T MY11",
            "8T MY12": "8T MY12",
            "8T R6": "8T R6",
            "F5 MY19": "F5 MY19",
            "F5 MY19 UPDATE": "F5 MY19 UPDATE",
            "F5 MY19A": "F5 MY19A",
            "F5 MY19B": "F5 MY19B",
            "F5 MY20": "F5 MY20",
            "F5 MY21": "F5 MY21",
            "F5 MY22": "F5 MY22",
            "F5 MY22A": "F5 MY22A",
            "F5 MY23": "F5 MY23"
        },
        "A8": {
            "4E": "4E",
            "4E 05 UPGRADE": "4E 05 UPGRADE",
            "4E 06 UPGRADE": "4E 06 UPGRADE",
            "4H MY12": "4H MY12",
            "4H MY13": "4H MY13",
            "4H MY14": "4H MY14",
            "4H MY15": "4H MY15",
            "4H MY16": "4H MY16",
            "4H MY17": "4H MY17",
            "4H": "4H",
            "4N MY18": "4N MY18",
            "4N MY19": "4N MY19",
            "4N MY20": "4N MY20",
            "4N MY21": "4N MY21",
            "4N PI MY23": "4N PI MY23"
        },
        "RS4": {
            "B7": "B7",
            "8K MY14": "8K MY14",
            "8K MY15": "8K MY15",
            "8K MY17": "8K MY17",
            "MY18": "MY18",
            "8K": "8K",
            "8W MY19": "8W MY19"
        },
        "RS6": {
            "4B": "4B",
            "4F": "4F",
            "4F MY09": "4F MY09",
            "4GL MY18": "4GL MY18",
            "4GL MY15": "4GL MY15",
            "4GL MY17": "4GL MY17",
            "4GL": "4GL",
            "4G MY18": "4G MY18",
            "4G MY16": "4G MY16",
            "4G MY17": "4G MY17"
        },
        "S3": {
            "8P": "8P",
            "MY02": "MY02",
            "MY01": "MY01",
            "8V MY14": "8V MY14",
            "8V MY15": "8V MY15",
            "8V MY16": "8V MY16",
            "8V MY18": "8V MY18",
            "8V MY17": "8V MY17",
            "8P MY12": "8P MY12",
            "8V MY19": "8V MY19",
            "8V MY19A": "8V MY19A",
            "8V MY20": "8V MY20",
            "8Y MY22": "8Y MY22",
            "8Y MY22A": "8Y MY22A",
            "8Y MY23": "8Y MY23"
        },
        "S4": {
            "B6": "B6",
            "B7": "B7",
            "B8 (8K) MY13": "B8 (8K) MY13",
            "B8 (8K) MY14": "B8 (8K) MY14",
            "B8 (8K) MY15": "B8 (8K) MY15",
            "B8 (8K) MY16": "B8 (8K) MY16",
            "B9 MY17": "B9 MY17",
            "F4 MY18 (B9)": "F4 MY18 (B9)",
            "B9 MY18": "B9 MY18",
            "B8 (8K) MY11": "B8 (8K) MY11",
            "B8 (8K) MY12": "B8 (8K) MY12",
            "8K": "8K",
            "8W MY19": "8W MY19",
            "8W MY19A": "8W MY19A",
            "8W MY20": "8W MY20",
            "8W MY21": "8W MY21",
            "8W MY22": "8W MY22",
            "8W MY22A": "8W MY22A",
            "8W MY23": "8W MY23"
        },
        "S5": {
            "8T": "8T",
            "8T MY12": "8T MY12",
            "8T MY14": "8T MY14",
            "8T MY15": "8T MY15",
            "F5 MY17": "F5 MY17",
            "F5 MY18": "F5 MY18",
            "8T MY12 UPGRADE": "8T MY12 UPGRADE",
            "F5 MY19": "F5 MY19",
            "F5 MY19A": "F5 MY19A",
            "F5 MY19B": "F5 MY19B",
            "F5 MY20": "F5 MY20",
            "F5 MY21": "F5 MY21",
            "F5 MY22": "F5 MY22",
            "F5 MY22A": "F5 MY22A",
            "F5 MY23": "F5 MY23"
        },
        "S6": {
            "4B": "4B",
            "4F": "4F",
            "4GL MY14": "4GL MY14",
            "4GL": "4GL",
            "4GL MY15": "4GL MY15",
            "4GL MY17": "4GL MY17",
            "4GL MY18": "4GL MY18",
            "4A MY20": "4A MY20",
            "4A MY21": "4A MY21",
            "4A MY22": "4A MY22",
            "4A MY22A": "4A MY22A",
            "4A MY23": "4A MY23"
        },
        "S8": {
            "4E": "4E",
            "4H MY16": "4H MY16",
            "4H MY14": "4H MY14",
            "4H MY15": "4H MY15",
            "4H MY17": "4H MY17",
            "4H MY18": "4H MY18",
            "4N MY20": "4N MY20",
            "4N MY21": "4N MY21",
            "4N PI MY22": "4N PI MY22",
            "4N PI MY23": "4N PI MY23"
        },
        "TT": {
            "MY99": "MY99",
            "MY03": "MY03",
            "8J": "8J",
            "8N MY06": "8N MY06",
            "8N": "8N",
            "8J MY11": "8J MY11",
            "8J MY12": "8J MY12",
            "8J MY14": "8J MY14",
            "FV MY17": "FV MY17",
            "FV3 MY18": "FV3 MY18",
            "FV": "FV",
            "FV9 MY18": "FV9 MY18",
            "8J MY13": "8J MY13",
            "FV3 MY17": "FV3 MY17",
            "FV MY19": "FV MY19",
            "FV MY20": "FV MY20",
            "FV MY21": "FV MY21",
            "FV MY22": "FV MY22",
            "FV MY22A": "FV MY22A",
            "FV MY23": "FV MY23"
        },
        "ARNAGE": {
            "MY08": "MY08"
        },
        "CONTINENTAL": {
            "3W MY09": "3W MY09",
            "3W": "3W",
            "3W MY18": "3W MY18",
            "3W MY12": "3W MY12",
            "3W MY14": "3W MY14",
            "3W MY15": "3W MY15",
            "3W MY16": "3W MY16",
            "3W MY17": "3W MY17",
            "3W SERIES II": "3W SERIES II",
            "3W MY13": "3W MY13",
            "3S MY19": "3S MY19"
        },
        "1": {
            "E87 MY07 UPGRADE": "E87 MY07 UPGRADE",
            "E87": "E87",
            "E87 MY06 UPGRADE": "E87 MY06 UPGRADE",
            "E87 MY09": "E87 MY09",
            "E88": "E88",
            "E88 MY09": "E88 MY09",
            "E82": "E82",
            "E82 MY09": "E82 MY09",
            "E87 MY08 UPGRADE": "E87 MY08 UPGRADE",
            "F20 MY13": "F20 MY13",
            "F20 MY14": "F20 MY14",
            "F20 MY15": "F20 MY15",
            "F20": "F20",
            "E87 MY11": "E87 MY11",
            "E88 MY11": "E88 MY11",
            "E88 MY12": "E88 MY12",
            "E88 MY12 UPDATE": "E88 MY12 UPDATE",
            "E88 MY13 UPDATE": "E88 MY13 UPDATE",
            "E82 MY12 UPDATE": "E82 MY12 UPDATE",
            "E82 MY11": "E82 MY11",
            "E82 MY12": "E82 MY12",
            "E82 MY13 UPDATE": "E82 MY13 UPDATE",
            "F20 LCI": "F20 LCI",
            "F20 LCI MY17": "F20 LCI MY17",
            "F20 LCI MY18": "F20 LCI MY18",
            "F20 LCI MY19": "F20 LCI MY19",
            "F20 MY19": "F20 MY19",
            "F40": "F40"
        },
        "3": {
            "E36": "E36",
            "E46": "E46",
            "E46 MY04": "E46 MY04",
            "E91 07 UPGRADE": "E91 07 UPGRADE",
            "E91 MY09": "E91 MY09",
            "E46 MY06 UPGRADE": "E46 MY06 UPGRADE",
            "E90 08 UPGRADE": "E90 08 UPGRADE",
            "E90": "E90",
            "E90 07 UPGRADE": "E90 07 UPGRADE",
            "E90 MY09": "E90 MY09",
            "E92": "E92",
            "E93": "E93",
            "E93 MY09": "E93 MY09",
            "E91": "E91",
            "F30 MY14": "F30 MY14",
            "F30 MY14 UPGRADE": "F30 MY14 UPGRADE",
            "F30 MY15": "F30 MY15",
            "F30": "F30",
            "F31 MY14": "F31 MY14",
            "F31 MY15": "F31 MY15",
            "F31 MY14 UPGRADE": "F31 MY14 UPGRADE",
            "F31": "F31",
            "F31 MY15 UPGRADE": "F31 MY15 UPGRADE",
            "F30 LCI": "F30 LCI",
            "F30 LCI MY17": "F30 LCI MY17",
            "F30 LCI MY18": "F30 LCI MY18",
            "F31 LCI MY18": "F31 LCI MY18",
            "F31 LCI": "F31 LCI",
            "E92 MY10": "E92 MY10",
            "E93 MY10": "E93 MY10",
            "E92 MY11": "E92 MY11",
            "E93 MY11": "E93 MY11",
            "E92 MY12": "E92 MY12",
            "E93 MY12": "E93 MY12",
            "E93 MY14": "E93 MY14",
            "F30 MY15 UPGRADE": "F30 MY15 UPGRADE",
            "E91 MY10": "E91 MY10",
            "E91 MY11": "E91 MY11",
            "E90 MY10": "E90 MY10",
            "E90 MY11": "E90 MY11",
            "E92 MY09": "E92 MY09",
            "E90 MY09 UPGRADE": "E90 MY09 UPGRADE",
            "F34 MY15": "F34 MY15",
            "F34 MY15 UPGRADE": "F34 MY15 UPGRADE",
            "F34": "F34",
            "F34 MY14": "F34 MY14",
            "F34 LCI MY17": "F34 LCI MY17",
            "F34 MY18": "F34 MY18",
            "MY18 UPDATE": "MY18 UPDATE",
            "MY18": "MY18",
            "G20 MY19": "G20 MY19",
            "G20": "G20",
            "G21": "G21",
            "G20 LCI": "G20 LCI",
            "G21 LCI": "G21 LCI",
            "MY24": "MY24"
        },
        "5": {
            "E60 MY07": "E60 MY07",
            "E60 MY09": "E60 MY09",
            "E39": "E39",
            "E34": "E34",
            "E60 05 UPGRADE": "E60 05 UPGRADE",
            "E60 MY06 UPGRADE": "E60 MY06 UPGRADE",
            "E60": "E60",
            "E61 MY06 UPGRADE": "E61 MY06 UPGRADE",
            "E61 MY07": "E61 MY07",
            "E61": "E61",
            "F10 MY11": "F10 MY11",
            "F10 MY12": "F10 MY12",
            "F10 MY13": "F10 MY13",
            "F10": "F10",
            "G30 MY18": "G30 MY18",
            "F10 MY14": "F10 MY14",
            "F10 MY14 UPGRADE": "F10 MY14 UPGRADE",
            "F10 MY15": "F10 MY15",
            "F10 MY17": "F10 MY17",
            "G30 MY17": "G30 MY17",
            "G31 MY18": "G31 MY18",
            "F11": "F11",
            "F11 MY12": "F11 MY12",
            "F07": "F07",
            "F07 MY12": "F07 MY12",
            "F07 MY11": "F07 MY11",
            "F07 MY14": "F07 MY14",
            "F07 MY14 UPGRADE": "F07 MY14 UPGRADE",
            "F07 MY15": "F07 MY15",
            "F11 MY14": "F11 MY14",
            "F11 MY14 UPGRADE": "F11 MY14 UPGRADE",
            "F11 MY15": "F11 MY15",
            "G30": "G30",
            "G31": "G31",
            "G31 LCI": "G31 LCI"
        },
        "6": {
            "E63": "E63",
            "E63 MY08": "E63 MY08",
            "G32": "G32",
            "F12": "F12",
            "F13": "F13",
            "F12 MY18": "F12 MY18",
            "F12 MY14": "F12 MY14",
            "F12 MY15": "F12 MY15",
            "F12 LCI": "F12 LCI",
            "F13 MY14": "F13 MY14",
            "F13 MY15": "F13 MY15",
            "F13 MY16": "F13 MY16",
            "F13 MY18": "F13 MY18",
            "F13 LCI": "F13 LCI",
            "F06 MY18": "F06 MY18",
            "F06 MY14": "F06 MY14",
            "F06 MY15": "F06 MY15",
            "F06 MY16": "F06 MY16",
            "F06 LCI": "F06 LCI",
            "F06": "F06",
            "E63 09 UPGRADE": "E63 09 UPGRADE",
            "E64 MY08": "E64 MY08",
            "E64 09 UPGRADE": "E64 09 UPGRADE"
        },
        "7": {
            "E65": "E65",
            "E38": "E38",
            "E65 MY05 UPGRADE": "E65 MY05 UPGRADE",
            "E66": "E66",
            "E32": "E32",
            "E66 MY05 UPGRADE": "E66 MY05 UPGRADE",
            "G11 MY18": "G11 MY18",
            "F01 MY11": "F01 MY11",
            "F01 MY13": "F01 MY13",
            "F01 MY14": "F01 MY14",
            "F01 MY15": "F01 MY15",
            "G11": "G11",
            "G11 MY17": "G11 MY17",
            "F01": "F01",
            "G12 MY17": "G12 MY17",
            "G12 MY18": "G12 MY18",
            "F02 MY11": "F02 MY11",
            "F02 MY13": "F02 MY13",
            "F02 MY14": "F02 MY14",
            "F02 MY15": "F02 MY15",
            "G12": "G12",
            "F02": "F02",
            "G11 LCI": "G11 LCI",
            "G12 LCI": "G12 LCI",
            "G70": "G70"
        },
        "8": {
            "E31": "E31",
            "G14 MY19": "G14 MY19",
            "G15 MY19": "G15 MY19",
            "G16": "G16",
            "G14": "G14",
            "G15": "G15",
            "G16 LCI": "G16 LCI",
            "G14 LCI": "G14 LCI",
            "G15 LCI": "G15 LCI"
        },
        "M3": {
            "E90": "E90",
            "E92": "E92",
            "E46": "E46",
            "E93": "E93",
            "E36": "E36",
            "E92 MY13": "E92 MY13",
            "F80": "F80",
            "F80 MY15": "F80 MY15",
            "F80 LCI": "F80 LCI",
            "F80 LCI MY17": "F80 LCI MY17",
            "E92 MY10": "E92 MY10",
            "E93 MY10": "E93 MY10",
            "E90 MY10": "E90 MY10",
            "F80 MY18": "F80 MY18",
            "G20": "G20",
            "G80": "G80",
            "G81": "G81"
        },
        "M5": {
            "E60": "E60",
            "F10 MY12": "F10 MY12",
            "F10 MY13": "F10 MY13",
            "F90": "F90",
            "F10": "F10",
            "G30": "G30"
        },
        "M6": {
            "E63": "E63",
            "F12": "F12",
            "F13": "F13",
            "F12 LCI": "F12 LCI",
            "F13 LCI": "F13 LCI",
            "F06": "F06",
            "F06 LCI": "F06 LCI"
        },
        "Z4": {
            "E86": "E86",
            "E85 MY06": "E85 MY06",
            "E85": "E85",
            "E89 MY12": "E89 MY12",
            "E89 MY14": "E89 MY14",
            "E89 MY14 UPDATE": "E89 MY14 UPDATE",
            "E89 MY16": "E89 MY16",
            "E89 MY15": "E89 MY15",
            "E89 MY16 UPDATE": "E89 MY16 UPDATE",
            "E89 MY10": "E89 MY10",
            "E89 MY11": "E89 MY11",
            "E89": "E89",
            "G29 MY19": "G29 MY19",
            "G29": "G29"
        },
        "SEVEN": {
            "CVW7": "CVW7",
            "MY16": "MY16",
            "MY17": "MY17"
        },
        "300C": {
            "LE MY08": "LE MY08",
            "LE MY06": "LE MY06"
        },
        "CENTURA": {
            "KB": "KB",
            "KC": "KC"
        },
        "CHARGER": {
            "VH": "VH",
            "VJ": "VJ",
            "VK": "VK",
            "CL": "CL"
        },
        "CHRYSLER": {
            "CH": "CH",
            "CJ": "CJ",
            "CK": "CK"
        },
        "CROSSFIRE": {
            "ZH": "ZH"
        },
        "GALANT": {
            "GA": "GA",
            "GB": "GB",
            "GC": "GC",
            "GD": "GD",
            "HG": "HG",
            "HH": "HH",
            "HJ": "HJ"
        },
        "GRAND VOYAGER": {
            "RG 05 UPGRADE": "RG 05 UPGRADE",
            "RG": "RG",
            "GS": "GS",
            "RT": "RT",
            "RT MY11": "RT MY11",
            "RT MY12": "RT MY12",
            "RT MY13": "RT MY13"
        },
        "LANCER": {
            "LA": "LA",
            "LB": "LB",
            "LC": "LC",
            "CJ MY09": "CJ MY09",
            "CE": "CE",
            "CY MY06": "CY MY06",
            "CG": "CG",
            "CH": "CH",
            "CC": "CC",
            "CJ": "CJ",
            "CH MY06": "CH MY06",
            "CH MY07": "CH MY07",
            "CA": "CA",
            "CB": "CB",
            "CZ": "CZ",
            "CJ MY10": "CJ MY10",
            "CJ MY12": "CJ MY12",
            "CJ MY11": "CJ MY11",
            "CF MY17": "CF MY17",
            "CJ MY15": "CJ MY15",
            "CJ MY13": "CJ MY13",
            "CJ MY14": "CJ MY14",
            "CJ MY14 UPGRADE": "CJ MY14 UPGRADE",
            "CJ MY14.5": "CJ MY14.5",
            "CF": "CF",
            "CJ MY14 UPGRADE 2": "CJ MY14 UPGRADE 2"
        },
        "NEON": {
            "MY01": "MY01"
        },
        "PT CRUISER": {
            "MY05 UPGRADE": "MY05 UPGRADE",
            "MY06": "MY06"
        },
        "REGAL": {
            "AP5": "AP5",
            "AP6": "AP6",
            "VC": "VC",
            "VE": "VE",
            "VF": "VF",
            "VG": "VG",
            "VH": "VH",
            "VJ": "VJ",
            "VK": "VK",
            "CL": "CL",
            "CM": "CM"
        },
        "SEBRING": {
            "JS": "JS"
        },
        "VALIANT": {
            "AP5": "AP5",
            "AP6": "AP6",
            "VC": "VC",
            "VE": "VE",
            "VF": "VF",
            "VG": "VG",
            "VH": "VH",
            "VJ": "VJ",
            "CL": "CL",
            "CM": "CM",
            "RV1": "RV1",
            "SV1": "SV1",
            "VK": "VK"
        },
        "VOYAGER": {
            "RG 05 UPGRADE": "RG 05 UPGRADE",
            "GS": "GS",
            "RG": "RG"
        },
        "C2": {
            "MY06": "MY06"
        },
        "C5": {
            "X7": "X7",
            "06 UPGRADE": "06 UPGRADE",
            "MY07 UPGRADE": "MY07 UPGRADE",
            "X7 MY10": "X7 MY10",
            "X7 MY12": "X7 MY12",
            "X7 MY13": "X7 MY13",
            "X7 MY14": "X7 MY14",
            "X7 MY16": "X7 MY16",
            "C84 MY19": "C84 MY19"
        },
        "CX": {
            "LEATHER": "LEATHER"
        },
        "XSARA": {
            "MY04": "MY04",
            "MY01": "MY01"
        },
        "LA CLASSE": {
            "VSII": "VSII"
        },
        "STRADA": {
            "VT": "VT"
        },
        "VOLANTI": {
            "VT": "VT"
        },
        "KALOS": {
            "T200": "T200"
        },
        "LACETTI": {
            "J200": "J200"
        },
        "NUBIRA": {
            "SERIES II": "SERIES II"
        },
        "APPLAUSE": {
            "A101": "A101"
        },
        "CHARADE": {
            "L251S": "L251S",
            "G202": "G202",
            "G203": "G203",
            "G203B": "G203B",
            "G202B": "G202B",
            "G200B": "G200B"
        },
        "COPEN": {
            "L880": "L880"
        },
        "MOVE": {
            "L601": "L601"
        },
        "PYZAR": {
            "G303": "G303"
        },
        "SIRION": {
            "M100": "M100",
            "M101": "M101",
            "M300": "M300"
        },
        "YRV": {
            "M201": "M201"
        },
        "DOUBLE SIX": {
            "SER II": "SER II",
            "SER III": "SER III"
        },
        "SOVEREIGN": {
            "SER I": "SER I",
            "SER II": "SER II",
            "SER III": "SER III"
        },
        "AVENGER": {
            "JS": "JS",
            "JS 08 UPGRADE": "JS 08 UPGRADE"
        },
        "CALIBER": {
            "PM": "PM",
            "PM MY10": "PM MY10",
            "PM MY12": "PM MY12"
        },
        "SUPERAMERICA": {
            "575": "575"
        },
        "124": {
            "AC": "AC",
            "BC": "BC",
            "CC": "CC",
            "SERIES 1": "SERIES 1"
        },
        "CAPRI": {
            "SA": "SA",
            "SAII": "SAII",
            "SC": "SC",
            "SE": "SE"
        },
        "COUGAR": {
            "SW": "SW",
            "SX": "SX"
        },
        "COBRA": {
            "XC": "XC"
        },
        "CORSAIR": {
            "UA": "UA"
        },
        "CORTINA": {
            "TC": "TC",
            "TD": "TD",
            "TE": "TE",
            "TF": "TF"
        },
        "FAIRLANE": {
            "ZA": "ZA",
            "ZJ": "ZJ",
            "ZK": "ZK",
            "ZL": "ZL",
            "NA": "NA",
            "NAII": "NAII",
            "NC": "NC",
            "NCII": "NCII",
            "ZB": "ZB",
            "ZC": "ZC",
            "ZD": "ZD",
            "ZF": "ZF",
            "ZG": "ZG",
            "ZH": "ZH",
            "BA MKII": "BA MKII",
            "BA": "BA",
            "AUII": "AUII",
            "BF": "BF",
            "NL": "NL",
            "NF": "NF",
            "NFII": "NFII",
            "AU": "AU"
        },
        "FESTIVA": {
            "WA": "WA",
            "WF": "WF",
            "WD": "WD",
            "WB": "WB"
        },
        "FIESTA": {
            "WP": "WP",
            "WQ": "WQ",
            "WZ": "WZ",
            "WS": "WS",
            "WT": "WT",
            "WG MY20.25": "WG MY20.25",
            "WG MY20.75": "WG MY20.75",
            "WG MY21": "WG MY21",
            "WG MY21.75": "WG MY21.75",
            "WG MY22": "WG MY22"
        },
        "FAIRMONT": {
            "EA": "EA",
            "EAII": "EAII",
            "EB": "EB",
            "EBII": "EBII",
            "EF": "EF",
            "XA": "XA",
            "XB": "XB",
            "XC": "XC",
            "XD": "XD",
            "XE": "XE",
            "XF": "XF",
            "ED": "ED",
            "EFII": "EFII",
            "EL": "EL",
            "AU": "AU",
            "XP": "XP",
            "XR": "XR",
            "XT": "XT",
            "XW": "XW",
            "XY": "XY",
            "AUII": "AUII",
            "AUIII": "AUIII",
            "BA MKII": "BA MKII",
            "BA": "BA",
            "BF": "BF",
            "BF MKII": "BF MKII",
            "BF MKII 07 UPGRADE": "BF MKII 07 UPGRADE"
        },
        "FOCUS": {
            "LV": "LV",
            "LT": "LT",
            "LT 08 UPGRADE": "LT 08 UPGRADE",
            "LR": "LR",
            "LS": "LS",
            "LZ": "LZ",
            "LW MK2": "LW MK2",
            "LW MK2 UPGRADE": "LW MK2 UPGRADE",
            "LW MK2 MY14": "LW MK2 MY14",
            "LW": "LW",
            "LV MY11": "LV MY11",
            "SA MY19.25": "SA MY19.25",
            "SA MY19": "SA MY19",
            "SA MY19.75": "SA MY19.75",
            "SA MY20.25": "SA MY20.25",
            "SA MY20.75": "SA MY20.75",
            "SA MY21": "SA MY21",
            "SA MY21.75": "SA MY21.75",
            "SA MY22.5": "SA MY22.5"
        },
        "FUTURA": {
            "XA": "XA",
            "XB": "XB",
            "XL": "XL",
            "XM": "XM",
            "XP": "XP",
            "XW": "XW",
            "XY": "XY"
        },
        "G6": {
            "FG": "FG",
            "FG UPGRADE": "FG UPGRADE",
            "FG MK2": "FG MK2",
            "FG X": "FG X"
        },
        "LASER": {
            "KA": "KA",
            "KB": "KB",
            "KC": "KC",
            "KE": "KE",
            "KF": "KF",
            "KN": "KN",
            "KH": "KH",
            "KHII": "KHII",
            "KJ": "KJ",
            "KEII": "KEII",
            "KEII (MY91)": "KEII (MY91)",
            "KEII (MY92)": "KEII (MY92)",
            "KJIII": "KJIII",
            "KJII": "KJII",
            "KQ": "KQ"
        },
        "LTD": {
            "FC": "FC",
            "FD": "FD",
            "FE": "FE",
            "DA": "DA",
            "DAII": "DAII",
            "DC": "DC",
            "DCII": "DCII",
            "DF": "DF",
            "DFII": "DFII",
            "DL": "DL",
            "AU": "AU",
            "AUII": "AUII",
            "BA MKII": "BA MKII",
            "BA": "BA",
            "BF": "BF"
        },
        "METEOR": {
            "GC": "GC",
            "GA": "GA",
            "GB": "GB"
        },
        "MONDEO": {
            "HE": "HE",
            "HA": "HA",
            "HB": "HB",
            "HC": "HC",
            "HD": "HD",
            "MA": "MA",
            "MD MY18.25": "MD MY18.25",
            "MD FACELIFT": "MD FACELIFT",
            "MD": "MD",
            "MB": "MB",
            "MC": "MC",
            "MD MY18.75": "MD MY18.75",
            "MD MY19.5": "MD MY19.5",
            "MY20.25": "MY20.25"
        },
        "PROBE": {
            "ST": "ST",
            "SU": "SU",
            "SV": "SV"
        },
        "TAURUS": {
            "DN": "DN",
            "DP": "DP"
        },
        "TE50": {
            "AU": "AU",
            "AUII": "AUII",
            "AUIII": "AUIII"
        },
        "TELSTAR": {
            "AR": "AR",
            "AS": "AS",
            "AT": "AT",
            "AX": "AX",
            "AY": "AY",
            "AV": "AV"
        },
        "TL50": {
            "AU": "AU",
            "AUII": "AUII",
            "AUIII": "AUIII"
        },
        "TS50": {
            "AU": "AU",
            "AUII": "AUII",
            "AUIII": "AUIII"
        },
        "ZEPHYR": {
            "MK II": "MK II"
        },
        "HUSTLER": {
            "HE": "HE"
        },
        "HUNTER": {
            "HC": "HC",
            "HE": "HE"
        },
        "SUPER MINX": {
            "MKIII": "MKIII"
        },
        "SS": {
            "HQ": "HQ"
        },
        "APOLLO": {
            "JK": "JK",
            "JL": "JL",
            "JM": "JM",
            "JP": "JP"
        },
        "ASTRA": {
            "AH MY08.5": "AH MY08.5",
            "TS": "TS",
            "AH MY06.5": "AH MY06.5",
            "AH MY06": "AH MY06",
            "AH MY07": "AH MY07",
            "AH MY08": "AH MY08",
            "AH MY09": "AH MY09",
            "AH": "AH",
            "AH MY07.5": "AH MY07.5",
            "TS SERIES II": "TS SERIES II",
            "TR": "TR",
            "TS MY06": "TS MY06",
            "TS MY05": "TS MY05",
            "LB": "LB",
            "LC": "LC",
            "LD": "LD",
            "BK MY18": "BK MY18",
            "PJ MY16": "PJ MY16",
            "PJ": "PJ",
            "PJ MY17": "PJ MY17",
            "BL MY17": "BL MY17",
            "BL MY18": "BL MY18",
            "BK MY17": "BK MY17",
            "BK MY17.5": "BK MY17.5",
            "BK MY18.5": "BK MY18.5",
            "BK MY19": "BK MY19",
            "5L MY18": "5L MY18",
            "BK MY20": "BK MY20"
        },
        "BARINA": {
            "MB": "MB",
            "MF": "MF",
            "MH": "MH",
            "ML": "ML",
            "TK MY07": "TK MY07",
            "TK MY08": "TK MY08",
            "TK MY09": "TK MY09",
            "TK": "TK",
            "XC (MY04.5)": "XC (MY04.5)",
            "XC": "XC",
            "SB": "SB",
            "XC MY04": "XC MY04",
            "XC MY05": "XC MY05",
            "TK MY10": "TK MY10",
            "TK MY11": "TK MY11",
            "TM": "TM",
            "TM MY18": "TM MY18",
            "TM MY13": "TM MY13",
            "TM MY14": "TM MY14",
            "TM MY15": "TM MY15",
            "TM MY16": "TM MY16",
            "TM MY17": "TM MY17"
        },
        "BELMONT": {
            "HX": "HX",
            "HG": "HG",
            "HJ": "HJ",
            "HK": "HK",
            "HQ": "HQ",
            "HT": "HT",
            "HZ": "HZ"
        },
        "BERLINA": {
            "VK": "VK",
            "VL": "VL",
            "VN": "VN",
            "VP": "VP",
            "VR": "VR",
            "VRII": "VRII",
            "VS": "VS",
            "VSII": "VSII",
            "VT": "VT",
            "VTII": "VTII",
            "VPII": "VPII",
            "VE MY08": "VE MY08",
            "VE MY09": "VE MY09",
            "VE MY09.5": "VE MY09.5",
            "VE": "VE",
            "VX": "VX",
            "VY": "VY",
            "VZ": "VZ",
            "VXII": "VXII",
            "VYII": "VYII",
            "VZ MY06": "VZ MY06",
            "VZ MY06 UPGRADE": "VZ MY06 UPGRADE",
            "VE MY10": "VE MY10",
            "VE II MY12": "VE II MY12",
            "VE II MY12.5": "VE II MY12.5",
            "VE II": "VE II"
        },
        "BROUGHAM": {
            "HG": "HG",
            "HK": "HK",
            "HT": "HT"
        },
        "CALAIS": {
            "VK": "VK",
            "VL": "VL",
            "VN": "VN",
            "VP": "VP",
            "VR": "VR",
            "VRII": "VRII",
            "VPII": "VPII",
            "VS": "VS",
            "VSII": "VSII",
            "VT": "VT",
            "VTII": "VTII",
            "VE MY08": "VE MY08",
            "VE MY09": "VE MY09",
            "VE MY09.5": "VE MY09.5",
            "VE": "VE",
            "VX": "VX",
            "VY": "VY",
            "VZ": "VZ",
            "VXII": "VXII",
            "VYII": "VYII",
            "VZ MY06": "VZ MY06",
            "VT II": "VT II",
            "VE MY10": "VE MY10",
            "VF II": "VF II",
            "VE II MY12": "VE II MY12",
            "VF MY15": "VF MY15",
            "VF II MY17": "VF II MY17",
            "VE II MY12.5": "VE II MY12.5",
            "VE II": "VE II",
            "VF": "VF",
            "ZB": "ZB",
            "ZB MY19.5": "ZB MY19.5"
        },
        "CAMIRA": {
            "JD": "JD",
            "JE": "JE",
            "JB": "JB"
        },
        "CAPRICE": {
            "VQ": "VQ",
            "VQII": "VQII",
            "VR": "VR",
            "VRII": "VRII",
            "VS": "VS",
            "VSII": "VSII",
            "VSIII": "VSIII",
            "WH": "WH",
            "WM MY08": "WM MY08",
            "WM MY09": "WM MY09",
            "WM MY09.5": "WM MY09.5",
            "WHII": "WHII",
            "WL MY06": "WL MY06",
            "WK": "WK",
            "WL": "WL",
            "WM": "WM",
            "WM MY10": "WM MY10",
            "WM II MY12": "WM II MY12",
            "WM II MY12.5": "WM II MY12.5",
            "WM II": "WM II",
            "WN MY15": "WN MY15",
            "WN MY16": "WN MY16",
            "WN MY17": "WN MY17",
            "WN": "WN"
        },
        "CALIBRA": {
            "YE": "YE",
            "YE95": "YE95"
        },
        "EPICA": {
            "EP MY08": "EP MY08",
            "EP MY09": "EP MY09",
            "EP": "EP",
            "EP MY11": "EP MY11",
            "EP MY10": "EP MY10"
        },
        "GEMINI": {
            "TC": "TC",
            "TD": "TD",
            "TE": "TE",
            "TF": "TF",
            "TG": "TG",
            "TX": "TX",
            "RB": "RB",
            "RB2": "RB2"
        },
        "KINGSWOOD": {
            "HG": "HG",
            "HJ": "HJ",
            "HK": "HK",
            "HQ": "HQ",
            "HT": "HT",
            "HX": "HX",
            "HZ": "HZ",
            "WB": "WB"
        },
        "MONARO": {
            "HG": "HG",
            "HK": "HK",
            "HQ": "HQ",
            "HT": "HT",
            "V2 SERIES II": "V2 SERIES II",
            "V2": "V2",
            "SERIES III": "SERIES III",
            "VZ": "VZ",
            "V2 SERIES 3": "V2 SERIES 3",
            "HJ": "HJ",
            "HX": "HX",
            "HZ": "HZ"
        },
        "NOVA": {
            "LF": "LF",
            "LG": "LG",
            "LE": "LE"
        },
        "PREMIER": {
            "HD": "HD",
            "HG": "HG",
            "EH": "EH",
            "EJ": "EJ",
            "HK": "HK",
            "HQ": "HQ",
            "HR": "HR",
            "HT": "HT",
            "HJ": "HJ",
            "HX": "HX",
            "HZ": "HZ"
        },
        "SPECIAL": {
            "FB": "FB",
            "HD": "HD",
            "EH": "EH",
            "EJ": "EJ",
            "EK": "EK",
            "HR": "HR"
        },
        "STATESMAN": {
            "VSIII": "VSIII",
            "HJ": "HJ",
            "HX": "HX",
            "WB": "WB",
            "WB2": "WB2",
            "HZ": "HZ",
            "HQ": "HQ",
            "VS": "VS",
            "VSII": "VSII",
            "WHII": "WHII",
            "WL MY06": "WL MY06",
            "WH": "WH",
            "WL": "WL",
            "VQII": "VQII",
            "VR": "VR",
            "WM MY08": "WM MY08",
            "WM MY09": "WM MY09",
            "WM MY09.5": "WM MY09.5",
            "WK": "WK",
            "WM": "WM",
            "VQ": "VQ",
            "WM MY10": "WM MY10"
        },
        "STANDARD": {
            "FB": "FB",
            "HD": "HD",
            "EH": "EH",
            "EJ": "EJ",
            "EK": "EK",
            "HR": "HR"
        },
        "SUNBIRD": {
            "UC": "UC",
            "LX": "LX"
        },
        "TIGRA": {
            "XC MY06": "XC MY06",
            "XC": "XC"
        },
        "TORANA": {
            "TA": "TA",
            "LC": "LC",
            "LJ": "LJ",
            "HB": "HB",
            "LH": "LH",
            "UC": "UC",
            "LX": "LX"
        },
        "VECTRA": {
            "JR": "JR",
            "JS": "JS",
            "JSII": "JSII",
            "ZC MY04": "ZC MY04",
            "ZC MY05 UPGRADE": "ZC MY05 UPGRADE",
            "ZC": "ZC"
        },
        "VIVA": {
            "JF MY07": "JF MY07",
            "JF MY08": "JF MY08",
            "JF MY09": "JF MY09",
            "JF": "JF",
            "JF MY08 UPGRADE": "JF MY08 UPGRADE"
        },
        "ZAFIRA": {
            "TT": "TT",
            "ZJ": "ZJ"
        },
        "ACCORD": {
            "40": "40",
            "MY05 UPGRADE": "MY05 UPGRADE",
            "MY06 UPGRADE": "MY06 UPGRADE",
            "10": "10",
            "MY06": "MY06",
            "40 MY06 UPGRADE": "40 MY06 UPGRADE",
            "50": "50",
            "MY09": "MY09",
            "10 MY11": "10 MY11",
            "10 MY12": "10 MY12",
            "10 MY13": "10 MY13",
            "10 MY14": "10 MY14",
            "60": "60",
            "50 MY10": "50 MY10",
            "50 MY11": "50 MY11",
            "50 MY12": "50 MY12",
            "60 MY16": "60 MY16",
            "60 MY17": "60 MY17",
            "60 MY18": "60 MY18",
            "MY19": "MY19",
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "CIVIC": {
            "7TH GEN": "7TH GEN",
            "MY07": "MY07",
            "40": "40",
            "MY08": "MY08",
            "30": "30",
            "MY09": "MY09",
            "FK MY14": "FK MY14",
            "FK": "FK",
            "MY10": "MY10",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY15": "MY15",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY16": "MY16",
            "FK MY11": "FK MY11",
            "MY11": "MY11",
            "SERIES 2 MY14": "SERIES 2 MY14",
            "SERIES 2 MY15": "SERIES 2 MY15",
            "SERIES 2": "SERIES 2",
            "SERIES 2 UPGRADE": "SERIES 2 UPGRADE",
            "FK MY13": "FK MY13",
            "FK MY15": "FK MY15",
            "30 MY09": "30 MY09",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22",
            "MY23": "MY23"
        },
        "INTEGRA": {
            "4TH GEN": "4TH GEN",
            "2005 UPGRADE": "2005 UPGRADE"
        },
        "JAZZ": {
            "MY06": "MY06",
            "GE": "GE",
            "UPGRADE": "UPGRADE",
            "GE MY12": "GE MY12",
            "GE MY16": "GE MY16",
            "MY19": "MY19",
            "GE MY12 UPDATE": "GE MY12 UPDATE",
            "GK MY15": "GK MY15",
            "GK MY17": "GK MY17",
            "GK MY16": "GK MY16",
            "GK MY18": "GK MY18",
            "GK MY19": "GK MY19",
            "GK MY20": "GK MY20",
            "GK MY21": "GK MY21",
            "MY21": "MY21"
        },
        "LEGEND": {
            "30": "30",
            "30 MY09": "30 MY09"
        },
        "ODYSSEY": {
            "20": "20",
            "20 MY06 UPGRADE": "20 MY06 UPGRADE",
            "RB MY11": "RB MY11",
            "RB MY12": "RB MY12",
            "RB MY13": "RB MY13",
            "RB": "RB",
            "RC MY15": "RC MY15",
            "RC MY16": "RC MY16",
            "RC MY17": "RC MY17",
            "RC MY18": "RC MY18",
            "RC": "RC",
            "RC MY19": "RC MY19",
            "RC MY20": "RC MY20",
            "RC MY21": "RC MY21"
        },
        "S2000": {
            "MY06": "MY06"
        },
        "SV": {
            "VP": "VP",
            "VTII": "VTII",
            "VN": "VN"
        },
        "CLUBSPORT": {
            "VR": "VR",
            "VS": "VS",
            "VSII": "VSII",
            "VT": "VT",
            "VTII": "VTII",
            "VX": "VX",
            "VXII": "VXII",
            "YII": "YII",
            "Y-SERIES": "Y-SERIES",
            "Z SERIES": "Z SERIES",
            "VPII": "VPII",
            "E SERIES MY08 UPGRA": "E SERIES MY08 UPGRA",
            "E SERIES": "E SERIES",
            "E-SERIES MY08 UPGRA": "E-SERIES MY08 UPGRA",
            "GEN F MY15": "GEN F MY15",
            "E3 MY12.5": "E3 MY12.5",
            "GEN F": "GEN F",
            "E2 SERIES": "E2 SERIES",
            "E3 MY12": "E3 MY12",
            "E3": "E3",
            "GEN F2": "GEN F2",
            "GEN-F2": "GEN-F2"
        },
        "COUPE": {
            "Z SERIES": "Z SERIES",
            "V3": "V3",
            "V2": "V2",
            "V2 SERIES 3": "V2 SERIES 3",
            "V2 SERIES 2": "V2 SERIES 2",
            "Z-SERIES": "Z-SERIES"
        },
        "GRANGE": {
            "WM MY08 UPGRADE": "WM MY08 UPGRADE",
            "WK": "WK",
            "WL": "WL",
            "WM": "WM",
            "WH": "WH",
            "VSII": "VSII",
            "WHII": "WHII",
            "WM3 MY12": "WM3 MY12",
            "GEN F MY15": "GEN F MY15",
            "E3 MY12.5": "E3 MY12.5",
            "WM2 SERIES": "WM2 SERIES",
            "GEN F2": "GEN F2",
            "GEN F": "GEN F",
            "WM3": "WM3",
            "GEN-F2": "GEN-F2"
        },
        "MANTA": {
            "VS": "VS",
            "VSII": "VSII",
            "VT": "VT"
        },
        "SENATOR": {
            "VP": "VP",
            "VR": "VR",
            "YII": "YII",
            "Y-SERIES": "Y-SERIES",
            "Z SERIES": "Z SERIES",
            "VT": "VT",
            "VS": "VS",
            "VSII": "VSII",
            "VX": "VX",
            "E SERIES MY08 UPGRA": "E SERIES MY08 UPGRA",
            "VTII": "VTII",
            "E SERIES": "E SERIES",
            "VXII": "VXII",
            "E-SERIES MY08 UPGRA": "E-SERIES MY08 UPGRA",
            "GEN F2": "GEN F2",
            "E3 MY12": "E3 MY12",
            "E3 MY12.5": "E3 MY12.5",
            "E3": "E3",
            "GEN F MY15": "GEN F MY15",
            "E2 SERIES": "E2 SERIES",
            "GEN F": "GEN F"
        },
        "SPORT": {
            "VP": "VP"
        },
        "SV300": {
            "VXII": "VXII"
        },
        "SV6000": {
            "Z SERIES": "Z SERIES"
        },
        "XU6": {
            "VT": "VT",
            "VTII": "VTII",
            "VX": "VX",
            "VXII": "VXII"
        },
        "XU8": {
            "VT": "VT"
        },
        "COUPE FX": {
            "RDII": "RDII"
        },
        "COUPE SX": {
            "RDII": "RDII"
        },
        "ACCENT": {
            "MC": "MC",
            "LC": "LC",
            "LS": "LS",
            "RB2 MY15": "RB2 MY15",
            "RB3 MY16": "RB3 MY16",
            "RB4 MY17": "RB4 MY17",
            "RB4 MY16": "RB4 MY16",
            "RB2": "RB2",
            "RB": "RB",
            "RB3": "RB3",
            "RB6 MY18": "RB6 MY18",
            "RB5": "RB5",
            "RB3 MY15": "RB3 MY15",
            "RB6 MY19": "RB6 MY19"
        },
        "ELANTRA": {
            "XD MY05": "XD MY05",
            "XD": "XD",
            "XD 05 UPGRADE": "XD 05 UPGRADE",
            "HD": "HD",
            "AD MY18": "AD MY18",
            "AD": "AD",
            "MD SERIES 2 (MD3)": "MD SERIES 2 (MD3)",
            "MD2": "MD2",
            "MD": "MD",
            "AD.2 MY19": "AD.2 MY19",
            "AD.2 MY20": "AD.2 MY20"
        },
        "ELANTRA LAVITA": {
            "FC": "FC"
        },
        "EXCEL": {
            "X3": "X3",
            "X2": "X2"
        },
        "GETZ": {
            "TB MY09": "TB MY09",
            "TB UPGRADE": "TB UPGRADE",
            "TB": "TB"
        },
        "GRANDEUR": {
            "TG MY09": "TG MY09",
            "TG": "TG",
            "TG MY11": "TG MY11"
        },
        "i30": {
            "FD MY09": "FD MY09",
            "FD": "FD",
            "GD MY14": "GD MY14",
            "GD3 SERIES 2": "GD3 SERIES 2",
            "GD4 SERIES 2 UPDATE": "GD4 SERIES 2 UPDATE",
            "PD2": "PD2",
            "GD4 SERIES 2": "GD4 SERIES 2",
            "GD": "GD",
            "PD": "PD",
            "FD MY11": "FD MY11",
            "FD MY12": "FD MY12",
            "FD MY10": "FD MY10",
            "PDe": "PDe",
            "GD3 SERIES 2 UPDATE": "GD3 SERIES 2 UPDATE",
            "GD5 SERIES 2 UPGRAD": "GD5 SERIES 2 UPGRAD",
            "GDe3 SERIES 2": "GDe3 SERIES 2",
            "GDe4": "GDe4",
            "PD2 UPDATE": "PD2 UPDATE",
            "PD2 MY19": "PD2 MY19",
            "PD UPDATE": "PD UPDATE",
            "PD MY19": "PD MY19",
            "PD.3 MY19": "PD.3 MY19",
            "PDe.2": "PDe.2",
            "PDe.3": "PDe.3",
            "PD2 MY20": "PD2 MY20",
            "PD.3 MY20": "PD.3 MY20",
            "PDe.3 MY20": "PDe.3 MY20",
            "PD.V4 MY21": "PD.V4 MY21",
            "CN7.V1 MY21": "CN7.V1 MY21",
            "PDe.V4 MY22": "PDe.V4 MY22",
            "PD.V4 MY22": "PD.V4 MY22",
            "CN7.V1 MY22": "CN7.V1 MY22",
            "PDE.V5 MY22": "PDE.V5 MY22",
            "CN7.V1 MY23": "CN7.V1 MY23",
            "PDe.V5 MY23": "PDe.V5 MY23"
        },
        "iMAX": {
            "TQ": "TQ",
            "TQ MY11": "TQ MY11",
            "TQ MY13": "TQ MY13",
            "TQ SERIES II (TQ3)": "TQ SERIES II (TQ3)",
            "TQ4 MY19": "TQ4 MY19",
            "TQ4 MY20": "TQ4 MY20",
            "TQ4 MY21": "TQ4 MY21"
        },
        "LANTRA": {
            "J2": "J2"
        },
        "SONATA": {
            "NF": "NF",
            "NF MY09": "NF MY09",
            "EF-B": "EF-B",
            "LF": "LF",
            "LF2": "LF2",
            "LF3 MY17": "LF3 MY17",
            "LF4 MY18": "LF4 MY18",
            "LF4 MY19": "LF4 MY19",
            "DN8.V1 MY21": "DN8.V1 MY21",
            "DN8.V1 MY22": "DN8.V1 MY22",
            "DN8.V2 MY22": "DN8.V2 MY22",
            "DN8.V2 MY23": "DN8.V2 MY23"
        },
        "TIBURON": {
            "MY07": "MY07",
            "05 UPGRADE": "05 UPGRADE"
        },
        "XK": {
            "X150": "X150",
            "X150 MY10": "X150 MY10",
            "X150 MY13": "X150 MY13",
            "X150 MY15": "X150 MY15"
        },
        "E TYPE": {
            "SERIES 1": "SERIES 1",
            "SERIES 2": "SERIES 2",
            "SERIES 1.5": "SERIES 1.5",
            "SERIES 1 2+2": "SERIES 1 2+2",
            "SERIES 2 2+2": "SERIES 2 2+2",
            "SERIES 3 2+2": "SERIES 3 2+2",
            "SERIES 1.5 2+2": "SERIES 1.5 2+2",
            "SERIES 3": "SERIES 3"
        },
        "S TYPE": {
            "05 UPGRADE": "05 UPGRADE",
            "MY06": "MY06",
            "MY01": "MY01"
        },
        "XJ6": {
            "XJ350 MY08": "XJ350 MY08",
            "XJ350": "XJ350",
            "SERIES I": "SERIES I",
            "XJ350 MY06": "XJ350 MY06",
            "SERIES II": "SERIES II",
            "SERIES III": "SERIES III"
        },
        "XJ8": {
            "XJ350 MY08": "XJ350 MY08",
            "XJ350": "XJ350",
            "XJ350 MY06": "XJ350 MY06"
        },
        "XJR": {
            "XJ350": "XJ350",
            "XJ350 MY06": "XJ350 MY06"
        },
        "XK8": {
            "MY03": "MY03",
            "MY01": "MY01"
        },
        "XKR": {
            "MY03": "MY03",
            "X150": "X150",
            "MY01": "MY01",
            "X150 MY13": "X150 MY13",
            "X150 MY15": "X150 MY15",
            "X150 MY10": "X150 MY10"
        },
        "X TYPE": {
            "MY09": "MY09",
            "MY06": "MY06",
            "MY08": "MY08",
            "MY05 UPGRADE": "MY05 UPGRADE"
        },
        "CARNIVAL": {
            "KV11": "KV11",
            "VQ": "VQ",
            "VQ MY11": "VQ MY11",
            "YP MY15": "YP MY15",
            "YP MY16": "YP MY16",
            "YP MY16 UPDATE": "YP MY16 UPDATE",
            "YP MY17": "YP MY17",
            "YP MY18": "YP MY18",
            "YP MY19": "YP MY19",
            "VQ MY09": "VQ MY09",
            "YP": "YP",
            "YP PE MY19": "YP PE MY19",
            "YP PE MY20": "YP PE MY20",
            "KA4 MY21": "KA4 MY21",
            "KA4 MY22": "KA4 MY22",
            "KA4 MY23": "KA4 MY23"
        },
        "CERATO": {
            "LD": "LD",
            "TD MY10": "TD MY10",
            "TD MY11": "TD MY11",
            "TD MY12": "TD MY12",
            "TD MY13": "TD MY13",
            "YD MY14": "YD MY14",
            "YD MY15": "YD MY15",
            "YD MY16": "YD MY16",
            "YD MY17": "YD MY17",
            "YD MY18": "YD MY18",
            "BD MY19": "BD MY19",
            "TD": "TD",
            "YD": "YD",
            "BD MY20": "BD MY20",
            "BD MY21": "BD MY21",
            "BD MY22": "BD MY22",
            "BDMY22": "BDMY22",
            "BD MY23": "BD MY23"
        },
        "GRAND CARNIVAL": {
            "VQ": "VQ",
            "VQ MY11": "VQ MY11",
            "VQ MY12": "VQ MY12",
            "VQ MY13": "VQ MY13",
            "VQ MY14": "VQ MY14"
        },
        "MAGENTIS": {
            "MG": "MG"
        },
        "OPTIMA": {
            "GD": "GD",
            "JF MY17": "JF MY17",
            "JF MY18": "JF MY18",
            "JF": "JF",
            "TF MY13": "TF MY13",
            "TF MY14": "TF MY14",
            "TF MY15": "TF MY15",
            "TF": "TF",
            "JF MY19": "JF MY19",
            "JF MY16": "JF MY16",
            "PE MY19": "PE MY19",
            "PE MY20": "PE MY20",
            "JF MY20": "JF MY20"
        },
        "RONDO": {
            "UN": "UN",
            "RP MY17": "RP MY17",
            "RP MY18": "RP MY18",
            "UN MY10": "UN MY10",
            "RP MY15": "RP MY15",
            "RP MY16": "RP MY16",
            "RP": "RP",
            "UN MY11": "UN MY11"
        },
        "RIO": {
            "BC": "BC",
            "JB": "JB",
            "JB MY10": "JB MY10",
            "JB MY11": "JB MY11",
            "UB MY13": "UB MY13",
            "UB MY14": "UB MY14",
            "UB MY15": "UB MY15",
            "UB MY16": "UB MY16",
            "YB": "YB",
            "YB MY18": "YB MY18",
            "UB": "UB",
            "YB MY19": "YB MY19",
            "YB MY17": "YB MY17",
            "YB MY20": "YB MY20",
            "YB PE MY21": "YB PE MY21",
            "YB PE MY22": "YB PE MY22",
            "YB PE MY23": "YB PE MY23"
        },
        "SPECTRA": {
            "FB": "FB"
        },
        "GALLARDO": {
            "L140": "L140"
        },
        "MURCIELAGO": {
            "MY07": "MY07"
        },
        "ES300": {
            "VCV10R": "VCV10R",
            "MCV30R": "MCV30R",
            "MCV20R": "MCV20R"
        },
        "GS460": {
            "URS190R MY08": "URS190R MY08",
            "URS190R MY09 UPGRAD": "URS190R MY09 UPGRAD"
        },
        "GS450h": {
            "GWS191R MY08": "GWS191R MY08",
            "GWS191R": "GWS191R",
            "GWL10R MY14": "GWL10R MY14",
            "GWL10R MY15": "GWL10R MY15",
            "GWL10R MY16": "GWL10R MY16",
            "GWL10R MY17": "GWL10R MY17",
            "GWL10R": "GWL10R",
            "GWS191R MY09 UPGRAD": "GWS191R MY09 UPGRAD"
        },
        "GS300": {
            "JZS160R": "JZS160R",
            "GRS190R": "GRS190R",
            "GRS190R MY08": "GRS190R MY08",
            "ARL10R MY17": "ARL10R MY17",
            "GRS190R MY09 UPGRAD": "GRS190R MY09 UPGRAD"
        },
        "GS430": {
            "UZS190R": "UZS190R"
        },
        "IS200": {
            "GXE10R": "GXE10R"
        },
        "IS300": {
            "JCE10R": "JCE10R",
            "ASE30R MY17": "ASE30R MY17",
            "ASE30R": "ASE30R",
            "ASE30R FACELIFT BMC": "ASE30R FACELIFT BMC"
        },
        "IS250": {
            "GSE20R 08 UPGRADE": "GSE20R 08 UPGRADE",
            "GSE20R": "GSE20R",
            "GSE20R 09 UPGRADE": "GSE20R 09 UPGRADE",
            "GSE20R MY11": "GSE20R MY11",
            "GSE30R MY15": "GSE30R MY15",
            "GSE30R": "GSE30R",
            "GSE20R MY11 UPDATE": "GSE20R MY11 UPDATE"
        },
        "IS F": {
            "USE20R": "USE20R",
            "USE20R 09 UPGRADE": "USE20R 09 UPGRADE",
            "USE20R 11 UPGRADE": "USE20R 11 UPGRADE"
        },
        "LS430": {
            "UCF30R": "UCF30R"
        },
        "LS460": {
            "USF40R": "USF40R",
            "USF40R MY10": "USF40R MY10"
        },
        "LS400": {
            "UCF10R": "UCF10R",
            "UCF20R": "UCF20R"
        },
        "LS600hL": {
            "UVF46R": "UVF46R",
            "UVF46R MY13": "UVF46R MY13"
        },
        "SC430": {
            "UZZ40R UPGRADE": "UZZ40R UPGRADE",
            "UZZ40R MY05 UPGRADE": "UZZ40R MY05 UPGRADE",
            "UZZ40R": "UZZ40R"
        },
        "ELAN": {
            "130": "130"
        },
        "ELISE": {
            "MY02": "MY02",
            "MY04": "MY04",
            "MY00": "MY00",
            "MY07": "MY07",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY12 UPGRADE": "MY12 UPGRADE",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY18": "MY18",
            "MY17.5": "MY17.5",
            "MY19": "MY19",
            "111 MY20": "111 MY20",
            "111 MY20.5": "111 MY20.5",
            "111 MY21": "111 MY21",
            "111 MY22": "111 MY22"
        },
        "EUROPA": {
            "MY07": "MY07"
        },
        "EXIGE": {
            "MY07": "MY07",
            "MY08": "MY08",
            "MY12": "MY12",
            "MY15": "MY15",
            "MY18": "MY18",
            "MY16": "MY16",
            "MY19": "MY19",
            "111 MY20": "111 MY20",
            "111 MY20.5": "111 MY20.5",
            "111 MY21": "111 MY21",
            "111 MY22": "111 MY22"
        },
        "57": {
            "240": "240"
        },
        "62": {
            "240": "240"
        },
        "MAZDA2": {
            "DE": "DE",
            "DY": "DY",
            "DY MY05 UPGRADE": "DY MY05 UPGRADE",
            "DJ MY17": "DJ MY17",
            "DL MY17": "DL MY17",
            "DE MY10": "DE MY10",
            "DE MY11": "DE MY11",
            "DE MY12": "DE MY12",
            "DE MY13": "DE MY13",
            "DJ": "DJ",
            "DJ MY16": "DJ MY16",
            "DE MY14": "DE MY14",
            "DL": "DL",
            "200Q": "200Q",
            "200R": "200R"
        },
        "MAZDA6": {
            "GG 05 UPGRADE": "GG 05 UPGRADE",
            "GG": "GG",
            "GH": "GH",
            "GY": "GY",
            "GG MY07": "GG MY07",
            "6C MY18 (GL)": "6C MY18 (GL)",
            "6C MY14 UPGRADE": "6C MY14 UPGRADE",
            "6C MY15": "6C MY15",
            "6C MY17 (GL)": "6C MY17 (GL)",
            "6C": "6C",
            "GH MY10": "GH MY10",
            "GH MY09": "GH MY09",
            "GH MY11": "GH MY11",
            "GL": "GL",
            "600S": "600S",
            "600T": "600T"
        },
        "323": {
            "BJ": "BJ",
            "SerII": "SerII"
        },
        "626": {
            "GF": "GF"
        },
        "MAZDA3": {
            "BK MY08": "BK MY08",
            "BK": "BK",
            "BK MY06 UPGRADE": "BK MY06 UPGRADE",
            "BN MY18": "BN MY18",
            "BL 10 UPGRADE": "BL 10 UPGRADE",
            "BL 11 UPGRADE": "BL 11 UPGRADE",
            "BL MY13": "BL MY13",
            "BL": "BL",
            "BM": "BM",
            "BM MY15": "BM MY15",
            "BN MY17": "BN MY17",
            "BL SERIES 2 MY13": "BL SERIES 2 MY13",
            "BP": "BP",
            "300N": "300N",
            "300P": "300P"
        },
        "MPV": {
            "LV": "LV",
            "LW": "LW",
            "LWA2": "LWA2",
            "LW10J2": "LW10J2"
        },
        "MX-5": {
            "NB": "NB",
            "NC MY06 UPGRADE": "NC MY06 UPGRADE",
            "NC": "NC",
            "NA": "NA",
            "K": "K",
            "NC MY09": "NC MY09",
            "K MY18": "K MY18",
            "ND (K) MY18": "ND (K) MY18",
            "NC MY13": "NC MY13",
            "K MY17": "K MY17",
            "ND (K) MY17": "ND (K) MY17",
            "K MY19": "K MY19",
            "ND MY19": "ND MY19",
            "ND": "ND",
            "MX5U": "MX5U",
            "MX5V": "MX5V",
            "MX5W": "MX5W",
            "MX5X": "MX5X"
        },
        "RX-8": {
            "MY06": "MY06",
            "MY08": "MY08"
        },
        "190": {
            "W201": "W201"
        },
        "230": {
            "W123": "W123",
            "W124": "W124"
        },
        "240": {
            "W123": "W123"
        },
        "250": {
            "W123": "W123"
        },
        "260": {
            "W124": "W124"
        },
        "280": {
            "W123": "W123",
            "W116": "W116",
            "W126": "W126"
        },
        "300": {
            "W124": "W124",
            "C124": "C124",
            "W123": "W123",
            "W126": "W126",
            "W140": "W140",
            "MY12": "MY12",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY19": "MY19",
            "MY20": "MY20",
            "LX MY21": "LX MY21"
        },
        "450": {
            "W107": "W107"
        },
        "A140": {
            "W168": "W168"
        },
        "A150": {
            "W169": "W169"
        },
        "A160": {
            "W168": "W168"
        },
        "A170": {
            "W169 08 UPGRADE": "W169 08 UPGRADE",
            "W169": "W169",
            "W169 07 UPGRADE": "W169 07 UPGRADE"
        },
        "A180": {
            "W169 08 UPGRADE": "W169 08 UPGRADE",
            "176 MY16": "176 MY16",
            "176 MY17": "176 MY17",
            "176 MY17.5": "176 MY17.5",
            "176 MY18": "176 MY18",
            "W169 09 UPGRADE": "W169 09 UPGRADE",
            "176 MY14": "176 MY14",
            "176 MY15": "176 MY15",
            "176": "176",
            "177 MY19": "177 MY19",
            "V177 MY20": "V177 MY20",
            "W177 MY20": "W177 MY20",
            "W177 MY20.5": "W177 MY20.5",
            "V177 MY19": "V177 MY19",
            "W177 MY21": "W177 MY21",
            "V177 MY21": "V177 MY21",
            "V177 MY21.5": "V177 MY21.5",
            "W177 MY21.5": "W177 MY21.5",
            "V177 MY22": "V177 MY22",
            "W177 MY22": "W177 MY22",
            "V177 MY22.5": "V177 MY22.5",
            "W177 MY22.5": "W177 MY22.5",
            "V177 MY23": "V177 MY23",
            "W177 MY23": "W177 MY23"
        },
        "A190": {
            "W168": "W168"
        },
        "A200": {
            "W169 08 UPGRADE": "W169 08 UPGRADE",
            "W169": "W169",
            "W169 07 UPGRADE": "W169 07 UPGRADE",
            "176 MY16": "176 MY16",
            "176 MY17": "176 MY17",
            "176 MY17.5": "176 MY17.5",
            "176 MY18": "176 MY18",
            "177": "177",
            "W169 09 UPGRADE": "W169 09 UPGRADE",
            "176 MY14": "176 MY14",
            "176 MY15": "176 MY15",
            "176": "176",
            "177 MY19": "177 MY19",
            "177 MY19.5": "177 MY19.5",
            "V177 MY20": "V177 MY20"
        },
        "B180": {
            "245": "245",
            "245 07 UPGRADE": "245 07 UPGRADE",
            "245 08 UPGRADE": "245 08 UPGRADE",
            "245 MY10": "245 MY10",
            "245 MY11": "245 MY11",
            "246 MY14": "246 MY14",
            "246 MY15": "246 MY15",
            "246 MY16": "246 MY16",
            "246 MY17": "246 MY17",
            "246 MY17.5": "246 MY17.5",
            "246 MY18": "246 MY18",
            "246 MY18.5": "246 MY18.5",
            "246 MY13": "246 MY13",
            "246": "246",
            "W247 MY19.5": "W247 MY19.5",
            "W247 MY20": "W247 MY20",
            "W247 MY20.5": "W247 MY20.5",
            "W247 MY21": "W247 MY21",
            "W247 MY21.5": "W247 MY21.5",
            "W247 MY22": "W247 MY22",
            "W247 MY22.5": "W247 MY22.5",
            "W247 MY23": "W247 MY23",
            "W247 MY18.5": "W247 MY18.5"
        },
        "B200": {
            "245": "245",
            "245 07 UPGRADE": "245 07 UPGRADE",
            "245 08 UPGRADE": "245 08 UPGRADE",
            "245 MY10": "245 MY10",
            "245 MY11": "245 MY11",
            "246 MY14": "246 MY14",
            "246 MY15": "246 MY15",
            "246 MY16": "246 MY16",
            "246 MY17": "246 MY17",
            "246 MY17.5": "246 MY17.5",
            "246 MY18": "246 MY18",
            "246 MY18.5": "246 MY18.5",
            "246 MY13": "246 MY13",
            "246": "246",
            "W247 MY18.5": "W247 MY18.5"
        },
        "C180": {
            "CL203": "CL203",
            "W203": "W203",
            "W202": "W202",
            "CL203 MY06": "CL203 MY06",
            "CL203 UPGRADE": "CL203 UPGRADE",
            "W203 MY06": "W203 MY06",
            "W203 MY07 UPGRADE": "W203 MY07 UPGRADE",
            "W203 UPGRADE": "W203 UPGRADE",
            "W204 MY14": "W204 MY14",
            "W204 MY15": "W204 MY15",
            "W204 MY11": "W204 MY11",
            "W204 MY12": "W204 MY12",
            "W204 MY13": "W204 MY13"
        },
        "C200": {
            "W202": "W202",
            "W204": "W204",
            "S203": "S203",
            "W203": "W203",
            "W203 MY06": "W203 MY06",
            "W203 MY07 UPGRADE": "W203 MY07 UPGRADE",
            "W203 UPGRADE": "W203 UPGRADE",
            "CL203": "CL203",
            "CL203 MY06": "CL203 MY06",
            "CL203 UPGRADE": "CL203 UPGRADE",
            "W204 MY14": "W204 MY14",
            "205": "205",
            "205 MY16": "205 MY16",
            "205 MY17": "205 MY17",
            "205 MY17.5": "205 MY17.5",
            "205 MY18": "205 MY18",
            "W204 MY11": "W204 MY11",
            "W204 MY12": "W204 MY12",
            "W204 MY13": "W204 MY13",
            "W204 MY10": "W204 MY10",
            "W204 MY10 UPGRADE": "W204 MY10 UPGRADE",
            "205 MY19": "205 MY19",
            "A205 MY20": "A205 MY20",
            "C205 MY20": "C205 MY20",
            "S205 MY20": "S205 MY20",
            "W205 MY20": "W205 MY20",
            "A205 MY20.5": "A205 MY20.5",
            "C205 MY20.5": "C205 MY20.5",
            "S205 MY20.5": "S205 MY20.5",
            "W205 MY20.5": "W205 MY20.5",
            "A205 MY21": "A205 MY21",
            "C205 MY21": "C205 MY21",
            "S205 MY21": "S205 MY21",
            "W205 MY21": "W205 MY21",
            "A205 MY21.5": "A205 MY21.5",
            "C205 MY21.5": "C205 MY21.5",
            "A205 MY22": "A205 MY22",
            "C205 MY22": "C205 MY22",
            "W206 MY22": "W206 MY22",
            "W206 MY23": "W206 MY23",
            "A205 MY23": "A205 MY23",
            "C205 MY23": "C205 MY23",
            "A205 MY23.5": "A205 MY23.5",
            "C205 MY23.5": "C205 MY23.5",
            "W206 MY23.5": "W206 MY23.5"
        },
        "C220": {
            "W204": "W204",
            "W203": "W203",
            "W203 MY06": "W203 MY06",
            "W203 MY07 UPGRADE": "W203 MY07 UPGRADE",
            "W203 UPGRADE": "W203 UPGRADE",
            "W204 MY10": "W204 MY10",
            "W204 MY10 UPGRADE": "W204 MY10 UPGRADE",
            "205 MY17.5": "205 MY17.5",
            "205 MY18": "205 MY18",
            "205 MY19": "205 MY19",
            "S205 MY20": "S205 MY20",
            "W205 MY20": "W205 MY20",
            "S205 MY20.5": "S205 MY20.5",
            "W205 MY20.5": "W205 MY20.5"
        },
        "C230": {
            "W203 MY06": "W203 MY06",
            "W203 MY07 UPGRADE": "W203 MY07 UPGRADE",
            "CL203 MY06": "CL203 MY06",
            "CL203": "CL203",
            "CL203 UPGRADE": "CL203 UPGRADE"
        },
        "C240": {
            "W203": "W203",
            "W203 UPGRADE": "W203 UPGRADE",
            "W202": "W202"
        },
        "C250": {
            "W202": "W202",
            "W204 MY14": "W204 MY14",
            "205": "205",
            "205 MY16": "205 MY16",
            "205 MY17": "205 MY17",
            "W204 MY15": "W204 MY15",
            "W204 MY11": "W204 MY11",
            "W204 MY12": "W204 MY12",
            "W204 MY13": "W204 MY13",
            "W204 MY10 UPGRADE": "W204 MY10 UPGRADE",
            "W204 MY10": "W204 MY10",
            "205 MY17.5": "205 MY17.5",
            "205 MY18": "205 MY18",
            "C204 MY12": "C204 MY12",
            "C204 MY13": "C204 MY13"
        },
        "C280": {
            "W204": "W204",
            "W202": "W202"
        },
        "C320": {
            "W203": "W203",
            "W203 UPGRADE": "W203 UPGRADE",
            "W204": "W204",
            "CL203 UPGRADE": "CL203 UPGRADE"
        },
        "C350": {
            "W203 MY06": "W203 MY06",
            "W203 MY07 UPGRADE": "W203 MY07 UPGRADE",
            "W204 MY14": "W204 MY14",
            "W204 MY15": "W204 MY15",
            "W204 MY11": "W204 MY11",
            "W204 MY12": "W204 MY12",
            "W204 MY13": "W204 MY13",
            "W204 MY10": "W204 MY10",
            "W204 MY10 UPGRADE": "W204 MY10 UPGRADE",
            "205": "205",
            "205 MY17": "205 MY17",
            "205 MY17.5": "205 MY17.5",
            "205 MY18": "205 MY18"
        },
        "C32": {
            "W203": "W203"
        },
        "C43": {
            "W202": "W202"
        },
        "C55": {
            "W203 UPGRADE": "W203 UPGRADE",
            "W203 MY06": "W203 MY06"
        },
        "C63": {
            "W204": "W204",
            "205": "205",
            "W204 MY14": "W204 MY14",
            "W204 MY10": "W204 MY10",
            "W204 MY11": "W204 MY11",
            "W204 MY12": "W204 MY12",
            "W204 MY13": "W204 MY13"
        },
        "CLK240": {
            "C209": "C209"
        },
        "CLK500": {
            "C209 07 UPGRADE": "C209 07 UPGRADE",
            "A209": "A209",
            "C209 MY06": "C209 MY06",
            "C209 MY07": "C209 MY07",
            "C209": "C209"
        },
        "CLK320": {
            "A209": "A209",
            "C209": "C209"
        },
        "CL500": {
            "C216 07 UPGRADE": "C216 07 UPGRADE",
            "C215": "C215",
            "C216": "C216"
        },
        "CL600": {
            "C216 07 UPGRADE": "C216 07 UPGRADE",
            "C215": "C215",
            "C216": "C216"
        },
        "CLK55": {
            "A209": "A209",
            "C209": "C209",
            "C209 MY06": "C209 MY06"
        },
        "CLK63": {
            "C209": "C209",
            "C209 07 UPGRADE": "C209 07 UPGRADE",
            "C209 MY07": "C209 MY07"
        },
        "CLK280": {
            "C209 MY06": "C209 MY06",
            "C209 07 UPGRADE": "C209 07 UPGRADE"
        },
        "CLK350": {
            "C209 MY06": "C209 MY06",
            "C209 07 UPGRADE": "C209 07 UPGRADE"
        },
        "CL": {
            "C216 07 UPGRADE": "C216 07 UPGRADE",
            "C216": "C216",
            "C215": "C215"
        },
        "CLS": {
            "219": "219",
            "219 07 UPGRADE": "219 07 UPGRADE",
            "219 08 UPGRADE": "219 08 UPGRADE",
            "257": "257",
            "218 MY16 UPGRADE": "218 MY16 UPGRADE",
            "218 MY16.5": "218 MY16.5",
            "218 MY13": "218 MY13",
            "218": "218",
            "218 MY13 UPDATE": "218 MY13 UPDATE",
            "218 MY15": "218 MY15",
            "218 MY16": "218 MY16",
            "219 MY11": "219 MY11",
            "257 MY19": "257 MY19",
            "257 MY19.5": "257 MY19.5",
            "C257 MY20": "C257 MY20",
            "C257 MY20.5": "C257 MY20.5",
            "C257 MY21.5": "C257 MY21.5",
            "C257 MY22": "C257 MY22"
        },
        "E200K": {
            "W210": "W210",
            "211": "211",
            "211 MY06 UPGRADE": "211 MY06 UPGRADE",
            "211 MY07 UPGRADE": "211 MY07 UPGRADE"
        },
        "E230": {
            "W210": "W210"
        },
        "E240": {
            "W210": "W210",
            "211": "211"
        },
        "E270": {
            "211": "211",
            "W210": "W210"
        },
        "E280": {
            "W124": "W124",
            "211 MY06 UPGRADE": "211 MY06 UPGRADE",
            "211 MY07 UPGRADE": "211 MY07 UPGRADE",
            "W210": "W210"
        },
        "E300": {
            "W124": "W124",
            "W210": "W210",
            "213": "213",
            "213 MY17.5": "213 MY17.5",
            "238": "238",
            "238 MY18": "238 MY18",
            "213 MY18": "213 MY18",
            "238 MY17.5": "238 MY17.5",
            "212 MY13": "212 MY13",
            "212 MY14": "212 MY14",
            "212 MY15": "212 MY15",
            "212 MY15 UPGRADE": "212 MY15 UPGRADE",
            "238 MY19": "238 MY19",
            "213 MY19.5": "213 MY19.5",
            "238 MY19.5": "238 MY19.5",
            "A238 MY20": "A238 MY20",
            "C238 MY20": "C238 MY20",
            "W213 MY20": "W213 MY20",
            "A238 MY20.5": "A238 MY20.5",
            "C238 MY20.5": "C238 MY20.5",
            "W213 MY20.5": "W213 MY20.5",
            "A238 MY21": "A238 MY21",
            "C238 MY21": "C238 MY21",
            "W213 MY21": "W213 MY21",
            "A238 MY21.5": "A238 MY21.5",
            "C238 MY21.5": "C238 MY21.5",
            "W213 MY21.5": "W213 MY21.5",
            "W213 MY22": "W213 MY22",
            "W213 MY22.5": "W213 MY22.5",
            "W213 MY23": "W213 MY23",
            "W213 MY23.5": "W213 MY23.5"
        },
        "E320": {
            "W124": "W124",
            "W210": "W210",
            "211": "211"
        },
        "E350": {
            "211": "211",
            "211 MY06 UPGRADE": "211 MY06 UPGRADE",
            "211 MY07 UPGRADE": "211 MY07 UPGRADE",
            "212 MY12": "212 MY12",
            "207": "207",
            "207 MY11": "207 MY11",
            "212": "212",
            "212 MY11": "212 MY11",
            "213": "213",
            "213 MY17.5": "213 MY17.5",
            "213 MY18": "213 MY18",
            "213 MY19": "213 MY19",
            "213 MY19.5": "213 MY19.5",
            "W213 MY20": "W213 MY20",
            "W213 MY20.5": "W213 MY20.5",
            "W213 MY21.5": "W213 MY21.5",
            "A238 MY21.5": "A238 MY21.5",
            "C238 MY21.5": "C238 MY21.5",
            "W213 MY22": "W213 MY22",
            "A238 MY22": "A238 MY22",
            "C238 MY22": "C238 MY22",
            "A238 MY22.5": "A238 MY22.5",
            "C238 MY22.5": "C238 MY22.5",
            "W213 MY22.5": "W213 MY22.5",
            "W213 MY23": "W213 MY23",
            "A238 MY23": "A238 MY23",
            "C238 MY23": "C238 MY23",
            "W213 MY23.5": "W213 MY23.5",
            "A238 MY23.5": "A238 MY23.5",
            "C238 MY23.5": "C238 MY23.5"
        },
        "E430": {
            "W210": "W210"
        },
        "E500": {
            "211": "211",
            "211 MY06 UPGRADE": "211 MY06 UPGRADE",
            "211 MY07 UPGRADE": "211 MY07 UPGRADE",
            "211 MY06 UPDATE": "211 MY06 UPDATE",
            "212 MY12": "212 MY12",
            "207": "207",
            "207 MY11": "207 MY11",
            "212": "212",
            "212 MY11": "212 MY11"
        },
        "E55": {
            "W210": "W210",
            "211": "211",
            "211 MY06 UPGRADE": "211 MY06 UPGRADE"
        },
        "E63": {
            "211 MY07 UPGRADE": "211 MY07 UPGRADE",
            "212 MY11": "212 MY11",
            "212 MY12": "212 MY12",
            "212": "212",
            "212 MY15 UPGRADE": "212 MY15 UPGRADE",
            "212 MY13": "212 MY13",
            "212 MY14": "212 MY14",
            "212 MY15": "212 MY15"
        },
        "SLK230": {
            "202": "202"
        },
        "CLC": {
            "203": "203",
            "203 MY10": "203 MY10",
            "203 MY11": "203 MY11"
        },
        "CLK200K": {
            "C209": "C209",
            "C209 MY06": "C209 MY06",
            "C209 07 UPGRADE": "C209 07 UPGRADE"
        },
        "S280": {
            "W140": "W140"
        },
        "S320": {
            "W140": "W140",
            "W220": "W220",
            "221 07 UPGRADE": "221 07 UPGRADE"
        },
        "S350": {
            "W220": "W220",
            "221": "221",
            "221 07 UPGRADE": "221 07 UPGRADE",
            "W220 MY05": "W220 MY05",
            "221 09 UPGRADE": "221 09 UPGRADE",
            "221 MY11": "221 MY11",
            "222 MY11": "222 MY11",
            "222 MY15": "222 MY15",
            "222": "222",
            "222 MY16": "222 MY16",
            "222 MY17": "222 MY17",
            "222 MY18": "222 MY18",
            "222 MY18.5": "222 MY18.5",
            "222 MY19": "222 MY19",
            "222 MY19.5": "222 MY19.5",
            "222 MY20": "222 MY20",
            "W\/V222 MY20": "W\/V222 MY20",
            "W\/V222 MY20.5": "W\/V222 MY20.5"
        },
        "S420": {
            "W140": "W140"
        },
        "S430": {
            "W220": "W220",
            "W220 MY05": "W220 MY05"
        },
        "S500": {
            "221": "221",
            "221 07 UPGRADE": "221 07 UPGRADE",
            "W140": "W140",
            "W220": "W220",
            "W220 MY05": "W220 MY05",
            "221 09 UPGRADE": "221 09 UPGRADE",
            "221 MY11": "221 MY11",
            "222 MY15": "222 MY15",
            "222 MY16": "222 MY16",
            "217": "217",
            "217 MY16": "217 MY16",
            "217 MY17": "217 MY17",
            "222 MY17": "222 MY17",
            "222": "222"
        },
        "S55": {
            "W220": "W220",
            "W220 MY05": "W220 MY05"
        },
        "S600": {
            "W220": "W220",
            "221": "221",
            "221 07 UPGRADE": "221 07 UPGRADE",
            "W220 MY05": "W220 MY05",
            "221 09 UPGRADE": "221 09 UPGRADE",
            "221 MY11": "221 MY11",
            "222": "222",
            "222 MY15": "222 MY15",
            "222 MY17": "222 MY17"
        },
        "S63": {
            "221 07 UPGRADE": "221 07 UPGRADE",
            "217 MY16": "217 MY16",
            "217 MY17": "217 MY17",
            "222 MY17": "222 MY17",
            "222 MY16": "222 MY16",
            "222 MY18": "222 MY18",
            "222 MY18.5": "222 MY18.5",
            "217": "217",
            "222": "222",
            "222 MY15": "222 MY15",
            "221 09 UPGRADE": "221 09 UPGRADE",
            "221 MY11": "221 MY11",
            "217 MY18.5": "217 MY18.5",
            "217 MY19": "217 MY19",
            "217 MY19.5": "217 MY19.5",
            "222 MY19": "222 MY19",
            "222 MY19.5": "222 MY19.5",
            "217 MY20": "217 MY20",
            "222 MY20": "222 MY20",
            "C217 MY20": "C217 MY20",
            "A217 MY20": "A217 MY20",
            "A217 MY20.5": "A217 MY20.5",
            "C217 MY20.5": "C217 MY20.5",
            "W\/V222 MY20": "W\/V222 MY20",
            "W\/V222 MY20.5": "W\/V222 MY20.5",
            "A217 MY21": "A217 MY21",
            "C217 MY21": "C217 MY21"
        },
        "S65": {
            "221": "221",
            "221 07 UPGRADE": "221 07 UPGRADE",
            "W220 MY05": "W220 MY05",
            "217 MY16": "217 MY16",
            "217 MY17": "217 MY17",
            "222 MY16": "222 MY16",
            "222 MY17": "222 MY17",
            "217": "217",
            "221 09 UPGRADE": "221 09 UPGRADE",
            "221 MY11": "221 MY11",
            "217 MY18.5": "217 MY18.5",
            "217 MY19": "217 MY19"
        },
        "SLK200": {
            "202": "202"
        },
        "SLK320": {
            "202": "202"
        },
        "SL280": {
            "R129": "R129"
        },
        "SL350": {
            "R230 06 UPGRADE": "R230 06 UPGRADE",
            "R230 07 UPGRADE": "R230 07 UPGRADE",
            "R230 08 UPGRADE": "R230 08 UPGRADE",
            "R230": "R230",
            "R230 MY11": "R230 MY11"
        },
        "SL500": {
            "R129": "R129",
            "R230 06 UPGRADE": "R230 06 UPGRADE",
            "R230 07 UPGRADE": "R230 07 UPGRADE",
            "R230 08 UPGRADE": "R230 08 UPGRADE",
            "R230": "R230",
            "R230 MY11": "R230 MY11"
        },
        "SL600": {
            "R129": "R129",
            "R230 06 UPGRADE": "R230 06 UPGRADE",
            "R230 07 UPGRADE": "R230 07 UPGRADE",
            "R230 08 UPGRADE": "R230 08 UPGRADE",
            "R230": "R230",
            "R230 MY11": "R230 MY11",
            "222 MY16": "222 MY16"
        },
        "SL": {
            "R230 08 UPGRADE": "R230 08 UPGRADE",
            "R230 06 UPGRADE": "R230 06 UPGRADE",
            "R230 07 UPGRADE": "R230 07 UPGRADE",
            "R230": "R230",
            "R231 MY16": "R231 MY16",
            "R231 MY17": "R231 MY17",
            "R231 MY17.5": "R231 MY17.5",
            "R231": "R231",
            "R230 MY11": "R230 MY11",
            "R231 MY18": "R231 MY18",
            "R231 MY19": "R231 MY19",
            "R231 MY19.5": "R231 MY19.5",
            "231 MY20": "231 MY20"
        },
        "SLK": {
            "R171 07 UPGRADE": "R171 07 UPGRADE",
            "R171 08 UPGRADE": "R171 08 UPGRADE",
            "R171": "R171",
            "202": "202",
            "R172 MY16": "R172 MY16",
            "R172 MY14": "R172 MY14",
            "R172 MY14 UPGRADE": "R172 MY14 UPGRADE",
            "R172 MY15": "R172 MY15",
            "R171 MY10": "R171 MY10",
            "R171 MY11": "R171 MY11",
            "R172": "R172"
        },
        "VIANO": {
            "639 MY06": "639 MY06",
            "639": "639",
            "639 MY10": "639 MY10",
            "639 MY11": "639 MY11",
            "639 MY12": "639 MY12"
        },
        "MGF": {
            "MY01": "MY01"
        },
        "ZT": {
            "05 UPGRADE": "05 UPGRADE"
        },
        "380": {
            "DB": "DB",
            "DB SERIES III": "DB SERIES III",
            "DB SERIES II": "DB SERIES II"
        },
        "COLT": {
            "RZ": "RZ",
            "RG MY07": "RG MY07",
            "RG MY08": "RG MY08",
            "RG MY06 UPGRADE": "RG MY06 UPGRADE",
            "RB": "RB",
            "RC": "RC",
            "RD": "RD",
            "RA": "RA",
            "RE": "RE",
            "RG MY06": "RG MY06",
            "RG": "RG",
            "RG MY11": "RG MY11"
        },
        "CORDIA": {
            "AA": "AA",
            "AB": "AB",
            "AC": "AC"
        },
        "GRANDIS": {
            "BA MY06": "BA MY06",
            "BA": "BA",
            "BA MY07": "BA MY07",
            "BA MY08": "BA MY08",
            "BA MY09": "BA MY09",
            "BA MY10": "BA MY10"
        },
        "MAGNA": {
            "TE": "TE",
            "TF": "TF",
            "TH": "TH",
            "TS": "TS",
            "TJ": "TJ",
            "TL": "TL",
            "TW SERIES II": "TW SERIES II",
            "TN": "TN",
            "TP": "TP",
            "TM": "TM",
            "TR": "TR"
        },
        "MIRAGE": {
            "CE": "CE",
            "LA MY15": "LA MY15",
            "LA MY16": "LA MY16",
            "LA MY17": "LA MY17",
            "LA MY18": "LA MY18",
            "LA": "LA",
            "LA MY19": "LA MY19",
            "LA MY20": "LA MY20",
            "LB MY21": "LB MY21",
            "LB MY22": "LB MY22"
        },
        "NIMBUS": {
            "UF": "UF",
            "UG": "UG",
            "UA": "UA",
            "UB": "UB",
            "UC": "UC"
        },
        "SIGMA": {
            "GH": "GH",
            "GJ": "GJ",
            "GE": "GE",
            "GK": "GK",
            "GN": "GN",
            "GL": "GL"
        },
        "STARION": {
            "JA": "JA",
            "JB": "JB",
            "JD": "JD"
        },
        "STARWAGON": {
            "SF": "SF",
            "SG": "SG",
            "SH": "SH",
            "WA": "WA",
            "SJ": "SJ"
        },
        "VERADA": {
            "KJ": "KJ",
            "KL": "KL",
            "KE": "KE",
            "KH": "KH",
            "KF": "KF",
            "KR": "KR",
            "KS": "KS",
            "KW SERIES II": "KW SERIES II",
            "KJ SERIES II": "KJ SERIES II"
        },
        "200": {
            "S15": "S15"
        },
        "350Z": {
            "Z33 MY05 UPGRADE": "Z33 MY05 UPGRADE",
            "Z33 MY06 UPGRADE": "Z33 MY06 UPGRADE",
            "Z33 MY07": "Z33 MY07",
            "Z33": "Z33"
        },
        "BLUEBIRD": {
            "Ser III": "Ser III",
            "Ser I": "Ser I",
            "Ser II": "Ser II"
        },
        "GT-R": {
            "HR32": "HR32",
            "R35 MY10": "R35 MY10",
            "R35 MY11": "R35 MY11",
            "R35 MY12": "R35 MY12",
            "R35": "R35",
            "R35 MY15": "R35 MY15",
            "R35 MY13": "R35 MY13",
            "R35 MY14": "R35 MY14",
            "R35 MY17": "R35 MY17",
            "R35 MY20": "R35 MY20",
            "R35 MY22": "R35 MY22"
        },
        "MAXIMA": {
            "A32": "A32",
            "A31": "A31",
            "A33": "A33",
            "J31": "J31",
            "J31 MY06": "J31 MY06",
            "J32 MY11 SERIES 3": "J32 MY11 SERIES 3",
            "J32": "J32"
        },
        "MICRA": {
            "K12": "K12",
            "K13": "K13",
            "K13 MY13": "K13 MY13",
            "K13 UPGRADE": "K13 UPGRADE",
            "K13 MY15": "K13 MY15"
        },
        "PULSAR": {
            "N16": "N16",
            "N15II": "N15II",
            "N15": "N15",
            "N16 MY03": "N16 MY03",
            "N16 MY04": "N16 MY04",
            "C12": "C12",
            "C12 SERIES 2": "C12 SERIES 2",
            "B17 SERIES 2": "B17 SERIES 2",
            "B17 SERIES 2 UPGRAD": "B17 SERIES 2 UPGRAD",
            "B17": "B17"
        },
        "TIIDA": {
            "C11 MY07": "C11 MY07",
            "C11": "C11",
            "C11 SERIES 3 MY10": "C11 SERIES 3 MY10",
            "C11 SERIES 4": "C11 SERIES 4"
        },
        "306": {
            "N5": "N5",
            "NB": "NB"
        },
        "307": {
            "MY06 UPGRADE": "MY06 UPGRADE",
            "MY06": "MY06"
        },
        "405": {
            "D60": "D60",
            "D70": "D70"
        },
        "406": {
            "D8": "D8",
            "D9": "D9",
            "D9 (II)": "D9 (II)"
        },
        "407": {
            "MY05": "MY05",
            "MY06 UPGRADE": "MY06 UPGRADE",
            "MY07": "MY07",
            "MY07 UPGRADE": "MY07 UPGRADE",
            "MY09 UPGRADE": "MY09 UPGRADE"
        },
        "911": {
            "996": "996",
            "997 MY09": "997 MY09",
            "997": "997",
            "991 MY16": "991 MY16",
            "997 MY12": "997 MY12",
            "991 MY15": "991 MY15",
            "991 MY17": "991 MY17",
            "991 MY18": "991 MY18",
            "991 MY19": "991 MY19",
            "997 MY10": "997 MY10",
            "997 MY11": "997 MY11",
            "991 MY13": "991 MY13",
            "991 MY14": "991 MY14",
            "991": "991",
            "992 MY20": "992 MY20",
            "997 SERIES 2 MY11": "997 SERIES 2 MY11",
            "992 MY21": "992 MY21",
            "992 MY22": "992 MY22",
            "992 MY23": "992 MY23"
        },
        "BOXSTER": {
            "986": "986",
            "987": "987",
            "987 MY07": "987 MY07",
            "987 MY10": "987 MY10",
            "987 MY11": "987 MY11",
            "987 MY12": "987 MY12",
            "981 MY13": "981 MY13",
            "981 MY14": "981 MY14",
            "981 MY15": "981 MY15",
            "981 MY16": "981 MY16",
            "981": "981",
            "987 MY09": "987 MY09"
        },
        "CAYMAN": {
            "987": "987",
            "987 MY10": "987 MY10",
            "987 MY11": "987 MY11",
            "987 MY12": "987 MY12",
            "981 MY13": "981 MY13",
            "981 MY14": "981 MY14",
            "981 MY15": "981 MY15",
            "981 MY16": "981 MY16",
            "987 MY09": "987 MY09"
        },
        "GEN.2": {
            "CM": "CM",
            "CM MY09": "CM MY09",
            "CM MY12": "CM MY12"
        },
        "SATRIA": {
            "BS": "BS"
        },
        "SAVVY": {
            "BT": "BT"
        },
        "WAJA": {
            "CF": "CF"
        },
        "CLIO": {
            "MK2": "MK2",
            "MY12": "MY12",
            "X98": "X98",
            "B98 MY17 (PHASE 2)": "B98 MY17 (PHASE 2)",
            "B98 MY17 UPDATE (PH": "B98 MY17 UPDATE (PH",
            "MY18": "MY18",
            "B98": "B98"
        },
        "GRAND SCENIC II": {
            "J84 MY07": "J84 MY07"
        },
        "LAGUNA": {
            "X91": "X91"
        },
        "MEGANE": {
            "X84 MY06 UPGRADE": "X84 MY06 UPGRADE",
            "X84": "X84",
            "X84 MY06": "X84 MY06",
            "E95": "E95",
            "B95 MY14": "B95 MY14",
            "B95": "B95",
            "X32": "X32",
            "X95": "X95",
            "E95 MY14": "E95 MY14",
            "K95 MY14": "K95 MY14",
            "K95": "K95",
            "KFB MY17 UPDATE": "KFB MY17 UPDATE",
            "KFB": "KFB",
            "BFB MY17 UPDATE": "BFB MY17 UPDATE",
            "BFB": "BFB",
            "LFF MY17 UPDATE": "LFF MY17 UPDATE",
            "LFF": "LFF",
            "X95 MY14": "X95 MY14",
            "X95 MY15": "X95 MY15",
            "XFB": "XFB",
            "XFB-KFB": "XFB-KFB",
            "XFB-BFB": "XFB-BFB",
            "XFB-LFF": "XFB-LFF",
            "XFB-BFB MY19": "XFB-BFB MY19",
            "XFB-MB4 MY20": "XFB-MB4 MY20",
            "XFB-MB4 MY21": "XFB-MB4 MY21",
            "XFB-MB4 MY22": "XFB-MB4 MY22"
        },
        "SCENIC II": {
            "J84": "J84",
            "J84 MY07": "J84 MY07"
        },
        "CORNICHE": {
            "II": "II"
        },
        "SILVER": {
            "MY00": "MY00"
        },
        "75": {
            "MY05 UPGRADE": "MY05 UPGRADE"
        },
        "3500": {
            "SERIES II": "SERIES II"
        },
        "9-3": {
            "MY06": "MY06",
            "MY03": "MY03",
            "MY04": "MY04",
            "MY05": "MY05",
            "MY08": "MY08",
            "MY02": "MY02",
            "MY07": "MY07",
            "MY01": "MY01",
            "MYO8": "MYO8",
            "MY11": "MY11"
        },
        "9-5": {
            "MY01": "MY01",
            "MY08": "MY08",
            "MY02": "MY02",
            "MY03": "MY03",
            "MY04": "MY04",
            "MY05": "MY05",
            "MY06": "MY06",
            "GEN 2": "GEN 2"
        },
        "ROOMSTER": {
            "5J": "5J",
            "5J MY14": "5J MY14"
        },
        "FORFOUR": {
            "454": "454"
        },
        "FORTWO": {
            "451": "451",
            "451 MY13": "451 MY13"
        },
        "ROADSTER": {
            "R452": "R452",
            "MY13": "MY13"
        },
        "CHAIRMAN": {
            "W100": "W100"
        },
        "STAVIC": {
            "A100": "A100",
            "A100 08 UPGRADE": "A100 08 UPGRADE",
            "A100 07 UPGRADE": "A100 07 UPGRADE",
            "A100 MY13": "A100 MY13"
        },
        "IMPREZA": {
            "MY06": "MY06",
            "MY07": "MY07",
            "MY99": "MY99",
            "MY00": "MY00",
            "MY02": "MY02",
            "MY03": "MY03",
            "MY04": "MY04",
            "MY05": "MY05",
            "MY01": "MY01",
            "MY08": "MY08",
            "MY09": "MY09",
            "MY16": "MY16",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "LIBERTY": {
            "MY04": "MY04",
            "MY05": "MY05",
            "MY06": "MY06",
            "MY07": "MY07",
            "MY08": "MY08",
            "MY09": "MY09",
            "MY02": "MY02",
            "MY03": "MY03",
            "MY01": "MY01",
            "MY99": "MY99",
            "MY00": "MY00",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY19": "MY19",
            "MY20": "MY20"
        },
        "SWIFT": {
            "EZ 07 UPDATE": "EZ 07 UPDATE",
            "EZ": "EZ",
            "FZ": "FZ",
            "FZ MY13": "FZ MY13",
            "AZ": "AZ",
            "FZ MY14": "FZ MY14",
            "AL": "AL",
            "EZ MY07 UPGRADE": "EZ MY07 UPGRADE",
            "EZ MY07 UPDATE": "EZ MY07 UPDATE",
            "MY18": "MY18",
            "AZ SERIES II": "AZ SERIES II",
            "AZ SERIES II MY22": "AZ SERIES II MY22"
        },
        "SX4": {
            "GY": "GY",
            "GY MY10": "GY MY10",
            "GY MY11": "GY MY11"
        },
        "AURION": {
            "GSV40R": "GSV40R",
            "GSV50R MY15": "GSV50R MY15",
            "GSV50R MY16": "GSV50R MY16",
            "GSV50R": "GSV50R",
            "GSV40R 09 UPGRADE": "GSV40R 09 UPGRADE"
        },
        "AVALON": {
            "MCX10R MKII": "MCX10R MKII",
            "MCX10R": "MCX10R",
            "MCX10R MK2": "MCX10R MK2"
        },
        "AVENSIS": {
            "ACM20R": "ACM20R",
            "ACM21R": "ACM21R"
        },
        "CAMRY": {
            "MCV20R": "MCV20R",
            "SXV20R": "SXV20R",
            "ACV36R": "ACV36R",
            "ACV40R": "ACV40R",
            "ACV40R 07 UPGRADE": "ACV40R 07 UPGRADE",
            "ACV36R UPGRADE": "ACV36R UPGRADE",
            "MCV36R": "MCV36R",
            "MCV36R UPGRADE": "MCV36R UPGRADE",
            "ACV36R 06 UPGRADE": "ACV36R 06 UPGRADE",
            "MCV36R 06 UPGRADE": "MCV36R 06 UPGRADE",
            "SXV10": "SXV10",
            "SV21": "SV21",
            "MCV20R (II)": "MCV20R (II)",
            "SXV20R (II)": "SXV20R (II)",
            "SV22": "SV22",
            "SV20": "SV20",
            "SDV10": "SDV10",
            "SV11": "SV11",
            "SXV101R": "SXV101R",
            "VZV21R": "VZV21R",
            "VDV10": "VDV10",
            "VCV10": "VCV10",
            "ASV70R": "ASV70R",
            "AVV50R MY15": "AVV50R MY15",
            "AVV50R MY16": "AVV50R MY16",
            "ASV50R MY15": "ASV50R MY15",
            "ASV50R MY16": "ASV50R MY16",
            "ACV40R 09 UPGRADE": "ACV40R 09 UPGRADE",
            "ASV50R": "ASV50R",
            "AVV50R": "AVV50R",
            "AHV40R": "AHV40R",
            "GSV70R": "GSV70R",
            "AXVH71R": "AXVH71R",
            "ASV50R MY17": "ASV50R MY17",
            "ASV70R MY19": "ASV70R MY19",
            "GSV70R MY19": "GSV70R MY19",
            "AXVH71R MY19": "AXVH71R MY19",
            "AXVH70R": "AXVH70R",
            "AXVA70R": "AXVA70R",
            "AXHV70R": "AXHV70R"
        },
        "CELICA": {
            "RA40": "RA40",
            "RA23": "RA23",
            "RA60": "RA60",
            "RA65": "RA65",
            "SA63": "SA63",
            "ST162": "ST162",
            "ZZT231R": "ZZT231R"
        },
        "COROLLA": {
            "KE30": "KE30",
            "KE35": "KE35",
            "KE50": "KE50",
            "KE55": "KE55",
            "ZZE122R": "ZZE122R",
            "ZZE122R MY06": "ZZE122R MY06",
            "ZZE122R MY06 UPGRAD": "ZZE122R MY06 UPGRAD",
            "AE112R": "AE112R",
            "ZRE152R": "ZRE152R",
            "AE101R": "AE101R",
            "AET101R": "AET101R",
            "AE82": "AE82",
            "AE92": "AE92",
            "AE94": "AE94",
            "AE102X": "AE102X",
            "AE102R": "AE102R",
            "AE80": "AE80",
            "KE70": "KE70",
            "AE71": "AE71",
            "AE90": "AE90",
            "AE93": "AE93",
            "AE95": "AE95",
            "KE38": "KE38",
            "AE95R": "AE95R",
            "ZZE123R 05 UPGRADE": "ZZE123R 05 UPGRADE",
            "ZZE123R": "ZZE123R",
            "ZWE211R": "ZWE211R",
            "ZRE152R MY11": "ZRE152R MY11",
            "ZRE182R MY15": "ZRE182R MY15",
            "ZRE182R MY17": "ZRE182R MY17",
            "ZRE152R MY09": "ZRE152R MY09",
            "ZRE152R MY10": "ZRE152R MY10",
            "ZRE152R MY10 UPGRAD": "ZRE152R MY10 UPGRAD",
            "ZRE182R": "ZRE182R",
            "ZRE172R": "ZRE172R",
            "ZRE172R MY17": "ZRE172R MY17",
            "MZEA12R": "MZEA12R",
            "ZWE186R MY16": "ZWE186R MY16",
            "ZRE153R MY11": "ZRE153R MY11",
            "ZRE153R MY10": "ZRE153R MY10",
            "ZWE219R": "ZWE219R"
        },
        "CORONA": {
            "L": "L"
        },
        "CRESSIDA": {
            "MX62": "MX62",
            "MX83": "MX83"
        },
        "ECHO": {
            "NCP10R": "NCP10R",
            "NCP12R": "NCP12R",
            "NCP13R": "NCP13R"
        },
        "LEXCEN": {
            "VP": "VP",
            "VR": "VR",
            "VS": "VS"
        },
        "LITE ACE": {
            "YM21": "YM21",
            "YM30": "YM30",
            "CM20": "CM20",
            "YM35": "YM35",
            "CM35": "CM35"
        },
        "MR2": {
            "SW20R": "SW20R",
            "ZZW30R": "ZZW30R"
        },
        "PASEO": {
            "EL54R": "EL54R"
        },
        "PRIUS": {
            "NHW20R MY06 UPGRADE": "NHW20R MY06 UPGRADE",
            "NHW11R": "NHW11R",
            "NHW20R": "NHW20R",
            "ZVW30R MY12": "ZVW30R MY12",
            "ZVW50R MY18": "ZVW50R MY18",
            "ZVW50R": "ZVW50R",
            "ZVW30R": "ZVW30R"
        },
        "SPRINTER": {
            "AE86": "AE86"
        },
        "STARLET": {
            "EP91R": "EP91R"
        },
        "TARAGO": {
            "TCR10R": "TCR10R",
            "GSR50R": "GSR50R",
            "ACR50R": "ACR50R",
            "ACR30R": "ACR30R",
            "TCR11R": "TCR11R",
            "TCR20R": "TCR20R",
            "GSR50R MY13": "GSR50R MY13",
            "GSR50R MY16": "GSR50R MY16",
            "GSR50R MY09": "GSR50R MY09",
            "ACR50R MY13": "ACR50R MY13",
            "ACR50R MY16": "ACR50R MY16",
            "ACR50R MY09": "ACR50R MY09"
        },
        "VIENTA": {
            "VCV10": "VCV10",
            "MCV20R": "MCV20R",
            "VCV10R": "VCV10R"
        },
        "YARIS": {
            "NCP90R": "NCP90R",
            "NCP90R 08 UPGRADE": "NCP90R 08 UPGRADE",
            "NCP91R": "NCP91R",
            "NCP93R": "NCP93R",
            "NCP91R 08 UPGRADE": "NCP91R 08 UPGRADE",
            "NCP93R 08 UPGRADE": "NCP93R 08 UPGRADE",
            "NCP91R 06 UPGRADE": "NCP91R 06 UPGRADE",
            "NCP130R MY15": "NCP130R MY15",
            "NCP130R MY17": "NCP130R MY17",
            "NCP130R MY18": "NCP130R MY18",
            "NCP131R MY15": "NCP131R MY15",
            "NCP131R MY17": "NCP131R MY17",
            "NCP131R MY17 UPDATE": "NCP131R MY17 UPDATE",
            "NCP131R MY18": "NCP131R MY18",
            "NCP90R 10 UPGRADE": "NCP90R 10 UPGRADE",
            "NCP130R": "NCP130R",
            "NCP91R 10 UPGRADE": "NCP91R 10 UPGRADE",
            "NCP131R": "NCP131R",
            "NCP93R 10 UPGRADE": "NCP93R 10 UPGRADE",
            "MXPA10R": "MXPA10R",
            "MXPH10R": "MXPH10R"
        },
        "2.5": {
            "MK I": "MK I",
            "MK II": "MK II"
        },
        "C30": {
            "MY09": "MY09",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY12": "MY12",
            "MY13": "MY13"
        },
        "C70": {
            "MY01": "MY01",
            "MY03": "MY03",
            "MY09": "MY09",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY13": "MY13"
        },
        "S40": {
            "MY01": "MY01",
            "MY03": "MY03",
            "MS": "MS",
            "MY06": "MY06",
            "MY07": "MY07",
            "MY08": "MY08",
            "MY09": "MY09",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY12": "MY12"
        },
        "S60": {
            "MY04": "MY04",
            "MY03": "MY03",
            "05 UPGRADE": "05 UPGRADE",
            "MY06": "MY06",
            "MY09": "MY09",
            "F MY15": "F MY15",
            "F MY12": "F MY12",
            "F MY13": "F MY13",
            "F": "F",
            "F MY14": "F MY14",
            "F MY16": "F MY16",
            "F MY17": "F MY17",
            "F MY18": "F MY18",
            "224 MY20": "224 MY20",
            "224 MY21": "224 MY21",
            "224 MY22": "224 MY22",
            "224 MY23": "224 MY23",
            "224 MY23B": "224 MY23B"
        },
        "S80": {
            "MY03": "MY03",
            "MY07": "MY07",
            "MY09": "MY09",
            "MY04": "MY04",
            "MY10": "MY10",
            "MY11": "MY11",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15"
        },
        "V40": {
            "MY01": "MY01",
            "MY03": "MY03",
            "M MY16": "M MY16",
            "M MY15": "M MY15",
            "M MY18": "M MY18",
            "M": "M",
            "M MY17": "M MY17",
            "M MY14": "M MY14"
        },
        "V50": {
            "MS": "MS",
            "MY06": "MY06",
            "MY07": "MY07",
            "MY08": "MY08",
            "MY09": "MY09",
            "MY10": "MY10",
            "MY12": "MY12",
            "MY11": "MY11"
        },
        "V70": {
            "184kW": "184kW",
            "195KW": "195KW",
            "MY04": "MY04",
            "MY03": "MY03",
            "05 UPGRADE": "05 UPGRADE",
            "MY06": "MY06",
            "BW MY09": "BW MY09",
            "BW": "BW",
            "BW MY10": "BW MY10",
            "BW MY11": "BW MY11",
            "BW MY13": "BW MY13"
        },
        "BEETLE": {
            "9C": "9C",
            "9C MY08 UPGRADE": "9C MY08 UPGRADE",
            "9C MY06 UPGRADE": "9C MY06 UPGRADE",
            "1L MY14": "1L MY14",
            "1L MY15": "1L MY15",
            "1L MY16": "1L MY16",
            "1L MY17": "1L MY17",
            "1L": "1L",
            "9C MY10": "9C MY10"
        },
        "BORA": {
            "1J": "1J"
        },
        "CARAVELLE": {
            "7H": "7H",
            "T6 MY16": "T6 MY16",
            "7H MY13": "7H MY13",
            "7H MY14": "7H MY14",
            "7H MY15": "7H MY15",
            "7H MY17": "7H MY17",
            "7H MY10": "7H MY10",
            "7H MY12": "7H MY12",
            "7H MY19": "7H MY19",
            "T6.1 MY21": "T6.1 MY21",
            "T6.1 MY22": "T6.1 MY22",
            "T6.1 MY23": "T6.1 MY23"
        },
        "EOS": {
            "1F MY08 UPGRADE": "1F MY08 UPGRADE",
            "1F": "1F",
            "1F MY09 UPGRADE": "1F MY09 UPGRADE",
            "1F MY10": "1F MY10",
            "1F MY11": "1F MY11",
            "1F MY12": "1F MY12",
            "1F MY13": "1F MY13",
            "1F MY14": "1F MY14"
        },
        "JETTA": {
            "1KM": "1KM",
            "1KM MY08 UPGRADE": "1KM MY08 UPGRADE",
            "1KM MY09": "1KM MY09",
            "1KM MY10": "1KM MY10",
            "1KM MY12": "1KM MY12",
            "1KM MY13": "1KM MY13",
            "1KM MY13.5": "1KM MY13.5",
            "1KM MY14": "1KM MY14",
            "1KM MY15": "1KM MY15",
            "1KM MY16": "1KM MY16",
            "1KM MY17": "1KM MY17"
        },
        "KOMBI": {
            "70C": "70C"
        },
        "MULTIVAN": {
            "T5 MY08": "T5 MY08",
            "T5": "T5",
            "T5 MY10": "T5 MY10",
            "T5 MY12": "T5 MY12",
            "T5 MY13": "T5 MY13",
            "T5 MY14": "T5 MY14",
            "T5 MY15": "T5 MY15",
            "T6 MY16": "T6 MY16",
            "T6 MY17": "T6 MY17",
            "T6 MY18": "T6 MY18",
            "T6 MY17.5": "T6 MY17.5",
            "T6 MY19": "T6 MY19",
            "T6.1 MY21": "T6.1 MY21",
            "T6.1 MY20": "T6.1 MY20",
            "T6.1 MY22": "T6.1 MY22",
            "T6.1 MY23": "T6.1 MY23"
        },
        "PASSAT": {
            "3B": "3B",
            "3C MY08 UPGRADE": "3C MY08 UPGRADE",
            "3C": "3C",
            "3C MY09 UPGRADE": "3C MY09 UPGRADE",
            "3B MY05 UPGRADE": "3B MY05 UPGRADE",
            "3C MY15": "3C MY15",
            "3C MY10 UPGRADE": "3C MY10 UPGRADE",
            "3C MY11": "3C MY11",
            "3C MY12": "3C MY12",
            "3C MY13": "3C MY13",
            "3C MY13.5": "3C MY13.5",
            "3C MY14": "3C MY14",
            "3C MY14.5": "3C MY14.5",
            "3C MY17": "3C MY17",
            "3C MY18": "3C MY18",
            "3C MY16": "3C MY16",
            "3C MY10": "3C MY10",
            "3C MY18.5": "3C MY18.5",
            "3C MY19": "3C MY19",
            "3C MY20": "3C MY20",
            "3C MY21": "3C MY21",
            "3C MY22": "3C MY22",
            "3C MY22.5": "3C MY22.5",
            "CB MY23": "CB MY23",
            "3C MY23": "3C MY23",
            "CB MY23 UPDATE": "CB MY23 UPDATE"
        },
        "POLO": {
            "9N": "9N",
            "9N MY08 UPGRADE": "9N MY08 UPGRADE",
            "9N MY07 UPGRADE": "9N MY07 UPGRADE",
            "9N MY06 UPGRADE": "9N MY06 UPGRADE",
            "6R MY11": "6R MY11",
            "6R MY12": "6R MY12",
            "6R MY13": "6R MY13",
            "6R MY13.5": "6R MY13.5",
            "6R MY14": "6R MY14",
            "6R MY14.5": "6R MY14.5",
            "6R MY12 UPDATE": "6R MY12 UPDATE",
            "6R": "6R",
            "6R MY15": "6R MY15",
            "6R MY16": "6R MY16",
            "6R MY17": "6R MY17",
            "AW MY18": "AW MY18",
            "AW MY18 UPDATE": "AW MY18 UPDATE",
            "6R MY17.5": "6R MY17.5",
            "AW MY19": "AW MY19",
            "AW MY20": "AW MY20",
            "AW MY21": "AW MY21",
            "AW MY22": "AW MY22",
            "AE MY23": "AE MY23",
            "AE MY23 UPDATE": "AE MY23 UPDATE"
        },
        "ALLROAD QUATTRO": {
            "C5": "C5"
        },
        "750KG": {
            "VH": "VH",
            "VJ": "VJ"
        },
        "DODGE": {
            "VE": "VE"
        },
        "BULLET": {
            "VSII": "VSII"
        },
        "MUSSO": {
            "MY01": "MY01",
            "Q200 MY19": "Q200 MY19",
            "Q200S MY20": "Q200S MY20",
            "Q200S MY20.5": "Q200S MY20.5",
            "Q215 MY21": "Q215 MY21",
            "Q250 MY22": "Q250 MY22",
            "Q250 MY23": "Q250 MY23"
        },
        "F50": {
            "JK": "JK",
            "JKB": "JKB",
            "JV": "JV"
        },
        "F55": {
            "F55P": "F55P"
        },
        "FEROZA": {
            "F300B": "F300B"
        },
        "HANDI": {
            "L55V": "L55V"
        },
        "HI-JET": {
            "S75VHR": "S75VHR",
            "S85VHR": "S85VHR",
            "S76VHR": "S76VHR"
        },
        "ROCKY": {
            "F85V": "F85V",
            "F75V": "F75V",
            "F70VG": "F70VG"
        },
        "TERIOS": {
            "J102": "J102"
        },
        "COURIER": {
            "PE": "PE",
            "PG": "PG",
            "PH": "PH",
            "PD": "PD"
        },
        "ECONOVAN": {
            "JH": "JH",
            "JG": "JG"
        },
        "EXPLORER": {
            "UQ": "UQ",
            "US": "US",
            "UT": "UT",
            "UX": "UX",
            "UZ": "UZ"
        },
        "F250": {
            "RM": "RM",
            "RN": "RN"
        },
        "F350": {
            "RM": "RM",
            "RN": "RN"
        },
        "HOLDEN": {
            "WB": "WB",
            "HD": "HD",
            "EJ": "EJ",
            "FB": "FB",
            "EH": "EH",
            "EK": "EK",
            "HR": "HR",
            "HZ": "HZ",
            "HJ": "HJ",
            "HQ": "HQ",
            "HX": "HX"
        },
        "CREWMAN": {
            "VZ": "VZ",
            "VYII": "VYII",
            "VZ MY06": "VZ MY06",
            "VZ MY06 UPGRADE": "VZ MY06 UPGRADE"
        },
        "CRUZE": {
            "YG": "YG",
            "JH MY12": "JH MY12",
            "JH MY13": "JH MY13",
            "JH MY14": "JH MY14",
            "JH MY15": "JH MY15",
            "JH MY16": "JH MY16",
            "JG": "JG",
            "JH": "JH"
        },
        "FRONTERA": {
            "MX": "MX"
        },
        "ISUZU": {
            "KB20": "KB20",
            "KB25": "KB25"
        },
        "JACKAROO": {
            "U8": "U8"
        },
        "RODEO": {
            "KBD26": "KBD26",
            "KB25": "KB25",
            "KB26": "KB26",
            "KB27": "KB27",
            "KB28": "KB28",
            "KBD27": "KBD27",
            "KBD28": "KBD28",
            "TFG3": "TFG3",
            "KB41": "KB41",
            "KB40": "KB40",
            "TFR9": "TFR9",
            "RA MY05.5 UPGRADE": "RA MY05.5 UPGRADE",
            "RA MY06 UPGRADE": "RA MY06 UPGRADE",
            "RA MY07": "RA MY07",
            "RA MY08": "RA MY08",
            "TFR9 MY02": "TFR9 MY02",
            "RA": "RA",
            "TFG6": "TFG6",
            "TFR7": "TFR7",
            "TF": "TF",
            "TFG1": "TFG1",
            "KB47": "KB47",
            "KB48": "KB48"
        },
        "SANDMAN": {
            "HJ": "HJ",
            "HQ": "HQ",
            "HX": "HX",
            "HZ": "HZ"
        },
        "SUBURBAN": {
            "K8": "K8"
        },
        "MDX": {
            "MY05 UPGRADE": "MY05 UPGRADE"
        },
        "AVALANCHE": {
            "VYII": "VYII"
        },
        "LS": {
            "VG": "VG",
            "VP": "VP"
        },
        "TERRACAN": {
            "05 UPGRADE": "05 UPGRADE"
        },
        "K2700": {
            "PU": "PU",
            "TU": "TU"
        },
        "PREGIO": {
            "3VRS": "3VRS",
            "CT": "CT"
        },
        "LX470": {
            "UZJ100R": "UZJ100R",
            "UZJ100R 05 UPGRADE": "UZJ100R 05 UPGRADE",
            "UZJ100R 06 UPGRADE": "UZJ100R 06 UPGRADE"
        },
        "RX330": {
            "MCU38R UPDATE": "MCU38R UPDATE",
            "MCU38R": "MCU38R"
        },
        "FREELANDER": {
            "MY04": "MY04"
        },
        "B2500": {
            "MY05 UPGRADE": "MY05 UPGRADE"
        },
        "E2000": {
            "SJ07": "SJ07",
            "SH94": "SH94",
            "SH93": "SH93",
            "SH92": "SH92"
        },
        "E2500": {
            "SJ08": "SJ08",
            "SH96": "SH96"
        },
        "TRIBUTE": {
            "MY06": "MY06"
        },
        "D50": {
            "MA": "MA"
        },
        "L200": {
            "MC": "MC",
            "MA": "MA",
            "MB": "MB",
            "MD": "MD"
        },
        "L300": {
            "SC": "SC",
            "SD": "SD",
            "SE": "SE",
            "SA": "SA",
            "SB": "SB"
        },
        "720": {
            "P720M": "P720M",
            "PG720M": "PG720M"
        },
        "TERRANO II": {
            "R20": "R20"
        },
        "CARRY": {
            "L60V": "L60V",
            "ST10V": "ST10V",
            "ST20V": "ST20V",
            "ST80V": "ST80V",
            "ST90V": "ST90V"
        },
        "XL-7": {
            "JA627": "JA627"
        },
        "4 RUNNER": {
            "LN60": "LN60",
            "LN61": "LN61",
            "YN60": "YN60",
            "YN63": "YN63",
            "VZN130": "VZN130"
        },
        "DYNA": {
            "LY220R": "LY220R",
            "YH81": "YH81",
            "LY211R": "LY211R",
            "LY230R": "LY230R"
        },
        "TOWNACE": {
            "KR42": "KR42",
            "KR42R": "KR42R"
        },
        "595": {
            "MY16": "MY16",
            "SERIES 4": "SERIES 4",
            "MY14": "MY14",
            "SERIES 5 MY21": "SERIES 5 MY21"
        },
        "595C": {
            "MY16": "MY16",
            "SERIES 4": "SERIES 4",
            "SERIES 5 MY21": "SERIES 5 MY21"
        },
        "4C": {
            "SERIES 1": "SERIES 1"
        },
        "BRERA": {
            "MY11": "MY11"
        },
        "GIULIA": {
            "952": "952",
            "MY19": "MY19",
            "949": "949",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "GIULIETTA": {
            "MY15": "MY15",
            "SERIES 2": "SERIES 2",
            "SERIES 3": "SERIES 3"
        },
        "MITO": {
            "SERIES 2": "SERIES 2"
        },
        "SPIDER": {
            "MY11": "MY11"
        },
        "DB11": {
            "MY17": "MY17",
            "MY17.5": "MY17.5",
            "MY18.5": "MY18.5",
            "MY19": "MY19",
            "MY19.5": "MY19.5",
            "MY20": "MY20",
            "MY21": "MY21"
        },
        "RAPIDE": {
            "MY13": "MY13",
            "MY15": "MY15",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY17.5": "MY17.5",
            "MY19": "MY19"
        },
        "V12": {
            "MY15": "MY15",
            "MY17": "MY17",
            "MY17.5": "MY17.5",
            "MY13": "MY13"
        },
        "VANQUISH": {
            "MY13": "MY13",
            "MY15": "MY15",
            "MY17": "MY17",
            "MY17.5": "MY17.5",
            "MY18": "MY18",
            "MY16": "MY16"
        },
        "A1": {
            "8X MY12": "8X MY12",
            "8X MY13": "8X MY13",
            "8X": "8X",
            "8X MY14": "8X MY14",
            "8X MY15": "8X MY15",
            "8X MY16": "8X MY16",
            "8X MY17": "8X MY17",
            "8X MY18": "8X MY18",
            "GB MY20": "GB MY20",
            "GB MY21": "GB MY21",
            "GB MY22": "GB MY22",
            "GB MY22A": "GB MY22A",
            "GB MY23": "GB MY23"
        },
        "A7": {
            "4G MY18": "4G MY18",
            "4G MY16": "4G MY16",
            "4G MY17": "4G MY17",
            "4G MY13": "4G MY13",
            "4G MY14": "4G MY14",
            "4G MY15": "4G MY15",
            "4G": "4G",
            "4K MY19": "4K MY19",
            "4K MY20": "4K MY20",
            "4K MY21": "4K MY21",
            "4K MY22": "4K MY22",
            "4K MY22A": "4K MY22A",
            "4K MY23": "4K MY23"
        },
        "R8": {
            "MY13": "MY13",
            "MY15": "MY15",
            "MY17": "MY17",
            "MY18": "MY18",
            "4S MY18": "4S MY18",
            "4S MY17": "4S MY17",
            "4S MY20": "4S MY20",
            "4S MY21": "4S MY21"
        },
        "RS3": {
            "8V MY17": "8V MY17",
            "8V MY18": "8V MY18",
            "8V": "8V"
        },
        "RS5": {
            "F5 MY18": "F5 MY18",
            "8T MY12 UPGRADE": "8T MY12 UPGRADE",
            "8T MY14": "8T MY14",
            "8T MY15": "8T MY15",
            "8T": "8T",
            "F5 MY19": "F5 MY19"
        },
        "RS7": {
            "4G MY14": "4G MY14",
            "4G MY15": "4G MY15",
            "4G MY17": "4G MY17",
            "4G MY18": "4G MY18"
        },
        "S1": {
            "8X": "8X",
            "8X MY18": "8X MY18"
        },
        "S7": {
            "4G MY14": "4G MY14",
            "4G": "4G",
            "4G MY18": "4G MY18",
            "4G MY15": "4G MY15",
            "4G MY17": "4G MY17",
            "4K MY20": "4K MY20",
            "4K MY21": "4K MY21",
            "4K MY22": "4K MY22",
            "4K MY22A": "4K MY22A",
            "4K MY23": "4K MY23"
        },
        "FLYING SPUR": {
            "3W MY17": "3W MY17",
            "3W MY15": "3W MY15",
            "3W MY16": "3W MY16",
            "3W MY14": "3W MY14",
            "4W MY18": "4W MY18"
        },
        "MULSANNE": {
            "3Y MY14": "3Y MY14",
            "3Y MY15": "3Y MY15",
            "3Y MY16": "3Y MY16",
            "3Y": "3Y",
            "3Y MY19": "3Y MY19",
            "3Y MY20": "3Y MY20",
            "3Y MY18": "3Y MY18"
        },
        "MULSANNE SPEED": {
            "3Y MY16": "3Y MY16",
            "3Y MY19": "3Y MY19",
            "3Y MY20": "3Y MY20",
            "3Y MY18": "3Y MY18"
        },
        "B3": {
            "F30": "F30",
            "F31": "F31",
            "F32": "F32"
        },
        "B4": {
            "F32": "F32",
            "F33": "F33"
        },
        "2": {
            "F45 MY17": "F45 MY17",
            "F45 MY18": "F45 MY18",
            "F45 MY18 UPDATE": "F45 MY18 UPDATE",
            "F45": "F45",
            "F23 MY16": "F23 MY16",
            "F23 MY17": "F23 MY17",
            "F23 MY18": "F23 MY18",
            "F22": "F22",
            "F23": "F23",
            "F22 MY16": "F22 MY16",
            "F22 MY17": "F22 MY17",
            "F22 MY18": "F22 MY18",
            "F22 MY15": "F22 MY15",
            "F44": "F44",
            "G42": "G42",
            "MY22": "MY22",
            "MY23": "MY23"
        },
        "4": {
            "F33": "F33",
            "F32 MY14": "F32 MY14",
            "F33 MY14": "F33 MY14",
            "F33 MY15": "F33 MY15",
            "F32 MY15": "F32 MY15",
            "F32 MY16.5": "F32 MY16.5",
            "F33 MY16.5": "F33 MY16.5",
            "F32": "F32",
            "F33 MY18": "F33 MY18",
            "F36 MY18": "F36 MY18",
            "F36": "F36",
            "F36 MY15": "F36 MY15",
            "F36 MY16.5": "F36 MY16.5",
            "F33 MY17": "F33 MY17",
            "F32 MY17": "F32 MY17",
            "F36 MY17": "F36 MY17",
            "G22": "G22",
            "G23": "G23",
            "G26": "G26"
        },
        "i3": {
            "IO1": "IO1",
            "IO1 MY18": "IO1 MY18",
            "101 MY19": "101 MY19",
            "I01 MY19": "I01 MY19",
            "I01": "I01"
        },
        "i8": {
            "I12": "I12",
            "I15 LCI": "I15 LCI",
            "I12 LCI": "I12 LCI"
        },
        "M2": {
            "F87": "F87",
            "F87 MY18": "F87 MY18",
            "F87 MY19": "F87 MY19",
            "F87 CS": "F87 CS"
        },
        "M4": {
            "F82": "F82",
            "F82 MY15": "F82 MY15",
            "F83": "F83",
            "F82 LCI": "F82 LCI",
            "F83 LCI": "F83 LCI",
            "F82 LCI MY17": "F82 LCI MY17",
            "F83 LCI MY17": "F83 LCI MY17",
            "F82 MY18": "F82 MY18",
            "F83 MY18": "F83 MY18",
            "G82": "G82",
            "G83": "G83"
        },
        "M7": {
            "G12 MY17": "G12 MY17",
            "G12 MY18": "G12 MY18",
            "G12 LCI": "G12 LCI",
            "G12": "G12"
        },
        "J1": {
            "S2X": "S2X"
        },
        "J3": {
            "M1X": "M1X"
        },
        "C6": {
            "MY10": "MY10"
        },
        "C4 GRAND PICASSO": {
            "MY13": "MY13"
        },
        "C4 PICASSO": {
            "MY15": "MY15",
            "MY10": "MY10",
            "MY12": "MY12"
        },
        "DS3": {
            "MY13": "MY13",
            "MY12": "MY12",
            "MY15": "MY15"
        },
        "DS4": {
            "MY16": "MY16",
            "MY13": "MY13"
        },
        "DS5": {
            "MY16": "MY16",
            "MY13": "MY13"
        },
        "GRAND C4": {
            "B7 MY15": "B7 MY15",
            "B7": "B7"
        },
        "812": {
            "F152": "F152"
        },
        "GTC4": {
            "F151": "F151"
        },
        "500": {
            "MY18": "MY18",
            "SERIES 4 MY17": "SERIES 4 MY17",
            "MY13": "MY13",
            "MY14": "MY14",
            "SERIES 4": "SERIES 4",
            "SERIES 6": "SERIES 6",
            "SERIES 7": "SERIES 7",
            "SERIES 8": "SERIES 8",
            "SERIES 9 MY21": "SERIES 9 MY21",
            "SERIES 10 MY22": "SERIES 10 MY22"
        },
        "PUNTO": {
            "MY13": "MY13"
        },
        "MUSTANG": {
            "FM MY17": "FM MY17",
            "FM": "FM",
            "FN": "FN",
            "FN MY20": "FN MY20",
            "FN MY21": "FN MY21",
            "FN MY21.5": "FN MY21.5",
            "FN MY22.25": "FN MY22.25"
        },
        "MK": {
            "MK": "MK"
        },
        "BARINA SPARK": {
            "MJ UPDATE": "MJ UPDATE",
            "MJ MY12": "MJ MY12",
            "MJ MY13": "MJ MY13",
            "MJ MY14": "MJ MY14",
            "MJ MY15": "MJ MY15",
            "MJ": "MJ"
        },
        "CASCADA": {
            "CJ MY16": "CJ MY16",
            "CJ": "CJ"
        },
        "INSIGNIA": {
            "GA MY16": "GA MY16",
            "GA": "GA"
        },
        "MALIBU": {
            "EM MY14": "EM MY14",
            "EM MY15": "EM MY15",
            "EM": "EM"
        },
        "SPARK": {
            "MP MY18": "MP MY18",
            "MP MY16": "MP MY16",
            "MP MY17": "MP MY17"
        },
        "VOLT": {
            "EV": "EV"
        },
        "CITY": {
            "GM MY15": "GM MY15",
            "GM MY12": "GM MY12",
            "GM MY17": "GM MY17",
            "GM MY18": "GM MY18",
            "MY19": "MY19",
            "GM": "GM",
            "MY20": "MY20",
            "GM MY16": "GM MY16",
            "GM MY14": "GM MY14"
        },
        "CR-Z": {
            "MY13": "MY13"
        },
        "INSIGHT": {
            "MY12 UPDATE": "MY12 UPDATE",
            "MY13": "MY13"
        },
        "NSX": {
            "MY17": "MY17",
            "MY18": "MY18",
            "MY19": "MY19",
            "MY20": "MY20"
        },
        "GTSR": {
            "GEN F2": "GEN F2"
        },
        "GTSR W1": {
            "GEN F2": "GEN F2"
        },
        "GENESIS": {
            "DH": "DH",
            "DH MY16.5": "DH MY16.5"
        },
        "i20": {
            "PB MY11": "PB MY11",
            "PB MY12": "PB MY12",
            "PB MY12.5": "PB MY12.5",
            "PB MY14": "PB MY14",
            "PB": "PB",
            "BC3.V1 MY22": "BC3.V1 MY22"
        },
        "i40": {
            "VF4 SERIES II": "VF4 SERIES II",
            "VF4 SERIES II MY17": "VF4 SERIES II MY17",
            "VF 2 UPGRADE": "VF 2 UPGRADE",
            "VF 2": "VF 2",
            "VF": "VF",
            "VF 3 UPGRADE": "VF 3 UPGRADE",
            "VF3": "VF3"
        },
        "i45": {
            "YF MY11": "YF MY11",
            "YF": "YF"
        },
        "VELOSTER": {
            "FS MY13": "FS MY13",
            "FS3": "FS3",
            "FS4 SERIES 2": "FS4 SERIES 2",
            "FS": "FS",
            "FS5 SERIES 2 MY16": "FS5 SERIES 2 MY16",
            "FS5 SERIES 2": "FS5 SERIES 2",
            "JS MY19": "JS MY19",
            "JS MY20": "JS MY20"
        },
        "M": {
            "Y51": "Y51"
        },
        "G37": {
            "V36 G": "V36 G"
        },
        "Q50": {
            "V37 MY18": "V37 MY18",
            "V37 MY17": "V37 MY17",
            "V37": "V37",
            "V37 MY19": "V37 MY19"
        },
        "Q70": {
            "MY16": "MY16"
        },
        "XE": {
            "MY17": "MY17",
            "MY18": "MY18",
            "X760 MY19": "X760 MY19",
            "X760 MY20": "X760 MY20",
            "X760 MY21": "X760 MY21",
            "X760 MY22": "X760 MY22",
            "X760 MY23": "X760 MY23"
        },
        "XF": {
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "X260 MY18": "X260 MY18",
            "X260": "X260",
            "X260 MY17": "X260 MY17",
            "MY12": "MY12",
            "MY10": "MY10",
            "MY11": "MY11",
            "X260 MY19": "X260 MY19",
            "X260 MY20": "X260 MY20",
            "X260 MY21": "X260 MY21",
            "X260 MY22": "X260 MY22",
            "X260 MY23": "X260 MY23"
        },
        "XJ": {
            "X351 MY18": "X351 MY18",
            "X351 MY13": "X351 MY13",
            "X351 MY14": "X351 MY14",
            "X351 MY16": "X351 MY16",
            "X351": "X351",
            "MY17": "MY17",
            "X351 MY17": "X351 MY17",
            "X351 MY19": "X351 MY19"
        },
        "F-TYPE": {
            "MY16": "MY16",
            "MY16.5": "MY16.5",
            "MY17": "MY17",
            "MY18.5": "MY18.5",
            "MY19": "MY19",
            "MY18": "MY18",
            "X152 MY19.5": "X152 MY19.5",
            "X152 MY20": "X152 MY20",
            "X152 MY21": "X152 MY21",
            "X152 MY22": "X152 MY22",
            "X152 MY23": "X152 MY23",
            "X152 MY24": "X152 MY24"
        },
        "PICANTO": {
            "MY18": "MY18",
            "JA MY19": "JA MY19",
            "JA MY18": "JA MY18",
            "TA MY17": "TA MY17",
            "JA MY19 (JUN 18 BUI": "JA MY19 (JUN 18 BUI",
            "JA MY20": "JA MY20",
            "JA MY21": "JA MY21",
            "JA MY22": "JA MY22",
            "JA MY23": "JA MY23"
        },
        "PRO CEE`D": {
            "JD MY15": "JD MY15",
            "JD": "JD"
        },
        "SOUL": {
            "AM MY11": "AM MY11",
            "AM MY12": "AM MY12",
            "AM": "AM",
            "PS MY16": "PS MY16",
            "PS MY17": "PS MY17",
            "PS MY18": "PS MY18",
            "PS MY19": "PS MY19",
            "PS": "PS"
        },
        "STINGER": {
            "CK MY18": "CK MY18",
            "CK MY18 (302)": "CK MY18 (302)",
            "CK MY18 (312)": "CK MY18 (312)",
            "CK MY18 (346)": "CK MY18 (346)",
            "CK MY18 (303)": "CK MY18 (303)",
            "CK MY18 (313)": "CK MY18 (313)",
            "CK MY18 (347)": "CK MY18 (347)",
            "CK MY18 (344)": "CK MY18 (344)",
            "CK MY18 (441)": "CK MY18 (441)",
            "CK MY18 (377)": "CK MY18 (377)",
            "CK MY18 (345)": "CK MY18 (345)",
            "CK MY18 (442)": "CK MY18 (442)",
            "CK MY18 (378)": "CK MY18 (378)",
            "CK MY19": "CK MY19",
            "CK MY20": "CK MY20",
            "MY20": "MY20",
            "CK PE MY21": "CK PE MY21",
            "CK PE MY22": "CK PE MY22",
            "CK PE MY23": "CK PE MY23"
        },
        "AVENTADOR": {
            "834": "834",
            "MY18": "MY18",
            "834 MY13": "834 MY13",
            "834 MY14": "834 MY14",
            "834 MY15": "834 MY15",
            "834 MY16": "834 MY16",
            "834 MY17": "834 MY17"
        },
        "HURACAN": {
            "724": "724",
            "724 MY18": "724 MY18",
            "724 MY20": "724 MY20",
            "724 MY19": "724 MY19",
            "724 MY21": "724 MY21"
        },
        "CT 200h. HYBRID": {
            "ZWA10R 13 UPGRADE": "ZWA10R 13 UPGRADE",
            "ZWA10R MY14": "ZWA10R MY14",
            "ZWA10R MY15": "ZWA10R MY15",
            "ZWA10R MY17": "ZWA10R MY17",
            "ZWA10R MY17 FACELIF": "ZWA10R MY17 FACELIF",
            "ZWA10R": "ZWA10R"
        },
        "GS350": {
            "GRL10R": "GRL10R",
            "GRL10R MY14": "GRL10R MY14",
            "GRL10R MY15": "GRL10R MY15",
            "GRL12R": "GRL12R",
            "GRL12R MY17": "GRL12R MY17"
        },
        "GS300h": {
            "AWL10R MY14": "AWL10R MY14",
            "AWL10R MY15": "AWL10R MY15",
            "AWL10R MY16": "AWL10R MY16",
            "AWL10R MY17": "AWL10R MY17"
        },
        "GS200t": {
            "ARL10R": "ARL10R",
            "ARL10R MY17": "ARL10R MY17"
        },
        "GS250": {
            "GRL11R": "GRL11R",
            "GRL11R MY14": "GRL11R MY14",
            "GRL11R MY15": "GRL11R MY15"
        },
        "GS-F": {
            "URL10R MY17": "URL10R MY17",
            "URL10R": "URL10R",
            "URL10R MY18": "URL10R MY18"
        },
        "IS200t": {
            "ASE30R MY16": "ASE30R MY16",
            "ASE30R MY17": "ASE30R MY17"
        },
        "IS350": {
            "GSE31R MY15": "GSE31R MY15",
            "GSE31R MY16": "GSE31R MY16",
            "GSE31R MY17": "GSE31R MY17",
            "GSE31R": "GSE31R",
            "GSE21R": "GSE21R",
            "GSE31R FACELIFT BMC": "GSE31R FACELIFT BMC"
        },
        "IS250C": {
            "GSE20R MY13": "GSE20R MY13",
            "GSE20R MY11": "GSE20R MY11",
            "GSE20R": "GSE20R"
        },
        "IS300h": {
            "AVE30R MY15": "AVE30R MY15",
            "AVE30R MY16": "AVE30R MY16",
            "AVE30R MY17": "AVE30R MY17",
            "AVE30R": "AVE30R",
            "AVE30R FACELIFT BMC": "AVE30R FACELIFT BMC"
        },
        "LS 500": {
            "VXFA50R": "VXFA50R"
        },
        "LS 500h (HYBRID)": {
            "GVF50R": "GVF50R"
        },
        "LC500": {
            "URZ100R": "URZ100R"
        },
        "LC500h (HYBRID)": {
            "GWZ100R": "GWZ100R"
        },
        "LFA": {
            "LFA10R": "LFA10R"
        },
        "LS600h": {
            "UVF45R": "UVF45R"
        },
        "RC300": {
            "ASC10R MY18": "ASC10R MY18",
            "ASC10R MY18 FACELIF": "ASC10R MY18 FACELIF",
            "ASC10R": "ASC10R"
        },
        "RC200t": {
            "ASC10R MY17": "ASC10R MY17",
            "ASC10R": "ASC10R"
        },
        "RC350": {
            "GSC10R": "GSC10R",
            "GSC10R MY16": "GSC10R MY16",
            "GSC10R MY17": "GSC10R MY17",
            "GSC10R MY18": "GSC10R MY18",
            "GSC10R MY18 FACELIF": "GSC10R MY18 FACELIF"
        },
        "RC F": {
            "VSC10R": "VSC10R",
            "VSC10R MY17": "VSC10R MY17",
            "VSC10R MY18": "VSC10R MY18",
            "USC10R MY18": "USC10R MY18",
            "USC10R": "USC10R",
            "USC10R MY17": "USC10R MY17"
        },
        "ES350": {
            "GSV60R": "GSV60R",
            "GSV60R MY15": "GSV60R MY15",
            "GSV60R MY16": "GSV60R MY16"
        },
        "ES300h": {
            "AVV60R MY16": "AVV60R MY16",
            "AVV60R": "AVV60R",
            "AVV60R MY15": "AVV60R MY15",
            "AXZH10R MY18": "AXZH10R MY18",
            "AXZH10R": "AXZH10R"
        },
        "EVORA": {
            "MY15": "MY15",
            "MY12": "MY12",
            "MY16": "MY16",
            "MY18": "MY18",
            "MY19": "MY19",
            "122 MY20": "122 MY20",
            "122 MY20.5": "122 MY20.5"
        },
        "GHIBLI": {
            "M157 MY16": "M157 MY16",
            "M157 MY17": "M157 MY17",
            "M157 MY18": "M157 MY18",
            "M157": "M157",
            "M157 MY19": "M157 MY19",
            "M157 MY20": "M157 MY20",
            "M157 MY21": "M157 MY21",
            "M157 MY22": "M157 MY22"
        },
        "GRANCABRIO": {
            "MY13": "MY13",
            "MY16": "MY16",
            "M140 MY18": "M140 MY18",
            "M140 MY19": "M140 MY19",
            "M140 MY20": "M140 MY20",
            "M140 MY21": "M140 MY21"
        },
        "GRANTURISMO": {
            "MY13": "MY13",
            "MY15": "MY15",
            "MY16": "MY16",
            "M140 MY18": "M140 MY18",
            "MY11": "MY11",
            "M140 MY19": "M140 MY19",
            "M140 MY20": "M140 MY20",
            "M140 MY21": "M140 MY21"
        },
        "QUATTROPORTE": {
            "MY11": "MY11",
            "MY13": "MY13",
            "M156 MY16": "M156 MY16",
            "M156 MY17": "M156 MY17",
            "M156 MY18": "M156 MY18",
            "M156": "M156",
            "156 MY19": "156 MY19",
            "M156 MY19": "M156 MY19",
            "M156 MY20": "M156 MY20",
            "M156 MY21": "M156 MY21",
            "M156 MY22": "M156 MY22"
        },
        "720S": {
            "MY18": "MY18",
            "MY19": "MY19"
        },
        "A45": {
            "176 MY17": "176 MY17",
            "176 MY17.5": "176 MY17.5",
            "176 MY18": "176 MY18",
            "176 MY16": "176 MY16",
            "176 MY14": "176 MY14",
            "176 MY15": "176 MY15",
            "176": "176",
            "W177 MY20.5": "W177 MY20.5",
            "W177 MY21": "W177 MY21",
            "W177 MY21.5": "W177 MY21.5",
            "W177 MY22": "W177 MY22",
            "W177 MY22.5": "W177 MY22.5",
            "W177 MY23": "W177 MY23"
        },
        "C": {
            "205": "205",
            "205 MY17.5": "205 MY17.5",
            "205 MY18": "205 MY18",
            "205 MY16": "205 MY16",
            "205 MY19": "205 MY19",
            "A205 MY20": "A205 MY20",
            "C205 MY20": "C205 MY20",
            "S205 MY20": "S205 MY20",
            "W205 MY20": "W205 MY20",
            "A205 MY20.5": "A205 MY20.5",
            "C205 MY20.5": "C205 MY20.5",
            "S205 MY20.5": "S205 MY20.5",
            "W205 MY20.5": "W205 MY20.5",
            "A205 MY21": "A205 MY21",
            "C205 MY21": "C205 MY21",
            "S205 MY21": "S205 MY21",
            "W205 MY21": "W205 MY21",
            "A205 MY21.5": "A205 MY21.5",
            "C205 MY21.5": "C205 MY21.5",
            "A205 MY22": "A205 MY22",
            "C205 MY22": "C205 MY22",
            "A205 MY23": "A205 MY23",
            "C205 MY23": "C205 MY23",
            "A205 MY23.5": "A205 MY23.5",
            "C205 MY23.5": "C205 MY23.5"
        },
        "CLA": {
            "117 MY18.5": "117 MY18.5",
            "117 MY17": "117 MY17",
            "117 MY18": "117 MY18",
            "117 MY17.5": "117 MY17.5",
            "117 MY16": "117 MY16",
            "117": "117",
            "117 MY15": "117 MY15",
            "C118": "C118",
            "C118 MY20": "C118 MY20",
            "C118 MY20.5": "C118 MY20.5",
            "C118 MY21": "C118 MY21",
            "C118 MY21.5": "C118 MY21.5",
            "C118 MY22": "C118 MY22",
            "C118 MY22.5": "C118 MY22.5",
            "C118 MY23": "C118 MY23",
            "C118 MY23.5": "C118 MY23.5"
        },
        "E": {
            "213": "213",
            "213 MY17.5": "213 MY17.5",
            "213 MY18": "213 MY18",
            "213 MY19": "213 MY19",
            "238 MY19": "238 MY19",
            "213 MY19.5": "213 MY19.5",
            "238 MY19.5": "238 MY19.5",
            "A238 MY20": "A238 MY20",
            "C238 MY20": "C238 MY20",
            "W213 MY20": "W213 MY20",
            "A238 MY20.5": "A238 MY20.5",
            "C238 MY20.5": "C238 MY20.5",
            "W213 MY20.5": "W213 MY20.5",
            "A238 MY21": "A238 MY21",
            "C238 MY21": "C238 MY21",
            "W213 MY21": "W213 MY21",
            "A238 MY21.5": "A238 MY21.5",
            "C238 MY21.5": "C238 MY21.5",
            "W213 MY21.5": "W213 MY21.5",
            "A238 MY22": "A238 MY22",
            "C238 MY22": "C238 MY22",
            "W213 MY22": "W213 MY22",
            "A238 MY22.5": "A238 MY22.5",
            "C238 MY22.5": "C238 MY22.5",
            "W213 MY22.5": "W213 MY22.5",
            "A238 MY23": "A238 MY23",
            "C238 MY23": "C238 MY23",
            "W213 MY23": "W213 MY23",
            "A238 MY23.5": "A238 MY23.5",
            "C238 MY23.5": "C238 MY23.5",
            "W213 MY23.5": "W213 MY23.5"
        },
        "GT": {
            "190 MY17": "190 MY17",
            "190 MY18": "190 MY18",
            "190 MY17.5": "190 MY17.5",
            "190": "190",
            "X290 MY19": "X290 MY19",
            "X290 MY20": "X290 MY20",
            "X290 MY20.5": "X290 MY20.5",
            "C190": "C190",
            "R190": "R190",
            "MY20": "MY20",
            "C190 MY21": "C190 MY21",
            "R190 MY21": "R190 MY21",
            "X290 MY21.5": "X290 MY21.5",
            "C190 MY21.5": "C190 MY21.5",
            "R190 MY21.5": "R190 MY21.5",
            "C190 MY22": "C190 MY22",
            "R190 MY22": "R190 MY22"
        },
        "SLC": {
            "172 MY17": "172 MY17",
            "172 MY17.5": "172 MY17.5",
            "172 MY18": "172 MY18",
            "172 MY18.5": "172 MY18.5",
            "172 MY20": "172 MY20"
        },
        "S": {
            "222": "222",
            "X222 MY18": "X222 MY18",
            "X222 MY19": "X222 MY19",
            "X222 MY19.5": "X222 MY19.5",
            "X222 MY20.5": "X222 MY20.5",
            "Z223 MY22": "Z223 MY22"
        },
        "A250": {
            "176 MY16": "176 MY16",
            "176 MY17.5": "176 MY17.5",
            "176 MY18": "176 MY18",
            "176 MY14": "176 MY14",
            "176 MY15": "176 MY15",
            "176 MY17": "176 MY17",
            "176": "176",
            "177 MY19": "177 MY19",
            "W177 MY20": "W177 MY20",
            "W177 MY20.5": "W177 MY20.5",
            "V177 MY20.5": "V177 MY20.5",
            "W177 MY21": "W177 MY21",
            "V177 MY21": "V177 MY21",
            "V177 MY21.5": "V177 MY21.5",
            "W177 MY21.5": "W177 MY21.5",
            "V177 MY22": "V177 MY22",
            "W177 MY22": "W177 MY22",
            "V177 MY22.5": "V177 MY22.5",
            "W177 MY22.5": "W177 MY22.5",
            "V177 MY23": "V177 MY23",
            "W177 MY23": "W177 MY23"
        },
        "B250": {
            "246 MY14": "246 MY14",
            "246 MY15": "246 MY15",
            "246 MY16": "246 MY16",
            "246 MY17": "246 MY17",
            "246 MY17.5": "246 MY17.5",
            "246 MY18": "246 MY18",
            "246 MY18.5": "246 MY18.5",
            "246 MY13": "246 MY13",
            "W247 MY18.5": "W247 MY18.5"
        },
        "C300": {
            "205 MY16": "205 MY16",
            "205 MY17": "205 MY17",
            "205 MY17.5": "205 MY17.5",
            "205 MY18": "205 MY18",
            "W204 MY11": "W204 MY11",
            "W204 MY12": "W204 MY12",
            "W204 MY13": "W204 MY13",
            "W204 MY10": "W204 MY10",
            "W204 MY10 UPGRADE": "W204 MY10 UPGRADE",
            "W204 MY14": "W204 MY14",
            "W204": "W204",
            "205": "205",
            "205 MY19": "205 MY19",
            "A205 MY20": "A205 MY20",
            "C205 MY20": "C205 MY20",
            "S205 MY20": "S205 MY20",
            "W205 MY20": "W205 MY20",
            "A205 MY20.5": "A205 MY20.5",
            "C205 MY20.5": "C205 MY20.5",
            "S205 MY20.5": "S205 MY20.5",
            "W205 MY20.5": "W205 MY20.5",
            "A205 MY21": "A205 MY21",
            "C205 MY21": "C205 MY21",
            "S205 MY21": "S205 MY21",
            "W205 MY21": "W205 MY21",
            "A205 MY21.5": "A205 MY21.5",
            "C205 MY21.5": "C205 MY21.5",
            "A205 MY22": "A205 MY22",
            "C205 MY22": "C205 MY22",
            "W206 MY22": "W206 MY22",
            "W206 MY23": "W206 MY23",
            "A205 MY23": "A205 MY23",
            "C205 MY23": "C205 MY23",
            "A205 MY23.5": "A205 MY23.5",
            "C205 MY23.5": "C205 MY23.5",
            "W206 MY23.5": "W206 MY23.5"
        },
        "E220": {
            "212 MY11": "212 MY11",
            "212 MY12": "212 MY12",
            "212": "212",
            "212 MY13": "212 MY13",
            "212 MY14": "212 MY14",
            "212 MY15": "212 MY15",
            "212 MY15 UPGRADE": "212 MY15 UPGRADE",
            "213": "213",
            "213 MY17.5": "213 MY17.5",
            "213 MY18": "213 MY18",
            "238 MY17.5": "238 MY17.5",
            "238 MY18": "238 MY18",
            "213 MY19": "213 MY19",
            "238 MY19": "238 MY19",
            "213 MY19.5": "213 MY19.5",
            "238 MY19.5": "238 MY19.5",
            "W213 MY20": "W213 MY20",
            "C238 MY20": "C238 MY20",
            "S213 MY20": "S213 MY20",
            "C238 MY20.5": "C238 MY20.5",
            "W213 MY20.5": "W213 MY20.5",
            "S213 MY20.5": "S213 MY20.5"
        },
        "E250": {
            "207 MY13": "207 MY13",
            "207 MY14": "207 MY14",
            "207 MY15": "207 MY15",
            "207 MY15 UPGRADE": "207 MY15 UPGRADE",
            "212 MY13": "212 MY13",
            "212 MY14": "212 MY14",
            "212 MY15": "212 MY15",
            "207 MY16": "207 MY16",
            "212 MY15 UPGRADE": "212 MY15 UPGRADE",
            "E207 MY12": "E207 MY12",
            "207 MY11": "207 MY11",
            "212 MY11": "212 MY11",
            "212 MY12": "212 MY12",
            "212 MY11 UPGRADE": "212 MY11 UPGRADE",
            "212": "212",
            "207": "207",
            "207 MY12": "207 MY12"
        },
        "E200": {
            "207 MY13": "207 MY13",
            "207 MY14": "207 MY14",
            "207 MY15": "207 MY15",
            "207 MY15 UPGRADE": "207 MY15 UPGRADE",
            "212 MY13": "212 MY13",
            "212 MY14": "212 MY14",
            "212 MY15": "212 MY15",
            "207 MY16": "207 MY16",
            "213": "213",
            "213 MY17.5": "213 MY17.5",
            "212 MY15 UPGRADE": "212 MY15 UPGRADE",
            "213 MY18": "213 MY18",
            "212 MY12": "212 MY12",
            "213 MY19": "213 MY19",
            "213 MY19.5": "213 MY19.5",
            "W213 MY20": "W213 MY20",
            "W213 MY19": "W213 MY19",
            "W213 MY20.5": "W213 MY20.5",
            "W213 MY21": "W213 MY21",
            "C238 MY21": "C238 MY21",
            "C238 MY21.5": "C238 MY21.5",
            "W213 MY21.5": "W213 MY21.5",
            "W213 MY22": "W213 MY22",
            "C238 MY22": "C238 MY22",
            "C238 MY22.5": "C238 MY22.5",
            "W213 MY22.5": "W213 MY22.5",
            "W213 MY23": "W213 MY23",
            "C238 MY23": "C238 MY23",
            "C238 MY23.5": "C238 MY23.5",
            "W213 MY23.5": "W213 MY23.5"
        },
        "E250D": {
            "207 MY16": "207 MY16"
        },
        "E400": {
            "207 MY13": "207 MY13",
            "207 MY14": "207 MY14",
            "207 MY15": "207 MY15",
            "207 MY15 UPGRADE": "207 MY15 UPGRADE",
            "212 MY13": "212 MY13",
            "212 MY14": "212 MY14",
            "212 MY15": "212 MY15",
            "207 MY16": "207 MY16",
            "213 MY17.5": "213 MY17.5",
            "212 MY15 UPGRADE": "212 MY15 UPGRADE",
            "213": "213",
            "238 MY17.5": "238 MY17.5",
            "238": "238",
            "238 MY18": "238 MY18",
            "213 MY18": "213 MY18",
            "W213 MY21.5": "W213 MY21.5"
        },
        "MARCO POLO ACTIVITY": {
            "447": "447",
            "447 MY20": "447 MY20",
            "447 MY21": "447 MY21"
        },
        "S300": {
            "222": "222",
            "222 MY15": "222 MY15",
            "222 MY16": "222 MY16",
            "222 MY17": "222 MY17"
        },
        "S400": {
            "222": "222",
            "222 MY15": "222 MY15",
            "222 MY16": "222 MY16",
            "222 MY17": "222 MY17",
            "222 MY18": "222 MY18",
            "222 MY18.5": "222 MY18.5",
            "222 MY19": "222 MY19",
            "222 MY19.5": "222 MY19.5"
        },
        "S450": {
            "222 MY18": "222 MY18",
            "222 MY18.5": "222 MY18.5",
            "222 MY19": "222 MY19",
            "222 MY19.5": "222 MY19.5",
            "222 MY20": "222 MY20",
            "W\/V222 MY20": "W\/V222 MY20",
            "W\/V222 MY20.5": "W\/V222 MY20.5",
            "W223 MY21": "W223 MY21",
            "V223 MY22": "V223 MY22",
            "W223 MY22": "W223 MY22",
            "W223 MY22.5": "W223 MY22.5",
            "W223 MY23.5": "W223 MY23.5"
        },
        "S560": {
            "222 MY18": "222 MY18",
            "222 MY18.5": "222 MY18.5",
            "217 MY18.5": "217 MY18.5",
            "222 MY19": "222 MY19",
            "222 MY19.5": "222 MY19.5",
            "217 MY19": "217 MY19",
            "217 MY19.5": "217 MY19.5",
            "222 MY20": "222 MY20",
            "217 MY20": "217 MY20",
            "W\/V222 MY20": "W\/V222 MY20",
            "C217 MY20": "C217 MY20",
            "A217 MY20": "A217 MY20",
            "A217 MY20.5": "A217 MY20.5",
            "C217 MY20.5": "C217 MY20.5",
            "W\/V222 MY20.5": "W\/V222 MY20.5",
            "A217 MY21": "A217 MY21",
            "C217 MY21": "C217 MY21"
        },
        "SLS": {
            "197": "197",
            "197 MY11": "197 MY11"
        },
        "V": {
            "447": "447",
            "447 MY17": "447 MY17",
            "447 MY20": "447 MY20",
            "447 MY21": "447 MY21",
            "447 MY22": "447 MY22"
        },
        "VALENTE": {
            "447": "447",
            "447 MY20": "447 MY20",
            "447 MY21": "447 MY21"
        },
        "6 PLUS": {
            "MY17": "MY17"
        },
        "MG6": {
            "IP2X": "IP2X"
        },
        "3 WHEELER": {
            "M3W": "M3W"
        },
        "4\/4": {
            "MY13": "MY13"
        },
        "AERO COUPE": {
            "MY13": "MY13"
        },
        "AERO SUPERSPORTS": {
            "MY13": "MY13"
        },
        "PLUS 4": {
            "MY13": "MY13",
            "MY15": "MY15"
        },
        "PLUS 8": {
            "MY13": "MY13"
        },
        "3D HATCH": {
            "F56": "F56",
            "F56 MY17": "F56 MY17",
            "F56 MY18": "F56 MY18",
            "F56 MY19": "F56 MY19",
            "F56 UPDATE": "F56 UPDATE"
        },
        "5D HATCH": {
            "F55": "F55",
            "F55 MY17": "F55 MY17",
            "F55 MY18": "F55 MY18",
            "F55 MY19": "F55 MY19",
            "F55 UPDATE": "F55 UPDATE"
        },
        "CLUBMAN": {
            "F54": "F54",
            "F54 MY17": "F54 MY17",
            "F54 MY18": "F54 MY18",
            "F54 MY19": "F54 MY19",
            "F54 UPDATE": "F54 UPDATE"
        },
        "CONVERTIBLE": {
            "F57": "F57",
            "F57 MY17": "F57 MY17",
            "F57 MY19": "F57 MY19",
            "F57 MY18": "F57 MY18",
            "F57 UPDATE": "F57 UPDATE"
        },
        "ONE": {
            "F56": "F56",
            "F55": "F55"
        },
        "RAY": {
            "F55": "F55",
            "F56": "F56"
        },
        "i-MiEV": {
            "MY12": "MY12"
        },
        "370Z": {
            "Z34 MY10": "Z34 MY10",
            "Z34 MY11": "Z34 MY11",
            "Z34 MY13": "Z34 MY13",
            "Z34 MY13.5": "Z34 MY13.5",
            "Z34 MY15": "Z34 MY15",
            "Z34 MY17": "Z34 MY17",
            "Z34 MY18": "Z34 MY18",
            "Z34": "Z34"
        },
        "ALMERA": {
            "N17": "N17"
        },
        "ALTIMA": {
            "L33": "L33"
        },
        "LEAF": {
            "ZE0": "ZE0",
            "ZE1": "ZE1",
            "ZE1 MY21": "ZE1 MY21",
            "ZE1 MY22": "ZE1 MY22",
            "ZE1 MY23": "ZE1 MY23"
        },
        "CORSA": {
            "SL": "SL"
        },
        "207": {
            "MY10": "MY10",
            "MY12": "MY12",
            "MY10 UPGRADE": "MY10 UPGRADE",
            "MY11": "MY11"
        },
        "208": {
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY18.5": "MY18.5",
            "MY17 UPDATE": "MY17 UPDATE"
        },
        "308": {
            "T9 UPDATE": "T9 UPDATE",
            "T9 MY18": "T9 MY18",
            "T9 MY18 UPDATE": "T9 MY18 UPDATE",
            "T9 MY18.5": "T9 MY18.5",
            "T9": "T9",
            "11 UPGRADE": "11 UPGRADE",
            "MY19": "MY19",
            "T9 MY20": "T9 MY20",
            "P51 MY22": "P51 MY22",
            "P52 MY22": "P52 MY22"
        },
        "508": {
            "MY13": "MY13",
            "MY15": "MY15",
            "MY17": "MY17",
            "MY16": "MY16",
            "MY19": "MY19",
            "R8 MY20": "R8 MY20",
            "R8 MY22": "R8 MY22"
        },
        "RCZ": {
            "MY13": "MY13"
        },
        "718": {
            "982 MY18": "982 MY18",
            "982 MY17": "982 MY17",
            "982 MY19": "982 MY19",
            "982 MY20": "982 MY20",
            "982 MY21": "982 MY21",
            "982 MY22": "982 MY22",
            "982 MY23": "982 MY23"
        },
        "PANAMERA": {
            "970 MY11": "970 MY11",
            "970 MY12": "970 MY12",
            "970 MY13": "970 MY13",
            "970 MY14": "970 MY14",
            "970 MY15": "970 MY15",
            "970 MY16": "970 MY16",
            "971 MY17": "971 MY17",
            "971 MY18": "971 MY18",
            "970": "970",
            "97A MY18": "97A MY18",
            "97C MY18": "97C MY18",
            "971 MY19": "971 MY19",
            "97A MY20": "97A MY20",
            "97C MY20": "97C MY20",
            "97A MY21": "97A MY21",
            "97B MY21": "97B MY21",
            "97C MY21": "97C MY21",
            "97A MY22": "97A MY22",
            "97B MY22": "97B MY22",
            "97C MY22": "97C MY22",
            "97A MY23": "97A MY23",
            "97B MY23": "97B MY23",
            "97C MY23": "97C MY23"
        },
        "EXORA": {
            "FZ": "FZ"
        },
        "PERSONA": {
            "MY12": "MY12"
        },
        "PREVE": {
            "CR": "CR"
        },
        "S16": {
            "BT": "BT"
        },
        "S16 FLX": {
            "BT MY12": "BT MY12"
        },
        "SATRIA-NEO": {
            "BS": "BS"
        },
        "SUPRIMA S": {
            "CR": "CR"
        },
        "FLUENCE": {
            "X38 MY13": "X38 MY13",
            "X38": "X38"
        },
        "LATITUDE": {
            "X43": "X43",
            "X43 MY14": "X43 MY14"
        },
        "DAWN": {
            "MY15": "MY15",
            "RR6 (XZ82) MY18": "RR6 (XZ82) MY18",
            "666D MY19": "666D MY19",
            "666D MY20": "666D MY20",
            "666D MY21": "666D MY21"
        },
        "GHOST": {
            "SERIES II": "SERIES II",
            "RR4 (FK42) MY18": "RR4 (FK42) MY18",
            "RR4L (XZ42) MY18": "RR4L (XZ42) MY18",
            "664S SERIES II MY19": "664S SERIES II MY19",
            "664S SERIES II MY20": "664S SERIES II MY20",
            "RR21 MY21": "RR21 MY21",
            "RR22 MY22": "RR22 MY22",
            "664L SERIES II MY19": "664L SERIES II MY19",
            "664L SERIES II MY20": "664L SERIES II MY20"
        },
        "PHANTOM": {
            "SERIES 2": "SERIES 2",
            "RR12 (TT82) MY18": "RR12 (TT82) MY18",
            "RR11 (TT62) MY18": "RR11 (TT62) MY18",
            "687S MY19": "687S MY19",
            "687S MY20": "687S MY20",
            "687S MY21": "687S MY21",
            "687S MY22": "687S MY22",
            "688L MY19": "688L MY19",
            "688L MY20": "688L MY20",
            "688L MY21": "688L MY21",
            "688L MY22": "688L MY22"
        },
        "WRAITH": {
            "RR5 (XZ02) MY18": "RR5 (XZ02) MY18",
            "665C MY19": "665C MY19",
            "665C MY20": "665C MY20",
            "665C MY21": "665C MY21"
        },
        "FABIA": {
            "5JF MY13": "5JF MY13",
            "NJ MY17": "NJ MY17",
            "NJ": "NJ",
            "NJ MY18": "NJ MY18",
            "NJ MY18.5": "NJ MY18.5",
            "5JF MY15": "5JF MY15",
            "5JF MY14": "5JF MY14",
            "5JF": "5JF",
            "NJ MY19": "NJ MY19",
            "NJ MY20": "NJ MY20",
            "NJ MY21": "NJ MY21",
            "PJ MY22": "PJ MY22",
            "PJ MY23": "PJ MY23",
            "PJ MY23.5": "PJ MY23.5"
        },
        "RAPID SPACEBACK": {
            "NH MY15": "NH MY15",
            "NH MY16": "NH MY16",
            "NH MY17": "NH MY17",
            "NH MY18": "NH MY18",
            "NH": "NH",
            "NH MY19": "NH MY19"
        },
        "SUPERB": {
            "3T": "3T",
            "3T MY12": "3T MY12",
            "3T MY13": "3T MY13",
            "3T MY14": "3T MY14",
            "3T MY15": "3T MY15",
            "3T MY11": "3T MY11",
            "NP MY16": "NP MY16",
            "NP MY17": "NP MY17",
            "NP MY18": "NP MY18",
            "NP MY18.5": "NP MY18.5",
            "NP MY19": "NP MY19",
            "NP": "NP",
            "NP MY21": "NP MY21",
            "NP MY22": "NP MY22",
            "NP MY20": "NP MY20",
            "3V MY23": "3V MY23",
            "3V MY23.5": "3V MY23.5"
        },
        "BRZ": {
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY22": "MY22",
            "MY23": "MY23"
        },
        "LEVORG": {
            "MY18": "MY18",
            "MY19": "MY19",
            "MY17": "MY17",
            "MY20": "MY20"
        },
        "WRX": {
            "MY12": "MY12",
            "MY13": "MY13",
            "MY14": "MY14",
            "MY15": "MY15",
            "MY16": "MY16",
            "MY17": "MY17",
            "MY18": "MY18",
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "ALTO": {
            "GF MY12": "GF MY12",
            "GF": "GF"
        },
        "BALENO": {
            "MY16": "MY16",
            "SERIES II": "SERIES II",
            "EW SERIES II MY22": "EW SERIES II MY22"
        },
        "CELERIO": {
            "LF": "LF"
        },
        "KIZASHI": {
            "FR MY11": "FR MY11",
            "FR MY13": "FR MY13",
            "FR MY14": "FR MY14",
            "FR": "FR"
        },
        "MODEL S": {
            "MY17": "MY17",
            "MY18": "MY18",
            "FACELIFT": "FACELIFT",
            "MY19": "MY19",
            "MY19 UPDATE": "MY19 UPDATE",
            "MY20": "MY20",
            "MY21": "MY21"
        },
        "86": {
            "ZN6 MY15": "ZN6 MY15",
            "ZN6 MY18": "ZN6 MY18",
            "ZN6 MY17 UPDATE": "ZN6 MY17 UPDATE",
            "ZN6 MY14": "ZN6 MY14",
            "ZN6 MY17": "ZN6 MY17",
            "ZN6 MY14 UPGRADE": "ZN6 MY14 UPGRADE",
            "ZN6": "ZN6"
        },
        "PRIUS-C": {
            "NHP10R": "NHP10R",
            "NHP10R MY15": "NHP10R MY15",
            "NHP10R MY17": "NHP10R MY17"
        },
        "PRIUS V": {
            "ZVW40R UPGRADE": "ZVW40R UPGRADE",
            "ZVW40R": "ZVW40R"
        },
        "RUKUS": {
            "AZE151R": "AZE151R"
        },
        "S90": {
            "P MY17": "P MY17",
            "P MY18": "P MY18"
        },
        "V60": {
            "F MY12": "F MY12",
            "F MY13": "F MY13",
            "F": "F",
            "F MY18": "F MY18",
            "F MY16": "F MY16",
            "F MY17": "F MY17",
            "F MY14": "F MY14",
            "F MY15": "F MY15",
            "225 MY20": "225 MY20",
            "225 MY21": "225 MY21",
            "227 MY22": "227 MY22",
            "227 MY23": "227 MY23",
            "227 MY23B": "227 MY23B"
        },
        "V90": {
            "P MY18": "P MY18",
            "P MY17": "P MY17",
            "236 MY19": "236 MY19",
            "236 MY20": "236 MY20",
            "236 MY21": "236 MY21"
        },
        "ARTEON": {
            "MY18": "MY18",
            "MY19": "MY19",
            "3H MY22": "3H MY22",
            "3H MY23": "3H MY23"
        },
        "CC": {
            "3C MY13.5": "3C MY13.5",
            "3C MY14": "3C MY14",
            "3C MY14.5": "3C MY14.5",
            "3C MY15": "3C MY15",
            "3C MY13": "3C MY13",
            "3C MY16": "3C MY16"
        },
        "PASSAT CC": {
            "3C MY10": "3C MY10",
            "3C MY11": "3C MY11",
            "3C MY12": "3C MY12",
            "3C MY11 UPGRADE": "3C MY11 UPGRADE",
            "3C": "3C"
        },
        "SCIROCCO": {
            "1S MY13": "1S MY13",
            "1S MY13.5": "1S MY13.5",
            "1S MY14": "1S MY14",
            "1S MY16": "1S MY16",
            "1S MY17": "1S MY17",
            "1S MY15": "1S MY15",
            "1S": "1S"
        },
        "UP!": {
            "AA MY14": "AA MY14",
            "AA MY14.5": "AA MY14.5",
            "AA": "AA"
        },
        "SAUVANA": {
            "U201 MY18": "U201 MY18"
        },
        "H2": {
            "MY18": "MY18",
            "MY19": "MY19",
            "MY20": "MY20"
        },
        "ACADIA": {
            "AC": "AC",
            "AC MY19": "AC MY19"
        },
        "UX200": {
            "MZAA10R MY19": "MZAA10R MY19",
            "MZAA10R": "MZAA10R"
        },
        "UX250h": {
            "MZAH10R MY19": "MZAH10R MY19",
            "MZAH15R MY19": "MZAH15R MY19",
            "MZAH10R": "MZAH10R",
            "MZAH15R": "MZAH15R"
        },
        "A110": {
            "MY18": "MY18",
            "XEF": "XEF"
        },
        "CAMARO": {
            "MY18": "MY18",
            "1AL37 MY18": "1AL37 MY18",
            "1AL37 MY19": "1AL37 MY19",
            "1AK37 MY20": "1AK37 MY20"
        },
        "E450": {
            "213 MY19": "213 MY19",
            "238 MY19": "238 MY19",
            "213 MY19.5": "213 MY19.5",
            "238 MY19.5": "238 MY19.5",
            "A238 MY20": "A238 MY20",
            "C238 MY20": "C238 MY20",
            "W213 MY20": "W213 MY20",
            "A238 MY20.5": "A238 MY20.5",
            "C238 MY20.5": "C238 MY20.5",
            "W213 MY20.5": "W213 MY20.5"
        },
        "MG3 AUTO": {
            "MY18 UPDATE": "MY18 UPDATE",
            "MY18": "MY18",
            "MY20": "MY20",
            "SZP1 MY21": "SZP1 MY21",
            "SZP1 MY22": "SZP1 MY22"
        },
        "MG6 PLUS": {
            "MY17": "MY17"
        },
        "ENDURA": {
            "CA MY19": "CA MY19",
            "CA MY20": "CA MY20"
        },
        "TIVOLI": {
            "X100 MY19": "X100 MY19"
        },
        "TIVOLI XLV": {
            "X100 MY19": "X100 MY19"
        },
        "IONIQ": {
            "AE.2": "AE.2",
            "AE.3 MY20": "AE.3 MY20",
            "AE.V4 MY21": "AE.V4 MY21",
            "AE.V4 MY22": "AE.V4 MY22"
        },
        "110": {
            "MY18": "MY18"
        },
        "Q8": {
            "4M MY19": "4M MY19",
            "4M MY20": "4M MY20",
            "4M MY19C": "4M MY19C",
            "4M MY21": "4M MY21",
            "4M MY22": "4M MY22",
            "4M MY22A": "4M MY22A",
            "4M MY23": "4M MY23"
        },
        "695": {
            "SERIES 4": "SERIES 4",
            "SERIES 10": "SERIES 10"
        },
        "695C": {
            "SERIES 4": "SERIES 4"
        },
        "X7": {
            "G07": "G07",
            "G07 LCI": "G07 LCI"
        },
        "RANGE ROVER EVOQUE": {
            "L551 MY20": "L551 MY20",
            "L551 MY20.25": "L551 MY20.25",
            "L551 MY20.5": "L551 MY20.5",
            "L551 MY21": "L551 MY21",
            "L551 MY22": "L551 MY22",
            "L551 MY23": "L551 MY23",
            "L551 MY23.5": "L551 MY23.5"
        },
        "MODEL 3": {
            "MY19": "MY19",
            "MY19 UPDATE": "MY19 UPDATE",
            "MY20": "MY20",
            "MY20 UPGRADE": "MY20 UPGRADE",
            "MY21": "MY21",
            "MY21 UPDATE": "MY21 UPDATE",
            "MY22": "MY22",
            "MY23": "MY23"
        },
        "SUPRA": {
            "GR DB42R": "GR DB42R",
            "DB02R": "DB02R",
            "DB06R": "DB06R"
        },
        "RANGE ROVER SPORT": {
            "L494 MY20": "L494 MY20",
            "L494 MY20.5": "L494 MY20.5",
            "L494 MY21": "L494 MY21",
            "L494 MY21.5": "L494 MY21.5",
            "L494 MY22": "L494 MY22",
            "L461 MY23": "L461 MY23"
        },
        "MUSSO XLV": {
            "MY19": "MY19",
            "MY20": "MY20",
            "Q201L MY20": "Q201L MY20",
            "Q201L MY20.5": "Q201L MY20.5",
            "Q215 MY21": "Q215 MY21",
            "Q250 MY22": "Q250 MY22",
            "Q250 MY23": "Q250 MY23"
        },
        "G70": {
            "IK": "IK",
            "IK.V2 MY21": "IK.V2 MY21",
            "IK.V2 MY22": "IK.V2 MY22",
            "IK.V2 MY23": "IK.V2 MY23"
        },
        "RANGE ROVER VELAR": {
            "L560 MY20": "L560 MY20",
            "L560 MY21": "L560 MY21",
            "L560 MY22": "L560 MY22",
            "L560 MY23": "L560 MY23"
        },
        "500C": {
            "SERIES 6": "SERIES 6",
            "SERIES 7": "SERIES 7",
            "SERIES 8": "SERIES 8",
            "SERIES 9 MY21": "SERIES 9 MY21"
        },
        "VENUE": {
            "QX MY20": "QX MY20",
            "QX.2 MY20": "QX.2 MY20",
            "QX.V3 MY21": "QX.V3 MY21",
            "QX.V4 MY22": "QX.V4 MY22",
            "QX.V5 MY23": "QX.V5 MY23"
        },
        "RANGE ROVER AUTOBIOGRAPH": {
            "L405 MY20": "L405 MY20",
            "L405 MY20.5": "L405 MY20.5",
            "L405 MY21.5": "L405 MY21.5",
            "L405 MY22": "L405 MY22",
            "L460 MY22": "L460 MY22",
            "L460 MY23": "L460 MY23"
        },
        "RANGE ROVER VOGUE": {
            "L405 MY20": "L405 MY20",
            "L405 MY20.5": "L405 MY20.5",
            "L405 MY21.5": "L405 MY21.5",
            "L405 MY22": "L405 MY22"
        },
        "A35": {
            "W177 MY20": "W177 MY20",
            "V177 MY20": "V177 MY20",
            "W177 MY20.5": "W177 MY20.5",
            "W177 MY21": "W177 MY21",
            "V177 MY21": "V177 MY21",
            "V177 MY21.5": "V177 MY21.5",
            "W177 MY21.5": "W177 MY21.5",
            "V177 MY22": "V177 MY22",
            "W177 MY22": "W177 MY22",
            "V177 MY22.5": "V177 MY22.5",
            "W177 MY22.5": "W177 MY22.5",
            "V177 MY23": "V177 MY23",
            "W177 MY23": "W177 MY23"
        },
        "BOXER": {
            "X250 MY19": "X250 MY19",
            "X250 MY20": "X250 MY20"
        },
        "B7": {
            "G12": "G12"
        },
        "600LT": {
            "MY19": "MY19",
            "MY20": "MY20"
        },
        "GRANVIA": {
            "GDH303R": "GDH303R"
        },
        "XD3": {
            "GO1": "GO1",
            "G01": "G01"
        },
        "SELTOS": {
            "MY20": "MY20",
            "SP2 MY21": "SP2 MY21",
            "SP2 MY22": "SP2 MY22",
            "SP2 PE MY23": "SP2 PE MY23"
        },
        "B5": {
            "G30": "G30",
            "G31": "G31"
        },
        "LC 500": {
            "URZ100R": "URZ100R"
        },
        "LC 500h (HYBRID)": {
            "GWZ100R": "GWZ100R"
        },
        "D90": {
            "MY19": "MY19",
            "SV9A MY20": "SV9A MY20",
            "SV9A MY21": "SV9A MY21",
            "SV9A": "SV9A"
        },
        "CX-30": {
            "CX-30A": "CX-30A",
            "C30A": "C30A",
            "C30B": "C30B",
            "C30C": "C30C"
        },
        "EQC": {
            "293": "293",
            "N293 MY20": "N293 MY20",
            "N293 MY19": "N293 MY19",
            "N293 MY21": "N293 MY21",
            "N23 MY21.5": "N23 MY21.5",
            "N293 MY21.5": "N293 MY21.5",
            "N293 MY22": "N293 MY22",
            "N293 MY23": "N293 MY23"
        },
        "HS": {
            "MY19": "MY19",
            "MY20": "MY20",
            "SAS23 MY21": "SAS23 MY21",
            "SAS23 MY22": "SAS23 MY22"
        },
        "LS500": {
            "VXFA50R": "VXFA50R"
        },
        "LS500h (HYBRID)": {
            "GVF50R": "GVF50R"
        },
        "M8": {
            "G14": "G14",
            "G15": "G15",
            "G16": "G16",
            "F92": "F92",
            "F93": "F93",
            "F93 LCI": "F93 LCI",
            "F92 LCI": "F92 LCI"
        },
        "C3 AIRCROSS": {
            "MY18": "MY18",
            "B618 MY20": "B618 MY20"
        },
        "C5 AIRCROSS": {
            "C84 MY20": "C84 MY20",
            "C84 MY22": "C84 MY22"
        },
        "GLADIATOR": {
            "JT MY20": "JT MY20",
            "JT MY21": "JT MY21",
            "JT MY21 V2": "JT MY21 V2",
            "JT MY22": "JT MY22",
            "JT MY23": "JT MY23"
        },
        "VANTAGE": {
            "MY19": "MY19"
        },
        "540C": {
            "MY19": "MY19"
        },
        "570GT": {
            "MY19": "MY19",
            "MY17": "MY17"
        },
        "570S": {
            "MY19": "MY19"
        },
        "SQ8": {
            "MY20": "MY20",
            "4M MY20": "4M MY20",
            "4M MY21": "4M MY21",
            "4M MY22": "4M MY22",
            "4M MY22A": "4M MY22A",
            "4M MY23": "4M MY23"
        },
        "T-CROSS": {
            "C1 MY20": "C1 MY20",
            "C1 MY21": "C1 MY21",
            "MY21": "MY21",
            "C1 MY22": "C1 MY22",
            "C1 MY22.5": "C1 MY22.5",
            "C1 MY23": "C1 MY23",
            "C1 MY23 UPDATE": "C1 MY23 UPDATE"
        },
        "RS 4": {
            "B7": "B7",
            "8K MY14": "8K MY14",
            "8K MY15": "8K MY15",
            "8K MY17": "8K MY17",
            "MY18": "MY18",
            "8K": "8K",
            "8W MY19": "8W MY19",
            "8V MY20": "8V MY20",
            "8W MY20": "8W MY20",
            "8W MY21": "8W MY21",
            "8W MY22": "8W MY22",
            "8W MY22A": "8W MY22A",
            "8W MY23": "8W MY23"
        },
        "RS 5": {
            "8T": "8T",
            "F5 MY19": "F5 MY19",
            "F5 MY18": "F5 MY18",
            "8T MY12 UPGRADE": "8T MY12 UPGRADE",
            "8T MY14": "8T MY14",
            "8T MY15": "8T MY15",
            "F5 MY20": "F5 MY20",
            "F5 MY21": "F5 MY21",
            "F5 MY22": "F5 MY22",
            "F5 MY22A": "F5 MY22A",
            "F5 MY23": "F5 MY23"
        },
        "RS 6": {
            "4F MY09": "4F MY09",
            "4B": "4B",
            "4F": "4F",
            "4G MY16": "4G MY16",
            "4G MY17": "4G MY17",
            "4G MY18": "4G MY18",
            "4GL MY15": "4GL MY15",
            "4GL MY17": "4GL MY17",
            "4GL": "4GL",
            "4A MY20": "4A MY20",
            "4A MY21": "4A MY21",
            "4A MY22": "4A MY22",
            "4A MY22A": "4A MY22A",
            "4A MY23": "4A MY23"
        },
        "RS 3": {
            "8V MY17": "8V MY17",
            "8V MY18": "8V MY18",
            "8V": "8V",
            "8V MY20": "8V MY20",
            "8Y MY22": "8Y MY22",
            "8Y MY22A": "8Y MY22A",
            "8Y MY23": "8Y MY23"
        },
        "RS 7": {
            "4G MY14": "4G MY14",
            "4G MY15": "4G MY15",
            "4G MY17": "4G MY17",
            "4G MY18": "4G MY18",
            "4K MY20": "4K MY20",
            "4K MY21": "4K MY21",
            "4K MY22": "4K MY22",
            "4K MY22A": "4K MY22A",
            "4K MY23": "4K MY23"
        },
        "DBX": {
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "SILVERADO": {
            "MY20": "MY20",
            "MY21": "MY21",
            "T1 MY21.5": "T1 MY21.5"
        },
        "DBS": {
            "MY19": "MY19",
            "MY20": "MY20",
            "MY21": "MY21"
        },
        "e-tron": {
            "GE MY20": "GE MY20",
            "GE MY21": "GE MY21",
            "GE MY22": "GE MY22",
            "GE MY22A": "GE MY22A"
        },
        "GLB": {
            "X247 MY20.5": "X247 MY20.5",
            "X247 MY21": "X247 MY21",
            "X247 MY21.5": "X247 MY21.5",
            "X247 MY22": "X247 MY22",
            "X247 MY22.5": "X247 MY22.5",
            "X247 MY23": "X247 MY23",
            "X247 MY23.5": "X247 MY23.5"
        },
        "T-ROC": {
            "A1 MY20": "A1 MY20",
            "A1 MY21": "A1 MY21",
            "A1 MY22": "A1 MY22",
            "D1 MY22": "D1 MY22",
            "D1 MY23": "D1 MY23",
            "D1 MY23 UPDATE": "D1 MY23 UPDATE"
        },
        "LC500h": {
            "GWZ100R": "GWZ100R"
        },
        "RS Q8": {
            "4M MY20": "4M MY20",
            "4M MY21": "4M MY21",
            "4M MY22": "4M MY22",
            "4M MY22A": "4M MY22A",
            "4M MY23": "4M MY23"
        },
        "TAYCAN": {
            "Y1A MY21": "Y1A MY21",
            "Y1B MY21": "Y1B MY21",
            "Y1A MY22": "Y1A MY22",
            "Y1B MY22": "Y1B MY22",
            "Y1A MY23": "Y1A MY23",
            "Y1B MY23": "Y1B MY23"
        },
        "CALIFORNIA": {
            "7HM MY21": "7HM MY21",
            "T6.1 MY22": "T6.1 MY22",
            "T6.2 MY23": "T6.2 MY23"
        },
        "PUMA": {
            "MY20.75": "MY20.75",
            "MY21.25": "MY21.25",
            "MY21.75": "MY21.75",
            "JK MY22.25": "JK MY22.25",
            "JK MY22.5": "JK MY22.5",
            "JK MY23.25": "JK MY23.25"
        },
        "ZST": {
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "KAMIQ": {
            "MY20.5": "MY20.5",
            "MY21": "MY21",
            "MY22": "MY22",
            "MY22 UPDATE": "MY22 UPDATE",
            "NW MY23": "NW MY23",
            "NW MY22": "NW MY22",
            "NW MY23.5": "NW MY23.5"
        },
        "LANDCRUISER 70 SERIES": {
            "VDJ79R": "VDJ79R",
            "VDJ76R": "VDJ76R",
            "VDJ78R": "VDJ78R",
            "VDJL76R": "VDJL76R",
            "VDJL78R": "VDJL78R",
            "VDJL79R": "VDJL79R"
        },
        "LANDCRUISER PRADO": {
            "GDJ150R": "GDJ150R",
            "GDJ152R": "GDJ152R",
            "GDJ151R": "GDJ151R",
            "GDJ154R": "GDJ154R",
            "GDJ153R": "GDJ153R"
        },
        "SCALA": {
            "MY20": "MY20",
            "MY21": "MY21",
            "MY22": "MY22",
            "MY22 UPDATE": "MY22 UPDATE",
            "NW MY23": "NW MY23",
            "NW MY23.5": "NW MY23.5"
        },
        "GR YARIS": {
            "GXPA16R": "GXPA16R"
        },
        "GV80": {
            "JX.V1 MY20": "JX.V1 MY20",
            "JX.V1 MY21": "JX.V1 MY21",
            "JX.V2 MY22": "JX.V2 MY22",
            "JX.V3 MY23": "JX.V3 MY23"
        },
        "PALISADE": {
            "LX2.V1 MY21": "LX2.V1 MY21",
            "LX2.V2 MY22": "LX2.V2 MY22",
            "LX2.V3 MY23": "LX2.V3 MY23"
        },
        "ZS EV": {
            "MY21": "MY21",
            "MY22": "MY22"
        },
        "YARIS CROSS": {
            "MXPJ15R": "MXPJ15R",
            "MXPJ10R": "MXPJ10R",
            "MXPB10R": "MXPB10R"
        },
        "G80": {
            "RG3.V1 MY20": "RG3.V1 MY20",
            "RG3.V1 MY21": "RG3.V1 MY21",
            "RG3.V2 MY22": "RG3.V2 MY22"
        },
        "STONIC": {
            "YB MY21": "YB MY21",
            "YB MY22": "YB MY22"
        },
        "RANGE ROVER FIFTY": {
            "L405 MY21.5": "L405 MY21.5",
            "L405 MY22": "L405 MY22"
        },
        "RANGE ROVER WESTMINSTER": {
            "L405 MY21.5": "L405 MY21.5",
            "L405 MY22": "L405 MY22"
        },
        "SQ2": {
            "3Y MY21": "3Y MY21",
            "3Y MY22": "3Y MY22",
            "GY MY22A": "GY MY22A",
            "GA MY23": "GA MY23"
        },
        "HAVAL H6": {
            "B01": "B01"
        },
        "HAVAL JOLION": {
            "MST": "MST"
        },
        "MX-30": {
            "M30A": "M30A"
        },
        "EQA": {
            "MY21.5": "MY21.5",
            "H243 MY22": "H243 MY22",
            "H243 MY23": "H243 MY23",
            "H243 MY22.5": "H243 MY22.5",
            "H243 MY23.5": "H243 MY23.5"
        },
        "NEXO": {
            "FE": "FE",
            "FE.V2 MY22": "FE.V2 MY22"
        },
        "S450L": {
            "V223 MY21": "V223 MY21",
            "V223 MY22": "V223 MY22",
            "V223 MY22.5": "V223 MY22.5",
            "V223 MY23.5": "V223 MY23.5"
        },
        "XB7": {
            "G07": "G07"
        },
        "NIRO": {
            "DE MY21": "DE MY21",
            "DE MY22": "DE MY22",
            "SG2 MY23": "SG2 MY23",
            "DE PBV MY23": "DE PBV MY23"
        },
        "B8": {
            "G16": "G16"
        },
        "GV70": {
            "JK.V1 MY21": "JK.V1 MY21",
            "JK.V1 MY22": "JK.V1 MY22",
            "JK.V2 MY23": "JK.V2 MY23",
            "JK.V1 MY23": "JK.V1 MY23"
        },
        "CULLINAN": {
            "RR31": "RR31",
            "RR31 MY20": "RR31 MY20",
            "RR31 MY21": "RR31 MY21",
            "RR31 MY22": "RR31 MY22"
        },
        "S580L": {
            "V223 MY22": "V223 MY22",
            "V223 MY22.5": "V223 MY22.5",
            "V223 MY23.5": "V223 MY23.5"
        },
        "iX": {
            "I20": "I20"
        },
        "CADDY 5": {
            "SKN MY21": "SKN MY21",
            "SK MY21": "SK MY21",
            "SKN MY22": "SKN MY22",
            "SK MY22": "SK MY22",
            "SKN MY22.5": "SKN MY22.5",
            "SK MY22.5": "SK MY22.5",
            "SB MY23": "SB MY23"
        },
        "CORVETTE": {
            "C8 MY22": "C8 MY22",
            "C8 MY23": "C8 MY23"
        },
        "STARIA": {
            "US4.V1 MY22": "US4.V1 MY22",
            "US4.V2 MY23": "US4.V2 MY23"
        },
        "IONIQ 5": {
            "NE.V1 MY22": "NE.V1 MY22",
            "NE.V2 MY22": "NE.V2 MY22",
            "NE.V3 MY23": "NE.V3 MY23"
        },
        "G10+": {
            "SV7C MY21": "SV7C MY21"
        },
        "ARKANA": {
            "XJL MY21": "XJL MY21",
            "XJL MY22": "XJL MY22"
        },
        "ES250": {
            "AXZA10R": "AXZA10R"
        },
        "S650": {
            "X222 MY18": "X222 MY18",
            "X222 MY19": "X222 MY19",
            "X222 MY20.5": "X222 MY20.5",
            "X222 MY19.5": "X222 MY19.5"
        },
        "S680": {
            "Z223 MY22": "Z223 MY22",
            "Z223 MY23.5": "Z223 MY23.5"
        },
        "iX3": {
            "G08": "G08"
        },
        "i4": {
            "G26": "G26"
        },
        "UX300E": {
            "KMA10R": "KMA10R"
        },
        "NX250": {
            "AAZA20R": "AAZA20R"
        },
        "NX350": {
            "TAZA25R": "TAZA25R"
        },
        "NX350h": {
            "AAZH25R": "AAZH25R",
            "AAZH20R": "AAZH20R"
        },
        "NX450h+": {
            "AAZH26R": "AAZH26R"
        },
        "EV6": {
            "CV MY22": "CV MY22",
            "CV MY23": "CV MY23"
        },
        "HS +EV": {
            "SAS23 MY21": "SAS23 MY21",
            "SAS23 MY22": "SAS23 MY22"
        },
        "e-TRON": {
            "GE MY20": "GE MY20",
            "GE MY21": "GE MY21",
            "GE MY22": "GE MY22",
            "GE MY22A": "GE MY22A",
            "MY23": "MY23",
            "GE MY23": "GE MY23"
        },
        "LX500d": {
            "FJA310R": "FJA310R"
        },
        "LX600": {
            "VJA310R": "VJA310R"
        },
        "MC20": {
            "M240 MY22": "M240 MY22"
        },
        "MARCO POLO HORIZON": {
            "447 MY22": "447 MY22"
        },
        "ATECA": {
            "5FP MY22": "5FP MY22",
            "KH MY22": "KH MY22",
            "KH MY23": "KH MY23"
        },
        "FORMENTOR": {
            "KM MY22": "KM MY22",
            "KM MY23": "KM MY23",
            "KM MY23 UPDATE": "KM MY23 UPDATE"
        },
        "LEON": {
            "KL MY22": "KL MY22",
            "KL MY23": "KL MY23",
            "KU MY23": "KU MY23",
            "KU MY23 UPDATE": "KU MY23 UPDATE"
        },
        "MODEL Y": {
            "MY22": "MY22",
            "MY23": "MY23"
        },
        "GV60": {
            "JW.V1 MY22": "JW.V1 MY22"
        },
        "HAVAL H6GT": {
            "B01": "B01"
        },
        "GRENADIER": {
            "MY23": "MY23",
            "MY23.5": "MY23.5"
        },
        "C40": {
            "539 MY23": "539 MY23",
            "539 MY23B": "539 MY23B"
        },
        "EQS": {
            "V297 MY23": "V297 MY23",
            "V297 MY23.5": "V297 MY23.5"
        },
        "GRAND CHEROKEE L": {
            "WL MY21": "WL MY21",
            "WL MY22": "WL MY22"
        },
        "EQB": {
            "X243 MY23": "X243 MY23",
            "X243 MY23.5": "X243 MY23.5"
        },
        "COROLLA CROSS": {
            "MXGH15R": "MXGH15R",
            "MXGH10R": "MXGH10R",
            "MXGA10R": "MXGA10R"
        },
        "Z": {
            "Z34 MY23": "Z34 MY23"
        },
        "GR86": {
            "ZN8": "ZN8"
        },
        "eVITO": {
            "447 MY22": "447 MY22"
        },
        "C5X": {
            "E43 MY22": "E43 MY22"
        },
        "MIRAI": {
            "JPD20R": "JPD20R"
        },
        "i7": {
            "G70": "G70"
        },
        "ATTO 3": {
            "ANCAP UPGRADE": "ANCAP UPGRADE"
        },
        "RX350h": {
            "AALH10R": "AALH10R",
            "AALH15R": "AALH15R"
        },
        "RX500h": {
            "TALH17R": "TALH17R"
        },
        "EQV": {
            "447 MY22": "447 MY22"
        },
        "CX-60": {
            "C60A": "C60A"
        },
        "CROSSTREK": {
            "MY24": "MY24"
        },
        "iX1": {
            "U11": "U11"
        },
        "OMODA5": {
            "T34": "T34"
        },
        "eT60": {
            "MY23": "MY23"
        },
        "BORN": {
            "K1 MY23": "K1 MY23"
        },
        "IONIQ 6": {
            "CE.V1 MY23": "CE.V1 MY23"
        },
        "MIFA 9": {
            "MY23": "MY23"
        },
        "MIFA": {
            "MY23": "MY23"
        },
        "EMIRA": {
            "MY23": "MY23"
        }
    };

    var selMake = '';
    var selModel = '';
    var selseries = '';

    var $user = null;

    var makeObj = $('select[name="field1"]');
    var modelObj = $('select[name="field2"]');
    var yearObj = $('select[name="field3"]');
    var seriObj = $('select[name="field9"]');
    var nvicObj = $('#EnquiryNvic');


    var variantObj = $('select[name="variant"]');
    var styleObj = $('select[name="style"]');
    var transObj = $('select[name="transmission"]');
    var engineObj = $('select[name="engine"]');
    var engineSizeObj = $('select[name="engine_size"]');
    var clyindersObj = $('select[name="clyinders"]');
    var varintData = null;
    var styleData = null;
    var transData = null;
    var engineData = null;
    var engineSizeData = null;
    var clyindersData = null;
    var colorData = null;

    var jsonData = null;

    var request_busy = false;

    $(window).on("load", function() {
        $(".trade_in_price").parents('.remodal-wrapper').addClass('FixPopUpTop')
        getNvicsDatabk();
    });

    $(function() {

        $('#TradInForm').validate({
            rules: {
                'fname': {
                    required: true
                },
                'lname': {
                    required: true
                },
                'email': {
                    required: true,
                    email: true
                },
                'tel': {
                    required: true,
                },
                'postcode': {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                    number: true
                },
                'field4': {
                    required: true,
                    max: parseInt('210000'),
                    number: true
                },
                'field9': {
                    required: true
                },
                'variant': {
                    required: true
                },
                'style': {
                    required: true
                },
                'transmission': {
                    required: true
                },
                'engine': {
                    required: true
                },
                'engine_size': {
                    required: true
                },
                'clyinders': {
                    required: true
                },
                'nvic': {
                    required: true
                }

            },
            messages: {
                'postcode': {
                    max: 'Please enter valid postcode',
                    number: 'Please enter valid postcode'
                },
                'field4': {
                    max: 'Too many kms to value',
                    number: 'Please enter valid Kilometres'
                },
            },
            errorClass: "error-message",
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent());
            },
            submitHandler: function(form) {

                tradeInPopupSubmitForm(form);
            }
        });

        $("#TradeInImageLink").click(function() {
            $("#image").click();
            return false;
        });

        function readURL(input) {
            $('#trade-image-preview').hide();
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#trade-image-preview').attr('src', e.target.result);
                    $('#trade-image-preview').show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            var filename = $("#image").val().split('\\').pop();

            if (filename == '') {
                filename = "Upload Picture";
            }
            $("#TradeInImageLink").html(filename + " <i class=\"fa fa-plus\"></i>");
            readURL(this);
        });

        $('select[name="field1"]').on('change', function() {
            getChildList($(this).closest('form').find('select[name="field2"]'), $(this).val(),
            'models');

            getNvicsDatabk();
            //            getSeries();
            //            getNvics();
        });
        $('select[name="field2"]').on('change', function() {
            //            getChildList($(this).closest('form').find('select[name="field9"]'), $(this).val(), 'serieses');

            getNvicsDatabk();
            //            getSeries();
            //            getNvics();
        });
        $('select[name="field3"]').on('change', function() {

            getNvicsDatabk();
            //            getSeries();
            //            getNvics();
            //            getChiledLists('Series', variantObj);
            //            getListData('varint', variantObj);
        });
        $('select[name="field9"]').on('change', function() {

            //            variantObj.val('').trigger('change');
            //            styleObj.val('').trigger('change');
            //            transObj.val('').trigger('change');
            //            engineObj.val('').trigger('change');
            //            engineSizeObj.val('').trigger('change');
            //            clyindersObj.val('').trigger('change');
            getNvicsbk();

            //            getNvics();
        });

        $('select[name="variant"]').on('change', function() {

            if ($(this).val() != '') {
                var vvvv = varintData[$(this).val()];

                //console.log(vvvv);
                styleObj.html('<option value="">Style</option>');
                $.each(varintData[$(this).val()], function(key, value) {
                    styleObj.append('<option value="' + key + '">' + key + '</option>');
                });
                styleData = vvvv;
                styleObj.val('');

                transObj.html('<option value="">Transmission</option>');
                engineObj.html('<option value="">Engine</option>');
                engineSizeObj.html('<option value="">Engine Size</option>');
                clyindersObj.html('<option value="">Cylinders</option>');
            } else if ($(this).val() == '') {

                transObj.html('<option value="">Transmission</option>');
                engineObj.html('<option value="">Engine</option>');
                engineSizeObj.html('<option value="">Engine Size</option>');
                clyindersObj.html('<option value="">Cylinders</option>');
            } else {

                styleObj.html('<option value="Not Available">Not Available</option>');
                transObj.html('<option value="Not Available">Not Available</option>');
                engineObj.html('<option value="Not Available">Not Available</option>');
                engineSizeObj.html('<option value="Not Available">Not Available Size</option>');
                clyindersObj.html('<option value="Not Available">Not Available</option>');
            }

            nvicObj.val('');
        });
        $('select[name="style"]').on('change', function() {

            if ($(this).val() != '') {
                var vvvv = styleData[$(this).val()];

                //console.log(vvvv);
                transObj.html('<option value="">Transmission</option>');
                $.each(styleData[$(this).val()], function(key, value) {
                    transObj.append('<option value="' + key + '">' + key + '</option>');
                });
                transData = vvvv;
                transObj.val('');
                engineObj.html('<option value="">Engine</option>');
                engineSizeObj.html('<option value="">Engine Size</option>');
                clyindersObj.html('<option value="">Cylinders</option>');
            } else {

                transObj.html('<option value="Not Available">Not Available</option>');
                engineObj.html('<option value="Not Available">Not Available</option>');
                engineSizeObj.html('<option value="Not Available">Not Available Size</option>');
                clyindersObj.html('<option value="Not Available">Not Available</option>');
            }
            nvicObj.val('');
        });

        $('select[name="transmission"]').on('change', function() {

            if ($(this).val() != '') {
                var vvvv = transData[$(this).val()];

                //console.log(vvvv);
                engineObj.html('<option value="">Engine</option>');
                $.each(transData[$(this).val()], function(key, value) {
                    engineObj.append('<option value="' + key + '">' + key + '</option>');
                });
                engineData = vvvv;
                engineObj.val('');
                engineSizeObj.html('<option value="">Engine Size</option>');
                clyindersObj.html('<option value="">Cylinders</option>');
            } else {
                engineObj.html('<option value="Not Available">Not Available</option>');
                engineSizeObj.html('<option value="Not Available">Not Available Size</option>');
                clyindersObj.html('<option value="Not Available">Not Available</option>');
            }
            nvicObj.val('');
        });

        $('select[name="engine"]').on('change', function() {


            if ($(this).val() != '') {
                var vvvv = engineData[$(this).val()];

                //console.log(vvvv);
                engineSizeObj.html('<option value="">Engine Size</option>');
                $.each(engineData[$(this).val()], function(key, value) {
                    engineSizeObj.append('<option value="' + key + '">' + key + '</option>');
                });
                engineSizeData = vvvv;
                engineSizeObj.val('');

                clyindersObj.html('<option value="">Cylinders</option>');
            } else {
                engineSizeObj.html('<option value="Not Available">Not Available Size</option>');
                clyindersObj.html('<option value="Not Available">Not Available</option>');
            }
            nvicObj.val('');
        });

        $('select[name="engine_size"]').on('change', function() {

            if ($(this).val() != '') {
                var vvvv = engineSizeData[$(this).val()];

                //console.log(vvvv);
                clyindersObj.html('<option value="">Cylinders</option>');
                $.each(engineSizeData[$(this).val()], function(key, value) {
                    clyindersObj.append('<option value="' + key + '">' + key + '</option>');
                });
                clyindersData = vvvv;
                clyindersObj.val('');
            } else {
                clyindersObj.html('<option value="Not Available">Not Available</option>');
            }

            nvicObj.val('');
        });
        $('select[name="clyinders"]').on('change', function() {

            if ($(this).val() != '') {
                var vvvv = clyindersData[$(this).val()];

                //console.log(vvvv);
                $('#nvic').val(clyindersData[$(this).val()]);
            } else {
                nvicObj.val('');
            }
        });


    });

    function getNvics() {
        if (makeObj.val() != '' && modelObj.val() != '' && yearObj.val() != '' && seriObj.val() != '') {

            var nvic_url = "/enquiries/getNVICsData/" + makeObj.val() + "/" + modelObj.val() + "/" + yearObj.val() +
                "/" + seriObj.val();

            $.ajax({
                type: "POST",
                url: nvic_url,
                dataType: 'json',
            }).done(function(data) {

                if (data.status && data.success) {
                    nvicObj.html('<option value="">Variant</option>');
                    $.each(data.nvics, function(key, value) {
                        nvicObj.append('<option value="' + key + '">' + value + '</option>');
                    });
                    nvicObj.val('');
                } else {
                    nvicObj.html('<option value="">Variant</option>');
                    nvicObj.append('<option value="' + seriObj.val() + '">' + seriObj.val() + '</option>');
                }
            });
        }
    }

    function getNvicsbk() {
        if (makeObj.val() != '' && modelObj.val() != '' && yearObj.val() != '' && seriObj.val() != '' && seriObj
        .val() != 'Not Available') {

            var nvic_url = "/enquiries/getNVICsDatabk/" + makeObj.val() + "/" + modelObj.val() + "/" + yearObj.val() +
                "/" + seriObj.val();

            // $('body').LoadingOverlay("show");
            $('body').LoadingOverlay("show");
            nvicObj.val('');
            $.ajax({
                type: "POST",
                url: nvic_url,
                dataType: 'json',
            }).done(function(data) {

                // $('body').LoadingOverlay("hide");
                $('body').LoadingOverlay("hide");
                if (data.status && data.success) {
                    variantObj.html('<option value="">Variant</option>');
                    styleObj.html('<option value="">Style</option>');
                    transObj.html('<option value="">Transmission</option>');
                    engineObj.html('<option value="">Engine</option>');
                    engineSizeObj.html('<option value="">Engine Size</option>');
                    clyindersObj.html('<option value="">Cylinders</option>');

                    nvicObj.val('');
                    $.each(data.nvics, function(key, value) {
                        variantObj.append('<option value="' + key + '">' + key + '</option>');
                    });
                    varintData = data.nvics;
                    if (data.not_availablle)
                        variantObj.html('<option value="Not Available">Not Available</option>');

                    var ser = '';
                    //                    variantObj.val(ser);
                    if (ser != '') {
                        console.log('variant:' + ser);
                        variantObj.val(ser).trigger('change');

                        var ser = '';
                        if (ser != '') {

                            console.log('style:' + ser);
                            styleObj.val(ser).trigger('change');

                            ser = '';
                            if (ser != '') {

                                console.log('transmission:' + ser);
                                transObj.val(ser).trigger('change');

                                ser = '';
                                if (ser != '') {

                                    console.log('engine:' + ser);
                                    engineObj.val(ser).trigger('change');

                                    ser = '';
                                    if (ser != '') {

                                        console.log('engine_size:' + ser);
                                        engineSizeObj.val(ser).trigger('change');

                                        ser = '';
                                        if (ser != '') {

                                            console.log('clyinders:' + ser);
                                            clyindersObj.val(ser).trigger('change');
                                        }
                                    }
                                }
                            }
                        }

                    }
                } else {


                    variantObj.html('<option value="Not Available">Not Available</option>');
                    styleObj.html('<option value="Not Available">Not Available</option>');
                    transObj.html('<option value="Not Available">Not Available</option>');
                    engineObj.html('<option value="Not Available">Not Available</option>');
                    engineSizeObj.html('<option value="Not Available">Not Available Size</option>');
                    clyindersObj.html('<option value="Not Available">Not Available</option>');
                    nvicObj.val('');
                }

            });


        }
    }

    function triggerChanges(type, typeObj) {
        var ser = '';
        if (ser != '') {

            console.log('style:' + ser);
            typeObj.val(ser).trigger('change');
        }
    }

    function getSeries() {
        if (makeObj.val() != '' && modelObj.val() != '' && yearObj.val() != '') {

            var seri_url = "/enquiries/getSeries/" + makeObj.val() + "/" + modelObj.val() + "/" + yearObj.val();

            $.ajax({
                type: "POST",
                url: seri_url,
                dataType: 'json',
            }).done(function(data) {

                if (data.status && data.success) {
                    seriObj.html('<option value="">Series</option>');
                    $.each(data.series, function(key, value) {
                        seriObj.append('<option value="' + value + '">' + value + '</option>');
                    });
                    var ser = '';
                    seriObj.val(ser);
                    if (ser != '') {
                        seriObj.val(ser).trigger('change');
                    }
                } else {
                    seriObj.html('<option value="Not Available">Not Available</option>');
                    nvicObj.val('');
                }
            });


        }
    }

    function getNvicsDatabk() {

        if (makeObj.val() != '' && modelObj.val() != '' && yearObj.val() != '') {

            // $('body').LoadingOverlay("show");
            $('body').LoadingOverlay("show");
            var nvic_url = "/enquiries/getNVICsDatabk/" + makeObj.val() + "/" + modelObj.val() + "/" + yearObj.val();

            nvicObj.val('');
            $.ajax({
                type: "POST",
                url: nvic_url,
                dataType: 'json',
            }).done(function(data) {

                console.log(data);

                // $('body').LoadingOverlay("hide");
                $('body').LoadingOverlay("hide");
                if (data.status && data.success) {
                    varintData = data.nvics;
                    //                $.each(data.all_data.series, function (key, value) {
                    //                    seriObj.append('<option value="' + key + '">' + key + '</option>');
                    //                });

                    seriObj.html('<option value="">Series</option>');
                    variantObj.html('<option value="">Variant</option>');
                    styleObj.html('<option value="">Style</option>');
                    transObj.html('<option value="">Transmission</option>');
                    engineObj.html('<option value="">Engine</option>');
                    engineSizeObj.html('<option value="">Engine Size</option>');
                    clyindersObj.html('<option value="">Cylinders</option>');


                    if (Object.keys(data.all_data.variant).length == 0 && Object.keys(data.all_data.series)
                        .length == 0) {
                        seriObj.html('<option value="Not Available">Not Available</option>');
                        variantObj.html('<option value="Not Available">Not Available</option>');
                        styleObj.html('<option value="Not Available">Not Available</option>');
                        transObj.html('<option value="Not Available">Not Available</option>');
                        engineObj.html('<option value="Not Available">Not Available</option>');
                        engineSizeObj.html('<option value="Not Available">Not Available Size</option>');
                        clyindersObj.html('<option value="Not Available">Not Available</option>');
                    } else {
                        if (Object.keys(data.all_data.series).length > 0) {
                            $.each(data.all_data.series, function(key, value) {
                                seriObj.append('<option value="' + value + '">' + value + '</option>');
                            });
                            var ser = '';
                            seriObj.val(ser);
                            if (ser != '') {
                                seriObj.val(ser).trigger('change');
                            }
                        } else if (Object.keys(data.all_data.variant).length > 0) {
                            seriObj.html('<option value="Not Available">Not Available</option>');
                            $.each(data.all_data.variant, function(key, value) {
                                variantObj.append('<option value="' + key + '">' + key + '</option>');
                            });
                        } else {

                            seriObj.html('<option value="Not Available">Not Available</option>');
                            variantObj.html('<option value="Not Available">Not Available</option>');
                            styleObj.html('<option value="Not Available">Not Available</option>');
                            transObj.html('<option value="Not Available">Not Available</option>');
                            engineObj.html('<option value="Not Available">Not Available</option>');
                            engineSizeObj.html('<option value="Not Available">Not Available Size</option>');
                            clyindersObj.html('<option value="Not Available">Not Available</option>');
                        }
                    }

                } else {
                    seriObj.html('<option value="Not Available">Not Available</option>');
                    variantObj.html('<option value="Not Available">Not Available</option>');
                    styleObj.html('<option value="Not Available">Not Available</option>');
                    transObj.html('<option value="Not Available">Not Available</option>');
                    engineObj.html('<option value="Not Available">Not Available</option>');
                    engineSizeObj.html('<option value="Not Available">Not Available Size</option>');
                    clyindersObj.html('<option value="Not Available">Not Available</option>');
                    //                    seriObj.html('<option value="">Series</option>');
                    //                    variantObj.html('<option value="">Variant</option>');
                    //                    styleObj.html('<option value="">Style</option>');
                    //                    transObj.html('<option value="">Transmission</option>');
                    //                    engineObj.html('<option value="">Engine</option>');
                    //                    engineSizeObj.html('<option value="">Engine Size</option>');
                    //                    clyindersObj.html('<option value="">Cylinders</option>');
                }

            });


        }
    }

    function getChildList(element, data_id, type) {
        if (data_id) {
            var data = window[type][data_id];
            element.html('<option value="">Model</option>');
            if (type == 'serieses') {
                element.html('<option value="">Series</option>');
            }

            if (data) {
                $.each(data, function(key, value) {
                    element.append('<option value="' + key + '">' + value + '</option>');;
                });
            }
        }
    }
 
    </script>
    <script src="<?=base_url();?>assets/ic_stuff/calc_logic/excelFormulas.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        function isMobileDevice() {
            return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -
                1);
        };
        if (isMobileDevice()) {

            var maxLength = 188;
            var read_more_class = '';
            var myStr1 = $(".show-read-more").html();
            $(".show-read-more1").each(function() {
                var custom_attr = $(this).attr("custom-attr");
                if (custom_attr == "keepStyle") {
                    var read_more_class = "custom-tradin"
                }
                var myStr = $(this).text();
                if ($.trim(myStr).length > maxLength) {
                    var newStr = myStr.substring(0, maxLength);
                    var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                    $(this).empty().html(newStr);
                    $(this).append(' <a href="javascript:void(0);" class="read-more ' +
                        read_more_class + '"> Read more >>>> </a>');
                    $(this).append('<span class="more-text">' + removedStr + '</span>');
                }
            });
            $(".read-more").click(function() {
                if ($(".read-more").hasClass('custom-tradin')) {
                    $(".show-read-more").empty().html(myStr1);
                } else {
                    $(this).siblings(".more-text").contents().unwrap();
                    $(this).remove();
                }

            });
        }
    });
    </script>
    <style type="text/css">
    .show-read-more .more-text {
        display: none;
    }

    .read-more {
        color: #005aa2;
    }
    </style>
    <style>
    /*.trade-in-form .required:after {content: " *"; color: red;}*/
    .text.asterisk:after {
        content: " *";
        color: red;
        position: absolute;
        padding-left: 3px;
    }

    .select.asterisk::after {
        content: " *";
        color: red;
        position: absolute;
        padding-left: 3px;
        right: -10px;
        top: 0%;
    }

    .headNF {
        padding: 20px 0px 10px 10px;
        font-family: "focobold";
    }

    .subHead {
        padding-bottom: 5px;
    }

    .headspc {
        padding: 20px 0px 20px 0px;
        font-family: "focobold";
    }

    .durationFix {
        transform: translate(0, -30px);
    }

    .security_code .captcha img {
        left: 255px;
    }

    .EmpInfoFix {
        padding: 14px 0px 2px 0px;
        margin-top: 19px;
    }

    .SectionHeading {
        margin-bottom: 20px;

        padding: 20px 0px 20px 0px;
        font-family: "focobold";
    }

    @media (max-width:767px) {
        .durationFix {
            transform: translate(0, 0) !important;
        }
    }

    /* h3 {
        top: 0px;
        left: 9px;
        width: 391px;
        height: 24px;
        text-align: left;
        font: normal normal normal 20px/32px Foco;
        letter-spacing: 0px;
        color: #707070;
        text-transform: lowercase;
    } */
    </style>


    
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.ui.datepicker.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui-timepicker-addon.js"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui-sliderAccess.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.ui.datepicker.css" />
    
    <script type="text/javascript">
    var year_1_select = 0;
    var month_1_select = 0;
    var total_1_select = 0;
    var year_2_select = 0;
    var month_2_select = 0;
    var total_2_select = 0;
    var employer1_years = 0;
    var employer1_months = 0;
    var total_employer = 0;

    function isEmpty(str) {
        return (!str || 0 === str.length);
    }

    </script>

    <!--/////////////////DISCLAIMER MODEL PANEL\\\\\\\\\\\\\\\\\\\\-->
    <style>
    /*body {font-family: Arial, Helvetica, sans-serif;}*/

    /* The Modal (background) */
    .ic_modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 100;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: hidden;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .ic_modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .ic_modal-header {
        padding: 30px 25px;
        background-color: #005baa;
        color: white;
    }

    .ic_modal-body {
        padding: 10px 2px 5px 5px;

    }

    .ic_modal-footer {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }
    </style>
    <!-- Trigger/Open The Modal -->

    <!-- The Modal -->
   
    <script>


    $(document).ready(function() {
        // Get the ic_modal
        var ic_modal = document.getElementById('myModal-model');

        var span = document.getElementById("id_close");

        span.onclick = function() {
                ic_modal.style.display = "none";
            },
            // When the user clicks anywhere outside of the ic_modal, close it
            window.onclick = function(event) {
                if (event.target == ic_modal) {
                    ic_modal.style.display = "none";
                };
            };

    });

    </script>

    <!-- start list your car sextion 2  -->

    <link rel="stylesheet" href="<?=base_url();?>assets/css/magiczoomplus.css" />
    <script src="<?=base_url();?>assets/js/magiczoomplus.js"></script>
    <script src="<?=base_url();?>assets/ic_stuff/calc_logic/excelFormulas.js"></script>
    <script>
    var root = window.location.pathname;

    function check_trade_in() {
        var inst = $('[data-remodal-id=TradeInPopup]').remodal();
        inst.open();
    }

    function check_credit() {
        var inst = $('[data-remodal-id=FreeCreditCheckPopup]').remodal();
        inst.open();
    }

    $(document).ready(function() {

        $(".changeTextTOBuyOnline").hover(function() {
            $(this).text('Buy now');
        });

        $(".changeTextTOBuyOnline").mouseout(function() {
            $(this).text('GET BUY ONLINE PRICE');
        });


        $('#customPlayVideo').on('click', function(event) {
            event.preventDefault();
            var inst = $('[data-remodal-id=videoPlay]').remodal();
            inst.open();
        });
        $(".blockUI-loader").css("display", 'none');
        $('.stockSearchDetail').hide();
        $('.extras').hide();

        $('.specifications').show();
        $('#extras').on('click', function(event) {
            event.preventDefault();

            $(this).addClass('active-details').removeClass('hidden-details');
            $('#specifications').removeClass('active-details').addClass('hidden-details');
            $('#stockSearchDetail').removeClass('active-details').addClass('hidden-details');
            $('.specifications').hide();
            $('.stockSearchDetail').hide();
            $('.extras').show();
        });
        $('#specifications').on('click', function(event) {
            event.preventDefault();

            $(this).addClass('active-details').removeClass('hidden-details');
            $('#extras').removeClass('active-details').addClass('hidden-details');
            $('#stockSearchDetail').removeClass('active-details').addClass('hidden-details');
            $('.extras').hide();
            $('.stockSearchDetail').hide();
            $('.specifications').show();
        });
        $('#stockSearchDetail').on('click', function(event) {
            event.preventDefault();

            $(this).addClass('active-details').removeClass('hidden-details');
            $('#extras').removeClass('active-details').addClass('hidden-details');
            $('#specifications').removeClass('active-details').addClass('hidden-details');
            $('.extras').hide();
            $('.specifications').hide();
            $('.stockSearchDetail').show();
        });


        var emi_value = document.getElementById('emi_value');
        var id_disclaimer_text = document.getElementById('id_disclaimer_text');
        var dis_car_amt = document.getElementById('dis_car_amt');
        var interestRate = 8.99;
        var loanTerm = 7;
        var loanAmount = dis_car_amt.value;
   
        var slidesPerPage = 3; //globaly define number of elements per page

        var sync22 = $("#synctwo1");
        sync22
            .on('initialized.owl.carousel', function() {
                sync22.find(".cloned").remove();
            }).owlCarousel({
                // loop:true,

                margin: 19,
                items: slidesPerPage,
                dots: false,
                nav: true,
                mouseDrag: true,
                rewind: true,
                navText: ['<img alt="" src="<?=base_url();?>assets/img/front/Owl-chevron-left1(2).png">',
                    '<img alt="" src="<?=base_url();?>assets/img/front/Owl-chevron-left1(1).png">'
                ],

                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel');
   

        /*>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<
         >>>>>>>******* Start Image Slider   *******<<<<<<
         >>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
    });
 

    $(".videoPlayer").click(function(e) {
        $(".MagicZoom").addClass('hasVideo');
        if ($(".MagicZoom").hasClass('hasImage')) {
            $(".MagicZoom").removeClass('hasImage')
        }
    });
    $(".imageSlide").click(function(e) {
        if ($(".MagicZoom").hasClass('hasVideo')) {
            $(".MagicZoom").removeClass('hasVideo')
        }
        if (!$(".MagicZoom").hasClass('hasImage')) {
            $(".MagicZoom").addClass('hasImage')
        }
    });
    $(".hasVideo").click(function(e) {
        e.preventDefault();
        MagicZoom.close('Zoom-1')
    });
    var hash = window.location.hash;

    $(document).on('opening', '.remodalVideo', function() {
        $("#demo").get(0).play();
        var vvideo = jQuery('#demo').get()[0];
        vvideo.addEventListener('loadeddata', function() {
            vvideo.play();
        });
        console.log('************************************');
    });
    $(document).on('opened', '.remodalVideo', function() {
        $("#demo").get(0).play();
        var vvideo = jQuery('#demo').get()[0];
        vvideo.addEventListener('loadeddata', function() {
            vvideo.play();
        });
        console.log('++++++++++++++++++++++++++++++++++++');
    });
    </script>

    <style>
    .minimize {
        cursor: pointer;
    }
    </style>


    <footer>
        <div class="Pagescontainer">
            <div class="whyShoudSellUcar fixingIssuesCont1">
                <div class="HeadOfficeForm">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="smallBanner">
                                <a href="https://www.ozcar.com.au/banners/view/MjQ=" target="_blank">
                                    <img alt="" src="<?=base_url();?>assets/img/clickableBanners//2022/11/637438e48bcbc_banner-2.png"
                                        style="width: 1170px; height: 305px;" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="HeadOfficeForm">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="smallBanner"><a href="tel:136922"><img alt=""
                                        src="<?=base_url();?>assets/webroot/filebrowser/upload/images/OZCAR0998_OzcarConnectBanners_01-09%20%281%29.png"
                                        style="width: 1170px; height: 306px;" /></a></div>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- Conversion Pixel - Oz Car Conversion Pixel - DO NOT MODIFY -->
                    <img src="https://secure.adnxs.com/px?id=1467269&t=2" width="1" height="1" />
                    <!-- End of Conversion Pixel -->
                </div>
                <div class="footerSec hidden-xs">
                    <div class="container">
                        <div class="row">
                          

                            <div class="col-md-3">
                                <ul class="footerUL">
                                    <li><a href="javascript:;">OzCar Protection</a></li>
                                    <li><a href="http://ozcar.com.au/content/australian-wide-roadside-assistance-v2">OzCar
                                            Australia Wide Roadside</a></li>
                                    <li><a href="http://ozcar.com.au/content/vehicle-warranty-plan">OzCar Vehicle
                                            Warranty Plan</a></li>
                                </ul>
                            </div>

                            <div class="col-md-3">
                                <ul class="footerUL">
                                    <li><a href="javascript:;">Legal Information</a></li>
                                    <li><a href="/content/dealership-legal-entities">OzCar Dealership Legal Entities</a>
                                    </li>
                                    <li><a href="/content/ozclub-terms-and-conditions">OzClub Terms & Conditions</a>
                                    </li>
                                    <li><a href="/content/finance-disclaimer">Ozcar Finance Disclaimer</a></li>
                                    <li><a href="/content/credit-score-terms-of-use">OzCar Credit Score Terms of Use</a>
                                    </li>
                                    <li><a href="https://www.ozcar.com.au/content/buy-online-terms-conditions">Buy
                                            online Terms & Conditions</a></li>
                                    <li><a href="https://www.ozcar.com.au/content/ozcar-privacy-policy">Privacy
                                            Policy</a></li>
                                </ul>
                            </div>

                            <div class="col-md-3">
                                <ul class="footerUL">
                                    <li><a href="javascript:;">Contact</a></li>
                                    <li><a href="/content/customer-relation">OzCar Contact Details</a></li>
                                    <li><a href="/careers">Careers</a></li>
                                    <li><a href="https://www.facebook.com/OzCarDaily/">Facebook</a></li>
                                    <li><a href="https://www.instagram.com/ozcar.com.au/">Instagram</a></li>
                                    <li><a href="/content/franchise-2021">OzCar Franchises Available</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="textFooter">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footerAccorSec hidden-sm show-xs">
                    <div class="container">
                        <div class="row">
                            <div class="logo">
                                <img src="<?=base_url();?>assets/img/front/Ozcar-AFSLogo_2.gif" alt="">
                            </div>
                            <section id="content">

                                <div id="accordion" class="accordion-container">
                                    <article class="content-entry">
                                        <h4 class="article-title"><i></i>OzCar Protection</h4>
                                        <div class="accordion-content">
                                            <ul class="footerUL">
                                                <li><a
                                                        href="http://ozcar.com.au/content/australian-wide-roadside-assistance-v2">OzCar
                                                        Australia Wide Roadside</a></li>
                                                <li><a href="http://ozcar.com.au/content/vehicle-warranty-plan">OzCar
                                                        Vehicle Warranty Plan</a></li>
                                            </ul>
                                        </div>
                                    </article>
                                    <article class="content-entry">
                                        <h4 class="article-title"><i></i>Legal Information</h4>
                                        <div class="accordion-content">
                                            <ul class="footerUL">
                                                <li><a href="/content/dealership-legal-entities">OzCar Dealership Legal
                                                        Entities</a></li>
                                                <li><a href="/content/ozclub-terms-and-conditions">OzClub Terms &
                                                        Conditions</a></li>
                                                <li><a href="/content/finance-disclaimer">Ozcar Finance Disclaimer</a>
                                                </li>
                                                <li><a href="/content/credit-score-terms-of-use">OzCar Credit Score
                                                        Terms of Use</a></li>
                                                <li><a
                                                        href="https://www.ozcar.com.au/content/buy-online-terms-conditions">Buy
                                                        online Terms & Conditions</a></li>
                                                <li><a href="https://www.ozcar.com.au/content/ozcar-privacy-policy">Privacy
                                                        Policy</a></li>
                                            </ul>
                                        </div>
                                    </article>
                                    <article class="content-entry">
                                        <h4 class="article-title"><i></i>Contact</h4>
                                        <div class="accordion-content">
                                            <ul class="footerUL">
                                                <li><a href="/content/customer-relation">OzCar Contact Details</a></li>
                                                <li><a href="/careers">Careers</a></li>
                                                <li><a href="https://www.facebook.com/OzCarDaily/">Facebook</a></li>
                                                <li><a href="https://www.instagram.com/ozcar.com.au/">Instagram</a></li>
                                                <li><a href="/content/franchise-2021">OzCar Franchises Available</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                 
                                </div>
                                <!--/#accordion-->
                            </section>
                            <div class="descri">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end footer section -->
            </div>

        </div>
    </footer>


    <!-- end remodal sections  -->
    <!-- BEGIN PHP Live! HTML Code [V3] -->
    <span
        style="color: #0000FF;    width: 200px;    height: 28px; text-decoration: underline; line-height: 0px !important; cursor: pointer; position: fixed; bottom: 0px; right: 20px; z-index: 20000000;"
        id="phplive_btn_1596041911"></span>

    <div class="chatOverlay3"></div>


    <script data-cfasync="false" type="text/javascript">
    (function() {
        var phplive_e_1596041911 = document.createElement("script");
        phplive_e_1596041911.type = "text/javascript";
        phplive_e_1596041911.async = true;
        phplive_e_1596041911.src = "<?=base_url();?>assets/webroot/phplive/js/phplive_v2.js.php?v=0%7C1596041911%7C0%7C&";
        document.getElementById("phplive_btn_1596041911").appendChild(phplive_e_1596041911);
        if ([].filter) {
            document.getElementById("phplive_btn_1596041911").addEventListener("click", function() {
                phplive_launch_chat_0()
            });
        } else {
            document.getElementById("phplive_btn_1596041911").attachEvent("onclick", function() {
                phplive_launch_chat_0()
            });
        }
    })();
    </script>
    <!-- END PHP Live! HTML Code [V3] -->
</body>

</html>