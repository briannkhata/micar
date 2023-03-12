<?php include "header.php";?>

<!-- ======= Sidebar ======= -->
<?php include "menu.php";?>
<!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?=$page_title;?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-info fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <center><?=$this->session->flashdata('message'); ?> </center>
                </div>
                <?php } ?>
                <div class="card">
                    <div class="card-body">
                        <br>
                        <a href="<?=base_url();?>admin/addProduct" class="btn btn-info btn-sm">Add New</a>
                        <hr>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Qualifications</th>
                                    <th scope="col">Count</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $count = 1;
                                foreach($this->db->get("products")->result_array() as $row){?>
                                <tr>
                                    <td><?=$row['product'];?></td>
                                    <td><?=$row['desc'];?></td>
                                    <td><?=$row['qualification'];?></td>
                                    <td><?=$row['count'];?></td>
                                    <td>
                                        <a href="<?=base_url();?>admin/editProduct/<?=$row['id'];?>"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="<?=base_url();?>admin/deleteProduct/<?=$row['id'];?>"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php }?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include 'footer.php';?>