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
                    <form class="form-horizontal form-bordered" action="<?=base_url();?>Feature/save" method="post"  enctype="multipart/form-data">


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Car</label>
                            <div class="col-lg-3">
                                <select class="form-control" name="car_id">
                                    <option selected disabled>Select Car</option>
                                    <?php foreach($this->M_car->get_cars() as $row){?>
                                    <option <?php if($car_id == $row['car_id']) echo 'selected';?>
                                        value="<?=$row['car_id'];?>">MICAR<?=$row['car_id'];?><?=$row['user_id'];?> | <?=$this->M_user->get_name($row['user_id']);?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

           
                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Feature Image</label>
                            <div class="col-lg-3">
                                <input type="file" class="form-control" name="fimage" id="fimage" required accept="image/*">
                            </div>
                            <br>

                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>
                            <div class="col-lg-8" style="padding-left:26%;">
                                <img src="<?=base_url();?>uploads/cars/features/<?php echo  isset($update_id) ? $this->M_feature->get_photo($update_id) :'';?>" alt="" id="fimagePreview">
                            </div>
                        </div>


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Payment Mode</label>
                            <div class="col-lg-8">
                                <select class="form-control" name="payment_mode" id="payment_mode" required>
                                    <option selected disabled>Payment</option>
                                    <option value="Mpamba">Mpamba</option>
                                    <option value="AirTelMoney">Airtel Money</option>
                                    <option value="NB">National Bank</option>
                                    <option value="STD">Standard Bank</option>
                                </select>

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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Payment Mode</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" name="paymentMode" id="paymentMode">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Continue</button>
            </div>
        </div>
    </div>
</div>



<!-- Vendor -->
<?php include 'footer.php';?>

<script>
$(document).ready(function() {
    $('#payment_mode').change(function() {
        var paymode = $(this).val()
        $('#paymentMode').val(paymode);
        $('#myModal').modal('show');
       // $("#myModal").modal({ backdrop: "static ", keyboard: false });


    });
});
</script>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#fimagePreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#fimagePreview').attr('src', '');
    }
}

$("#fimage").change(function() {
    readURL(this);
});
</script>