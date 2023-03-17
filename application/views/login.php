<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MiCar | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/adminlte.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/admin.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/all.min.css" />
    <style>
    .ozlogo {
        border-radius: 9px 2px 2px 9px !important;
        background: #0E61B4 !important;
        padding: 3px 3px 3px 10px !important;
        margin: -7px !important;
        color: white !important;
        font-weight: bolder !important;
    }

    .clublogo {
        border-radius: 0px 9px 9px 0px !important;
        padding: 3px 10px 3px 3px !important;
        background: red !important;
        color: white !important;
        font-weight: bolder !important;
    }

    .login-box {
        background: white !important;
        padding-top: 52px !important;
        border-radius: 20px !important;
        width: 400px !important;
        height: 572px !important;
    }

    .card {
        box-shadow: unset !important;
    }

    .login-box-msg {
        font-weight: bolder !important;
        color: #0E61B4 !important;
        MARGIN-BLOCK: -23PX !important;
        FONT-SIZE: 14PX !important;
    }

    .login-page {
        background-image: url("<?=base_url();?>assets/img/carCare/seller_login.png");
        background-size: 100% !important;
    }

    .btn-primary {
        margin: 41px 0 !important;
        padding: 13px !important;
        line-height: unset;
        height: 50px;
    }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/all.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/remodal.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/remodal-default-theme.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/ozGrid.css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/css/front/style.css?v=1616551177" />

    <header class="fixedHeader" style="top: 0">
        <section class="navbar" style="padding: unset;">
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
                                    <img alt=""
                                        src="<?=base_url();?>assets/webroot/filebrowser/upload/images/Ozcar_Logo.jpg" /></a>
                            </div>
                            <div class="container ">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="logoHeadr"><a href="/">
                                                <img alt=""
                                                    src="<?=base_url();?>assets/webroot/filebrowser/upload/images/Ozcar_Logo.jpg" /></a>
                                        </div>
                                    </div>
                                    <div class="col-md-20">
                                        <div class="links main-1-background">
                                            <ul id="menu-desktop-items">
                                                <li><a href="/content/home-page" style="padding-right: 30px;">Home</a>
                                                </li>
                                                <li><a href="/content/new-finance"
                                                        style="padding-right: 30px;">Finance</a></li>
                                                <li><a href="/content/new-trade-in" style="padding-right: 30px;">Price
                                                        My Car</a></li>
                                                <li><a href="/content/better-car" style="padding-right: 30px;">Better
                                                        Car 4 Less</a></li>
                                                <li><a href="/content/new-car-finder" style="padding-right: 30px;">Car
                                                        Finder</a></li>
                                                <li><a href="/content/car-care" style="padding-right: 30px;">Service</a>
                                                </li>
                                                <li><a href="/connect/step-1" style="padding-right: 30px;">Sell / List
                                                        Your Car</a></li>
                                                <li><a href="/ozclub" style="padding-right: 30px;">OzClub</a></li>
                                                <li><a href="/dealerships">Dealerships</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <span>
                <span class="ozlogo">Mi</span> <span class="clublogo">Car</span>
            </span>
            </br>
            <span style="font-weight: bolder; color: #707070">Login</span>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div style="padding: 6px;">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">SIGN IN TO YOUR ACCOUNT</p>
                    &nbsp;
                    <p>
                        <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$this->session->flashdata('message'); ?>
                    </div>
                    <?php } ?>
                    </p>
                    <form method="post" action="<?=base_url();?>Login/signin">

                        <div class="input-group mb-3">
                            <div class="input text required">
                                <input type="text" name="phone" placeholder="Phone" class="form-control"
                                    required="required" id="phone" aria-required="true" aria-label="Phone" />
                            </div> <span class="fas fa-phone"></span>

                        </div>
                        <div class="input-group mb-3">
                            <div class="input password required">
                                <input type="password" name="password" placeholder="Password" class="form-control"
                                    required="required" id="password" aria-required="true" aria-label="Password" />
                            </div> <span class="fas fa-lock"></span>
                        </div>
                        <!--
                        <div>
                            <a href="/oz-club/forgot-password">Forgot /Create New Password</a>
                        </div>
-->
                        <div>
                            <a href="<?=base_url();?>Home/signup">Create Account</a>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-12">
                                <button style="margin: 12px 0" type="submit" name="login"
                                    class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <div class="col-md-4">

                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script><script type="text/javascript">
setTimeout(function() {
    $(".alert").alert('close');
}, 2000);
</script>


</html>