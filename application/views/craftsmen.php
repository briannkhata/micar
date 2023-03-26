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
    <title> MiCar | Craftmen </title>
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
    <script src="<?=base_url();?>assets/js/front/script.js?v=1679403474"></script>
    <script src="<?=base_url();?>assets/js/new_js/ion.rangeSlider.js"></script>
    <script src="<?=base_url();?>assets/js/front/owl.carouse.min.js"></script>

    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/all.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/remodal.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/remodal-default-theme.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/normalize.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/ozGrid.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/toastr.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/style.css?v=1679403474" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/style2.css?v=151679403474" />

    <script src="<?=base_url();?>assets/js/overlay30f4.js"></script>
    <script src="<?=base_url();?>assets/js/front/script3ce3.js?v=1678886309"></script>

    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/style3ce3.css?v=1678886309" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/style2ca7a.css?v=151678886309" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/owl.theme.default.min.css" />

    <script type="text/javascript">
    //var BASE_URL = 'http://www.ozcar.com.au/';
    var BASE_URL = 'https://www.ozcar.com.au/';
    var font_awesome_url = 'http://www.ozcar.com.au/fa/css/font-awesome.min';
    var _csrfToken =
        'JC8hA8GevJEHKn2l+ILCOgE0KNvGrKkmwIPzLhTBRt+ylaetoORNP2e75t5G/8FYjr1MRdNvwbnq8lsHrkMLW7FofJOYTpJvZAwbv6SdkRTztpUdIfl/uYbzkszC0H4HU4yF6yOaoGHvj3sk51+ljA==';

    $.ajaxSetup({
        beforeSend: function(xhr, settings) {
            if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type) && !this.crossDomain) {
                xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
            }
        }
    });
    </script>

    <script>


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


    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-75801079-1', 'auto');
    ga('send', 'pageview');
    </script>


    <link rel="canonical" href="https://www.ozcar.com.au/dealerships" />

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
   
</head>


<body class="">
   
    <!--
Event snippet for RMKTG - OzCar - All site visits on https://www.ozcar.com.au/: Please do not remove.
Place this snippet on pages with events you’re tracking. 
Creation date: 11/22/2022
-->
    <script>
    gtag('event', 'conversion', {
        'allow_custom_scripts': true,
        'send_to': 'DC-12154588/dk-oz0/rmktg0+standard'
    });
    </script>
    <noscript>
        <img src="https://ad.doubleclick.net/ddm/activity/src=12154588;type=dk-oz0;cat=rmktg0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=${GDPR};gdpr_consent=${GDPR_CONSENT_755};ord=1641074625?"
            width="1" height="1" alt="" />
    </noscript>
    <!-- End of event snippet: Please do not remove -->
    <div class="blockUI-loader blockOverlay-loader"></div>
    <div class="blockUI-loader blockMsg-loader blockMsg-loader-new">
        <img class="hidden-xsS" src="<?=base_url();?>assets/webroot/css/new_css/1ea71_Loading_GIF_white.gif?v=10" alt="">
        <img class="hidden-md hidden-lg hidden-sm" src="<?=base_url();?>assets/webroot/css/new_css/1ea71_Loading_GIF_white.gif" alt="">

        <!-- <p style="color: #333;">Please Wait.</p>-->
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
        /*        background-color: rgb(0, 91, 176);*/
        /*        background-image: url('https://www.ozcar.com.au/webroot/css/img/LoadingNew.gif');*/
        cursor: wait;


    }

    .blockUI-loader {
        display: none;
    }
    </style>
    <!--**************************************************************************************************-->




    <script>
    var POPUP_URL = 'http://www.ozcar.com.au/cars/popup/';
    </script>

    
    <div class="Pagescontainer">

        <div class="">

            <section class="navbar">
                <div class="container">
                    <div class="row">
                        <div class="parent-of-overflow">
                            <div class="links-parent">
                                <div class="col-xs-3 hidden-sm show-xs">
                                    <div class="toggle-nav-btn hidden-lg show-xs"><i aria-hidden="true"
                                            class="fa {C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}">
                                            <img alt="" src="<?=base_url();?>assets/img/barsHumb.png" /> </i></div>
                                    <!--

                            <div class="logo">

                                <a href="/"><img alt="" src="/webroot/filebrowser/upload/images/Ozcar_Logo.jpg"></a>

                            </div>

-->
                                </div>

                                <div class="logoMobile hidden-sm show-xs col-xs-6 "><a href="/"><img alt=""
                                            src="<?=base_url();?>assets/webroot/filebrowser/upload/images/Ozcar_Logo.jpg" /></a>
                                </div>

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
                                                        <li><a href="<?=base_url();?>Home/craftsmen"
                                                                style="padding-right: 30px;">Craftsmen</a></li>
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
                                        <!--<i class="fas{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}{C}"><img alt="" src="/img/searchMob.png" /> </i>-->
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
                            <a href="https://www.ozcar.com.au/banners/view/MzA=" target="_blank">
                                <img alt=""
                                    src="<?=base_url();?>assets/img/clickableBanners//2023/01/63d738e729f0a_ozcar1291-pmc-banner-07-gif-002.gif"
                                    style="width: 1170px; height: 305px;" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
           

        </div>

    </div>






    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <style>
    .col-md-6.branchname a span {
        color: #005aab !important;
    }

    .list-group-item {
        /*padding: 10px !important;*/
        border: unset !important;
        width: 100%;

    }

    .dealercount {
        float: right;
        background-color: #f3efef;
        width: 7%;
        padding: 2px;
        line-height: 2;
        text-align: center;
    }

    .d-info-container p {
        padding-top: 10px;
    }

    .d-name {
        font-weight: bold;
        font-size: 16px;
        color: #005aab !important;
    }

    .d-url {
        color: #005aab;
        font-weight: bold;
    }

    ul.nested.active {
        padding-left: 8px;
    }

    .imgcls {
        width: 8% !important;
        height: 8% !important;
        left: 62px;
        padding-left: 3px;
        margin-left: 78%;
        margin-top: -53px;
        margin-bottom: 24px;
        transform: rotate(87deg);
        border: none !important;
    }

    .imgcls2 {
        width: 8% !important;
        height: 8% !important;
        left: 62px;
        margin-left: 5%;
        margin-top: -53px;
        margin-bottom: 24px;
        border-radius: 0px !important;
        border: none !important;
    }

    .kmspan {
        background-color: #f3efef;
        color: #000000cf;
        padding: 5px;
        line-height: 2;
    }

    .linegap {
        padding-top: 10px;
    }

    .dealInner .dateAndEmail .Emailus .toCol {
        display: grid;
        grid-template-columns: 2fr 1fr;
        grid-gap: 38px;
    }

    .date {
        margin-top: 50px !important;
    }

    .Emailus {
        margin-top: 50px;
    }

    .caret {
        cursor: pointer;
        display: block;
        /*padding: 0 110px;*/
        font-size: 15px;
        line-height: 35px;
        color: #707070;
        height: 26px;
        overflow: hidden;
    }

    span.caret.caret-down {
        height: 100%;
        line-height: 50px;
    }

    .caret::before {
        display: inline-block;
        margin-right: 6px;
    }

    ul.nested.active {
        line-height: 33px;
    }

    .caret-down::before {
        -ms-transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .nested {
        display: none;

    }

    ul.nested.active {
        border-radius: 0px 0px 15px 15px !important;
    }

    .active {
        display: block;
    }

    .branchname {
        font-size: 25px !important;
        line-height: 33.6px !important;

        font-family: "focobold" !important;
        padding-bottom: 20px !important;
    }

    #wrapper {
        position: relative;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        width: 153%;
    }

    #over_map {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 99;
        background-color: white !important;
        width: 35%;

        height: 98%;
        /* relevant part */
        overflow-y: auto;
        /* relevant part */
        padding: 1rem;
        background: #f9f9f9;
    }

    @media only screen and (min-width:769px) {
        #visible-phone {
            display: none;
        }
    }

    @media only screen and (max-width:320px) {
        #over_map {
            display: none;
        }

        .Map {
            height: 300px !important;
            width: 65% !important;
        }

    }

    @media (max-width: 1000px) {
        .navbar {
            position: unset !important;
        }
    }

    @media only screen and (min-width:321px) and (max-width:768px) {
        #over_map {
            display: none;
        }

        .imgcls {
            margin-left: 44%;
        }

        .imgcls2 {
            margin-left: 2%;
        }

        .Map {
            height: 300px !important;
            width: 65% !important;
        }

        .caret {
            width: 61%;
        }
    }

    .dealInner .mapBranch .map img {
        object-fit: initial;
    }
    </style>

    <div class="breadcrumb breadcrumbDealership">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li> | </li>
                        <li><a href="/dealerships">Dealerships</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- end inner Dealerships details page  -->



    <script data-cfasync="false" src="<?=base_url();?>assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4pf15jZTe0UGf9Qju5m02nzr165Ki-Tc&callback=initMap">
    </script>
    <script type="text/javascript">
    $(document).ready(function() {

        $('#setAsMyDealer').click(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: '/dealerships/set-as-my-dealer/10',
                data: {
                    'id': 10
                },
                cache: false,
                async: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == 'success') {
                        window.location.replace(data.url);
                    } else {}
                }

            });
        });
    });
    var toggler = document.getElementsByClassName("caret");
    var i;
    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }

    function search(ele) {
        if (event.key === 'Enter') {
            window.location.replace('/dealerships/index/' + $('#code').val());
        }
    }

    function showhide() {
        var statewiselist = document.getElementById("statewiselist");
        if (statewiselist.style.display === "none") {
            statewiselist.style.display = "block";
        } else {
            statewiselist.style.display = "none";
        }
    }

    function showhide2() {
        var statewiselist2 = document.getElementById("statewiselist2");
        if (statewiselist2.style.display === "none") {
            statewiselist2.style.display = "block";
        } else {
            statewiselist2.style.display = "none";
        }
    }
    </script>



    <footer>
        <div class="Pagescontainer">
            <div class="whyShoudSellUcar fixingIssuesCont1">
                
     
                <div class="carSlider carSlider2 mySlider2 ">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                               

                                <div class="owl-carousel owl-carouselOc arrowSlider-ozclub  owl-theme">
                                    <div class="item">
                                        <div class="sliderImgCar">

                                            <a href="javascript:void(0)">
                                                <img src="<?=base_url();?>assets/img/prizes/63d712a457135_ozpig.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="ozclub-description">
                                            <h2>
                                                OZPIG SERIES 2 </h2>
                                            <p class="ozclub-details hidden-xs">Join OzClub for your chance to WIN!</p>
                                            <p class="join-today">
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class="">
                                                    <span class="logo-joinTO">
                                                        <span>Oz</span> <span>Club</span>
                                                    </span>
                                                </a>
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class=""> <span class="text-joinTO">Join Today</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="sliderImgCar">

                                            <a href="javascript:void(0)">
                                                <img src="<?=base_url();?>assets/img/prizes/6348ab94c15bf_speaker.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="ozclub-description">
                                            <h2>
                                                ECOXGEAR WATRERPROOF BLUETOOTH LED SPEAKER </h2>
                                            <p class="ozclub-details hidden-xs">Join OzClub for your chance to WIN!</p>
                                            <p class="join-today">
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class="">
                                                    <span class="logo-joinTO">
                                                        <span>Oz</span> <span>Club</span>
                                                    </span>
                                                </a>
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class=""> <span class="text-joinTO">Join Today</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="sliderImgCar">

                                            <a href="javascript:void(0)">
                                                <img src="<?=base_url();?>assets/img/prizes/63bf84f863d67_travel-buddy-002.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="ozclub-description">
                                            <h2>
                                                TRAVEL BUDDY 12V WARMER </h2>
                                            <p class="ozclub-details hidden-xs">Join OzClub for your chance to WIN!</p>
                                            <p class="join-today">
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class="">
                                                    <span class="logo-joinTO">
                                                        <span>Oz</span> <span>Club</span>
                                                    </span>
                                                </a>
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class=""> <span class="text-joinTO">Join Today</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="sliderImgCar">

                                            <a href="javascript:void(0)">
                                                <img src="<?=base_url();?>assets/img/prizes/6348aaf6805fd_cooler.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="ozclub-description">
                                            <h2>
                                                HERITAGE COOLER COMBO- 6.6L </h2>
                                            <p class="ozclub-details hidden-xs">Join OzClub for your chance to WIN!</p>
                                            <p class="join-today">
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class="">
                                                    <span class="logo-joinTO">
                                                        <span>Oz</span> <span>Club</span>
                                                    </span>
                                                </a>
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class=""> <span class="text-joinTO">Join Today</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="sliderImgCar">
                                            <a href="javascript:void(0)">
                                                <img src="<?=base_url();?>assets/img/prizes/63eecd4d477f1_expander-camping-chair-002.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="ozclub-description">
                                            <h2>
                                                EXPANDER CAMPING CHAIR </h2>
                                            <p class="ozclub-details hidden-xs">Join OzClub for your chance to WIN!</p>
                                            <p class="join-today">
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class="">
                                                    <span class="logo-joinTO">
                                                        <span>Oz</span> <span>Club</span>
                                                    </span>
                                                </a>
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class=""> <span class="text-joinTO">Join Today</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="sliderImgCar">

                                            <a href="javascript:void(0)">
                                                <img src="<?=base_url();?>assets/img/prizes/63eecd579570d_campfire-cooking-grill-combo-002.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="ozclub-description">
                                            <h2>
                                                CAMP FIRE COOKING GRILL COMBO </h2>
                                            <p class="ozclub-details hidden-xs">Join Ozclub for your chance to WIN!</p>
                                            <p class="join-today">
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class="">
                                                    <span class="logo-joinTO">
                                                        <span>Oz</span> <span>Club</span>
                                                    </span>
                                                </a>
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class=""> <span class="text-joinTO">Join Today</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="sliderImgCar">

                                            <a href="javascript:void(0)">
                                                <img src="<?=base_url();?>assets/img/prizes/63d7129176155_camboss-4x4-bag-rope.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="ozclub-description">
                                            <h2>
                                                CAMPBOSS BOSS ROPE </h2>
                                            <p class="ozclub-details hidden-xs">Join OzClub for your chance to WIN!</p>
                                            <p class="join-today">
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class="">
                                                    <span class="logo-joinTO">
                                                        <span>Oz</span> <span>Club</span>
                                                    </span>
                                                </a>
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class=""> <span class="text-joinTO">Join Today</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="sliderImgCar">

                                            <a href="javascript:void(0)">
                                                <img src="<?=base_url();?>assets/img/prizes/63b5ff2887d0b_solar-charger.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="ozclub-description">
                                            <h2>
                                                COMPANION 200W SOLAR CHARGER </h2>
                                            <p class="ozclub-details hidden-xs">Join OzClub for your chance to WIN!</p>
                                            <p class="join-today">
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class="">
                                                    <span class="logo-joinTO">
                                                        <span>Oz</span> <span>Club</span>
                                                    </span>
                                                </a>
                                                <a href="/content/ozclub-registration-v2" id='ScrollOzClubFormRegister'
                                                    class=""> <span class="text-joinTO">Join Today</span></a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end prize slider -->

                <script>
                $(".j_link").click(function(e) {
                    if ($("#ozclub-register").length) {
                        e.preventDefault();
                        $('html, body').animate({
                            scrollTop: $("#ozclub-register").offset().top - 50
                        }, 1000);
                    }
                });
                </script>
              
                <style>
                .sponsorship-banner {
                    background-size: 100% 100%;
                    width: 100%;
                }

                .sponsorship-banner-safe-area {
                    width: 100%;
                    height: 100%;
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    align-content: space-around;
                    align-items: center;
                }

                .sponsorship-banner-safe-area a {
                    background-repeat: no-repeat;
                    background-size: contain;
                    background-position: center;
                }
                </style>
                <style>
                .owl-carousel3 .owl-prev {
                    left: -65px;
                }

                .owl-carousel3 .owl-next {
                    right: -65px;
                }

                .owl-carousel3 .owl-nav .owl-next,
                .owl-carousel3 .owl-nav .owl-prev {
                    top: 130px;
                }

                .owl-carousel3 .owl-nav button {
                    opacity: 2.7;
                    border-radius: 20px !important;
                }

                #item {
                    border: 1px solid #ecf0f1;
                    border-radius: 10px;
                    /*margin: 40px;*/
                    background-color: white;
                }

                .owl-dots {
                    display: block !important;
                }

                .ozclub-details img {
                    width: 20%;
                    /*image width*/
                    float: left;
                    /*image position*/
                }

                .ozclub-details p {
                    width: 80%;
                    float: right;
                    padding: 17px;
                }

                .checked {
                    color: orange;
                }

                .ozclub-desc1 {
                    border: none;
                    padding: 30px;
                    color: #0061B4;
                    min-height: 255px;
                }

                .titleWinnerSlider {
                    font-size: 24px;
                    font-family: "focobold";
                    color: white;
                }

                .centered {
                    position: absolute;
                    top: 30%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }

                .owl-stage-outer2 {
                    margin-top: -5px !important;
                }

                .addReadMore.showlesscontent .SecSec,
                .addReadMore.showlesscontent .readLess {
                    display: none;
                }

                .addReadMore.showmorecontent .readMore {
                    display: none;
                }

                .addReadMore .readMore,
                .addReadMore .readLess {
                    font-weight: bold;
                    margin-left: 2px;
                    color: #0061b4;
                    ;
                    cursor: pointer;
                }

                .addReadMoreWrapTxt.showmorecontent .SecSec,
                .addReadMoreWrapTxt.showmorecontent .readLess {
                    display: block;
                }

                .imgback {
                    background-color: white;
                    height: 35px;
                    border: 1px solid white;
                    border-radius: 10px;
                }

                .imgclss {

                    margin: -10px 10px 0px 0px;
                    float: right;
                    background-color: white;
                }

                .titlewhyozcar {
                    text-align: center;
                    padding-bottom: 20px;
                }

                #reviewslider {
                    border: 1px solid #ecf0f1 !important;
                    border-radius: 15px 15px 15px 15px !important;
                    background: #ecf0f1;

                }

                @media (max-width: 992px) {
                    .imgclss {
                        width: 10% !important;
                        margin: -7px 7px 6px 7px;
                    }

                    #item {
                        border: none;
                        margin: 25px;
                    }

                    .comment {
                        padding-top: 5px;
                    }

                    .owl-dots {
                        display: none !important;
                    }

                    .owl-stage-outer2 {
                        margin-top: 25px !important;
                        margin-bottom: 22px;
                    }

                    .titleWinnerSlider {
                        font-size: 10px;
                    }

                    .centered {
                        top: 14%;
                    }

                    .ozclub-details p {
                        padding: 15px;
                    }

                    .ozclub-desc1 {
                        padding: 20px !important;
                        min-height: 280px;
                    }

                    .owl-carousel3 .owl-nav .owl-next,
                    .owl-carousel3 .owl-nav .owl-prev {
                        position: absolute !important;
                        top: 165px !important;
                    }

                    .owl-carousel3 .owl-nav .owl-next {
                        left: 319px !important;
                    }

                    .owl-carousel3 .owl-nav .owl-prev {
                        left: -14px !important;
                    }

                    .titlewhyozcar {
                        padding-bottom: 0px;
                    }
                }
                </style>
              
                <script>
                function AddReadMore() {
                    var carLmt = 170;
                    var readMoreTxt = "Read More";
                    var readLessTxt = "Read Less";
                   

                    $(".addReadMore").each(function() {
                        if ($(this).find(".firstSec").length)
                            return;

                        var allstr = $(this).text();
                        if (allstr.length > carLmt) {
                            var firstSet = allstr.substring(0, carLmt);
                            var secdHalf = allstr.substring(carLmt, allstr.length);
                            var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf +
                                "</span><span   title='Click to Show More'><p class='readMore'>" + readMoreTxt +
                                "</p></span><span title='Click to Show Less'><p class='readLess'>" +
                                readLessTxt + "</p></span>";
                            $(this).html(strtoadd);
                        }

                    });

                    $(document).on("click", ".readMore,.readLess", function() {
                        $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
                    });
                }
                $(function() {
                    AddReadMore();
                });
                </script>
                <div>
                    <!-- Conversion Pixel - Oz Car Conversion Pixel - DO NOT MODIFY -->
                    <img src="https://secure.adnxs.com/px?id=1467269&t=2" width="1" height="1" />
                    <!-- End of Conversion Pixel -->
                </div>
                <div class="footerSec hidden-xs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="regist">
                                    <img src="<?=base_url();?>assets/img/front/Ozcar-AFSLogo_2.gif" alt="">
                                    <h4>13 69 227</h4>
                                    <p>® Registered Trademark. © OzCar Pty Ltd.</p>
                                </div>
                            </div>


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
                                    <p>
                                        www.ozcar.com.au is owned by OzCar Connect Pty Ltd. Our website www.ozcar.com.au
                                        advertises private vehicles and vehicles owned by OzCar PTY LTD which is a
                                        licensed motor dealer. OzCar LMCT 11839. Private vehicles listed for sale on
                                        this website are not part of and are not guaranteed by OzCar PTY LTD, they are
                                        listed for sale by a private 3rd party. *All Finance Subject to Approved
                                        Purchasers. ^^Terms and conditions apply. All sales and promotions are excluded
                                        from Rockhampton Dealership. </p>
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
                                    <!-- <article class="content-entry">
                                        <h4 class="article-title"><i></i>Contact</h4>
                                        <div class="accordion-content">
                                            <ul class="footerUL">
                                                <li><a href="#">- OzCar Connect Privacy Policy</a></li>
                                                <li><a href="#">- OzCar Connect Privacy Policy</a></li>
                                                <li><a href="#">- OzCar Connect Privacy Policy</a></li>
                                                <li><a href="#">- OzCar Connect Privacy Policy</a></li>
                                            </ul>
                                        </div>
                                    </article> -->
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


    <!-- start remodal sections  -->
    <div class="remodal comfirmDetails successModal" data-remodal-id="FlashMessagePop" id="FlashMessagePop"
        data-remodal-options="hashTracking: false, closeOnOutsideClick">
        <div class="CDhead">
            <h2></h2>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div><!-- end head  -->
        <div class="CDbody">
            <div class="successSection">
                <img src="" alt="" class="showHideSuccess">
                <p>
                </p>
            </div>

        </div><!-- end body  -->
    </div>
    <!-- end remodal sections  -->
    <!-- BEGIN PHP Live! HTML Code [V3] -->
    <span
        style="color: #0000FF;    width: 200px; height: 28px; text-decoration: underline; line-height: 0px !important; cursor: pointer; position: fixed; bottom: 0px; right: 20px; z-index: 20000000;"
        id="phplive_btn_1596041911"></span>

    <div class="chatOverlay3"></div>

    <script>
    function forChatFunction() {
        if ($('#phplive_iframe_chat_embed_wrapper').is(":visible")) {
            //            console.log('yessssssssssssssssssss');
            //                   alert('yes')
            $('.chatOverlay3').css('display', 'block')
        } else {
            //           console.log('noooooooooooooooo')
            $('.chatOverlay3').css('display', 'none')
        }
        setTimeout(forChatFunction, 1000);
    }

    forChatFunction();
    </script>



    <!--/img/front/chattrans.png
        <div class="chatNow" id="phplive_btn_1596041911">
            <div class="headChat">
                    <div class="forLeft">
                        <i class="far fa-comments"></i>
                        <span>Chat New</span>
                    </div>
                </div>
        </div>
        -->
    <script data-cfasync="false" type="text/javascript">
    (function() {
        var phplive_e_1596041911 = document.createElement("script");
        phplive_e_1596041911.type = "text/javascript";
        phplive_e_1596041911.async = true;
        phplive_e_1596041911.src =
            "<?=base_url();?>assets/webroot/phplive/js/phplive_v2.js.php?v=0%7C1596041911%7C0%7C&";
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
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"7ab65cfb7bd94fd6","token":"ab13979526cf4ff29e270763a7948dc9","version":"2023.2.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>