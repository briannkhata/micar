<?php include 'menu.php';?>
<!-- end: sidebar -->
<section role="main" class="content-body">
    <header class="page-header">
        <h2><?=$page_title;?></h2>
    </header>
    <br>
    <?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <center><?=$this->session->flashdata('message'); ?></center>
    </div>
    <?php } ?>

    <div class="col-md-12">
        <a href="<?=base_url();?>Car" class="btn btn-default">Back to Car List</a>
        <a href="#" class="btn btn-success" onclick="window.print();return false;">Print Details</a>
        <a class="modal-with-form btn btn-info" href="#addAttribute">Add Other Attributes</a>
        <a href="<?=base_url();?>Car/add_dynamic/<?=$car_id;?>" class="btn btn-success">Add Other Attributes</a>

        <?php if($this->M_car->get_deleted($car_id) == 0){?>
        <a class="modal-with-form btn btn-primary" href="#addPhoto">Add Photos</a>
        <a class="modal-with-form btn btn-success">WhatsApp</a>
        <a class="modal-with-form btn btn-warning" href="#removeCar">Remove Car</a>

        <?php }?>

    </div>
    <?php foreach($this->M_car->get_car_by_id($car_id) as $row){?>
    <div class="row">
        <div class="col-lg-5">
            <h4 class="font-weight-bold text-dark"></h4>
            <div class="toggle toggle-primary" data-plugin-toggle>
                <section class="toggle active">
                    <label>Demographics</label>
                    <div class="toggle-content">
                        <p>
                        <table class="table table-responsive-md mb-0">
                            <tbody>
                                <tr>
                                    <td>Availability</td>
                                    <td>
                                        <?php if($row['deleted'] == 0){?>
                                        <b style="color:green">AVAILABLE</b>
                                        <?php }else{?>
                                        <b style="color:red">NOT AVAILABLE</b><br>
                                        <?=$row['reason_for_delete'];?> |
                                        <?=date('d F Y',strtotime($row['delete_date']));?> |
                                        <?=$this->M_user->get_name($row['deleted_by']);?>
                                        <?php }?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Car Number</td>
                                    <td><?=$row['car_no'];?></td>
                                </tr>

                                <tr>
                                    <td>Car Type</td>
                                    <td><?=$this->M_cartype->get_cartype($row['cartype_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Condition</td>
                                    <td><?=$this->M_condition->get_condition($row['condition_id']);?></td>
                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td><?=$this->M_model->get_model($row['model_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Year</td>
                                    <td><?=$row['year'];?></td>
                                </tr>

                                <tr>
                                    <td>Steering</td>
                                    <td><?=$this->M_steering->get_steering($row['steering_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Body Type</td>
                                    <td><?=$this->M_body->get_body($row['body_id']);?></td>
                                </tr>
                                <tr>
                                    <td>Make</td>
                                    <td><?=$this->M_make->get_make($row['make_id']);?></td>
                                </tr>
                                <tr>
                                    <td>Fuel Type</td>
                                    <td><?=$this->M_fueltype->get_fueltype($row['fueltype_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Exterior Colour</td>
                                    <td><?=$this->M_exterior->get_exterior($row['exterior_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Interior Colour</td>
                                    <td><?=$this->M_interior->get_interior($row['interior_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Transmission</td>
                                    <td><?=$this->M_transmission->get_transmission($row['transmission_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Engine</td>
                                    <td><?=$row['engine'];?></td>
                                </tr>

                                <tr>
                                    <td>Mileage</td>
                                    <td><?=$row['mileage'];?></td>
                                </tr>

                                <tr>
                                    <td>Drive Train</td>
                                    <td><?=$row['drive_train'];?></td>
                                </tr>

                                <tr>
                                    <td>Location</td>
                                    <td><?=$this->M_location->get_location($row['location_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Region</td>
                                    <td><?=$this->M_region->get_region($row['region_id']);?></td>
                                </tr>

                                <tr>
                                    <td>Exact Location</td>
                                    <td><?=$row['location'];?></td>
                                </tr>

                                <tr>
                                    <td>Comment</td>
                                    <td><?=$row['comment'];?></td>
                                </tr>

                                <tr>
                                    <td>Price</td>
                                    <td><?=number_format($row['selling_price'],2);?></td>
                                </tr>

                            </tbody>



                            <b>
                                <tbody>
                                    <tr>
                                        <td>Owner</td>
                                        <td><?=$this->M_user->get_name($row['user_id']);?></td>
                                    </tr>

                                    <tr>
                                        <td>Phone</td>
                                        <td><?=$this->M_user->get_phone($row['user_id']);?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?=$this->M_user->get_email($row['user_id']);?></td>
                                    </tr>
                                </tbody>
                            </b>
                        </table>
                        </p>
                    </div>
                </section>
            </div>
        </div>
        <div class="col-lg-7">
            <h4 class="font-weight-bold text-dark"></h4>
            <div class="toggle toggle-primary" data-plugin-toggle data-plugin-options="{ 'isAccordion': true }">
                <section class="toggle active">
                    <label>Pictures</label>
                    <div class="toggle-content">
                        <p>
                            <?php foreach($this->M_car->get_photos($car_id) as $photo){?>
                            <img src="<?=base_url();?>uploads/cars/<?=$photo['photo'];?>" class="img-responsive">
                            <?php if($row['deleted'] == 0){?>

                            <a class="btn btn-danger" href="#"
                                onclick="deleteImage(<?=$photo['photo_id'];?>)">Remove</a>
                            <?php }?>
                        </p>
                        <?php }?>
                        </p>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <?php } ?>

</section>
</div>

</section>
<!-- Vendor -->
<?php include 'footer.php';?>
<script>
function deleteImage(photo_id) {
    var confirm_delete = confirm("Are you sure you want to delete this IMAGE?");

    // if user confirms deletion, send AJAX request to delete_item.php
    if (confirm_delete) {
        $.ajax({
            url: "<?=base_url();?>Car/deleteImage",
            type: "POST",
            cache: false,
            data: {
                photo_id: photo_id
            },
            success: function(e) {
                alert("Image deleted are successfull.");
                location.reload();
            },
            error: function() {
                alert("Error deleting item.");
            }
        });
    }
}
</script>


<div class="card-body">
    <div id="addPhoto" class="modal-block modal-block-primary mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Add Photos</h2>
            </header>
            <div class="card-body">
                <form action="<?=base_url();?>Car/addPhotos" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Select Photos</label>
                            <input type="file" class="form-control" name="photo[]" multiple required>
                            <input type="hidden" name="car_id" value="<?=$car_id;?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-12 text-end">
                            <button class="btn btn-success" type="submit">Upload</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </div>
</div>

<div class="card-body">
    <div id="removeCar" class="modal-block modal-block-primary mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Remove Car</h2>
            </header>
            <div class="card-body">
                <form action="<?=base_url();?>Car/removeCar" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Reason for Removal</label>
                            <input type="text" class="form-control" name="reason_for_delete" placeholder="e.g. SOLD"
                                required>
                            <input type="hidden" name="car_id" value="<?=$car_id;?>">

                        </div>

                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-12 text-end">
                            <button class="btn btn-danger" type="submit">Remove</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </div>
</div>



