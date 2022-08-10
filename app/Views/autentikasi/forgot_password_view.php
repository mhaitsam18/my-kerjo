<?= $this->extend("layouts/auth_layout"); ?>

<?= $this->section("content"); ?>
<div class="container container-login animated fadeIn">
    <h3 class="text-center">Lupa Password</h3>
    <div class="login-form">
        <form action="<?= base_url("autentikasi/action_forgot_password"); ?>" method="POST">
            <?= csrf_field(); ?>
            <?php if (session()->getFlashdata("error")) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata("error") ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="email" class="placeholder"><b>Email</b></label>
                <input id="email" name="email" type="text" class="form-control <?= ($validation->hasError("email")) ? "is-invalid" : ""; ?>" placeholder="Masukkan Email">
                <div class="invalid-feedback" role="alert">
                    <?= $validation->getError("email") ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>