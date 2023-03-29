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
                    <form class="form-horizontal form-bordered" action="<?=base_url();?>Car/saveMultiple" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Attribue Name</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="attribute[]">
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Attribue Value</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="attribute_value[]">
                            </div>
                        </div>
                        <div class="row" id="dynamicFld">

                        </div>


                        <hr>
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>
                            <div class="col-lg-4">
                                <a class="btn btn-default" id="addDynamicFild">Add Row</a>
                            </div>
                        </div>


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>

                            <div class="col-lg-6">
                                <a href="<?=base_url();?>Car/view/<?=$car_id;?>" class="btn btn-success">Back</a>

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
$(document).ready(function(){
    var newField = '<div class="form-row"><div class="form-group col-md-12"><label for="inputEmail4">Attribute Name</label><input type="text" class="form-control" name="attribute[]" required></div></div><div class="form-row"><div class="form-group col-md-12"><label for="inputEmail4">Attribute Value</label><input type="text" class="form-control" name="attribute_value[]" required></div></div>';

    $('#addDynamicFild').on('click', function() {
        $('div#dynamicFild').append(newField);
    });
});
</script>