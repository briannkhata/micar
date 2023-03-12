<?php include 'menu.php';?>

<!-- end: sidebar -->
<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2><?=$page_title;?></h2>

    </header>
    <!-- start: page -->

    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                    </div>
                </header>
                <div class="card-body">
                    <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <center><?=$this->session->flashdata('message'); ?></center>
                    </div>
                    <?php } ?>
                    <form class="form-horizontal form-bordered" action="<?=base_url();?>User/save" method="post">

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Name</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="name"
                                    value="<?php if (!empty($name)){echo $name;}?>" required>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Email</label>
                            <div class="col-lg-3">
                                <input type="email" class="form-control" name="email"
                                    value="<?php if (!empty($email)){echo $email;}?>">
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Phone</label>
                            <div class="col-lg-3">
                                <input type="tel" class="form-control" name="phone"
                                    value="<?php if (!empty($phone)){echo $phone;}?>" required>

                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Alt Phone</label>
                            <div class="col-lg-3">
                                <input type="tel" class="form-control" name="alt_phone"
                                    value="<?php if (!empty($alt_phone)){echo $alt_phone;}?>">
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Role</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="role">
                                    <option selected disabled>Role</option>
                                        <option <?php if($role == 'admin') echo 'selected';?> value="admin">Administrator</option>
                                        <option <?php if($role == 'seller') echo 'selected';?> value="seller">Seller</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Address</label>
                            <div class="col-lg-6">
                                <textarea rows="" cols=""
                                    class="form-control" name="address"><?php if (!empty($address)){echo $address;}?></textarea>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">District</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="district_id">
                                    <option selected disabled>District</option>
                                    <?php foreach($this->M_district->get_districts() as $row){?>
                                    <option <?php if($district_id == $row['district_id']) echo 'selected';?>
                                        value="<?=$row['district_id'];?>"><?=$row['district'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Country</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="country"
                                    value="Malawi" readonly>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>
                            <?php if (isset($update_id)){?>
                            <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                            <?php }?>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>
</div>

</section>
<!-- Vendor -->
<?php include 'footer.php';?>