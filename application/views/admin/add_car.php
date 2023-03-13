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
                    <form class="form-horizontal form-bordered" action="<?=base_url();?>Car/save" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Seller</label>
                            <div class="col-lg-8">
                                <select class="form-control" name="user_id">
                                    <option selected disabled>Seller</option>
                                    <?php foreach($this->M_user->get_sellers() as $row){?>
                                    <option <?php if($user_id == $row['user_id']) echo 'selected';?>
                                        value="<?=$row['user_id'];?>">
                                        <?=$row['name'];?> | <?=$row['phone'];?> | <?=$row['email'];?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Car Type</label>
                            <div class="col-lg-4">
                                <select class="form-control" name="cartype_id">
                                    <option selected disabled>Car Type</option>
                                    <?php foreach($this->M_cartype->get_cartypes() as $row){?>
                                    <option <?php if($cartype_id == $row['cartype_id']) echo 'selected';?>
                                        value="<?=$row['cartype_id'];?>"><?=$row['cartype'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Body Type</label>
                            <div class="col-lg-3">
                                <select class="form-control" name="body_id">
                                    <option selected disabled>Body Type</option>
                                    <?php foreach($this->M_body->get_bodies() as $row){?>
                                    <option <?php if($body_id == $row['body_id']) echo 'selected';?>
                                        value="<?=$row['body_id'];?>"><?=$row['body'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Year</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="year">
                                    <option selected disabled>Year</option>
                                    <?php foreach($this->M_year->get_years() as $row){?>
                                    <option <?php if($year == $row['year']) echo 'selected';?>
                                        value="<?=$row['year'];?>"><?=$row['year'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Make</label>
                            <div class="col-lg-4">
                                <select class="form-control" name="make_id">
                                    <option selected disabled>Make</option>
                                    <?php foreach($this->M_make->get_makes() as $row){?>
                                    <option <?php if($make_id == $row['make_id']) echo 'selected';?>
                                        value="<?=$row['make_id'];?>"><?=$row['make'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Model</label>
                            <div class="col-lg-4">
                                <select class="form-control" name="model_id">
                                    <option selected disabled>Model</option>
                                    <?php foreach($this->M_model->get_models() as $row){?>
                                    <option <?php if($model_id == $row['model_id']) echo 'selected';?>
                                        value="<?=$row['model_id'];?>"><?=$row['model'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Car Condition</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="condition_id">
                                    <option selected disabled>Car Condition</option>
                                    <?php foreach($this->M_condition->get_conditions() as $row){?>
                                    <option <?php if($condition_id == $row['condition_id']) echo 'selected';?>
                                        value="<?=$row['condition_id'];?>"><?=$row['condition'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Interior Color</label>
                            <div class="col-lg-3">
                                <select class="form-control" name="interior_id">
                                    <option selected disabled>Interior Color</option>
                                    <?php foreach($this->M_interior->get_interiors() as $row){?>
                                    <option <?php if($interior_id == $row['interior_id']) echo 'selected';?>
                                        value="<?=$row['interior_id'];?>"><?=$row['interior'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Exterior Color</label>
                            <div class="col-lg-3">
                                <select class="form-control" name="exterior_id">
                                    <option selected disabled>Exterior Color</option>
                                    <?php foreach($this->M_exterior->get_exteriors() as $row){?>
                                    <option <?php if($exterior_id == $row['exterior_id']) echo 'selected';?>
                                        value="<?=$row['exterior_id'];?>"><?=$row['exterior'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Steering</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="steering_id">
                                    <option selected disabled>Steering</option>
                                    <?php foreach($this->M_steering->get_steerings() as $row){?>
                                    <option <?php if($steering_id == $row['steering_id']) echo 'selected';?>
                                        value="<?=$row['steering_id'];?>"><?=$row['steering'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Transmission</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="transmission_id">
                                    <option selected disabled>Transmission</option>
                                    <?php foreach($this->M_transmission->get_transmissions() as $row){?>
                                    <option <?php if($transmission_id == $row['transmission_id']) echo 'selected';?>
                                        value="<?=$row['transmission_id'];?>"><?=$row['transmission'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Fuel Type</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="fueltype_id">
                                    <option selected disabled>Fuel Type</option>
                                    <?php foreach($this->M_fueltype->get_fueltypes() as $row){?>
                                    <option <?php if($fueltype_id == $row['fueltype_id']) echo 'selected';?>
                                        value="<?=$row['fueltype_id'];?>"><?=$row['fueltype'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Mileage</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="mileage"
                                    value="<?php if (!empty($mileage)){echo $mileage;}?>">
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Engine</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="engine"
                                    value="<?php if (!empty($engine)){echo $engine;}?>">
                            </div>
                        </div>


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Selling Price</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="selling_price"
                                    value="<?php if (!empty($selling_price)){echo $selling_price;}?>">
                            </div>
                        </div>


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Drive Train</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="drive_train"
                                    value="<?php if (!empty($drive_train)){echo $drive_train;}?>">
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Comment</label>
                            <div class="col-lg-8">
                                <textarea rows="" cols="" class="form-control"
                                    name="comment"><?php if (!empty($comment)){echo $comment;}?></textarea>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Region</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="region_id">
                                    <option selected disabled>Region</option>
                                    <?php foreach($this->M_region->get_regions() as $row){?>
                                    <option <?php if($region_id == $row['region_id']) echo 'selected';?>
                                        value="<?=$row['region_id'];?>"><?=$row['region'];?></option>
                                    <?php } ?>
                                </select>

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
                            <label class="col-lg-3 control-label text-lg-end pt-2">Location</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="location_id">
                                    <option selected disabled>Location</option>
                                    <?php foreach($this->M_location->get_locations() as $row){?>
                                    <option <?php if($location_id == $row['location_id']) echo 'selected';?>
                                        value="<?=$row['location_id'];?>"><?=$row['location'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Exact Location</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="location"
                                    value="<?php if (!empty($location)){echo $location;}?>">
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Add Photos <br> <span
                                    style="color:red;"> Size: 876px By 535px </span></label>
                            <div class="col-lg-3">
                                <input type="file" class="form-control" name="photo[]" id="photo"
                                    onchange="preview_image();" multiple accept="image/*">
                            </div>
                            <br>
                            <?php if (isset($update_id)):
                                foreach($this->M_car->get_photos($update_id) as $photo){?>
                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>
                            <div class="col-lg-8" style="padding-left:26%;">
                                <p>
                                    <img src="<?=base_url();?>uploads/cars/<?=$photo['photo'];?>" alt=""
                                        id="photoPreview" class="img img-rounded" style="border-radius:2%;">
                                </p>
                            </div>
                            <?php }
                            else:                               
                            ?>
                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>
                            <div class="col-lg-8" id="photoPreview" style="padding-left:26%; border-radius:2%">

                            </div>
                            <?php endif;?>
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

<script>
$(document).ready(function() {
    $('#payment_mode').change(function() {
        var paymode = $(this).val()
        $('#paymentMode').val(paymode);
        //$('#myModal').modal('show');
        $("#myModal").modal({
            backdrop: "static ",
            keyboard: false
        });
    });
});

function preview_image() {
    var total_file = document.getElementById("photo").files.length;
    for (var i = 0; i < total_file; i++) {
        $("#photoPreview").append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'><br><br>");
    }
}
</script>