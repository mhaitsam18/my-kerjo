<?= $this->extend("layouts/main_layout"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Detail Bagian <?= $data_bagian["nama_bagian"]; ?></h2>
                    <p class="text-white">Tambahkan list tugas yang akan diberikan kepada karyawan dengan menggunakan tombol dibawah ini</p>
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
                                        <th>Nama Bagian</th>
                                        <th>:</th>
                                        <td><?= $data_bagian["nama_bagian"] ?></td>
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
                                </table>
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
                                        <?php foreach ($data_kriteria as $kriteria) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $kriteria["nama_tugas"]; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>