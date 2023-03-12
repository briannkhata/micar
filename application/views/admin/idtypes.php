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
                        <a href="<?=base_url();?>Idtype/read" class="btn btn-info btn-sm">Add New</a>
                        <hr>
                    <table class="table table-bordered table-striped mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th style="width:2%;">#</th>
                                <th>Id type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach($this->M_idtype->get_idtypes() as $row){?>
                            <tr>
                                <td><?=$count++;?></td>
                                <td><?=$row['idtype'];?></td>

                                <td>
                                    <div class="btn-group">
                                        <a href="<?=base_url();?>Idtype/read/<?=$row['idtype_id'];?>"
                                            class="btn btn-info btn-sm">Edit</a>

                                        <a href="<?=base_url();?>Idtype/delete/<?=$row['idtype_id'];?>"
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