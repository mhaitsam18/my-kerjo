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

                        <div class="alert-warning p-2">
                            <h4 class="font-weight-bold">PERHATIAN!</h4>
                            <p>Durasi cuti yang diperbolehkan maksimal 15 hari</p>
                        </div>

                        <form action="<?= base_url("pegawai/permohonan-cuti/simpan"); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <?php if (session()->getFlashdata("error")) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata("error") ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai Cuti</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control <?= ($validation->hasError("tanggal_mulai")) ? "is-invalid" : ""; ?>" value="">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("tanggal_mulai") ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai Cuti</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control <?= ($validation->hasError("tanggal_selesai")) ? "is-invalid" : ""; ?>" value="">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("tanggal_selesai") ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alasan">Alasan Cuti</label>
                                <input type="text" name="alasan" id="alasan" class="form-control <?= ($validation->hasError("alasan")) ? "is-invalid" : ""; ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("alasan") ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="bukti_pendukung">Bukti Pendukung</label>
                                <input type="file" name="bukti_pendukung" id="bukti_pendukung" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                <a href="<?= base_url("pegawai/permohonan-cuti") ?>" class="btn btn-warning">Batalkan</a>
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
    $("#tanggal_mulai").val(new Date().toISOString().substring(0, 10));
    $("#tanggal_selesai").val(new Date().toISOString().substring(0, 10));
</script>
<?= $this->endSection(); ?>