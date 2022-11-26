<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
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
                <i data-feather="users" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                <h5 class="md:text-3xl text-xl"> User Area</h5>
            </div>
            <div class="mt-16">
                <!-- Menu Control -->
                <div id="user-menu" class="grid grid-cols-3 gap-x-5">
                    <button type="button" id="laporan" onclick="userFormSelect(this.id)" class="py-4 text-xl font-bold text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-lg flex items-center justify-center"><i data-feather="edit-3" style="width:35px;height: 35px;left: 140px;top: 17px;" class="md:pr-3"></i> <span class="hidden md:block">LAPORAN</span></button>
                    <button type="button" id="pengaturan" onclick="userFormSelect(this.id)" class="py-4 text-xl font-bold text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-lg flex items-center justify-center"><i data-feather="settings" style="width:35px;height: 35px;left: 140px;top: 17px;" class="md:pr-3"></i> <span class="hidden md:block">AKUN</span></button>
                    <button type="button" id="keluar" onclick="Modal(this.id)" class="py-4 text-xl font-bold text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-lg flex items-center justify-center"><i data-feather="log-in" style="width:35px;height: 35px;left: 140px;top: 17px;" class="md:pr-3"></i> <span class="hidden md:block">KELUAR</span></button>
                </div>
                <div id="user-form-content">
                    <!-- Laporan -->
                    <div id="content-user-laporan" class="grid grid-cols-1 gap-y-5">
                        <!-- Laporan Control -->
                        <div class="flex md:flex-row flex-col-reverse justify-between items-center my-11">
                            <div class="flex justify-center md:mt-0 mt-5">
                                <div class="flex flex-row items-center text-center">
                                    <h5 class="text-base font-bold text-gray-800 mr-3">Klasifikasi</h5>
                                    <select class="border border-gray-400 rounded" onchange="changeFormLaporan(this)">
                                        <option value="pengaduan">Pengaduan</option>
                                        <option value="aspirasi">Aspirasi</option>
                                        <option value="informasi">Informasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="<?= BaseURL(); ?>" class="text-blue-800 hover:text-blue-900 hover:underline">Buat Laporan Baru</a>
                            </div>
                        </div>
                        <!-- Laporan - Pengaduan -->
                        <div id="form-laporan-pengaduan" class="flex flex-col">
                            <h5 class="text-blue-800 font-bold text-xl mb-8">Pengaduan</h5>
                            <?php if (!empty($data["pengaduan"])) : ?>
                                <?php foreach ($data["pengaduan"] as $pengaduan) : ?>
                                    <div class="flex flex-col md:flex-row border py-5 px-5 items-center justify-between mb-5">
                                        <div>
                                            <h6 class="font-bold text-gray-800 mb-3"><?= $pengaduan["judul"] ?></h6>
                                            <?php
                                            $deskripsi_adu = strlen($pengaduan["deskripsi"]) > 100 ? substr($pengaduan["deskripsi"], 0, 150) . "..." : $pengaduan["deskripsi"];
                                            ?>
                                            <h6 class="text-gray-500 font-light"><?= $deskripsi_adu; ?></h6>
                                            <div>
                                                <small class="text-gray-800"><?= $pengaduan["created_at"] ?></small>
                                                <?php
                                                $status = "";
                                                $sts = $pengaduan["status"];
                                                if ($sts == "ditangguhkan") {
                                                    $status = "text-red-500";
                                                } elseif ($sts == "belum_ditanggapi") {
                                                    $status = "text-yellow-500";
                                                } elseif ($sts == "proses") {
                                                    $status = "text-blue-800";
                                                } elseif ($sts == "selesai") {
                                                    $status = "text-green-500";
                                                }
                                                ?>
                                                <small class="<?= $status ?>"><?= ucwords(str_replace("_", " ", $pengaduan["status"])); ?></small>
                                            </div>
                                        </div>
                                        <div class="m-5" id="<?= $pengaduan["id"] ?>" onclick="getLaporan(this.id)">
                                            <i data-feather="more-vertical" class="cursor-pointer hidden md:block" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                                            <i data-feather="more-horizontal" class="cursor-pointer block md:hidden" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="flex flex-col md:flex-row border py-5 px-5 items-center">
                                    <div>
                                        <h6 class="text-gray-800">Tidak Ada Pengaduan</h6>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- Laporan - Aspirasi -->
                        <div id="form-laporan-aspirasi" class="flex flex-col">
                            <h5 class="text-blue-800 font-bold text-xl mb-8">Aspirasi</h5>
                            <?php if (!empty($data["aspirasi"])) : ?>
                                <?php foreach ($data["aspirasi"] as $aspirasi) : ?>
                                    <div class="flex flex-col md:flex-row border py-5 px-5 items-center justify-between mb-5">
                                        <div>
                                            <h6 class="font-bold text-gray-800 mb-3"><?= $aspirasi["judul"] ?></h6>
                                            <?php
                                            $deskripsi_aspi = strlen($aspirasi["deskripsi"]) > 100 ? substr($aspirasi["deskripsi"], 0, 150) . "..." : $aspirasi["deskripsi"];
                                            ?>
                                            <h6 class="text-gray-500 font-light"><?= $deskripsi_aspi; ?></h6>
                                            <div>
                                                <small class="text-gray-800"><?= $aspirasi["created_at"] ?></small>
                                                <?php
                                                $status_aspi = "";
                                                $sts_aspi = $aspirasi["status"];
                                                if ($sts_aspi == "ditangguhkan") {
                                                    $status_aspi = "text-red-500";
                                                } elseif ($sts_aspi == "belum_ditanggapi") {
                                                    $status_aspi = "text-yellow-500";
                                                } elseif ($sts_aspi == "proses") {
                                                    $status_aspi = "text-blue-800";
                                                } elseif ($sts_aspi == "selesai") {
                                                    $status_aspi = "text-green-500";
                                                }
                                                ?>
                                                <small class="<?= $status_aspi ?>"><?= ucwords(str_replace("_", " ", $aspirasi["status"])); ?></small>
                                            </div>
                                        </div>
                                        <div class="m-5" id="<?= $aspirasi["id"] ?>" onclick="getLaporan(this.id)">
                                            <i data-feather="more-vertical" class="cursor-pointer hidden md:block" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                                            <i data-feather="more-horizontal" class="cursor-pointer block md:hidden" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="flex flex-col md:flex-row border py-5 px-5 items-center">
                                    <div>
                                        <h6 class="text-gray-800">Tidak Ada Aspirasi</h6>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- Laporan - Informasi -->
                        <div id="form-laporan-informasi" class="flex flex-col">
                            <h5 class="text-blue-800 font-bold text-xl mb-8">Informasi</h5>
                            <?php if (!empty($data["informasi"])) : ?>
                                <?php foreach ($data["informasi"] as $informasi) : ?>
                                    <div class="flex flex-col md:flex-row border py-5 px-5 items-center justify-between mb-5">
                                        <div>
                                            <h6 class="font-bold text-gray-800 mb-3"><?= $informasi["judul"] ?></h6>
                                            <?php
                                            $deskripsi_info = strlen($informasi["deskripsi"]) > 100 ? substr($informasi["deskripsi"], 0, 150) . "..." : $informasi["deskripsi"];
                                            ?>
                                            <h6 class="text-gray-500 font-light"><?= $deskripsi_info; ?></h6>
                                            <div>
                                                <small class="text-gray-800"><?= $informasi["created_at"] ?></small>
                                                <?php
                                                $status_info = "";
                                                $sts_info = $informasi["status"];
                                                if ($sts_info == "ditangguhkan") {
                                                    $status_info = "text-red-500";
                                                } elseif ($sts_info == "belum_ditanggapi") {
                                                    $status_info = "text-yellow-500";
                                                } elseif ($sts_info == "proses") {
                                                    $status_info = "text-blue-800";
                                                } elseif ($sts_info == "selesai") {
                                                    $status_info = "text-green-500";
                                                }
                                                ?>
                                                <small class="<?= $status_info ?>"><?= ucwords(str_replace("_", " ", $informasi["status"])); ?></small>
                                            </div>
                                        </div>
                                        <div class="m-5" id="<?= $informasi["id"] ?>" onclick="getLaporan(this.id)">
                                            <i data-feather="more-vertical" class="cursor-pointer hidden md:block" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                                            <i data-feather="more-horizontal" class="cursor-pointer block md:hidden" style="width:35px;height: 35px;left: 140px;top: 17px;"></i>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="flex flex-col md:flex-row border py-5 px-5 items-center">
                                    <div>
                                        <h6 class="text-gray-800">Tidak Ada Informasi</h6>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- User Setting -->
                    <div id="content-user-pengaturan">
                        <form action="<?= BaseURL() ?>/users/profil" method="post" enctype="multipart/form-data">
                            <div class="grid md:grid-cols-2 grid-cols-1 text-grey-800 gap-x-5 gap-y-5 mt-11">
                                <input type="text" class="hidden" name="id" value="<?= $data["user"]["id"] ?>">
                                <div>
                                    <h5 class="text-blue-800 font-bold text-xl mb-2">Nama Lengkap</h5>
                                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded w-full" id="nama_lengkap" name="nama" placeholder="Ketikkan Nama Lengkap" value="<?= $data["user"]["nama"] ?>" required>
                                </div>
                                <div>
                                    <h5 class="text-blue-800 font-bold text-xl mb-2">Tanggal Lahir</h5>
                                    <input type="date" class="mt-3 border border-gray-400 w-full py-3 px-2 rounded" id="tgl_lahir" name="tgl_lahir" value="<?= $data["user"]["tgl_lahir"] ?>" required>
                                </div>
                                <div class="flex flex-col mb-5">
                                    <h5 class="text-blue-800 font-bold text-xl mb-2">Jenis Kelamin</h5>
                                    <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="laki-laki" <?= $data["user"]["jenis_kelamin"] == "laki-laki" ? "selected" : "" ?>>Laki - Laki</option>
                                        <option value="perempuan" <?= $data["user"]["jenis_kelamin"] == "perempuan" ? "selected" : "" ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <h5 class="text-blue-800 font-bold text-xl mb-2">Alamat</h5>
                                    <input type="text" class="mt-3 border border-gray-400 w-full py-3 px-2 rounded" id="alamat" name="alamat" placeholder="Ketikkan Alamat" value="<?= $data["user"]["alamat"] ?>">
                                </div>
                                <div class="flex flex-col mb-5">
                                    <h5 class="text-blue-800 font-bold text-xl mb-2">Kontak</h5>
                                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" name="kontak" id="kontak" value="<?= $data["user"]["kontak"] ?>" placeholder="Ketikkan No Telp / Whatapps / Email" required>
                                </div>
                                <div class="flex flex-col mb-5">
                                    <h5 class="text-blue-800 font-bold text-xl mb-2">Status</h5>
                                    <select class="mt-3 border border-gray-400 py-3 px-2 rounded" name="status" id="status">
                                        <option value="masyarakat" <?= $data["user"]["status"] == "masyarakat" ? "selected" : "" ?>>Masyarakat</option>
                                        <option value="mahasiswa_mahasiswi" <?= $data["user"]["status"] == "mahasiswa_mahasiswi" ? "selected" : "" ?>>Mahasiswa / Mahasiswi</option>
                                        <option value="dosen" <?= $data["user"]["status"] == "dosen" ? "selected" : "" ?>>Dosen</option>
                                        <option value="staf" <?= $data["user"]["status"] == "staf" ? "selected" : "" ?>>Staf Kampus</option>
                                    </select>
                                </div>
                                <div>
                                    <h5 class="text-blue-800 font-bold text-xl mb-2">Email</h5>
                                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded w-full" required value="<?= $data["user"]["email"] ?> - <?= ucwords(str_replace("_", " ", $data["user"]["verifikasi_email"])) ?>" readonly>
                                    <button type="button" class="mt-2 text-blue-800 underline" onclick="Modal('ganti-email')"><u>Ganti Email</u></button>
                                    <?php if ($data["user"]["verifikasi_email"] != "terverifikasi") : ?>
                                        <span>|</span>
                                        <button type="button" class="mt-2 text-blue-800 underline" onclick="Modal('kirim-ulang-token')"><u>Kirim kembali tautan verifikasi</u></button>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <h5 class="text-blue-800 font-bold text-2xl mb-4">Password</h5>
                                    <div class="border border-gray-400 py-3 px-2 rounded w-full">
                                        <button type="button" class="text-blue-800" onclick="Modal('ganti-password')">Ganti Password</button>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="text-blue-800 font-bold text-2xl mb-2">Foto</h5>
                                    <img src="<?= BaseURL() ?>/public/upload/assets/images/<?= $_SESSION["user"]["foto"] ?>" alt="<?= $_SESSION["user"]["foto"] ?>" class="w-28 rounded-full my-5" id="foto-profil">
                                    <div class="flex flex-col mb-10">
                                        <div class="mt-3 border border-gray-400 py-3 px-2 rounded">
                                            <div class="flex">
                                                <input type="text" class="hidden" name="foto_lama" value="<?= $data["user"]["foto"] ?>">
                                                <input type="file" name="foto" onchange="changeFotoProfil(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="text-blue-800 font-bold text-2xl mb-2">Aktifitas Terakhir</h5>
                                    <p class="text-dark" id="aktifitas-terakhir"><?= $data["user"]["updated_at"] ?></p>
                                </div>
                            </div>
                            <div class="flex justify-center md:mt-0 mt-10">
                                <button type="submit" name="submit" class="px-5 py-3 text-xl font-bold text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-lg ">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Detail Laporan -->
<div id="modal-detail-laporan" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-50">
    <div class="relative mt-72 p-4 w-full max-w-3xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-800 ">
                    Kirim tautan verifikasi
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="ModalClose()">
                    <svg aria-hidden=" true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="px-10 py-5 text-grey-800">
                <div class="flex flex-col mb-5">
                    <label for="judul" class="text-gray-700">Judul Laporan*</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="judul" aria-describedby="judul" name="judul" placeholder="Ketikkan Judul Laporan" readonly>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="deskripsi" class="text-gray-700">Deskripsikan Laporan*</label>
                    <textarea class="mt-3 border border-gray-400 py-3 px-2 rounded" name="deskripsi" id="deskripsi" placeholder="Deskripsikan Laporan Anda" rows="3" readonly></textarea>
                </div>
                <div class="grid grid-rows-2">
                    <div class="flex flex-col mb-5">
                        <label for="kategori" class="text-gray-700">Kategori</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="kategori" aria-describedby="kategori" name="kategori" readonly>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="divisi-tujuan" class="text-gray-700">Divisi Tujuan</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="divisi" aria-describedby="divisi" name="divisi" readonly>
                    </div>
                </div>
                <div class="flex flex-col <?= !isset($_SESSION["user"]) ? "mb-5" : "mb-10" ?>">
                    <label for="input-file" class="text-gray-700">Lampiran</label>

                </div>
                <div class="flex flex-col mb-5">
                    <label for="divisi-tujuan" class="text-gray-700">Status</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="status" aria-describedby="status" name="status" readonly>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="divisi-tujuan" class="text-gray-700">Terakhir Diperbarui</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="updated_at" aria-describedby="updated_at" name="updated_at" readonly>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end items-center pt-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-cente" onclick="ModalClose()">Oke</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Logout -->
<div id="modal-keluar" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-800 ">
                    Konfirmasi Keluar
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="ModalClose()">
                    <svg aria-hidden=" true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500">
                    Apakah anda ingin keluar ?
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <a href="<?= BaseURL() ?>/auth/logout" class="text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-cente">Ya, Logout</a>
                <button type="button" class="text-gray-800 border border-gray-800 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="ModalClose()">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ganti Email -->
<div id="modal-ganti-email" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-800 ">
                    Ganti Email
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="ModalClose()">
                    <svg aria-hidden=" true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= BaseURL() ?>/users/changeemail" method="POST" class="px-10 py-5 text-grey-800">
                <div class="flex flex-col mb-5">
                    <label for="email" class="text-gray-700">Email</label>
                    <input type="email" class="mt-3 border border-gray-400 py-3 px-2 rounded" name="email" placeholder="Ketikkan Email" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="email" class="text-gray-700">Konfirmasi Email</label>
                    <input type="email" class="mt-3 border border-gray-400 py-3 px-2 rounded" name="email2" placeholder="Ketikkan Email" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password" class="text-gray-700">Password</label>
                    <input type="password" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="password" name="password" placeholder="Ketikkan Password" required>
                </div>
                <p class="font-bold mb-4">Perhatikan</p>
                <ul class="pl-5 list-disc font-light mb-5">
                    <li>Email harus aktif.</li>
                    <li>Jika link verifikasi tidak tersedia, harap cek pada bagian spam.</li>
                </ul>
                <!-- Modal footer -->
                <div class="flex justify-end items-center pt-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" name="submit" class="text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-cente">Ya, Ganti Email</button>
                    <button type="button" class="text-gray-800 border border-gray-800 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="ModalClose()">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Kirim ulang token -->
<div id="modal-kirim-ulang-token" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-800 ">
                    Kirim tautan verifikasi
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="ModalClose()">
                    <svg aria-hidden=" true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= BaseURL() ?>/users/sendnewverifikasi" method="POST" class="px-10 py-5 text-grey-800">
                <p class="font-bold mb-4">Perhatikan</p>
                <ul class="pl-5 list-disc font-light mb-5">
                    <li>Email harus aktif.</li>
                    <li>Jika link verifikasi tidak tersedia, harap cek pada bagian spam.</li>
                </ul>
                <!-- Modal footer -->
                <div class="flex justify-end items-center pt-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" name="submit" class="text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-cente">Ya, Kirim ulang</button>
                    <button type="button" class="text-gray-800 border border-gray-800 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="ModalClose()">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Ganti Password -->
<div id="modal-ganti-password" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-800 ">
                    Ganti Password
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="ModalClose()">
                    <svg aria-hidden=" true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= BaseURL() ?>/users/changepassword" method="post" class="px-10 py-5 text-grey-800">
                <div class="flex flex-col mb-5">
                    <label for="password" class="text-gray-700">Password Sekarang</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="password" name="password" placeholder="Ketikkan Password" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password" class="text-gray-700">Password Baru</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="password1" name="password1" placeholder="Ketikkan Password" required>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password" class="text-gray-700">Konfirmasi Password Baru</label>
                    <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" id="password2" name="password2" placeholder="Ketikkan Password" required>
                </div>
                <p class="font-bold mb-4">Perhatikan</p>
                <ul class="pl-5 list-disc font-light mb-5">
                    <li>Setelah anda mengklik konfirmasi, anda akan otomatis keluar.</li>
                </ul>
                <!-- Modal footer -->
                <div class="flex justify-end items-center pt-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" name="submit" class="text-white bg-blue-800 hover:bg-blue-900 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-cente">Ya, Ganti Password</button>
                    <button type="button" class="text-gray-800 border border-gray-800 hover:drop-shadow-md font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="ModalClose()">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // USER MENU
    // Default menu selected
    userFormSelect("laporan");

    function userFormSelect(id) {
        const userMenu = $("#user-menu")[0].children;
        for (let i = 0; i < userMenu.length; i++) {
            if (userMenu[i].id == id) {
                userMenu[i].classList.add(
                    "text-white",
                    "bg-blue-800",
                    "hover:bg-blue-900"
                );
                userMenu[i].classList.remove("text-blue-800", "bg-white");
            } else {
                userMenu[i].classList.remove(
                    "text-white",
                    "bg-blue-800",
                    "hover:bg-blue-900"
                );
                userMenu[i].classList.add("text-blue-800", "bg-white");
            }
        }
        formSelected(id);
    }

    function formSelected(e) {
        if (e == "laporan") {
            $("#content-user-laporan").show();
            $("#content-user-pengaturan").hide();
        } else if (e == "pengaturan") {
            $("#content-user-laporan").hide();
            $("#content-user-pengaturan").show();
        }
    }

    function changeFotoProfil(e) {
        const file = e.files[0];
        console.log(file);
        $("#foto-profil").attr("src", window.URL.createObjectURL(file));
    }
    // Form Laporan
    $("#form-laporan-pengaduan").show();
    $("#form-laporan-aspirasi").hide();
    $("#form-laporan-informasi").hide();

    function changeFormLaporan(form) {
        const formSelected = form.value;
        if (formSelected == "pengaduan") {
            $("#form-laporan-pengaduan").show();
            $("#form-laporan-aspirasi").hide();
            $("#form-laporan-informasi").hide();
        } else if (formSelected == "aspirasi") {
            $("#form-laporan-pengaduan").hide();
            $("#form-laporan-aspirasi").show();
            $("#form-laporan-informasi").hide();
        } else if (formSelected == "informasi") {
            $("#form-laporan-pengaduan").hide();
            $("#form-laporan-aspirasi").hide();
            $("#form-laporan-informasi").show();
        }
    }

    // Get laporan
    function getLaporan(id) {
        console.log(id);
        Modal("detail-laporan");
    }
</script>
<?php getFooterCopyright(); ?>