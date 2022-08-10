<?= $this->extend("layouts/main_layout"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner">
        <div class="row">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Profile</h4>
                    </div>
                    <div class="card-body">

                        <?php if (session()->getFlashdata("profile_success")) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata("profile_success") ?>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-sm-4">
                                <?php if (session()->get("pas_foto") !== "default.jpg") : ?>
                                    <img src="<?= base_url("uploads/pas_foto/" . session()->get("pas_foto")) ?>" alt="image profile" width="100%">
                                <?php else : ?>
                                    <img src="<?= base_url("uploads/pas_foto/default.jpg") ?>" alt="image profile" width="100%">
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-8">
                                <form action="<?= base_url("penilai/profile/update-profile"); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control <?= ($validation->hasError("nama_lengkap")) ? "is-invalid" : ""; ?>" placeholder="Nama Lengkap" value="<?= session()->get("nama_lengkap") ?>">
                                        <div class="invalid-feedback" role="alert">
                                            <?= $validation->getError("nama_lengkap") ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" rows="4" class="form-control <?= ($validation->hasError("alamat")) ? "is-invalid" : ""; ?>"><?= session()->get("alamat"); ?></textarea>
                                        <div class="invalid-feedback" role="alert">
                                            <?= $validation->getError("alamat") ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telepon">Nomor Telepon</label>
                                        <input type="number" name="no_telepon" id="no_telepon" class="form-control <?= ($validation->hasError("no_telepon")) ? "is-invalid" : ""; ?>" placeholder="Nama Lengkap" value="<?= session()->get("no_telepon") ?>">
                                        <div class="invalid-feedback" role="alert">
                                            <?= $validation->getError("no_telepon") ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pas_foto">Pas Foto</label>
                                        <input type="file" name="pas_foto" id="pas_foto" class="form-control" placeholder="Nama Lengkap">
                                        <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Ganti Password</h4>
                    </div>
                    <div class="card-body">

                        <?php if (session()->getFlashdata("password_success")) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata("password_success") ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata("password_error")) : ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata("password_error") ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url("penilai/profile/ganti-password"); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="old_password">Password Lama</label>
                                <input type="password" name="old_password" id="old_password" class="form-control <?= ($validation->hasError("old_password")) ? "is-invalid" : ""; ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("old_password") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Password Baru</label>
                                <input type="password" name="new_password" id="new_password" class="form-control <?= ($validation->hasError("new_password")) ? "is-invalid" : ""; ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("new_password") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password_confirm">Konfirmasi Password Baru</label>
                                <input type="password" name="new_password_confirm" id="new_password_confirm" class="form-control <?= ($validation->hasError("new_password_confirm")) ? "is-invalid" : ""; ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("new_password_confirm") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ganti Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>