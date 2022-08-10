<?= $this->extend("layouts/main_layout"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-file"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Informasi</p>
                                    <h4 class="card-title"><?= $jumlah_informasi; ?> Post</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="card card-stats card-warning card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-file"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Tugas</p>
                                    <h4 class="card-title"><?= $jumlah_tugas; ?> Tugas</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <?php if ($absensi) : ?>
                    <div class="card card-stats card-success card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-fingerprint"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Status Absensi</p>
                                        <h4 class="card-title">Sudah Absensi hari ini</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="<?= base_url("pegawai/absensi") ?>" style="text-decoration: none;">
                        <div class="card card-stats card-danger card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="fas fa-fingerprint"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Status Absensi</p>
                                            <h4 class="card-title">Belum Absensi hari ini</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Kinerja Kamu</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Total</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section("scripts"); ?>
<script>
    var
        barChart = document.getElementById('barChart').getContext('2d'),
        doughnutChart = document.getElementById('doughnutChart').getContext('2d');

    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    var myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            // foreach tercapai_by_month
            labels: [<?php foreach ($status_bulanan as $key => $value) : ?>
                    monthNames[<?= $value["bulan"] - 1; ?>],
                <?php endforeach; ?>
            ],
            datasets: [{
                    label: "Tercapai",
                    backgroundColor: 'rgb(23, 125, 255)',
                    borderColor: 'rgb(23, 125, 255)',
                    data: [
                        <?php foreach ($status_bulanan as $key => $value) : ?>
                            <?= $value["tercapai"]; ?>,
                        <?php endforeach; ?>
                    ],
                },
                {
                    label: "Tidak Tercapai",
                    backgroundColor: 'rgb(255, 23, 23)',
                    borderColor: 'rgb(255, 23, 23)',
                    data: [
                        <?php foreach ($status_bulanan as $key => $value) : ?>
                            <?= $value["tidak_tercapai"]; ?>,
                        <?php endforeach; ?>
                    ],
                }
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });

    var myDoughnutChart = new Chart(doughnutChart, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [<?= $tercapai ?>, <?= $tidak_tercapai ?>],
                backgroundColor: ['#f3545d', '#fdaf4b', '#1d7af3']
            }],

            labels: [
                'Tercapai',
                'Tidak Tercapai',
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom'
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            }
        }
    });
</script>
<?= $this->endSection(); ?>