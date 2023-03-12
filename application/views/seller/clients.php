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
                        <a href="<?=base_url();?>admin/addClient" class="btn btn-info btn-sm">Add New</a>
                        <hr>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Client</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $count = 1;
                                foreach($this->db->get_where("clients")->result_array() as $row){?>
                                <tr>
                                    <td><img src="<?=base_url();?>uploads/users/<?=$row['photo'];?>">
                                        <hr>
                                        <?=$row['name'];?> <br>
                                        <?=$row['business'];?> <br>
                                        <?=$row['desc'];?> <br>
                                        <a href="" class="btn btn-info btn-sm">Edit</a>
                                        <a href="<?=base_url();?>admin/deleteClient/<?=$row['id'];?>"
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