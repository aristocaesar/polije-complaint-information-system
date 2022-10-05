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
            <div class="col-lg-9 col-12">
                <div class="card shadow border-0 p-5" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center"><i data-feather="log-in" style="width:35px;height: 35px;left: 140px;top: 17px;"></i> Daftar</h5>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="namaLengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="namaLengkap" aria-describedby="namaLengkap" name="namaLengkap" placeholder="Ketikkan Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" aria-describedby="email" name="email" placeholder="Ketikkan Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="Password" placeholder="Ketikkan Password" required>
                            </div>
                            <div class="form-group">
                                <label for="konfirmasiPassword">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="konfirmasiPassword" id="konfirmasiPassword" aria-describedby="konfirmasiPassword" placeholder="Ketikkan Password" required>
                            </div>
                            <div class="form-group">
                                <label for="no-telp">No Telp</label>
                                <input type="text" class="form-control" name="notelp" id="no-telp" aria-describedby="no-telp" placeholder="Ketikkan No Hp">
                            </div>
                            <div class="form-group">
                                <label for="divisi-tujuan">Status</label>
                                <select class="form-control" name="divisi" id="divisi-tujuan">
                                    <option>Dosen</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-blue p-3 mr-3 font-weight-bold">DAFTAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php getFooterCopyright(); ?>