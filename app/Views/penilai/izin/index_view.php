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

                        <?php if (session()->getFlashdata("success")) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata("success") ?>
                            </div>
                        <?php endif; ?>


                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama Karyawan</th>
                                        <th>Tanggal Mulai Izin</th>
                                        <th>Tanggal Akhir Izin</th>
                                        <th>Durasi Izin</th>
                                        <th>Alasan</th>
                                        <th>Keterangan</th>
                                        <th>Bukti Pendukung</th>
                                        <th>Status</th>
                                        <th width="150">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_izin as $izin) : ?>
                                        <tr>
                                            <td><?= $izin["nik"] ?></td>
                                            <td><?= $izin["nama_pegawai"] ?></td>
                                            <td>
                                                <?= date("d F Y", strtotime($izin["tanggal_mulai"])); ?>
                                            </td>
                                            <td>
                                                <?= date("d F Y", strtotime($izin["tanggal_selesai"])); ?>
                                            </td>
                                            <td><?= $izin["durasi_izin"] ?> Hari</td>
                                            <td><?= $izin["alasan"] ?></td>
                                            <td><?= $izin["keterangan"] ?></td>
                                            <td>
                                                <?php if ($izin["bukti_pendukung"]) : ?>
                                                    <a href="<?= base_url("uploads/bukti_pendukung/izin/" . $izin["bukti_pendukung"]); ?>" class="btn btn-primary btn-sm">Download</a>
                                                <?php else : ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($izin["status"] == 0) : ?>
                                                    <span class="badge badge-warning">Pending</span>
                                                <?php elseif ($izin["status"] == 1) : ?>
                                                    <span class="badge badge-success">Diterima</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Ditolak</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($izin["status"] == 0) : ?>
                                                    <a href="<?= base_url("penilai/kelola-permohonan-izin/setujui/" . $izin["id"]) ?>" class="btn btn-success btn-sm" onclick="return confirm('Anda yakin menerima permohonan ini? pilihan tidak dapat dibatalkan')">Setujui</a>
                                                    <a href="<?= base_url("penilai/kelola-permohonan-izin/tolak/" . $izin["id"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menerima permohonan ini? pilihan tidak dapat dibatalkan')">Tolak</a>
                                                <?php else : ?>
                                                    -
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