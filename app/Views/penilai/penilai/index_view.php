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
                        <a href="<?= base_url("penilai/kelola-penilai/tambah"); ?>" class="btn btn-primary">Tambah Penilai</a>
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
                                        <th width="100">Pas Foto</th>
                                        <th>Nama</th>
                                        <th>Nomor HP</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_penilai as $penilai) : ?>
                                        <tr>
                                            <td>
                                                <?php if ($penilai["pas_foto"] !== "default.jpg") : ?>
                                                    <img src="<?= base_url("uploads/pas_foto/" . $penilai["pas_foto"]) ?>" style="width: 125px; height: 150px; object-fit: cover; object-position: center; border-radius: 8px;" alt="Pas Foto">
                                                <?php else : ?>
                                                    <img src="<?= base_url("uploads/pas_foto/default.jpg") ?>" style="width: 125px; height: 150px; object-fit: cover; object-position: center; border-radius: 8px;" alt="Default Pas Foto">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $penilai["nama_lengkap"]; ?></td>
                                            <td><?= $penilai["no_telepon"]; ?></td>
                                            <td><?= $penilai["email"]; ?></td>
                                            <td><?= $penilai["alamat"]; ?></td>
                                            <td>
                                                <a href="<?= base_url("penilai/kelola-penilai/edit/" . $penilai["id"]); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="<?= base_url("penilai/kelola-penilai/hapus/" . $penilai["id"]); ?>" method="POST" onsubmit="return confirm('Hapus penilai ini dari sistem?')" class="d-inline">
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