<?= $this->extend("layouts/main_layout"); ?>

<?= $this->section("content"); ?>
<div class="container">

    <div class="page-inner">
        <div class="row">
            <div class="container">
                <div class="card">
                    <div class="card-body">

                        <img src="<?= base_url("uploads/thumbnails/" . $data_informasi["thumbnail"]) ?>" width="100%" alt="Thumbnail" style="border-radius: 10px; height: 350px; object-fit: cover;">

                        <div class="meta-info my-4">
                            <p class="text-muted">
                                <span class="fas fa-user mr-2"></span><?= $data_informasi["nama_penilai"] ?> | <span class="fas fa-calendar"></span> <?= date("d M Y", strtotime($data_informasi["created_at"])); ?>
                            </p>
                        </div>

                        <!-- show isi_informasi -->
                        <div class="isi_informasi">
                            <?= $data_informasi["isi_informasi"] ?>
                        </div>

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