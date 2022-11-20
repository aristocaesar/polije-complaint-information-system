<section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-12 col-12 order-lg-1 min-vh-100 order-2 bg-white">
            <div class="p-4 m-3">
                <img src="<?= BaseURL() ?>/public/images/logo-politeknik-negeri-jember.png" alt="logo" width="80" class="mb-5 mt-2">
                <h4 class="text-dark font-weight-bold">Layanan Pengaduan dan Aspirasi Online Politeknik Negeri Jember</h4>
                <p class="text-muted">Sebelum memulai, Anda harus login terlebih dahulu.</p>
                <form method="POST" action="<?= BaseURL() ?>/admin/login" class="needs-validation" novalidate="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1" placeholder="Ketikkan Email" required autofocus>
                        <div class="invalid-feedback">
                            Ketikkan Email
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Ketikkan Password" required>
                        <div class="invalid-feedback">
                            Ketikkan Password
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg w-100" tabindex="4">
                            Login
                        </button>
                    </div>
                    <div class="text-center mt-5 text-small">
                        2022 &copy; Layanan Pengaduan dan Aspirasi Politeknik Negeri Jember . Powerd By DKODE Creative
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= BaseURL() ?>/public/images/bg-politeknik-negeri-jember.png">
            <div class="absolute-bottom-left index-2">
                <div class="text-light p-5">
                    <div class="">
                        <h1 class="mb-2 display-4 font-weight-bold">Selamat Pagi</h1>
                        <h5 class="font-weight-normal text-muted-transparent">Jember, Indonesia</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>