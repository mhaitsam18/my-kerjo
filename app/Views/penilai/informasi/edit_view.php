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
                        <form action="<?= base_url("penilai/kelola-informasi/update/" . $data_informasi["id"]); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="judul_informasi">Judul Informasi</label>
                                <input type="text" name="judul_informasi" id="judul_informasi" class="form-control <?= ($validation->hasError("judul_informasi")); ?>" placeholder="Judul Informasi" value="<?= (old("judul_informasi")) ? old("judul_informasi") : $data_informasi["judul_informasi"]; ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("judul_informasi"); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <div class="thumbnail-preview py-2">
                                    <?php if ($data_informasi["thumbnail"] !== "default.jpg") : ?>
                                        <img src="<?= base_url("uploads/thumbnails/" . $data_informasi["thumbnail"]) ?>" style="width: 250px; height: 150px; object-fit: cover; object-position: center; border-radius: 8px;" alt="Pas Foto">
                                    <?php else : ?>
                                        <img src="<?= base_url("uploads/thumbnails/default.jpg") ?>" style="width: 250px; height: 150px; object-fit: cover; object-position: center; border-radius: 8px;" alt="Default Pas Foto">
                                    <?php endif; ?>
                                </div>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                            </div>

                            <div class="form-group">
                                <label for="isi_informasi">Isi informasi</label>
                                <textarea name="isi_informasi" id="summernote"><?= $data_informasi["isi_informasi"]; ?></textarea>
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("isi_informasi") ?>
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
<script src="<?= base_url("assets/js/plugin/summernote/summernote-bs4.min.js"); ?>"></script>
<script>
    $('#summernote').summernote({
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        tabsize: 2,
        height: 300
    });
</script>
<?= $this->endSection(); ?>