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
                        <h5 class="card-title text-center"><i data-feather="message-circle" style="width:35px;height: 35px;left: 140px;top: 17px;"></i> Sampaikan Laporan Anda</h5>
                        <form action="" method="POST">
                            <div class="form-group">
                                <div class="klafisikasi d-flex flex-column">
                                    <label for="klafisikasi">Pilih Klafisikasi Laporan</label>
                                    <div class="klafisikasi-items d-flex flex-row justify-content-between">
                                        <button type="button" id="pengaduan" class="btn btn-blue p-3 mr-3" onclick="klafisikasiLaporan(this)"><input type="radio" name="pengaduan" class="mr-3">Pengaduan</button>
                                        <button type="button" id="aspirasi" class="btn btn-blue p-3 mr-3" onclick="klafisikasiLaporan(this)"><input type="radio" name="aspirasi" class="mr-3">Aspirasi</button>
                                        <button type="button" id="informasi" class="btn btn-blue p-3 mr-3" onclick="klafisikasiLaporan(this)"><input type="radio" name="informasi" class="mr-3">Informasi</button>
                                    </div>
                                </div>
                            </div>
                            <div class=" form-group text-center my-4">
                                <small id="panduan-klafisikasi" class="text-dark" data-toggle="modal" data-target="#modalPanduan">Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar</small>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Laporan Anda*</label>
                                <input type="text" class="form-control" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Laporan" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsikan Laporan Anda*</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsikan Laporan Anda" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option value="umum">Umum</option>
                                    <option value="infrastruktur">Infrastruktur</option>
                                    <option value="keamanan">Keamanan</option>
                                    <option value="kebersihan">Kebersihan</option>
                                    <option value="jaringan-public">Jaringan Publik</option>
                                    <option value="pelayanan-public">Pelayanan Publik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pelapor">Pelapor</label>
                                <select class="form-control" name="pelapor" id="pelapor">
                                    <option value="rahasia">Rahasia</option>
                                    <option value="masyarakat-umum">Masyarakat Umum</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="dosen">Dosen</option>
                                    <option value="staf-kampus">Staf Kampus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no-telp">No Telp</label>
                                <input type="text" class="form-control" name="notelp" id="no-telp" aria-describedby="no-telp" placeholder="Ketikkan No Hp">
                            </div>
                            <div class="form-group">
                                <label for="divisi-tujuan">Divisi Tujuan</label>
                                <select class="form-control" name="divisi" id="divisi-tujuan">
                                    <option>Dosen</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Lampiran</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-blue p-3 mr-3 font-weight-bold">LAPOR!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php getWizardLaporan(); ?>
<?php getTrackingLaporan(); ?>
<?php getInformasiLaporan(); ?>
<?php getSupportSosialMedia(); ?>
<!-- Modal Panduan -->
<!-- Modal -->
<div class="modal fade" id="modalPanduan" tabindex="-1" role="dialog" aria-labelledby="modalPengaduan" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modalPengaduan">Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                When modals become too long for the user’s viewport or device, they scroll independent of the page itself. Try the demo below to see what we mean.
            </div>
        </div>
    </div>
</div>
<?php getFooterCopyright(); ?>