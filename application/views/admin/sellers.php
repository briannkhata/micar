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
                                <th style="width:2%;">#</th>
                                <th>Name</th>
                                <th>Contacts</th>
                                <th>Address</th>
                                <th>Date Joined</th>
                                <th>Verified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach($this->M_user->get_sellers() as $row){?>
                            <tr>
                                <td><?=$count++;?></td>
                                <td><a href="<?=base_url();?>User/view/<?=$row['user_id'];?>"><?=$row['name'];?></a></td>
                                <td><?=$row['phone'];?> | <?=$row['alt_phone'];?><br>
                                    <?=$row['email'];?>
                                </td>
                                <td><?=$row['address'];?> | <?=$this->M_district->get_district($row['district_id']);?></td>
                                <td><?=date('d F Y',strtotime($row['date_added']));?></td>
                                <td>

                                <?php if($row['id_number'] !=null){?>
                                <b style="color:green">VERIFIED</b>
                                    <?=$this->M_idtype->get_idtype($row['idtype_id']);?> | <?=$row['id_number'];?> | 
                                    <?=$row['date_verified'];?> 
                                 <?php } else {?>
                                    <b style="color:red">NOT VERIFIED</b>

                                    <?php }?>

                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?=base_url();?>User/read/<?=$row['user_id'];?>"
                                            class="btn btn-info btn-sm">Edit</a>

                                        <a href="<?=base_url();?>User/verify/<?=$row['user_id'];?>"
                                            class="btn btn-success btn-sm">Verify User</a>

                                        <a href="<?=base_url();?>User/delete/<?=$row['user_id'];?>"
                                            class="btn btn-danger btn-sm">De-Activate</a>                                          
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