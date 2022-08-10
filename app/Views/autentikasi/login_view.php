<?= $this->extend("layouts/auth_layout"); ?>

<?= $this->section("content"); ?>
<div class="container container-login animated fadeIn">
    <h3 class="text-center">Silahkan Login</h3>
    <div class="login-form">
        <form action="<?= base_url("login"); ?>" method="POST">
            <?= csrf_field(); ?>
            <?php if (session()->getFlashdata("error")) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata("error") ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata("success")) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata("success") ?>
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
                <label for="password" class="placeholder"><b>Password</b></label>
                <a href="<?= base_url('forgot_password') ?>" class="link float-right">Lupa Password</a>
                <div class="position-relative">
                    <input id="password" name="password" type="password" class="form-control <?= ($validation->hasError("password")) ? "is-invalid" : ""; ?>" placeholder="Masukkan Password">
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                    <div class="invalid-feedback" role="alert">
                        <?= $validation->getError("password") ?>
                    </div>
                </div>
            </div>
            <div class="form-group form-action-d-flex mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberme">
                    <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Masuk</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>