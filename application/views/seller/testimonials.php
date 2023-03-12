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

                <div class="card">
                    <div class="card-body">
                        <br>
                        <a href="<?=base_url();?>admin/addTestimonial" class="btn btn-info btn-sm">Add New</a>
                        <hr>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Testimonial</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $count = 1;
                                foreach($this->db->get("testimonials")->result_array() as $row){?>
                                <tr>
                                    <th scope="row"><?=$count++;?></th>
                                    <td><?=$row['name'];?><br>
                                        <?=$row['occupation'];?></td>
                                    <td><?=$row['testimonial'];?></td>
                                    <td>
                                        <!--a href="" class="btn btn-info btn-sm">Edit</a-->
                                        <a href="<?=base_url();?>admin/deleteTestimonial/<?=$row['id'];?>"
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