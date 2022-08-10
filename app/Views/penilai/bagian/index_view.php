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
                        <a href="<?= base_url("penilai/kelola-bagian/tambah"); ?>" class="btn btn-primary">Tambah Data Mobil dan Tugas</a>
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
                                        <th>Nama Bagian</th>
                                        <th>Plat Kendaraan</th>
                                        <th>Merk Mobil</th>
                                        <th>Nama Pegawai</th>
                                        <th width="250">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_bagian as $bagian) : ?>
                                        <tr>
                                            <td><?= $bagian["nama_bagian"]; ?></td>
                                            <td><?= $bagian["plat_mobil"] ?></td>
                                            <td><?= $bagian["nama_mobil"] ?></td>
                                            <td><?= $bagian["nama_pegawai"] ?></td>
                                            <td>
                                                <a href="<?= base_url("penilai/kelola-bagian/detail/" . $bagian["id"]) ?>" class="btn btn-info btn-sm">Detail</a>
                                                <form action="<?= base_url("penilai/kelola-bagian/hapus/" . $bagian["id"]); ?>" method="POST" onsubmit="return confirm('Hapus Data bagian ini dari sistem?')" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
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