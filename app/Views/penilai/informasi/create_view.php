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
                        <form action="<?= base_url("penilai/kelola-informasi/simpan"); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="judul_informasi">Judul Informasi</label>
                                <input type="text" name="judul_informasi" id="judul_informasi" class="form-control <?= ($validation->hasError("judul_informasi")) ? "is-invalid" : ""; ?>" placeholder="Judul Informasi" value="<?= old("judul_informasi"); ?>">
                                <div class="invalid-feedback" role="alert">
                                    <?= $validation->getError("judul_informasi") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            </div>
                            <div class="form-group">
                                <label for="isi_informasi">Isi informasi</label>
                                <textarea name="isi_informasi" id="summernote"></textarea>
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
<!-- Summernote -->
<script src="<?= base_url("assets/js/plugin/summernote/summernote-bs4.min.js"); ?>"></script>
<script>
    $('#summernote').summernote({
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        tabsize: 2,
        height: 300
    });
</script>
<?= $this->endSection(); ?>