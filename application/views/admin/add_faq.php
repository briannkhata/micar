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
                    <form class="form-horizontal form-bordered" action="<?=base_url();?>faq/save" method="post">

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Faq</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="faq"
                                    value="<?php if (!empty($faq)){echo $faq;}?>" required>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">Faq Answer</label>
                            <div class="col-lg-6">
                                <textarea rows="" cols="" class="form-control"  name="faq_answer"><?php if (!empty($faq_answer)){echo $faq_answer;}?></textarea>
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
<!-- Vendor -->
<?php include 'footer.php';?>