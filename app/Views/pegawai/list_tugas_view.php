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
                                        <th>Nama Pekerjaan</th>
                                        <th>Plat Mobil</th>
                                        <th>Nama Mobil</th>
                                        <th>Tugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_tugas as $tugas) : ?>
                                        <tr>
                                            <td><?= $tugas["nama_pekerjaan"]; ?></td>
                                            <td><?= $tugas["plat_mobil"]; ?></td>
                                            <td><?= $tugas["nama_mobil"] ?></td>
                                            <td>
                                                <a href="<?= base_url("pegawai/dashboard/detail_list_tugas/" . $tugas["id"]); ?>" class="btn btn-info btn-sm">Lihat Detail</a>
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