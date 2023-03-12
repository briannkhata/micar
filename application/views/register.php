<?php include 'header.php';?>
<form action="<?=base_url();?>Home/register_user" method="post">
    <section class="register-form page-section-ptb">
        <div class="container">
            <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-primary" role="alert">
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
                <div class="col-lg-8 col-md-12">
                    <div class="gray-form">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Name*</label>
                                <input class="form-control" type="text" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password* </label>
                                <input class="form-control" type="password" id="password" name="password" required>
                            </div>
                            <!-- <div class="mb-3 col-md-12">
                                <label><input type="checkbox" onclick="togglePassword()"> Show password</label>
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Phone *</label>
                                <input id="phone" class="form-control" type="tel" name="phone" required>
                            </div>

                            <div class="mb-3">
                                <div class="remember-checkbox">
                                    <input type="checkbox" name="one" id="one" required>
                                    <label for="one">Accept our <a href="<?=base_url();?>Home/terms"> Terms</a></label>
                                </div>
                            </div>
                            <button type="submit" class="button red"> Create Account</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</form>
<?php include 'footer.php';?>
<script>
function togglePassword() {
    var x = $("#password");
    if (x.attr("type") === "password") {
        x.attr("type", "text");
    } else {
        x.attr("type", "password");
    }
}
</script>