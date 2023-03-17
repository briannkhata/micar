<!doctype html>
<html class="modern fixed has-top-menu has-left-sidebar-half js flexbox flexboxlegacy no-touch csstransforms csstransforms3d no-overflowscrolling webkit chrome win js no-mobile-device custom-scroll">

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>MiCar</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/morris/morris.css" />

    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/datatables/media/css/dataTables.bootstrap5.css" />


    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/dropzone/basic.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/dropzone/dropzone.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>backend/vendor/summernote/summernote-bs4.css" />
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?=base_url();?>backend/css/theme.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?=base_url();?>backend/css/custom.css">
    <!-- Head Libs -->
    <script src="<?=base_url();?>backend/vendor/modernizr/modernizr.js"></script>
</head>

<body>
    <section class="body">
        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="https://www.okler.net/previews/porto-admin/4.1.0" class="logo"> <img
                        src="<?=base_url();?>backend/img/logo.png" width="75" height="35" alt="Porto Admin" />
                </a>
                <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                    data-fire-event="sidebar-left-opened">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- start: search & user box -->
            <div class="header-right">


                <span class="separator"></span>
                <div id="userbox" class="userbox">
                    <a href="#" data-bs-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="<?=base_url();?>uploads/users/profiles/<?=$this->M_user->get_photo($this->session->userdata('user_id'));?>" alt="<?=$this->session->userdata('name');?>" class="rounded-circle" data-lock-picture="#" />
                        </figure>
                        <div class="profile-info" data-lock-name="<?=$this->session->userdata('name');?>">
                            <span class="name"><?=$this->session->userdata('name');?></span>
                            <span class="role"><?=$this->session->userdata('role');?></span>
                        </div>
                        <i class="fa custom-caret"></i>
                    </a>
                    <div class="dropdown-menu">
                        <ul class="list-unstyled mb-2">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?=base_url();?>User/profile"> My Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?=base_url();?>User/changeprofile">  Change Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?=base_url();?>User/changepassword">  Change Password</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?=base_url();?>User/verifyuser">  Verify My Account</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?=base_url();?>Login/logout">  Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->
        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">
                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navigation
                    </div>
                    <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed"
                        data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li>
                                    <a class="nav-link" href="<?=base_url();?>User">
                                        <i class="bx bx-home-alt" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class="bx bx-user" aria-hidden="true"></i>
                                        <span>Manage Users</span>
                                    </a>
                                    <ul class="nav nav-children">
                                    <li>
                                            <a class="nav-link" href="<?=base_url();?>User/read">
                                                Add User
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #3c3939;">
                                            <a class="nav-link" href="<?=base_url();?>User/admins">
                                                Admins
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #3c3939;">
                                            <a class="nav-link" href="<?=base_url();?>User/sellers">
                                                Sellers
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #3c3939;">
                                            <a class="nav-link" href="<?=base_url();?>Partner">
                                                Partners
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class="bx bx-table" aria-hidden="true"></i>
                                        <span>Manage Cars</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="<?=base_url();?>Year">
                                                Years
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Cartype">
                                                Car Types
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Body">
                                                Body Types
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">

                                            <a class="nav-link" href="<?=base_url();?>Model">
                                                Models
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">

                                            <a class="nav-link" href="<?=base_url();?>Exterior">
                                                Exterior Colors
                                            </a>
                                            <li style="border-top:1px solid #70606069;">
                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Interior">
                                                Interior Colors
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Transmission">
                                                Transmissions
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Condition">
                                                Conditions
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Make">
                                                Makes
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Steering">
                                                Steerings
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Fueltype">
                                                Fuel Types
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Car/read">
                                                Add Car
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">

                                            <a class="nav-link" href="<?=base_url();?>Car">
                                                Cars
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">

                                            <a class="nav-link" href="<?=base_url();?>Feature">
                                                Car Features
                                            </a>
                                        </li>


                                    </ul>
                                </li>

                                 <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class="bx bx-cog" aria-hidden="true"></i>
                                        <span>Settings</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="<?=base_url();?>Testimonial">
                                                Testimonials
                                            </a>
                                        </li>
                                        <li style="border-top:1px solid #70606069;">

                                            <a class="nav-link" href="<?=base_url();?>Faq">
                                                FAQs
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">

                                            <a class="nav-link" href="<?=base_url();?>Message">
                                                Messages
                                            </a>
                                        </li>

                                        
                                        <li style="border-top:1px solid #70606069;">

                                            <a class="nav-link" href="<?=base_url();?>Message/Careers">
                                                Careers
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Idtype">
                                                Id types
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Location">
                                                Locations
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Region">
                                                Regions
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>District">
                                                Districts
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Plan">
                                                Plans
                                            </a>
                                        </li>

                                        <li style="border-top:1px solid #70606069;">
                                            <a class="nav-link" href="<?=base_url();?>Servicetype">
                                                Service Type
                                            </a>
                                        </li>

                                        

                                    </ul>
                                </li>
                            </ul>
                        </nav>


                        <script>
                        // Maintain Scroll Position
                        if (typeof localStorage !== 'undefined') {
                            if (localStorage.getItem('sidebar-left-position') !== null) {
                                var initialPosition = localStorage.getItem('sidebar-left-position'),
                                    sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                                sidebarLeft.scrollTop = initialPosition;
                            }
                        }
                        </script>
                    </div>
            </aside>