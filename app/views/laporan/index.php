<!-- Hero -->
<section class="hero">
    <?php getNavbarHome(); ?>
</section>
<!-- Form -->
<section class="form-lapor ">
    <div class="container d-flex flex-column align-items-center">
        <h1>Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h1>
        <p class="text-white h5 mt-5">Sampaikan laporan Anda langsung kepada divisi yang berwenang</p>
    </div>
    <hr>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card shadow border-0 p-5" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-new-blue font-weight-bold h3 mb-5"><i data-feather="layers" style="width:35px;height: 35px;left: 140px;top: 17px; margin-right:10px"></i> Laporan</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Pelapor</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
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
            </div>
        </div>
    </div>
</section>
<!-- Modal Detail -->
<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
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
</div>
<?php getFooterCopyright(); ?>