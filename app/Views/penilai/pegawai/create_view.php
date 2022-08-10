<?= $this->extend("layouts/main_layout"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url("penilai/kelola-pegawai/simpan"); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control <?= ($validation->hasError("nik")) ? "is-invalid" : ""; ?>" placeholder="NIK" value="<?= old("nik"); ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("nik") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control <?= ($validation->hasError("nama_lengkap")) ? "is-invalid" : ""; ?>" placeholder="Nama Lengkap" value="<?= old("nama_lengkap"); ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("nama_lengkap") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="4" class="form-control <?= ($validation->hasError("alamat")) ? "is-invalid" : ""; ?>" placeholder="Alamat Lengkap"><?= old("alamat"); ?></textarea>
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("alamat") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">Nomor HP</label>
                                <input type="number" name="no_telepon" id="no_telepon" class="form-control <?= ($validation->hasError("no_telepon")) ? "is-invalid" : ""; ?>" placeholder="Nomor HP" value="<?= old("no_telepon"); ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("no_telepon") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pas_foto">Pas Foto</label>
                                <input type="file" name="pas_foto" id="pas_foto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError("email")) ? "is-invalid" : ""; ?>" placeholder="Email" value="<?= old("email"); ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("email") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control <?= ($validation->hasError("password")) ? "is-invalid" : ""; ?>" placeholder="Buat Password">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("password") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control <?= ($validation->hasError("konfirmasi_password")) ? "is-invalid" : ""; ?>" placeholder="Konfirmasi Password">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("konfirmasi_password") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                <a href="<?= base_url("penilai/kelola-pegawai") ?>" class="btn btn-warning">Batalkan</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>