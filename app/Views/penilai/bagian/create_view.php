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
                <div class="wizard-container wizard-round col-md-12">
                    <div class="wizard-header text-center">
                        <h3 class="wizard-title"><b>Tambahkan</b> Tugas Baru</h3>
                        <small>Harap perhatikan sebelum mengisi data, data yang anda isi tidak dapat di edit</small>
                    </div>
                    <form action="<?= base_url("penilai/kelola-bagian/simpan") ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="wizard-body">
                            <div class="row">
                                <ul class="wizard-menu nav nav-pills nav-primary">
                                    <li class="step">
                                        <a class="nav-link active" href="#bagian" data-toggle="tab" aria-expanded="true"><i class="fas fa-tasks"></i> Nama Bagian</a>
                                    </li>
                                    <li class="step">
                                        <a class="nav-link" href="#tugas" data-toggle="tab"><i class="fa fa-file mr-2"></i> Rincian Tugas</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="bagian">
                                    <h4 class="info-text">Data Tugas dan Pegawai</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama_bagian">Nama Bagian</label>
                                                <input type="text" name="nama_bagian" id="nama_bagian" class="form-control <?= ($validation->hasError("nama_bagian")) ? "is-invalid" : ""; ?>" placeholder="Nama Bagian" value="<?= old("nama_bagian"); ?>" required>
                                                <div class="invalid-feedback" role="alert">
                                                    <?= $validation->getError("nama_bagian") ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="plat_mobil">Plat Mobil</label>
                                                <input type="text" name="plat_mobil" id="plat_mobil" class="form-control <?= ($validation->hasError("plat_mobil")) ? "is-invalid" : ""; ?>" placeholder="Plat Kendaraan" value="<?= old("plat_mobil"); ?>" required>
                                                <div class="invalid-feedback" role="alert">
                                                    <?= $validation->getError("plat_mobil") ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama_mobil">Merk Mobil</label>
                                                <input type="text" name="nama_mobil" id="nama_mobil" class="form-control <?= ($validation->hasError("nama_mobil")) ? "is-invalid" : ""; ?>" placeholder="Merk Mobil" value="<?= old("nama_mobil"); ?>" required>
                                                <div class="invalid-feedback" role="alert">
                                                    <?= $validation->getError("nama_mobil") ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="id_pegawai">Pilih Pegawai</label>
                                                <select name="id_pegawai" id="id_pegawai" class="form-control <?= ($validation->hasError("id_pegawai")) ? "is-invalid" : ""; ?>">
                                                    <option value="" disabled selected>--Pilih--</option>
                                                    <?php foreach ($data_pegawai as $pegawai) : ?>
                                                        <option value="<?= $pegawai["id"] ?>"><?= $pegawai["nama_lengkap"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback" role="alert">
                                                    <?= $validation->getError("id_pegawai") ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tugas">
                                    <h4 class="info-text">Rincian Tugas</h4>
                                    <div class="alert-warning p-2 mb-3">
                                        <p class="font-weight-bold">PERHATIAN : </p>
                                        <p>- Jika ingin menambahkan lebih banyak tugas, gunakan tombol <b>tambah lebih banyak tugas</b> dibawah ini</p>
                                        <p>- Untuk mencegah terjadinya kesalahan pada saat input penilaian, data rincian tugas tidak dapat di edit, mohon perhatikan sebelum melakukan simpan data.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_tugas">Rincian Tugas</label>
                                        <div class="inputFormRow">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Masukkan Rincian Tugas" id="nama_tugas" name="nama_tugas[]" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger" type="button" id="removeRow">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="newRow">
                                            <!-- new input form row will be injected here using jquery -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-warning btn-block" id="addNewRow" type="button">Tambahkan lebih banyak tugas</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-action">
                            <div class="pull-left">
                                <input type="button" class="btn btn-previous btn-fill btn-black" name="previous" value="Kembali">
                            </div>
                            <div class="pull-right">
                                <input type="button" class="btn btn-next btn-primary" name="next" value="Lanjutkan">
                                <input type="submit" class="btn btn-finish btn-danger" name="finish" value="Simpan Data" style="display: none;">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("scripts") ?>
<script>
    // validator here
    var $validator = $('.wizard-container form').validate({
        validClass: "success",
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        }
    });

    $("#addNewRow").click(function() {
        var html = "";
        html += '<div class="input-group mt-3">';
        html += '<input type="text" class="form-control" placeholder="Masukkan Rincian Tugas" id="nama_tugas" name="nama_tugas[]" value="">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Hapus</button>';
        html += '</div>';
        html += '</div>';

        $("#newRow").append(html);
    });

    // remove row
    $(document).on('click', "#removeRow", function() {
        console.log('remove row');
        // remove row
        $(this).closest('.input-group').remove();
    })
</script>
<?= $this->endSection(); ?>