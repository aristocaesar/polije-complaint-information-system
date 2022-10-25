<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#"><img src="<?= BaseUrl() ?>/public/images/logo-horizontal-politeknik-negeri-jember.png" width="130" alt="logo politeknik negeri jember" /></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"><img src="<?= BaseUrl() ?>/public/images/logo-politeknik-negeri-jember.png" width="30" alt="logo politeknik negeri jember" /></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= BaseURL() ?>/admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Klafisikasi</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i><span>Pengaduan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/pengaduan?data=masuk">Masuk</a></li>
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/pengaduan?data=proses">Proses</a></li>
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/pengaduan?data=selesai">Selesai</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-paper-plane"></i><span>Aspirasi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/aspirasi?data=masuk">Masuk</a></li>
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/aspirasi?data=proses">Proses</a></li>
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/aspirasi?data=selesai">Selesai</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-info"></i><span>Infromasi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/informasi?data=masuk">Masuk</a></li>
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/informasi?data=selesai">Selesai</a></li>
                </ul>
            </li>
            <li class="menu-header">Pelayanan</li>
            <li><a class="nav-link" href="<?= BaseURL() ?>/admin/kategori"><i class="fas fa-list"></i> <span>Kategori</span></a></li>
            <li><a class="nav-link" href="<?= BaseURL() ?>/admin/divisi"><i class="fas fa-sitemap"></i> <span>Divisi</span></a></li>
            <li class="menu-header">users</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/pengguna">Master</a></li>
                    <li><a class="nav-link" href="<?= BaseURL() ?>/admin/pengguna/verifikasi">Verifikasi</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="<?= BaseURL() ?>/admin/petugas"><i class="fas fa-user-nurse"></i> <span>Petugas</span></a></li>
        </ul>
    </aside>
</div>