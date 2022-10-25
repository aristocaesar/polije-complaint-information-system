<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Modal Ganti Email / Password -->
<div class="modal fade" tabindex="-1" role="dialog" id="email-password">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ganti Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-email">
                <form action="" method="post" class="needs-validation" novalidate="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Ketikkan Email" required="">
                            <div class="invalid-feedback">
                                Harap Ketikkan Email
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Ketikkan Email" required="">
                            <div class="invalid-feedback">
                                Harap Ketikkan Email
                            </div>
                        </div>
                        <div class="form-group">`
                            <label>Perhatikan</label>
                            <ul style="margin-left: -15px;">
                                <li>Email Harus Aktif</li>
                                <li>Jika link verifikasi tidak tersedia, harap cek pada bagian spam.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <div class="form-password">
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="password" class="form-control" placeholder="Ketikkan Password" required="">
                            <div class="invalid-feedback">
                                Harap Ketikkan Password
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="text" name="password2" class="form-control" placeholder="Ketikkan Password" required="">
                            <div class="invalid-feedback">
                                Harap Ketikkan Password
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengaturan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="card-body">
                            <h4>Email</h4>
                            <p>Segala informasi yang terkait akan diteruskan ke email yang sudah terdaftar</p>
                            <button type="button" id="email" class="btn btn-link p-0 card-cta" data-toggle="modal" data-target="#email-password" onclick="EmailPassword(this.id)">Ganti Email</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="card-body">
                            <h4>Password</h4>
                            <p>Password kunci dari keamanan akun, password terenkripsi dengan baik didatabase.</p>
                            <button type="button" id="password" class="btn btn-link p-0 card-cta" data-toggle="modal" data-target="#email-password" onclick="EmailPassword(this.id)">Ganti Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function EmailPassword(id) {
        if (id == "email") {
            $(".modal-title").text("Ganti Email");
            $(".form-email").show();
            $(".form-password").hide();
        } else {
            $(".modal-title").text("Ganti Password");
            $(".form-email").hide();
            $(".form-password").show();
        }
    }
</script>
<?php getFooterDashboard(); ?>