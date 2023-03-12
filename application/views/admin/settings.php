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

                        <?php foreach($this->db->get("settings")->result_array() as $row){?>
                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="<?=base_url();?>admin/saveSettings" method="post">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Company</label>
                                <input type="text" class="form-control" name="company" value="<?=$row["company"];?>">
                                <input type="hidden" class="form-control" name="id" value="<?=$row["id"];?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail5" class="form-label">Email 1 (For Alerts)</label>
                                <input type="email" class="form-control" name="email1" value="<?=$row["email1"];?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail5" class="form-label">Email 2</label>
                                <input type="email" class="form-control" name="email2" value="<?=$row["email2"];?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail5" class="form-label">Email 3</label>
                                <input type="email" class="form-control" name="email3" value="<?=$row["email3"];?>">
                            </div>

                            <div class="col-md-4">
                                <label for="inputEmail5" class="form-label">Phone 1</label>
                                <input type="tel" class="form-control" name="phone1" value="<?=$row["phone1"];?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail5" class="form-label">Phone 2</label>
                                <input type="tel" class="form-control" name="phone2" value="<?=$row["phone2"];?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail5" class="form-label">Phone 3</label>
                                <input type="tel" class="form-control" name="phone3" value="<?=$row["phone3"];?>">
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail5" class="form-label">Twitter link to your page</label>
                                <input type="text" class="form-control" name="twitter" value="<?=$row["twitter"];?>">
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail5" class="form-label">Instagram Link to you page</label>
                                <input type="text" class="form-control" name="instagram"
                                    value="<?=$row["instagram"];?>">
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail5" class="form-label">Facebook Link to your page</label>
                                <input type="text" class="form-control" name="facebook" value="<?=$row["facebook"];?>">
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail5" class="form-label">Whatsapp Number | should start with 265 or
                                    any country code excluding plus (+)</label>
                                <input type="text" class="form-control" name="whatsapp" value="<?=$row["whatsapp"];?>">
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Address</label>
                                <textarea class="form-control" name="address"><?=$row['address'];?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Motto</label>
                                <textarea class="form-control tinymce-editor"
                                    name="motto"><?=$row['motto'];?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Vision</label>
                                <textarea class="form-control tinymce-editor"
                                    name="vision"><?=$row['vision'];?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Mission</label>
                                <textarea class="form-control tinymce-editor"
                                    name="mission"><?=$row['mission'];?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">History</label>
                                <textarea class="form-control tinymce-editor"
                                    name="history"><?=$row['history'];?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">About Us</label>
                                <textarea class="form-control tinymce-editor"
                                    name="about"><?=$row['about'];?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Terms & Conditions</label>
                                <textarea class="form-control tinymce-editor" name="tcs"><?=$row['tcs'];?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Privacy Policy</label>
                                <textarea class="form-control tinymce-editor"
                                    name="privacy"><?=$row['privacy'];?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Cookie Policy</label>
                                <textarea class="form-control tinymce-editor"
                                    name="cookie_policy"><?=$row['cookie_policy'];?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Terms of Use</label>
                                <textarea class="form-control tinymce-editor"
                                    name="terms"><?=$row['terms'];?></textarea>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form><!-- End Multi Columns Form -->
                        <?php }?>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include "footer.php";?>