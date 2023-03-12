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
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $count = 1;
                                foreach($this->db->get("messages")->result_array() as $row){?>
                                <tr>
                                    <th scope="row"><?=$count++;?></th>
                                    <td><?=$row['name'];?></td>
                                    <td><?=$row['email'];?></td>
                                    <td><?=$row['subject'];?></td>
                                    <td><?=$row['message'];?></td>
                                    <td><?=date("d F Y h:m",strtotime($row['date_sent']));?></td>
                                    <td><a href="<?=base_url();?>admin/deleteMessage/<?=$row['id'];?>"
                                            class="btn btn-danger btn-sm">Delete</a></td>
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