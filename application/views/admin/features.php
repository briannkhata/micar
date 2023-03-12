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
                    <br>
                    <a href="<?=base_url();?>Feature/read" class="btn btn-info btn-sm">Add New</a>
                    <hr>
                    <table class="table table-bordered table-striped mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>CarId</th>
                                <th>Seller</th>
                                <th>Date Featured</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($this->M_feature->get_features() as $row){
                            $user_id = $this->M_car->get_user_id($row['car_id']);
                                ?>
                            <tr>
                                <td>MICAR0<?=$row['car_id'];?><?=$user_id;?></td>
                                <td><?=$this->M_user->get_name($user_id);?></td>
                                <td><?=date('d F Y',strtotime($row['date_added']));?></td>
                                <td><a href="">View</a></td>
                                <td>
                                    <?php if($row['deleted'] == 1){?>
                                    <span style="color:red;"><b>FEATURE REMOVED</b></span>
                                    <?php } else{?>
                                    <span style="color:green;"><b>FEATURED</b></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?=base_url();?>Feature/read/<?=$row['feature_id'];?>"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="<?=base_url();?>Feature/delete/<?=$row['feature_id'];?>"
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