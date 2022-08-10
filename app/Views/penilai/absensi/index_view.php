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
                                        <th>NIK</th>
                                        <th>Nama Karyawan</th>
                                        <th>Total Absensi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_absensi as $absensi) : ?>
                                        <tr>
                                            <td><?= $absensi["nik"]; ?></td>
                                            <td><?= $absensi["nama_lengkap"]; ?></td>
                                            <td><?= $absensi["total_absensi"]; ?> Kali</td>
                                            <td>
                                                <a href="<?= base_url("penilai/kelola-kehadiran/detail/" . $absensi["id"]); ?>" class="btn btn-info btn-sm">Detail</a>
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