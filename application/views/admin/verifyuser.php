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
                    <form class="form-horizontal form-bordered" action="<?=base_url();?>User/verify" method="post">

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">ID Type</label>
                            <div class="col-lg-2">
                                <select class="form-control" name="idtype_id" required>
                                    <option selected disabled>Id Type</option>
                                    <?php foreach($this->M_idtype->get_idtypes() as $row){?>
                                    <option value="<?=$row['idtype_id'];?>"><?=$row['idtype'];?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Id Number</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="id_number" required>
                            </div>
                        </div>


                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2"></label>

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
<!-- Vendor -->
<?php include 'footer.php';?>