<?php include 'menu.php';?>
<section role="main" class="content-body">
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
                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                        <thead>
                            <tr>
                                <th>CarId</th>
                                <th>Seller</th>
                                <th>Body</th>
                                <th>Make</th>
                                <th>Condition</th>
                                <th>Steering</th>
                                <th>Transmision</th>
                                <th>Year</th>
                                <th>Selling Price</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach($this->M_car->get_cars() as $row){?>
                            <tr>
                                <td>MICAR0<?=$row['car_id'];?><?=$row['user_id'];?></td>
                                <td><b><?=$this->M_user->get_name($row['user_id']);?></b></td>
                                <td><?=$this->M_body->get_body($row['body_id']);?></td>
                                <td><?=$this->M_make->get_make($row['make_id']);?></td>
                                <td><?=$this->M_condition->get_condition($row['condition_id']);?></td>
                                <td><?=$this->M_steering->get_steering($row['steering_id']);?></td>
                                <td><?=$this->M_transmission->get_transmission($row['transmission_id']);?></td>
                                <td><?=$row['year'];?></td>
                                <td><?=$row['selling_price'];?></td>
                                <td><?=$row['comment'];?></td>
                                <td> 
                                    <?php if($row['deleted'] == 1){?>
                                        <?=$row['reason_for_deleted'];?>
                                    <?php } else{?>
                                    <span>available</span>
                                    <?php } ?>
                                    </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?=base_url();?>Car/read/<?=$row['car_id'];?>"
                                            class="btn btn-info btn-sm">Edit</a>

                                            <a href="<?=base_url();?>Car/view/<?=$row['car_id'];?>"
                                            class="btn btn-success btn-sm">View </a>

                                        <a href="<?=base_url();?>Car/delete/<?=$row['car_id'];?>"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

</section>
</div>

</section>
<!-- Vendor -->

<?php include 'footer.php';?>