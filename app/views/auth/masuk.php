<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Form -->
<section class="form-lapor ">
    <div class="container d-flex flex-column align-items-center">
        <h1>Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p>Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
    </div>
    <hr>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-md-6 col-12">
                <div class="card shadow border-0 p-5" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center"><i data-feather="log-in" style="width:35px;height: 35px;left: 140px;top: 17px;"></i> Masuk</h5>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="emiail" aria-describedby="email" name="email" placeholder="Ketikkan Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="Password" placeholder="Ketikkan Password" required>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <a href="<?= BaseURL() ?>/auth/recovery" class="text-new-blue">Lupa Password ?</a>
                            </div>
                            <button type="submit" name="submit" class="btn btn-blue p-3 mr-3 font-weight-bold">MASUK</button>
                            <div class="form-group mt-5">
                                Belum Punya Akun ? <a href="<?= BaseURL() ?>/auth/daftar" class="text-new-blue">Daftar Disini.</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php getFooterCopyright(); ?>