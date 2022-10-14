<?php getNavbarHome(); ?>
<!-- Form -->
<section id="form-lapor" class="mt-[-180px]">
    <div class="flex justify-center">
        <div class="bg-white w-[900px] drop-shadow-xl">
            <div class="container">
                <div class="flex text-blue-800 font-bold justify-center my-11">
                    <i data-feather="message-circle" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                    <h5 class="text-3xl"> Sampaikan Laporan Anda</h5>
                </div>
                <div>
                    <label for="klafisikasi" class="text-gray-700">Pilih Klafisikasi Laporan</label>
                    <div id="klafisikasi" class="flex mt-3 gap-x-4">
                        <button type="button" id="pengaduan" class="text-white w-full rounded bg-blue-800 p-3 hover:bg-blue-900 hover:drop-shadow-lg" onclick="klafisikasiLaporan(this)"><input type="radio" name="pengaduan" class="mr-3">Pengaduan</button>
                        <button type="button" id="aspirasi" class="text-white w-full rounded bg-blue-800 p-3 hover:bg-blue-900 hover:drop-shadow-lg" onclick="klafisikasiLaporan(this)"><input type="radio" name="aspirasi" class="mr-3">Aspirasi</button>
                        <button type="button" id="informasi" class="text-white w-full rounded bg-blue-800 p-3 hover:bg-blue-900 hover:drop-shadow-lg" onclick="klafisikasiLaporan(this)"><input type="radio" name="informasi" class="mr-3">Informasi</button>
                    </div>
                </div>
                <div class="text-center mt-10">
                    <small id="panduan-klafisikasi" class="font-light text-gray-700 hover:cursor-pointer hover:underline">Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar</small>
                </div>
                <div>
                    <form id="form-pengaduan" class="my-11" action="" method="POST">
                        <div class="flex flex-col mb-5">
                            <label for="judul" class="text-gray-700">Judul Laporan Anda*</label>
                            <input type="text" class="mt-3 border border-gray-400 py-2 px-2 rounded" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Laporan" required>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="deskripsi" class="text-gray-700">Deskripsikan Laporan Anda*</label>
                            <textarea class="mt-3 border border-gray-400 py-2 px-2 rounded" name="deskripsi" id="deskripsi" placeholder="Deskripsikan Laporan Anda" rows="3" required></textarea>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="kategori" class="text-gray-700">Kategori</label>
                            <select class="mt-3 border border-gray-400 py-2 px-2 rounded" name="kategori" id="kategori">
                                <option value="umum">Umum</option>
                                <option value="infrastruktur">Infrastruktur</option>
                                <option value="keamanan">Keamanan</option>
                                <option value="kebersihan">Kebersihan</option>
                                <option value="jaringan-public">Jaringan Publik</option>
                                <option value="pelayanan-public">Pelayanan Publik</option>
                            </select>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="pelapor" class="text-gray-700">Kirim Sebagai</label>
                            <select class="mt-3 border border-gray-400 py-2 px-2 rounded" name="pelapor" id="pelapor">
                                <option value="rahasia">Rahasia</option>
                                <option value="masyarakat-umum">Masyarakat Umum</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                                <option value="staf-kampus">Staf Kampus</option>
                            </select>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="kontak" class="text-gray-700">No Telp / Whatapps / Email*</label>
                            <input type="text" class="mt-3 border border-gray-400 py-2 px-2 rounded" name="kontak" id="kontak" aria-describedby="kontak" placeholder="Ketikkan No Telp / Whatapps / Email" required>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="divisi-tujuan" class="text-gray-700">Divisi Tujuan</label>
                            <select class="mt-3 border border-gray-400 py-2 px-2 rounded" name="divisi" id="divisi-tujuan">
                                <option>Dosen</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="flex flex-col mb-10">
                            <label for="input-file" class="text-gray-700">Lampiran</label>
                            <div class="mt-3 border border-gray-400 py-2 px-2 rounded">
                                <div class="flex">
                                    <input type="file" name="lampiran">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="text-white w-full rounded bg-blue-800 p-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">LAPOR!</button>
                    </form>

                    <!-- <form id="form-informasi" action="" method="POST">
                        <div class="form-group">
                            <label for="judul">Judul Informasi*</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Laporan" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsikan Informasi*</label>
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
                            <label for="pelapor">Kirim Sebagai</label>
                            <select class="form-control" name="pelapor" id="pelapor">
                                <option value="rahasia">Rahasia</option>
                                <option value="masyarakat-umum">Masyarakat Umum</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                                <option value="staf-kampus">Staf Kampus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kontak">No Telp / Whatapps / Email*</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" aria-describedby="kontak" placeholder="Ketikkan No Telp / Whatapps / Email" required>
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
                        <button type="submit" name="submit" class="btn btn-blue p-3 mr-3 font-weight-bold">DAPATKAN INFORMASI!</button>
                    </form> -->

                    <!-- <form id="form-aspirasi" action="" method="POST">
                        <div class="form-group">
                            <label for="judul">Judul Aspirasi Anda*</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Aspirasi" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsikan Aspirasi Anda*</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsikan Aspirasi Anda" rows="3" required></textarea>
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
                            <label for="pelapor">Kirim Sebagai</label>
                            <select class="form-control" name="pelapor" id="pelapor">
                                <option value="rahasia">Rahasia</option>
                                <option value="masyarakat-umum">Masyarakat Umum</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                                <option value="staf-kampus">Staf Kampus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kontak">No Telp / Whatapps / Email*</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" aria-describedby="kontak" placeholder="Ketikkan No Telp / Whatapps / Email" required </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Lampiran</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-blue p-3 mr-3 font-weight-bold">KIRIM ASPIRASI!</button>
                    </form> -->
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