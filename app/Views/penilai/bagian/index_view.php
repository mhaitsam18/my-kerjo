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
                        <!-- <a href="<?= base_url("penilai/kelola-bagian/tambah"); ?>" class="btn btn-primary">Tambah Data Mobil dan Tugas</a> -->
                        <h2>Form Penugasan</h2>
                        <div class="row" style="height: 550px;">
                            <div class="col-md-6">
                                <form action="<?= base_url('Penilai/Bagian/insertTugas') ?>" method="post">
                                    <div class="form-group">
                                        <label for="id_pekerjaan">Nama Tugas</label>
                                        <select class="form-control id_pekerjaan" name="id_pekerjaan" id="id_pekerjaan">
                                            <option value="" selected disabled>Pilih Tugas</option>
                                            <?php foreach ($data_pekerjaan as $pekerjaan) : ?>
                                                <option value="<?= $pekerjaan['id'] ?>"><?= $pekerjaan['nama_pekerjaan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="plat_mobil">Plat Mobil</label>
                                        <input type="text" class="form-control" name="plat_mobil" id="plat_mobil">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_mobil">Nama Mobil</label>
                                        <input type="text" class="form-control" name="nama_mobil" id="nama_mobil">
                                    </div>
                                    <h4>List Pegawai</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Pegawai</th>
                                                <th scope="col">Check</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data_pegawai as $pegawai) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++ ?></th>
                                                    <td><?= $pegawai['nama_lengkap'] ?></td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-check-input" type="checkbox" name="id_pegawai[]" value="<?= $pegawai['id'] ?>" id="id_pegawai<?= $pegawai['id'] ?>">
                                                            <label class="form-check-label" for="id_pegawai<?= $pegawai['id'] ?>">
                                                                Pilih
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-info btn-sm float-right">Tambah</button>
                                </form>
                            </div>
                            <div class="col-md-6" id="rincian">
                            </div>
                        </div>
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
                                            <td><?= $bagian["nama_pekerjaan"]; ?></td>
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

<?= $this->section("scripts"); ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script>
    $("#id_pekerjaan").change(function() {
        var id_pekerjaan = $(".id_pekerjaan").val();
        $.ajax({
            url: "<?= base_url('penilai/bagian/rincian') ?>",
            type: "post",
            data: {
                id_pekerjaan: id_pekerjaan
            },
            success: function(data) {
                $('#rincian').html(data);
            }
        });
    });
</script>
<?= $this->endSection(); ?>