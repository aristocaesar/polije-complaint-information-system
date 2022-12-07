<!-- Informasi Laporan -->
<?php
require_once("app/models/dashboard_model.php");
$info_dahsboard = new Dashboard_Model;
?>
<section id="informasi-laporan" class="container py-32 text-center">
    <div class="grid md:grid-cols-2 grid-cols-1 gap-10 ">
        <div class="text-left">
            <h3 class="font-bold text-2xl text-gray-800">Jumlah Laporan Sekarang</h3>
            <h3 class="font-bold text-2xl my-4 text-gray-600"><?= $info_dahsboard->getCountAllLaporan()["jumlah_semua_laporan"] ?></h3>
            <p class="font-light text-gray-800">
                Jumlah laporan yang telah disampaikan berupa pengaduan, aspirasi ataupun pertanyaan informasi.
            </p>
        </div>
        <div class="md:text-right text-left">
            <h3 class="font-bold text-2xl text-gray-800">Divisi Yang Terhubung</h3>
            <h3 class="font-bold text-2xl my-4 text-gray-600"><?= $info_dahsboard->getCountDivisi()["jumlah_divisi"] ?></h3>
            <p class="font-light text-gray-800">
                Divisi merupakan suatu kelompok yang berwenang dalam mengatasi dan memproses laporan dipoliteknik negeri jemeber.
            </p>
        </div>
    </div>
    <button type="button" class="mt-28 bg-blue-800 hover:drop-shadow-lg hover:bg-blue-900 py-3 px-7 tracking-wide text-white rounded font-bold" onclick="goTentang()">Selengkapnya</button>
</section>