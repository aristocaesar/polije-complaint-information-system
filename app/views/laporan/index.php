<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Laporan -->
<section id="form-lapor" class="mt-[-570px] lg:mt-[-550px]">
    <div class="container flex flex-col items-center text-center text-white max-w-[950px] mt-36">
        <h1 class="md:text-4xl text-3xl font-bold tracking-wide">Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="md:text-xl text-lg mt-8 font-light">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
        <hr class="w-[200px] my-[50px] border-t-4 ">
    </div>
    <div class="container drop-shadow-xl max-w-5xl">
        <div class="bg-white py-11 px-10">
            <div class="flex text-blue-800 font-bold justify-center mb-11">
                <i data-feather="layers" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i>
                <h5 class="md:text-3xl text-xl"> Laporan</h5>
            </div>
            <div class="mt-16">
                <table class="table table-bordered " id="dataTableLaporan" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-gray-800">
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Pelapor</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-500">
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>2011/04/25</td>
                            <td><a class="text-new-blue" data-toggle="modal" data-target="#modalDetail">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>2011/04/25</td>
                            <td><a class="text-new-blue" data-toggle="modal" data-target="#modalDetail">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td>Aristo Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>2011/04/25</td>
                            <td><a class="text-new-blue" data-toggle="modal" data-target="#modalDetail">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>2011/04/25</td>
                            <td><a class="text-new-blue" data-toggle="modal" data-target="#modalDetail">Lihat Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Modal Detail -->
<!-- Modal -->
<!-- <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div> -->
<?php getFooterCopyright(); ?>