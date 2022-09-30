<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Form -->
<section class="form-lapor container d-flex flex-column align-items-center">
    <h1>Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
    <p>Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
    <hr>
    <div class="card container shadow border-0 p-5" style="width: 48rem;">
        <div class="card-body">
            <h5 class="card-title text-center"><i data-feather="message-circle" style="width:35px;height: 35px;left: 140px;top: 17px;"></i> Sampaikan Laporan Anda</h5>
            <form action="">
                <div class="form-group">
                    <div class="d-flex flex-column">
                        <label for="exampleFormControlInput1">Pilih Klafisikasi Laporan</label>
                        <div class="d-flex flex-row justify-content-between">
                            <button type="button" class="btn btn-blue p-3 mr-3"><input type="radio" name="" class="mr-3">Pengaduan</button>
                            <button type="button" class="btn btn-blue p-3 mr-3"><input type="radio" name="" class="mr-3">Aspirasi</button>
                            <button type="button" class="btn btn-blue p-3 mr-3"><input type="radio" name="" class="mr-3">Informasi</button>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center my-4">
                    <small class="text-dark">Perhatikan Cara Menyampaikan Pengduan Yang Baik dan Benar </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Laporan Anda*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ketikkan Judul Laporan">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsikan Laporan Anda*</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Deskripsikan Laporan Anda" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kategori</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Umum</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pelapor</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Mahasiswa</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No Telp</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ketikkan Judul Laporan">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Divisi Tujuan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
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
                <button type="submit" class="btn btn-blue p-3 mr-3 font-weight-bold">LAPOR!</button>
            </form>
        </div>
    </div>
</section>
<!-- Wizard Process Pelaporan -->
<section id="wizard-prosess" class="wizard-prosess">
    <div class="container d-flex flex-row text-center">
        <div class="card m-2 border-0">
            <div class="card-body">
                <div class="rounded-circle text-white"><i data-feather="edit-3" class="bg-blue rounded-circle p-3 mb-4" style="width:60px;height: 60px;left: 140px;top: 17px;"></i></div>
                <h5 class="card-title text-dark font-weight-bold">Tulis Laporan</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card m-2 border-0">
            <div class="card-body">
                <div class="rounded-circle text-white"><i data-feather="shuffle" class="bg-blue rounded-circle p-3 mb-4" style="width:60px;height: 60px;left: 140px;top: 17px;"></i></div>
                <h5 class="card-title text-dark font-weight-bold">Proses Verifikasi</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card m-2 border-0">
            <div class="card-body">
                <div class="rounded-circle text-white"><i data-feather="zap" class="bg-blue rounded-circle p-3 mb-4" style="width:60px;height: 60px;left: 140px;top: 17px;"></i></div>
                <h5 class="card-title text-dark font-weight-bold">Tindak Lanjut</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card m-2 border-0">
            <div class="card-body">
                <div class="rounded-circle text-white"><i data-feather="check" class="bg-blue rounded-circle p-3 mb-4" style="width:60px;height: 60px;left: 140px;top: 17px;"></i></div>
                <h5 class="card-title text-dark font-weight-bold">Selesai</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</section>
<!-- Tracking Laporan -->
<section id="tracking-laporan" class="tracking-laporan bg-blue">
    <div class="container text-center d-flex flex-column align-items-center">
        <h5 class="h3 font-weight-bold text-white">Tracking Laporan</h5>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ketikkan Judul Laporan">
    </div>
</section>