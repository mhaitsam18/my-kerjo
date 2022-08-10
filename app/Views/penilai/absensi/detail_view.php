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
                                        <th>Tanggal Absensi</th>
                                        <th>NIK</th>
                                        <th>Nama Karyawan</th>
                                        <th>Status Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_absensi as $absensi) : ?>
                                        <tr>
                                            <td>
                                                <?= date("d-m-Y", strtotime($absensi["tanggal"])); ?>
                                            </td>
                                            <td><?= $absensi["nik"]; ?></td>
                                            <td><?= $absensi["nama_lengkap"]; ?></td>
                                            <td>
                                                <?php if ($absensi["status_kehadiran"] == 1) : ?>
                                                    <span class="badge badge-success">Hadir</span>
                                                <?php else : ?>
                                                    <span class="badge badge-warning">Tidak</span>
                                                <?php endif; ?>
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