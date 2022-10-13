<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Form -->
<section class="form-lapor">
    <div class="container d-flex flex-column align-items-center">
        <h1>Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="text-white h5 mt-5">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
    </div>
    <hr>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-12">
                <div id="card-menu-user" class="card shadow border-0 p-5" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-new-blue font-weight-bold h3 mb-5"><i data-feather="users" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i> User Area</h5>
                        <div id="user-menu" class="d-flex">
                            <button type="button" id="laporan" onclick="userMenuSelected(this)" class="btn btn-white p-3 mr-3 font-weight-bold"><i data-feather="edit-3" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>Laporan</button>
                            <button type="button" id="pengaturan" onclick="userMenuSelected(this)" class="btn btn-white p-3 mr-3 font-weight-bold"><i data-feather="settings" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i> Akun</button>
                            <button type="button" id="keluar" class="btn btn-white p-3 mr-3 font-weight-bold" data-toggle="modal" data-target="#logoutModal"><i data-feather="log-in" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i> Keluar</button>
                        </div>
                        <div id="btn-create-new-laporan" class="my-5 text-center">
                            <a href="<?= BaseURL(); ?>" class="text-new-blue">Buat Laporan Baru</a>
                        </div>
                        <div class="card-content">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div id="card-user-laporan">
                                        <div class="d-flex align-items-center border px-3 py-4 mb-4">
                                            <div>
                                                <h6 class="font-weight-bold text-dark">UKT saya tinggi</h6>
                                                <h6 class="text-muted font-weight-light">Labore consequat commodo dolor dolore sit excepteur culpa. Aliquip ad ad ut labore nostrud Lorem in tempor in ut reprehenderit. Pariatur occaecat magna mollit sunt duis aute cillum aliqua consectetur.</h6>
                                                <div>
                                                    <small>Senin, 26 September 2022 - 16:03:01 -</small>
                                                    <small class="text-new-blue">Proses Tindak Lanjut</small>
                                                </div>
                                            </div>
                                            <div>
                                                <i data-feather="more-vertical" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="card-user-setting">
                                        <div class="d-flex flex-column">
                                            <div class="mt-5">
                                                <h5 class="text-new-blue font-weight-bold">Email</h5>
                                                <p class="text-dark">hi@aristoc.space - <span class="text-success font-italic">Terverifikasi</span> <a href="#" class="ml-2 text-new-blue underline"><u>Ganti Email</u></a></p>
                                            </div>
                                            <div class="mt-3">
                                                <h5 class="text-new-blue font-weight-bold">Password</h5>
                                                <p class="text-dark">Terakhir diperbarui - Senin, 26 September 2022 - 16:26:09<a href="#" class="ml-2 text-new-blue underline"><u>Ganti Password</u></a></p>
                                            </div>
                                            <div class="mt-3">
                                                <h5 class="text-new-blue font-weight-bold">Verifikasi</h5>
                                                <p class="text-dark">Akun belum terverifikasi <a href="#" class="ml-2 text-new-blue underline"><u>Verifikasi Sekarang</u></a></p>
                                            </div>
                                            <div class="mt-3">
                                                <h5 class="text-new-blue font-weight-bold">Aktifitas Terakhir</h5>
                                                <p class="text-dark">Senin, 26 September 2022 - 16:29:25</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Modal Logout -->
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Konfirmasi Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah kamu ingin keluar ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-blue font-weight-bold py-3">Ya, Keluar</button>
            </div>
        </div>
    </div>
</div>
<?php getFooterCopyright(); ?>