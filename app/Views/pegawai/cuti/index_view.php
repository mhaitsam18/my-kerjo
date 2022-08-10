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
                    <div class="card-header">
                        <a href="<?= base_url("pegawai/permohonan-cuti/tambah"); ?>" class="btn btn-primary">Tambah Permohonan Cuti</a>
                    </div>
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
                                        <th>Tanggal Mulai Cuti</th>
                                        <th>Tanggal Selesai Cuti</th>
                                        <th>Durasi Cuti</th>
                                        <th>Alasan</th>
                                        <th>Keterangan</th>
                                        <th>Bukti Pendukung</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_cuti as $cuti) : ?>
                                        <tr>
                                            <td>
                                                <?= date("d-m-Y", strtotime($cuti["tanggal_mulai"])); ?>
                                            </td>
                                            <td>
                                                <?= date("d-m-Y", strtotime($cuti["tanggal_selesai"])); ?>
                                            </td>
                                            <td><?= $cuti["durasi_cuti"] ?> Hari</td>
                                            <td><?= $cuti["alasan"] ?></td>
                                            <td><?= $cuti["keterangan"] ?></td>
                                            <td>
                                                <?php if ($cuti["bukti_pendukung"]) : ?>
                                                    <a href="<?= base_url("uploads/bukti_pendukung/cuti/" . $cuti["bukti_pendukung"]); ?>" class="btn btn-primary btn-sm" target="_blank">Lihat Bukti</a>
                                                <?php else : ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($cuti["status"] == 0) : ?>
                                                    <span class="badge badge-warning">Menunggu Persetujuan</span>
                                                <?php elseif ($cuti["status"] == 1) : ?>
                                                    <span class="badge badge-success">Cuti Diterima</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Cuti Ditolak</span>
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