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
                        <form class="row g-3" action="<?=base_url();?>admin/saveSlide" method="post"
                            enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Image
                                    <span style="color:red ;">*** SIZE SHOULD BE 1920 X 763 PX</span>
                                </label>
                                <input type="file" class="form-control" name="image">
                            </div>


                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Description</label>
                                <textarea class="form-control tinymce-editor" name="desc"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Details</label>
                                <textarea class="form-control tinymce-editor" name="details"></textarea>
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