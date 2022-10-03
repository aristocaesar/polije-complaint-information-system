<nav class="navbar navbar-expand-lg fixed-top transition-ease-in-out">
    <div class="container d-flex justify-content-between">
        <div class="d-flex flex-row align-self-center">
            <a class="navbar-brand" href="#">
                <img src="<?= BaseURL(); ?>/public/images/logo-politeknik-negeri-jember.png" width="80" alt="logo-politeknik-negeri-jember">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mr-4">
                        <a class="nav-link text-white" href="<?= BaseURL(); ?>">Home</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link text-white" href="<?= BaseURL(); ?>/laporan">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= BaseURL(); ?>/tentang">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex btn-auth flex-row">
            <a href="<?= BaseURL() ?>/auth" class="btn
             text-white mr-4">Masuk</a>
            <a href="<?= BaseURL() ?>/auth/daftar" class="btn btn-white-outline px-4">Daftar</a>
        </div>
    </div>
</nav>