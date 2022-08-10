<?= $this->extend("layouts/main_layout"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
                    <p class="text-white">Pilih pencapaian dari karyawan pada kolom aksi di tabel list tugas dibawah</p>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid">

                            <div class="alert-warning p-3 mb-3">
                                <p class="font-weight-bold">PERHATIAN : </p>
                                <p>Data penilaian yang telah disimpan, tidak dapat di edit, pastikan untuk memperhatikan penilaian dengan baik sebelum menyimpan data</p>
                            </div>

                            <form action="<?= base_url("penilai/kelola-penilaian/simpan"); ?>" method="POST">
                                <?= csrf_field(); ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="100">No</th>
                                            <th>Keterampilan</th>
                                            <th width="250">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($data_tugas as $tugas) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $tugas["nama_tugas"]; ?></td>
                                                <td>
                                                    <input type="hidden" name="id_tugas[]" id="id_tugas" value="<?= $tugas["id"] ?>">
                                                    <div class="form-group">
                                                        <select name="status[]" id="status_<?= $tugas["id"] ?>" class="form-control" required>
                                                            <option value="" disabled selected>Pilih</option>
                                                            <option value="1">Terpenuhi</option>
                                                            <option value="0">Tidak Terpenuhi</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <div class="form-group">
                                    <label for="masukan">Masukan dan Saran</label>
                                    <textarea name="masukan" id="summernote"></textarea>
                                </div>

                                <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?= $id_pegawai; ?>">
                                <input type="hidden" name="id_bagian" id="id_bagian" value="<?= $id_bagian ?>">

                                <div class="d-flex justify-content-end">
                                    <a href="<?= base_url("penilai/kelola-penilaian/tambah"); ?>" class="btn btn-warning px-5 mr-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary px-5">Simpan Data</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section("scripts"); ?>
<script src="<?= base_url("assets/js/plugin/summernote/summernote-bs4.min.js"); ?>"></script>
<script>
    $('#summernote').summernote({
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        tabsize: 2,
        height: 300
    });

</script>
<?= $this->endSection(); ?>