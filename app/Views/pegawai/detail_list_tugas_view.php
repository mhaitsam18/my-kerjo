<?= $this->extend("layouts/main_layout"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Detail Bagian <?= $data_bagian["nama_pekerjaan"]; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="font-weight-bold">Detail Data Bagian</h3>
                                <table class="table">
                                    <tr>
                                        <th>Nama Pekerjaan</th>
                                        <th>:</th>
                                        <td><?= $data_bagian["nama_pekerjaan"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Plat Mobil</th>
                                        <th>:</th>
                                        <td><?= $data_bagian["plat_mobil"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Mobil</th>
                                        <th>:</th>
                                        <td><?= $data_bagian["nama_mobil"] ?></td>
                                    </tr>
                                    <tr class="<?= ($data_bagian["status"] == 1) ? "table-success" : "table-warning" ?>">
                                        <th>Status</th>
                                        <th>:</th>
                                        <td><?= ($data_bagian["status"] == 1) ? "Selesai" : "Proses" ?></td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h3 class="font-weight-bold">Data Pekerja</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID Pengguna</th>
                                                    <th scope="col">Nama Pegawai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data_pegawai as $pegawai) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $pegawai['id'] ?></th>
                                                        <td><?= $pegawai['nama_lengkap'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h3 class="font-weight-bold">Rincian Tugas</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rincian Tugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($detail_tugas as $tugas) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $tugas["detail_pekerjaan"]; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </tbody>
                                </table>
                                <?php if ($data_bagian['status'] == 0) : ?>
                                    <a href="<?= base_url("pegawai/dashboard/tugas_selesai/" . $data_bagian['id']) ?>" class="btn btn-primary float-right">Selesai</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>