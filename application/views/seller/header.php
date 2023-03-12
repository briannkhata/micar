<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=$page_title;?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="icon" type="image/png" href="<?=base_url();?>assets/images/logo.png">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?=base_url();?>adm/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>adm/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?=base_url();?>adm/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?=base_url();?>adm/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?=base_url();?>adm/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?=base_url();?>adm/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?=base_url();?>adm/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?=base_url();?>adm/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!--img src="<?=base_url();?>adm/img/logo.png" alt=""-->
                <span class="d-none d-lg-block">Savanna</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">




                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span
                            class="d-none d-md-block dropdown-toggle ps-2"><?=$this->session->userdata('name');?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?=base_url();?>admin/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->