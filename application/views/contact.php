<?php include 'header.php';?>

<section class="contact-2 page-section-ptb white-bg">
    <div class="container">
        <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-primary" role="alert">
            <?=$this->session->flashdata('message'); ?>
        </div>
        <?php } ?>

        <style>
        .form-control {
            border-radius: 9px;
        }

        button {
            border-radius: 9px;
        }
        </style>
        <div class="row">
            <div class="col-lg-8 col-sm-12 mb-lg-0 mb-1">
                <div class="gray-form row">
                    <div class="col-md-12">
                        <form action="<?=base_url();?>Home/saveMessage" method="post">

                            <div id="formmessage" class="form-notice" style="display:none;">Success/Error Message Goes
                                Here</div>
                            <div class="contact-form">
                                <div class="mb-3">
                                    <input id="name" type="text" class="form-control" placeholder="Name" name="name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input id="email" type="email" placeholder="Email" class="form-control"
                                        name="email">
                                </div>
                                <div class="mb-3">
                                    <input id="phone" type="tel" placeholder="Phone" class="form-control" name="phone"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <textarea id="message" class="form-control" placeholder="Message" rows="7"
                                        name="message" required></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="button red btn-block"> Send Message </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box-3 grey-border">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="content">
                        <h5>Address </h5>
                        <p><?=$this->db->get('tblsettings')->row()->address;?></p>
                    </div>
                </div>
                <div class="feature-box-3 grey-border">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="content">
                        <h5>Phone </h5>
                        <p><?=$this->db->get('tblsettings')->row()->phone;?></p>
                    </div>
                </div>
                <div class="feature-box-3 grey-border mb-0">
                    <div class="icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="content">
                        <h5>Email </h5>
                        <p> <?=$this->db->get('tblsettings')->row()->email;?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php include 'footer.php';?>