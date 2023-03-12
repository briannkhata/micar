<?php include "header.php";?>

<!-- ======= Sidebar ======= -->
<?php include "menu.php";?>
<!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Settings</h1>

    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-info fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <center><?=$this->session->flashdata('message'); ?> </center>
                </div>
                <?php } ?>
                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="<?=base_url();?>admin/saveTestimonial" method="post">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Occupation</label>
                                <input type="text" class="form-control" name="occupation">
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Testimonial</label>
                                <textarea class="form-control" name="testimonial"></textarea>
                            </div>



                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include "footer.php";?>