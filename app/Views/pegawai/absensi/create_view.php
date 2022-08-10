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
                        <form action="<?= base_url("pegawai/absensi/simpan"); ?>" method="POST">
                            <?= csrf_field(); ?>

                            <?php if (session()->getFlashdata("error")) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata("error") ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="tanggal">Tanggal Absensi</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control <?= ($validation->hasError("tanggal")) ? "is-invalid" : ""; ?>" value="" readonly>
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("judul_informasi") ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status_kehadiran">Status Kehadiran</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="status_kehadiran" type="checkbox" value="1">
                                        <span class="form-check-sign">Saya Hadir</span>
                                    </label>
                                </div>
                                <div class="text-danger">
                                    <?= $validation->getError("status_kehadiran") ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("scripts"); ?>
<script>
    // set tanggal to today
    $("#tanggal").val(new Date().toISOString().substring(0, 10));
</script>
<?= $this->endSection(); ?>