<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url("assets/img/icon.ico"); ?>" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url("assets/js/plugin/webfont/webfont.min.js"); ?>"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['http://localhost:8080/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/atlantis.css"); ?>">

    <!-- injected code css here -->
    <?= $this->renderSection("styles"); ?>

</head>

<body>
    <div class="wrapper">
        <?= $this->include("layouts/_parts/header"); ?>

        <!-- Sidebar -->
        <?= $this->include("layouts/_parts/sidebar"); ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <?= $this->renderSection("content"); ?>

            <?= $this->include("layouts/_parts/footer"); ?>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url("assets/js/core/jquery.3.2.1.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/core/popper.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/core/bootstrap.min.js"); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url("assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"); ?>"></script>

    <script src="<?= base_url("assets/js/plugin/chart.js/chart.min.js") ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url("assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"); ?>"></script>

    <!-- Moment JS -->
    <script src="<?= base_url("assets/js/plugin/moment/moment.min.js"); ?>"></script>

    <!-- Chart JS -->
    <script src="<?= base_url("assets/js/plugin/chart.js/chart.min.js"); ?>"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url("assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"); ?>"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url("assets/js/plugin/chart-circle/circles.min.js"); ?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url("assets/js/plugin/datatables/datatables.min.js"); ?>"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url("assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"); ?>"></script>

    <!-- Bootstrap Toggle -->
    <script src="<?= base_url("assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"); ?>"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?= base_url("assets/js/plugin/jqvmap/jquery.vmap.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"); ?>"></script>

    <!-- Google Maps Plugin -->
    <script src="<?= base_url("assets/js/plugin/gmaps/gmaps.js"); ?>"></script>

    <!-- Dropzone -->
    <script src="<?= base_url("assets/js/plugin/dropzone/dropzone.min.js"); ?>"></script>

    <!-- Fullcalendar -->
    <script src="<?= base_url("assets/js/plugin/fullcalendar/fullcalendar.min.js"); ?>"></script>

    <!-- DateTimePicker -->
    <script src="<?= base_url("assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"); ?>"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="<?= base_url("assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"); ?>"></script>

    <!-- Bootstrap Wizard -->
    <script src="<?= base_url("assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"); ?>"></script>

    <!-- jQuery Validation -->
    <script src="<?= base_url("assets/js/plugin/jquery.validate/jquery.validate.min.js"); ?>"></script>

    <!-- Summernote -->
    <script src="<?= base_url("assets/js/plugin/summernote/summernote-bs4.min.js"); ?>"></script>

    <!-- Select2 -->
    <script src="<?= base_url("assets/js/plugin/select2/select2.full.min.js"); ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url("assets/js/plugin/sweetalert/sweetalert.min.js"); ?>"></script>

    <!-- Owl Carousel -->
    <script src="<?= base_url("assets/js/plugin/owl-carousel/owl.carousel.min.js"); ?>"></script>

    <!-- Magnific Popup -->
    <script src="<?= base_url("assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"); ?>"></script>

    <!-- Atlantis JS -->
    <script src="<?= base_url("assets/js/atlantis.min.js"); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable();
        });

        $.ajax({
            url: "<?= base_url("pegawai/dashboard/get_count_tugas_and_informasi"); ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                console.log(data);
                
                $("#totalTugas").html(data.total_tugas);
                $("#totalInformasi").html(data.total_informasi);
            }
        })

    </script>

    <?= $this->renderSection("scripts"); ?>

</body>

</html>