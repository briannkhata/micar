<?php include 'menu.php';?>
<!-- end: sidebar -->
<section role="main" class="content-body">
    <header class="page-header">
        <h2><?=$page_title;?></h2>
    </header>
    <br>

    <div class="col-md-12">
        <a href="" class="btn btn-success btn-sm">Print</a>
        <a href="" class="btn btn-info btn-sm">Add Other Attributes</a>
        <a href="" class="btn btn-default btn-sm">Add Photos</a>


    </div>
    <hr>
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