<div class="main-wrapper">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">

            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="https://media-exp1.licdn.com/dms/image/C5603AQED8L0BQbsIdw/profile-displayphoto-shrink_200_200/0/1654088905112?e=2147483647&v=beta&t=l683DweslHzwVt376iZoViKr9i9uG0GzhcDREE6eAHg" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hallo, Aristo Caesar Pratama</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?= BaseURL() ?>/admin/profil" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profil
                    </a>
                    <a href="<?= BaseURL() ?>/admin/profil/aktifitas" class="dropdown-item has-icon">
                        <i class="fas fa-bolt"></i> Aktifitas
                    </a>
                    <a href="<?= BaseURL() ?>/admin/profil/pengaturan" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Pengaturan
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= BaseURL() ?>/admin/logout" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </a>
                </div>
            </li>
        </ul>
    </nav>