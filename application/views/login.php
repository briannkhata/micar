<?php include 'header.php';?>

<form action="<?=base_url();?>Login/signin" method="post">

    <section class="login-form page-section-ptb">
        <div class="container">

            <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-danger" role="alert">
                <?=$this->session->flashdata('message'); ?>
            </div>
            <?php } ?>

            <style>
                .form-control{
                    border-radius:9px;
                }

                button{
                    border-radius:9px;
                }
            </style>

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12">
                    <div class="gray-form clearfix">
                        <div class="mb-3">
                            <label class="form-label" for="name">Username</label>
                            <input id="username" class="form-control" type="text" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <!--
            <div class="remember-checkbox mb-4">
              <input type="checkbox" name="one" id="one">
              <label for="one"> Remember me</label>
              <a href="#" class="float-end">Forgot Password?</a>
            </div>
          -->

                        </div>
                        <div class="d-grid">
                            <button type="submit" name="login" class="button red btn-block"> Log in </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</form>

<?php include 'footer.php';?>