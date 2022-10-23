<?php getNavbarHome(); ?>
<!-- Form -->
<section id="form-lapor" class="mt-[-570px] lg:mt-[-550px]">
    <div class="container flex flex-col items-center text-center text-white max-w-[950px] mt-36">
        <h1 class="md:text-4xl text-3xl font-bold tracking-wide">Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="md:text-xl text-lg mt-8 font-light">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
        <hr class="w-[200px] my-[50px] border-t-4 ">
    </div>
    <div class="container drop-shadow-xl max-w-5xl">
        <div class="bg-white py-11 px-10">
            <div class="flex text-blue-800 font-bold justify-center mb-11">
                <i data-feather="message-circle" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                <h5 class="md:text-3xl text-xl"> Sampaikan Laporan Anda</h5>
            </div>
            <div>
                <label class="text-gray-700">Pilih Klafisikasi Laporan</label>
                <div class="block lg:hidden">
                    <div class="flex flex-col mb-5">
                        <select class="mt-3 bg-blue-800 text-white  py-4 px-2 rounded" name="pelapor" id="pelapor">
                            <option value="pengaduan">Pengaduan</option>
                            <option value="aspirasi">Aspirasi</option>
                            <option value="informasi">Informasi</option>
                        </select>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div id="btn-select-klasifikasi" class="flex md:flex-row flex-col gap-y-3 mt-3 gap-x-4 ">
                        <button type="button" id="pengaduan" class="text-white w-full rounded bg-blue-800 p-4 hover:bg-blue-900 hover:drop-shadow-lg" onclick="Klasifikasi(this)"><input type="radio" name="pengaduan" class="mr-3">Pengaduan</button>
                        <button type="button" id="aspirasi" class="text-white w-full rounded bg-blue-800 p-4 hover:bg-blue-900 hover:drop-shadow-lg" onclick="Klasifikasi(this)"><input type="radio" name="aspirasi" class="mr-3">Aspirasi</button>
                        <button type="button" id="informasi" class="text-white w-full rounded bg-blue-800 p-4 hover:bg-blue-900 hover:drop-shadow-lg" onclick="Klasifikasi(this)"><input type="radio" name="informasi" class="mr-3">Informasi</button>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10">
                <small id="panduan-klafisikasi" class="font-light text-gray-700 hover:cursor-pointer hover:underline">Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar</small>
            </div>
            <div id="form-pai">
                <!-- FORM PENGADUAN -->
                <form id="form-pengaduan" class="my-11" action="" method="POST">
                    <div class="flex flex-col mb-5">
                        <label for="judul" class="text-gray-700">Judul Laporan Anda*</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Laporan" required>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="deskripsi" class="text-gray-700">Deskripsikan Laporan Anda*</label>
                        <textarea class="mt-3 border border-gray-400 py-3 px-2 rounded" name="deskripsi" id="deskripsi" placeholder="Deskripsikan Laporan Anda" rows="3" required></textarea>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="kategori" class="text-gray-700">Kategori</label>
                        <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="kategori" id="kategori">
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
                        <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="pelapor" id="pelapor">
                            <option value="rahasia">Rahasia</option>
                            <option value="masyarakat-umum">Masyarakat Umum</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="staf-kampus">Staf Kampus</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="kontak" class="text-gray-700">No Telp / Whatapps / Email*</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" name="kontak" id="kontak" aria-describedby="kontak" placeholder="Ketikkan No Telp / Whatapps / Email" required>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="divisi-tujuan" class="text-gray-700">Divisi Tujuan</label>
                        <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="divisi" id="divisi-tujuan">
                            <option>Dosen</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-10">
                        <label for="input-file" class="text-gray-700">Lampiran</label>
                        <div class="mt-3 border border-gray-400 py-3 px-2 rounded">
                            <div class="flex">
                                <input type="file" name="lampiran">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">LAPOR!</button>
                </form>
                <!-- FORM ASPIRASI -->
                <form id="form-aspirasi" class="my-11" action="" method="POST">
                    <div class="flex flex-col mb-5">
                        <label for="judul" class="text-gray-700">Judul Aspirasi Anda*</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Aspirasi" required>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="deskripsi" class="text-gray-700">Deskripsikan Aspirasi Anda*</label>
                        <textarea class="mt-3 border border-gray-400 py-3 px-2 rounded" name="deskripsi" id="deskripsi" placeholder="Deskripsikan Aspirasi Anda" rows="3" required></textarea>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="kategori" class="text-gray-700">Kategori</label>
                        <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="kategori" id="kategori">
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
                        <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="pelapor" id="pelapor">
                            <option value="rahasia">Rahasia</option>
                            <option value="masyarakat-umum">Masyarakat Umum</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="staf-kampus">Staf Kampus</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="kontak" class="text-gray-700">No Telp / Whatapps / Email*</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" name="kontak" id="kontak" aria-describedby="kontak" placeholder="Ketikkan No Telp / Whatapps / Email" required>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="divisi-tujuan" class="text-gray-700">Divisi Tujuan</label>
                        <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="divisi" id="divisi-tujuan">
                            <option>Dosen</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-10">
                        <label for="input-file" class="text-gray-700">Lampiran</label>
                        <div class="mt-3 border border-gray-400 py-3 px-2 rounded">
                            <div class="flex">
                                <input type="file" name="lampiran">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">KIRIM ASPIRASI</button>
                </form>
                <!-- FORM INFORMASI -->
                <form id="form-informasi" class="my-11" action="" method="POST">
                    <div class="flex flex-col mb-5">
                        <label for="judul" class="text-gray-700">Judul Aspirasi Anda*</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Aspirasi" required>
                    </div>
                    <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">MINTA INFORMASI</button>
                </form>
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
<!-- <div class="modal fade" id="modalPanduan" tabindex="-1" role="dialog" aria-labelledby="modalPengaduan" aria-hidden="true">
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
</div> -->
<!-- Footer -->
<?php getFooterCopyright(); ?>