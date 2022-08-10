<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">>
                    <?php if (session()->get("pas_foto") !== "default.jpg") : ?>
                        <img src="<?= base_url("uploads/pas_foto/" . session()->get("pas_foto")) ?>" alt="image profile" class="avatar-img rounded-circle">
                    <?php else : ?>
                        <img src="<?= base_url("uploads/pas_foto/default.jpg") ?>" alt="image profile" class="avatar-img rounded-circle">
                    <?php endif; ?>
                </div>
                <div class="info">
                    <a data-toggle="collapse">
                        <span>
                            <?= session()->get("nama_lengkap"); ?>
                            <span class="user-level">
                                <?php if (session()->get("role") == 1) : ?>
                                    <span class="badge badge-success">Penilai</span>
                                <?php else : ?>
                                    <span class="badge badge-warning">Karyawan</span>
                                <?php endif; ?>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="<?= base_url("/penilai"); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php if (session()->get("role") == 1) : ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Master Data</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("penilai/kelola-pegawai"); ?>">
                            <i class="fas fa-users"></i>
                            <p>Data Karwayan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("penilai/kelola-bagian"); ?>">
                            <i class="fas fa-tasks"></i>
                            <p>Data Tugas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("penilai/kelola-penilaian"); ?>">
                            <i class="fas fa-file-alt"></i>
                            <p>Input Penilaian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("penilai/kelola-kehadiran"); ?>">
                            <i class="fas fa-fingerprint"></i>
                            <p>Data Kehadiran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("penilai/kelola-permohonan-izin"); ?>">
                            <i class="fas fa-file-medical-alt"></i>
                            <p>Data Izin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("penilai/kelola-permohonan-cuti"); ?>">
                            <i class="fas fa-file"></i>
                            <p>Data Cuti</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("penilai/kelola-informasi"); ?>">
                            <i class="fas fa-info-circle"></i>
                            <p>Data Informasi</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (session()->get("role") == 0) : ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Menu</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("pegawai/list-tugas"); ?>">
                            <i class="fas fa-file"></i>
                            <p>Lihat List Tugas</p>
                            <span class="badge badge-success" id="totalTugas">
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("pegawai/lihat-penilaian"); ?>">
                            <i class="fas fa-file-alt"></i>
                            <p>Lihat Nilai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("pegawai/absensi"); ?>">
                            <i class="fas fa-fingerprint"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("pegawai/permohonan-cuti"); ?>">
                            <i class="fas fa-file"></i>
                            <p>Permohonan Cuti</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("pegawai/permohonan-izin"); ?>">
                            <i class="fas fa-file-medical-alt"></i>
                            <p>Permohonan Izin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("pegawai/informasi"); ?>">
                            <i class="fas fa-newspaper"></i>
                            <p>Pusat Informasi</p>
                            <span class="badge badge-success" id="totalInformasi">
                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pengaturan Akun</h4>
                </li>
                <?php if (session()->get("role") == 1) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url("penilai/profile"); ?>">
                            <i class="fas fa-user-cog"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= base_url("pegawai/profile"); ?>">
                            <i class="fas fa-user-cog"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>