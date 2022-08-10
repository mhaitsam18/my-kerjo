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
                <form action="<?= base_url("penilai/kelola-penilaian/keterampilan"); ?>" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_bagian">Pilih Karyawan</label>
                                <select name="id_pegawai" id="id_pegawai" class="form-control">
                                    <option value="" disabled selected>--Pilih--</option>
                                    <?php foreach ($data_pegawai as $pegawai) : ?>
                                        <option value="<?= $pegawai["id"]; ?>"><?= $pegawai["nama_lengkap"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control" placeholder="NIK muncul otomatis" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="2" class="form-control" placeholder="Alamat muncul otomatis" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">No Telepon</label>
                                <input type="number" name="no_telepon" id="no_telepon" class="form-control" placeholder="No Telepon muncul otomatis" value="" readonly>
                            </div>
                            <div class="form-group d-none" id="id_bagian_wrapper">
                                <label for="id_bagian">Nama Bagian</label>
                                <select name="id_bagian" id="id_bagian" class="form-control">
                                   <!-- injected from ajax -->
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Beri Penilaian</button>
                                <a href="<?= base_url("penilai/kelola-penilaian"); ?>" class="btn btn-warning">Batalkan</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("scripts"); ?>
<script>
    $(document).ready(function() {

        $("#id_pegawai").change(function() {

            let id_pegawai = $(this).val();

            $.ajax({
                url: "<?= base_url("penilai/pegawai/json"); ?>" + "/" + id_pegawai,
                type: "GET",
                dataType: "JSON",
                success: function(data_pegawai) {

                    $.ajax({
                        url: "<?= base_url("penilai/bagian/json"); ?>" + "/" + id_pegawai,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data_bagian) {
                            $("#id_bagian_wrapper").removeClass("d-none");
                            $("#id_bagian").html("");
                            $("#id_bagian").append("<option value='' disabled selected>--Pilih--</option>");
                            $.each(data_bagian, function(i, data) {
                                $("#id_bagian").append("<option value='" + data.id + "'>" + data.nama_bagian + "</option>");
                            });

                        }
                    });

                    $("#nik").val(data_pegawai.nik);
                    $('#alamat').val(data_pegawai.alamat);
                    $('#no_telepon').val(data_pegawai.no_telepon);
                    $('#nama_bagian').val(data_pegawai.nama_bagian);
                }
            });

        });

    });
</script>
<?= $this->endSection(); ?>