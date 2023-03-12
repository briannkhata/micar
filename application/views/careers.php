<?php include 'header.php';?>
<section class="career page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Recruiting Agent </h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid center-block" src="images/01.jpg" alt="">
                <div class="career-info">

                    <p>Possimus dolorem perferendis deserunt lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis ab, iusto iste nesciunt doloremque voluptatibus? Mollitia, libero, culpa, ex odio
                        nostrum at ducimus numquam harum laboriosam explicabo ipsum atque dignissimos. Lorem ipsum dolor
                        sit amet, consectetur adipisicing elit. Rem enim dolor qui voluptates, sapiente exercitationem
                        sequi commodi cum minus laborum at, doloribus dolores voluptatum necessitatibus. </p>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Responsibilities</h6>
                            <ul class="list-style-1">
                                <li><i class="fa fa-angle-right"></i> It's very important to us that we find the </li>
                                <li><i class="fa fa-angle-right"></i> Reiciendis ab, iusto iste nesciunt doloremque</li>
                                <li><i class="fa fa-angle-right"></i> Sapiente exercitationem sequi commodi cum minus
                                </li>
                                <li><i class="fa fa-angle-right"></i> Necessitatibus ea possimus perferendis deserunt
                                </li>
                            </ul>
                        </div>

                        <p>

                        <div class="col-md-12">
                            <h6>Qualifications</h6>
                            <ul class="list-style-1">
                                <li><i class="fa fa-angle-right"></i> It's very important to us that we find the </li>
                                <li><i class="fa fa-angle-right"></i> Reiciendis ab, iusto iste nesciunt doloremque</li>
                                <li><i class="fa fa-angle-right"></i> Sapiente exercitationem sequi commodi cum minus
                                </li>
                                <li><i class="fa fa-angle-right"></i> Necessitatibus ea possimus perferendis deserunt
                                </li>
                            </ul>
                        </div>
                        </p>

                    </div>
                    <div class="row">

                        <?php if ($this->session->flashdata('message')) { ?>
                        <div class="alert alert-success" role="alert">
                            <center><?=$this->session->flashdata('message'); ?> </center>
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

                        <div class="col-md-12">
                            <form action="<?=base_url();?>Home/ApplyJob" method="post" class="gray-form">

                                <h5>Please Fill Out This Form to Apply</h5>
                                <p></p>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Location" name="location"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="mb-3">
                                    <input type="tel" class="form-control" placeholder="Phone" name="phone" required>
                                    <input type="hidden" value="Recruiting Agent" name="post">
                                </div>

                                <div class="mb-3">
                                    <textarea class="form-control" rows="10" placeholder="Qualifications"
                                        name="qualification" required></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="button red btn-block" href="#">Apply Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php';?>