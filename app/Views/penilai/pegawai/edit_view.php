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
                        <form action="<?= base_url("penilai/kelola-pegawai/update/" . $data_pegawai["id"]); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control <?= ($validation->hasError("nik")) ? "is-invalid" : ""; ?>" placeholder="NIK" value="<?= (old("nik")) ? old("nik") : $data_pegawai["nik"] ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("nik") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control <?= ($validation->hasError("nama_lengkap")) ? "is-invalid" : ""; ?>" placeholder="Nama Lengkap" value="<?= (old("nama_lengkap")) ? old("nama_lengkap") : $data_pegawai["nama_lengkap"] ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("nama_lengkap") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="4" class="form-control <?= ($validation->hasError("alamat")) ? "is-invalid" : ""; ?>" placeholder="Alamat Lengkap"><?= (old("alamat")) ? old("alamat") : $data_pegawai["alamat"]; ?></textarea>
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("alamat") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">Nomor HP</label>
                                <input type="number" name="no_telepon" id="no_telepon" class="form-control <?= ($validation->hasError("no_telepon")) ? "is-invalid" : ""; ?>" placeholder="Nomor HP" value="<?= (old("no_telepon")) ? old("no_telepon") : $data_pegawai["no_telepon"] ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("no_telepon") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pas_foto">Pas Foto</label>
                                <div class="image-container my-2">
                                    <?php if ($data_pegawai["pas_foto"] !== "default.jpg") : ?>
                                        <img src="<?= base_url("uploads/pas_foto//" . $data_pegawai["pas_foto"]) ?>" style="width: 125px; height: 150px; object-fit: cover; object-position: center; border-radius: 8px;" alt="Pas Foto">
                                    <?php else : ?>
                                        <img src="<?= base_url("uploads/pas_foto/default.jpg") ?>" style="width: 125px; height: 150px; object-fit: cover; object-position: center; border-radius: 8px;" alt="Default Pas Foto">
                                    <?php endif; ?>
                                </div>
                                <input type="file" name="pas_foto" id="pas_foto" class="form-control" placeholder="Nomor HP">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError("email")) ? "is-invalid" : ""; ?>" placeholder="Email" value="<?= (old("email")) ? old("email") : $data_pegawai["email"] ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("email") ?>
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