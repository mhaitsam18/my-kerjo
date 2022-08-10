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
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>NIK</th>
                                        <th>Dinilai Oleh</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_penilaian as $penilaian) : ?>
                                        <tr>
                                            <td>
                                                <?= date("d-m-Y", strtotime($penilaian["tanggal_penilaian"])); ?>
                                            </td>
                                            <td><?= $penilaian["nik"]; ?></td>
                                            <td><?= $penilaian["nama_penilai"]; ?></td>
                                            <td>
                                                <a href="<?= base_url("pegawai/lihat-penilaian/detail/" . $penilaian["id"]); ?>" class="btn btn-info btn-sm">Lihat Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>