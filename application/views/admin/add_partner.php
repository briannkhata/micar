<?php include 'menu.php';?>

<!-- end: sidebar -->
<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2><?=$page_title;?></h2>
    </header>
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
                    <form class="form-horizontal form-bordered" action="<?=base_url();?>Partner/save" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Name</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="name" required
                                    value="<?php if (!empty($name)){echo $name;}?>">
                            </div>
                        </div>


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Logo    <br> <span style="color:red;"> Size of 147px By 43px </span></label>
                            <div class="col-lg-3">
                                <input type="file" class="form-control" name="logo" id="logo" accept="image/*">
                            </div>
                            <br>

                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>
                            <div class="col-lg-8" style="padding-left:26%;">
                                <img src="<?=base_url();?>uploads/users/partners/<?php echo  isset($update_id) ? $this->M_partner->get_logo($update_id) :'';?>" alt="" id="logoPreview">
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

<?php include 'footer.php';?>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#logoPreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#logoPreview').attr('src', '');
    }
}

$("#logo").change(function() {
    readURL(this);
});
</script>