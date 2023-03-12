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
                    <table class="table table-bordered table-striped mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th style="width:2%;">#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Contacts</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach($this->M_user->get_admins() as $row){?>
                            <tr>
                                <td><?=$count++;?></td>
                                <td><?=$row['name'];?></td>
                                <td><?=$row['username'];?></td>
                                <td><?=$row['phone'];?> |   <?=$row['email'];?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?=base_url();?>User/read/<?=$row['user_id'];?>"
                                            class="btn btn-info btn-sm">Edit</a>

                                        <a href="<?=base_url();?>User/delete/<?=$row['user_id'];?>"
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