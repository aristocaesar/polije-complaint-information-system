<?php

if (empty($data["laporan"])) {
    header("Location: " . BaseURL() . "/users");
}

?>
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
            <div class="flex text-blue-800 font-bold justify-between mb-11">
                <a href="<?= BaseURL() ?>/users">
                    <i data-feather="arrow-left" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                </a>
                <h5 class="md:text-3xl text-xl"> <?= $data["laporan"]["id"] ?></h5>
            </div>
            <div class="mt-16">
                <div id="user-form-content">
                    <h5 class="font-bold mb-5 text-gray-800">Detail <?= $data["klasifikasi"] ?></h5>
                    <div class="flex flex-col mb-5">
                        <label for="kategori" class="text-gray-700">Kategori</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" value="<?= $data["laporan"]["kategori"]; ?>" readonly>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="divisi-tujuan" class="text-gray-700">Divisi Tujuan</label>
                        <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" value="<?= $data["laporan"]["divisi"]; ?>" readonly>
                    </div>
                    <!-- <div class="flex flex-col mb-5">
                            <label for="judul" class="text-gray-700">Judul <?= $data["klasifikasi"] ?></label>
                            <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" value="<?= $data["laporan"]["judul"]; ?>" readonly>
                        </div> -->
                    <div class="flex flex-col mb-5">
                        <label for="deskripsi" class="text-gray-700">Deskripsi</label>
                        <textarea class="mt-3 border border-gray-400 py-3 px-2 rounded" rows="3" readonly><?= $data["laporan"]["deskripsi"] ?></textarea>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="input-file" class="text-gray-700">Lampiran</label>
                        <div class="mt-3 border border-gray-400 py-3 px-2 rounded">
                            <?php if ($data["laporan"]["lampiran_pengirim"] != null) : ?>
                                <a href="<?= BaseURL() ?>/public/upload/assets/document/<?= strtolower($data["klasifikasi"]) ?>/<?= $data["laporan"]["lampiran_pengirim"]; ?>" target="_blank" rel="noopener noreferrer" class="hover:underline"><?= $data["laporan"]["lampiran_pengirim"]; ?></a>
                            <?php else : ?>
                                <p>Lampiran tidak tersedia</p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col justify-between md:gap-x-10">
                        <div class="flex flex-col md:mb-0 mb-5 md:w-9/12 w-full">
                            <label for="status" class="text-gray-700">Status</label>
                            <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" value="<?= ucwords(str_replace("_", " ", $data["laporan"]["status"])); ?>" readonly>
                        </div>
                        <div class="flex flex-col md:w-9/12 w-full">
                            <label for="status" class="text-gray-700">Terakhir Diperbarui</label>
                            <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" value="<?= $data["laporan"]["updated_at"] ?>" readonly>
                        </div>
                    </div>
                    <?php if ($data["laporan"]["tanggapan"] != "") : ?>
                        <h5 class="font-bold mb-5 text-gray-800">Tanggapan</h5>
                        <div class="flex flex-col mb-5">
                            <label for="status" class="text-gray-700">Deskripsi</label>
                            <input type="text" class="mt-3 border border-gray-400 py-3 px-2 rounded" value="<?= $data["laporan"]["tanggapan"]; ?>" readonly>
                        </div>
                        <div class="flex flex-col mb-5">
                            <label for="input-file" class="text-gray-700">Lampiran</label>
                            <div class="mt-3 border border-gray-400 py-3 px-2 rounded">
                                <?php if ($data["laporan"]["lampiran"] != null) : ?>
                                    <a href="<?= BaseURL() ?>/public/upload/assets/document/<?= strtolower($data["klasifikasi"]) ?>/<?= $data["laporan"]["lampiran"]; ?>" target="_blank" rel="noopener noreferrer" class="hover:underline"><?= $data["laporan"]["lampiran"]; ?></a>
                                <?php else : ?>
                                    <p>Lampiran tanggapan tidak tersedia</p>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php getFooterCopyright(); ?>