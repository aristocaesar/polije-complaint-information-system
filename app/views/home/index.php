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
            <div id="form-pai">
                <!-- FORM PENGADUAN -->
                <form id="form-pengaduan" class="mt-11 mb-5" action="<?= BaseURL() ?>/home/pengaduan" method="POST" enctype="multipart/form-data">
                    <!-- <div class="text-center mb-10">
                        <small id="panduan-pengaduan" class="font-light text-gray-700 hover:cursor-pointer hover:underline" onclick="Panduan(this.id)">Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar</small>
                    </div> -->
                    <div class="flex flex-col mb-5">
                        <label for="judul" class="text-gray-700">Judul Laporan*</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Laporan" required>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="deskripsi" class="text-gray-700">Deskripsikan Laporan*</label>
                        <textarea class="mt-3 border border-gray-400 py-3 px-2 rounded" name="deskripsi" id="deskripsi" placeholder="Deskripsikan Laporan Anda" rows="3" required></textarea>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="kategori" class="text-gray-700">Kategori</label>
                        <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="kategori" id="kategori">
                            <?php foreach ($data["kategori"] as $kategori_pengaduan) : ?>
                                <option value="<?= $kategori_pengaduan["nama"] ?>"><?= $kategori_pengaduan["nama"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="divisi-tujuan" class="text-gray-700">Divisi Tujuan</label>
                        <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="divisi" id="divisi-tujuan">
                            <?php foreach ($data["divisi"] as $divisi_pengaduan) : ?>
                                <option value="<?= $divisi_pengaduan["nama"] ?>"><?= $divisi_pengaduan["nama"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="flex flex-col <?= !isset($_SESSION["user"]) ? "mb-5" : "mb-10" ?>">
                        <label for="input-file" class="text-gray-700">Lampiran</label>
                        <div class="mt-3 border border-gray-400 py-3 px-2 rounded">
                            <div class="flex">
                                <input type="file" name="foto">
                            </div>
                        </div>
                    </div>
                    <?php if (!isset($_SESSION["user"])) : ?>
                        <div class="flex flex-col mb-10">
                            <label for="pelapor" class="text-gray-700">Kirim Sebagai</label>
                            <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" name="pelapor" value="Rahasia" readonly>
                        </div>
                    <?php endif; ?>
                    <input type="text" class="hidden lokasi" value="Akses tidak diberikan" name="lokasi">
                    <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">LAPOR!</button>
                </form>
                <!-- FORM ASPIRASI -->
                <form id="form-aspirasi" class="mt-11 mb-5" action="<?= BaseURL() ?>/home/aspirasi" method="POST" enctype="multipart/form-data">
                    <?php if (isset($_SESSION["user"])) : ?>
                        <!-- <div class="text-center mb-10">
                        <small id="panduan-aspirasi" class="font-light text-gray-700 hover:cursor-pointer hover:underline" onclick="Panduan(this.id)">Perhatikan Cara Menyampaikan Aspirasi Yang Baik dan Benar</small>
                    </div> -->
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
                                <?php foreach ($data["kategori"] as $kategori_aspirasi) : ?>
                                    <option value="<?= $kategori_aspirasi["nama"] ?>"><?= $kategori_aspirasi["nama"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="divisi-tujuan" class="text-gray-700">Divisi Tujuan</label>
                            <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="divisi" id="divisi-tujuan">
                                <?php foreach ($data["divisi"] as $divisi_aspirasi) : ?>
                                    <option value="<?= $divisi_aspirasi["nama"] ?>"><?= $divisi_aspirasi["nama"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="input-file" class="text-gray-700">Lampiran</label>
                            <div class="mt-3 border border-gray-400 py-3 px-2 rounded">
                                <div class="flex">
                                    <input type="file" name="foto">
                                </div>
                            </div>
                        </div>
                        <input type="text" class="hidden lokasi" value="Akses tidak diberikan" name="lokasi">
                        <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">KIRIM ASPIRASI</button>
                    <?php else : ?>
                        <div class="text-center">
                            <p class="mb-2">Harap login terlebih dahulu untuk menyuarakan aspirasi</p>
                            <a href="<?= BaseURL() ?>/auth" class="text-blue-500">Login</a>
                        </div>
                    <?php endif; ?>
                </form>
                <!-- FORM INFORMASI -->
                <form id="form-informasi" class="mt-11 mb-5" action="<?= BaseURL() ?>/home/informasi" method="POST" enctype="multipart/form-data">
                    <?php if (isset($_SESSION["user"])) : ?>
                        <!-- <div class="text-center mb-10">
                        <small id="panduan-aspirasi" class="font-light text-gray-700 hover:cursor-pointer hover:underline" onclick="Panduan(this.id)">Perhatikan Cara Menyampaikan Aspirasi Yang Baik dan Benar</small>
                    </div> -->
                        <div class="flex flex-col mb-5">
                            <label for="judul" class="text-gray-700">Judul Informasi*</label>
                            <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Informasi" required>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="deskripsi" class="text-gray-700">Deskripsikan Informasi*</label>
                            <textarea class="mt-3 border border-gray-400 py-3 px-2 rounded" name="deskripsi" id="deskripsi" placeholder="Ketikkan Deskripsikan Informasi" rows="3" required></textarea>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="kategori" class="text-gray-700">Kategori</label>
                            <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="kategori" id="kategori">
                                <?php foreach ($data["kategori"] as $kategori_informasi) : ?>
                                    <option value="<?= $kategori_informasi["nama"] ?>"><?= $kategori_informasi["nama"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="divisi-tujuan" class="text-gray-700">Divisi Tujuan</label>
                            <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="divisi" id="divisi-tujuan">
                                <?php foreach ($data["divisi"] as $divisi_informasi) : ?>
                                    <option value="<?= $divisi_informasi["nama"] ?>"><?= $divisi_informasi["nama"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="input-file" class="text-gray-700">Lampiran</label>
                            <div class="mt-3 border border-gray-400 py-3 px-2 rounded">
                                <div class="flex">
                                    <input type="file" name="foto">
                                </div>
                            </div>
                        </div>
                        <input type="text" class="hidden lokasi" value="Akses tidak diberikan" name="lokasi">
                        <button type="submit" name="submit" class="text-xl text-white w-full rounded bg-blue-800 py-4 font-bold tracking-wide hover:bg-blue-900 hover:drop-shadow-lg">MINTA INFORMASI</button>
                    <?php else : ?>
                        <div class="text-center">
                            <p class="mb-2">Harap login terlebih dahulu untuk meminta informasi</p>
                            <a href="<?= BaseURL() ?>/auth" class="text-blue-500">Login</a>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</section>`
<?php getWizardLaporan(); ?>
<?php getTrackingLaporan(); ?>
<?php getInformasiLaporan(); ?>
<?php getSupportSosialMedia(); ?>
<!-- Modal Panduan -->
<div id="modal-panduan" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-800 ">
                    Panduan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="ModalClose()">
                    <svg aria-hidden=" true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form id="modal-panduan-content" action="" method="" class="px-10 py-5 text-grey-800">
                <div id="panduan-pengaduan" class="flex flex-col mb-5">
                    <p>Pengaduan</p>
                </div>
                <div id="panduan-aspirasi" class="flex flex-col mb-5">
                    <p>Aspirasi</p>
                </div>
                <div id="panduan-informasi" class="flex flex-col mb-5">
                    <p>Informasi</p>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Modal Panduan
    // function Panduan(id) {
    //     Modal("panduan");
    //     const panduan = $("#modal-panduan-content")[0].children;
    //     for (let i = 0; i < panduan.length; i++) {
    //         if (panduan[i].id == id) {
    //             panduan[i].classList.add("block");
    //             panduan[i].classList.remove("hidden");
    //         } else {
    //             panduan[i].classList.add("hidden");
    //             panduan[i].classList.remove("block");
    //         }
    //     }
    // }

    // KLASIFIKASI MENU
    Klasifikasi($("#btn-select-klasifikasi")[0].children[0]);

    function Klasifikasi(e) {
        const btn = $("#btn-select-klasifikasi");
        const btnAll = btn.children();
        const form = $("#form-pai").children();
        for (let i = 0; i < form.length; i++) {
            if (btnAll[i].id == e.id) {
                btnAll[i].children[0].checked = true;
            } else {
                btnAll[i].children[0].checked = false;
            }
            if (form[i].id.includes(e.id)) {
                $(`#${form[i].id}`).show();
            } else {
                $(`#${form[i].id}`).hide();
            }
        }
    }
</script>
<!-- Footer -->
<?php getFooterCopyright(); ?>