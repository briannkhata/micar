<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="MiCar - The Best Car Dealer Automotive Responsive HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title><?=$this->db->get('tblsettings')->row()->app;?> | <?=$page_title;?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url();?>dist/images/favicon.ico" />

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/bootstrap.min.css" />

    <!-- flaticon -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/flaticon.css" />

    <!-- mega menu -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/mega-menu/mega_menu.css" />

    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/font-awesome.min.css" />

    <!-- owl-carousel -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/slick/slick-theme.css" />
    <!-- revolution -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/revolution/css/settings.css" />

    <!-- main style -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/style.css" />

    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/responsive.css" />

</head>

<body>

    <!--=================================
  loading -->

    <div id="loading">
        <div id="loading-center">
            <img src="<?=base_url();?>dist/images/loader2.gif" alt="">
        </div>
    </div>


    <header id="header" class="defualt">
        <div class="menu">
            <!-- menu start -->
            <nav id="menu" class="mega-menu mega-menu desktopTopFixed">
                <!-- menu list items container -->
                <section class="menu-list-items">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 position-relative">
                                <!-- menu logo -->
                                <ul class="menu-logo">
                                    <li>
                                        <a href="index.html"><img id="logo_img" src="<?=base_url();?>dist/images/logo-light.png" alt="logo"> </a>
                                    </li>
                                </ul>
                                <!-- menu links -->
                                <ul class="menu-links">
                                    <!-- active class -->
                                    <li class="active"><a href="<?=base_url();?>"> Home</a></li>
                                    <li><a href="<?=base_url();?>Home/about"> About </a></li>
                                    <li><a href="<?=base_url();?>Home/cars"> Car Listing</a></li>
                                    <li><a href="<?=base_url();?>Home/contact"> Talk to Us</a></li>
                                    <li><a href="<?=base_url();?>Home/register"> Create Account</a></li>
                                    <li><a href="<?=base_url();?>Home/login"> Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </nav>
            <!-- menu end -->
        </div>
    </header>
    <?php //if($page_title != 'Home'):?>

   
    

    <?php //endif;?>