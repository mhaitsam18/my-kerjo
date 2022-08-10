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
            <?php foreach ($data_informasi as $informasi) : ?>
                <div class="col-sm-3">
                    <div class="card card-blog">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img class="img" src="<?= base_url("uploads/thumbnails/" . $informasi["thumbnail"]); ?>" width="100%" alt="Thumbnail" style="border-radius: 10px; height: 150px; object-fit: cover;">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray">
                                Oleh <?= $informasi["nama_penilai"] ?> Pada <?= date("d M Y", strtotime($informasi["created_at"])); ?>
                            </h6>
                            <h4 class="card-title">
                                <a href="<?= base_url("pegawai/informasi/detail/" . $informasi["id"]) ?>">
                                    <?= $informasi["judul_informasi"] ?>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>