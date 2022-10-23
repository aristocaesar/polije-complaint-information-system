<?php getNavbarAdmin(); ?>
<?php getSidebarAdmin() ?>
<!-- Main Content -->
<div class="main-content">
    <!-- Modal Tambah -->
    <div class="modal fade" tabindex="-1" role="dialog" id="kategori">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" action="" method="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Divisi</label>
                            <input type="nama_kategori" class="form-control" id="nama_kategori" aria-describedby="kategori" placeholder="Ketikkan Nama Kategori">
                        </div>
                        <div class="form-group">
                            <label for="deksripsi">Deskripsi</label>
                            <textarea class="form-control" id="deksripsi" rows="6" placeholder="Ketikkan Deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button><button type="button" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="section-header">
            <h1>Divisi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Data Divisi</h4>
                            <button type="button" id="tambah" class="btn btn-primary" data-toggle="modal" data-target="#kategori">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama Divisi</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>Create a mobile app</td>
                                            <td>
                                                <p>Nostrud officia Lorem et sit voluptate cillum anim ullamco minim sunt sint anim labore sint.</p>
                                            </td>
                                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
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
</div>
<?php getFooterDashboard(); ?>