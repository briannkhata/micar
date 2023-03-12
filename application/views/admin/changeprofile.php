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
                    <form class="form-horizontal form-bordered" action="<?=base_url();?>User/profilechange"
                        method="post" enctype="multipart/form-data">

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Photo</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="photo" id="photo" required>
                            </div>

                            
                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>
                            <div class="col-lg-8" style="padding-left:26%;">
                            <img src="<?=base_url();?>uploads/users/profiles/<?=$this->M_user->get_photo($this->session->userdata('user_id'));?>" id="photoPreview">

                                <img src="" alt="" id="photoPreview">
                            </div>
                        </div>


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>

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

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#photoPreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#photoPreview').attr('src', '');
    }
}

$("#photo").change(function() {
    readURL(this);
});
</script>