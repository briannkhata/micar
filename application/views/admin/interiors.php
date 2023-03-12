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
                        <a href="<?=base_url();?>Interior/read" class="btn btn-info btn-sm">Add New</a>
                        <hr>
                    <table class="table table-bordered table-striped mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th style="width:2%;">#</th>
                                <th>Interior Color</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach($this->M_interior->get_interiors() as $row){?>
                            <tr>
                                <td><?=$count++;?></td>
                                <td><?=$row['interior'];?></td>

                                <td>
                                    <div class="btn-group">
                                        <a href="<?=base_url();?>Interior/read/<?=$row['interior_id'];?>"
                                            class="btn btn-info btn-sm">Edit</a>

                                        <a href="<?=base_url();?>Interior/delete/<?=$row['interior_id'];?>"
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