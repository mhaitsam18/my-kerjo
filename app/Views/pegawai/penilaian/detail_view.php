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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p>Nama Lengkap</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p>: <?= $data_pegawai["nama_lengkap"] ?></p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p>NIK</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p>: <?= $data_pegawai["nik"] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p>Nama Mobil</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p>: <?= $data_bagian["nama_mobil"] ?></p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p>Plat Mobil</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p>: <?= $data_bagian["plat_mobil"] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="100">No</th>
                                        <th>Keterampilan</th>
                                        <th width="150">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($detail_penilaian as $penilaian) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $penilaian["detail_pekerjaan"]; ?></td>
                                            <td>
                                                <?php if ($penilaian["status"] == 0) : ?>
                                                    <span class="badge badge-warning">Belum Terpenuhi</span>
                                                <?php elseif ($penilaian["status"] == 1) : ?>
                                                    <span class="badge badge-success">Terpenuhi</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Tidak Terpenuhi</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="masukan">
                                <h4 class="font-weight-bold">Saran/Masukan : </h4>
                                <div>
                                    <?= $data_penilaian["masukan"] ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>