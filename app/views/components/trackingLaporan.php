<!-- Tracking Laporan -->
<section id="tracking-laporan" class="bg-blue-800 py-32">
    <div class="container">
        <div class="text-center flex flex-col m-auto max-w-2xl">
            <h5 class="text-3xl font-bold tracking-wide mb-10 text-white">Tracking Laporan</h5>
            <input type="text" class="py-3 px-4 rounded border-none w-full focus:drop-shadow-lg" placeholder="Ketikkan ID Laporan" oninput="trackingLaporan(this.value)">
        </div>
        <div class="state-not-found flex justify-center my-10">
            <p class="text-white">ID Laporan tersebut tidak tersedia.</p>
        </div>
        <div class="form-tracking m-auto max-w-2xl">
            <div class="bg-white my-10 p-10 rounded">
                <div class="text-center">
                    <h5 class="font-bold mb-2">ID Laporan</h5>
                    <p id="id-tracking-laporan" class="tracking-wide">64543543</p>
                </div>
                <div class="text-left mt-10 grid gap-y-5">
                    <div class="tracking-item">
                        <h6 class="font-bold mb-2">Tanggal Pelaporan</h6>
                        <p id="tgl-tracking-laporan">Senin, 26 September 2022 - 14:39:50</p>
                    </div>
                    <div class="tracking-item">
                        <h6 class="font-bold mb-2">Nama Pelapor</h6>
                        <p id="nama-pelapor-tracking-laporan">Aristo Caesar Pratama</p>
                    </div>
                    <div class="tracking-item">
                        <h6 class="font-bold mb-2">Judul</h6>
                        <p id="judul-tracking-laporan">Id id sit irure anim. Ad mollit excepteur et anim consectetur consequat</p>
                    </div>
                    <div class="tracking-item">
                        <h6 class="font-bold mb-2">Deskripsi</h6>
                        <p id="deskripsi-tracking-laporan">elit excepteur eu tempor. Fugiat velit non incididunt in reprehenderit duis veniam id occaecat amet. Voluptate irure consectetur irure ullamco tempor. Quis occaecat duis adipisicing ex. Cupidatat sit consequat ea ullamco sint do ut sint incididunt consectetur fugiat cillum consequat. Incididunt elit in irure proident irure duis id.</p>
                    </div>
                    <div class="tracking-item">
                        <h6 class="font-bold mb-2">Kategori</h6>
                        <p id="kategori-tracking-laporan">Beasiswa</p>
                    </div>
                    <div class="tracking-item">
                        <h6 class="font-bold mb-2">Divisi</h6>
                        <p id="divisi-tracking-laporan">Kampus</p>
                    </div>
                    <div class="tracking-item">
                        <h6 class="font-bold mb-2">Status</h6>
                        <p id="status-tracking-laporan">Proses</p>
                    </div>
                    <div class="tracking-item">
                        <h6 class="font-bold mb-2">Hasil Penanganan</h6>
                        <a href="http://" target="_blank" class="text-blue-800 hover:underline" id="hasil-tracking-laporan" rel="noopener noreferrer">hasil.png</a>
                    </div>
                </div>
            </div>
        </div>
</section>